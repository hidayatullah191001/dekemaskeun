<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email','role_id'))
		{
			$data = base_url();
			$this-> session ->set_flashdata('message', '<div class = "alert alert-danger" role="alert">Jangan coba-coba masuk ya. Kamu login dulu atau hubungi Admin jika ini keliru!</div>');
			redirect($data);
		}
		$this->load->model('Content_model');
	}

	public function kategori()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Kategori";

		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['count'] = $this->Content_model->countKategori();

		/*PAGINATION*/

		//config
		$config['base_url'] = "http://localhost/dekemaskeun/content/kategori"; 
		$config['total_rows'] = $this->Content_model->countKategori();
		$config['per_page'] = 6;
		$config['num_links'] = 5;


		$config['attributes'] = array('class' =>'page-link');

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['kategori'] = $this->Content_model->getDataKategori($config['per_page'],$data['start']);

		/*END PAGINATION*/

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('content/kategori', $data);
		$this->load->view('template/footer');
		/*MODAL VIEW*/
		$this->load->view('content/kategori_modal');
	}

	public function tambah_kategori()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		$gambar = $this->input->post('gambar');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class = "alert alert-danger" role="alert">Masukkan kategori baru yang ingin ditambahkan</div>');
			redirect('content/kategori');
		}else{
			$data = [
				'kategori' => $this->input->post('kategori'),
				'image' => $this->Content_model->fungsiUploadgambar('kategori', 'image')
			];
			$this->db->insert('kategori', $data);
			$this->session->set_flashdata('message', '<div class = "alert alert-success" role="alert">Kategori baru berhasil ditambahkan!</div>');
			redirect('content/kategori');
		}
	}

	public function katalog()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Katalog";

		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['tipe'] = $this->db->get('tipe')->result_array();
		
		$data['count'] = $this->Content_model->countAll();

		/*PAGINATION*/

		//config
		$config['base_url'] = "http://localhost/dekemaskeun/content/katalog"; 
		$config['total_rows'] = $this->Content_model->countAll();
		$config['per_page'] = 6;
		$config['num_links'] = 5;


		$config['attributes'] = array('class' =>'page-link');

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['katalog'] = $this->Content_model->getData($config['per_page'],$data['start']);

		/*END PAGINATION*/

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('content/katalog', $data);
		$this->load->view('template/footer');
		/*MODAL VIEW*/
		$this->load->view('content/kategori_modal');
		$this->load->view('content/katalog_modal');
	}

	
	public function tambah_katalog()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_produk', 'Nama_Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class = "alert alert-danger" role="alert">Data katalog belum lengkap, Coba lagi!</div>');
			redirect('content/katalog');
		}else{
			$dataa = [
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi' => $this->input->post('deskripsi'),
				'kategori_id' => $this->input->post('kategori_id'),
				'tipe' => $this->input->post('tipe'),
				'harga' => $this->input->post('harga'),
				'image' => $this->Content_model->fungsiUploadgambar('produk','image')
			];
			$this->db->insert('katalog', $dataa);
			$this->session->set_flashdata('message', '<div class = "alert alert-success" role="alert">Katalog baru berhasil ditambahkan!</div>');
			redirect('content/katalog');
		}
	}

	public function delete($id = null)
	{
		$_id = $this->db->get_where('katalog', ['id' => $id])->row_array();
		$query = $this->db->delete('katalog', ['id' =>$id]);
		if ($query) {
			unlink(FCPATH . 'assets/img/produk/'. $_id['image']);
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Berhasil dihapus!
			</div>');
		redirect('content/katalog');
	}

	public function deleteKategori($id = null)
	{
		$_id = $this->db->get_where('kategori', ['id' => $id])->row_array();
		$query = $this->db->delete('kategori', ['id' =>$id]);
		if ($query) {
			unlink(FCPATH . 'assets/img/kategori/'. $_id['image']);
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Berhasil dihapus!
			</div>');
		redirect('content/kategori');
	}

	public function edit_katalog($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Edit Katalog";

		$data['katalog'] = $this->db->get_where('katalog', ['id' => $id])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['tipe'] = $this->db->get('tipe')->result_array();

		$this->form_validation->set_rules('nama_produk', 'Nama_Produk', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('content/edit_katalog', $data);
			$this->load->view('template/footer');
		}else{
			$this->Content_model->update_data();
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Berhasil diubah!
				</div>');
			redirect('content/katalog');
		}
	}

	public function pengumuman($id = null)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Pengumuman";

		/*PAGINATION*/

		//config
		$config['base_url'] = "http://localhost/dekemaskeun/content/pengumuman"; 
		$config['total_rows'] = $this->Content_model->countPengumuman();
		$config['per_page'] = 3;
		$config['num_links'] = 5;


		$config['attributes'] = array('class' =>'page-link');

		//initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['pengumuman'] = $this->Content_model->getPengumuman($config['per_page'],$data['start']);
		$data['numrow'] = $this->db->get('pengumuman')->num_rows();
		/*END PAGINATION*/

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('content/pengumuman', $data);
		$this->load->view('template/footer');
		
		/*MODAL VIEW*/
		$this->load->view('content/pengumuman_modal');
	}

	public function tambah_pengumuman()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class = "alert alert-danger" role="alert">Masukkan pengumuman baru yang ingin ditambahkan</div>');
			redirect('content/pengumuman');
		}else{
			$data = [
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'tanggal' => time()
			];

			$this->db->insert('pengumuman', $data);
			$this->session->set_flashdata('message', '<div class = "alert alert-success" role="alert">Pengumuman berhasil ditambahkan</div>');
			redirect('content/pengumuman');
		}
	}

	public function hapus_pengumuman($id)
	{
		$this->db->delete('pengumuman', ['id' =>$id]);
		$this->session->set_flashdata('message', '<div class = "alert alert-success" role="alert">Pengumuman berhasil dihapus</div>');
		redirect('content/pengumuman');
	}

	public function testimoni($id = null)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Testimoni";

		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['tipe'] = $this->db->get('tipe')->result_array();
		$data['testimoni'] = $this->Content_model->getTestimoni();
		$data['numrow'] = $this->db->get('testimoni')->num_rows();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('content/testimoni', $data);
		$this->load->view('template/footer');
		/*MODAL VIEW*/
		$this->load->view('content/testimoni_modal');
	}

	public function tambah_testimoni()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class = "alert alert-danger" role="alert">Data katalog belum lengkap, Coba lagi!</div>');
			redirect('content/testimoni');
		}else{
			$kategori = $this->input->post('kategori_id');
			$tipe = $this->input->post('tipe');
			$varian = $kategori.", ".$tipe;
			$data = [
				'nama' => $this->input->post('nama'),
				'varian' => $varian,
				'text' => $this->input->post('text'),
				'foto' => $this->Content_model->fungsiUploadgambar('testimoni','foto'),
				'tanggal' => time()
			];
			$this->db->insert('testimoni', $data);
			$this->session->set_flashdata('message', '<div class = "alert alert-success" role="alert">Testimoni baru berhasil ditambahkan!</div>');
			redirect('content/testimoni');
		}
	}

	public function deleteTestimoni($id = null)
	{
		$_id = $this->db->get_where('testimoni', ['id' => $id])->row_array();
		$query = $this->db->delete('Testimoni', ['id' =>$id]);
		if ($query) {
			unlink(FCPATH . 'assets/img/testimoni/'. $_id['foto']);
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Berhasil dihapus!
			</div>');
		redirect('content/testimoni');
	}

	public function kontak()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Kontak";

		$data['dataKontak'] = $this->db->get('kontak')->row_array();

		$data['kontak_num'] = $this->db->get('kontak')->num_rows();

		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('instagram', 'Instagram', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('content/kontak', $data);
			$this->load->view('template/footer');
		}else{
			$data = [
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'instagram' => $this->input->post('instagram')
			];
			$this->db->insert('kontak', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Kontak berhasil ditambah
				</div>');
			redirect('content/kontak');
		}
	}

	public function edit_kontak($id)
	{
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('instagram', 'Instagram', 'required');

		if ($this->form_validation->run() == false) {
			redirect('content/kontak');
		}else{
			$data = [
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'instagram' => $this->input->post('instagram')
			];
			$this->db->where('id', $id);
			$this->db->update('kontak',$data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Kontak berhasil diubah!
				</div>');
			redirect('content/kontak');
		}
	}

	public function delete_kontak($id)
	{
		$this->db->delete('kontak', ['id' => $id]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Kontak berhasil dihapus!
			</div>');
		redirect('content/kontak');
	}
}
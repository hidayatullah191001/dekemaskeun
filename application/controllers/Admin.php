<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email','role_id'))
		{
			$data = base_url();
			$this-> session ->set_flashdata('message', '<div class = "alert alert-danger" role="alert">Jangan coba-coba masuk ya. Kamu login dulu atau hubungi Admin jika ini keliru!</div>');
			redirect($data);
		}
		$this->load->model('Admin_model');
		$this->load->model('Content_model');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "Dashboard";

		$data['dataUser'] = $this->Admin_model->countUser();
		$data['katalog'] = $this->Content_model->countAll();
		$data['pengumuman'] = $this->Content_model->countPengumuman();
		$data['testimoni'] = $this->Content_model->countTestimoni();
		$data['kategori'] = $this->Content_model->countKategori();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function user_management()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = "User Management";

		$data['userr'] = $this->db->get('user')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/user_manage', $data);
		$this->load->view('template/footer');
	}


	public function manage_edit($id) {

		$data['title'] = 'Edit User Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['edit'] = $this->db->get_where('user', ['id' => $id])->row_array();

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/manage_edit', $data);
			$this->load->view('template/footer');
		}
		else
		{
			$dataa = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'role_id' => $this->input->post('role_id'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->where('id', $id);
			$this->db->update('user',$dataa);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Berhasil diubah!
				</div>');
			redirect('admin/user_management');
		}
	}

	public function delete($id = null)
	{

		$_id = $this->db->get_where('user', ['id' => $id])->row_array();
		$query = $this->db->delete('user', ['id' =>$id]);
		if ($query) {
			if($_id['image'] != 'default.jpg')
				unlink(FCPATH . 'assets/img/profile/'. $_id['image']);
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">Berhasil dihapus!
			</div>');
		redirect('admin/user_management');
	}

	public function edit_profile()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profile';

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if($this->form_validation->run()==false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/edit_user', $data);
			$this->load->view('template/footer');
		}else{

			$name = $this->input->post('name');
			$email = $this->input->post('email');

        //cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image'))
				{
					$old_image = $data['user']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/img/profile/'. $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}
				else
				{
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">Profile berhasil diperbarui!
				</div>');
			redirect('admin/edit_profile');
		}
	}

	public function hapusGambar($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$old_image = $data['user']['image'];

		if($old_image != 'default.jpg'){
			unlink(FCPATH . 'assets/img/profile/'. $old_image);
		}

		$name = "default.jpg";
		$this->db->set('image', $name);
		$this->db->where('id', $id);
		$this->db->update('user');

		$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">Profile berhasil dihapus!
				</div>');
			redirect('admin/edit_profile');
	}
}

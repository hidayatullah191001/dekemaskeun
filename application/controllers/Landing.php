<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Admin_model');
		$this->load->model('Content_model');
	}

	public function index(){
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['testimoni'] = $this->db->get('testimoni')->result_array();

		$this->load->view('template/headerlanding', $data);
		$this->load->view('template/navbarlanding', $data);
		$this->load->view('landing/index', $data);
		$this->load->view('template/footerlanding');
	}

	public function list_itemdetail($idkategori=null){

		$data['id'] = $idkategori;

		$data['katalog'] = $this->db->get('katalog')->result_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		
		$data['nama_kategori'] = $this->Content_model->getNamaKategori($idkategori);
		$data['countkatalog'] = $this->Content_model->countbyid($idkategori);
		$data['tipe'] = $this->db->get('tipe')->result_array();
		$data['kontak'] = $this->db->get('kontak')->result_array();

		$this->load->view('template/headerlanding', $data);
		$this->load->view('template/navbarlanding', $data);
		$this->load->view('landing/list_itemdetail', $data);
		$this->load->view('template/footerlanding');
	}

	public function about(){
		$data['kategori'] = $this->db->get('kategori')->result_array();

		$data['kontak'] = $this->db->get('kontak')->result_array();
		$this->load->view('template/headerlanding', $data);
		$this->load->view('template/navbarlanding', $data);
		$this->load->view('landing/aboutus', $data);
		$this->load->view('template/footerlanding');
	}
}
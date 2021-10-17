<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('email'))
		{
			redirect('admin');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "DeKemaskeun | Login";
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('auth/footer');
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this-> input ->post('email');
		$password = $this-> input ->post('password');

		$user = $this-> db ->get_where('user', ['email'=> $email])->row_array();

		if($user)
		{
			if($user['is_active']==1){
				// cek password
				if (password_verify($password, $user['password'])){
					$data = [
						'email' => $user ['email'],
						'role_id' => $user ['role_id']
					];
					$this -> session -> set_userdata($data);
					if ($user['role_id'] == 1){
						redirect('admin');
					}
					
				}else{
					$this-> session ->set_flashdata('message', '<div class = "alert alert-danger" role="alert"> Password anda salah</div>');
					redirect('auth');						
				}
				
			}else{
				$this-> session ->set_flashdata('message', '<div class = "alert alert-danger" role="alert"> Email anda belum diaktivasi. Hubungi admin untuk meminta aktivasi akun!</div>');
				redirect('auth');
			}

		}else{
			$this-> session ->set_flashdata('message', '<div class = "alert alert-danger" role="alert"> Email tidak terdaftar! </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class = "alert alert-success" role="alert"> Logout berhasil!</div>');
		redirect('auth'); 
	}

	public function register()
	{
		if($this->session->userdata('email'))
		{
			redirect('user');
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim',[
			'required' => "Nama lengkap harus diisi!"
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password tidak sesuai!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Passoword', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "DeKemaskeun | Registration";

			$this->load->view('auth/header', $data);
			$this->load->view('auth/register');
			$this->load->view('auth/footer');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 1,
				'is_active' => 0,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
				Akun berhasil dibuat, Silahkan hubungi admin untuk meminta aktivasi akun!
				</div>');
			redirect('Auth');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginadmin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->form_validation->set_rules('admin_id', 'Admin_id', 'trim|required');
		$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
			$this->load->view('loginadmin');
		}
		else{
			$this->_login();
		}
        
	}

	private function _login(){
		$admin_id = $this->input->post('admin_id');
		$admin_password = $this->input->post('admin_password');

		$admin = $this->db->get_where('admin',['admin_id' => $admin_id])->row_array();

		if($admin){
			if($admin['admin_id'] == $admin_id){
				if(md5($admin_password) == $admin['admin_password']){
					$data = [
						'admin_id' => $admin['admin_id'],
						'admin_nama' => $admin['admin_nama'],
						'status' => "login",
						'level' => "admin",
					];
					$text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Selamat Datang di E-Resik App Kab. Sleman!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  	</div>';
					$this->session->set_flashdata('msg',$text);
					$this->session->set_userdata($data);
					redirect('admin/dashboard');
				}
				else{
					$text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<h4>Password Salah!</h4> 
					Silahkan Cek Kembali
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  	</div>';
					$this->session->set_flashdata('msg',$text);
					redirect('loginadmin');
				}
			}
			else {
				$text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<h4>Data Tidak Valid!</h4> 
				Silahkan Cek Kembali
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
				$this->session->set_flashdata('msg',$text);
				redirect('loginadmin');
			}
		}
		else {
			$text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<h4>Data Tidak Valid!</h4> 
			Silahkan Cek Kembali
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			$this->session->set_flashdata('msg',$text);
			redirect('loginadmin');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('loginadmin');
	}
	}
 

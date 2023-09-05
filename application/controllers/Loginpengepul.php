<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpengepul extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$this->form_validation->set_rules('pengepul_nomorhp', 'Nomor HP', 'trim|required');
		$this->form_validation->set_rules('pengepul_password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
			$this->load->view('loginpengepul');
		}
		else{
			$this->_login();
		}
        
	}

	private function _login(){
		$pengepul_nomorhp = $this->input->post('pengepul_nomorhp');
		$pengepul_password = $this->input->post('pengepul_password');

		$pengepul = $this->db->get_where('pengepul',['pengepul_nomorhp' => $pengepul_nomorhp])->row_array();

		if($pengepul){
			//data pengepul ada
			if($pengepul['pengepul_nomorhp'] == $pengepul_nomorhp){
				if(md5($pengepul_password) == $pengepul['pengepul_password']){
					$data = [
						'pengepul_id' => $pengepul['pengepul_id'],
                        'pengepul_nomorhp' => $pengepul['pengepul_nomorhp'],
						'pengepul_nama' => $pengepul['pengepul_nama'],
						'status' => "login",
                        'level' => "pengepul"
					];
					$text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Selamat Datang di E-Resik App Kab. Sleman!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  	</div>';
					$this->session->set_flashdata('msg',$text);
					$this->session->set_userdata($data);
					redirect('pengepul/dashboard');
				}
				else{
					$text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<h4>Password Salah!</h4> 
					Silahkan Cek Kembali
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  	</div>';
					$this->session->set_flashdata('msg',$text);
					redirect('loginpengepul');
				}
			}
			else {
				$text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<h4>Data Tidak Valid!</h4> 
				Silahkan Cek Kembali
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
				$this->session->set_flashdata('msg',$text);
				redirect('loginpengepul');
			}
		}
		else {
			$text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<h4>Data Tidak Valid!</h4> 
			Silahkan Cek Kembali
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
			$this->session->set_flashdata('msg',$text);
			redirect('loginpengepul');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('loginpengepul');
	}
	}
 

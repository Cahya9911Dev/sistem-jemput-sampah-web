<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function login_post()
	{
		$user = $this->post('user');
		$pass = $this->post('pass');

		$login = $this->Login_model->is_valid_login($user, $pass);

		if ($login) {
			$this->response(
				[
					'payload' => $login
				],
				200
			);
		} else {

			$this->response([
				'payload' => null
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function registrasi_post()
	{
		$params = array(
			'masyarakat_nomorhp' => $this->post('masyarakat_nomorhp'),
			'masyarakat_nama' => $this->post('masyarakat_nama'),
			'masyarakat_password' => $this->post('masyarakat_password'),
			'masyarakat_alamat' => $this->post('masyarakat_alamat')
		);

		if ($this->check_sudah_regis($this->post('masyarakat_nomorhp'))) {
			$regis = false;
		} else {
			$regis = $this->Login_model->is_valid_regis($params);
		}

		if ($regis) {
			$this->response(
				[
					'payload' => "sukses"
				],
				200
			);
		} else {

			$this->response([
				'payload' => "gagal"
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function check_sudah_regis($nomor)
	{
		$this->db->where('masyarakat_nomorhp', $nomor);
		$query = $this->db->get('masyarakat');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

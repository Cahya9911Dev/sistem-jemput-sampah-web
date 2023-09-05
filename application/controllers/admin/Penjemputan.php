<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjemputan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_penjemputan');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginadmin"));
        }
        
        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
        }
    }

    public function index(){
        $data['title'] = "Data Penjemputan";
        $data['penjemputan'] = $this->m_penjemputan->get_data('penjemputan_proses')->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/penjemputan',$data);
        $this->load->view('admin/templates/footer');
    }
}
?>
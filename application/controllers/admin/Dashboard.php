<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
        redirect(base_url("loginadmin"));
        }

        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
        }
    }

    public function index(){
        $data['title'] = "Dashboard Admin";
        $pemesanan = $this->db->query("SELECT * FROM pemesanan_det");
        $penjemputan = $this->db->query("SELECT * FROM penjemputan");
        $pengepul = $this->db->query("SELECT * FROM pengepul_aktif");
        $sampah = $this->db->query("SELECT * FROM sampah");

        $data['pemesanan']=$pemesanan->num_rows();
        $data['penjemputan']=$penjemputan->num_rows();
        $data['pengepul']=$pengepul->num_rows();
        $data['sampah']=$sampah->num_rows();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/templates/footer');
    }
}
?>
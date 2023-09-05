<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('status') != "login"){
        redirect(base_url("loginpengepul"));
        }

        if($this->session->userdata('level') != "pengepul"){
            redirect(base_url("loginpengepul"));
            }

    }

    public function index(){
        $data['title'] = "Dashboard Pengepul";
        $user_idpengepul = $this->session->userdata['pengepul_id'];

        $penjemputan = $this->db->query("SELECT * FROM penjemputan WHERE penjemputan_pengepul='$user_idpengepul' AND penjemputan_status='Proses'");
        $penjemputanselesai = $this->db->query("SELECT * FROM penjemputan WHERE penjemputan_pengepul='$user_idpengepul' AND penjemputan_status='Selesai'");
        $sampah = $this->db->query("SELECT * FROM sampah");

        $data['penjemputan']=$penjemputan->num_rows();
        $data['penjemputanselesai']=$penjemputanselesai->num_rows();
        $data['sampah']=$sampah->num_rows();

        $this->load->view('pengepul/templates/header',$data);
        $this->load->view('pengepul/templates/sidebar');
        $this->load->view('pengepul/dashboard',$data);
        $this->load->view('pengepul/templates/footer');
    }
}
?>
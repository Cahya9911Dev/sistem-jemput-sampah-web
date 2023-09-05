<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatjemputan extends CI_Controller{

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
        $data['title'] = "Riwayat Penjemputan";
        $user_idpengepul = $this->session->userdata['pengepul_id'];

        $riwayatjemputan = $this->db->query("SELECT * FROM penjemputan_proses WHERE penjemputan_pengepul='$user_idpengepul' AND penjemputan_status='Selesai' ORDER BY penjemputan_id DESC");

        $data['riwayatjemputan']=$riwayatjemputan->result();

        $this->load->view('pengepul/templates/header',$data);
        $this->load->view('pengepul/templates/sidebar');
        $this->load->view('pengepul/riwayatjemputan',$data);
        $this->load->view('pengepul/templates/footer');
    }

}
?>
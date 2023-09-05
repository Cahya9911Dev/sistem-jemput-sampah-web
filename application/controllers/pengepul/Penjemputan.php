<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjemputan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->model('m_penjemputan');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginpengepul"));
        }
        
        if($this->session->userdata('level') != "pengepul"){
            redirect(base_url("loginpengepul"));
        }
    }

    public function index(){
        $data['title'] = "Data Penjemputan";
        $user_idpengepul = $this->session->userdata['pengepul_id'];

        $penjemputanpengepul = $this->db->query("SELECT * FROM penjemputan_proses WHERE penjemputan_pengepul='$user_idpengepul' AND penjemputan_status='Dikirim' ORDER BY penjemputan_id ASC");

        $data['penjemputanpengepul']=$penjemputanpengepul->result();

        $this->load->view('pengepul/templates/header',$data);
        $this->load->view('pengepul/templates/sidebar');
        $this->load->view('pengepul/penjemputan',$data);
        $this->load->view('pengepul/templates/footer');
    }

    public function prosespenjemputan($pemesanan_id){

        $wherepenjemputan = array('penjemputan_pemesanan' => $pemesanan_id);
        $wherepemesanan = array('pemesanan_id' => $pemesanan_id);

        $penjemputanstatus = array('penjemputan_status'=>'Selesai');
        $pemesananstatus = array('pemesanan_status'=>'Selesai');

        $this->m_penjemputan->updatestatuspenjemputan('penjemputan',$penjemputanstatus,$wherepenjemputan);
        $this->m_pemesanan->updatestatuspemesanan('pemesanan',$pemesananstatus,$wherepemesanan);

        $text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Penjemputan Berhasil Diproses!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('pengepul/penjemputan');
    }

    public function printpenjemputan($penjemputan_id){
        $data['title'] = "Cetak Data Penjemputan";
        $where = array('penjemputan_id' => $penjemputan_id);
        $data['printpenjemputan'] = $this->db->query("SELECT * FROM penjemputan_proses WHERE penjemputan_id='$penjemputan_id'")->result();
        
        $this->load->view('pengepul/templates/header',$data);
        $this->load->view('pengepul/printpenjemputan',$data);
    }

}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_pemesanan');
        $this->load->model('m_pengepul');
        $this->load->model('m_penjemputan');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginadmin"));
        }

        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
        }
    }
    public function index(){
        $data['title'] = "Data Pemesanan";
        $data['pemesanan'] = $this->m_pemesanan->get_data('pemesanan_det')->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pemesanan',$data);
        $this->load->view('admin/templates/footer');
    }

    public function prosespemesanan($pemesanan_id){
        $data['title'] = 'Proses Penjemputan Sampah';
        $data['pengepul'] = $this->m_pengepul->get_data('pengepul_aktif')->result();
        $data['pemesanan'] = $this->db->query("SELECT * FROM pemesanan WHERE pemesanan_id='$pemesanan_id'")->result();
        
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/prosespemesanan',$data);
        $this->load->view('admin/templates/footer');
    }


    public function prosespemesananaksi(){
        $pemesanan_id   = $this->input->post('pemesanan_id');
        $pengepul_id    = $this->input->post('pengepul_id');

        $data = array(
                'penjemputan_pemesanan'  => $pemesanan_id,
                'penjemputan_pengepul'   => $pengepul_id,
        );

        $pemesanan = array('pemesanan_id' => $pemesanan_id);
        $pemesananstatus = array('pemesanan_status'=>'Diproses'); 

        $this->m_pemesanan->updatestatuspemesanan('pemesanan',$pemesananstatus,$pemesanan);
        $this->m_penjemputan->tambahpenjemputan($data,'penjemputan');
        $text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Pemesanan Berhasil Diproses!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/pemesanan');
    }

}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_kategorisampah');
        $this->load->model('m_sampah');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginpengepul"));
        }

        if($this->session->userdata('level') != "pengepul"){
            redirect(base_url("loginpengepul"));
            }
    }


    public function index(){
        $data['title']      = "Kategori Sampah";
        $data['kategori']   = $this->m_kategorisampah->get_data('kategori_sampah')->result();

        $this->load->view('pengepul/templates/header',$data);
        $this->load->view('pengepul/templates/sidebar');
        $this->load->view('pengepul/kategorisampah',$data);
        $this->load->view('pengepul/templates/footer');
    }

    public function detailsampah($kategori_id){
        $data['title'] = "Daftar Sampah $kategori_id";
        $data['kategori'] = $this->db->query("SELECT * FROM kategori_sampah WHERE kategori_id='$kategori_id'")->result();
        $tampilsampah = $this->m_kategorisampah->tampilsampah($kategori_id);
        $data['tampilsampah'] = $tampilsampah;
        
        $this->load->view('pengepul/templates/header',$data);
        $this->load->view('pengepul/templates/sidebar');
        $this->load->view('pengepul/jenissampah',$data);
        $this->load->view('pengepul/templates/footer');
    }
    }
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriSampah extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_kategorisampah');
        $this->load->model('m_sampah');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginadmin"));
        }

        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
            }
    }


    public function index(){
        $data['title']      = "Kategori Sampah";
        $data['kategori']   = $this->m_kategorisampah->get_data('kategori_sampah')->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/kategorisampah',$data);
        $this->load->view('admin/templates/footer');
    }

    public function tambahkategori(){
        $data['title'] = "Tambah Kategori Sampah";
        $this->load->model("M_kategorisampah");  

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahkategori',$data);
        $this->load->view('admin/templates/footer');
    }   


    public function tambahkategoriaksi(){
        $kategori_id = $this->input->post('kategori_id');
        $kategori_nama = $this->input->post('kategori_nama');

        $kategori_idcek= $this->db->get_where('kategori_sampah',['kategori_id' => $kategori_id])->row_array();
        $kategori_namacek= $this->db->get_where('kategori_sampah',['kategori_nama' => $kategori_nama])->row_array();

        $data = array(
                'kategori_id' => $kategori_id,
                'kategori_nama' => $kategori_nama,
        );
        //data kategori sampah ada
        if($kategori_idcek['kategori_id'] == $kategori_id){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Kategori Sampah Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah/tambahkategori');
        }
        else if($kategori_namacek['kategori_nama'] == $kategori_nama){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Kategori Sampah Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah/tambahkategori');
        }
        else {
            $this->m_kategorisampah->insertkategori($data,'kategori_sampah');
            $text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Kategori Sampah Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah');
        }
    }

    public function updatekategori($kategori_id){
        $where = array('kategori_id' => $kategori_id);
        $data['title'] = 'Update Data Kategori Sampah';
        $data['kategori'] = $this->db->query("SELECT * FROM kategori_sampah WHERE kategori_id='$kategori_id'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatekategori',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatekategoriaksi(){
        $kategori_id = $this->input->post('kategori_id');
        $kategori_nama = $this->input->post('kategori_nama');

        $kategori_namacek= $this->db->get_where('kategori_sampah',['kategori_nama' => $kategori_nama])->row_array();

        $data = array(
                'kategori_id' => $kategori_id,
                'kategori_nama' => $kategori_nama,
        );

        $where = array('kategori_id' => $kategori_id);

        if($kategori_namacek['kategori_nama'] == $kategori_nama){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Update Data Kategori Sampah Gagal, Data Kategori Sampah Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah/updatekategori/'.$kategori_id);
        }
        else {
            $this->m_kategorisampah->updatekategori('kategori_sampah',$data,$where);
            $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Kategori Sampah Berhasil Diperbarui!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah');
        }
    }

    public function hapuskategori($kategori_id){

        $wherekategori = array('sampah_kategori'=> $kategori_id);

        $this->m_kategorisampah->hapuskategori($kategori_id);
        $this->m_sampah->hapusbykategori('sampah',$wherekategori);
        
        $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Kategori Sampah Berhasil Dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/kategorisampah');
    }

    public function detailsampah($kategori_id){
        $data['title'] = "Daftar Sampah $kategori_id";
        $data['kategori'] = $this->db->query("SELECT * FROM kategori_sampah WHERE kategori_id='$kategori_id'")->result();
        $tampilsampah = $this->m_kategorisampah->tampilsampah($kategori_id);
        $data['tampilsampah'] = $tampilsampah;
        
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/jenissampah',$data);
        $this->load->view('admin/templates/footer');
    }
    }
?>
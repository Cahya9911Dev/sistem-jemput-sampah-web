<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sampah extends CI_Controller{
    
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

    public function tambahsampah($kategori_id){
        $kategori = array('kategori_id' => $kategori_id);
        $data['title'] = 'Tambah Data Sampah';
        $data['kategori'] = $this->db->query("SELECT * FROM kategori_sampah WHERE kategori_id='$kategori_id'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahsampah',$data);
        $this->load->view('admin/templates/footer');
    }

    public function tambahsampahaksi(){
        $sampah_id          = $this->input->post('sampah_id');
        $sampah_kategori    = $this->input->post('sampah_kategori');
        $sampah_nama        = $this->input->post('sampah_nama');
        $sampah_harga       = $this->input->post('sampah_harga');

        $sampah_idcek= $this->db->get_where('sampah',['sampah_id' => $sampah_id])->row_array();
        $sampah_namacek= $this->db->get_where('sampah',['sampah_nama' => $sampah_nama])->row_array();

        $data = array(
                'sampah_id'         => $sampah_id,
                'sampah_kategori'   => $sampah_kategori,
                'sampah_nama'       => $sampah_nama,
                'sampah_harga'      => $sampah_harga
        );

        if($sampah_idcek['sampah_id'] == $sampah_id OR $sampah_namacek['sampah_nama'] == $sampah_nama){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Tambah Data Sampah Gagal, Data Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/sampah/tambahsampah/'.$sampah_kategori);
        }
        else {
            $this->m_sampah->insertsampah($data,'sampah');
            $text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Sampah Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah');
        }
    }

    public function updatesampah($sampah_id){
        $where = array('sampah_id' => $sampah_id);
        $data['title'] = 'Update Data Sampah';
        $data['sampah'] = $this->db->query("SELECT * FROM sampah WHERE sampah_id='$sampah_id'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatesampah',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatesampahaksi(){
        $sampah_id      = $this->input->post('sampah_id');
        $sampah_nama    = $this->input->post('sampah_nama');

        $sampah_namacek= $this->db->get_where('sampah',['sampah_nama' => $sampah_nama])->row_array();

        $data = array(
                'sampah_id' => $sampah_id,
                'sampah_nama' => $sampah_nama,
        );

        $where = array('sampah_id' => $sampah_id);

        if($sampah_namacek['sampah_nama'] == $sampah_nama){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Update Data Sampah Gagal, Nama Sampah Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/sampah/updatesampah/'.$sampah_id);
        }
        else {
            $this->m_sampah->updatesampah('sampah',$data,$where);
            $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Sampah Berhasil Diperbarui!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/kategorisampah');
        }
    }

    public function updatehargasampah($sampah_id){
        $where = array('sampah_id' => $sampah_id);
        $data['title'] = 'Update Harga Sampah';
        $data['sampah'] = $this->db->query("SELECT * FROM sampah WHERE sampah_id='$sampah_id'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatehargasampah',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatehargasampahaksi(){
        $sampah_id          = $this->input->post('sampah_id');
        $sampah_harga       = $this->input->post('sampah_harga');
        $sampah_hargabaru   = $this->input->post('sampah_hargabaru');

        $data = array(
                'sampah_id' => $sampah_id,
                'sampah_harga' => $sampah_hargabaru,
        );

        $where = array('sampah_id' => $sampah_id);

        if ($sampah_harga == $sampah_hargabaru){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Update Harga Sampah Gagal, Masukkan Harga Baru!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                echo $this->session->set_flashdata('msg',$text);
                redirect('admin/sampah/updatehargasampah/'.$sampah_id);
        }
        else{
        $this->m_sampah->updatesampah('sampah',$data,$where);
        $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Harga Sampah Berhasil Diperbarui!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/kategorisampah');
        }
    }

    public function hapussampah($sampah_id){

        $this->m_sampah->hapussampah($sampah_id);
        $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Sampah Berhasil Dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/kategorisampah');
    }

}
?>

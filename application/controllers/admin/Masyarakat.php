<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_masyarakat');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginadmin"));
        }

        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
        }
    }
    public function index(){
        $data['title'] = "Data Masyarakat";
        $data['masyarakat'] = $this->m_masyarakat->get_data('masyarakat')->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/masyarakat',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatemasyarakat($masyarakat_nomorhp){
        $where = array('masyarakat_nomorhp' => $masyarakat_nomorhp);
        $data['title'] = 'Update Data Masyarakat';
        $data['masyarakat'] = $this->db->query("SELECT * FROM masyarakat WHERE masyarakat_nomorhp='$masyarakat_nomorhp'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatemasyarakat',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatemasyarakataksi(){
        $masyarakat_nomorhp   = $this->input->post('masyarakat_nomorhp');
        $masyarakat_nama      = $this->input->post('masyarakat_nama');
        $masyarakat_alamat    = $this->input->post('masyarakat_alamat');
        $masyarakat_namabaru  = $this->input->post('masyarakat_namabaru');
        $masyarakat_alamatbaru = $this->input->post('masyarakat_alamatbaru');

        $data = array(
                'masyarakat_nama'     => $masyarakat_namabaru,
                'masyarakat_alamat'   => $masyarakat_alamatbaru,
        );

        $where = array('masyarakat_nomorhp'  => $masyarakat_nomorhp);

        if ($masyarakat_nama == $masyarakat_namabaru AND $masyarakat_alamat == $masyarakat_alamatbaru){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Update Data Masyarakat Gagal, Masukkan Data Baru!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/masyarakat/updatemasyarakat/'.$masyarakat_nomorhp);
        }
        else{
            $this->m_masyarakat->updatemasyarakat('masyarakat',$data,$where);
            $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Masyarakat Berhasil Diperbarui!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/masyarakat');
        }
    }

    public function updatepasswordmasyarakat($masyarakat_nomorhp){
        $where = array('masyarakat_nomorhp' => $masyarakat_nomorhp);
        $data['title'] = 'Ganti Password Masyarakat';
        $data['masyarakat'] = $this->db->query("SELECT * FROM masyarakat WHERE masyarakat_nomorhp='$masyarakat_nomorhp'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatepasswordmasyarakat',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatepasswordmasyarakataksi(){
        $masyarakat_nomorhp = $this->input->post('masyarakat_nomorhp');
        $masyarakat_password  = $this->input->post('masyarakat_password');

        $data = array(
                'masyarakat_password' => $masyarakat_password,
        );

        $where = array('masyarakat_nomorhp'  => $masyarakat_nomorhp);

        $this->m_masyarakat->updatemasyarakat('masyarakat',$data,$where);
        $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Password Masyarakat Berhasil Diperbarui!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/masyarakat');
    }
}
?>
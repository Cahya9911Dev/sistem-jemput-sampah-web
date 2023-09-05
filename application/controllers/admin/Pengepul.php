<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengepul extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_pengepul');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("loginadmin"));
        }
        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
        }
    }
    public function index(){
        $data['title'] = "Data Pengepul";
        $data['pengepul']   = $this->m_pengepul->get_data('pengepul_aktif')->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/pengepul',$data);
        $this->load->view('admin/templates/footer');
    }

    public function tambahpengepul(){
        $data['title'] = "Tambah Pengepul";
        $this->load->model("M_pengepul");  

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahpengepul',$data);
        $this->load->view('admin/templates/footer');
    }   


    public function tambahpengepulaksi(){
        $pengepul_id        = $this->input->post('pengepul_id');
        $pengepul_nama      = $this->input->post('pengepul_nama');
        $pengepul_nomorhp   = $this->input->post('pengepul_nomorhp');
        $pengepul_password  = $this->input->post('pengepul_password');
        $pengepul_alamat    = $this->input->post('pengepul_alamat');

        $pengepul_idcek= $this->db->get_where('pengepul',['pengepul_id' => $pengepul_id])->row_array();
        $pengepul_nohpcek= $this->db->get_where('pengepul',['pengepul_nomorhp' => $pengepul_nomorhp])->row_array();

        $data = array(
                'pengepul_id'       => $pengepul_id,
                'pengepul_nama'     => $pengepul_nama,
                'pengepul_alamat'   => $pengepul_alamat,
                'pengepul_nomorhp'  => $pengepul_nomorhp,
                'pengepul_password' => (md5($pengepul_password)),
        );

        if($pengepul_idcek['pengepul_id'] == $pengepul_id OR $pengepul_nohpcek['pengepul_nomorhp'] == $pengepul_nomorhp){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Tambah Data Pengepul Gagal, Data Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/pengepul/tambahpengepul');
        }
        else {
            $this->m_pengepul->insertpengepul($data,'pengepul');
            $text = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Pengepul Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/pengepul');
        }
    }

    public function updatepengepul($pengepul_id){
        $where = array('pengepul_id' => $pengepul_id);
        $data['title'] = 'Update Data Pengepul';
        $data['pengepul'] = $this->db->query("SELECT * FROM pengepul WHERE pengepul_id='$pengepul_id'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatepengepul',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatepengepulaksi(){
        $pengepul_id        = $this->input->post('pengepul_id');
        $pengepul_nama      = $this->input->post('pengepul_nama');
        $pengepul_nomorhp   = $this->input->post('pengepul_nomorhp');
        $pengepul_alamat    = $this->input->post('pengepul_alamat');

        $pengepul_nohpcek= $this->db->get_where('pengepul',['pengepul_nomorhp' => $pengepul_nomorhp])->row_array();

        $data = array(
                'pengepul_id'       => $pengepul_id,
                'pengepul_nama'     => $pengepul_nama,
                'pengepul_alamat'   => $pengepul_alamat,
                'pengepul_nomorhp'  => $pengepul_nomorhp,
        );

        $where = array('pengepul_id' => $pengepul_id);

        if($pengepul_nohpcek['pengepul_nomorhp'] == $pengepul_nomorhp){
            $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Update Data Pengepul Gagal, Data Sudah Ada!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/pengepul/updatepengepul/'.$pengepul_id);
        }
        else {
            $this->m_pengepul->updatepengepul('pengepul',$data,$where);
            $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Pengepul Berhasil Diperbarui!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            echo $this->session->set_flashdata('msg',$text);
            redirect('admin/pengepul');
        }
    }

    public function updatepasswordpengepul($pengepul_id){
        $where = array('pengepul_id' => $pengepul_id);
        $data['title'] = 'Ganti Password Pengepul';
        $data['pengepul'] = $this->db->query("SELECT * FROM pengepul WHERE pengepul_id='$pengepul_id'")->result();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updatepasswordpengepul',$data);
        $this->load->view('admin/templates/footer');
    }

    public function updatepasswordpengepulaksi(){
        $pengepul_id        = $this->input->post('pengepul_id');
        $pengepul_password  = $this->input->post('pengepul_password');

        $data = array(
                'pengepul_password' => (md5($pengepul_password)),
        );

        $where = array('pengepul_id' => $pengepul_id);

        $this->m_pengepul->updatepengepul('pengepul',$data,$where);
        $text = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Password Pengepul Berhasil Diperbarui!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/pengepul');
    }

    public function hapuspengepul($pengepul_id){
        $data = array('pengepul_status'=>'Tidak Aktif'); 
        $where = array('pengepul_id'=> $pengepul_id);

        $this->m_pengepul->hapuspengepul('pengepul',$data,$where);
        $text = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Pengepul Berhasil Dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        echo $this->session->set_flashdata('msg',$text);
        redirect('admin/pengepul');
    }
}
?>
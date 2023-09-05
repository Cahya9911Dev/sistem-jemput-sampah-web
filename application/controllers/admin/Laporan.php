<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_penjemputan');

        if($this->session->userdata('status') != "login"){
        redirect(base_url("loginadmin"));
        }

        if($this->session->userdata('level') != "admin"){
            redirect(base_url("loginadmin"));
        }
    }

	public function index()
	{
        $data['title'] = "Rekap Laporan Transaksi Penjemputan Sampah";
		$data['tahun']            = $this->M_penjemputan->gettahun();
		$data['pengepul']         = $this->M_penjemputan->getdatapengepul();
		$data['jenis_sampah']     = $this->M_penjemputan->getdatasampah();
        
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporan',$data);
        $this->load->view('admin/templates/footer');
    
	}


	function filter(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$nilaifilter = $this->input->post('nilaifilter');
		$jenis_sampah = $this->input->post('jenis_sampah');
		$pengepul = $this->input->post('pengepul');
			
			$data['title'] = "Rekap Laporan Penjemputan Sampah";
			$data['subtitle'] = "Dari tanggal : ".$tanggalawal.' Sampai tanggal : '.$tanggalakhir;
			
			if($jenis_sampah == null and $pengepul == null){
				$where = array(
					'pemesanan_tanggal >=' => $tanggalawal,
					'pemesanan_tanggal <=' => $tanggalakhir,
				);
				$data['datafilter'] = $this->M_penjemputan->filterbytanggal($where);
			}else {
				
				if($pengepul == null ){
				$where = array(
					'pemesanan_tanggal >=' => $tanggalawal,
					'pemesanan_tanggal <=' => $tanggalakhir,
					'sampah_nama' => $jenis_sampah,
				);
				$data['datafilter'] = $this->M_penjemputan->filterbytanggal($where);
				
				}else if($jenis_sampah == null){
					$where = array(
						'pemesanan_tanggal >=' => $tanggalawal,
						'pemesanan_tanggal <=' => $tanggalakhir,
						'penjemputan_pengepul' => $pengepul,
					);
					$data['datafilter'] = $this->M_penjemputan->filterbytanggal($where);
				}else{
					$where = array(
						'pemesanan_tanggal >=' => $tanggalawal,
						'pemesanan_tanggal <=' => $tanggalakhir,
						'penjemputan_pengepul' => $pengepul,
						'sampah_nama' => $jenis_sampah,
					);
					$data['datafilter'] = $this->M_penjemputan->filterbytanggal($where);
				}
			}

            $this->load->view('admin/templates/header',$data);
			$this->load->view('admin/print_laporan', $data);
            $this->load->view('admin/templates/footer');
        }
    }
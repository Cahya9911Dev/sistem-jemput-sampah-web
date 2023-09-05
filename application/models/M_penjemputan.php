<?php

class M_penjemputan extends CI_Model{

    private $table = 'penjemputan';

    public function get_data($table){
        return $this->db->get($table);  
    }

    public function tambahpenjemputan($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function penjemputanpengepul($table,$user_idpengepul){
        $this->db->get($table,$user_idpengepul);
    }

    public function updatestatuspenjemputan($table,$penjemputanstatus,$wherepenjemputan){
        $this->db->update($table,$penjemputanstatus,$wherepenjemputan);
    }

    function gettahun(){

		$query = $this->db->query("SELECT YEAR(pemesanan_tanggal) AS tahun FROM penjemputan_proses GROUP BY YEAR(pemesanan_tanggal) ORDER BY YEAR(pemesanan_tanggal) ASC");

		return $query->result();

	}

	function getdatapengepul()
	{
		$query = $this->db->query(" SELECT * FROM pengepul ORDER BY pengepul_id ASC");

		return $query->result();
	}

	function getdatasampah()
	{
		$query = $this->db->query(" SELECT * FROM sampah ORDER BY sampah_id ASC");

		return $query->result();
	}

	function filterbytanggal($where){

		$query = $this->db->get_where('penjemputan_proses',$where);

		return $query->result();
	}
    

}

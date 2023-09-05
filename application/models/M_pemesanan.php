<?php

class M_pemesanan extends CI_Model{
    private $table = 'pemesanan';


    public function get_data($table){
        return $this->db->get($table);  
    }

    public function updatestatuspemesanan($table,$pemesananstatus,$wherepemesanan){
        $this->db->update($table,$pemesananstatus,$wherepemesanan);
    }

}
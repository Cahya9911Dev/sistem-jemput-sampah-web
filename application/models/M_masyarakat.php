<?php

class M_masyarakat extends CI_Model{
    private $table = 'masyarakat';
    private $id = 'masyarakat_nomorhp';
    private $nama = 'masyarakat_nama';


    public function get_data($table){
        return $this->db->get($table);  
    }

    public function updatemasyarakat($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

}
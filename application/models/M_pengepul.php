<?php

class M_pengepul extends CI_Model{
    private $table = 'pengepul';
    private $id = 'pengepul_id';
    private $nama = 'pengepul_nama';


    public function get_data($table){
        return $this->db->get($table);  
    }

    public function insertpengepul($data,$table){
        $this->db->insert($table,$data);
    }

    public function updatepengepul($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    public function hapuspengepul($table,$data,$where){
        $this->db->update($table, $data,$where);
    }
}

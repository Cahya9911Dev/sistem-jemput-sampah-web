<?php

class M_sampah extends CI_Model{

    private $table = 'sampah';
    private $id = 'sampah.sampah_id';
    private $kid ='sampah.sampah_kategori';


    public function insertsampah($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function updatesampah($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    public function hapussampah($sampah_id){
        $this->db->where($this->id, $sampah_id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function hapusbykategori($table,$wherekategori){
        $this->db->delete($table,$wherekategori);
    }
}

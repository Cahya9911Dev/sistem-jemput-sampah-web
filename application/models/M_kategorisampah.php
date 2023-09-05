<?php

class M_kategorisampah extends CI_Model{
    private $table = 'kategori_sampah';
    private $id = 'kategori_sampah.kategori_id';
    private $nama = 'kategori_sampah.kategori_nama';


    public function get_data($table){
        return $this->db->get($table);  
    }

    public function tampilsampah($kategori_id){
        $query = $this->db->query("SELECT
        sampah.`sampah_id`,
        kategori_sampah.`kategori_nama`,
        sampah.`sampah_nama`,
        sampah.`sampah_harga`
        FROM sampah
        JOIN kategori_sampah
        ON sampah.`sampah_kategori` = kategori_sampah.`kategori_id`
        WHERE kategori_sampah.`kategori_id`='$kategori_id'")->result_array();
        return $query;
    }
        
    public function insertkategori($data,$table){
        $this->db->insert($table,$data);
    }

    public function updatekategori($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    public function hapuskategori($kategori_id)
    {
        $this->db->where($this->id, $kategori_id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

}

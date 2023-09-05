
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sampah_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_data()
    {
        $this->db->select('K.*, S.*');
        $this->db->from('sampah AS S');
        $this->db->join('kategori_sampah AS K', 'K.kategori_id = S.sampah_kategori', 'left');
        $query = $this->db->get();
        return $query->result();
    }
}

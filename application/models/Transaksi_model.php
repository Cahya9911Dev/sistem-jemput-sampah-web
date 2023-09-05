
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function input_transaksi($params)
    {
        return $this->db->insert('pemesanan', $params);
    }

    function get_data_id($id)
    {
        $this->db->select('P.*, S.*');
        $this->db->from('pemesanan AS P');
        $this->db->join('sampah AS S', 'S.sampah_id = P.pemesanan_sampah', 'left');
        $this->db->where('P.pemesanan_masyarakat', $id);
        $this->db->order_by('P.pemesanan_tanggal', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}

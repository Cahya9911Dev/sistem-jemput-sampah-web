
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function is_valid_login($username, $password)
  {
    $this->db->select('*');
    $this->db->from('masyarakat');
    $this->db->where('masyarakat_nomorhp', $username);
    $this->db->where('masyarakat_password', $password);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function is_valid_regis($params)
  {
    return $this->db->insert('masyarakat', $params);
  }
}

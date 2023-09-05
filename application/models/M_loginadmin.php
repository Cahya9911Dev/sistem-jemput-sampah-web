<?php
class M_loginadmin extends CI_Model{

    //cek username dan password
    public function login_admin($admin_id,$admin_password){
      return $this->db->query("SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_password='$admin_password'")->row();
    }
}

?>
<?php
class M_loginpengepul extends CI_Model{

    //cek username dan password 
    public function login_pengepul($pengepul_nomorhp,$pengepul_password){
      return $this->db->query("SELECT * FROM pengepul WHERE pengepul_nomorhp='$pengepul_nomorhp' AND pengepul_password='$pegepul_password'")->row();
    }
}

?>
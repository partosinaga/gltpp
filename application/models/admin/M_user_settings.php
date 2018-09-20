<?php
class M_user_settings extends CI_Model{



	public function get_user(){
		$data = $this->db->query("select * from user");
		return $data->result();
	}

	public function change_password($id, $new){
		$this->db->query("update user set password = '".$new."' where username = '".$id."' ");
	}
}
?>
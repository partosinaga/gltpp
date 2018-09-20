<?php
class M_approve extends CI_Model{

	public function cek_user($us){
		$data = $this->db->query("SELECT u.user_id, le.order FROM `user` u join log_email le on u.user_id = le.user_id WHERE u.user_id = '".$us."'");
	return $data->row();
	}
	public function get_onest(){
		$data = $this->db->query("SELECT * FROM `jv_header` where approve_status = 1;");
	return $data->result();
	}
	public function get_second(){
		$data = $this->db->query("SELECT * FROM `jv_header` where approve_status = 2;");
	return $data->result();
	}
	public function get_third(){
		$data = $this->db->query("SELECT * FROM `jv_header` where approve_status = 3;");
	return $data->result();
	}
	public function get_fourth(){
		$data = $this->db->query("SELECT * FROM `jv_header` where approve_status = 4;");
	return $data->result();
	}
	public function get_header($id){
		$data = $this->db->query("SELECT * FROM `jv_header` where no_voucher = '".$id."' ");
	return $data->row();
	}
	public function get_detail($id){
		$data = $this->db->query("
			SELECT
				jv.coa_id,
				c.name_coa,
				jv.debit,
				jv.credit
			FROM
				jv_detail jv
			JOIN coa c
			on c.coa_id = jv.coa_id
					 WHERE jv.no_voucher = '".$id."';");
	return $data->result();
	}

	public function add_suggest($data,$table){
		$this->db->insert($table,$data);
	}
	public function cek_max_le(){
		$data = $this->db->query("SELECT MAX(`order`) as max_le FROM `log_email`;");
		return $data->row();
	}
	public function cek_max_jv($id){
		$data = $this->db->query("SELECT MAX(approve_status) as max_jv FROM `jv_header` 
			WHERE no_voucher = '".$id."';");
		return $data->row();
	}
	public function update_approveStatus($id){
		$data = $this->db->query("UPDATE jv_header set approve_status = 0 where no_voucher = '".$id."'");
	}
	public function cek_order($id){
		$data = $this->db->query("SELECT approve_status FROM jv_header WHERE no_voucher = '".$id."';");
	return $data->row();
	}
	public function jv_accept($id, $order){
		$data = $this->db->query("UPDATE jv_header SET approve_status = ".$order." WHERE no_voucher = '".$id."' ");
	}

	public function header_status($id){
		$data = $this->db->query("
			SELECT
				a.no_voucher,
				a.date,
				a.bank_id,
				a.description,
				a.curr_id,
				a.total,
				a.kurs,
				a.receive_from,
				a.no_cek,
				a.gl_date,
				u.username,
				a.approve_status
			FROM
				jv_header a
			LEFT JOIN log_email e ON e.`order` = a.approve_status
			LEFT JOIN `user` u ON `u`.user_id = e.user_id
			WHERE
				a.no_voucher = '".$id."'");
		return $data->row();
	}
	public function detail_status($id){
		$data = $this->db->query("
			SELECT
				d.coa_id,
				c.name_coa,
				d.debit,
				d.credit
			FROM
				jv_detail d
			JOIN coa c ON c.coa_id = d.coa_id
			WHERE
				d.no_voucher = '".$id."'");
		return $data->result();
	}
	public function trx_suggest($id){
		$data = $this->db->query("
			SELECT * FROM log_suggest JOIN user on user.user_id = log_suggest.user_id WHERE no_voucher = '".$id."' AND module = 'jv' ");
		return $data->result();
	}
}
?>
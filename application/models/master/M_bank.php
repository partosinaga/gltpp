<?php
class M_bank extends CI_Model{

	public function get_bank(){
		$data = $this->db->query("select * from bank
									join currency
									on bank.currency = currency.curr_id");
		return $data->result();
	}

	public function add_bank($data,$table){
		$this->db->insert($table,$data);
	}

	public  function edit_bank($id){
		$data = $this->db->query("select * from bank
									join currency
									on bank.currency = currency.curr_id
									where bank.id = '".$id."' ");
		return $data->result();
	}

	public function save_edit($id, $bank_id, $name, $account_code, $currency, $start_date, $begining_balance){
		$data = $this->db->query(" update bank set bank_id = '".$bank_id."' , name = '".$name."' , account_code = '".$account_code."' , currency = '".$currency."' , start_date = '".$start_date."' , begining_balance = '".$begining_balance."'  
			where id = '".$id."'");
	}

	public function get_kode(){
		$q = $this->db->query("select MAX(RIGHT(account_code,2)) as kt from bank");
		$kd="";
		if($q->num_rows()>0){
			foreach ($q->result() as $k){
				$tmp = ((int)$k->kt)+1;
				$kd = sprintf("%02s", $tmp);
			}
		}else {
			$kd = "01";
		}
		return "10102".$kd;
	}

	public function cek_account_code_coa($account_code){
		$data = $this->db->query("select * from bank where account_code = '".$account_code."' ");
		return $data->result();
	}

	public function cek_account_code_bank($bank_id){
		$data = $this->db->query("select * from bank where bank_id = '".$bank_id."' ");
		return $data->result();
	}
}
?>
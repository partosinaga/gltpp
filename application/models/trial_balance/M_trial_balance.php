<?php
class M_trial_balance extends CI_Model{


	public function get_begining($yeart_start, $date_from){
		$data = $this->db->query("
			SELECT
				c.coa_id,
				c.name_coa,
				h.description,
				SUM( d.debit ) AS d_begin,
				SUM( d.credit ) AS c_begin 
			FROM
				gl_detail d
				JOIN coa c ON c.coa_id = d.coa_id
				JOIN gl_header h ON h.gl_no = d.gl_no 
			WHERE
				h.gl_date BETWEEN '".$yeart_start."' AND '".$date_from."' 
			GROUP BY
				d.coa_id
			");
		return $data->result();
	}

	public function get_mutasi($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				c.coa_id,
				c.name_coa,
				h.description,
				SUM( d.debit ) AS d_mutasi,
				SUM( d.credit ) AS c_mutasi
			FROM
				gl_detail d
				JOIN coa c ON c.coa_id = d.coa_id
				JOIN gl_header h ON h.gl_no = d.gl_no 
			WHERE
				h.gl_date BETWEEN '".$date_from."' AND '".$date_to."' 
			GROUP BY
				d.coa_id
			");
		return $data->result();
	}

}
?>
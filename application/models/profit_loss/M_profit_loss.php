<?php
class M_profit_loss extends CI_Model{

	public function get_income($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) as income
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date between '".$date_from."' AND '".$date_to."'
			AND sg.kelompok = 5
			GROUP BY
				coa.coa_id
		");
		return $data->result();
	}


	public function get_cogs($date_from, $date_to){
		$data = $this->db->query("
				SELECT
					cs.coa_id,
					coa.name_coa,
					SUM(cs.saldo) as cogs
				FROM
					closed_saldo cs
				JOIN coa ON coa.coa_id = cs.coa_id
				JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
				WHERE
					cs.date between '".$date_from."' AND '".$date_to."'
				AND sg.kelompok = 6
				GROUP BY
					coa.coa_id
			");
		return $data->result();
	}
	public function get_expense($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) as expense
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
			cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok BETWEEN 7 AND 8
			GROUP BY
				coa.coa_id
			ORDER BY
				coa.coa_id ASC
				");
		return $data->result();
	}

	public function sum_income($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) as sum_income
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
			cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok = 5
			");
		return $data->row();
	}

	public function sum_cogs($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) as sum_cogs
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
			cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok = 6
			");
		return $data->row();
	}

	public function sum_expense($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) as sum_expense
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
			cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok BETWEEN 7 AND 8
			");
		return $data->row();
	}

	// YEAR TO DATE
	public function get_previncome($date_to, $yy){
		$data = $this->db->query("
		SELECT
			cs.coa_id,
			coa.name_coa,
			SUM(cs.saldo) AS prev_income
		FROM
			closed_saldo cs
		JOIN coa ON coa.coa_id = cs.coa_id
		JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
		WHERE
			cs.date BETWEEN '".$yy."' AND '".$date_to."'
		AND sg.kelompok = 5
		GROUP BY
			coa.coa_id
			");
		return $data->result();
	}

	public function sum_prevIncome($date_to, $yy){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS prev_sum_income
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$yy."' AND '".$date_to."'
			AND sg.kelompok = 5
			");
		return $data->row();
	}
	public function get_prevCogs($date_to){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS prev_cogs
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN  (SELECT MAKEDATE(year(now()),1)) AND '".$date_to."'
			AND sg.kelompok = 6
			GROUP BY
				coa.coa_id
			");
		return $data->result();
	}
	public function sum_prevCogs($date_to){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS prev_sum_cogs
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN  (SELECT MAKEDATE(year(now()),1)) AND '".$date_to."'
			AND sg.kelompok = 6
			");
		return $data->row();
	}

	// PREV beban
	public function get_prevExpense($date_to, $yy){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS prev_expense
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$yy."' AND '".$date_to."'
			AND sg.kelompok BETWEEN 7
			AND 8
			GROUP BY
				coa.coa_id
			ORDER BY
				coa.coa_id ASC
			");
		return $data->result();
	}

	public function sum_prevExpense($date_to, $yy){
		$data = $this->db->query("
				SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS sum_prev_expense
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN  '".$yy."' AND '".$date_to."'
			AND sg.kelompok BETWEEN 7 AND 8
			");
		return $data->row();
	}

	
	public function other_in_ex($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS other_in_ex
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok = 9 
			GROUP BY
				coa.coa_id
			");
		return $data->result();
	}

	public function prev_other_in_ex($date_to, $yy){
		$data = $this->db->query("
			SELECT
				cs.coa_id,
				coa.name_coa,
				SUM(cs.saldo) AS prev_other_in_ex
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$yy."' AND '".$date_to."'
			AND sg.kelompok = 9
			GROUP BY
				coa.coa_id
			");
		return $data->result();
	}

	public function sum_other_in_ex($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) AS sum_other_in_ex
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok = 9
			");
		return $data->row();
	}

	public function rica($date_from, $date_to){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) AS ricabum
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$date_from."' AND '".$date_to."'
			AND sg.kelompok = 9 AND coa.name_coa LIKE 'B%'
			");
		return $data->row();
	}

	public function prev_rica($date_to, $yy){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) AS prev_ricabum
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$yy."' AND '".$date_to."'
			AND sg.kelompok = 9 AND coa.name_coa LIKE 'B%'
			");
		return $data->row();
	}

	public function sum_prev_other_in_ex($date_to, $yy){
		$data = $this->db->query("
			SELECT
				SUM(cs.saldo) AS sum_prev_other_in_ex
			FROM
				closed_saldo cs
			JOIN coa ON coa.coa_id = cs.coa_id
			JOIN subgroup sg ON sg.subgroup_id = coa.subgroup
			WHERE
				cs.date BETWEEN '".$yy."' AND '".$date_to."'
			AND sg.kelompok = 9
			");
		return $data->row();
	}
}
?>
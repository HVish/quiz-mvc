<?php
	class ModelAdmin extends CI_Model{
		public function __construct()
	    {
	        parent::__construct();
			$this->load->database();
	    }
		public function addq($q,$o1,$o2,$o3,$o4){
			$data = array('que' => $q, 'op1' => $o1, 'op2' => $o2, 'op3' => $o3, 'op4' => $o4);
			$qry = $this->db->insert_string('questions', $data);
			$result = $this->db->query($qry);
			return $result;
		}
		public function listq(){
			$query = $this->db->get('questions');
			$result = $query->result_array();
			return $result;
		}
		public function add_ms($p,$n,$h,$m,$s,$mpm){
			$data = array('p_marks' => $p, 'n_marks' => $n, 'hr' => $h, 'min' => $m, 'sec' => $s, 'min_pass' => $mpm);
			$where = "id = 1"; 
			$qry = $this->db->update_string('marking_scheme', $data,$where);
			$result = $this->db->query($qry);
			return $result;
		}
		public function list_result(){
			$query = $this->db->get('results');
			$result = $query->result_array();
			return $result;
		}
	}
?>
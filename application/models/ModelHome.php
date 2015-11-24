<?php
	class ModelHome extends CI_Model{
		public function __construct()
	    {
	        parent::__construct();
			$this->load->database();
	    }
		public function getque(){
			$this->db->select('que, op1, op2, op3, op4');
			$query = $this->db->get('questions');
			$result = $query->result_array();
			return $result;
		}
		public function gettime(){
			$this->db->select('hr, min, sec');
			$query = $this->db->get('marking_scheme');
			$result = $query->result_array();
			return $result;
		}
	}
?>
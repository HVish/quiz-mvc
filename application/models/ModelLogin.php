<?php
	class ModelLogin extends CI_Model{
		public function __construct()
	    {
	        parent::__construct();
			$this->load->database();
	    }
		public function check_user($u,$p){
			$query = $this->db->get('auth');
			foreach ($query->result() as $row)
			{
			    if($row->user == $u && $row->pass == $p){
					return TRUE;
				}
			}
			return FALSE;
		}
	}
?>
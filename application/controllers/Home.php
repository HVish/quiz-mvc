<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	//public $data;
	//public $ques;
	
	public function __construct(){
		 parent:: __construct();
		 $this->load->model('ModelHome');
	}
	public function index()
	{
		$id = $this->session->user_type;
		if($id != "Examinee"){
			redirect(base_url());
		}else{
			$ques = $this->ModelHome->getque();
			
			$ques = $this->shuffleque($ques);
			$ques = $this->shuffleopt($ques);
			
			$data['qna'] = json_encode($ques);
			
			$qkeys = array_keys($ques);
			$keys = array_keys($ques[0]);
			
			$data['counter'] = 1;
			$data['qkeys'] = json_encode($qkeys);
			$data['quenop'] = array('que' => $ques[$qkeys[0]]['que'],
				'choice1' => $ques[$qkeys[0]][$keys[1]],
				'choice2' => $ques[$qkeys[0]][$keys[2]],
				'choice3' => $ques[$qkeys[0]][$keys[3]],
				'choice4' => $ques[$qkeys[0]][$keys[4]]);
				
			$timer = $this->ModelHome->gettime();
			$data['timer'] = $timer[0];
			
			$this->load->view('header');
			$this->load->view('home',$data);
			$this->load->view('footer');
		}
	}
	
	public function shuffleque($list){
		if (!is_array($list)) return $list; 

		$keys = array_keys($list); 
		shuffle($keys); 
		$random = array(); 
		foreach ($keys as $key) { 
			$random[$key] = $list[$key]; 
		}
		return $random;
	}
	public function shuffleopt($list){
		if (!is_array($list)) return $list; 
		
		$keys = array_keys($list); 
		$random = array(); 
		foreach ($keys as $key) { 
			$opkeys = array('op1','op2','op3','op4');
			$random[$key]['que'] = $list[$key]['que']; 
			shuffle($opkeys);
			foreach($opkeys as $o){
				$random[$key][$o] = $list[$key][$o]; 
			}
		}
		return $random;
	}
}

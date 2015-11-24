<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function __construct(){
		 parent:: __construct();
		 $this->load->model('ModelAdmin');
	}
	public function index($e = '')
	{
		$data['msg']['adderror'] = "";
		$data['msg']['addsuccess'] = "";
		
		$data['msg']['merror'] = "";
		$data['msg']['msuccess'] = "";
		
		$data['list_table_data'] = $this->ModelAdmin->listq();
		$data['list_table_result'] = $this->ModelAdmin->list_result();
		
		if(!empty($e)){
			switch($e){
				case 'adderror':
					$data['msg']['adderror'] = "Question Couldn't be added!";
					break;
				case 'addsuccess':
					$data['msg']['addsuccess'] = "Question is successfully added!";
					$data['list_table_data'] = $this->ModelAdmin->listq();
					break;
				case 'merror':
					$data['msg']['merror'] = "Scheme Couldn't be Updated!";
					break;
				case 'msuccess':
					$data['msg']['msuccess'] = "Scheme is successfully Updated!";
					break;
			}
		}
		
		$this->load->view('header');
		$this->load->view('admin',$data);
		$this->load->view('footer');
	}
	public function addque(){
		$q = $this->input->post('que');
		$o1 = $this->input->post('op1');
		$o2 = $this->input->post('op2');
		$o3 = $this->input->post('op3');
		$o4 = $this->input->post('op4');
		
		if($this->ModelAdmin->addq($q,$o1,$o2,$o3,$o4)){
			$this->index('addsuccess');
		}
		else{
			$this->index('adderror');
		}
	}
	public function addms(){
		$p = $this->input->post('pn');
		$n = $this->input->post('nn');
		$h = $this->input->post('hr');
		$m = $this->input->post('min');
		$s = $this->input->post('sec');
		$mpm = $this->input->post('mpm');
		
		if($this->ModelAdmin->add_ms($p,$n,$h,$m,$s,$mpm)){
			$this->index('msuccess');
		}
		else{
			$this->index('merror');
		}
	}
}

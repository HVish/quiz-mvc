<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		 $this->load->model('ModelLogin');
	}
	public function index($e = false)
	{
		$id = $this->session->user_type;
		if(!empty($id)){
			if($this->session->user_type == "Examiner")
				redirect(base_url()."index.php/admin");
			else if($this->session->user_type == "Examinee")
				redirect(base_url()."index.php/home");
		}
		else{
			$data['error'] = "";
			if($e){
				$data['error'] = "Invalid Credentials!";
			}
			
			$this->load->view('header');
			$this->load->view('login',$data);
			$this->load->view('footer');
		}
	}
	public function check(){
		$user = $this->input->post('user');
		$passwd = $this->input->post('passwd');
		if($this->ModelLogin->check_user($user,$passwd) == 'Examiner'){
			$userdata = array('user_type' => 'Examiner', 'username' => $user);
			$this->session->set_userdata($userdata);
			redirect(base_url()."index.php/Admin");
		}
		else if($this->ModelLogin->check_user($user,$passwd) == 'Examinee'){
			$userdata = array('user_type' => 'Examinee', 'username' => $user);
			$this->session->set_userdata($userdata);
			redirect(base_url()."index.php/home");
		}
		else{
			redirect(base_url()."index.php/login/error");
		}
	}
	public function error(){
		$this->index(true);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."index.php/login");
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		if($this->session->userdata('user_manager_id') > 0) {
			header("Location :" . base_url() . "main");
			return false;
		} 
	}	
		
	public function index()	{
		$this->load->view('home');
	}
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_control extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function login(){
		if(!$this->input->is_ajax_request()) {
			return false;
		}
		$this->User->user_manager_mail = $this->input->post('email',true);
		$this->User->user_manager_password = md5($this->input->post('sifre',true));
		if(empty($this->User->user_manager_mail) || empty($this->User->user_password)) {
			//echo "boş";			
			return false;			
		}		
		
		if($this->User->login()) {
			$this->session_ata();
			echo "1";
		}else{
			echo "0";
		}
	}

	public function session_ata() {
		$this->User->get_user(true,'user_manager_id');
		$this->session->set_userdata($this->User);
	}

	public function inserts() {
		if(!$this->input->is_ajax_request()) {
			return false;
		}	

		$this->User->user_manager_mail = $this->input->post('email',true);
		$this->User->user_manager_username = $this->input->post('userName',true);
		$this->User->user_manager_name = $this->input->post('inname',true);
		$this->User->user_manager_password = md5($this->input->post('sifre',true));
		$this->User->user_manager_country = $this->input->post('country',true);
		$this->User->user_manager_city = $this->input->post('city',true);
			
		$this->User->create();
			
	}

	public function create_session() {
		$this->User->get_user(true,'user_manager_id');
		$this->session->set_userdata($this->User);
	}

	public function logout() {
		$this->session->sess_destroy();
		print_r($this->session->all_userdata());
		echo "sonlandırıldı.";
	}

}


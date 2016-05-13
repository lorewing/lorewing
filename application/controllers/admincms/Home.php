<?php

	class Home extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
			if($this->is_logged_in()==TRUE){
				redirect('admincms/login');
			}
			
		}
	
		public function index()
		{
			$data['site_title'] = "Lorewing Web Design Inc. CMS";
			$this->load->view('admincms/home', $data);
		}
		
		function is_logged_in()
		{
		    $is_remember = get_cookie('remember_me');
			$identity = get_cookie('identity');
			if(isset($is_remember) && $is_remember==TRUE) {
				$this->membership_model->getUserData($identity);			   		   
			}
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!$is_logged_in){				
			   return true;
			}else{
				return false;
			}
		}
		
			
	}
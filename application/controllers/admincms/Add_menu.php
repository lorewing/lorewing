<?php

	class Add_menu extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
			$this->is_logged_in();
			
		}
	
		public function index()
		{
			$data['site_title'] = "Add Menu";
		
			$this->load->view('admincms/add_menu', $data);
		}
		
		
		function is_logged_in()
		{
			
			  $is_remember = get_cookie('remember_me');
				$identity = get_cookie('identity');
				if(isset($is_remember) && $is_remember==TRUE) {
				   $this->membership_model->getUserData($identity);
				   //$this->load->view('portal/home');
				}
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
				redirect("admincms/login");
			}		
		} // end function is_logged_in
	
		function main_menu()
		{
			//Form Validation
			$this->form_validation->set_rules('link_name', 'Link Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('url_link', 'URL Link', 'trim|required|xss_clean');
			$this->form_validation->set_rules('icon_name', 'Icon Name', 'trim|xss_clean');
			$this->form_validation->set_rules('arrange', 'Arrange', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_name', 'Class Name', 'trim|xss_clean');		
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Menu";
				$this->load->view('admincms/add_menu', $data);
			}
			else
			{
				//validation passed, check db and run the data_model
				$query = $this->data_model->add_menu();
				
			}
	   
		} // end fubction main_menu
		
		
		function sub_menu()
		{
			//Form Validation
			$this->form_validation->set_rules('link_name', 'Link Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('sub_menu', 'Sub Menu', 'trim|required|xss_clean');
			$this->form_validation->set_rules('url_link', 'URL Link', 'trim|required|xss_clean');
			$this->form_validation->set_rules('icon_name', 'Icon Name', 'trim|xss_clean');
			$this->form_validation->set_rules('arrange', 'Arrange', 'trim|required|xss_clean');
			$this->form_validation->set_rules('class_name', 'Class Name', 'trim|xss_clean');
			
					
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Sub Menu";
				$this->load->view('admincms/sub_menu', $data);
			}
			else
			{
				//validation passed, check db and run the data_model
				$query = $this->data_model->sub_menu();
				
			}
	   
		} // end fubction main_menu
	}
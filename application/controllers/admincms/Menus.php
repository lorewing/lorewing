<?php

	class Menus extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
                         $this->lang->load('english_lang', 'english');
			$this->is_logged_in();
		    $this->membership_model->getKeywords('Menus'); // load keywords for each page based on controler name

			
		}
	
		public function index()
		{
				$data['site_title'] = "Add Sub Menu";
				$this->load->view('admincms/menus/add_sub_menu', $data);
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
	
		
		
		function add_sub_menu()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('menu_parent_id', 'Main Menu', 'trim|required|xss_clean');
			$this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');
			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Menu";
				$this->load->view('admincms/menus/add_sub_menu', $data);
			}
			else
			{
					$data = array(
					   'title' 		=> $this->input->post('title'),
					   'menu_parent_id' 	=> $this->input->post('menu_parent_id'),
					   'url' 				=> $this->input->post('url'),	  
					   'target' 			=> $this->input->post('target'),
					    'order' 			=> 	$this->input->post('order'),
						'class_name' 		=>  $this->input->post('class_name'),
					    'is_active' 		=>  $this->input->post('is_active')
					   
					);
					
					$result = $this->db->insert('mst_menus', $data); 
					
					
				
				$this->session->set_flashdata('message', '<p class=\'success\'>Menu was successfully added.</p>');
				redirect(current_url());
			}
			
		} // end function add_sub_menu
		
		function add_main_menu()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');
			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Main Menu";
				$this->load->view('admincms/menus/add_main_menu', $data);
			}
			else
			{
				//add expiry date after 1 years
					$data = array(
					   'title' 		=> $this->input->post('title'),
					   'menu_parent_id' 	=> '0',
					   'url' 				=> $this->input->post('url'),	  
					   'target' 			=> $this->input->post('target'),
					    'order' 			=> 	$this->input->post('order'),
						'class_name' 		=>  $this->input->post('class_name'),
					    'is_active' 		=>  $this->input->post('is_active')
					   
					);
					
					$result = $this->db->insert('mst_menus', $data); 
					
					
				
				$this->session->set_flashdata('message', '<p class=\'success\'>Menu was successfully added.</p>');
				redirect(current_url());
			}
			
		} // end function add_menu
		
		
		function view_main_menu()
		{	
			
			$data['site_title'] = "View Main Menu";
		
			
			$data['mani_menu'] = $this->data_model->mani_menu();
			
			$this->load->view('admincms/menus/view_main_menu', $data);

		} // end function view_cat
		
		
		function update_main_menu_order()
		{
					
			
						$arrange=$_POST['arrange'];
						foreach($arrange as $mst_menuid => $value2)
						  {
							  
							  $data = array(
											   'order' 		=> $value2
											);
							  $this->db->where('mst_menuid', $mst_menuid);
							  $this->db->update('mst_menus', $data);
						 
						 }
				$this->session->set_flashdata('user_updated', '<p class=\'success\'>Order was successfully updated.</p>');
				redirect("admincms/menus/view_main_menu");
			
		} // end function update_main_menu_order
		
		
		
		function view_sub_menu()
		{	
			
			$data['site_title'] = "View Sub Menu";
		
			
			$data['mani_menu'] = $this->data_model->view_sub_menu();
			
			$this->load->view('admincms/menus/view_sub_menu', $data);

		} // end function view_cat
		
		
		function update_sub_menu_order()
		{
					
			if($this->input->post('sbm') == "Update Arrange") { 
						$arrange=$_POST['arrange'];
						foreach($arrange as $mst_menuid => $value2)
						  {
							  
							  $data = array(
											   'order' 		=> $value2
											);
							  $this->db->where('mst_menuid', $mst_menuid);
							  $this->db->update('mst_menus', $data);
						 
						 }
				$this->session->set_flashdata('user_updated', '<p class=\'success\'>Order was successfully updated.</p>');
				redirect("admincms/menus/view_sub_menu");
			}else
			{
				$contentid=$_POST['contentid'];
					
						 foreach($contentid as $mst_menuid => $value2)
						  {
							  
							 	$this->db->delete('mst_menus', array('mst_menuid' => $value2)); 		
						  }
						$this->session->set_flashdata('user_updated', '<p class=\'success\'>Menues was successfully deleted.</p>');
						redirect("admincms/menus/view_sub_menu");
				
				}
		} // end function update_sub_menu_order
		
		
		function update_main_menu()
		{
			
			//Form Validation
			//Form Validation
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');
			//$this->form_validation->set_rules('options', 'Permissions', 'trim|required|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit Main Menu";
				
				$mst_menuid = $this->input->post('mst_menuid');
				$data['rows'] = $this->data_model->update_main_menu($mst_menuid);	
				$this->load->view('admincms/menus/edit_main_menu', $data);
			}
			else
			{						$data = array(
					   'title' 				=> $this->input->post('title'),
					   'url' 				=> $this->input->post('url'),	  
					   'target' 			=> $this->input->post('target'),
					    'order' 			=> 	$this->input->post('order'),
						'class_name' 		=>  $this->input->post('class_name'),
					    'is_active' 		=>  $this->input->post('is_active')
					   
					);
						
						$mst_menuid = $this->input->post('mst_menuid');
						$this->db->where('mst_menuid', $mst_menuid);
						$this->db->update('mst_menus', $data);
				
				$data['site_title'] = "Edit Main Menu";
				$mst_menuid = $this->input->post('mst_menuid');
				$data['rows'] = $this->data_model->update_main_menu($mst_menuid);
				$data['update_record'] = "Menu was successfully updated";	
				$this->load->view('admincms/menus/edit_main_menu', $data);	
				
			}
		} // end function update_main_menu
				
		
		
		
		function delete_main_menu()
		{	
			$mst_menuid = decodeID($this->uri->segment(4,0));
			$this->db->delete('mst_menus', array('mst_menuid' => $mst_menuid)); 
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'>Menu was successfully deleted</p>');
			redirect('admincms/menus/view_main_menu');
				
		} // end function delete_Products
		
		
		
		
		
		
		function edit_main_menu()
		{	
			$data['site_title'] = "Edit Main Menu";

			$mst_menuid = decodeId($this->uri->segment(4,0));
			$data['rows'] = $this->data_model->edit_main_menu($mst_menuid);
			
			$this->load->view('admincms/menus/edit_main_menu', $data);

		} // end function edit_main_menu
		
		
		function edit_sub_menu()
		{	
			$data['site_title'] = "Edit Sub Menu";

			$mst_menuid = decodeId($this->uri->segment(4,0));
			$data['rows'] = $this->data_model->edit_main_menu($mst_menuid);
			
			$this->load->view('admincms/menus/edit_sub_menu', $data);

		} // end function edit_main_menu
		
	
	function update_sub_menu()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');
			//$this->form_validation->set_rules('options', 'Permissions', 'trim|required|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit Main Menu";
				
				$mst_menuid = $this->input->post('mst_menuid');
				$data['rows'] = $this->data_model->update_main_menu($mst_menuid);	
				$this->load->view('admincms/menus/edit_sub_menu', $data);
			}
			else
			{						$data = array(
					   'title' 				=> $this->input->post('title'),
					   'url' 				=> $this->input->post('url'),	  
					   'target' 			=> $this->input->post('target'),
					    'order' 			=> 	$this->input->post('order'),
						'class_name' 		=>  $this->input->post('class_name'),
					    'is_active' 		=>  $this->input->post('is_active')
					   
					);
						
						$mst_menuid = $this->input->post('mst_menuid');
						$this->db->where('mst_menuid', $mst_menuid);
						$this->db->update('mst_menus', $data);
				
				$data['site_title'] = "Edit Main Menu";
				$mst_menuid = $this->input->post('mst_menuid');
				$data['rows'] = $this->data_model->update_main_menu($mst_menuid);
				$data['update_record'] = "Menu was successfully updated";	
				$this->load->view('admincms/menus/edit_sub_menu', $data);	
				
			}
		} // end function update_sub_menu	
		
		
		function delete_sub_menu()
		{	
			$mst_menuid = decodeID($this->uri->segment(4,0));
			$this->db->delete('mst_menus', array('mst_menuid' => $mst_menuid)); 
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'>Menu was successfully deleted</p>');
			redirect('admincms/menus/view_sub_menu');
				
		} // end function delete_sub_menu
	}
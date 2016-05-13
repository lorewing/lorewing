<?php

	class Users extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
                        $this->lang->load('english_lang', 'english');
			$this->is_logged_in();
		    $this->membership_model->getKeywords('Users'); // load keywords for each page based on controler name

			
		}
	
		public function index()
		{
				$data['site_title'] = "Add User";
				$this->load->view('admincms/users/add_users', $data);
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
	
		
		
		function add_users()
		{
			
			//Form Validation
			$this->form_validation->set_rules('user_first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'user Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[user.user_email]');

			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add User";
				$this->load->view('admincms/users/add_users', $data);
			}
			else
			{
				//add expiry date after 1 years
				$expiry_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
				$register_ip=$_SERVER['REMOTE_ADDR'];
				
					$data = array(
					   'user_first_name' 		=> $this->input->post('user_first_name'),
					   'user_last_name' 		=> $this->input->post('user_last_name'),
					   'username' 				=> $this->input->post('username'),
					   'password' 				=> md5($this->input->post('password')),
					   'user_email' 			=> $this->input->post('user_email'),
					    'active' 				=> '1',
					   'expiry_date' 			=> 	$expiry_date,
					   'register_ip' 			=> 	$register_ip,
					   'role' 					=> $this->input->post('Permissions')
					   
					);
					
					$result = $this->db->insert('user', $data); 
					
					
				
				$this->session->set_flashdata('message', '<p class=\'success\'>User was successfully added.</p>');
				redirect(current_url());
			}
			
		} // end function add_categories
		
		
		function view_users()
		{	
			
			$data['site_title'] = "View Users";
		
			
			$data['users'] = $this->data_model->getAllUsers();
			
			$this->load->view('admincms/users/view_users', $data);

		} // end function main_menu
		
		
		function delete_users()
		{	
			$user_id = decodeID($this->uri->segment(4,0));
			$this->db->delete('user', array('user_id' => $user_id)); 
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'>User was successfully deleted</p>');
			redirect('admincms/users/view_users');
				
		} // end function delete_Products
		
		
		function registered_users()
		{	
			
			$data['site_title'] = "View Users";
		
			
			$data['users'] = $this->data_model->getAllUsers();
			
			$this->load->view('admincms/users/registered_users', $data);

		} // end function registered_users
		
		
		
		function edit_users()
		{	
			$data['site_title'] = "Edit Users";

			$user_id = decodeId($this->uri->segment(4,0));
			$data['rows'] = $this->data_model->editUser($user_id);
			
			$this->load->view('admincms/users/editUsers', $data);

		} // end function edit_users
		
		
		function update_user()
		{
			
			//Form Validation
			$this->form_validation->set_rules('user_first_name', 'First Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('username', 'user Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('user_email', 'User Email', 'trim|required|valid_email|xss_clean');
			//$this->form_validation->set_rules('options', 'Permissions', 'trim|required|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit User";
				
				$user_id = $this->input->post('user_id');
				$data['rows'] = $this->data_model->editUser($user_id);	
				$this->load->view('admincms/users/editUsers', $data);
			}
			else
			{						$data = array(
					   'user_first_name' 		=> $this->input->post('user_first_name'),
					   'user_last_name' 		=> $this->input->post('user_last_name'),
					   'username' 				=> $this->input->post('username'),
					   'password' 				=> md5($this->input->post('password')),
					   'user_email' 			=> $this->input->post('user_email'),
					   'active' 				=> $this->input->post('active'),  
					   'role' 					=> $this->input->post('Permissions')
					   
					);
						
						$user_id = $this->input->post('user_id');
						$this->db->where('user_id', $user_id);
						$this->db->update('user', $data);
				
				$data['site_title'] = "Edit User";
				$user_id = $this->input->post('user_id');
				$data['rows'] = $this->data_model->editUser($user_id);
				$data['update_record'] = "User was successfully updated";	
				$this->load->view('admincms/users/editUsers', $data);	
				
			}
		} // end function update_user
				
	}
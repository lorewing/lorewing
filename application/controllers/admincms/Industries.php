<?php

	class Industries extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
			$this->is_logged_in();
			$this->membership_model->getKeywords('Industries'); // load keywords for each page based on controler name
			
		}
	
		public function index()
		{
			$data['site_title'] = "All Industries";
			
			$data['Industries'] = $this->data_model->getIndustries();
			
			$this->load->view('admincms/industries/view_all_industries', $data);
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
	
		function bti_portfolio()
		{	
			$CatID = $this->uri->segment(4, 0);
			/*$CatID=urldecode(base64_decode($p_id));*/
			
			$data['site_title'] = "View Industries";

			$data['products'] = $this->data_model->getProducts($CatID);
			
			$this->load->view('admincms/portfolio/bti_portfolio', $data);

		} // end fubction main_menu
		
		
		
		function add_portfolio()
		{
			
			//Form Validation
			$this->form_validation->set_rules('product_title', 'Product Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('product_desc', 'Product Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('category_id', 'Category ID', 'trim|required|xss_clean');
			$this->form_validation->set_rules('Industries', 'Industries', 'trim|required|xss_clean');
			$this->form_validation->set_rules('Industries_arrange', 'Industries Arrange', 'trim|required|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Product";
				$this->load->view('admincms/portfolio/add_portfolio', $data);
			}
			else
			{
			
				
			    //$config['upload_path'] 			= './application/uploads/';
				$config['upload_path'] 			= 'files/';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size'] = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				$config['encrypt_name'] = TRUE;
				$config['quality'] = '90';
			
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
		
					$this->load->view('admincms/portfolio/add_portfolio', $error);
				}else{
				/* else
				{ */
					
					$file_data = $this->upload->data();
					$date = date('Y-m-d H:i:s');
					$data = array(
					   'product_title' 		=> $this->input->post('product_title'),
					   'product_desc' 	=> $this->input->post('product_desc'),
					   'date_add' 		=> $date,
					   'product_image' 		=> $file_data['file_name'],
					   'category_id' 		=> $this->input->post('category_id'),
					   'Industries' 		=> $this->input->post('Industries'),	   
					   'Industries_arrange' 		=> $this->input->post('Industries_arrange')
					   
					);
					
					$result = $this->db->insert('products', $data); 
					
					//$data = array('upload_data' => $this->upload->data());
		
					//$this->load->view('admin/upload_success', $data);
				/* } */
			
				//validation passed, check db and run the membership_model
				/*$this->load->model('admin/team');
				$query = $this->team->add_team();*/
				
				$this->session->set_flashdata('message', '<p class=\'success\'>Industries was successfully added.</p>');
				redirect(current_url());
			}
			}
		} // end fubction add_portfolio
		
		function view_industries()
		{	
			
			$data['site_title'] = "View Industries";
		
			
			//$Industries = $this->uri->segment(4, 0);
			$Industries = $this->uri->segment(4, 0);
			$data['rows'] = $this->data_model->viewIndustries($Industries);
			//print_r($data);die();
			$this->load->view('admincms/industries/view_industries', $data);

		} // end fubction main_menu
		
		
		
		function delete_portfolio()
		{	
			$p_id = $this->uri->segment(4, 0);
			$this->db->delete('products', array('p_id' => $p_id)); 
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'>Industries was successfully deleted</p>');
			redirect('admincms/portfolio/view_portfolio');
				
		} // end fubction delete_Products
		
		function edit_portfolio()
		{	
			$data['site_title'] = "Edit Industries";

			$p_id = $this->uri->segment(4, 0);
			$data['rows'] = $this->data_model->editPortfolio($p_id);
			
			$this->load->view('admincms/portfolio/editPortfolio', $data);

		} // end fubction main_menu
		
		
		
		function update_portfolio()
		{
			
			//Form Validation
			$this->form_validation->set_rules('product_title', 'Product Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('product_desc', 'Product Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('category_id', 'Category ID', 'trim|required|xss_clean');
			$this->form_validation->set_rules('Industries', 'Industries', 'trim|required|xss_clean');
			$this->form_validation->set_rules('Industries_arrange', 'Industries Arrange', 'trim|required|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit Industries";
				
				$p_id = $this->input->post('p_id');
				$data['rows'] = $this->data_model->editPortfolio($p_id);	
				$this->load->view('admincms/portfolio/editPortfolio', $data);
			}
			else
			{
						$config['upload_path'] 			= 'files/';
						$config['allowed_types'] = 'gif|jpg|png|pdf';
						$config['max_size'] = '0';
						$config['max_width']  = '0';
						$config['max_height']  = '0';
						$config['encrypt_name'] = TRUE;
						$config['quality'] = '90';
						$this->load->library('upload', $config);
						
						$this->upload->do_upload();
						$file_data = $this->upload->data();
						
						// Check if user upload new image in update
						if ($file_data['file_name'] != ""){
						$data = array(
							   'product_title' 		=> $this->input->post('product_title'),
							   'product_desc' 	=> $this->input->post('product_desc'),
							   'product_image' 		=> $file_data['file_name'],
							   'category_id' 		=> $this->input->post('category_id'),
							   'Industries' 		=> $this->input->post('Industries'),	   
							   'Industries_arrange' 		=> $this->input->post('Industries_arrange') 
							);
								
						$p_id = $this->input->post('p_id');
						$this->db->where('p_id', $p_id);
						$this->db->update('products', $data); 
					}else // user didnt upload new image
					{
						$data = array(
					   'product_title' 		=> $this->input->post('product_title'),
					   'product_desc' 	=> $this->input->post('product_desc'),
					   'category_id' 		=> $this->input->post('category_id'),
					   'Industries' 		=> $this->input->post('Industries'),	   
					   'Industries_arrange' 		=> $this->input->post('Industries_arrange') 
						);
						
						$p_id = $this->input->post('p_id');
						$this->db->where('p_id', $p_id);
						$this->db->update('products', $data);
						
					}
				$p_id = $this->input->post('p_id');
				$data['rows'] = $this->data_model->editPortfolio($p_id);
				$data['update_record'] = "Industries was successfully update";	
				$this->load->view('admincms/portfolio/editPortfolio', $data);
			}
		} // end fubction update_portfolio
		
		function update_portfolio_arrange()
		{
			if($this->input->post('sbm') == "Update Arrange") { 		
				$CatID = $this->input->post('CatID');
						$arrange=$_POST['arrange'];
						foreach($arrange as $p_id => $value2)
						  {
							  $data = array(
											   'Industries_arrange' 		=> $value2
											);
							  $this->db->where('p_id', $p_id);
							  $this->db->update('products', $data);
							  
						 
						 }
				
				$this->session->set_flashdata('user_updated', '<p class=\'success\'>Arrange was successfully updated.</p>');
				redirect("admincms/industries/view_industries/$CatID");
			}else{ 
						$CatID = $this->input->post('CatID');
						$contentid=$_POST['contentid'];
					
						 foreach($contentid as $id => $value2)
						  {
							  
							 	$this->db->delete('products', array('p_id' => $value2)); 		
								 }
						$this->session->set_flashdata('user_updated', '<p class=\'success\'>portfolio was successfully deleted.</p>');
					redirect("admincms/industries/view_industries/$CatID");
					}
			
		} // end fubction update_portfolio_arrange
		
	}
<?php

	class Post extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
                        $this->lang->load('english_lang', 'english');
			$this->is_logged_in();
			$this->membership_model->getKeywords('Portfolio'); // load keywords for each page based on controler name
			
		}
	
		public function index()
		{
				$data['site_title'] = "Add Media Group";
				$this->load->view('admincms/post/add_post_section', $data);
			 
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
			/*$CatID=urldecode(base64_decode($post_id));*/
			
			$data['site_title'] = "View Media Group";

			$data['products'] = $this->data_model->getProducts($CatID);
			
			$this->load->view('admincms/post/view_media', $data);

		} // end function main_menu
		
		
		
		function add_post_section()
		{
			
			//Form Validation
			$this->form_validation->set_rules('section_name_ar', 'Section Title Arabic', 'trim|required|xss_clean');
			$this->form_validation->set_rules('section_name_en', 'Section Title English', 'trim|xss_clean');
			$this->form_validation->set_rules('section_desc_ar', 'Section Desc. Arabic', '');
			$this->form_validation->set_rules('section_desc_en', 'Section Desc. English', 'trim|xss_clean');
			$this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'trim|xss_clean');
			$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|xss_clean');
			$this->form_validation->set_rules('related_tag', 'Related Tag', 'trim|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Section";
				$this->load->view('admincms/post/add_post_section', $data);
			}
			else
			{
			
				if (empty($_FILES['userfile']['name'])) {
							$data = array(
							   'section_name_en' 		=> $this->input->post('section_name_en'),
							   'section_name_ar' 	=> $this->input->post('section_name_ar'), 
							   'section_desc_en' 		=> $this->input->post('section_desc_en'),
							   'section_desc_ar' 	=> $this->input->post('section_desc_ar'), 
							   'meta_keywords' 		=> $this->input->post('meta_keywords'),
							   'meta_description' 	=> $this->input->post('meta_description'), 
							   'active' 	=> '1', 
							   'count_view' 		=> '0',
							   'author' 		=> $this->session->userdata('current_user'),     
							   'related_tag' 		=> $this->input->post('related_tag')
							   
							);
								
							// get insert id  and save it in $content_id
							//$groupost_id = $this->general->addData('media_group',$data);
							
							$result = $this->db->insert('post_section', $data); 
		
							
						
						$this->session->set_flashdata('message', '<p class=\'success\'>Section was successfully added.</p>');
						redirect(current_url());
					
				}else{
			    //$config['upload_path'] 			= './application/uploads/';
				$config['upload_path'] 			= './private/post/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xls|xlsx|zip';
				$config['max_size'] = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				$config['encrypt_name'] = TRUE;
				$config['quality'] = '90';
			
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
		
					$this->load->view('admincms/post/add_post_section', $error);
				}else{
				
					
					//return file name after upload
					$file_data = $this->upload->data();
					
					//resize image
						$config['image_library'] = 'gd2';
						$config['source_image']	= './private/post/'.$file_data['file_name'];
						$config['create_thumb'] = false;
						$config['new_image'] = 'thumb_'.$file_data['file_name'];
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 227;
						$config['height']	= 125;
						
						$this->load->library('image_lib', $config); 
						$this->image_lib->resize();
						//$file_data_thumb = $this->upload->data();
					//end resize image
				
					$data = array(
					   'section_name_en' 		=> $this->input->post('section_name_en'),
					   'section_name_ar' 	=> $this->input->post('section_name_ar'), 
					   'section_desc_en' 		=> $this->input->post('section_desc_en'),
					   'section_desc_ar' 	=> $this->input->post('section_desc_ar'), 
					   'meta_keywords' 		=> $this->input->post('meta_keywords'),
					   'meta_description' 	=> $this->input->post('meta_description'), 
					   'section_cover' 		=> $file_data['file_name'],
					   'section_cover_thumb' 		=> 'thumb_'.$file_data['file_name'],
					   'active' 	=> '1', 
					   'count_view' 		=> '0',
					   'author' 		=> $this->session->userdata('current_user'),     
					   'related_tag' 		=> $this->input->post('related_tag')
					   
					);
						
					// get insert id  and save it in $content_id
					//$groupost_id = $this->general->addData('media_group',$data);
					
					$result = $this->db->insert('post_section', $data); 

					
				
				$this->session->set_flashdata('message', '<p class=\'success\'>Section was successfully added.</p>');
				redirect(current_url());
			}
			}
			}
		} // end function add_post_section
		
		
		function add_post()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean');
			$this->form_validation->set_rules('title_en', 'Title English', 'trim|xss_clean');
			$this->form_validation->set_rules('section_id', 'Section', 'trim|required|xss_clean');	
			$this->form_validation->set_rules('desc_ar', 'Section Desc. Arabic', '');
			$this->form_validation->set_rules('desc_en', 'Section Desc. English', 'trim|xss_clean');
			$this->form_validation->set_rules('related_tag', 'Related Tag', 'trim|xss_clean');
		    $this->form_validation->set_rules('show_on_silder', 'show_on_silder', '');			

			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Section";
				$this->load->view('admincms/post/add_post', $data);
			}
			else
			{
				$show_on_silder="";
					$show_on_silder = $this->input->post('show_on_silder');
						if(isset($show_on_silder) == 'Show on slider'){
								$show_on_silder = 'yes';}else
								{$show_on_silder = 'No'; }
											
				if (empty($_FILES['userfile']['name'])) {
							$data = array(
							   'title_ar' 		=> $this->input->post('title_ar'),
							   'title_en' 	=> $this->input->post('title_en'), 
							   'section_id' 	=> $this->input->post('section_id'), 
							   'desc_ar' 		=> $this->input->post('desc_ar'),
							   'desc_en' 	=> $this->input->post('desc_en'), 
							   'active' 	=> $this->input->post('active'), 
							   'count_view' 		=> '0',
							   'author' 		=> $this->session->userdata('current_user'),    
							    'show_on_silder' => $this->input->post('show_on_silder'),        
							   'related_tag' 		=> $this->input->post('related_tag')
							   
							);
								
							// get insert id  and save it in $content_id
							//$groupost_id = $this->general->addData('media_group',$data);
							
							$result = $this->db->insert('post', $data); 
		
							
						
						$this->session->set_flashdata('message', '<p class=\'success\'>Post was successfully added.</p>');
						redirect(current_url());
					
				}else{
			    //$config['upload_path'] 			= './application/uploads/';
				$config['upload_path'] 			= './private/post/';
				$config['allowed_types'] = 'gif|jpg|bmp|tiff|jpeg|png|pdf|doc|docx|xls|xlsx|zip';
				$config['max_size'] = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				$config['encrypt_name'] = TRUE;
				$config['quality'] = '90';
			
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
		
					$this->load->view('admincms/post/add_post', $error);
				}else{
				
					
					//return file name after upload
					$file_data = $this->upload->data();
					
					//resize image
						$config['image_library'] = 'gd2';
						$config['source_image']	= './private/post/'.$file_data['file_name'];
						$config['create_thumb'] = false;
						$config['new_image'] = 'thumb_'.$file_data['file_name'];
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 227;
						$config['height']	= 125;
						
						$this->load->library('image_lib', $config); 
						$this->image_lib->resize();
						//$file_data_thumb = $this->upload->data();
					//end resize image
					$show_on_silder="";
					$show_on_silder = $this->input->post('show_on_silder');
						if(isset($show_on_silder) == 'Show on slider'){
								$show_on_silder = 'yes';}else
								{$show_on_silder = 'No'; }
					
					$data = array(
							   'title_ar' 		=> $this->input->post('title_ar'),
							   'title_en' 	=> $this->input->post('title_en'), 
							   'section_id' 	=> $this->input->post('section_id'), 
							   'desc_ar' 		=> $this->input->post('desc_ar'),
							   'desc_en' 	=> $this->input->post('desc_en'), 
							   'image_name' 		=> $file_data['file_name'],
					  		   'image_thumb' 		=> 'thumb_'.$file_data['file_name'],
							  'active' 	=> $this->input->post('active'), 
							   'count_view' 		=> '0',
							   'author' 		=> $this->session->userdata('current_user'), 
							   'show_on_silder' => $this->input->post('show_on_silder') ,    
							   'related_tag' 		=> $this->input->post('related_tag')
							   
							);
						
					// get insert id  and save it in $content_id
					//$groupost_id = $this->general->addData('media_group',$data);
					
					$result = $this->db->insert('post', $data); 

					
				
				$this->session->set_flashdata('message', '<p class=\'success\'>Post was successfully added.</p>');
				redirect(current_url());
			}
			}
			}
		} // end function add_post
		
		
		function do_upload($field_name='userfile',$content_id=null){
					$upload_path = GALLERY_UPLOAD_PATH; 
					/*if(!is_dir($upload_path)){
						$old = umask(0); 
						mkdir($upload_path,DIR_WRITE_MODE);						// Create the folder if not exist and give permission
						umask($old); 
					}*/
					/*$upload_path = sprintf(GALLERY_UPLOAD_PATH,$content_id);
					if(!is_dir($upload_path)){
						$old = umask(0); 
						mkdir($upload_path,DIR_WRITE_MODE);						// Create the folder if not exist and give permission
						umask($old); 
					}*/
					
					$this->load->library('upload');
					
						$config = array('upload_path' => $upload_path,		// image save path
										'allowed_types' => CONTENT_ALLOWED_IMAGE_TYPES,
										'max_size' => CONTENT_IMAGE_MAX_SIZE,
										'max_width' => CONTENT_IMAGE_MAX_WIDTH,
										'encrypt_name' => TRUE,
										'max_height' => CONTENT_IMAGE_MAX_HEIGHT);
					
					$this->upload->initialize($config);
					if(!$this->upload->do_upload($field_name)){
						$error = array('error' => $this->upload->display_errors());
						set_flash_message($error['error'],'error');
						return false;
					}else{
						$data=$this->upload->data();
						// code to resize image
							/*$source_image = './private/uploads/gallery/'.$file_name ;
										// code to resize image
											$config['image_library'] = 'gd2';
											//$config['source_image']	= GALLERY_UPLOAD_PATH_RESIZE.'/'.$field_name;
											$config['source_image']	= $source_image;
											$config['create_thumb'] = TRUE;
											$config['maintain_ratio'] = TRUE;
											$config['width']	= 200;
											$config['height']	= 150;
											$this->load->library('image_lib', $config); 
											$this->image_lib->resize();*/
						// end code for resize
						return $data['file_name'];
					}
				}
					
		
		
		
		function view_media_group()
		{	
			
			$data['site_title'] = "View Media Group";	
			$data['portfolio'] = $this->data_model->getPortfolio();
			$this->load->view('admincms/post/view_portfolio', $data);

			} // end function main_menu
		
		
		
		function delete_post()
		{	
			$post_id = $this->uri->segment(4,0);
			$this->db->delete('post', array('post_id' => $post_id)); 
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'Post was successfully deleted</p>');
			redirect('admincms/post/view_post');
				
		} // end function delete_Media Groups
		
		function edit_portfolio()
		{	
			$data['site_title'] = "Edit Media Group";

			$post_id = decodeId($this->uri->segment(4,0));
			$data['rows'] = $this->data_model->editPortfolio($post_id);
			
			$this->load->view('admincms/post/editPortfolio', $data);

		} // end function main_menu
		
		
		
		function update_portfolio()
		{
			
			//Form Validation
			$this->form_validation->set_rules('group_name', 'Media Group Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('group_desc', 'Media Group Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('related_tag', 'Related Tag', 'trim|required|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit Media Group";
				
				$post_id = $this->input->post('post_id');
				$data['rows'] = $this->data_model->editPortfolio($post_id);	
				$this->load->view('admincms/post/editPortfolio', $data);
			}
			else
			{
						$config['upload_path'] 			= 'files/';
						$config['allowed_types'] = 'gif|jpg|bmp|tiff|jpeg|png|pdf';
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
							   'group_name' 		=> $this->input->post('group_name'),
							   'group_desc' 	=> $this->input->post('group_desc'),
							   'product_image' 		=> $file_data['file_name'],
							   'category_id' 		=> $this->input->post('category_id'),
							   'Industries' 		=> $this->input->post('Industries'),	   
							   'related_tag' 		=> $this->input->post('related_tag') 
							);
								
						$post_id = $this->input->post('post_id');
						$this->db->where('post_id', $post_id);
						$this->db->update('products', $data); 
					}else // user didnt upload new image
					{
						$data = array(
					   'group_name' 		=> $this->input->post('group_name'),
					   'group_desc' 	=> $this->input->post('group_desc'),
					   'category_id' 		=> $this->input->post('category_id'),
					   'Industries' 		=> $this->input->post('Industries'),	   
					   'related_tag' 		=> $this->input->post('related_tag') 
						);
						
						$post_id = $this->input->post('post_id');
						$this->db->where('post_id', $post_id);
						$this->db->update('products', $data);
						
					}
					$data['site_title'] = "Edit Media Group";
				$post_id = $this->input->post('post_id');
				$data['rows'] = $this->data_model->editPortfolio($post_id);
				$data['update_record'] = "Media Group was successfully update";	
				$this->load->view('admincms/post/editPortfolio', $data);
			}
		} // end function update_portfolio
		
		
		function view_post()
		{	
			
			$data['site_title'] = "View Post";	
			$data['post'] = $this->data_model->getPost();
			$this->load->view('admincms/post/view_post', $data);

			} // end function view_post
			
			
			function update_post_arrange()
		{
					if($this->input->post('sbm') == "Update Arrange") { 
			
							$arrange=$_POST['arrange'];
							foreach($arrange as $post_id => $value2)
							  {
								  $data = array(
												   'Industries_arrange' 		=> $value2
												);
								  $this->db->where('post_id', $post_id);
								  $this->db->update('post', $data);
								  
							 
							 }
							
							$this->session->set_flashdata('user_updated', '<p class=\'success\'>Arrange was successfully updated.</p>');
							redirect("admincms/portfolio/view_portfolio");
					}else
					{ 
						$contentid=$_POST['contentid'];
					
						 foreach($contentid as $id => $value2)
						  {
							  
							 	$this->db->delete('post', array('post_id' => $value2)); 		
								 }
						$this->session->set_flashdata('user_updated', '<p class=\'success\'>post was successfully deleted.</p>');
						redirect("admincms/post/view_post");
					}
		} // end function update_post_arrange
				
			function edit_post()
		{	
			$data['site_title'] = "Edit Post";

			$id = $this->uri->segment(4,0);
			$table_name='post';
			$where_id='post_id';
			$data['rows'] = $this->data_model->editTable($table_name,$where_id,$id);
			
			$this->load->view('admincms/post/editPost', $data);

		} // end function edit_post
		
		
			function update_post()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title_ar', 'Title Arabic', 'trim|xss_clean');
			$this->form_validation->set_rules('title_en', 'Title English', 'trim|xss_clean');
			$this->form_validation->set_rules('section_id', 'Section', 'trim|required|xss_clean');	
			//$this->form_validation->set_rules('desc_ar', 'Section Desc. Arabic', '');
		//	$this->form_validation->set_rules('desc_en', 'Section Desc. English', 'trim|xss_clean');
			$this->form_validation->set_rules('related_tag', 'Related Tag', 'trim|xss_clean');
		    $this->form_validation->set_rules('show_on_silder', 'show_on_silder', '');	
		    $this->form_validation->set_rules('active', 'active', '');	

		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit Post";
				$id = $this->input->post('post_id');
				$table_name='post';
				$where_id='post_id';
				$data['rows'] = $this->data_model->editTable($table_name,$where_id,$id);	
				$this->load->view('admincms/post/editPost', $data);

			}
			else
			{
					$config['upload_path'] 			= './private/post/';
					$config['allowed_types'] = 'gif|jpg|bmp|tiff|jpeg|png|pdf|doc|docx|xls|xlsx|zip';
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
							
						$file_data = $this->upload->data();
					
					//resize image
						$config['image_library'] = 'gd2';
						$config['source_image']	= './private/post/'.$file_data['file_name'];
						$config['create_thumb'] = false;
						$config['new_image'] = 'thumb_'.$file_data['file_name'];
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 227;
						$config['height']	= 125;
						
						$this->load->library('image_lib', $config); 
						$this->image_lib->resize();
						
						$data = array(
							   'title_ar' 		=> $this->input->post('title_ar'),
							   'title_en' 	=> $this->input->post('title_en'), 
							   'section_id' 	=> $this->input->post('section_id'), 
							   'desc_ar' 		=> $this->input->post('desc_ar'),
							   'desc_en' 	=> $this->input->post('desc_en'), 
							   'image_name' 		=> $file_data['file_name'],
					  		   'image_thumb' 		=> 'thumb_'.$file_data['file_name'],
							    'active' 	=> $this->input->post('active'),
							   'show_on_silder' => $this->input->post('show_on_silder') ,    
							   'related_tag' 		=> $this->input->post('related_tag')
							   
							);
								
						$post_id = $this->input->post('post_id');
						$this->db->where('post_id', $post_id);
						$this->db->update('post', $data); 
						
					}else // user didnt upload new image
					{
						$data = array(
							   'title_ar' 		=> $this->input->post('title_ar'),
							   'title_en' 	=> $this->input->post('title_en'), 
							   'section_id' 	=> $this->input->post('section_id'), 
							   'desc_ar' 		=> $this->input->post('desc_ar'),
							   'desc_en' 	=> $this->input->post('desc_en'), 
							   'active' 	=> $this->input->post('active'),
							   'show_on_silder' => $this->input->post('show_on_silder') ,    
							   'related_tag' 		=> $this->input->post('related_tag')
							   
							);
						
						$post_id = $this->input->post('post_id');
						$this->db->where('post_id', $post_id);
						$this->db->update('post', $data); 
						
					}
					// upload the edit view again 
				$data['site_title'] = "Edit Post";
				$id = $this->input->post('post_id');
				$table_name='post';
				$where_id='post_id';
				$data['rows'] = $this->data_model->editTable($table_name,$where_id,$id);	
				$data['update_record'] = "Post was successfully update";	
				$this->load->view('admincms/post/editPost', $data);
				
			}
		} // end function update_post	
	}
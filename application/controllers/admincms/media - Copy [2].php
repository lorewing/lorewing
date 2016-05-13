<?php

	class Media extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
			$this->is_logged_in();
			$this->membership_model->getKeywords('Portfolio'); // load keywords for each page based on controler name
			
		}
	
		public function index()
		{
				$data['site_title'] = "Add Media Group";
				$this->load->view('admincms/media/add_media_group', $data);
			 
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
			
			$data['site_title'] = "View Media Group";

			$data['products'] = $this->data_model->getProducts($CatID);
			
			$this->load->view('admincms/media/view_media', $data);

		} // end function main_menu
		
		
		
		function add_media_group()
		{
			
			//Form Validation
			$this->form_validation->set_rules('group_name', 'Media Group Title Arabic', 'trim|required|xss_clean');
			$this->form_validation->set_rules('group_name_en', 'Media Group Title English', 'trim|required|xss_clean');
			$this->form_validation->set_rules('group_desc', 'Media Group Description', 'trim|xss_clean');
			$this->form_validation->set_rules('group_desc_en', 'Media Group Description English', 'trim|xss_clean');
			$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('related_tag', 'Related Tag', 'trim|xss_clean');
			
		
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Media Group";
				$this->load->view('admincms/media/add_media_group', $data);
			}
			else
			{
				if (empty($_FILES['userfile']['name'])) {
						$data = array(
					   'group_name' 		=> $this->input->post('group_name'),
					   'group_name_en' 		=> $this->input->post('group_name_en'),
 					   'group_desc' 	=> $this->input->post('group_desc'), 
					   'group_desc_en' 	=> $this->input->post('group_desc_en'), 
					//   'album_cover' 		=> $file_data['file_name'],
					 //  'album_cover_thumb' 		=> 'thumb_'.$file_data['file_name'],
					   'type' 		=> $this->input->post('type'),  
					   'active' 	=> '1', 
					   'count_view' 		=> '0',
					   'author' 		=> $this->session->userdata('current_user'),     
					   'related_tag' 		=> $this->input->post('related_tag')
					   
					);

				$result = $this->db->insert('media_group', $data); 
				$this->session->set_flashdata('message', '<p class=\'success\'>Media Group was successfully added.</p>');
				redirect(current_url());
				
				}else{
				
			    //$config['upload_path'] 			= './application/uploads/';
				$config['upload_path'] 			= './private/media/';
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
		
					$this->load->view('admincms/media/add_media_group', $error);
				}else{
				/* else
				{ */
					
					//return file name after upload
					$file_data = $this->upload->data();
					
					//resize image
						$config['image_library'] = 'gd2';
						$config['source_image']	= './private/media/'.$file_data['file_name'];
						$config['create_thumb'] = false;
						$config['new_image'] = 'thumb_'.$file_data['file_name'];
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 225;
						$config['height']	= 150;
						
						$this->load->library('image_lib', $config); 
						$this->image_lib->resize();
						//$file_data_thumb = $this->upload->data();
					//end resize image
					
					$data = array(
					   'group_name' 		=> $this->input->post('group_name'),
					   'group_name_en' 		=> $this->input->post('group_name_en'),
 					   'group_desc' 	=> $this->input->post('group_desc'), 
					   'group_desc_en' 	=> $this->input->post('group_desc_en'), 
					   'album_cover' 		=> $file_data['file_name'],
					   'album_cover_thumb' 		=> 'thumb_'.$file_data['file_name'],
					   'type' 		=> $this->input->post('type'),  
					   'active' 	=> '1', 
					   'count_view' 		=> '0',
					   'author' 		=> $this->session->userdata('current_user'),     
					   'related_tag' 		=> $this->input->post('related_tag')
					   
					);
						
					
					$result = $this->db->insert('media_group', $data); 

					
				
				$this->session->set_flashdata('message', '<p class=\'success\'>Media Group was successfully added.</p>');
				redirect(current_url());
		    	} 
			}
			}
		} // end function add_media_group
		
		function add_media()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title', 'Media Title Arabic', 'trim|required|xss_clean');
			$this->form_validation->set_rules('title_en', 'Media Title English', 'trim|required|xss_clean');
			$this->form_validation->set_rules('group_id', 'Media Group', 'trim|required|xss_clean');
			$this->form_validation->set_rules('type', 'Media Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('desc', 'Media Group Description Arabic', 'trim|xss_clean');
			$this->form_validation->set_rules('desc_en', 'Media Group Description English', 'trim|xss_clean');
			$this->form_validation->set_rules('video_url', 'video url', 'trim|xss_clean');
			$this->form_validation->set_rules('related_tag', 'Related Tag', 'trim|xss_clean');
			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Media Group";
				$this->load->view('admincms/media/add_media', $data);
			}
			else
			{
											
				if (empty($_FILES['userfile']['name'])) {
							$data = array(
							   'title' 		=> $this->input->post('title'),
							   'title_en' 	=> $this->input->post('title_en'), 
							   'group_id' 	=> $this->input->post('group_id'), 
							   'type' 	=> $this->input->post('type'), 
							   'desc' 		=> $this->input->post('desc'),
							   'desc_en' 	=> $this->input->post('desc_en'), 
							   'type' 	=> $this->input->post('type'), 
							   'related_tag' 		=> $this->input->post('related_tag'),
							   'video_url' 	=> $this->input->post('video_url'), 
							   'active' 	=> '1', 
							   'count_view' 		=> '0',
							   'author' 		=> $this->session->userdata('current_user')   
							);
							
							$result = $this->db->insert('media', $data); 
		
							
						
						$this->session->set_flashdata('message', '<p class=\'success\'>Media was successfully added.</p>');
						redirect(current_url());
					
				}else{
			    //$config['upload_path'] 			= './application/uploads/';
				/*$config['upload_path'] 			= './private/media/';
				$config['allowed_types'] = 'gif|jpg|bmp|tiff|jpeg|png|pdf|doc|docx|xls|xlsx|zip';
				$config['max_size'] = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				$config['encrypt_name'] = TRUE;
				$config['quality'] = '90';
			
				$this->load->library('upload', $config);*/
				$this->load->library('upload');

					$files = $_FILES;
					$cpt = count($_FILES['userfile']['name']);
					for($i=0; $i<$cpt; $i++)
					{
				
						$_FILES['userfile']['name']= $files['userfile']['name'][$i];
						$_FILES['userfile']['type']= $files['userfile']['type'][$i];
						$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
						$_FILES['userfile']['error']= $files['userfile']['error'][$i];
						$_FILES['userfile']['size']= $files['userfile']['size'][$i];    

					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload();
					}
				
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					$$error['site_title'] = "Add Media Group";
					$this->load->view('admincms/media/add_media', $error);
				}else{
				
					
					//return file name after upload
					$file_data = $this->upload->data();
					
					//resize image
						$config['image_library'] = 'gd2';
						$config['source_image']	= './private/media/'.$file_data['file_name'];
						$config['create_thumb'] = false;
						$config['new_image'] = 'thumb_'.$file_data['file_name'];
						$config['maintain_ratio'] = TRUE;
						$config['width']	= 290;
						$config['height']	= 195;
						
						$this->load->library('image_lib', $config); 
						$this->image_lib->resize();
						$file_data_thumb = $this->upload->data();
				//	end resize image
					$data = array(
							   'title' 		=> $this->input->post('title'),
							   'title_en' 	=> $this->input->post('title_en'), 
							   'group_id' 	=> $this->input->post('group_id'), 
							   'type' 	=> $this->input->post('type'), 
							   'desc' 		=> $this->input->post('desc'),
							   'desc_en' 	=> $this->input->post('desc_en'), 
							 'media_name' 		=> $file_data['file_name'],
					  		  'media_thumb' 		=> 'thumb_'.$file_data['file_name'],
							   'type' 	=> $this->input->post('type'), 
							   'related_tag' 		=> $this->input->post('related_tag'),
							   'video_url' 	=> $this->input->post('video_url'), 
							   'active' 	=> '1', 
							   'count_view' 		=> '0',
							   'author' 		=> $this->session->userdata('current_user')   
							);
							
							$result = $this->db->insert('media', $data); 
					
					
				$this->session->set_flashdata('message', '<p class=\'success\'>Media was successfully added.</p>');
				redirect(current_url());
			}
			}
			}
		} // end function add_post
		
		function multiUpload(){
				//$this->load->view('admincms/media/add_media', $error);
				$this->load->view('uploadform');
				
			}
		
		function do_upload()
			{
			
				$this->load->library('upload');
			
				$files = $_FILES;
				$cpt = count($_FILES['userfile']['name']);
				for($i=0; $i<$cpt; $i++)
				{
			
					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
			
			
			
				$this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload();
			
			
				}

		} // finish do_upload
		
		private function set_upload_options()
		{   
		//  upload an image options
			$config = array();
				$config['upload_path'] 			= './private/media/';
				$config['allowed_types'] = 'gif|jpg|bmp|tiff|jpeg|png|pdf|doc|docx|xls|xlsx|zip';
				$config['max_size'] = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
				$config['encrypt_name'] = TRUE;
				$config['quality'] = '90';
		
		
			return $config;
		} // Finish set_upload_options
		
		
		function do_upload_lore($field_name='userfile',$content_id=null){
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
			$this->load->view('admincms/media/view_portfolio', $data);

			} // end function main_menu
		
		
		
		function delete_portfolio()
		{	
			$p_id = decodeId($this->uri->segment(4,0));
			$this->db->delete('products', array('p_id' => $p_id)); 
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'>Media Group was successfully deleted</p>');
			redirect('admincms/media/view_portfolio');
				
		} // end function delete_Media Groups
		
		function edit_portfolio()
		{	
			$data['site_title'] = "Edit Media Group";

			$p_id = decodeId($this->uri->segment(4,0));
			$data['rows'] = $this->data_model->editPortfolio($p_id);
			
			$this->load->view('admincms/media/editPortfolio', $data);

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
				
				$p_id = $this->input->post('p_id');
				$data['rows'] = $this->data_model->editPortfolio($p_id);	
				$this->load->view('admincms/media/editPortfolio', $data);
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
								
						$p_id = $this->input->post('p_id');
						$this->db->where('p_id', $p_id);
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
						
						$p_id = $this->input->post('p_id');
						$this->db->where('p_id', $p_id);
						$this->db->update('products', $data);
						
					}
					$data['site_title'] = "Edit Media Group";
				$p_id = $this->input->post('p_id');
				$data['rows'] = $this->data_model->editPortfolio($p_id);
				$data['update_record'] = "Media Group was successfully update";	
				$this->load->view('admincms/media/editPortfolio', $data);
			}
		} // end function update_portfolio
		
		
				
	}
<?php

	class Gallery extends CI_Controller
	{
		function __construct()
		{
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
			$this->is_logged_in();
		    $this->membership_model->getKeywords('Content'); // load keywords for each page based on controler name
	 //echo phpinfo();
		
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
		
		
		public function index()
		{
				$data['site_title'] = "Add Site Contents";
				$this->load->view('admincms/gallery/add_gallery', $data);
		}
		
		
		function add_gallery()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|alpha_dash_space');
			//$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|max_length[300000]|alpha_dash_space');

			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Add Site Contents";
				$this->load->view('admincms/gallery/add_gallery', $data);
				
			}
			else
			{
				$call_name = str_replace(" ", "-", $this->input->post('title'));
				$call_name = strtolower($call_name);
		
			$data = array(
			   'title' => $this->input->post('title') ,
			   'author' => $this->session->userdata('current_user'),
			   'call_name' => $call_name,
			   'last_edit' => date('Y-m-d H:i:s', now()),
			   'active' => 1,
			   'content' => $this->input->post('main_content'),
				'order_by' => $this->input->post('position'),
			   'side_bar' => $this->input->post('side_bar'),
			   'link' => $this->input->post('link'),
			   'seo_keywords' => $this->input->post('seo_keywords'),
			   'seo_description' => $this->input->post('seo_description')
			);
			
			$result = $this->db->insert('content', $data); 
			
				
				$this->session->set_flashdata('message', '<p class=\'success\'>The gallery was added successfully.</p>');
				redirect(current_url());
				
			}
		}
		
		
		function ajax_save(){
		   $content_id = $this->input->post('content_id');		
		   $content_id = isset($content_id)?$content_id:'';
		   $is_ajax = $this->input->post('is_ajax');
		   $is_ajax = isset($is_ajax)?$is_ajax:FALSE;
		
		//Form Validation
			$this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|alpha_dash_space');
			//$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|max_length[300000]|alpha_dash_space');

			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false && $is_ajax==FALSE)
			{
				//echo "errors";
				$data['site_title'] = "Add Site Contents";
				$this->load->view('admincms/gallery/add_gallery', $data);
				
			}else{
				$call_name = str_replace(" ", "-", $this->input->post('title'));
				$call_name = strtolower($call_name);
		
				  $data = array(
					 'title' => $this->input->post('title') ,
					 'author' => $this->session->userdata('current_user'),
					 'call_name' => $call_name,
					 'last_edit' => date('Y-m-d H:i:s', now()),
					 'active' => 1,
					 'content' => $this->input->post('main_content'),
					  'order_by' => $this->input->post('position'),
					 'side_bar' => $this->input->post('side_bar'),
					 'link' => $this->input->post('link'),
					 'seo_keywords' => $this->input->post('seo_keywords'),
					 'seo_description' => $this->input->post('seo_description')
				  );
		
			
			
				if($content_id==''){
					// get insert id  and save it in $content_id
					$content_id = $this->general->addData('content',$data);
				}else{
					$this->general->updateData('content',array('id'=>$content_id),$data);
				}
		
		  
/*				  if($is_ajax==TRUE){
					  $data['is_active'] = TRUE;
				  //	$data['is_deleted'] = TRUE;
				  }*/
			
			/*if($status==4){
				$data['is_closed'] = TRUE;
			}else{
				$data['is_closed'] = FALSE;
				$data['is_active'] = $status;
			}*/
			   
				if(isset($_FILES['userfile'])){
					//Configure upload.				
					foreach($_FILES['userfile'] as $key=>$val){
						$i = 1;
						foreach($val as $v){
							$field_name = "image_file_".$i;
							$_FILES[$field_name][$key] = $v;
							$i++;   
						}
					}				
				}
		
		   
		   // Unset the useless one 
	        unset($_FILES['userfile']);
			
			$submiterror = FALSE;
			$submitmessage = '';
			$counter = 1;
			$image_counter = 1;
			foreach($_FILES as $field_name => $file){				
				if(strpos($field_name,'image_file_')!==FALSE){
					if($file['tmp_name']!=''){
							$uploadImage = FALSE;
							list($width, $height, $type, $attr) = getimagesize($file['tmp_name']); 
							if($width >= CONTENT_IMAGE_MIN_WIDTH_HEIGHT || $height >= CONTENT_IMAGE_MIN_WIDTH_HEIGHT){
								$uploadImage = TRUE;
							}
							if($uploadImage==TRUE){
								$upload_response = $this->do_upload($field_name,$content_id);
								if($upload_response!=FALSE){
									$file_name = $upload_response;
									
									if($file_name!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$file_name)){
										$src = sprintf(CONTENTS_UPLOAD_PATH,$content_id).$file_name;	
										list($width, $height, $type, $attr) = getimagesize(base_url().sprintf(CONTENTS_UPLOAD_PATH,$content_id).$file_name); 
									
										if($width > $height){
											$height = $width;
										}else{
											$width = $height;
										}
										
										//$path = getPhpThumbPath($src,$width,$height);
										
										// $path = getImageResizePath($src,$width,$height);
										
									//	$srcImageData = file_get_contents($path);
										
										//file_put_contents($src,$srcImageData);
									}
									
									$image_data = array('content_id'=>$content_id,
														'image_name'=>$file_name,
														'is_active'=>TRUE);					
									if($counter==1){							
										$image_data['is_default'] = TRUE;		
									}
									$this->general->addData(TBL_CONTENT_IMAGES,$image_data);
									$submitmessage .= $file['name'].' - '.PRODUCT_IMAGES_SUCCESSFULLY_UPLOADED.'<br />';						
									if($image_counter==PRODUCT_IMAGES_UPLOAD_LIMIT){
										$submitmessage .= sprintf(PRODUCT_IMAGES_MAX_UPLOAD_REACHED,PRODUCT_IMAGES_UPLOAD_LIMIT);
										break;
									}
									$image_counter++;
									$counter++;
								}else{
									$error = array('error' => $this->upload->display_errors());									
									$submitmessage .= '<br>'.$file['name'].' - '.$error['error'];
								}
							}else{
								$submitmessage .= $file['name'].' - '.sprintf(CONTENT_IMAGES_MIN_UPLOAD_WITH_HEIGHT,PROCUCTS_IMAGE_MIN_WIDTH_HEIGHT).'<br />';						
							}
					 }
				}
			}
		   
		   
		   if($is_ajax==TRUE){
				$this->session->set_flashdata('message', '<p class=\'success\'>The gallery was added successfully.</p>');
				$error = FALSE;
				$message = flash_message();
				$aResponse = array('error'=>$error,
								   'message'=>$message,
								   'content_id'=>$content_id);
				echo json_encode($aResponse);
			}else{
				if($submiterror==TRUE){
					$this->session->set_flashdata('message', '<p class=\'error\'>Error.</p>');
		            redirect(current_url());
				}else{
					    $this->session->set_flashdata('message', '<p class=\'success\'>The gallery was added successfully.</p>');
		                redirect(current_url());
				}
			}
		   
		   
		   //	$this->session->set_flashdata('message', '<p class=\'success\'>The content was added successfully.</p>');
		 //redirect(current_url());
		
			}
		}
	
	
	
	 function saveImage(){
		 $error = FALSE;
		 $message = '';
		 $content_id = $this->input->post('content_id');
		 if(isset($_FILES['userfile']['error'][0]) && $_FILES['userfile']['error'][0]==0){
			//Configure upload.
			foreach($_FILES['userfile'] as $key=>$val){
				$i = 1;
				foreach($val as $v){
					$field_name = "file_".$i;
					$_FILES[$field_name][$key] = $v;
					$i++;   
				}
			}
			
			//$PRODUCT_IMAGES_UPLOAD_LIMIT=20;
			// Unset the useless one 
			unset($_FILES['userfile']);
			$productImages = $this->general->getContentImages($content_id);			
			$image_counter = 1;
			$maxupload_limit = PRODUCT_IMAGES_UPLOAD_LIMIT - count($productImages);
			if($maxupload_limit > 0){
				$imageMessage = '';
				foreach($_FILES as $field_name => $file){					
					if($image_counter > $maxupload_limit){
						set_flash_message(sprintf(PRODUCT_IMAGES_MAX_UPLOAD_REACHED,PRODUCT_IMAGES_UPLOAD_LIMIT),'error');
						break;
					}
					$uploadImage = FALSE;
					list($width, $height, $type, $attr) = getimagesize($file['tmp_name']); 
					if($width >= CONTENT_IMAGE_MIN_WIDTH_HEIGHT || $height >= CONTENT_IMAGE_MIN_WIDTH_HEIGHT){
						$uploadImage = TRUE;
					}
					if($uploadImage==TRUE){
						$upload_response = $this->do_upload($field_name,$content_id);
						if($upload_response===FALSE){
							$error = TRUE;
							$error = array('error' => $this->upload->display_errors());
							$imageMessage .= $file['name'].' - '.$error['error'].'<br />';					
						}else{
							$file_name = $upload_response;
							
							if($file_name!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$file_name)){
								$src = sprintf(CONTENTS_UPLOAD_PATH,$content_id).$file_name;	
								list($width, $height, $type, $attr) = getimagesize(base_url().sprintf(CONTENTS_UPLOAD_PATH,$content_id).$file_name); 
							
								if($width > $height){
									$height = $width;
								}else{
									$width = $height;
								}
								
								//$path = getPhpThumbPath($src,$width,$height);
								
								// $path = getImageResizePath($src,$width,$height);
							//	$srcImageData = file_get_contents($path);
								
							//	file_put_contents($src,$srcImageData);
							}
							
							$image_data = array('content_id'=>$content_id,
												'image_name'=>$file_name,
												'is_active'=>TRUE);		
							
							if(empty($productImages) && $image_counter==1){
								$image_data['is_default'] = TRUE;
							}
										
							$this->general->addData(TBL_CONTENT_IMAGES,$image_data);
							//$imageMessage .= $file['name'].' - '.PRODUCT_IMAGES_SUCCESSFULLY_UPLOADED.'<br />';	
							
							$imageMessage .='<div id="message"><div class="success"><strong>Record updated Successfully.</strong></div></div>';
																																									
							$image_counter++;
						}
					}else{
						$Message = $file['name'].' - '.sprintf(CONTENT_IMAGES_MIN_UPLOAD_WITH_HEIGHT,CONTENT_IMAGE_MIN_WIDTH_HEIGHT).'<br />';
							
							$imageMessage .='<div id="message"><div class="success"><strong>"'.$Message.'"</strong></div></div>';
						
												
					}
				}
				set_flash_message($imageMessage,'error');
			}else{
				set_flash_message(sprintf(PRODUCT_IMAGES_MAX_UPLOAD_REACHED,PRODUCT_IMAGES_UPLOAD_LIMIT),'error');
			}
			$message = flash_message();
		}else{
			$error = TRUE;
			set_flash_message(PLEASE_SELECT_IMAGES,'error');
			$message = flash_message();
		}
		$aResponse = array('error'=>$error,
						   'message'=>$message);
		echo json_encode($aResponse);
	 }	
		
	
	
	
	/**
	* Method  : do_upload 
	* Task :  Function for uploading the image
	*/
	
	function do_upload($field_name='userfile',$content_id=null){
		$upload_path = CONTENT_UPLOAD_PATH; 
		if(!is_dir($upload_path)){
			$old = umask(0); 
			mkdir($upload_path,DIR_WRITE_MODE);						// Create the folder if not exist and give permission
			umask($old); 
		}
		$upload_path = sprintf(CONTENTS_UPLOAD_PATH,$content_id);
		if(!is_dir($upload_path)){
			$old = umask(0); 
			mkdir($upload_path,DIR_WRITE_MODE);						// Create the folder if not exist and give permission
			umask($old); 
		}
		
		$this->load->library('upload');
		
			$config = array('upload_path' => $upload_path,		// image save path
							'allowed_types' => CONTENT_ALLOWED_IMAGE_TYPES,
							'max_size' => CONTENT_IMAGE_MAX_SIZE,
							'max_width' => CONTENT_IMAGE_MAX_WIDTH,
							'max_height' => CONTENT_IMAGE_MAX_HEIGHT);
		
		$this->upload->initialize($config);
		if(!$this->upload->do_upload($field_name)){
			$error = array('error' => $this->upload->display_errors());
			set_flash_message($error['error'],'error');
			return false;
		}else{
			$data=$this->upload->data();
			return $data['file_name'];
		}
	}
		
		
		
		
		function getPhpThumbPath($src=null,$width=800,$height=800){
			if($src==null) return false;
			$document_root_path = $this->config->item('document_root_path');
			$src = $document_root_path.$src.'&w='.$width.'&h='.$height.'&far=1&bg=FFFFFF';
			//$PHPTHUMB_CONFIG['high_security_url_separator']
			$thumbURL = base_url().'uploads/phpThumb/phpThumb.php?src='.$src.'&hash='.md5('src='.$src.'Lemosys123456ajaypatidar#lemosys.com');	
			$path = base_url().$thumbURL;
			//$path = $src;
			return $path;
		}
		

		
		
		
		
		/**
	* Method Name : Update 
	* Parameter: null
	* Task : Loading for Updating Product
	*/
	
	function update(){
		
			//Form Validation
			$this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|alpha_dash_space');
			//$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|max_length[300000]|alpha_dash_space');
	
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false){
				//echo "errors";
				$data['site_title'] = "Edit Site Contents";				
				$pageid = $this->input->post('id');
				$data['rows'] = $this->data_model->edit_content($pageid);
				$this->load->view('admincms/gallery/edit_gallery', $data);
			}else{	
			  $data = array(
			     'title' => $this->input->post('title'),
			     'last_edit' => date('Y-m-d H:i:s', now()),
			     'active' => 1,
				 'side_bar' => $this->input->post('side_bar'),
			     'content' => $this->input->post('main_content'),
				 'order_by' =>$this->input->post('position'),
				 'link' => $this->input->post('link'),
			     'seo_keywords' => $this->input->post('seo_keywords'),
			     'seo_description' => $this->input->post('seo_description')
			);
						
						$pageid = $this->input->post('id');
						$this->db->where('id', $pageid);
						$this->db->update('content', $data);
			
			           
			
			
			
			}

	
			
			$productImages = $this->general->getContentImages($pageid);
			//Configure upload.				
			foreach($_FILES['userfile'] as $key=>$val){
				$i = 1;
				foreach($val as $v){
					$field_name = "image_file_".$i;
					$_FILES[$field_name][$key] = $v;
					$i++;   
				}
			}

			// Unset the useless one 
			unset($_FILES['userfile']);
			$submiterror = FALSE;
			$submitmessage = '';
			$image_counter = 1;
			$maxupload_limit = PRODUCT_IMAGES_UPLOAD_LIMIT - count($productImages);
			if($maxupload_limit > 0){
				$imageMessage = '';
				foreach($_FILES as $field_name => $file){
					if(strpos($field_name,'image_file_')!==FALSE){	
						if($image_counter > $maxupload_limit){
							$submitmessage .= sprintf(PRODUCT_IMAGES_MAX_UPLOAD_REACHED,PRODUCT_IMAGES_UPLOAD_LIMIT);
							break;
						}
						if($file['tmp_name']!=''){
							$uploadImage = FALSE;
							list($width, $height, $type, $attr) = getimagesize($file['tmp_name']); 
							if($width >= PROCUCTS_IMAGE_MIN_WIDTH_HEIGHT || $height >= PROCUCTS_IMAGE_MIN_WIDTH_HEIGHT){
								$uploadImage = TRUE;
							}
							if($uploadImage==TRUE){
								$upload_response = $this->do_upload($field_name,$product_id);				
								if($upload_response!=FALSE){
									$file_name = $upload_response;
									
									if($file_name!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$pageid).$file_name)){
										$src = sprintf(CONTENTS_UPLOAD_PATH,$pageid).$file_name;	
										list($width, $height, $type, $attr) = getimagesize(base_url().sprintf(CONTENTS_UPLOAD_PATH,$pageid).$file_name); 
									
										if($width > $height){
											$height = $width;
										}else{
											$width = $height;
										}
										
										//$path = getPhpThumbPath($src,$width,$height);
										
										//$srcImageData = file_get_contents($path);
										
										//file_put_contents($src,$srcImageData);
									}
									
									$image_data = array('content_id'=>$pageid,
														'image_name'=>$file_name,
														'is_active'=>TRUE);					
									$this->general->addData(TBL_CONTENT_IMAGES,$image_data);
									$submitmessage .= $file['name'].' - '.PRODUCT_IMAGES_SUCCESSFULLY_UPLOADED.'<br />';
									$image_counter++;
								}else{
									$submiterror = TRUE;
									$error = array('error' => $this->upload->display_errors());									
									$submitmessage .= '<br>'.$file['name'].' - '.$error['error'];
								}												
							}else{
								$submiterror = TRUE;
								$submitmessage .= $file['name'].' - '.sprintf(CONTENT_IMAGES_MIN_UPLOAD_WITH_HEIGHT,PROCUCTS_IMAGE_MIN_WIDTH_HEIGHT).'<br />';
							}
						}
					}
				}
			}
			
		
		
				$data['site_title'] = "Edit Site Contents";				
				$pageid = $this->input->post('id');
				$data['rows'] = $this->data_model->edit_content($pageid);
				$data['update_record'] = "Content was successfully updated";	
				$this->load->view('admincms/gallery/edit_gallery', $data);

	}//update end
		
		
	 /*
 	 * Method Name : getProductImages
 	 * Task : Loading view for get Product Images
 	 */
	 
	 public function getContentImages(){
	 	 $content_id = $this->input->post('content_id');
		 $productImages=$this->general->getContentImages($content_id);
	 	 $html = '';
		 $is_default = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('content_id'=>$content_id,'is_default'=>TRUE),'is_default');
	 	 if(!empty($productImages)){
		     $counter = 1;
		     foreach($productImages as $image){
				 if($is_default!=TRUE && $counter==1){
					 $data = array('is_default'=>TRUE);
					 $this->general->updateData(TBL_CONTENT_IMAGES,array('id'=>$image->id),$data);
					 $image->is_default = TRUE;
				 }
				 $src = base_url().NO_IMAGE_PATH;
				 if($image->image_name!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image->image_name)){
					 $src = base_url().sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image->image_name;				 
				 }
				 if($image->is_croped==TRUE){
					 if($image->croped_file_name!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image->croped_file_name)){
						 $src = base_url().sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image->croped_file_name;					
					 }
				 }
				 $original = $src;
				 $cropImage = $original;
				 $src = getImageResizePath($src,130,130);
				 
				 
			   
			   $crop_path=base_url().'private/images/Crop-32.png';
			   $delete_path=base_url().'private/images/delete-32.png';
			   $undo_path=base_url().'private/images/reload.png';
			   
			   
				 $html .='<div id="divimage'.$image->id.'" style="border:1px solid #b6b6b6; float: left; padding: 5px; margin-right: 5px; margin-bottom: 10px;"><img style="width:130px;height:130px;" style="border:1px solid #b6b6b6;" data-originalsrc="'.$original.'" src="'.$src.'" width="130px" id="img'.$image->id.'" /><div class="clearfix" style="margin-bottom: 8px;"></div><input type="radio" name="productImages[]" id="image'.$image->id.'"  onChange="setDefaultImage('.$image->id.',this)" title="Set Default" value="'.$image->id.'" title="Set Default" '.(($image->is_default==TRUE)?'checked="checked"':'').' /><a href="javascript:void(0);" onClick="return deleteImage('.$image->id.',this)" style="float:right;margin-left:8px;" title="Delete"><span class="glyphicon glyphicon-trash"><img class="img_wrp" src="'.$delete_path.'" /></span></a>'.(($image->is_croped==TRUE)?'<a href="javascript:void(0);" onClick="return resetImage('.$image->id.')" style="float:right;margin-right:8px;" title="Reset Image"><span class="fa fa-undo"><img class="img_wrp" src="'.$undo_path.'" />
</span></a>':'<a href="javascript:void(0);" class="rehook"   data-image_id="'.$image->id.'" style="float:right;"><span class="fa fa-crop" title="Crop"><img class="img_wrp"  src="'.$crop_path.'" /></span></a>').'
               </div>'; 
			
		 		 $counter++;
			 }
		 }
		 echo $html;
	 }
		
		
    	 /*
 	 * Method Name : deleteImage
 	 * Task : Loading view for delete Product Images
 	 */
	 
	 public function deleteImage(){
	 	 $image_id = $this->input->post('image_id');
	 	 $error = FALSE;
	 	 $message = '';
	 	 if($image_id!=''){
	 	 	 $image = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$image_id),'image_name');
			 $croped_file_name = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$image_id),'croped_file_name');
			 $content_id = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$image_id),'content_id');
			 if($image!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image)){
				 unlink(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image);
			 }
			 if($croped_file_name!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$croped_file_name)){
				 unlink(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$croped_file_name);
			 }
			 $this->general->deleteData(TBL_CONTENT_IMAGES,array('id'=>$image_id),HARD_DELETE);
			 $this->session->set_flashdata('user_updated', '<p class=\'success\'>Content was successfully deleted.</p>');
	 	 }else{
	 	 	 $error = TRUE;
	 	 	 set_flash_message(INVALID_IMAGE_ID,'error');
	 	 	 $message = flash_message();
	 	 }
		 
		 $aResponse = array('error'=>$error,
							'message'=>$message);
		 echo json_encode($aResponse);
	 }		
		

	 /*
	 * Method Name : crop
	 * Task : Loading view for get crop image
	 */
	 
	 function crop(){
		 $error = FALSE;
		 $message = '';		 
	  	 $crop_img_id = $this->input->post('crop_img_id');
		 $x = $this->input->post('x');
		 $y = $this->input->post('y');
		 $w = $this->input->post('w');
		 $h = $this->input->post('h');
		 $targ_w = $w;
		 $targ_h = $h;
		 $jpeg_quality = 100;
		 $image_name = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$crop_img_id),'image_name');	
		  $old_croped_file_name = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$crop_img_id),'croped_file_name');
		 $content_id = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$crop_img_id),'content_id');	
		 if($content_id!=''){
			 $upload_path = CONTENT_UPLOAD_PATH;
			 if(!is_dir($upload_path)){
				 $old = umask(0); 
				 mkdir($upload_path,DIR_WRITE_MODE);// Create the folder if not exist and give permission
				 umask($old); 
			 }
			 $upload_path = sprintf(CONTENTS_UPLOAD_PATH,$content_id);
			 if(!is_dir($upload_path)){
				 $old = umask(0); 
				 mkdir($upload_path,DIR_WRITE_MODE);// Create the folder if not exist and give permission
				 umask($old); 
			 }
			 
			 if($old_croped_file_name!='' && file_exists($upload_path.$old_croped_file_name)){
				 unlink($upload_path.$old_croped_file_name);			 
			 }
			 
			 if($image_name!='' && file_exists($upload_path.$image_name)){
				 $src = $upload_path.$image_name;
				 $img_r = imagecreatefromjpeg($src);
				 $dst_r = imagecreatetruecolor( $targ_w, $targ_h );
			  
				 imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
				 $targ_w,$targ_h,$w,$h);
			  
				 header('Content-type: image/jpeg');
				 $croped_file_name = 'croped_'.time().$image_name;
				 imagejpeg($dst_r,$upload_path.$croped_file_name,$jpeg_quality);
				 
				 $image_data = array('croped_file_name'=>$croped_file_name,
									 'is_croped'=>TRUE);					
				 $this->general->updateData(TBL_CONTENT_IMAGES,array('id'=>$crop_img_id),$image_data);
				 
				 set_flash_message(CROPED_IMAGE_SAVED_SUCESS,MESSAGE_SUCCESS);
				 $message = flash_message();
			 }else{
				 $error = TRUE;
				 set_flash_message(INVALID_IMAGE_ID,MESSAGE_ERROR);
				 $message = flash_message();
			 }
		 }else{
			 $error = TRUE;
			 set_flash_message(INVALID_IMAGE_ID,MESSAGE_ERROR);
			 $message = flash_message();
		 }
		 $aResponse = array('error'=>$error,
		 				    'message'=>$message);
		 echo json_encode($aResponse);
	 }	

	
	/*
 	 * Method Name : resetImage
 	 * Task : Loading view for set reset mage
 	 */
	 
	 public function resetImage(){
		 $image_id = $this->input->post('image_id');
	 	 $error = FALSE;
	 	 $message = '';
	 	 if($image_id!=''){
			 $data = array('is_croped'=>FALSE);
			 $this->general->updateData(TBL_CONTENT_IMAGES,array('id'=>$image_id),$data);
			 $image = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$image_id),'croped_file_name');
			 $content_id = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$image_id),'content_id');
			 if($image!='' && file_exists(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image)){
				 unlink(sprintf(CONTENTS_UPLOAD_PATH,$content_id).$image);			 
			 }
			 set_flash_message(RESET_IMAGE_SAVED_SUCESS,MESSAGE_SUCCESS);
			 $message = flash_message();			 
	 	 }else{
	 	 	 $error = TRUE;
			 set_flash_message(INVALID_IMAGE_ID,MESSAGE_ERROR);
	 	 	 $message = flash_message();
	 	 }
	     $aResponse = array('error'=>$error,
	    				    'message'=>$message);
	     echo json_encode($aResponse);
	 }	
		
		
		
	/*
 	 * Method Name : setDefaultImage
 	 * Task : Loading view for set DefaultI mage
 	 */
	 
	 public function setDefaultImage(){
		 $image_id = $this->input->post('image_id');
	 	 $error = FALSE;
	 	 $message = '';
	 	 if($image_id!=''){
			 $content_id = $this->general->getFieldValueById(TBL_CONTENT_IMAGES,array('id'=>$image_id),'content_id');
			 $data = array('is_default'=>FALSE);
			 $this->general->updateData(TBL_CONTENT_IMAGES,array('content_id'=>$content_id),$data);
			 $data = array('is_default'=>TRUE);
			 $this->general->updateData(TBL_CONTENT_IMAGES,array('id'=>$image_id),$data);
			 $this->session->set_flashdata('user_updated', '<p class=\'success\'>Content was successfully updated.</p>');
			 
			set_flash_message('<p class=\'success\'>Default Image was successfully set.</p>','user_updated');
	 	 	 $message = flash_message();
	 	 }else{
	 	 	 $error = TRUE;
			 set_flash_message(INVALID_IMAGE_ID,MESSAGE_ERROR);
	 	 	 $message = flash_message();
	 	 }
	     $aResponse = array('error'=>$error,
	    				    'message'=>$message);
	     echo json_encode($aResponse);
	 }
		
		
		
		
		
		
		function manage_content()
		{	
			
			$data['site_title'] = "Manage Content";
		
			
			$data['manage_content'] = $this->data_model->manage_content();
			
			$this->load->view('admincms/gallery/manage_gallery', $data);

		} // end function manage_gallery
		
		
		
		function edit_content()
		{			
			$pageid = decodeID($this->uri->segment(4,0));
			$data['rows'] = $this->data_model->edit_content($pageid);
			$data['site_title'] = "Edit Site Contents";		
			$this->load->view('admincms/gallery/edit_gallery', $data);
		} // end function edit_content
		
		
		
		
		function update_content()
		{
			
			//Form Validation
			$this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|alpha_dash_space');
			//$this->form_validation->set_rules('main_content', 'Main Content', 'trim|required|max_length[300000]|alpha_dash_space');

			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Edit Site Contents";				
				$pageid = $this->input->post('id');
				$data['rows'] = $this->data_model->edit_content($pageid);
				$this->load->view('admincms/gallery/edit_gallery', $data);
			
				
				
				
			}
			else
			{	
			$data = array(
			
			   'title' => $this->input->post('title'),
			   'last_edit' => date('Y-m-d H:i:s', now()),
			   'active' => 1,
				'side_bar' => $this->input->post('side_bar'),
			   'content' => $this->input->post('main_content'),
				'order_by' =>$this->input->post('position'),
				'link' => $this->input->post('link'),
			   'seo_keywords' => $this->input->post('seo_keywords'),
			   'seo_description' => $this->input->post('seo_description')
			);
						
						$pageid = $this->input->post('id');
						$this->db->where('id', $pageid);
						$this->db->update('content', $data);
			}
				$data['site_title'] = "Edit Site Contents";				
				$pageid = $this->input->post('id');
				$data['rows'] = $this->data_model->edit_content($pageid);
				$data['update_record'] = "Content was successfully updated";	
				$this->load->view('admincms/gallery/edit_gallery', $data);
				
			
		} // end function update_gallery	
		
		function delete_content(){
			$id = decodeID($this->uri->segment(4,0));
			$this->db->delete('content', array('id' => $id)); 
			
			$this->db->delete(TBL_CONTENT_IMAGES, array('content_id' => $id)); 
			
			 if(file_exists(sprintf(CONTENTS_UPLOAD_PATH,$id))){
				// rmdir(sprintf(CONTENT_UPLOAD_PATH,$id));
				// unlink(sprintf(CONTENTS_UPLOAD_PATH,$id));
			 }
			
			$this->session->set_flashdata('user_updated', '<p class=\'success\'>Content was successfully deleted</p>');
			redirect('admincms/gallery/manage_gallery');
			
			} // end function update_gallery
			
			
			
			function delete_all_content()
		{
						$contentid=$_POST['contentid'];
					
						 foreach($contentid as $id => $value2)
						  {
							  
							 	$this->db->delete('content', array('id' => $value2)); 
								$this->db->delete(TBL_CONTENT_IMAGES, array('content_id' => $value2)); 		
						 }
						 
					 if(file_exists(sprintf(CONTENT_UPLOAD_PATH))){
				     // rmdir(CONTENT_UPLOAD_PATH);
					  // unlink(sprintf(CONTENT_UPLOAD_PATH));
			         }	 
						 
				$this->session->set_flashdata('user_updated', '<p class=\'success\'>Content was successfully deleted.</p>');
				redirect("admincms/gallery/manage_gallery");
			
		} // end function update_main_menu_order
		
		
		
		
		/*************************************** Project Management */
		
		function add_projects()
		{
			
			$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|xss_clean');
			
			$this->load->library('upload');
				
			$config['upload_path'] = 'uploads';
		    $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '0';
		    $config['max_width']  = '0';
		    $config['max_height']  = '0';
		    $config['encrypt_name'] = TRUE;
		    
		    $this->upload->initialize($config);
			
			if($this->form_validation->run() == false)
			{
				$this->load->view('admin/includes/top.php');
				$this->load->view('admin/add_projects');
				$this->load->view('admin/includes/footer.php');
			}
			else
			{
				
			    
			    $images = array();
			    
			    foreach($_FILES as $field => $file)
			    {
			    	$image_name;
			    	
			        // No problems with the file
			        if($file['error'] == 0)
			        {
			            // So lets upload
			            if ($this->upload->do_upload($field))
			            {
			                $file_data = $this->upload->data();
			                $images[$field] = $file_data['file_name'];
			                //print_r($file_data);
			            }
			            else
			            {
			                $errors = $this->upload->display_errors();
			            }
			
			        }
			        
			    }
			        
			        if(isset($images['project_logo']))
			        {
				        $project_logo 	= $images['project_logo'];
			        }
			        else
			        {
				        $project_logo 	= "";
			        }
			        
			        if(isset($images['gallery_image_1']))
			        {
				        $photo_1 	= $images['gallery_image_1'];
			        }
			        else
			        {
				        $photo_1 = "";
			        }
			        
			        if(isset($images['gallery_image_2']))
			        {
				        $photo_2 	= $images['gallery_image_2'];
			        }
			        else
			        {
				        $photo_2 = "";
			        }
			        
			        if(isset($images['gallery_image_3']))
			        {
				        $photo_3 	= $images['gallery_image_3'];
			        }
			        else
			        {
				        $photo_3 = "";
			        }
			        
			        if(isset($images['gallery_image_4']))
			        {
				        $photo_4 	= $images['gallery_image_4'];
			        }
			        else
			        {
				        $photo_4 = "";
			        }
			        
			        $data = array(
			        	'project_name' 	=> $this->input->post('project_name'),
			        	'description'	=> $this->input->post('description'),
			        	'url'			=> $this->input->post('url'),
			        	'location'		=> $this->input->post('location'),
			        	'project_logo' 	=> $project_logo,
			        	'photo_1' 		=> $photo_1,
			        	'photo_2' 		=> $photo_2,
			        	'photo_3' 		=> $photo_3,
			        	'photo_4' 		=> $photo_4
			        );
			        
			        $result = $this->db->insert('projects', $data);
			        
			        $data['success'] = "<p>Amazing! The project was added successfully.</p>";
			        
			        $this->load->view('admin/includes/top.php');
					$this->load->view('admin/manage_projects', $data);
					$this->load->view('admin/includes/footer.php');
			}
		
		}
		
		function edit_projects()
		{			
			$pageid = $this->uri->segment(4);
			
			$query = $this->db->get_where('projects', array('id' => $pageid));
					
			foreach ($query->result() as $row)
			{
				$data['page_id']			= $pageid;
				$data['id'] 				= $row->id;
				$data['project_name'] 		= $row->project_name;
				$data['description'] 		= $row->description;
				$data['location'] 			= $row->location;
				$data['url'] 				= $row->url;
				
				$data['project_logo'] 		= $row->project_logo;
				
				$data['gallery_image_1'] 	= $row->photo_1;
				$data['gallery_image_2'] 	= $row->photo_2;
				$data['gallery_image_3'] 	= $row->photo_3;
				$data['gallery_image_4'] 	= $row->photo_4;
			}
			
			$this->load->view('admin/includes/top.php');
			$this->load->view('admin/edit_projects', $data);
			$this->load->view('admin/includes/footer.php');
		}
		
		function update_projects()
		{	
		
			$pageid = $this->uri->segment(4);
		
		}		
	
	
	
		/*************************************** Configuration Management */
		
		function configuration()
		{
			$row_id = $this->uri->segment(4);
			$query = $this->db->get('configuration');
			
			foreach ($query->result() as $row)
			{
				$data['row_id']						= $row_id;
			
				$data['site_title']					= $row->site_title;
				$data['main_phone']					= $row->main_phone;
				$data['tagline']					= $row->tagline;
				$data['analytics']					= $row->analytics;
				$data['main_contact_email']			= $row->main_contact_email;
				$data['facebook_url']				= $row->facebook_url;
				$data['twitter_url']				= $row->twitter_url;
				$data['linkedin_url']				= $row->linkedin_url;
				$data['youtube_url']				= $row->youtube_url;
				$data['meta_keywords']				= $row->meta_keywords;
				$data['meta_description']			= $row->meta_description;
				$data['orchid_fb']					= $row->orchid_fb;
				$data['orchid_linkedin']				= $row->orchid_linkedin;
				$data['cfla_url']				= $row->cfla_url;
				$data['caamp_url']			= $row->caamp_url;
				$data['imba_url']					= $row->imba_url;
			}
		
			
			$this->load->view('admincms/gallery/config', $data);
		}
		
		function update_configuration()
		{
			$data = array(
			
			   'site_title' => $this->input->post('site_title'),
			   'main_phone' => $this->input->post('main_phone'),
			   'tagline' => $this->input->post('tagline'),
			   'analytics' => $this->input->post('analytics'),
			   'main_contact_email' => $this->input->post('main_contact_email'),
			   'meta_keywords' => $this->input->post('meta_keywords'),
			   'meta_description' => $this->input->post('meta_description'),
			   'facebook_url' => str_replace("http://", "", $this->input->post('facebook_url')),
			   'twitter_url' => str_replace("http://", "", $this->input->post('twitter_url')),
			   'linkedin_url' => str_replace("http://", "", $this->input->post('linkedin_url')),
			   'youtube_url' => str_replace("http://", "", $this->input->post('youtube_url')),
			   'googleplus_url' => str_replace("http://", "", $this->input->post('googleplus_url')),
			   
			   'orchid_fb' => str_replace("http://", "", $this->input->post('orchid_fb')),
			   'orchid_linkedin' => str_replace("http://", "", $this->input->post('orchid_linkedin')),
			   'cfla_url' => str_replace("http://", "", $this->input->post('cfla_url')),
			   'caamp_url' => str_replace("http://", "", $this->input->post('caamp_url')),
			   'imba_url' => str_replace("http://", "", $this->input->post('imba_url'))
			   
			   
			);
			
				
			$query = $this->data_model->update_configuration($data);
		}
		
		/*************************************** Content Management */
		
	}
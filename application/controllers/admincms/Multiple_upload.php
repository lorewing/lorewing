<?php



	class Multiple_upload extends CI_Controller

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

				$this->load->view('admincms/multiple_upload/add_multiple_image', $data);

			 

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

	

		

		function add_multiple_image()

		{

			

			//Form Validation

			$this->form_validation->set_rules('title', 'Media Title Arabic', 'trim|xss_clean');

			

			

			//If form validation failed, return to the form and throw out errors

			if($this->form_validation->run() == false)

			{

				//echo "errors";

				$data['site_title'] = "Add Multiple Image";

				$this->load->view('admincms/multiple_upload/add_multiple_image', $data);

			}

			else

			{

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

			$maxupload_limit = 30;

			

				$imageMessage = '';

				foreach($_FILES as $field_name => $file){

					if(strpos($field_name,'image_file_')!==FALSE){	

						

						

						//	$product_id=179;

								$upload_response = $this->do_upload($field_name);				

								if($upload_response!=FALSE){

									$file_name = $upload_response;

									

									//$pageid=179;

									$image_data = array('image_name'=>$file_name);					

									$this->general->addData('multiple_upload',$image_data);

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

		

				$this->session->set_flashdata('message', '<p class=\'success\'>Image was successfully added.</p>');

						redirect(current_url());

				

			} // end else

		} // end function add_multiple_image

		

		

		

		function do_upload($field_name='userfile'){

					

					$this->load->library('upload');

				

					$config['upload_path'] 			= './private/images/';

					$config['allowed_types'] = 'gif|jpg|bmp|tiff|jpeg|png|pdf|doc|docx|xls|xlsx|zip';

					$config['max_size'] = '0';

					$config['max_width']  = '0';

					$config['max_height']  = '0';

					$config['encrypt_name'] = TRUE;

					$config['quality'] = '90';

					

					$this->upload->initialize($config);

					if(!$this->upload->do_upload($field_name)){

						$error = array('error' => $this->upload->display_errors());

						set_flash_message($error['error'],'error');

						return false;

					}else{

						$data=$this->upload->data();

						// code to resize image

							//return file name after upload

					

					

					//resize image

					

						/*$config['image_library'] = 'gd2';

						$config['source_image']	= './private/images/'.$data['file_name'];

						$config['create_thumb'] = false;

						$config['new_image'] = 'thumb_'.$data['file_name'];

						$config['maintain_ratio'] = TRUE;

						$config['width']	= 225;

						$config['height']	= 150;

						

						$this->load->library('image_lib', $config); 

						$this->image_lib->resize();

						$this->image_lib->clear();*/

						// end code for resize

						return $data['file_name'];

					}

				}

				

				function view_images()

		{	

			

			$data['site_title'] = "View Images";

			$tableName = 'multiple_upload';
			$sortBy =	'image_id';

			$data['rows'] = $this->data_model->getTable($tableName , $sortBy );

			$this->load->view('admincms/multiple_upload/view_images', $data);



			} // end function main_menu

			

			

			function delete_images()

		{	

			$image_id = decodeId($this->uri->segment(4,0));

			$this->db->delete('multiple_upload', array('image_id' => $image_id)); 

			

			$this->session->set_flashdata('user_updated', '<p class=\'success\'>Image was successfully deleted</p>');

			redirect('admincms/multiple_upload/view_images');

				

		} // end function delete_Media Groups

		

		function delete_selected_images()

		{

					$imageid=$_POST['imageid'];

					

						 foreach($imageid as $id => $value2)

						  {

							  

							 	$this->db->delete('multiple_upload', array('image_id' => $value2)); 		

								 }

						$this->session->set_flashdata('user_updated', '<p class=\'success\'>Images was successfully deleted.</p>');

						redirect("admincms/multiple_upload/view_images");

					

		} // end function update_portfolio_arrange



	}
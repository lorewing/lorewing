<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index(){
          //Form Validation
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
			$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required');			


		/*	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[user.user_email]');
		*/
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				$data=array(
					'title'=>'Contact Us - Lorewing Web Design Toronto',
					'keywords'=>'Contact Us ,Support,support 24/7',
					'description' =>'Our friendly Support Team is available to help you 24 hours a day, seven days a week. We look forward to hearing from you! Call +1-647-680-6263',
						  );
				$this->load->view('site/includes/header',$data);
		
				$this->load->view('site/includes/nav');
				$this->load->view('site/en/home_en'); 
				$this->load->view('site/includes/footer');
				
			}
			else
			{
				if($_POST['g-recaptcha-response'])
			{
				//echo $_POST['g-recaptcha-response'];
				//die();
				$response = $_POST['g-recaptcha-response'];
						
				$captcha_check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lem8Q8TAAAAABpmFPNkVjxUPeyq4fwg13tREjed&&response='{$response}");
					   
				 if($captcha_check.'success' == false)
				  {
					  $error['captcha'] = "captcha";
				  }
			}
			
			
			$config = Array(
			'protocol' => 'smtp',
     	    'smtp_host' => 'mail.lorewing.com',
			'smtp_port' => 25,
			'smtp_user' => 'ahmed@lorewing.com',
			'smtp_pass' => 'nadineandcindy2001',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE
   				 );
   		 $this->load->library('email', $config);
		 
			
			$this->email->from('ahmed@lorewing.com', 'Lorewing.com - Contact Us Page');
			$this->email->to('ahmed@lorewing.com'); 
			
			$this->email->set_mailtype('html');
			
			$this->email->subject("Lorewing Web Design Inc - Contact Us Page");
			
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = nl2br($this->input->post('message')); //nl2br for add line in text box


			$data = array( 'name' => $name , 'email' => $email,'subject' => $subject , 'message' => $message  );
			$email = $this->load->view('site/ar/email/contact-us', $data, TRUE);
			$this->email->message( $email );
			$this->email->send();
			

				$this->session->set_flashdata('message', '<p class=\'success\'>Message was send successfully.</p>');
				redirect(current_url());
			}
			
		} // end function contact_us
}

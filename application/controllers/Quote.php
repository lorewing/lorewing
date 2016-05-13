
<?php

class Quote extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Data_model');
	}	
	
	
	
	
	function index()
	{			
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|max_length[100]');			
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[100]');			
		$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|max_length[50]');			
		$this->form_validation->set_rules('project_type', 'Project Type', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('domain_name', 'Domain Name', 'trim|xss_clean|max_length[150]');			
		$this->form_validation->set_rules('is_domain_name_purchased', 'Domain Name Purchased', 'required|trim|xss_clean');			
		$this->form_validation->set_rules('do_you_have_web_hosting', 'Do You Have Web Hosting', 'trim|xss_clean');			
		$this->form_validation->set_rules('web_hosting_package', 'web hosting package', 'trim|xss_clean|max_length[200]');			
//		$this->form_validation->set_rules('Web_Hosting', 'Web_Hosting', '');
//		$this->form_validation->set_rules('Domain_Registration', 'Domain_Registration', '');			
//		$this->form_validation->set_rules('Website_Design', 'Website_Design', '');			
//		$this->form_validation->set_rules('Website_Re_Design', 'Website_Re_Design', '');			
//		$this->form_validation->set_rules('SEO', 'SEO', '');			
//		$this->form_validation->set_rules('Database_Developmen', 'Database_Developmen', '');			
//		$this->form_validation->set_rules('Bug_Fixing', 'Bug_Fixing', '');			
//		$this->form_validation->set_rules('Custom_Web_Forms', 'Custom_Web_Forms', '');
//		$this->form_validation->set_rules('Content_Management_System', 'Content_Management_System', '');			
//		$this->form_validation->set_rules('Online_Store', 'Online_Store', '');
//		$this->form_validation->set_rules('Credit_Card_Processing', 'Credit_Card_Processing', '');			
//		$this->form_validation->set_rules('Photo_Galleries', 'Photo_Galleries', '');
//		$this->form_validation->set_rules('Ongoing_Maintenance', 'Ongoing_Maintenance', '');
//		$this->form_validation->set_rules('Fix_Hacked_Website', 'Fix_Hacked_Website', '');			
//		$this->form_validation->set_rules('Virus_Removal', 'Virus_Removal', '');		
		$this->form_validation->set_rules('describe_project', 'Describe your web development project', 'xss_clean');			
		$this->form_validation->set_rules('project_spec', 'Project Spec', 'max_length[100]');				
		$this->form_validation->set_rules('project_timeline', 'project_timeline', 'required|trim|xss_clean');
		$this->form_validation->set_rules('project_budget', 'Project Budget', 'required|trim|xss_clean');
		$this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'required');			


		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$data=array(
			'title'=>'طلب تطوير/صيانة موقع | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'طلب تطوير/صيانة موقع,عرض تصميم موقع,عرض طلب موقع,صيانه موقع',
			'description' =>'لطلب تصميم او تطوير موقع  أرسل لنا معلومات الموقع الذي تريده عبر النموذج التالي و سنتواصل معك بأقرب وقت ممكن. 
			للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/quote'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
			
			
		}
		else // passed validation proceed to post success logic
		{
	//recaptch start
					
					
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


				
		// recaptch end
				
			//Collect value for checkbox
			
			$Web_Hosting =$this->input->post('Web_Hosting');
			$Domain_Registration =$this->input->post('Domain_Registration');
			$Website_Design =$this->input->post('Website_Design');
			$SEO =$this->input->post('SEO');
			$Website_Re_Design=$this->input->post('Website_Re_Design');
			
			$Database_Developmen =$this->input->post('Database_Developmen');
			$Bug_Fixing =$this->input->post('Bug_Fixing');
			
			$Custom_Web_Forms =$this->input->post('Custom_Web_Forms');
			$Content_Management_System =$this->input->post('Content_Management_System');
			$Online_Store =$this->input->post('Online_Store');
			$Credit_Card_Processing =$this->input->post('Credit_Card_Processing');
			$Photo_Galleries=$this->input->post('Photo_Galleries');
			
			$Ongoing_Maintenance =$this->input->post('Ongoing_Maintenance');
			$Fix_Hacked_Website =$this->input->post('Fix_Hacked_Website');
			$Virus_Removal=$this->input->post('Virus_Removal');
			
				$web_development_services_needed="";
					if ($Web_Hosting == 'Web Hosting')
					{$web_development_services_needed.="Web Hosting - ";}
					
					if ($Domain_Registration == 'Domain Registration')
					{
						$web_development_services_needed.="Domain Registration - ";
					}
					
					if ($Website_Design == 'Website Design')
					{
						$web_development_services_needed.="Website Design - ";
					}
					
					
					if($Website_Re_Design == 'Website Re-Design'){ $web_development_services_needed.="Website Re-Design - ";}
					
					if($SEO == 'SEO'){ $web_development_services_needed.="SEO - ";}
					if($Database_Developmen == 'Database Developmen') {$web_development_services_needed.="Database Developmen - ";}
					if($Bug_Fixing == 'Bug Fixing') $web_development_services_needed.="Bug Fixing - ";
					if($Custom_Web_Forms == 'Custom Web Forms') $web_development_services_needed.="Custom Web Forms - ";
					
					if($Content_Management_System == 'Content Management System') $web_development_services_needed.="Content Management System - ";
					if($Online_Store == 'Online Store') $web_development_services_needed.="Online_Store - ";
					if($Credit_Card_Processing == 'Credit Card Processing') $web_development_services_needed.="Credit Card Processing - ";
					if($Photo_Galleries == 'Photo Galleries') $web_development_services_needed.="Photo Galleries - ";
					
					if($Ongoing_Maintenance == 'Ongoing Maintenance') $web_development_services_needed.="Ongoing Maintenance - ";
					if($Fix_Hacked_Website == 'Fix a Hacked Website') $web_development_services_needed.="Fix a Hacked Website - ";
					if($Virus_Removal == 'Website Virus Removal') $web_development_services_needed.="Virus Removal ";

			//end collect value for checkbox
			
			//Start Send Email
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
					 
					$this->email->from('ahmed@lorewing.com', 'Lorewing.com - REQUEST A WEBSITE DEVELOPMENT QUOTE');
					$this->email->to('ahmed@lorewing.com'); 
					$this->email->reply_to($this->input->post('email'));
					
					$this->email->set_mailtype('html');
										
					$this->email->subject("REQUEST A WEBSITE DEVELOPMENT QUOTE");
					
					$quote_data = array(
					       	'name' => set_value('name'),
					       	'email' => set_value('email'),
					       	'phone' => set_value('phone'),
					       	'project_type' => set_value('project_type'),
					       	'domain_name' => set_value('domain_name'),
					       	'is_domain_name_purchased' => set_value('is_domain_name_purchased'),
					       	'do_you_have_web_hosting' => set_value('do_you_have_web_hosting'),
					       	'web_hosting_package' => set_value('web_hosting_package'),
					       	'web_development_services_needed' => $web_development_services_needed,
					       	'describe_project' => set_value('describe_project'),
					       	'project_spec' => nl2br(set_value('project_spec')), 
					       	'project_timeline' => set_value('project_timeline'),
					       	'project_budget' => set_value('project_budget')
						);
					//$message = nl2br($this->input->post('message')); //nl2br for add line in text box
		
		
					//$data = array( 'name' => $name , 'email' => $email,'subject' => $subject , 'message' => $message  );
					$email = $this->load->view('site/en/email/quote', $quote_data, TRUE);
					$this->email->message( $email );
					$this->email->send();
			
			//End Send Email
					
			// run insert model to write data to db
		
			if ($this->Data_model->SaveForm($quote_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				$this->session->set_flashdata('message', '<p class=\'success\'>تم أرسال الطلب بنجاح.</p>');
				redirect(current_url());
			}
			else
			{
			echo 'حدث خطأ أثناء إرسال البيانات – نرجو المحاوله مره أخري';
			// Or whatever error handling is necessary
			}
		}
	}
}
?>
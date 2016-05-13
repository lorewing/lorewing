<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
          $data=array(
			'title'=>'Lorewing Web Design & Development – Toronto & Dubai',
			'keywords'=>'web design,Website design,Responsive Web Design,Mobile Friendly Website Design,design company in toronto ,
						website development,web development,web development  toronto,web development uae,web development company,
						web design company,website development companies,web application development,web design services,
						professional web design,web design and development,web database development,SEO, Internet Marketing Dubai,
						Internet Marketing Toronto,toronto, ontario, graphic, graphic design, social media, marketing, advertising,
						vaughan,  toronto web design, toronto web development, web design company toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav');
		$this->load->view('site/en/home_en'); 
		$this->load->view('site/includes/footer');
		}
	
	public function web_design(){
		
		$data=array(
			'title'=>'Toronto Web Design | Lorewing Web Design & Development',
			'keywords'=>'Web Design,design,design company in toronto , design company in dubai , design company in uae ,Responsive Web Design,Mobile Friendly Website Design',
			'description' =>'LOREWING is a website design company with expertise in custom designed websites and Internet marketing for clients in Toronto and Dubai. Call the leader in Web Design Services +1-647-680-6263',
		);
		$this->load->view('site/includes/header',$data);
		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/web_design'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		
		public function web_development(){
		
		$data=array(
			'title'=>'Toronto Web Development | Lorewing Web Design & Development',
			'keywords'=>'web development, web development toronto,toronto web development, web developers, web development canada, web developers toronto , web development Dubai,Dubai web development, web development UAE, web developers Abu Dhabi',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call +1-647-680-6263',
		);
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/web_development'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function company_identity(){
$data=array(
			'title'=>'Company Identity - Lorewing Web Design & Development',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'Our team has been designing corporate identities for 10+ years. We have extensive knowledge and experience in designing successful identities for startups or rebranding visual identities for the established companies.  Call +1-647-680-6263',
		);
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/company_identity'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		
		public function local_search(){
          $data=array(
			'title'=>'Local Search - Lorewing Web Design & Development',
			'keywords'=>'local search,SEO Services, Listings,Marketing Company,SEP',
			'description' =>'Your customers are searching Google local &amp; mobile listings for your services. Get found and get more customers - call the company trusted by hundreds of businesses. Call +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/local_search'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function quote(){
          $data=array(
			'title'=>'Quote to build a website - Lorewing Web Design & Development',
			'keywords'=>'Web Development Quote, cost to build a website',
			'description' =>'Get a Web Development Quote for what it will cost to build your website. This is a free estimate to determine your website will cost. Call +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/quote'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function seo(){
          $data=array(
			'title'=>'SEO - Lorewing Web Design & Development',
			'keywords'=>'SEO Toronto ,Professional SEO services In Toronto ,Social Media , Best SEO Company ,Pay-Per-Click ',
			'description' =>'Call the leader in Internet Marketing & Web Design. Toronto Search Engine Optimization (SEO) Services. Improve Online Visibility and make SEO work for your Business ! Call us : +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/seo'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		
		public function social_media(){
          $data=array(
			'title'=>'Social Media - Lorewing Web Design & Development',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/social_media'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
	public function hosting(){
          $data=array(
			'title'=>'Hosting - Lorewing Web Design & Development',
			'keywords'=>'toronto web hosting,canada web hosting,Cloud hosting, server hosting, VPS hosting, dedicated servers',
			'description' =>'Web Hosting Services by Lorewing, Website hosting 
company offering Shared Hosting, VPS Hosting and Dedicated Servers. Call +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/hosting'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		
		}
		
		public function hosting_plan(){
          $data=array(
			'title'=>'Hosting Plan -Lorewing Web Design & Development',
			'keywords'=>'Hosting Plan,web hosting plan,features,email,Cpanel,customer support, unlimited domains',
			'description' =>'Each Linux plan includes cPanel. Access all the hosting features and settings you need with this industry-standard control panel. Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/hosting_plan'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function reseller_plan(){
          $data=array(
			'title'=>'Reseller Plan -Lorewing Web Design & Development',
			'keywords'=>'Reseller Hosting Plans,cPanel,Reseller Plan,Reseller hosting Plan in toronto',
			'description' =>"With our reseller hosting plans, you'll be able to quickly and inexpensively setup your own web hosting company. Check out our reseller hosting plans today. Call +1-647-680-6263",
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/reseller_plan'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function dedicated_servers(){
          $data=array(
			'title'=>'Dedicated Servers -Lorewing Web Design & Development',
			'keywords'=>'Dedicated Servers,Manage Servers,Dedicated Servers in toronto,Linux,centos',
			'description' =>'Lorewing provides managed dedicated server hosting in a custom architecture. Learn more about our managed hosting solutions & Support. Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/dedicated_servers'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function e_commerce(){
          $data=array(
			'title'=>'E-Commerce -Lorewing Web Design & Development',
			'keywords'=>'E-Commerce,Magento Solutions,E-Commerce company,E-Commerce company in toronto',
			'description' =>'Lorewing offers complete e-commerce solutions to help businesses automate electronic commerce.With years of experience in an array of industries, we can help your organization design the right solution to achieve results and increase profits. Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/e_commerce'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		function contact_us()
		{
			
			//Form Validation
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
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
			$this->email->reply_to($this->input->post('email'));  
			
			$this->email->set_mailtype('html');
			
			$this->email->subject("Lorewing Web Design Inc - Contact Us Page");
			
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$phone = $this->input->post('phone');
			$message = nl2br($this->input->post('message')); //nl2br for add line in text box


			$data = array( 'name' => $name , 'email' => $email,'subject' => $subject,'phone' => $phone , 'message' => $message  );
			$email = $this->load->view('site/ar/email/contact-us', $data, TRUE);
			$this->email->message( $email );
			$this->email->send();
			

				$this->session->set_flashdata('message', '<p class=\'success\'>Message was send successfully.</p>');
				redirect(current_url());
			}
			
		} // end function contact_us
		
		
		public function mobile_applications(){
                      $data=array(
			'title'=>'Mobile App Development -Lorewing Web Design & Development',
			'keywords'=>'mobile application developers, mobile application development, mobile app developers, mobile app development, mobile application developer services, business mobile application development, custom mobile app development, custom mobile app development',
			'description' =>'Looking to hire mobile app developers? Lorewing a mobile app development company, specializes in mobile application development services. Hire our mobile app developers today! Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/mobile_applications'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function news(){
		
		$data=array(
			'title'=>'Lorewing Web Design & Development – Site News',
			'keywords'=>'Web Design,design,design company in toronto , design company in dubai , design company in uae ,Responsive Web Design,Mobile Friendly Website Design',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call +1-647-680-6263',
		);
		$this->load->view('site/includes/header',$data);
		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/news'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

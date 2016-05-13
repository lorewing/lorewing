<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_ar extends CI_Controller {

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
          /*$data=array(
			'title'=>'Lorewing Web Design Toronto, SEO, Internet Marketing Dubai',
			'keywords'=>'web design,Website design,Responsive Web Design,Mobile Friendly Website Design,design company in toronto ,
						website development,web development,web development  toronto,web development uae,web development company,
						web design company,website development companies,web application development,web design services,
						professional web design,web design and development,web database development,SEO, Internet Marketing Dubai,
						Internet Marketing Toronto,toronto, ontario, graphic, graphic design, social media, marketing, advertising,
						vaughan,  toronto web design, toronto web development, web design company toronto',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );*/
				  
				  $data=array(
			'title'=>'شركة لوروينج لتصميم وتطوير مواقع الإنترنت فروعنا بدبي و كندا',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav');
		$this->load->view('site/ar/home_ar'); 
		$this->load->view('site/includes_ar/footer');
		}
	
	public function web_design(){
		
		$data=array(
			'title'=>'تصميم المواقع | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'تصميم صفحات الإنترنت، تصميم المواقع، تصميم صفحات أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،   تصميم مواقع، دبي ، تصميم موقع نادي ، شركات تصميم مواقع',
			'description' =>' لوروينج اسم رائد خبرتنا تجاوزت 15 سنة من العطاء في مجال خدمات تصميم مواقع الإنترنت ، أعمالنا تتحدث عنا وعملائنا يشهدون لنا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);
		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/web_design'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		public function web_development(){
		
		$data=array(
			'title'=>'تطوير المواقع الإلكترونية| شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'تطوير مواقع، تصميم صفحات أنترنت، MVC CodeIgniter ، تطوير المواقع الإلكترونية،PHP ، نظم إدارة المحتوى ، CMS، شركات تطوير موقع في دبي ',
			'description' =>'تقدم لوروينج لتصميم وتطوير المواقع مجموعة واسعة من حلول التصميم والتطوير. فريق عملنا الاحترافي يتكون من خبراء متخصصين في كل فرع.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/web_development'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		public function company_identity(){
$data=array(
			'title'=>'الهوية الاعلانية | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/company_identity'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		public function forum(){
                     $data=array(
			'title'=>'Forum - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		);
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/forum'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		
		public function mobile_applications(){
                     $data=array(
			'title'=>'تطبيقات الهواتف الذكية | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/mobile_applications'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		
		public function domain(){
          $data=array(
			'title'=>'Domain - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		);
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/domain'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		
		public function local_search(){
          $data=array(
			'title'=>'البحث المحلي | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/local_search'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		
		
		public function seo(){
         $data=array(
			'title'=>'خدمات التسويق الالكترونى | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/seo'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		
		public function social_media(){
        $data=array(
			'title'=>'اعلانات الفيس بوك المدفوعة | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/social_media'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
	public function hosting(){
          $data=array(
			'title'=>'استضافة المواقع | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
عروض استضافة مواقع لينكس | شركة لوروينج , استضافة مواقع, استضافة خادم, حلول الاستضافة, استضافة مشتركة, استضافة افتراضية, استضافة vps
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/hosting'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		
		}
		
		public function hosting_plan(){
          $data=array(
			'title'=>'عروض الأستضافه | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
عروض استضافة مواقع لينكس | شركة لوروينج , استضافة مواقع, استضافة خادم, حلول الاستضافة, استضافة مشتركة, استضافة افتراضية, استضافة vps
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/hosting_plan'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		public function reseller_plan(){
          $data=array(
			'title'=>'استضافة vps | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
عروض استضافة مواقع لينكس | شركة لوروينج , استضافة مواقع, استضافة خادم, حلول الاستضافة, استضافة مشتركة, استضافة افتراضية, استضافة vps',			

			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/reseller_plan'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		public function dedicated_servers(){
          $data=array(
			'title'=>'السيرفرات الخاصة | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'السيرفرات الخاصة | شركة لوروينج , استضافة مواقع, استضافة خادم, حلول الاستضافة, إستضافة سيرفر , استضافة',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/dedicated_servers'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		public function e_commerce(){
          $data=array(
			'title'=>'التجارة الإلكترونية | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، مصر، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/e_commerce'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
		
		function contact_us()
		{
			
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
			'title'=>'إتصل بنا | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج، تصميم مواقع، تسويق الكتروني، تصميم صفحات الإنترنت، تصميم المواقع الإخبارية، تطوير مواقع، تصميم صفحات أنترنت، web design، web development، لوروينج، أنترنت، تصميم مواقع الإنترنت، عروض تصميم المواقع، تسويق واشهار مواقع ، شركة لوروينج تصميم مواقع،  ،Lorewing web design، تصميم مواقع، دبي ، تورونتوا  ، كندا ، تصميم موقع نادي ، شركات تصميم مواقع، شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت ، تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
				$this->load->view('site/includes_ar/header',$data);
		
				$this->load->view('site/includes_ar/nav');
				$this->load->view('site/ar/home_ar'); 
				$this->load->view('site/includes_ar/footer');
				
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
			

				$this->session->set_flashdata('message', '<p class=\'success\'>تم أرسال الرساله بنجاح</p>');
				redirect(current_url());
			}
			
		} // end function contact_us
		
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_development extends CI_Controller {

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
			'title'=>'تطوير المواقع الإلكترونية| شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'تطوير مواقع,تصميم صفحات أنترنت,MVC CodeIgniter,تطوير المواقع الإلكترونية,PHP,نظم إدارة المحتوى,CMS,شركات تطوير موقع في دبي',
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
		
}

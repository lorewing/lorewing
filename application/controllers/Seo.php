<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends CI_Controller {

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
			'title'=>'خدمات التسويق الالكترونى | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'خدمات التسويق الالكترونى,محركات البحث,تورونتوا لخدمات التسويق الالكتروني,جوجل اد ورد,الخدمات الإعلانية,Google AdWords,التسويق الالكتروني عبر الانترنت,التسويق عبر وسائل الإعلام الاجتماعي,دبي لخدمات التسويق الالكتروني',
			'description' =>'اجعل موقعك فى صدارة محركات البحث وخصوصا جوجل بكلمات يبحث عنها الزوار للوصول الى منتجات وخدمات موقعك .
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/seo'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
}

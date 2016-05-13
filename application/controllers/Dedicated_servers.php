<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dedicated_servers extends CI_Controller {

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
			'title'=>'السيرفرات الخاصة | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'السيرفرات الخاصة شركة لوروينج ,استضافة مواقع,استضافة خادم,حلول الاستضافة,إستضافة سيرفر,استضافة',
			'description' =>'نحن نساعدك على اختيار الخادم/السيرفر المناسب لك, عن طريق تقديم خطط متعددة تناسب احتياجاتك مهما كانت.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/dedicated_servers'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
}

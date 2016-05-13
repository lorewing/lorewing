<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller_plan extends CI_Controller {

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
			'title'=>'استضافة vps | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
عروض استضافة مواقع لينكس | شركة لوروينج , استضافة مواقع, استضافة خادم, حلول الاستضافة, استضافة مشتركة, استضافة افتراضية, استضافة vps',			

			'description' =>'نحن نقدم خدمات استضافة VPS المستندة إلى الحوسبة السحابية. لدينا أفضل الأسعار في هذا المجال.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/reseller_plan'); 
		//$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
}

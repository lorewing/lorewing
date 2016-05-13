<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_identity extends CI_Controller {

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
			'title'=>'الهوية الاعلانية | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'الهوية الاعلانية, تصميم جرافيك , لوجو شركة , سلوجان ,إعلان,شركات تصميم لوجو',
			'description' =>'شركة لوروينج تقوم برسم الخطوط العريضة للهوية الاعلانية لمؤسستكم بناءاً على معايير فنية متنوعة على عدة خطوات بعد ان نبدأ معكم من البداية بدراسة السوق والسوق المنافسة لتحديد الجدوى من المشروع والوسائل الاعلانية المؤثرة.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/company_identity'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
		
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_commerce extends CI_Controller {

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
			'title'=>'التجارة الإلكترونية | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'تسويق الكتروني,تجارة الكترونيه,تسويق واشهار مواقع,ماجينتو,شراء اون لاين,بيع وشراء اون لاين',
			'description' =>'التجاره الالكترونيه  والتسويق الالكتروني هي عرض المنتجات من خلال موقعك مما  يتيح للملايين من العملاء التعرف على منتجاتك ومشاهدة صور كل منتج وأيضا عمل طلب لشراء المنتجات من خلال الموقع.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/e_commerce'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
}

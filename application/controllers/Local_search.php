<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local_search extends CI_Controller {

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
			'title'=>'البحث المحلي | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'
شركة لوروينج, تصميم مواقع, تسويق الكتروني, تصميم صفحات الإنترنت, تصميم المواقع الإخبارية, تطوير مواقع, تصميم صفحات أنترنت, web design, web development, لوروينج, أنترنت, تصميم مواقع الإنترنت, عروض تصميم المواقع, تسويق واشهار مواقع , شركة لوروينج تصميم مواقع,  ,Lorewing web design, تصميم مواقع, دبي , تورونتوا  , كندا , تصميم موقع نادي , شركات تصميم مواقع, شركات تسويق الكتروني 
',
			'description' =>'شركة لوروينج لتصميم وتطوير مواقع الانترنت , تقدم الشركة خدمات محترفه في مجال تصميم وتطوير المواقع في دبي وكندا.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		
		$this->load->view('site/includes_ar/header',$data);

		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/local_search'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
}

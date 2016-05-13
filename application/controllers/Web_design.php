<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_design extends CI_Controller {

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
			'title'=>'تصميم المواقع | شركة لوروينج لتصميم وتطوير المواقع',
			'keywords'=>'تصميم صفحات الإنترنت,تصميم المواقع,تصميم مواقع الإنترنت دبي, عروض تصميم المواقع ,شركة لوروينج تصميم مواقع,شركات تصميم مواقع دبي,تصميم موقع نادي,تصميم مواقع في دبي,تصميم مواقع دبي,شركة تصميم مواقع في دبي,تصاميم مرنه',
			'description' =>' ننقوم في شركة لوروينج بعمل تصميم مواقع و برمجة بأحدث لغات التكويد و البرمجة المتوافقة مع المتصفحات المختلفة والهواتف الذكيه (التصاميم المرنه)  كما نقوم بعمل التصميم بما يتوافق مع محركات البحث.
للتواصل معنا من خلال فيبر أو واتس أب / 0016476806263
',
		          );
		$this->load->view('site/includes_ar/header',$data);
		$this->load->view('site/includes_ar/nav_internal');
		$this->load->view('site/ar/web_design'); 
		$this->load->view('site/includes_ar/sidebar');
		$this->load->view('site/includes_ar/footer');
		}
}

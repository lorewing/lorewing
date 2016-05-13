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
			'title'=>'SEO - Lorewing Web Design & Development',
			'keywords'=>'seo toronto,professional seo services In toronto,best seo company,pay-per-click,seo company,
,seo abu dhabi,seo companies toronto,seo,seo company toronto,seo vaughan,lorewing seo
,seo web development,seo services in toronto,seo services in dubai,seo services,seo in toronto,seo in vaughan
,seo in uae,seo in dubai,toronto best seo company web design pay per click,seo and web design companies
,seo and web design,Internet Marketing
',
			'description' =>'Call the leader in Internet Marketing & Web Design. Toronto Search Engine Optimization (SEO) Services. Improve Online Visibility and make SEO work for your Business ! Call us : +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/seo'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

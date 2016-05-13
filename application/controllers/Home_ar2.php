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
          $data=array(
			'title'=>'Lorewing Web Design Toronto, SEO, Internet Marketing Dubai',
			'keywords'=>'web design,Website design,Responsive Web Design,Mobile Friendly Website Design,design company in toronto ,
						website development,web development,web development  toronto,web development uae,web development company,
						web design company,website development companies,web application development,web design services,
						professional web design,web design and development,web database development,SEO, Internet Marketing Dubai,
						Internet Marketing Toronto,toronto, ontario, graphic, graphic design, social media, marketing, advertising,
						vaughan,  toronto web design, toronto web development, web design company toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav');
		$this->load->view('site/en/home_en'); 
		$this->load->view('site/includes/footer');
		}
	
	public function web_design(){
		
		$data=array(
			'title'=>'Web Design Toronto | Responsive Web Design | Mobile Friendly Website Design - Lorewing Web Design Inc.',
			'keywords'=>'Web Design,design,design company in toronto ,Responsive Web Design,Mobile Friendly Website Design',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		);
		$this->load->view('site/includes/header',$data);
		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/web_design'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function web_development(){
		
		$data=array(
			'title'=>'Web Development - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		);
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/web_development'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function company_identity(){
$data=array(
			'title'=>'Company Identity - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		);
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/company_identity'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function forum(){
                     $data=array(
			'title'=>'Forum - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		);
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/forum'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function domain(){
          $data=array(
			'title'=>'Domain - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		);
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/domain'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		
		public function local_search(){
          $data=array(
			'title'=>'Local Search - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/local_search'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function quote(){
          $data=array(
			'title'=>'Quote - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/quote'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function seo(){
          $data=array(
			'title'=>'SEO - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/seo'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		
		public function social_media(){
          $data=array(
			'title'=>'Social Media - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/social_media'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
	public function hosting(){
          $data=array(
			'title'=>'Hosting - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/hosting'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		
		}
		
		public function hosting_plan(){
          $data=array(
			'title'=>'Hosting Plan - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/hosting_plan'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function reseller_plan(){
          $data=array(
			'title'=>'Reseller Plan - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/reseller_plan'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function dedicated_servers(){
          $data=array(
			'title'=>'Dedicated Servers - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/dedicated_servers'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		public function e_commerce(){
          $data=array(
			'title'=>'E-Commerce - Lorewing Web Design Inc.',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'A Toronto web design company that offers professional custom web design, web development and search engine optimization services. Call 647-680-6263"',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/e_commerce'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		
}

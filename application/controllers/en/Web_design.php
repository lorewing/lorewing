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
			'title'=>'Toronto Web Design | Lorewing Web Design & Development',
			'keywords'=>'responsive web design,website design toronto,web design company,web designing,web design companies,website design company,custom web design toronto,toronto web design companies,ecommerce web design toronto,web design firms,web designing company,toronto web design firm,website design dubai,custom web design dubai,dubai web design companies,dubai web design firm,design company in uae,best dubai web design companies,custom designed websites,web design services',
			'description' =>'LOREWING is a toronto web design company with expertise in custom designed websites and responsive web design for clients in Toronto and Dubai. Call the leader in Web Design Services +1-647-680-6263',
		);
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/web_design'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
		}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_development extends CI_Controller {

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
			'title'=>'Toronto Web Development | Lorewing Web Design & Development',
			'keywords'=>'web development services,web development company,web development,web development firm,toronto web development,web development in toronto,web development dubai,web development services dubai,website design and web application development services,website development abu dhabi,dubai web development,web development in dubai,dubai web design development,dubai based web design application development company,dubai web developer designer,application development services,
',
			'description' =>'A Toronto web development company that offers professional web development services and application development services Call +1-647-680-6263',
		);
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/web_development'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
}

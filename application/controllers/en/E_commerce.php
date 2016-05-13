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
			'title'=>'E-Commerce -Lorewing Web Design & Development',
			'keywords'=>'e-commerce,magento solutions,e-commerce company,e-commerce company in toronto,e-commerce company in dubai
,ecommerce web design dubai,ecommerce web design in dubai,ecommerce web design toronto,e-commerce solutions in toronto,e-commerce solutions in dubai',
			'description' =>'Lorewing offers complete e-commerce solutions to help businesses automate electronic commerce.With years of experience in an array of industries, we can help your organization design the right solution to achieve results and increase profits. Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/e_commerce'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

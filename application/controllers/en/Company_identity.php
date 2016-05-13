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
			'title'=>'Company Identity - Lorewing Web Design & Development',
			'keywords'=>'web design,design,design company in toronto',
			'description' =>'Our team has been designing corporate identities for 10+ years. We have extensive knowledge and experience in designing successful identities for startups or rebranding visual identities for the established companies.  Call +1-647-680-6263',
		);
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/company_identity'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
		
}

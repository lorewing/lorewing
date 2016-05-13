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
			'title'=>'Local Search - Lorewing Web Design & Development',
			'keywords'=>'local search,Local Business Setup,Online marketing for local business,Website optimization in toronto,Website optimization in dubai, Listings,Marketing Company,SEP',
			'description' =>'Your customers are searching Google local &amp; mobile listings for your services. Get found and get more customers - call the company trusted by hundreds of businesses. Call +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/local_search'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

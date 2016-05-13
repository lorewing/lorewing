<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dedicated_servers extends CI_Controller {

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
			'title'=>'Dedicated Servers -Lorewing Web Design & Development',
			'keywords'=>'Dedicated Servers,Manage Servers,Dedicated Servers in toronto,Linux,centos',
			'description' =>'Lorewing provides managed dedicated server hosting in a custom architecture. Learn more about our managed hosting solutions & Support. Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/dedicated_servers'); 
		//$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

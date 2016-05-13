<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile_applications extends CI_Controller {

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
			'title'=>'Mobile App Development -Lorewing Web Design & Development',
			'keywords'=>'mobile application developers, mobile application development,mobile friendly website design,mobile app developers,mobile app development,mobile application development services,business mobile application development,custom mobile app development',
			'description' =>'Looking to hire mobile app developers? Lorewing a mobile app development company, specializes in mobile application development services. Hire our mobile app developers today! Call +1-647-680-6263',
		          );
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/mobile_applications'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

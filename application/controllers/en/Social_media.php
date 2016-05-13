<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_media extends CI_Controller {

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
			'title'=>'Social Media - Lorewing Web Design & Development',
			'keywords'=>'social media,social media services in toronto,social media services in dubai,social media services,email marketing in dubai,email marketing in toronto',
			'description' =>'A Toronto web design company that offers professional social media services, email marketing  and search engine optimization services. Call +1-647-680-6263',
		          );
		
		$this->load->view('site/includes/header',$data);

		$this->load->view('site/includes/nav_internal');
		$this->load->view('site/en/social_media'); 
		$this->load->view('site/includes/sidebar');
		$this->load->view('site/includes/footer');
		}
}

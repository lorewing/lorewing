<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Form extends CI_Controller {
	
	function __construct()
	{
		parent:: __construct();
	}
	
	

	public function index()
	{
		$this->load->view("admincms/form");
	}
	
	function save_project()
	{
		//echo 'save_project';
		
		//Form Validation
		$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('project_start', 'Project Start Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('project_end', 'Project End Date', 'trim|required|xss_clean');

		//If form validation failed, return to the form and throw out errors
		if($this->form_validation->run() == false)
		{
			//echo "errors";
			$this->load->view('admincms/form');
		}
		else
		{
			//validation passed, check db and run the membership_model
			$this->load->model('projects');
			$query = $this->projects->add_project();
			
		}
		


	}

}



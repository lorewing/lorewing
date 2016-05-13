<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() 
		{
       		 parent::__construct();
			 if ( $this->input->post( 'remember_me' ) ) // set sess_expire_on_close to 0 or FALSE when remember me is checked.
            $this->config->set_item('sess_expire_on_close', '0'); // do change session config
       		$this->load->library('session');
			$is_logged_in = $this->session->userdata('is_logged_in');

   		 }
	
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$account_type = $this->session->userdata('account_type');
		
		if(!isset($is_logged_in) || $is_logged_in != true || $account_type != 1)
		{
			redirect("admincms/login");
		}		
	}

	public function index()
		{
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
				
				$data['site_title'] = "Login Page";
				$this->load->view('admincms/login',$data);
			}
			else
			{
				$data['site_title'] = "Home Page";
				$this->load->view('admincms/home',$data);
				
	
			}
		}
		
		function validate_credentials()
		{
			//Form Validation
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			
			//If form validation failed, return to the form and throw out errors
			if($this->form_validation->run() == false)
			{
				//echo "errors";
				$data['site_title'] = "Login Page";
				$this->load->view('admincms/login',$data);
			}
			else
			{
				//validation passed, check db and run the membership_model
				$this->load->model('membership_model');
				$query = $this->membership_model->validate();
				
				if($query) // if the user's credentials validated...
				{
					$data = array(
						'email' => $this->input->post('email'),		
						'is_logged_in' => true
					);
					
					$this->session->set_userdata($data);
						
					redirect('admincms/home');
					//$this->load->view('admincms/home');

				}
				else // incorrect username or password
				{
					$this->index();
				}
			}
		
		}
		
		function logout()
		{
			$this->session->sess_destroy();
			
			$data['site_title'] = "Login Page";
			$this->load->view('admincms/login',$data);
		}
                
                function internal()
                {
                    $data['site_title'] = "Internal Page";
                    $this->load->view('admincms/Internal',$data);
                }
                
                function form_validation()
                {
                    $data['site_title'] = "Internal Page";
                    $this->load->view('admincms/form_validation',$data);
                }
		
                
                function layout()
                {
                    $data['site_title'] = "Layout Page";
                    $this->load->view('admincms/layout',$data);
                }
                
}// End Class



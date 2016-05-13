<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Captcha extends CI_Controller {
 
 /* Initialize the controller by calling the necessary helpers and libraries */
  public function __construct()
  {
    parent::__construct();
    
    /* Load the libraries and helpers */
    $this->load->library('form_validation');
   // $this->load->driver("session");
    $this->load->helper(array('form', 'url', 'captcha'));
  }
   
   
  /* The default function that gets called when visiting the page */
	public function index()
	{
    
    /* Set a few basic form validation rules */
    $this->form_validation->set_rules('name', "Name", 'required');
    $this->form_validation->set_rules('captcha', "Captcha", 'required');
    
    /* Get the user's entered captcha value from the form */
    $userCaptcha = set_value('captcha');
    
    /* Get the actual captcha value that we stored in the session (see below) */
    $word = $this->session->userdata('captchaWord');
      
      
      
    /* Check if form (and captcha) passed validation*/
    if ($this->form_validation->run() == TRUE &&
        strcmp(strtoupper($userCaptcha),strtoupper($word)) == 0)
    {
      /** Validation was successful; show the Success view **/
      
      
      /* Clear the session variable */
      $this->session->unset_userdata('captchaWord');
      
      
      /* Get the user's name from the form */
      $name = set_value('name');
    
      /* Pass in the user input to the success view for display */
      $data = array('name' => $name);
      $this->load->view('success-view', $data);


    }
    else 
    {
      
      /** Validation was not successful - Generate a captcha **/
      
      /* Setup vals to pass into the create_captcha function */
      
      $vals = array(
        'img_path' => 'static/',
        'img_url' => base_url().'static/',
        );
        
      /* Generate the captcha */
      $captcha = create_captcha($vals);
      
      /* Store the captcha value (or 'word') in a session to retrieve later */
      $this->session->set_userdata('captchaWord', $captcha['word']);
      
      /* Load the captcha view containing the form (located under the 'views' folder) */
      $this->load->view('captcha-view', $captcha);
    }
		
	}
	
	function post(){
			 $this->load->helper('captcha');
			
			 $vals = array(
			'img_path'	=> './captcha/',
			'img_url'	=> base_url().'captcha/',
			'img_width'	=> '150',
			'img_height' => 30		
			);
		
			$cap = create_captcha($vals);
			$this->session->set_userdata('captcha',$cap['word']);
			$data['captcha']=$cap['image'];
			
			 $this->load->view('captcha-view', $data);
		
		}
}

/* End of file captcha.php */
/* Location: ./application/controllers/captcha.php */
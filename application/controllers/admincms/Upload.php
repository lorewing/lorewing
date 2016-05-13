<?php

class Upload extends CI_Controller {

function __construct()
{
    parent::__construct();
    $this->load->helper(array('form', 'url','html'));
}

function index()
{    
    $this->load->view('uploadform', array('error' => ' ' ));
}

function do_upload()
{

    $this->load->library('upload');

    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {

        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    



    $this->upload->initialize($this->set_upload_options());
    $this->upload->do_upload();


    }

} // finish do_upload
		private function set_upload_options()
		{   
		//  upload an image options
			$config = array();
			$config['upload_path'] = './private/media/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
		
		
			return $config;
		} // Finish set_upload_options
 }
 ?> 
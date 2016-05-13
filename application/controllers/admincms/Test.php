<?php

	class Test extends CI_Controller
	{
		function __construct()
		{
			
			parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
			
		}
	
		public function index()
		{
			$this->load->view('admincms/test3');
		}

	}
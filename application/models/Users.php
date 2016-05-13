<?php

	class Users extends CI_Model
	{
		function display_profile()
		{
			$query = $this->db->get_where('users', array('id'=>$this->session->userdata("current_user")));
			foreach ($query->result() as $row)
			{
				$data['firstname'] 			= $row->firstname;
				$data['lastname'] 			= $row->lastname;
				$data['email'] 				= $row->email;
				$data['title'] 				= $row->title;
				$data['company'] 			= $row->company;
			}
			return $query->result();	
		}
	}
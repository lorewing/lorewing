<?php

	class Membership_model extends CI_Model
	{
		function validate()
		{
			$where = "user_email = '" . $this->input->post('email') . "' AND active = 1 AND password = '" . md5($this->input->post('password')) . "' ";
			$this->db->where($where);
			$query = $this->db->get('user');
			
			//echo $this->db->last_query();die();
			
			if($query->num_rows() == 1)
			{
				//store current row into a variable
				$row = $query->row();
				
				$userdata = array(
					'current_user' 	=> $row->user_id,
					'firstname' 	=> $row->user_first_name,
					'role' 	=> $row->role
				);
				
				$this->session->set_userdata($userdata);
				
				return true;
			}
			else
			{
				$this->session->set_flashdata('login_incorrect', '<p class=\'success\'>The email or password is incorrect. Please ensure that 	your account has been activated prior to login.</p>');
				redirect('admincms/login');
			}
		}

		function reset_password()
		{
			$this->db->where('email', $this->input->post('email'));

			$query = $this->db->get('users');

			if($query->num_rows == 1)
			{
				//store current row into a variable
				$row = $query->row();

				$db_email = $row->email;

				if ($this->input->post('email') == $db_email) {
					$token = md5(rand());
					$this->db->set(array('password_token' => $token));
					$this->db->where('email', $this->input->post('email'));
					$this->db->update('users');
					
					/*$message =
					'
						To reset your password please use the link below
						http://www.insidercondoclub.com/agent/index.php/admincms/reset_password?email='.$db_email.'&token='.$token.'
					';*/
			
			$config = Array(
			'protocol' => 'smtp',
     	    'smtp_host' => 'mail.insidercondoclub.com',
			'smtp_port' => 25,
			'smtp_user' => 'webadmin@insidercondoclub.com',
			'smtp_pass' => 'bti2000',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE
    );
	   		 $this->load->library('email', $config);
			
			$this->email->from('DoNotReply@insidecondoclub.com', 'Insider Condo Club');
			$this->email->to($db_email); 
			//$this->email->cc('ahmed@lorewing.com'); 
			
			$this->email->set_mailtype('html');
			
			$this->email->subject("Password reset");
					
			$message 	 = 'Hi  '.$row->firstname .'';
			$message 	.= '<p>We heard that you might have forgotten your Insider Condo Club Agent Portal password. </p>';	
			$message 	.= '<p>Simply click on the "Reset Password" button below to select your new password.</p>';	
			$message 	.= '<p><a href="http://www.insidercondoclub.com/agent/index.php/admincms/reset_password?email='.$db_email.'&token='.$token.'">RESET PASSWORD</a></p>';	
			$message 	.= '<p>If you are unable to click on this link, copy and paste the link into your web browser.</p>';
		    $message 	.= '<p>http://www.insidercondoclub.com/agent/index.php/admincms/reset_password?email='.$db_email.'&token='.$token.'</p>';	
			$message	.= '<p>If you did not initiate this request or received this email in error, please ignore this email. If you have any questions, please contact us at info@insidercondoclub.com </p>';	
			$message 	.= '<p>Thank you! <br>The Insider Condo Club Team.</p>';	

					//mail($db_email, 'Password reset', $message, 'From: DoNotReply@icc.com');
				
				$this->email->message($message);
			
			if($this->email->send())
			{
					$this->session->set_flashdata('email_correct', '<p class=\'success\'>An email has been sent to your email address with instructions. Please check email to reset your password.</p>');

					redirect('admincms/forgot_password');
				}
				}
				return true;
			}
			else
			{
				$this->session->set_flashdata('email_incorrect', '<p class=\'error\'>The email is not in the system. Please try again.</p>');
				redirect('admincms/forgot_password');
			}
		}
		
		function reset_pass()
		{
			$email = $this->input->get('email', true);
			$token = $this->input->get('token', true);
			$password = md5($this->input->post('password'));
			
			$this->db->where(array('email' => $email, 'password_token' => $token));
			$select = $this->db->get('users');
			
			if($select->num_rows == 1)
			{
				$row = $select->row();
				
				if($row->email == $email && $row->password_token == $token)
				{
					$reset_ip = $_SERVER['REMOTE_ADDR'];

					$this->db->set(array('password' => $password,'reset_ip' =>$reset_ip, 'password_token' => 0 , 'active' =>1));
					$this->db->where(array('email' => $email, 'password_token' => $token));
					$query = $this->db->update('users');
					
					if($query)
					{
						$this->session->set_flashdata('password_changed', '<p class="success">Password has been changed</p>');
						redirect('admincms/login');
					}
					else
					{
						$this->session->set_flashdata('something_error', '<p class="success">Oops, something went wrong when trying to set your new passsword. Please try again in a few minutes.</p>');
						redirect('admincms/login');
					}
				}
				
				return true;
			}
			else
			{
				$this->session->set_flashdata('something_error', '<p class="success">We are sorry but either this email address is invalid or your password reset request is out of date. Please click on the Forgot password link to try again.</p>');
				redirect('admincms/login');
			}
		}

// pass_Set function is only used at the launch of the portal to allow people imported into the system to set a password.		
		function pass_set()
		{
			$email = $this->input->get('email', true);
			$token = $this->input->get('token', true);
			$password = md5($this->input->post('password'));
			
			$email_opt = $this->input->post('agreement_accept');
				if ($email_opt==1){
					$email_opt = 'YES';
					}else{
						$email_opt = 'NO';
							}
							

			$this->db->where(array('email' => $email, 'password_token' => $token));
			$select = $this->db->get('users');
			
			if($select->num_rows == 1)
			{
				$row = $select->row();
				
				
					$reset_ip = $_SERVER['REMOTE_ADDR'];

					$this->db->set(array('password' => $password,'reset_ip' =>$reset_ip, 'password_token' => 0, 'active' => 1,  'email_opt' => $email_opt));
					$this->db->where(array('email' => $email, 'password_token' => $token));
					$query = $this->db->update('users');
					
					if($query)
					{
						$this->session->set_flashdata('password_changed', '<p class="success">Password has been saved.</p>');
						redirect('admincms/login');
					}
					else
					{
					$this->session->set_flashdata('password_set_message', '<p class="error">Oops, something went wrong when trying to set your new passsword. Please try again in a few minutes.</p>');
						redirect('admincms/password_set?email='.$email.'&token='.$token);
					}
				
				
			}
			else
			{
				$this->session->set_flashdata('password_set_message', '<p class="error">We are sorry but either this email address is invalid or your password reset request is out of date. Please try again in a few minutes.</p>');
				redirect('admincms/password_set?email='.$email.'&token='.$token);
			}
		}
		
		function getUserData($email)
		{
			$where = "email = '" . $email. "' AND active = 1 ";
			$this->db->where($where);
			$query = $this->db->get('users');
			
			if($query->num_rows == 1)
			{
				//store current row into a variable
				$row = $query->row();
				$userdata = array(
					'current_user' 	=> $row->id,
					'firstname' 	=> $row->firstname,
					'account_type' 	=> $row->account_type,
					'email' => $email,		
					'is_logged_in' => true
				);
				$this->session->set_userdata($userdata);
				return true;
			}
		}

		function getAll() {
			$q = $this->db->get('newsletter');
			
				if($q->num_rows() > 0) {
					foreach ($q->result() as $row) {
						$data[] = $row;
					}
					return $data;
				}
			}
			
			
		function get_content($call_name) {
        $this->db->where('call_name', $call_name);
        $query = $this->db->get('content', 1);
        if ($query->num_rows() == 1) {
           $row = $query->row();
           return $row->seo_description;
		   return $row->seo_keywords;
        }
    } 	
	
	function getKeywords($call_name)
		{
			$this->db->where('call_name', $call_name);
			$query = $this->db->get('content');
			
			if($query->num_rows == 1)
			{
				//store current row into a variable
				$row = $query->row();
				$KeywordsData = array(
					'seo_keywords' 	=> $row->seo_keywords,
					'seo_description' 	=> $row->seo_description
				);
				$this->session->set_userdata($KeywordsData);
				return true;
			}
		}		
}
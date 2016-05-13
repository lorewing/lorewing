<?php
/**
 *>  Controller : Roles
 *>  Task : This controller design for all the roles code
 *>  Author: Ajay
*/


class Roles extends CI_Controller {
	/**
	 * Constructor
	 */	
	function __construct()
	{
		    parent:: __construct();
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->model('membership_model');
                        $this->lang->load('english_lang', 'english');
			$this->is_logged_in();
			
			// main original code
			$this->load->library('form_validation');
			$this->load->model('role');
			//$this->load->language('sales_role','english');
			$this->session->set_userdata('selectedMenu','roles');
		
		
	}

	/**
	* Method Name : index 
	* Parameter: Session User Id
	* Task : Loading View for Listing Roles at index 
	*/

	function index(){
		
		     $data['site_title'] = "Roles";
		
			$this->load->view('admincms/role/index', $data);
			
	}

	/**
	* Method Name : permission 
	* Parameter: Session User Id
	* Task : Loading for View Editing Roles  at Edit
	*/
	
	function permission(){
		$role_id=decodeId($this->uri->segment(4,null));
		if($role_id==null){									// if Id is empty
			redirect("admincms/roles/");		
		}
		$data['site_title'] = "Set Permission";
		$data['role_id']=$role_id;
		$this->load->view("admincms/role/permission",$data);
	}//edit end


	function setPermissionStatus(){
		$role_id=$this->input->post('role_id');
		$menu_id=$this->input->post('menu_id');
		$is_active=$this->input->post('is_active');		
		
		if(!$this->general->checkRoleMenu($menu_id,$role_id,true)) {		
				$data=array('role'=>$role_id,
								'mst_menus_id'=>$menu_id,
								'is_allow'=>$is_active);
				$this->general->addData(TBL_MENU_HAS_ROLES,$data);		
		}else{
				$data_c=array('role'=>$role_id,
								'mst_menus_id'=>$menu_id);
				$this->general->updateData(TBL_MENU_HAS_ROLES,$data_c,array('is_allow'=>$is_active));					
		}
	}
	
	/**
	* Method Name : addRoles
	* Parameter: Session User Id
	* Task : Loading View for Adding Roles  at add
	*/

	public function add(){
		$this->load->view('admincms/role/add');
	}

	/**
	* Method Name : save 
	* Parameter: Session User Id
	* Task : Loading for Saving Roles   
	*/
	
	function save(){
		$user_id= $this->session->userdata('user_id');
		$role=$this->input->post("title");
	    $savemore=$this->input->post("savemore"); 
		$this->form_validation->set_rules('title', 'Role ', 'required|trim|xss_clean');

		$is_default=$this->input->post("is_default");
		$is_default=($is_default ==TRUE)?TRUE:FALSE;		

		$is_active=$this->input->post("is_active");
		$is_active=($is_active ==TRUE)?TRUE:FALSE;	
				
		if ($this->form_validation->run() == FALSE){		
				$this->load->view('admincms/role/add');
		}else if($this->role->validate_role($role)>0){
				set_flash_message(ROLE_EXIST,'error');
				$this->load->view('admincms/role/add');
		}
		else{
				$data=array('title'=>$role,
							'is_active'=>$is_active);
				$role_id=$this->general->addData(TBL_MST_ROLES,$data);
				
				// code for the default role
				if($is_default==TRUE){
					$data=array('is_default'=>FALSE);						
					$this->general->updateData(TBL_MST_ROLES,array('is_default'=>TRUE),$data);
					$data=array('is_default'=>TRUE);
					$this->general->updateData(TBL_MST_ROLES,array('id'=>$role_id),$data);
				}
				if($savemore=='more'){
					set_flash_message(RECORD_SUCCESSFULLY_SAVED);
					redirect("admincms/roles/add");
			    }else{
	               set_flash_message(RECORD_SUCCESSFULLY_SAVED);
				   redirect("admincms/roles/");
				}
		}//else end
	}//save end
	
	
	/**
	* Method Name : setDefaultRole
	* Parameter: NULL
	* Task : Loading for updating the role and set the default
	*/
	
	function setDefaultRole(){
		$role_id=decodeId($this->uri->segment(4,null));
	    $role_status=decodeId($this->uri->segment(5,null)); 
		if(!$this->role->isRoleVerified($role_id)){ // if not Available Location
			set_flash_message(ROLE_VERIFICATION_FAILED,'error');
			redirect("admincms/roles/");
		}
		
		if($role_status==1){
		$data=array('is_default'=>FALSE);						
		$this->general->updateData(TBL_MST_ROLES,array('is_default'=>TRUE),$data);		
		$data=array('is_default'=>TRUE);
		$this->general->updateData(TBL_MST_ROLES,array('id'=>$role_id),$data);		
		redirect("admincms/roles/");
		}else{
			set_flash_message(OPS_THE_STAUS_FIELD_IS_INACTIVE,'error');
			redirect("admincms/roles/");
			}
	}

	/**
	* Method Name : setStatus
	* Parameter: NULL
	* Task : Loading for updating the role and set status
	*/
	
	function setStatus(){
		$role_id=decodeId($this->uri->segment(4,null));
		$role_status=decodeId($this->uri->segment(5,null));
	    $role_default=$this->uri->segment(6,null);
		if(!$this->role->isRoleVerified($role_id)){ // if not Available Location
			set_flash_message(ROLE_VERIFICATION_FAILED,'error');
			redirect("admincms/roles/");
		}
		if($role_default==FALSE){
		$data=array('is_active'=>$role_status);						
		$this->general->updateData(TBL_MST_ROLES,array('id'=>$role_id),$data);		
		redirect("admincms/roles/");
		}
		else{
			set_flash_message(OPS_THE_DEFAULT_FIELD_IS_ACTIVE,'error');
			redirect("admincms/roles/");
			
			}
	}
	
	/**
	* Method Name : Edit 
	* Parameter: Session User Id
	* Task : Loading for View Editing Roles  at Edit
	*/
	
	function edit(){
		$role_id=decodeId($this->uri->segment(4,null));
		if($role_id==null){									// if Id is empty
			set_flash_message(ROLE_ID_EMPTY,'error');
			redirect("admincms/roles/");		
		}
		if(!$this->role->isRoleVerified($role_id)){ // if not Available Location
			set_flash_message(ROLE_VERIFICATION_FAILED,'error');
			redirect("admincms/roles/");
		}
		$data['role']=$this->role->getRole($role_id);
		$this->load->view("admincms/role/edit",$data);
	}//edit end

	/**
	* Method Name : Update 
	* Parameter: Session User Id
	* Task : Loading for Updating Roles 
	*/

	function update(){
		$user_id= $this->session->userdata('user_id');
		$role_id=decodeId($this->input->post("role_id"));
		$role=$this->input->post("title");
		$this->form_validation->set_rules('title', 'Role ', 'required|trim|xss_clean');
		
		$is_default=$this->input->post("is_default");
		$is_default=($is_default ==TRUE)?TRUE:FALSE;		

		$is_active=$this->input->post("is_active");
		$is_active=($is_active ==TRUE)?TRUE:FALSE;	
		if($is_active==FALSE && $is_default==TRUE){
			set_flash_message(OPS_THE_DEFAULT_FIELD_IS_ACTIVE,'error');
			redirect("admincms/roles/");
			
			}
		
		if ($this->form_validation->run() == FALSE){		
				$data['role']=$this->role->getRole($role_id);
				$this->load->view("admincms/role/edit",$data);
		}elseif($this->role->validate_role($role,$role_id)){
				set_flash_message(ROLE_EXIST,'error');
				$data['role']=$this->role->getRole($role_id);
				$this->load->view("admincms/role/edit",$data);
		}else{
				$data=array('title'=>$role,
							'is_default'=>$is_default,
							'is_active'=>$is_active);
				$cond=array('id'=>$role_id);
				$this->general->updateData(TBL_MST_ROLES,$cond,$data);
				
				// code for the default role
				if($is_default==TRUE){
					$data=array('is_default'=>FALSE);						
					$this->general->updateData(TBL_MST_ROLES,array('is_default'=>TRUE),$data);
					$data=array('is_default'=>TRUE);
					$this->general->updateData(TBL_MST_ROLES,$cond,$data);
				}	
				
				set_flash_message(RECORD_SUCCESSFULLY_UPDATED);
				redirect("admincms/roles/");	
		}//else end 
	}//update end
	
	/**
	* Method Name : Delete 
	* Parameter: Session User Id
	* Task : Loading for Deleting Roles
	*/

	function delete(){
		$role_id=decodeId($this->uri->segment(4,null));
		$isRoleHasChild=$this->state->getStateByStatus(null,$role_id);
		$count=count($isRoleHasChild);
		if($count>0){
			set_flash_message(CHILD_AVAILABLE_CANNOT_DELETE,'error');
			redirect("admincms/roles/");	
		}else{
			if($role_id==null){									// if Id is empty
				set_flash_message(ROLE_ID_EMPTY,'error');
				redirect("admincms/roles/");		
			}
			if(!$this->role->isRoleVerified($role_id)){	// if not Available Location
				set_flash_message(ROLE_VERIFICATION_FAILED,'error');
				redirect("admincms/roles/");
			}
			$message=$this->role->deleteRole($role_id);
			set_flash_message($message,'error');
			redirect("admincms/roles/");	
		}	
	}//delete end
	
	/**
	* Method Name : updateStatusActive
	* Parameter: NULL
	* Task : Loading for updating the roles Status as Per Selected checkboxes
	*/
	
	function updateStatusActive(){
		$roles_status=$this->input->post('role');
		$operation=$this->input->post('enable_role');
		
		
		if($operation=="disable"){
			foreach($roles_status as $role_id){
				$data=array('is_active'=>false);						
				$this->general->updateData(TBL_MST_ROLES,array('id'=>$role_id),$data);		
			}
		}
		if($operation=="enable"){
			foreach($roles_status as $role_id){
				$data1=array('is_active'=>true);						
				$this->general->updateData(TBL_MST_ROLES,array('id'=>$role_id),$data1);		
			}
		}
		redirect("admincms/roles/");
	}
	
	function is_logged_in()
		{
			
			  $is_remember = get_cookie('remember_me');
				$identity = get_cookie('identity');
				if(isset($is_remember) && $is_remember==TRUE) {
				   $this->membership_model->getUserData($identity);
				   //$this->load->view('portal/home');
				}
			
			$is_logged_in = $this->session->userdata('is_logged_in');
			if(!isset($is_logged_in) || $is_logged_in != true)
			{
				redirect("admincms/login");
			}		
		} // end function is_logged_in

}//class end
?>
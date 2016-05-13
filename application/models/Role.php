<?php
/**
 *>  Model : role_id
 *>  Task : This model design for all the role related code
 *>  Author: Ajay
*/
 
class Role extends CI_Model 
{
 	/**
	 * Class Constructor
	 */
	 function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	/**
	* Method Name : getRoles 
	* Task : Loading for Getting Role
	*/
	
	
	function getRoles($active=false){
		$this->db->select('*');
		$this->db->from(TBL_MST_ROLES);
		if($active==true){
			$this->db->where(array('is_active'=>true));
		}
		$this->db->order_by('created_datetime','asc');
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}

	/**
	* Method Name : getRole 
	*Parameter : role_id
	* Task : Loading for Getting Role according to role_id
	*/
	
	function getRole($role_id=null){
		if($role_id==null) return array();
		$this->db->select('*');
		$this->db->where(array('id'=>$role_id));
		$this->db->order_by('created_datetime','asc');
		$recordSet = $this->db->get(TBL_MST_ROLES);
		$data=$recordSet->result() ;
 		return $data;
	}

	/**
	* Method Name : isRoleVerified 
	*Parameter : role_id
	* Task : Loading for verify the master Role table
	*/
		
	function isRoleVerified($role_id=null){
		if($role_id==null) return array();
		$this->db->select('*');
		$this->db->where(array('id'=>$role_id));
		$recordSet = $this->db->get(TBL_MST_ROLES);
		$data=$recordSet->result() ;
		if(count($data)>0){
 			return true;
		}else{
			return false;
		}
	}

	/**
	* Method Name : validate_role
	*Parameter : role
	* Task : Loading for validate the role from the table
	*/
	
	function validate_role($role=null,$role_id=null){
		if($role==null) return array();
		$this->db->select('*');
		$this->db->where(array('title'=>$role));
		if(isset($role_id)){
			$array = array('id !=' => $role_id);
			$this->db->where($array);     
			}
		$recordSet = $this->db->get(TBL_MST_ROLES);
		$data=$recordSet->result() ;
		if(count($data)>0){
 			return true;
		}else{
			return false;
		}
	}

	/**
	* Method Name : deleteRole
	*Parameter : role_id
	* Task : Loading for deleting the Role from the table
	*/

	function deleteRole($role_id=null){
		if($role_id==null) return false;	 
		$cond=array("id"=>$role_id);
		$db_response=$this->general->deleteData(TBL_MST_ROLES,$cond,HARD_DELETE);	
		if($db_response==FORIEN_KEY_CONSTRAINT_ERROR_LINUX){
			return ROLE_CANNOT_DELETE_HAS_DATA ;
		}else if($db_response==0){
			return RECORD_SUCCESSFULLY_DELETED;
		}else{
			return $this->db->_error_message();
		}				
	}	
	
	
	 
}// Class
?>

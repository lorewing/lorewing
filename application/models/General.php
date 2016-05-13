<?php
/**
 *  This Model design all the Genral Functions
 *> Author: Ahmed Elsherbiny
 *> Date:  

/**
* Class General 
*/
 
class General extends CI_Model 
{
 	/**
	 * Class ConstructorgetCitiesOfState
	 */
	 function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

	

	/**
	* Method Name : getCountryIdFromState 
	* parameters : state_id,return_field
	* Task : Loading for getting the country id according to state id
	*/

	function getCountryIdFromState($state_id=null,$return_field="hajj_mst_countries_id"){
		$this->db->select('*');
		$this->db->where(array('status'=>true));
		if($state_id!=null){
			$this->db->where(array('id'=>$state_id));
		}
		$recordSet = $this->db->get(TBL_HAJJ_MST_STATE);
		$data=$recordSet->result() ;
		if(count($data)>0){
			return $data[0]->$return_field;
		}else{
			return "";
		}

	}
	/**
	* Method Name : getCountry 
	* parameters : is_name,counry_id
	* Task : Loading for getting the country data according to id
	*/
	
	function getCity($state_id=null){
		if($state_id==null)return false;
		$this->db->select('id');
		$this->db->where(array('mst_states_id'=>$state_id));
		$this->db->where(array(TBL_MST_CITIES.'.added_by'=>ADMIN_NAME));
		$recordSet = $this->db->get(TBL_MST_CITIES);
		$data=$recordSet->result() ;
		return $data;
	}
	/**
	* Method Name : getCountry 
	* parameters : is_name,counry_id
	* Task : Loading for getting the country data according to id
	*/
	
	function getCountry($is_name=false,$counry_id=null){
		$this->db->select('*');
		//$this->db->where(array('status'=>1));
		if($is_name==true and $counry_id!=null){
			$this->db->where(array('id'=>$counry_id,'status'=>1));
		}
		$recordSet = $this->db->get(TBL_HAJJ_MST_COUNTRY);
		$data=$recordSet->result() ;
		if($is_name==true){
			return $data[0]->country_name;
		}else{
			return $data;
		}
	}

	/**
	* Method Name : dataVerification 
	* parameters : fieldName,value,tableName
	* Task : Loading for verify the data from the tables
	*/
		
	function dataVerification($fieldName=null,$value=null,$tableName){
		if($fieldName=="") return false;
		if($value=="") return false;
		
		$this->db->select('*');
		$this->db->where(array("$fieldName"=>$value));
		$this->db->where(array('is_active'=>true));
		$recordSet = $this->db->get($tableName);
		$data=$recordSet->result() ;
		if(count($data)>0){
 			return true;
		}else{
			return false;
		}
		
	}



	/**
	* Method Name : getCountires 
	* Task : Loading for getting all states from the database tables
	*/
	
	function getStates(){
		$this->db->select('*');
		$this->db->from(TBL_MST_STATE);
		$this->db->where(array('status'=>1));
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		return $data;
	}

	/**
	* Method Name : setTimeStamp 
	* Task : Loading for setting the time stamps
	*/
		
	function setTimeStamp($stampInformation){
		if(count($stampInformation)>0){
			$this->addData(TBL_STAMP,$stampInformation);
			return true;
		}else{
			return false;
		}
	}

	
	/**
	* Method Name : getStatesOfCntryAgent 
	* parameters : country_id
	* Task : Loading for getting the states of country accoeding to country id
	*/
	 
	function getStatesOfCntryAgent($country_id,$agent_id=null){		
		$this->db->select('id,title');
		$this->db->where(array('mst_countries_id'=>$country_id));
		$this->db->order_by('title','asc');
		$recordSet = $this->db->get(TBL_MST_STATES);
		$states=$recordSet->result();
		
		if($agent_id!=''){
			$this->db->select('mst_states_id');
			$this->db->where(array('id'=>$agent_id));
			$recordSet = $this->db->get(TBL_AGENTS);
			$data=$recordSet->result();
			$state_agent=$data[0]->mst_states_id;
			foreach($states as $row){
				if($state_agent==$row->id){
					echo $xmlinner="<option value='$row->id' selected='selected'>$row->title</option>";
				}
			}
		}
		echo $xmlinner="<option value=''>Please Select State</option>";
		foreach($states as $row){
			echo $xmlinner="<option value='$row->id'>$row->title</option>";
		}

		
	}
	
	/**
	* Method Name : getOptions 
	* parameters : question_id
	* Task : Loading for getting the Options of questions accoeding to question_id
	*/
	 
	function getOptions($question_id=null,$selected_option=null){		
		$this->db->select('id,title');
		$this->db->where(array('mst_quotation_questions_id'=>$question_id));
		$this->db->where('parent_option','');
		$this->db->order_by('title','asc');
		$recordSet = $this->db->get(TBL_QUOTATION_QUESTIONS_OPTIONS);
		$options=$recordSet->result();
	
		echo $xmlinner="<option value=''>Please Select Parent Option</option>";
		foreach($options as $row){
				$selected=($selected_option==$row->id)?"selected='selected'":'';
			echo $xmlinner="<option value='$row->id' $selected>$row->title</option>";
		}
		
		
	}

	/**
	* Method Name : getSessionCodeByCode 
	* parameters : session_code,status
	* Task : Loading for getting the session detail according to sessioncode and status
	*/
	 function getSessionCodeByCode($session_code,$status=null){
	 	$this->db->select('mst_countries_id,mst_states_id,event_mst_cities_id,mst_venues_id,date,id');
		if($status==true){
			$this->db->where(array('session_code'=>$session_code));
		}else{
			//$this->db->where(array('session_type'=>SESSION_TYPE_GENERAL));
			$this->db->where(array('session_code'=>$session_code,'session_type'=>SESSION_TYPE_GENERAL));
		}
		$this->db->where(array('is_active'=>true));
		//echo $this->db->_compile_select();die;
		$recordSet = $this->db->get(TBL_MST_SESSION);
		$session=$recordSet->result();
		if(!empty($session)){
			return $session[0];
		}else{
			return false;
		}
	 }
	

/**
	* Method Name : getCitiesOfState 
	* parameters : state_id
	* Task : Loading for getting the cities of state accoeding to state_id
	*/
	 
	function getCitiesOfState($state_id,$post_back_city_id=null){		
		$this->db->select('id,title');
		$this->db->where(array('mst_states_id'=>$state_id,'is_active'=>true));
		$this->db->where(array(TBL_MST_CITIES.'.added_by'=>ADMIN_NAME));
		$this->db->order_by('title','asc');
		$recordSet = $this->db->get(TBL_MST_CITIES);
		$cities=$recordSet->result();

		echo $xmlinner="<option value=''>Please Select City</option>";
		foreach($cities as $row){
			if($row->id==$post_back_city_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->id' $selected>$row->title</option>";
		}

		
	}
	
	
	
	/**
	* Method Name : getCitiesOfState 
	* parameters : state_id
	* Task : Loading for getting the cities of state accoeding to state_id
	*/
	 
	function getVenueOfCity($city_id,$post_back_venue_id=null){		
		$this->db->select('id,venue_name');
		$this->db->where(array('event_mst_cities_id'=>$city_id,'is_active'=>true));
		$this->db->order_by('venue_name','asc');
		$recordSet = $this->db->get(TBL_MST_VENUES);
		$venues=$recordSet->result();
		echo $xmlinner="<option value=''>Please Select Venue</option>";
		foreach($venues as $row){
			if($row->id==$post_back_venue_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->id' $selected>$row->venue_name</option>";
		}
	}
	
	/**
	* Method Name : getTrainingDateOfVenue 
	* parameters : venue_id
	* Task : Loading for getting the cities of state accoeding to state_id
	*/
	 
	function getTrainingDateOfVenue($venue_id,$post_back_date_id=null,$param=array()){		
		$this->db->select('id,date,mst_venues_id');
		$this->db->from(TBL_MST_SESSION);
		$sql = '(session_type = "'.SESSION_TYPE_GENERAL.'" and mst_venues_id = "'.$venue_id.'" and is_active ="'.true.'" and is_session_full !="'.true.'")';		
		if(!empty($param) && $param!=null){
			$this->db->where_in('id',$param); 			
			$this->db->or_where($sql); 
		}else{
			$this->db->where($sql);
		}
		$this->db->group_by('date');
		$this->db->order_by('date','asc');
		//echo $this->db->_compile_select();
		//echo $post_back_date_id;die;
		$recordSet = $this->db->get();
		$date=$recordSet->result();
		echo $xmlinner="<option value=''>Select Training Date</option>";
		foreach($date as $row){
			if($row->date==$post_back_date_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->date' $selected>".date('l, M d, Y ',strtotime($row->date))."</option>";
		}
	}
	
	
		/**
	* Method Name : getAllTrainingDateXML 
	* parameters : venue_id
	* Task : Loading for getting the date of venue accoeding to venue_id
	*/
	 
	function getAllTrainingDateOfVenue($venue_id,$post_back_date_id=null,$param=array()){		
		$this->db->select('id,date,mst_venues_id');
		$this->db->from(TBL_MST_SESSION);
		$sql = '(mst_venues_id = "'.$venue_id.'" and is_active ="'.true.'")';
		$this->db->where($sql);
		$this->db->group_by('date');
		$this->db->order_by('date','asc');
		//echo $this->db->_compile_select();
		//echo $post_back_date_id;die;
		$recordSet = $this->db->get();
		$date=$recordSet->result();
		echo $xmlinner="<option value=''>Select Training Date</option>";
		foreach($date as $row){
			if($row->date==$post_back_date_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->date' $selected>".date('l, M d, Y ',strtotime($row->date))."</option>";
		}
	}
	
	
	/**
	* Method Name : getTrainingDateOfVenue 
	* parameters : venue_id
	* Task : Loading for getting the cities of state accoeding to state_id
	*/
	 
	function getSessionTimeOfDate($date,$post_back_time_id=null,$param=array(),$venue_id=null){		
		$this->db->select('id,event_time_from,event_time_to');
		$this->db->from(TBL_MST_SESSION);
		$sql = '(session_type = "'.SESSION_TYPE_GENERAL.'" and mst_venues_id = "'.$venue_id.'" and is_active ="'.true.'"  and is_session_full !="'.true.'" and date="'.$date.'")';	
		if(!empty($param) && $param!=null){
			$this->db->where_in('id',$param);  			
			$this->db->or_where($sql); 
		}else{
			$this->db->or_where($sql); 
		}
		
		$this->db->order_by('event_time_from','asc');
		//echo	$this->db->_compile_select();die;
		$recordSet = $this->db->get();
		$time=$recordSet->result();
		echo $xmlinner="<option value=''>Select Training Session</option>";
		foreach($time as $row){
			if($row->id==$post_back_time_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->id' $selected>$row->event_time_from - $row->event_time_to</option>";
		}
	}
	
		/**
	* Method Name : getTrainingDateOfVenue 
	* parameters : venue_id
	* Task : Loading for getting the cities of state accoeding to state_id
	*/
	 
	function getAllSessionTimeOfDate($date,$post_back_time_id=null,$venue_id=null){		
		$this->db->select('id,event_time_from,event_time_to');
		$this->db->from(TBL_MST_SESSION);
		$sql = '(mst_venues_id = "'.$venue_id.'" and is_active ="'.true.'"  and date="'.$date.'")';	
		$this->db->or_where($sql); 		
		$this->db->order_by('event_time_from','asc');
		//echo	$this->db->_compile_select();die;
		$recordSet = $this->db->get();
		$time=$recordSet->result();
		echo $xmlinner="<option value=''>Select Training Session</option>";
		foreach($time as $row){
			if($row->id==$post_back_time_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->id' $selected>$row->event_time_from - $row->event_time_to</option>";
		}
	}
	
	
	function getTotalMemberBySessionId($session_id){
		if($session_id==''){return false;}
		$this->db->select('id');
		$this->db->where(array('session_id'=>$session_id,'is_cancel'=>true));
		$recordSet = $this->db->get(TBL_EVENT_REGISTRATION);
		$data=$recordSet->result() ;
		return count($data);
	}
	

	/**
	* Method Name : getDefaultCountry 
	* Task : Loading for getting the default country for dropdown
	*/
		
	function getDefaultCountry($field){
		if($field==''){return false;}
		$this->db->select('*');
		$this->db->where(array('is_default'=>true));
		$recordSet = $this->db->get(TBL_MST_COUNTRIES);
		$data=$recordSet->result() ;
		return $data[0]->$field;
	}

	/**
	* Method Name : getDefaultState 
	* Task : Loading for getting the default state for dropdown
	*/
		
	function getDefaultState(){
		$this->db->select('*');
		$this->db->where(array('is_default'=>true));
		$recordSet = $this->db->get(TBL_MST_STATES);
		$data=$recordSet->result() ;
		return $data[0]->id;
	}

	/**
	* Method Name : getLastUpdatedStamp 
	* Task : Loading for getting the last updated stamps 
	*/
		
	function getLastUpdatedStamp($table_name,$primaryKey,$mode=STAMP_MODE_CREATED){
		$this->load->model('account');
		$this->db->select('user_id,DATE_FORMAT(stampdate,"%b %d,%Y, %h:%i:%s %p") as stampdate',false);
		$this->db->where(array('stamprecordid'=>$primaryKey,'stamprecordtype'=>$table_name,'stamp_mode'=>$mode));
		$this->db->limit(1);
		$this->db->order_by("id", "desc"); 
		$recordSet = $this->db->get(TBL_STAMP);
		$data=$recordSet->result() ;
			//print_r($data);
			//die(); 
		
		if(count($data)>0){		
			$creator=$this->account->getData($data[0]->user_id,'name');
							
			$dayTimeStamp=$data[0]->stampdate;
			$info=array('stamps'=>$creator.' on '.$dayTimeStamp);
		}else{
			$info=array('stamps'=>'');
		}
		return $info;
			
	}
	function get_lastupdated($table_name,$primaryKey){
		$this->load->model('account');
		$this->db->select('created_by,created_date,last_modify_by,last_modify_date');
		$this->db->where(array('id'=>$primaryKey));
		$recordSet = $this->db->get($table_name);
		$data=$recordSet->result() ;
		$creator=$this->account->getData($data[0]->created_by,'name');
		$created_daytime=date('M d, Y, h:m:s A', strtotime($data[0]->created_date));
		$modifyer=$this->account->getData($data[0]->last_modify_by,'name');
		$modify_daytime=date('M d, Y, h:m:s A', strtotime($data[0]->last_modify_date));
		$info=array('created_by'=>$creator.' on '.$created_daytime,'modify_by'=>$modifyer.' on '.$modify_daytime);
		return $info;
			
	}
	//assumed Libarary pagination already load into autoload.
	function pagination($param){
	
		$config['base_url'] = base_url().$param['base_url'];
		$config['total_rows'] =$param['recordCountQuery'];
		if(array_key_exists('record_per_page',$param)){
			$config['per_page'] = $param['record_per_page'];
		}else{
			$config['per_page'] = RECORDS_PER_PAGE;
		}
		$config['full_tag_open'] = ' <div class="pagination"> <ul>';
 
		$config['full_tag_close'] = ' </ul></div>';
		
		$config['num_links'] =RECORDS_NUM_LINKS;
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		
		
		$config['prev_tag_open'] = '<li class="prev disabled">';
		$config['prev_tag_close'] = '</li>';
		
		$config['prev_link'] = '&larr; Previous ' ;
		
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next &rarr;';
//		$config['page_query_string'] = TRUE;

		$config['uri_segment'] =$param['pagination_uri_segment'];
		$this->pagination->initialize($config);
	    $start=$this->uri->segment($param['pagination_uri_segment'],0);
	    $offset=$config['per_page'];
 		$pagination_param=array('start'=>$start,'offset'=>$offset);
 		return $pagination_param;
		
	}
	
	
	/**
	* This will convert date
	*/	 
	function convertDate($date,$symbol='-',$format){

//define the months

			$months = array( '01' => 'Jan' , '02' => 'Feb' , '03' => 'Mar' , '04' => 'Apr' , '05' => 'May' , '06' => 'Jun' , '07' => 'Jul' , '08' => 'Aug' , '09' => 'Sep' , '10' => 'Oct' , '11' => 'Nov' , '12' => 'Dec' );
	 
		if(trim($date)=="") return "";
		if($symbol=='/'){
			$arrydate=explode("/",$date);
		}else if($symbol=='-'){
			$arrydate=explode("-",$date);
		}
		
		//MDY
		if($format==DATE_YMD){	//that means segments contain year /month/date,here we getting format in MDY now convert in YMD

			$m=$arrydate[0];
			$d=$arrydate[1];
			$y=$arrydate[2]; //getting year/month/day

			foreach( $months as $key => $value ){
					if ( $value == $m ){
					$m = $key;
					break;
					}
			}
			$date=date("Y-m-d",mktime(0, 0, 0,$m,$d,$y));
		}else if($format==DATE_MDY){		//here we getting format in YMD now convert in MDY
		
			$y=$arrydate[0];$m=$arrydate[1];$d=$arrydate[2]; //getting year/month/day
			foreach( $months as $key => $value ){
					if ( $key == $m ){
					$m = $value;
					
					break;
					}
			}
			$date=$m."-".$d."-".$y;
			//$date=date("m-d-Y",mktime(0, 0, 0,$m,$d,$y));
		}
		return $date;
	}
	/* This will insert the the @data into @tabla
	 * @data 
	 * @tableName
	 */	 
	function addData($tableName=NULL,$data=NULL){
		if((isset($tableName) && isset($data))){
			$this->db->insert($tableName,$data); 	
			$id=$this->db->insert_id();
			return $id;
		}
	}
	
	
	/* This will insert the the @data into @table for multiple array's insertion
	 * @data 
	 * @tableName
	 */	 
	function addMultipleData($table_name=NULL,$data=NULL){
		if((isset($tableName) && isset($data))){
			$this->db->insert_batch($tableName,$data); 	
		}
	}
	
 	/**
	* This will use for custom sql query,mostly that will use for Select Command but we can use insert					    
	* and update also it just take valid @query string of sql
	*/	
	function findByQuery($query){
			if (isset($query)&& trim($query)!=''){		//@argument Contains value Or Not
				$this->db->trans_start(); 	//start database transction
				$object = $this->db->query($query);
				$this->db->trans_complete(); //complete database transction	
		
			if ($this->db->trans_status() === FALSE){ //it returns false if transction falied
				$this->db->trans_rollback();			//Rollback to previous state
			}else{
				$this->db->trans_commit();			//either  Commit data
			}
		}
			return $object->result();
	}
	/**
	 * This will return interger like 25,50,etc ,number of rows in table 
	 * @tableName is required
	 */	 
	function countRows($tableName,$conditions="",$fields="*"){
		if(isset($tableName)&& trim($tableName)!=''){		//table Contains  value Or Not
			if(isset($conditions)){
				$this->db->where($conditions);	
			}
			$query="SELECT ".$fields ." FROM ". $tableName ." WHERE ".$conditions;
			$result = mysql_query($query);
			return(mysql_num_rows($result));
		}
	}
	/**
	 * This will return interger like 25,50,etc ,number of rows in table by passing query
	 * @queryis required
	 */	 
	function countRowsByQuery($query){
		if(isset($query) && trim($query)!=''){		//table Contains  value Or Not
			$result = mysql_query($query);
			return(mysql_num_rows($result));
		}
	}
	
	/**
	 * This will update the table ,accourding to @condtions ,,
	 * @tableName ,$condition,$data are required
	 * @conditions are Array
	 */	 
	function updateData($tableName,$condition=NULL,$data){
		if(!isset($condition) && count($condition)>0){
			return FALSE;
		}else{
			if(isset($tableName) && trim($tableName)!='' && isset($data) && count($data)>0){
				$this->db->trans_start(); 	//start database transction
					$this->db->where($condition); //this condition only work for AND like name=this and age=this and....so on.. but if you pass string that works custom condtion or pass array works for AND.
					$this->db->update($tableName,$data); 	
				$this->db->trans_complete(); //complete database transction	
			
				if ($this->db->trans_status() === FALSE){ //it returns false if transction falied
					$this->db->trans_rollback();			//Rollback to previous state
				}else{
					$this->db->trans_commit();			//either  Commit data
				}
				return $this->db->error();
			}
		}
	}
	/**
	 * This will update the Multiple recored from the table 
	 * @tableName @condtions Are required
	 */
	 function updateMultipleData($tableName,$ids,$fieldName,$val,$condfld){		
		if(!isset($ids)){
			return FALSE;
		}else{
			if(isset($tableName) && trim($tableName)!=''&& trim($fieldName)!='' && trim($condfld)!='' && trim($ids)!=''){
				$this->db->trans_start(); //start database transction
					$query="UPDATE ".$tableName." SET $fieldName=".trim($val)." WHERE ". trim($condfld)." IN(".trim($ids).")";
					mysql_query($query); 
				$this->db->trans_complete(); //complete database transction	
			
				if ($this->db->trans_status() === FALSE){ //it returns false if transction falied
					$this->db->trans_rollback();			//Rollback to previous state
				}else{
					$this->db->trans_commit();			//either Commit data
				}
			}
	 	}
	 }
	/**
	 * This will delete the recored from the table 
	 * we use @flage which show data to deleted either soft or hard
	 * @tableName @condtions Are required
	 */
	 function deleteData($tableName,$condition="",$flag=SOFT_DELETE){
		 if(!isset($condition)){
			return FALSE;
		}else{
			if(isset($tableName) && trim($tableName)!=''){
				//$this->db->trans_start(); //start database transction
				$this->db->where($condition); //this condition only work for AND like name=this and age=this and....so on.. but if you pass string that works custom condtion or pass array works for AND.

				if($flag==SOFT_DELETE){
					$this->db->update($tableName,array(IS_DELETED=>TRUE));
				}
				if($flag==HARD_DELETE){
					$this->db->delete($tableName);
					log_message('error', "DB Error: (".$this->db->error().") ".$this->db->_error_message());
				 return $this->db->error();						 	
				}
				//$this->db->trans_complete(); //complete database transction	
			
				//if ($this->db->trans_status() === FALSE){ //it returns false if transction falied
					
				//	$this->db->trans_rollback();			//Rollback to previous state
					//return FALSE;
				//}else{
				//	$this->db->trans_commit();			//either  Commit data
				//	return true;
				//}
			}
	 	}
	 }
	/**
	 * This will delete the Multiple recored from the table 
	 * we use @flage which show data to deleted either soft or hard
	 * @tableName @condtions Are required
	 */
	 function deleteMultipleData($tableName,$ids,$fieldName,$flag=SOFT_DELETE){		
		if(!isset($ids) || $ids==''){
			return FALSE;
		}else{
			if(isset($tableName)&& trim($tableName)!='' && $fieldName!=''){
				if($flag==SOFT_DELETE){
	 			 $query="UPDATE ".$tableName." SET ".COND_IS_DELETED_TRUE ." WHERE ". $fieldName ." IN(".$ids.")";
				}
				if($flag==HARD_DELETE){
					$query="DELETE FROM ".$tableName." WHERE ".$fieldName." IN(".$ids.")";
				}
				return mysql_query($query); 
			}
	 	}
	 }	

	/**
	* Method Name : getSetting Values
	* parameter : Setting Params
	* Task : Return the Setting Variable value 
	*/
		
	 
	function getSettingValue($field_name=null){
		if($field_name==null) return array();
		$this->db->select("*");
		$this->db->where(array('is_active'=>true));
		$recordSet = $this->db->get(TBL_MST_SETTINGS);
		$data=$recordSet->result() ;
  		if(count($data)>0){
			return $data[0]->$field_name;
		}else{
			return false;
		}
	}
	
    /**
	* Method Name : getPageCategories
	* Parameter :NULL
	* Task : Loading for Getting Page categories
	*/
	
	function getPageCategories(){
		$this->db->select('*');
		$this->db->where(array('is_active'=>true));
		$this->db->order_by("order", "asc"); 
		$recordSet = $this->db->get(TBL_PAGE_CATEGORIES);
		$data=$recordSet->result() ;
 		return $data;
	}

	
    /**
	* Method Name : getPages
	* Parameter :page_category_id
	* Task : Loading for Getting Pages according to page category id
	*/
	
	function getPages($page_category_id=null){
		if($page_category_id==null) return array();		
		$this->db->select('*');
		$this->db->where(array('page_categories_id'=>$page_category_id));
		$recordSet = $this->db->get(TBL_PAGE_CATEGORY_HAS_PAGES);
		$data=$recordSet->result() ;
 		return $data;
	}
	
	/**
	* Method Name : getCategories
	* Parameter :NULL
	* Task : Loading for Getting  categories
	*/
	
	function getCategories(){
		$this->db->select('*');
		$this->db->where(array('is_active'=>true));
		//$this->db->order_by("id", "asc"); 
		$this->db->order_by("order", "asc"); 
		$recordSet = $this->db->get(TBL_MST_CATEGORIES);
		$data=$recordSet->result() ;
 		return $data;
	}

	/**
	* Method Name : getTags
	* Parameter :NULL
	* Task : Loading for Getting  tags
	*/
	
	function getTags(){
		$this->db->select('*');
		$this->db->where(array('is_active'=>true));
		$recordSet = $this->db->get(TBL_MST_TAGS);
		$data=$recordSet->result() ;
 		return $data;
	}
	
	/**
	* Method Name : getFieldValueById 
	*Parameter : $table and $condition and $return_field
	* Task : Loading for getting the field value from the database table according to user_id
	*/
	
	function getFieldValueById($table_name=NULL,$condition=NULL,$return_field="id"){
		if(!isset($condition)){
			return false;
		}
		$this->db->select('*');
		$this->db->where($condition);
		$recordSet = $this->db->get($table_name);
		$data=$recordSet->result() ;
		
		if(count($data)>0){
			return $data[0]->$return_field;
		}else{
			return false;
		}
	}	

	/**
	* Method Name : getUserDetail 
	*Parameter : user_id
	* Task : Loading for Getting User Detail according to user_id
	*/
	
	function getUserDetail($user_id=null){
		if($user_id==null) return array();
		$this->db->select(TBL_USERS.'.id,'.TBL_USERS.'.email,'.TBL_USERS.'.parent_report_id as parent_id,'.TBL_USER_INFORMATION.'.sales_rip as parent_report_id,'.TBL_USERS.'.password,'.TBL_USERS.'.job_title,'.TBL_USERS.'.role,'.TBL_USER_INFORMATION.'.*,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_CITIES.'.title as city');
		$this->db->from(TBL_USERS);
		$this->db->where(array(TBL_USERS.'.id'=>$user_id));
		$this->db->join(TBL_USER_INFORMATION,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_USER_INFORMATION.".mst_countries_id",'left');
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_USER_INFORMATION.".mst_states_id",'left');
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_USER_INFORMATION.".mst_cities_id",'left');
		//echo $this->db->_compile_select();die;
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}
	
	
	
	/**
	* Method Name : getUserDetailForSessionAttend 
	*Parameter : user_id
	* Task : Loading for Getting User Detail according to user_id
	*/
	
	function getUserDetailForSessionAttend($user_id=null,$is_cancel=false){
		if($user_id==null) return array();
		$this->db->select(TBL_USERS.'.id,'.TBL_USERS.'.email,'.TBL_USER_INFORMATION.'.sales_rip as parent_report_id,'.TBL_USERS.'.password,'.TBL_USERS.'.job_title,'.TBL_USERS.'.role,'.TBL_USER_INFORMATION.'.*,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_CITIES.'.title as city,'.TBL_EVENT_REGISTRATION.'.session_id,'.TBL_EVENT_REGISTRATION.'.is_cancel,'.TBL_EVENT_REGISTRATION.'.is_attend');
		$this->db->from(TBL_USERS);
		$this->db->where(array(TBL_USERS.'.id'=>$user_id));
		$this->db->join(TBL_USER_INFORMATION,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->join(TBL_EVENT_REGISTRATION, TBL_EVENT_REGISTRATION.'.tbl_users_id='.TBL_USERS.".id",'left');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_USER_INFORMATION.".mst_countries_id",'left');
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_USER_INFORMATION.".mst_states_id",'left');
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_USER_INFORMATION.".mst_cities_id",'left');
		if($is_cancel==false){
			$this->db->where(array(TBL_EVENT_REGISTRATION.'.is_cancel'=>false));
		}
		$this->db->order_by(TBL_EVENT_REGISTRATION.'.is_cancel asc');
		//echo $this->db->_compile_select();die;
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}	
	

	/**
	* Method Name : getUserPhotoAlbumDetail 
	*Parameter : user_id
	* Task : Loading for Getting User Photo Albums  according to user_id
	*/
	
	function getUserPhotoAlbums($user_id=null,$profile_picture_album=false){
		if($user_id==null) return array();
		$this->db->select('*');
		$this->db->where(array('user_id'=>$user_id));
		if($profile_picture_album==true)
		{
			$this->db->where(array('title'=>PROFILE_PICTURES));		
		}
		$recordSet = $this->db->get(TBL_PHOTO_ALBUMS);
		$data=$recordSet->result() ;
 		return $data;
	}	

	/**
	* Method Name : getUserAlbumPhotos 
	*Parameter : album_id
	* Task : Loading for Getting User  Albums Photo  according to album_id
	*/
	
	function getUserAlbumPhotos($album_id=null,$profile_picture=false){
		if($album_id==null) return array();
		$this->db->select('*');
		$this->db->where(array('photo_albums_id'=>$album_id));
		if($profile_picture==true)
		{
			$this->db->where(array('is_profile_picture'=>true));		
		}		
		$recordSet = $this->db->get(TBL_ALBUM_HAS_PHOTOS);
		$data=$recordSet->result() ;
 		return $data;
	}

	/**
	* Method Name : getPhotoDetail 
	*Parameter : photo_id
	* Task : Loading for Getting User  Albums Photo  according to photo_id
	*/
	
	function getPhotoDetail($photo_id=null){
		if($photo_id==null) return array();
		$this->db->select('*');
		$this->db->where(array('id'=>$photo_id));
		$recordSet = $this->db->get(TBL_ALBUM_HAS_PHOTOS);
		$data=$recordSet->result() ;
 		return $data;
	}
			
	/**
	* Method Name : getEvents
	* Parameter :NULL
	* Task : Loading for Getting  events
	*/
	
	function getEvents(){
		$this->db->select('*');
		$this->db->where(array('is_closed'=>false));
		$recordSet = $this->db->get(TBL_EVENTS);
		$events=$recordSet->result() ;		
		//return json_encode($events);
		if (stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
				header("Content-type: application/xhtml+xml"); } 
		else{
				header("Content-type: text/xml");
		}
		$xml="<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
		$xmlinner="";
		$xmlinner="<newslist title=\"Event Calendar:\">";
		foreach($events as $row){
			$xmlinner=$xmlinner."<news url=\"javascript:void(0)\" date='".dateformat($row->event_date)."' time='".$row->event_time."'>";
			$xmlinner=$xmlinner."<headline><![CDATA[".$row->title."]]></headline>";
			$xmlinner=$xmlinner."<detail><![CDATA[".$row->venue."]]></detail>";
			$xmlinner=$xmlinner."</news>";			
		}
		$xmlinner=$xmlinner."</newslist>";
		return $xml.$xmlinner;
	}	

	/**
	* Method Name : isIdVerified 
	*Parameter : $table and $id
	* Task : Loading for verify the id from the table
	*/
		
	function isIdVerified($table_name=NULL,$id=NULL){
		if($id==null && $table_name==null) return array();
		$this->db->select('*');
		$this->db->where(array('id'=>$id));
		$recordSet = $this->db->get($table_name);
		$data=$recordSet->result() ;
		if(count($data)>0){
 			return true;
		}else{
			return false;
		}
	}	
		
	//Get Current Step of User
	// First Time User id not available so table will return first step id	
	function getCurrentStep($user_id,$role_id){
		$this->db->select('step_id');
		$this->db->where(array('user_id'=>$user_id));
		$rs_object=$this->db->get(TBL_USER_STEPS);
		$data=$rs_object->result();
		if(count($data)>0){
			return $data[0]->step_id;			
			
		}else{// no step defined yet its first time
			//So Always goto next of StartNode
			$redirect_data=$this->get_start_step($role_id);
			return $redirect_data[0]->id;
		}
	
	}
	
	function role_redirect($user_id=null,$role_id=null,$next_or_current=true){
		if($user_id==null){
			$user_id=$this->session->userdata('showamerica_user_id');
		}
		if($role_id==null){
			$role_id=$this->session->userdata('showamerica_user_role_id'); 
		}

		$current_step=$this->getCurrentStep($user_id,$role_id); // this the step where user hold registration 
	
		$this->db->select('*');	
		$this->db->where(array('master_user_role_id'=>$role_id,'id'=>$current_step));
		$rs_object=$this->db->get(TBL_USER_ROLE_STEPS);
		$data=$rs_object->result();
		if(count($data)>0){
			if($next_or_current==true)
				$next_step=$data[0]->next_step;	
			else{
				$next_step=$data[0]->id;
			}
			$redirect_data=$this->get_step_info($next_step,$role_id);
			return array('redirect'=>$redirect_data[0]->controller_method_name,'step_id'=>$redirect_data[0]->id);			
		}else{
			die('404');
			show_404();
		}
	}	

	/**
	* Method Name : getFacebookIds 
	* Parameter: NULL
	* Task : Load  All the facebook ids from the user login table which is confirmed and active user
	*/
	
	function getFacebookIds(){
		$this->db->select('facebook_id');
		$this->db->from(TBL_USER_LOGIN);
		$this->db->where(array('is_active'=>true,'is_confirmed'=>true));
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		return $data;
	}
	
	/**
	* Method Name : searchFollowerList 
	* Parameter: user_id
	* Task : Load for get the follower id which is common in showamerica and facebook and which is may be user friends
	*/
	
	function searchFollowerList($user_id=null){
		if($user_id==null) return array();
		$facebookIds=$this->general->getFacebookIds();
		$commonIds=array();
		$lines_read = 0; 	
		$user_upload_home_path=sprintf(USER_UPLOAD_HOME_PATH,$user_id);				
			
		$lines=file($user_upload_home_path.FACEBOOK_TXT); 
	
		foreach($lines as $line) {
			foreach($facebookIds as $fbId){
		  		if (strstr($line,$fbId->facebook_id)) {
			 		 $commonIds[]=$fbId->facebook_id;
		 		 }
		  	}
		  	$lines_read++;
		}  	
		return $commonIds;
	}
	
	function registration_navigations($limit=7){
		 
			$user_id=$this->session->userdata('showamerica_user_id');
			$role_id=$this->session->userdata('showamerica_user_role_id');
	 
		  $this->getCurrentStep($user_id,$role_id);
		
		
		$this->db->select('title,id');
		$this->db->from(TBL_USER_ROLE_STEPS);
		$this->db->where(array('master_user_role_id'=>$role_id));
		$this->db->limit($limit);
		$recordSet = $this->db->get();
		
		$data=$recordSet->result() ;
		return $data;
	}
	
	function getDefaultAlbum($user_id=null){
		if($user_id==null){
			$user_id=$this->session->userdata('showamerica_user_id');
		}
		$this->db->select('id');
		$this->db->from(TBL_PHOTO_ALBUMS);
		$this->db->where(array('user_id'=>$user_id,'is_systemdefine'=>true));
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		if(count($data)>0){
			return $data[0]->id;
		}
	}
	
	function albumDetail($album_id=null,$table_name){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where(array('id'=>$album_id));
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		if(count($data)>0){
			return $data;
		}
	}
	//its use in media gallary
	function CreatePhotoAlbumDirectory($album_id){
		$showamerica_user_id=$this->session->userdata('showamerica_user_id');
		$user_home_dir=sprintf(USER_UPLOAD_HOME_PATH,$showamerica_user_id);
		if(!is_dir($user_home_dir)){
				$old = umask(0); 
				if(mkdir($user_home_dir,DIR_WRITE_MODE)){		//Create the folder if not exist and give permission
					umask($old); 
				}
		}
		//its album path created with user id
		$album_path=sprintf(USER_UPLOAD_PATH_ALBUMS,$showamerica_user_id);
		if(!is_dir($album_path)){
				$old = umask(0); 
				if(mkdir($album_path,DIR_WRITE_MODE)){		//Create the folder if not exist and give permission
					umask($old); 
				}
		}
		
//		thats create album folder with user id
		$album_path=sprintf(USER_UPLOAD_PATH_ALBUMS.'/'.$album_id.'/',$showamerica_user_id);
		if(!is_dir($album_path)){
				$old = umask(0); 
				if(mkdir($album_path,DIR_WRITE_MODE)){		//Create the folder if not exist and give permission
					umask($old); 
				}
		}
		
	
		$album_thumbnail_path=$album_path.'/thumbnails/';
		if(!is_dir($album_thumbnail_path)){
				$old = umask(0); 
				if(mkdir($album_thumbnail_path,DIR_WRITE_MODE)){		//Create the folder if not exist and give permission
					umask($old); 
				}
		}
		return $options=array('upload_dir'=>$album_path,'upload_url'=>base_url().$album_path,'accept_file_types' => '/^.*\.(jpg|jpeg|png|gif)$/i',
						'image_versions'=>array(
											'thumbnail'=>array('upload_dir'=>$album_thumbnail_path,'upload_url'=>base_url().$album_thumbnail_path)) 										 
					  );
	}
	/**
	* Method : IsAdmin
	* Work : if logged in user @user_id has role Admin
	* Return : True /False
	*/	
	
	function ISADMIN(){
		$user_id=$this->session->userdata('user_id');
		$mst_roles_id=$this->session->userdata('mst_roles_id');
	    $this->db->select(TBL_MST_ROLES.'.*');
		$this->db->from(TBL_MST_ROLES);
		$this->db->where(array(TBL_MST_ROLES.'.id'=>$mst_roles_id,TBL_MST_ROLES.'.is_active'=>TRUE,TBL_MST_ROLES.'.is_admin'=>TRUE));	
        $recordSet = $this->db->get();
		$data=$recordSet->result();
		//print_r($data);die();
		if(count($data)>0){
			return true;
		}else{
			return false;		
		}
	}
	
	/**
	* Method : getAdminRoles
	* Parameter  : Null 
	* Return : For get admin roles ids 
	*/	
	
	function getAdminRoles(){
	    $this->db->select(TBL_MST_ROLES.'.id');
		$this->db->from(TBL_MST_ROLES);
		$this->db->where(array(TBL_MST_ROLES.'.is_active'=>TRUE,TBL_MST_ROLES.'.is_admin'=>TRUE));	
        $recordSet = $this->db->get();
		$data=$recordSet->result();
		if(count($data)>0){
			return $data;
		}else{
			return array();		
		}
	}
	
	
	/**
	* Method Name : getStatesOfCntry 
	* parameters : country_id
	* Task : Loading for getting the states of country accoeding to country id
	*/
	 
	function getStatesOfCntry($country_id,$customer_id=null,$post_back_state_id=null){	
		$this->db->select('id,title,is_default');
		$this->db->where(array('mst_countries_id'=>$country_id,'is_active'=>true));
		$this->db->order_by('title','asc');
		$recordSet = $this->db->get(TBL_MST_STATES);
		$states=$recordSet->result();
		
	/*	if($customer_id!=''){
			$this->db->select('mst_states_id');
			$this->db->where(array('id'=>$customer_id));
			$recordSet = $this->db->get(TBL_CUSTOMERS);
			$data=$recordSet->result();
			$state_customer=$data[0]->mst_states_id;
			foreach($states as $row){
				if($state_customer==$row->id){
					echo $xmlinner="<option value='$row->id' selected='selected'>$row->title</option>";
				}
			}
		}*/
		echo $xmlinner="<option value=''>Please Select State</option>";
		foreach($states as $row){
			if($row->id==$post_back_state_id){
				$selected='selected=selected';
			}else{
				$selected='';
			}
			echo $xmlinner="<option value='$row->id' $selected>$row->title</option>";
		}

		
	}
	
	
	/**
	* Method Name : getRoleUsers
	* Parameter : role_id 
	* Task : Loading for getting all users as per given role_id
	*/
	
	function getRoleUsers($param=array(),$sWhere=null,$sOrder=null,$length=null,$start=null,$is_active=null){
		if(empty($param)) return array();
		$this->db->select(TBL_USERS.'.email,'.TBL_USERS.'.is_active,'.TBL_USERS.'.parent_report_id,'.TBL_USERS.'.role,'.TBL_USERS.'.job_title,'.TBL_USER_INFORMATION.'.*,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_CITIES.'.title as city,'.TBL_MST_STORES.'.title as store');
		$this->db->from(TBL_USERS);
		$this->db->join(TBL_USER_INFORMATION,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_USER_INFORMATION.".mst_countries_id",'left');
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_USER_INFORMATION.".mst_states_id",'left');
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_USER_INFORMATION.".mst_cities_id",'left');
		$this->db->join(TBL_MST_STORES, TBL_MST_STORES.'.id='.TBL_USER_INFORMATION.".store_id",'left');
		//echo $this->db->_compile_select();die;
		
		if(isset($param['role']) && $param['role']!=''){
			$this->db->where(TBL_USERS.'.role = "'.$param['role'].'"');	
		}
		if(isset($param['sales_rip_id']) && $param['sales_rip_id']!=''){
			$this->db->where(TBL_USERS.'.id = "'.$param['sales_rip_id'].'"');	
		}
		
		if(isset($param['manager_id']) && $param['manager_id']!=''){
			$this->db->where(TBL_USERS.'.parent_report_id = "'.$param['manager_id'].'"');	
		}
		
		if(isset($param['director_id']) && $param['director_id']!=''){
			$this->db->where_in('parent_report_id',$param['director_id']);
		}
		if(isset($sWhere) && trim($sWhere) != ''){
			$this->db->where('('.$sWhere.')');
		}
		if(isset($sOrder) && trim($sOrder) != ''){
			$this->db->order_by($sOrder);
		} 
		if(isset($length) && $length != ''){
			$this->db->limit($length,$start);
		}
		if($is_active!=null){
			$this->db->where(array(TBL_USERS.'.is_active'=>$is_active));
		}
		//$this->db->group_by(TBL_USERS.'.id');
		
	 	//echo $this->db->_compile_select(); die;  
		$recordSets = $this->db->get();
		
		$data = $recordSets->result();
		
		return $data;	
		
	}
	
	
	
		/**
	* Method Name : getRoleUsers
	* Parameter : role_id 
	* Task : Loading for getting all admin as per given role_id
	*/
	
	function getRoleAdmin($role=null,$is_active=null){
		if($role==null) return array();
		$this->db->select(TBL_USERS.'.email,'.TBL_USERS.'.is_active,'.TBL_USERS.'.parent_report_id,'.TBL_USERS.'.role,'.TBL_USERS.'.job_title,'.TBL_USER_INFORMATION.'.*,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_CITIES.'.title as city,');
		$this->db->from(TBL_USERS);
		$this->db->where(array(TBL_USERS.'.role'=>$role));
		if($is_active!=null){
			$this->db->where(array(TBL_USERS.'.is_active'=>$is_active));
		}
		$this->db->join(TBL_USER_INFORMATION,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_USER_INFORMATION.".mst_countries_id");
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_USER_INFORMATION.".mst_states_id");
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_USER_INFORMATION.".mst_cities_id"); 
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}
  
	/**
	* Method Name : getUserByRoles
	* Parameter :user_id
	* Task : Loading for Getting Role
	*/
	function getUserByRoles($role_id=null){
		if($role_id==null) return array();
		$this->db->select(TBL_USERS.'.*,'.TBL_EMPLOYEES.'.first_name,last_name');	  
		$this->db->from(TBL_USERS);
		$this->db->where(array(TBL_EMPLOYEES.'.is_active'=>TRUE,TBL_USERS.'.mst_roles_id'=>$role_id));
		$this->db->join(TBL_EMPLOYEES,TBL_EMPLOYEES.'.users_id='.TBL_USERS.'.id');
		$recordSet = $this->db->get();
	    $data=$recordSet->result();	
		return $data;	
	}
	

	/**
	* Method Name : validate_email 
	*Parameter : $email
	* Task : Loading for checking the email from the user table
	*/

	function validate_email($email,$email_used_user_id=null){
		if($email=="")return false;
		$this->db->select('*');
		$this->db->where(array('email'=>$email));
		if(isset($email_used_user_id) && $email_used_user_id!='' ){ 
			$array = array('id !=' =>$email_used_user_id);
			$this->db->where($array);     
		}	
		$recordSet = $this->db->get(TBL_USERS);	
		$data=$recordSet->result() ;
		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}	
	
	
	/**
	* Method Name : validate_phone
	*Parameter : $email
	* Task : Loading for checking the email from the user table
	*/

	function validate_phone($phone=null,$email_used_user_id=null,$first_name=null,$last_name=null){
		if($phone==null)return false;
		$this->db->select('*');
		$this->db->where(array('telephone_no'=>$phone));
		if(isset($email_used_user_id) && $email_used_user_id!=null && $email_used_user_id!=''){ 
			$array = array('id!'=>$email_used_user_id);
			$this->db->where($array);     
		}	
		if(isset($first_name) && $first_name!=null  && $first_name!=''){ 
			$array = array('first_name' =>$first_name);
			$this->db->where($array);     
		}	
		if(isset($last_name) && $last_name!=null  && $last_name!='' ){ 
			$array = array('last_name' =>$last_name);
			$this->db->where($array);     
		}	
		$recordSet = $this->db->get(TBL_MST_USERS_Information);	
		$data=$recordSet->result() ;
		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}	

	/**
	* Method Name : validate_username 
	*Parameter : $username
	* Task : Loading for checking the username from the user table
	*/

	function validate_username($username,$email_used_user_id=null){
		if($username=="")return false;
		$this->db->select('*');
		$this->db->where(array('username'=>$username));
		if(isset($email_used_user_id) && $email_used_user_id!='' ){ 
			$array = array('id !=' =>$email_used_user_id);
			$this->db->where($array);     
		}		
		$recordSet = $this->db->get(TBL_USERS);
		$data=$recordSet->result() ;
		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}	
	
	/**
	* Method Name : getAdminDetail 
	* Task : sending mail when deaadline submission date reached
	*/

	function getAdminDetail(){
	    $this->db->select('*');
		$this->db->from(TBL_USERS);
		/*$this->db->where('mst_roles_id', '5');
        $this->db->or_where('mst_roles_id', '1'); */
	    $this->db->where(array('mst_roles_id'=>'5','is_active'=>true));
		$this->db->or_where(array('mst_roles_id'=>'1')); 
	   //echo $this->db->_compile_select(); die(); 
	    $recordSet = $this->db->get();
		$data=$recordSet->result() ;
		return $data;
 	
	}
		/**
	* Method Name : getState 
	*Parameter : state_id
	* Task : Loading for Getting State according to state_id
	*/
	
	function getUserInfo($username=null){
		if($username==null) return array();
		$this->db->select('*');
		$this->db->where(array('email'=>$username));
		$recordSet = $this->db->get(TBL_USERS);
		$data=$recordSet->result() ;
 		return $data;
	}	
	
	
	 /**
	* Method Name : getAutoSalesRip
	* Task : Loading for getting all city from 
	*/
	
	function getAutoSalesRip($search_string=null){
		$this->db->select(TBL_USERS.'.id,'.TBL_USER_INFORMATION.'.first_name,'.TBL_USER_INFORMATION.'.last_name');
		$this->db->from(TBL_USERS);
		$this->db->join(TBL_USER_INFORMATION,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->where(array(TBL_USERS.'.is_active'=>true,TBL_USERS.'.role'=>SALES_RIP_NAME));
	   // $this->db->like(TBL_USER_INFORMATION.'.first_name', $search_string);
		//$this->db->or_like(TBL_USER_INFORMATION.'.last_name', $search_string);
		$this->db->where("(".TBL_USER_INFORMATION.".first_name like '%".$search_string."%' or ".TBL_USER_INFORMATION.".last_name like '%".$search_string."%')");

		//echo $this->db->_compile_select();
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		return $data;
	}
	
	 /**
	* Method Name : getAutoSalesRip
	* Task : Loading for getting all salesrep from 
	*/
	
	function getAutoStoreRip($search_string=null){
		$this->db->select('id,title');
		$this->db->from(TBL_MST_STORES);
		$this->db->where(array('is_active'=>true));
	    $this->db->like('title', $search_string);
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		return $data;
	}
	
	 /**
	* Method Name : getQuestions
	* Task : Loading for getting all questions from 
	*/
	function getQuestions(){
		$this->db->select('id,question,question_type');
		$this->db->from(TBL_MST_QUESTIONS);
		$this->db->where(array('is_active'=>true));
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		return $data;
	}
	
	/**
	* Method Name : 
	* Task : 
	*/
	function getSlesRepId($salesrepname){
		$name=explode(' ',$salesrepname);
		//print_r($name);
		$this->db->select('tbl_users_id');
		$this->db->from(TBL_USER_INFORMATION);
		$this->db->join(TBL_USERS,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->where(array(TBL_USERS.'.role'=>SALES_RIP_NAME));
		if(isset($name[0])){
			$this->db->where(array('first_name'=>trim($name[0])));
		}
		if(isset($name[1]) && !empty($name[1]) && $name[1]!=''){
			$this->db->where(array('last_name'=>trim($name[1])));
		}else if(isset($name[2]) && !empty($name[2])){
			$this->db->where(array('last_name'=>trim($name[2])));
		}
		//echo $this->db->_compile_select();die;
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
		if(count($data)>0){
			return $data[0]->tbl_users_id;
		}else{
			return 0;
		}
	}
	
	/**
	* Method Name : getVenueAttachmentByVenueid
	* Task : Loading for getting all questions from 
	*/
	function getVenueAttachmentByVenueid($session_id=null){
		if($session_id==null){return false;}
		$this->db->select(TBL_VENUES_ATTACHEMENTS.'.*');
		$this->db->from(TBL_MST_SESSION);
		$this->db->where(array(TBL_MST_SESSION.'.id'=>$session_id));
		$this->db->join(TBL_VENUES_ATTACHEMENTS, TBL_VENUES_ATTACHEMENTS.'.venue_id='.TBL_MST_SESSION.".mst_venues_id");
		$recordSet=$this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}
	
/*	function isStoreAvailable($storeName=null,$store_number=null){
		$this->db->select(TBL_MST_STORES.'.id');
		$this->db->from(TBL_MST_STORES);
		$this->db->where(array(TBL_MST_STORES.'.title'=>$storeName));
		//$this->db->where(array(TBL_MST_STORES.'.store_no'=>$store_number));
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data[0]->id;
		}else{
			return false;
		}
	}
	*/
	
		function isStoreAvailable($storeName=null){
		$this->db->select(TBL_MST_STORES.'.id');
		$this->db->from(TBL_MST_STORES);
		$this->db->where(array(TBL_MST_STORES.'.title'=>$storeName));
		//$this->db->where(array(TBL_MST_STORES.'.store_no'=>$store_number));
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data[0]->id;
		}else{
			return false;
		}
	}
	
	
	function isCityAvailable($cityName=null){
		$this->db->select(TBL_MST_CITIES.'.id');
		$this->db->from(TBL_MST_CITIES);
		$this->db->where(array(TBL_MST_CITIES.'.title'=>$cityName));
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data[0]->id;
		}else{
			return false;
		}
	}
	
	
	
	function isStateAvailable($statename=null){
		$this->db->select(TBL_MST_STATES.'.id');
		$this->db->from(TBL_MST_STATES);
		$this->db->where(array(TBL_MST_STATES.'.title'=>$statename));
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data[0]->id;
		}else{
			return false;
		}
	}
	

	/**
	* Method Name : getUserEventDetail 
	*Parameter : user_id
	* Task : Loading for Getting User Detail according to user_id
	*/
	
	function getUserEventDetail($user_id=null){
		if($user_id==null) return array();
		$this->db->select(TBL_EVENT_REGISTRATION.'.*,'.TBL_MST_SESSION.'.date,'.TBL_MST_SESSION.'.event_time_from,'.TBL_MST_SESSION.'.event_time_to,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_VENUES.'.venue_name as venue,'.TBL_MST_VENUES.'.zipcode,'.TBL_MST_VENUES.'.telephone,'.TBL_MST_CITIES.'.title as city');
		$this->db->from(TBL_EVENT_REGISTRATION);
		$this->db->where(array(TBL_EVENT_REGISTRATION.'.tbl_users_id'=>$user_id));
		$this->db->join(TBL_MST_SESSION,TBL_MST_SESSION.'.id='.TBL_EVENT_REGISTRATION.'.session_id');
		$this->db->join(TBL_MST_VENUES,TBL_MST_VENUES.'.id='.TBL_MST_SESSION.'.mst_venues_id');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_MST_SESSION.".mst_countries_id");
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_MST_SESSION.".mst_states_id");
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_MST_SESSION.".event_mst_cities_id");
		$this->db->order_by('id','desc');
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}
	
	
	/**
	* Method Name : getUserDetail 
	*Parameter : user_id
	* Task : Loading for Getting User Detail according to user_id
	*/
	
	function getSessionDetail($session_id=null){
		if($session_id==null) return array();
		$this->db->select(TBL_MST_SESSION.'.date,'.TBL_MST_SESSION.'.event_time_from,'.TBL_MST_SESSION.'.event_time_to,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_VENUES.'.venue_name as venue,'.TBL_MST_VENUES.'.zipcode,'.TBL_MST_VENUES.'.venue_street as street,'.TBL_MST_VENUES.'.telephone,'.TBL_MST_CITIES.'.title as city');
		$this->db->from(TBL_MST_SESSION);
		$this->db->where(array(TBL_MST_SESSION.'.id'=>$session_id));
		$this->db->join(TBL_MST_VENUES,TBL_MST_VENUES.'.id='.TBL_MST_SESSION.'.mst_venues_id');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_MST_SESSION.".mst_countries_id");
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_MST_SESSION.".mst_states_id");
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_MST_SESSION.".event_mst_cities_id");
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}
	
	
	/*
	* Method Name : getMenus
	* Parameter : null
	* Task : Loading for getting all the menus
	*/
	
	function getMenus($parent_menu=false,$parent_id=null){
		$this->db->select(TBL_MASTER_MENUS.'.*');
		if($parent_menu==true){
			$this->db->where(array('menu_parent_id'=>0));
		}
		if($parent_id!=null && $parent_id!=''){
			$this->db->where(array('menu_parent_id'=>$parent_id));
		}
		$this->db->where(array('is_active'=>1));
			
		$this->db->from(TBL_MASTER_MENUS);
		$recordSets = $this->db->get();
		$data = $recordSets->result();
		return $data;
	}	
		
	/*
	* Method Name : checkRoleMenu
	* Parameter : null
	* Task : Loading for check the role menu
	*/
	
	function checkRoleMenu($menu_id=null,$role=null,$allow_type=false){
		if($role==null || $role==''){
			$role=$this->session->userdata('role_id');
		}				
		if($role==ADMIN_NAME){
			return true;
		}
	
		$this->db->select(TBL_MENU_HAS_ROLES.'.*');
		if($menu_id!=null && $menu_id!='' && $allow_type==false){
			$this->db->where(array('mst_menus_id'=>$menu_id,'role'=>$role,'is_allow'=>true));
		}	else{
			$this->db->where(array('mst_menus_id'=>$menu_id,'role'=>$role));
		}
		$this->db->from(TBL_MENU_HAS_ROLES);
		$recordSets = $this->db->get();
		$data = $recordSets->result();
		
		if(!empty($data) && $data>0){
			return true;
		}else{
			return false;	
		}
	}	
	
	
	
	function getImportCsv(){
		$this->db->select('*');
		$this->db->from('csv_import_old_customer');
		//$this->db->group_by('SalesRep');
		$recordSet = $this->db->get();
		$data=$recordSet->result() ;
 		return $data;
	}
	
	
	function storeSessionAvailable($store_id=null,$venue_id=null){
		if($store_id==null){return false;}
		$this->db->select('session_id');
		$this->db->from(TBL_SESSION_HAS_STORE);
		$this->db->join(TBL_MST_SESSION,TBL_MST_SESSION.'.id='.TBL_SESSION_HAS_STORE.'.session_id');		
		$this->db->where(array(TBL_SESSION_HAS_STORE.'.store_id'=>$store_id,TBL_MST_SESSION.'.mst_venues_id'=>$venue_id));
		$this->db->group_by('session_id');
		//$this->db->_compile_select();die;
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data;
		}else{
			return false;
		}
	}
	
	
	
	function storeSessionAvailableBySessionId($store_id=null,$session_id=null){
		if($session_id==null && $store_id==null){return false;}
		$this->db->select('*');
		$this->db->from(TBL_SESSION_HAS_STORE);
		$this->db->where(array('session_id'=>$session_id,'store_id'=>$store_id));
		//echo $this->db->_compile_select();die;
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}
	
	
	
	/**
	* Method Name : getRoleUsers
	* Parameter : role_id 
	* Task : Loading for getting all users as per given role_id
	*/
	
	function getUsersAccount($param=array(),$sWhere=null,$sOrder=null,$length=null,$start=null,$is_active=null){
		if(empty($param)) return array();
		$this->db->select(TBL_USERS.'.email,'.TBL_USERS.'.password,'.TBL_USERS.'.is_active,'.TBL_USER_INFORMATION.'.sales_rip,'.TBL_USERS.'.role,'.TBL_USERS.'.job_title,'.TBL_USER_INFORMATION.'.*,'.TBL_MST_COUNTRIES.'.title as country,'.TBL_MST_STATES.'.title as state,'.TBL_MST_CITIES.'.title as city,'.TBL_MST_STORES.'.title as store');
		$this->db->from(TBL_USERS);
		$this->db->join(TBL_USER_INFORMATION,TBL_USER_INFORMATION.'.tbl_users_id='.TBL_USERS.'.id');
		$this->db->join(TBL_MST_COUNTRIES, TBL_MST_COUNTRIES.'.id='.TBL_USER_INFORMATION.".mst_countries_id",'left');
		$this->db->join(TBL_MST_STATES, TBL_MST_STATES.'.id='.TBL_USER_INFORMATION.".mst_states_id",'left');
		$this->db->join(TBL_MST_CITIES, TBL_MST_CITIES.'.id='.TBL_USER_INFORMATION.".mst_cities_id",'left');
		$this->db->join(TBL_MST_STORES, TBL_MST_STORES.'.id='.TBL_USER_INFORMATION.".store_id",'left');
		//echo $this->db->_compile_select();die;
		
		if(isset($param['role']) && $param['role']!=''){
			$this->db->where(TBL_USERS.'.role = "'.$param['role'].'"');	
		}
		if(isset($param['sales_rip_id']) && $param['sales_rip_id']!=''){
			$this->db->where(TBL_USERS.'.id = "'.$param['sales_rip_id'].'"');	
		}
		
		if(isset($param['manager_id']) && $param['manager_id']!=''){
			$this->db->where(TBL_USERS.'.parent_report_id = "'.$param['manager_id'].'"');	
		}
		
		if(isset($param['director_id']) && $param['director_id']!=''){
			$this->db->where_in('parent_report_id',$param['director_id']);
		}
		if(isset($sWhere) && trim($sWhere) != ''){
			$this->db->where('('.$sWhere.')');
		}
		if(isset($sOrder) && trim($sOrder) != ''){
			$this->db->order_by($sOrder);
		} 
		if(isset($length) && $length != ''){
			$this->db->limit($length,$start);
		}
		if($is_active!=null){
			$this->db->where(array(TBL_USERS.'.is_active'=>$is_active));
		}
		//$this->db->group_by(TBL_USERS.'.id');
		
	 	//echo $this->db->_compile_select(); die;  
		$recordSets = $this->db->get();
		
		$data = $recordSets->result();
		
		return $data;	
		
	}
	
	
	/**
	* Method Name : getStoreByUserId
	* Parameter : user_id 
	* Task : getting store Name by user id
	*/
	function getStoreByUserId($user_id=null){
		if($user_id==null){return false;}
		$this->db->select(TBL_MST_STORES.'.title');
		$this->db->from(TBL_USER_INFORMATION);
		$this->db->join(TBL_MST_STORES,TBL_MST_STORES.'.id='.TBL_USER_INFORMATION.'.store_id');	
		$this->db->where(array(TBL_USER_INFORMATION.'.tbl_users_id'=>$user_id));	
		//echo $this->db->_compile_select();die;
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data[0]->title;
		}else{
			return false;
		}

	}
	
	
	
	/**
	* Method Name : getDateTimeByTimeZone
	* Parameter : Zone name 
	* Task : getting date time according to zone ***example "canada/central"
	*/
	
	function getDateTimeByTimeZone($zone=null){
	if($zone==null) return false;
			date_default_timezone_set($zone);
			return date('Y/m/d G:i:s');
	}
	
	/**
	* Method Name : getDateTimeByTimeZone
	* Parameter : Zone name 
	* Task : getting date time according to zone ***example "canada/central"
	*/
	
	function getSetGloabalTime(){
		$this->db->select(TBL_MST_SETTINGS.'.*');
		$this->db->from(TBL_MST_SETTINGS);
		$recordSet=$this->db->get();
		$data=$recordSet->result();
 		if(count($data)>0){
			return $data;
		}else{
			return 2;
		}
	}

	/**
	* Method Name : getAllUserRecords
	* Parameter :  
	* Task : getting all users sales_rip
	*/
	function getAllUserRecords()
	{
		 $this->db->select('sales_rip,tbl_users_id');
		 $this->db->from(TBL_MST_USERS_Information);
		 $recordSet=$this->db->get();
		 $data=$recordSet->result();
		 return $data;	 
	}

	/**
	* Method Name : UpdateEventRecord
	* Parameter : user_id 
	* Task : getting all event table record according to userid
	*/
	function UpdateEventRecord($user_id=null)
	{	
	 $this->db->select('id');
	 $this->db->from(TBL_EVENT_REGISTRATION);
	 $this->db->where(array('is_cancel'=>false,'tbl_users_id'=>$user_id));	
	 $recordSet=$this->db->get();
	 $data=$recordSet->result();
	 if(count($data)>0){
			return $data[0]->id;
		}else{
			return false;
		} 
	}
	
	
	/**
	* Method Name : getContentImages
	* Parameter : product_id
	* Task : Loading for Getting Product Images
	*/
	
	function getContentImages($content_id=null){
		if($content_id==null) return array();
		$this->db->select('*');
		$this->db->from(TBL_CONTENT_IMAGES);			
		$this->db->where(array('content_id'=>$content_id));		
		$recordSet = $this->db->get();
		$data=$recordSet->result();
		if(count($data) > 0){
			return $data;
		}else{
			return array();
		}
	}
	
	
}// Class
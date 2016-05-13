<?php

	class Data_model extends CI_Model
	{
		
		function SaveForm($form_data)
	{
		$this->db->insert('quote', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
		function getAll($agent_id,$project_name_openemm,$mailinglist_id,$user_type) {
			$this->db_staging = $this->load->database('staging', TRUE); 
			$this->db_staging->select('firstname, lastname, customer_1_tbl.creation_date, email, phone ');
			$this->db_staging->from('customer_1_tbl');
			$this->db_staging->join('customer_1_binding_tbl', 'customer_1_binding_tbl.customer_id=customer_1_tbl.customer_id');
			$this->db_staging->where('agent_id', $agent_id);
			$this->db_staging->where('project', $project_name_openemm);
			$this->db_staging->where('mailinglist_id', $mailinglist_id);
			$this->db_staging->where('user_type', $user_type);
			$recordSet = $this->db_staging->get();
			$data=$recordSet->result() ;
			return $data;
		}
		
			
	
	function getAllCategories() {
		$q = $this->db->get('category');
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	} // End getAllCategories
		
		
		function getProducts($CatID){
			$query = $this->db->get_where('products', array('category_id' => $CatID));
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getProducts
			
			
			function editPortfolio($p_id){
			$query = $this->db->get_where('products', array('p_id' => $p_id));
			
			$data=$query->result() ;
			return $data;		
			}// End getProducts
			
		
			
		function getPortfolio(){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->join('category', 'category.category_id = products.category_id');
			
			$query = $this->db->get();
			
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getPortfolio
			
			
		function add_menu()
		{
			$data = array(
		   'link_name' => $this->input->post('link_name') ,
		   'url_link' => $this->input->post('url_link'),
		   'icon_name' => $this->input->post('icon_name') ,
		   'arrange' => $this->input->post('arrange') ,
		   'class_name' => $this->input->post('class_name') ,
		   'active' => $this->input->post('active') ,
		   'main_link' => '0'
			);
		
			$this->db->insert('menu_name', $data); 
			
			$this->session->set_flashdata('menu_added', '<p class=\'success\'>The menu was added successfully.</p>');
			redirect(current_url());
		} // end Add_menu function
		
		
		function sub_menu()
		{
			$data = array(
		   'link_name' => $this->input->post('link_name') ,
		   'url_link' => $this->input->post('url_link'),
		   'icon_name' => $this->input->post('icon_name') ,
		   'arrange' => $this->input->post('arrange') ,
		   'class_name' => $this->input->post('class_name') ,
		   'active' => $this->input->post('active') ,
		   'main_link' => '1',
		   'main_link_id' => $this->input->post('sub_menu')
			);
		
			$this->db->insert('menu_name', $data); 
			
			$this->session->set_flashdata('menu_added', '<p class=\'success\'>The sub menu was added successfully.</p>');
			redirect(current_url());
		} // end sub_menu function
		
		
		function add_portfolio()
		{
			$data = array(
		   'product_title' => $this->input->post('product_title') ,
		   'url_link' => $this->input->post('url_link'),
		   'icon_name' => $this->input->post('icon_name') ,
		   'arrange' => $this->input->post('arrange') ,
		   'class_name' => $this->input->post('class_name') ,
		   'active' => $this->input->post('active') ,
		   'main_link' => '1',
		   'main_link_id' => $this->input->post('sub_menu')
			);
		
			$this->db->insert('menu_name', $data); 
			
			$this->session->set_flashdata('menu_added', '<p class=\'success\'>The sub menu was added successfully.</p>');
			redirect(current_url());
		} // end sub_menu function
		
		
		function getIndustries(){
			$query = $this->db->get('products');
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getIndustries
		
		function viewIndustries($Industries){
			$query = $this->db->get_where('products', array('Industries' => $Industries));
			$data=$query->result() ;
			return $data;		
			}// End viewIndustries
			
		function getCategories(){
			$query = $this->db->get('category');
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getPortfolio
			
			
			
			
			
			function mani_menu(){
		//$query = $this->db->get_where('mst_menus', array('menu_parent_id' => '0','is_active'=>'1'));
		$query = $this->db->get_where('mst_menus', array('menu_parent_id' => '0'));

			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End mani_menu
			
			
			
			function view_sub_menu(){
		//$query = $this->db->order_by('menu_parent_id', 'ASC')->order_by('order', 'ASC')->get_where('mst_menus', array('menu_parent_id !=' => '0','is_active'=>'1'));
		//$query = $this->db->order_by('birth_date', 'ASC')->get_where($this->tbl_name, $where);
			
							$this->db->select('*');
							$this->db->from('mst_menus');
							//$this->db->where('is_active', '1'); 
							$this->db->where('menu_parent_id <>', '0'); 
							//$this->db->order_by('menu_parent_id asc, order asc'); 
							$this->db->order_by('order', 'asc'); 
							$query = $this->db->get();
						//	print_r($query);
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End view_sub_menu
			
		function editCategories($category_id){
			$query = $this->db->get_where('category', array('category_id' => $category_id));
			
			$data=$query->result() ;
			return $data;		
			}// End getProducts
			
			
			function getAllUsers() {
					$q = $this->db->get('user');
					
					if($q->num_rows() > 0) {
						foreach ($q->result() as $row) {
							$data[] = $row;
						}
						return $data;
					}
				}
				
				
				function editUser($user_id){
			$query = $this->db->get_where('user', array('user_id' => $user_id));
			
			$data=$query->result() ;
			return $data;		
			}// End getProducts
					
	
	
	
	function edit_main_menu($mst_menuid){
			$query = $this->db->get_where('mst_menus', array('mst_menuid' => $mst_menuid));
			
			$data=$query->result() ;
			return $data;		
			}// End edit_main_menu
			
			
	function update_main_menu($mst_menuid){
			$query = $this->db->get_where('mst_menus', array('mst_menuid' => $mst_menuid));
			
			$data=$query->result() ;
			return $data;		
			}// End update_main_menu
	
	function update_sub_menu($mst_menuid){
			$query = $this->db->get_where('mst_menus', array('mst_menuid' => $mst_menuid));
			
			$data=$query->result() ;
			return $data;		
			}// End update_main_menu
	
	function manage_content(){
			$query = $this->db->get('content');
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End manage_content	
			
			function edit_content($id){
			$query = $this->db->get_where('content', array('id' => $id));
			
			$data=$query->result() ;
			return $data;		
			}// End edit_main_menu					
		
		
		function update_configuration($data)
		{
			$row_id = $this->uri->segment(4);
		
			$result = $this->db->update('configuration', $data, "id = '{$row_id}'");
			
			if($result)
			{
				redirect('admincms/content/configuration/1', 'refresh');
			}
		}
				
				
					function viewPost($post_id){
						$query = $this->db->get_where('post', array('post_id' => $post_id));
						
						$data=$query->result() ;
						return $data;		
						}// End viewPost
		
		function getPost(){
			$this->db->select('*');
			$this->db->from('post');
			$this->db->join('post_section', 'post.section_id = post_section.section_id');
			$this->db->order_by('post_id', 'DESC');
			
			$query = $this->db->get();
			
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getPost	
			
			function editTable($table_name,$where_id,$id){
			$query = $this->db->get_where($table_name, array($where_id => $id));
			
			$data=$query->result() ;
			return $data;		
			}// End getProducts	
			

			function getTable($tableName= null, $sortBy = null) {
					//$q = $this->db->get($tableName);
					
					$this->db->from($tableName);
					$this->db->order_by($sortBy, "desc");
					$q = $this->db->get(); 
										
					if($q->num_rows() > 0) {
						foreach ($q->result() as $row) {
							$data[] = $row;
						}
						return $data;
					}
				}
				
				function getJoinTable($tableFrom = null,$tableTo=null,$tableFromID=null,$tableToId=null){
			$this->db->select('*');
			$this->db->from($tableFrom);
			$this->db->join($tableTo, $tableFromID = $tableToId);
			
			$query = $this->db->get();
			
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getPortfolio
			
			
			function getmedia(){
			$this->db->select('*');
			$this->db->from('media');
			$this->db->join('media_group', 'media.group_id = media_group.group_id');
			$this->db->Order_by('media_id','DESC');
			$query = $this->db->get();
			
			
				if($query->num_rows() > 0)
				{
					foreach ($query->result() as $row){
							$data[]=$row;
						}
						return $data;
					}
			
			}// End getPortfolio
			
			function  gallery_more($group_id){
				$query = $this->db->order_by('media_id', 'DESC')->get_where('media', array('group_id' => $group_id,'active'=>TRUE));
						
						$data=$query->result() ;
						return $data;		
						}// End viewPost
						
						
						public function record_count() {
        return $this->db->count_all("post");
    }
 
    public function fetch_post($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by("post_id", "desc");
		$this->db->where('title_en <>', '');
        $query = $this->db->get("post");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   	
		public function get_all_post_en($per_pg,$offset)
			{
		$this->db->order_by("post_id", "desc");
				$this->db->where('title_en <>', '');

				$query=$this->db->get('post',$per_pg,$offset);
				return $query->result();
			}
			
			
					
					public function get_all_post_ar($per_pg,$offset)
			{
		$this->db->order_by("post_id", "desc");
				$this->db->where('title_ar <>', '');

				$query=$this->db->get('post',$per_pg,$offset);
				return $query->result();
			}
			
			
			public function get_all_post_archive_ar($per_pg,$offset)
			{
		$this->db->order_by("post_id", "asc");
				$this->db->where('title_ar <>', '');

				$query=$this->db->get('post',$per_pg,$offset);
				return $query->result();
			}
			
			public function get_all_post_archive_en($per_pg,$offset)
			{
		$this->db->order_by("post_id", "asc");
				$this->db->where('title_en <>', '');

				$query=$this->db->get('post',$per_pg,$offset);
				return $query->result();
			}
			
	} // End Class
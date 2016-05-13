	
	<div class="row">
			
		<div id="nav_container" class="large-12 columns">
			<nav class="top-bar-section top-bar" data-topbar>
		
                    <ul class="no-bullet left">			   
                        <?php 
					
                        	//$query = $this->db->get_where('mst_menus', array('menu_parent_id '=>'0','is_active'=>'1'));
							$role_name  =   $this->session->userdata('role');
							$this->db->select('*');
							$this->db->from('mst_menus');
							$this->db->join('menu_has_roles', 'mst_menus.mst_menuid = menu_has_roles.mst_menus_id');
							$this->db->where('menu_has_roles.role', $role_name); 
							$this->db->where('mst_menus.is_active', '1'); 
							$this->db->where('mst_menus.menu_parent_id', '0'); 
							$this->db->where('menu_has_roles.is_allow', '1'); 
							$this->db->order_by("order", "asc"); 
							$query = $this->db->get();
							
									foreach ($query->result() as $row)
									
									{?>
                                            <li>
                                            <li class="<?=$row->class_name; ?>">
                                            <a href="<?php echo base_url();?><?= $row->url?>"><?= $row->title; ?></a>
                                           
                                                <ul class="dropdown">
                                            		<?php 
														
							//$query2 = $this->db->get_where('mst_menus', array('menu_parent_id '=>$row->mst_menuid));

                                                            $this->db->select('*');
                                                            $this->db->from('mst_menus');
                                                           $this->db->join('menu_has_roles', 'mst_menus.mst_menuid = menu_has_roles.mst_menus_id');
                                                            $this->db->where('menu_has_roles.role', $role_name); 
                                                            $this->db->where('mst_menus.is_active', '1');
                                                            $this->db->where('mst_menus.menu_parent_id', $row->mst_menuid); 
                                                            $this->db->where('menu_has_roles.is_allow', '1'); 
                                                            $this->db->order_by("order", "asc"); 
                                                            $query2 = $this->db->get();
                                                    foreach ($query2->result() as $submenu)
                                                            {?>
                                                              <li><a href="<?php echo base_url(); ?><?= $submenu->url?>"><?= $submenu->title?></a></li>
                                                             <?php } // end for each sub main menu
                       							   ?>  <!-- close Second for each-->
                                                </ul>
                                            </li>
       							 <?php } // end for each main menu
                         ?> <!-- close First for each-->
                    
				</ul>
	
				<ul class="no-bullet right">
					<li><a href="<?php echo base_url(); ?>admincms/login/logout">Logout</a></li>
				</ul>
				
			</nav>
		</div>
	
	</div>
	
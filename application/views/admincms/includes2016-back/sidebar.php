 
<li class="nav-item start ">
                            
                        </li>
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
                        <li class="nav-item  ">
                            <a href="<?php echo base_url();?><?php echo $row->url?>" class="nav-link nav-toggle">
                                <i class="<?php echo $row->class_name; ?>"></i>
                                <span class="title"><?php echo $row->title; ?></span>
                                <span class="arrow"></span>
                            </a>
                            
                         
                                
                                    <ul class="sub-menu">
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
                                                <li class="nav-item ">
                                                    <a href="<?php echo base_url(); ?><?php echo $submenu->url?>" class="nav-link "> <?php echo $submenu->title?> </a>
                                                </li>
                                                   

                                       <?php } // end for each sub main menu
                       							   ?>  <!-- close Second for each-->
                                    </ul>
                               
                        </li>
                 <?php } // end for each main menu
                         ?> <!-- close First for each-->     
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
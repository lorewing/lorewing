<?php $this->load->view("admincms/includes2016/top.php"); ?>


<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"><?php echo lang('Add Sub Menu'); ?> </h3>
				
                   		<?php echo form_open('/admincms/menus/add_sub_menu');
						
						 echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?> 

						<div class="form-group">   
						<label><?php echo lang('Sub Menu Name') ; ?></label>
						<?php echo form_input(array('name' => 'title','class' => 'form-control spinner', 'id' => 'title', 'placeholder' => 'Title', 'value' => set_value('title'))); ?>
                                                </div>
                         <div class="form-group">   
			<label><?php echo lang('Menu Name') ; ?></label>
                       		<select name="menu_parent_id">
                            <option value=""> Please Select Main Menu</option>
                            <?php
                        	$query = $this->db->get_where('mst_menus', array('menu_parent_id '=>'0','is_active'=>'1'));
							
									foreach ($query->result() as $row)
									{?>
										 <option value="<?php echo  $row->mst_menuid;?>"><?php echo  $row->title;?></option>				
									<?php } // end for each
							?>
							</select>
                         </div>
                        <div class="form-group">   
						<label><?php echo lang('URL') ; ?></label>
						<?php echo form_input(array('name' => 'url','class' => 'form-control spinner', 'id' => 'url', 'placeholder' => 'URL', 'value' => set_value('url'))); ?>
                        </div>
                
                        <div class="form-group">   
                        <label><?php echo lang('Target') ; ?></label>
                       
						<?php
							 $options=array('_blank'=>'Blank','new'=>'New Windows','_self'=>'Same Page');
								// $Industries  is for selected value
								echo form_dropdown('target', $options , '_self' );
						?>
                        
                        </div>
                
                       <div class="form-group">   
		<label><?php echo lang('Order') ; ?></label>
						<?php echo form_input(array('name' => 'order','class' => 'form-control spinner', 'id' => 'order', 'placeholder' => 'order', 'value' => set_value('order'))); ?>
                       </div>
                
                       <div class="form-group">   
		<label><?php echo lang('Class Name') ; ?></label>
						<?php echo form_input(array('name' => 'class_name','class' => 'form-control spinner', 'id' => 'class_name', 'placeholder' => 'Class Name', 'value' => set_value('class_name'))); ?>
                       </div>			
 			
                        <div class="form-group">   
                            <label class="rememberme mt-checkbox mt-checkbox-outline">

                          <?php echo form_checkbox('is_active', '1',True); ?> <?php echo lang('Active') ; ?>
                          <span></span>
                            </label>
                        </div>
                
                         <div class="form-group">  
						<?php
						echo form_submit(array('name' => 'add_menu','id' => 'add_menu', 'value' => lang('Add Sub Menu'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
				
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

<?php $this->load->view("admincms/includes2016/top.php"); ?>


<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"><?php echo lang('Edit User'); ?> </h3>
                 <?php 
								
								if(!empty($update_record)){
							echo $update_record;
							}
					?> 
                <hr>
                    	  <?php foreach($rows as $r) : ?>
                    	  <?php 
								$user_id = $r->user_id;
								$user_first_name = $r->user_first_name;
								$user_last_name = $r->user_last_name;
								$username = $r->username;
								$password = $r->password;
								$user_email = $r->user_email;
								$active = $r->active;
								$role = $r->role;
								
							?> 
                    	  
                    	  <?php endforeach; ?>
                    	  
                    	  
                    	  <?php echo form_open('/admincms/users/update_user/'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
			?>
                        
                                            	  <input name="user_id" type="hidden" value="<?php echo $user_id?>" />

                    	 					
                                                                <div class="form-group">   
						<label><?php echo lang('First Name') ; ?></label>
						<?php echo form_input(array('name' => 'user_first_name','class'=>'form-control spinner', 'id' => 'user_first_name', 'placeholder' => 'First Name', 'value' => $user_first_name)); ?>
                                                                </div>
                          <div class="form-group">   
						<label><?php echo lang('Last Name') ; ?></label>
						<?php echo form_input(array('name' => 'user_last_name','class'=>'form-control spinner', 'id' => 'user_last_name', 'placeholder' => 'Last Name', 'value' => $user_last_name)); ?>
                          </div>
                        <div class="form-group">   
                            <label><?php echo lang('User Name') ; ?></label>

                            <?php echo form_input(array('name' => 'username', 'id' => 'username','class'=>'form-control spinner', 'placeholder' => 'User Name', 'value' => $username)); ?>
                        </div>			
                        
                        <div class="form-group">   
                            <label><?php echo lang('Password') ; ?></label>
						<?php echo form_password(array('name' => 'password','class'=>'form-control spinner', 'id' => 'password', 'placeholder' => 'Password')); ?>
                        </div>			
                        
                       <div class="form-group">   
                            <label><?php echo lang('User Email') ; ?></label>
						<?php echo form_input(array('name' => 'user_email','class'=>'form-control spinner', 'id' => 'user_email', 'placeholder' => 'User Email', 'value' => $user_email)); ?>
                       </div>	
                      
                       <div class="form-group">   
                            <label><?php echo lang('Permissions') ; ?></label>
                       
						<?php
							 $options=array('administrator'=>'Administrator','power_user'=>'Power User','director'=>'Director','staff'=>'Staff','visitors'=>'Visitors');
								// $Industries  is for selected value
								echo form_dropdown('Permissions', $options , $role );
						?>
                       </div>
                                                  
                       
                          <div class="form-group">   
                            <label class="rememberme mt-checkbox mt-checkbox-outline">

                          <?php echo form_checkbox('active', '1',$active); ?> <?php echo lang('Active') ; ?>
                          <span></span>
                            </label>
                        </div>
                          <div class="form-group">   
                       
						<?php echo form_submit(array('name' => 'edit_portfolio','id' => 'edit_portfolio', 'value' => lang('Edit User'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
                          </div>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

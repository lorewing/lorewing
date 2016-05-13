<?php $this->load->view("admincms/includes2016/top.php"); ?>


<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"><?php echo lang('Add User'); ?> </h3>
                 <?php 
								
								if(!empty($update_record)){
							echo $update_record;
							}
					?> 
                <hr>
					
				
                   		<?php echo form_open('/admincms/users/add_users');
						
						 echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?> 


                        
						
						
                        
                        
						 <div class="form-group">   
						<label><?php echo lang('First Name') ; ?></label>
						<?php echo form_input(array('name' => 'user_first_name', 'id' => 'user_first_name','class'=>'form-control spinner', 'placeholder' => 'First Name', 'value' => set_value('user_first_name'))); ?>
                                                 </div>
                         <div class="form-group">   
						<label><?php echo lang('Last Name') ; ?></label>
						<?php echo form_input(array('name' => 'user_last_name', 'id' => 'user_last_name','class'=>'form-control spinner', 'placeholder' => 'Last Name', 'value' => set_value('user_last_name'))); ?>
                         </div>		
                       <div class="form-group">   
                            <label><?php echo lang('User Name') ; ?></label>
						<?php echo form_input(array('name' => 'username', 'id' => 'username','class'=>'form-control spinner', 'placeholder' => 'User Name', 'value' => set_value('username'))); ?>
                       </div>		
                        <div class="form-group">   
                            <label><?php echo lang('Password') ; ?></label>
						<?php echo form_password(array('name' => 'password','class'=>'form-control spinner', 'id' => 'password', 'placeholder' => 'Password', 'value' => set_value('password'))); ?>
                        </div>		
                        
                       <div class="form-group">   
                            <label><?php echo lang('User Email') ; ?></label>
						<?php echo form_input(array('name' => 'user_email','class'=>'form-control spinner', 'id' => 'user_email', 'placeholder' => 'User Email', 'value' => set_value('user_email'))); ?>
                       </div>		
                       
                     <div class="form-group">   
                            <label><?php echo lang('Permissions') ; ?></label>
                       
						<?php
							 $options=array('administrator'=>'Administrator','power_user'=>'Power User','director'=>'Director','staff'=>'Staff','visitors'=>'Visitors');
								// $Industries  is for selected value
								echo form_dropdown('Permissions', $options , 'staff' );
						?>
                     </div>
                <div class="form-group">   
                            
						<?php
						
						echo form_submit(array('name' => 'add_user','id' => 'add_user', 'value' => lang('Add User'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
                </div>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

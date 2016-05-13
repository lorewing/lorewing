<?php $this->load->view("admincms/includes2016/top.php"); ?>


<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"><?php echo lang('Edit Main Menu'); ?> </h3>
                <?php 
								
								if(!empty($update_record)){
							echo $update_record;
							}
					?> 
                 <hr>
                 
                    	  <?php foreach($rows as $r) : ?>
                    	  <?php 
								$mst_menuid = $r->mst_menuid;
								$title = $r->title;
								$url = $r->url;
								$target = $r->target;
								$order = $r->order;
								$is_active = $r->is_active;
								$class_name = $r->class_name;
							?> 
                    	  
                    	  <?php endforeach; ?>
                 
                 
                    	  
                    	  
                    	  <?php echo form_open('/admincms/menus/update_main_menu/'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                                                    
                                         <div class="form-group">   
						<label><?php echo lang('Menu Name') ; ?></label>
                                                
						<?php echo form_input(array('name' => 'title','class' => 'form-control spinner', 'id' => 'title', 'placeholder' => 'Title', 'value' => $title)); ?>
                                         </div>
                        
                        
                       <div class="form-group">   
						<label><?php echo lang('URL') ; ?></label>
						<?php echo form_input(array('name' => 'url','class' => 'form-control spinner', 'id' => 'url', 'placeholder' => 'URL', 'value' => $url)); ?>
                       </div>
                 <div class="form-group">   
		<label><?php echo lang('Target') ; ?></label>
                       
						<?php
							 $options=array('_blank'=>'Blank','new'=>'New Windows','_self'=>'Same Page');
								// $Industries  is for selected value
								echo form_dropdown('target', $options , $target );
						?>
                 </div>                        
                        
                       <div class="form-group">   
		<label><?php echo lang('Order') ; ?></label>
						<?php echo form_input(array('name' => 'order','class' => 'form-control spinner', 'id' => 'order', 'placeholder' => 'order', 'value' => $order)); ?>
                       </div>
                 
                        <div class="form-group">   
		<label><?php echo lang('Class Name') ; ?></label>
						<?php echo form_input(array('name' => 'class_name','class' => 'form-control spinner', 'id' => 'class_name', 'placeholder' => 'Class Name', 'value' => $class_name)); ?>
						
                        </div>
                 <div class="form-group">   
                      <label class="rememberme mt-checkbox mt-checkbox-outline">
                   
                    <?php echo form_checkbox('is_active', '1',$is_active); ?> <?php echo lang('Active') ; ?>
                          <span></span>
                            </label>
		</div>
                 
                 	<div class="form-group">   			
                       <input name="mst_menuid" type="hidden" value="<?= $mst_menuid; ?>" />
						<?php echo form_submit(array('name' => 'edit_portfolio','id' => 'edit_portfolio', 'value' => lang('Edit Main Menu'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
                        </div>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes2016/footer.php"); ?>

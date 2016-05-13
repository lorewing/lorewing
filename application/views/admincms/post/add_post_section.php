<?php $this->load->view("admincms/includes2016/top.php"); ?>

	<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Add Section') ; ?> </h3>
                 <hr>
                        </div>
		
		<div id="main_content_section" class="columns large-12 left">
		
			<div id="form_add">
				
                   		<?php echo form_open_multipart('/admincms/post/add_post_section'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                                        <div class="form-group"> 
				  <label><?php echo lang('Title_ar') ; ?></label>
						<?php echo form_input(array('name' => 'section_name_ar', 'id' => 'section_name_ar','class' => 'form-control spinner', 'placeholder' => lang('Title_ar'), 'value' => set_value('section_name_ar'))); ?>
                                        </div>
                             <div class="form-group"> 
                  <label><?php echo lang('Title_en') ; ?></label>
						<?php echo form_input(array('name' => 'section_name_en', 'id' => 'section_name_en', 'class' => 'form-control spinner','placeholder' => lang('Title_en'), 'value' => set_value('section_name_en'))); ?>
                             </div>
                            
                             <div class="form-group"> 
                        <label><?php echo lang('Section_Cover_Image') ; ?></label>
                  <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>

                             </div>
					   
                   <div class="form-group"> 
                  <label><?php echo lang('Desc_ar') ; ?></label>
						<?php echo form_textarea(array('name' => 'section_desc_ar', 'id' => 'section_desc_ar', 'placeholder' => lang('Desc_ar'), 'value' => set_value('section_desc_ar'))); ?>
                   </div>
                             <div class="form-group"> 
                  <label><?php echo lang('Desc_en') ; ?></label>
						<?php echo form_textarea(array('name' => 'section_desc_en', 'id' => 'section_desc_en', 'placeholder' => lang('Desc_en'), 'value' => set_value('section_desc_en'))); ?>
					
                             </div>
                            
                     <div class="form-group"> 
                  <label><?php echo lang('Related Tag') ; ?></label>
						<?php echo form_input(array('name' => 'related_tag', 'id' => 'related_tag','class' => 'form-control spinner', 'placeholder' => lang('Related Tag'), 'value' => set_value('related_tag'))); ?>
                     </div>
                            
                            <div class="form-actions">
						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project','class' => 'btn green uppercase', 'value' => lang('Add Section') ));
						
						echo form_close();
						
						?>
				
                            </div>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes2016/footer.php"); ?>

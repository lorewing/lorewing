<?php $this->load->view("admincms/includes2016/top.php"); ?>

	<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Add Multiple Image') ; ?></h3>
                 <hr>
					
				
                   		<?php  
						
						$attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');
	  					echo form_open_multipart('/admincms/multiple_upload/add_multiple_image',$attributes);


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
						<?php /*?><label>Image Name</label>
						<?php echo form_input(array('name' => 'title', 'id' => 'title', 'placeholder' => 'Media Title', 'value' => set_value('title'))); ?>
						<?php */?>
                        
                       <?php /*?> <label>Media Title English</label>
						<?php echo form_input(array('name' => 'title_en', 'id' => 'title_en', 'placeholder' => 'Media Title English', 'value' => set_value('title_en'))); ?>
						<?php */?>
                        
                            <div class="clearfix"></div>
                              <div class="input-control">
                                   <div class="form-group"> 
                                <label class="control-label" for="typeahead"><?php echo lang('Image'); ?> </label>
                                <div class="input-group input-switch-group"><input type="file" name="userfile[]"  class="" id="userfile" multiple />
                                <?php /*?><button type="button" id="upload" name="upload" class="btn btn-large" style="float: right;">Upload</button><?php */?>
                                 </div>
                                    <div class="form-group"> 
                                <em><?php echo lang('Upload Image text'); ?></em></div> </div>
     					 <div class="clearfix"></div>
						</div>
						 <div class="form-group"> 
						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'Add Images', 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
				</div>
			
			</div>
		
		</div>
	
	</div>
	

<?php $this->load->view("admincms/includes2016/footer.php"); ?>

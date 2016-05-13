<?php $this->load->view("admincms/includes2016/top.php"); ?>  

        	<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Add Media Group') ; ?></h3>
                 <hr>
					
				
                   		<?php echo form_open_multipart('/admincms/media/add_media_group'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                <div class="form-group">  
						<label><?php echo lang('Title_ar') ; ?></label>
						<?php echo form_input(array('name' => 'group_name','class' => 'form-control spinner', 'id' => 'group_name', 'placeholder' => lang('Title_ar'), 'value' => set_value('group_name'))); ?>
			</div>
                                                <div class="form-group">  			
                        <label><?php echo lang('Title_en') ; ?></label>
						<?php echo form_input(array('name' => 'group_name_en', 'id' => 'group_name_en','class' => 'form-control spinner', 'placeholder' => lang('Title_en'), 'value' => set_value('group_name_en'))); ?>
		<div class="form-group">  				
                  <label><?php echo lang('Album Cover Image') ; ?></label>
                  <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>

</div>
<div class="form-group">  
                       <label><?php echo lang('Type') ; ?></label>
                       
						<?php
							 $options=array('image'=>'Image','pdf'=>'PDF','audio'=>'Audio','xls'=>'Excel File','doc'=>'Word file','file'=>'file','video'=>'Video','zip'=>'ZIP File','gallery'=>'Photo Gallery'  );
								// $Industries  is for selected value
								echo form_dropdown('type', $options , 'image' );
						?>
				</div>	   
		<div class="form-group">  			   
                  <label><?php echo lang('Desc_ar') ; ?></label>
						<?php echo form_textarea(array('name' => 'group_desc', 'id' => 'group_desc', 'placeholder' => 'Media Group Description', 'value' => set_value('group_desc'))); ?><br />
<label><?php echo lang('Desc_en') ; ?></label>
						<?php echo form_textarea(array('name' => 'group_desc_en', 'id' => 'group_desc_en', 'placeholder' => 'Media Group Description', 'value' => set_value('group_desc_en'))); ?>
				</div>	
                        <div class="form-group">  
                  <label><?php echo lang('Related Tag') ; ?></label>
						<?php echo form_input(array('name' => 'related_tag','class' => 'form-control spinner', 'id' => 'related_tag', 'placeholder' => lang('Related Tag'), 'value' => set_value('related_tag'))); ?>
			
                            </div>
			<div class="form-group">  
			<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => lang('Add Media Group'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
				
			
			</div>
		
		</div>
	
	</div>
	
	</div>
                    </div>

<?php $this->load->view("admincms/includes2016/footer.php"); ?>

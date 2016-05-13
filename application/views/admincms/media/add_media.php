<?php $this->load->view("admincms/includes2016/top.php"); ?>

		<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Add Media') ; ?></h3>
                 <hr>
				
                   		<?php  
						
						$attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');
	  					echo form_open_multipart('/admincms/media/add_media',$attributes);


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                            <div class="form-group">   
						<label><?php echo lang('Title_ar') ; ?></label>
						<?php echo form_input(array('name' => 'title','class' => 'form-control spinner', 'id' => 'title', 'placeholder' => lang('Title_ar'), 'value' => set_value('title'))); ?>
			</div>
                                                <div class="form-group">   
                        <label><?php echo lang('Title_en') ; ?></label>
						<?php echo form_input(array('name' => 'title_en','class' => 'form-control spinner', 'id' => 'title_en', 'placeholder' => lang('Title_en'), 'value' => set_value('title_en'))); ?>
			</div>
                        <div class="form-group">   			
                        <label><?php echo lang('Upload Image') ; ?></label>
                        <div class="input-group input-switch-group"><input type="file" name="userfile"  class="" id="userfile" multiple />
						<p><?php echo lang('Upload Image text') ; ?></p>
                                     </div>
                        </div>
                                                <div class="form-group">                 
						<label><?php echo lang('Media Group') ; ?></label>
                       		<select name="group_id">
                            <option value=""><?php echo lang('Please Select Your Media Group') ; ?> </option>
                            <?php
                        	$query = $this->db->get('media_group');
							
							
									foreach ($query->result() as $row)
									{?>
										 <option value="<?php echo  $row->group_id;?>"><?php echo  $row->group_name_en;?></option>				
									<?php } // end for each
							?>
							</select>
                                                </div>		   
                   <div class="form-group">  

                       <label><?php echo lang('Type') ; ?></label>
                       
						<?php
							 $options=array('image'=>'Image','pdf'=>'PDF','audio'=>'Audio','xls'=>'Excel File','doc'=>'Word file','file'=>'file','video'=>'Video','zip'=>'ZIP File','gallery'=>'Photo Gallery' );
								// $Industries  is for selected value
								echo form_dropdown('type', $options , 'image' );
						?>
					   
                        </div>
			<div class="form-group">   		   
                  <label><?php echo lang('Desc_ar') ; ?></label>
						<?php echo form_textarea(array('name' => 'desc', 'id' => 'desc', 'placeholder' => lang('Desc_ar'), 'value' => set_value('desc'))); ?>
			</div>			<br />
                        <div class="form-group">   
                        <label><?php echo lang('Desc_en') ; ?></label>
						<?php echo form_textarea(array('name' => 'desc_en', 'id' => 'desc_en', 'placeholder' => lang('Desc_en'), 'value' => set_value('desc_en'))); ?>
			</div>	
                        <div class="form-group">   
                        <label><?php echo lang('Related Tag') ; ?></label>
						<?php echo form_input(array('name' => 'related_tag','class' => 'form-control spinner', 'id' => 'related_tag', 'placeholder' => lang('Related Tag'), 'value' => set_value('related_tag'))); ?>
			</div>
                            <div class="form-group">   			
                         <label><?php echo lang('Video URL') ; ?></label>
                         
                        <?php echo form_input(array('name' => 'video_url','class' => 'form-control spinner', 'id' => 'video_url', 'placeholder' => lang('Video URL'), 'value' => set_value('video_url'))); ?>

			</div>
                        <div class="form-group">   
						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => lang('Add Media'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
				</div>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes2016/footer.php"); ?>
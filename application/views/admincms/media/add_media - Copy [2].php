<?php $this->load->view("admincms/includes/top.php"); ?>

	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
			
		
		</div>
        
        	<div id="content_container" class="row">
		
		
		
		<div id="main_content_section" class="columns large-12 left">
		
			<div id="form_add">
		
				<fieldset>
				
					<legend>Add Media</legend>
					
				
                   		<?php  
						
						$attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');
	  					echo form_open_multipart('/admincms/media/add_media',$attributes);


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
						<label>Media Title Arabic</label>
						<?php echo form_input(array('name' => 'title', 'id' => 'title', 'placeholder' => 'Media Title', 'value' => set_value('title'))); ?>
						
                        <label>Media Title English</label>
						<?php echo form_input(array('name' => 'title_en', 'id' => 'title_en', 'placeholder' => 'Media Title English', 'value' => set_value('title_en'))); ?>
						
                        <label>Upload Image</label>
                        <div class="input-group input-switch-group">
                        <input type="file" multiple name="userfile[]" size="20" />
						<p>Select multiple images use Ctrl + Select Images </p>

						<label>Media Group*</label>
                       		<select name="group_id">
                            <option value=""> Please Select Your Media Group</option>
                            <?
                        	$query = $this->db->get('media_group');
							
							
									foreach ($query->result() as $row)
									{?>
										 <option value="<?= $row->group_id;?>"><?= $row->group_name_en;?></option>				
									<?} // end for each
							?>
							</select>
					   
                  <br />

                       <label>Type*</label>
                       
						<?php
							 $options=array('image'=>'Image','pdf'=>'PDF','audio'=>'Audio','xls'=>'Excel File','doc'=>'Word file','file'=>'file','video'=>'Video','zip'=>'ZIP File' );
								// $Industries  is for selected value
								echo form_dropdown('type', $options , 'image' );
						?>
					   
                        
					   
                  <label>Media Description Arabic</label>
						<?php echo form_textarea(array('name' => 'desc', 'id' => 'desc', 'placeholder' => 'Media Description', 'value' => set_value('desc'))); ?>
						<br />
                        
                        <label>Media Description English</label>
						<?php echo form_textarea(array('name' => 'desc_en', 'id' => 'desc_en', 'placeholder' => 'Media Description', 'value' => set_value('desc_en'))); ?>
				
                        
                        <label><br />
                        Related Tag</label>
						<?php echo form_input(array('name' => 'related_tag', 'id' => 'related_tag', 'placeholder' => 'Industries Arrange', 'value' => set_value('related_tag'))); ?>
						
                         <label>Video URL</label>
                        <?php echo form_input(array('name' => 'video_url', 'id' => 'video_url', 'placeholder' => 'Video URL', 'value' => set_value('video_url'))); ?>

						<br />
						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'add_media', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

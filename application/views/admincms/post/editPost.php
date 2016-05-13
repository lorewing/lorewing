<?php $this->load->view("admincms/includes2016/top.php"); ?>


<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"><?php echo lang('Edit Post'); ?> </h3>
                <?php 
								
								if(!empty($update_record)){
							echo $update_record;
							}
					?> 
                 <hr>
					
					 <?php foreach($rows as $r) : ?>
                    	  <?php 
								$title_ar = $r->title_ar;
								$title_en = $r->title_en;
								$image_name = $r->image_name;
								$section_id = $r->section_id;
								$desc_ar = $r->desc_ar;
								$desc_en = $r->desc_en;
								$active = $r->active;
								$show_on_silder = $r->show_on_silder;
								$related_tag = $r->related_tag;
								$post_id = $r->post_id;
								
							?>
                    	  
                    	  <?php endforeach; ?>
                   		<?php echo form_open_multipart('/admincms/post/update_post'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                            <div class="form-group">
				  <label><?php echo lang('Title_ar') ; ?></label>
						<?php echo form_input(array('name' => 'title_ar', 'id' => 'title_ar', 'class' => 'form-control spinner','placeholder' => 'Title Arabic', 'value' => $title_ar)); ?>
                            </div>
                            
                            <div class="form-group">
                             <label><?php echo lang('Title_en') ; ?></label>
			    <?php echo form_input(array('name' => 'title_en', 'id' => 'title_en',  'class' => 'form-control spinner','placeholder' => 'Title English', 'value' => $title_en)); ?>
                            </div>
                            
                            <div class="form-group">
                                <img src="<?php echo base_url(); ?>private/post/<?= $image_name; ?>" width="250" height="250"></p>
                              <p>
                                <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>
                            </div>
                    <div class="form-group">
                  <label><?php echo lang('Desc_ar') ; ?></label>
						<?php echo form_textarea(array('name' => 'desc_ar','class' => 'ckeditor', 'id' => 'desc_ar', 'placeholder' => 'Description Arabic', 'value' => $desc_ar)); ?>
                    </div>   

		<div class="form-group">				
                  <label><?php echo lang('Desc_en') ; ?></label>
						<?php echo form_textarea(array('name' => 'desc_en','class' => 'ckeditor', 'id' => 'desc_en', 'placeholder' => 'Description English', 'value' => $desc_en)); ?>
					
                </div>
                            
                            <div class="form-group">
				<label><?php echo lang('Section') ; ?></label>
                       		<select name="section_id" class="form-control input-large">
                            <option value=""><?php echo lang('Please Select your Section') ; ?></option>
                            <?php
                        	$query = $this->db->get('post_section');
							
							
									foreach ($query->result() as $row)
									{?>
										 <option value="<?= $row->section_id;?>" <?php if ($row->section_id === $section_id) echo 'selected="selected"'?>><?= $row->section_name_ar;?></option>				
									<?php } // end for each
							?>
							</select>
                            </div>
                     <div class="form-group">
                  <label><?php echo lang('Related Tag') ; ?></label>
		<?php echo form_input(array('name' => 'related_tag', 'id' => 'related_tag',  'class' => 'form-control spinner','placeholder' => 'Industries Arrange', 'value' => $related_tag)); ?>
                          
                          
                     </div>
                             <div class="form-actions">
                             
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                               <?php echo form_checkbox('show_on_silder', '1', $show_on_silder);?><?php echo lang('Show On Slider') ; ?>
                                <span></span>
                            </label>
                                 
                                  <label class="rememberme mt-checkbox mt-checkbox-outline">
                              <?php echo form_checkbox('active', '1', $active);?><?php echo lang('Active') ; ?>
                                <span></span>
                            </label>
                                 
				       <input name="post_id" type="hidden" value="<?=$post_id?>" />
                             </div>        
                                            
				<div class="form-actions">		
                                    <?php echo form_submit(array('name' => 'edit_post','id' => 'edit_post', 'value' => 'Edit Post', 'class' => 'btn green uppercase'));

                                    echo form_close();

                                    ?>
                        
                                </div>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes2016/footer.php"); ?>

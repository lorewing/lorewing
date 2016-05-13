<?php $this->load->view("admincms/includes2016/top.php"); ?>  

        	<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Add Post') ; ?></h3>
                 <hr>
                   		<?php echo form_open_multipart('/admincms/post/add_post'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
				
                                         
                            <div class="form-group">             
                                <label><?php echo lang('Title_ar') ; ?></label>
                                       
				 <?php echo form_input(array('name' => 'title_ar','class' => 'form-control spinner', 'id' => 'title_ar', 'placeholder' =>  lang('Title_ar'), 'value' => set_value('title_ar'))); ?>
                                       
                                       </div>		
                  
                            <div class="form-group">
                                <label><?php echo lang('Title_en'); ?></label>
                                   <?php echo form_input(array('name' => 'title_en','class' => 'form-control spinner', 'id' => 'title_en', 'placeholder' => lang('Title_en'), 'value' => set_value('title_en'))); ?>
                            </div>
                            <div class="form-group">                
                                <label><?php echo lang('Section_Cover_Image') ; ?></label>
                             <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>
                            </div>
                                
                            <div class="form-group">
				<label><?php echo lang('Section'); ?></label>
                       		<select name="section_id" class="form-control input-large">
                            <option value=""><?php echo lang('Please Select your Section'); ?></option>
                            <?php
                        	$query = $this->db->get('post_section');
							

                                    foreach ($query->result() as $row)

                                    {?>
                                             <option value="<?= $row->section_id;?>"><?= $row->section_name_en;?></option>				
                                    <?php } // end for each
				?>
							</select>
                            </div>
                             <div class="form-group">
                                <label><?php echo lang('Desc_ar'); ?></label>
				<?php echo form_textarea(array('name' => 'desc_ar','class'=>'cke_wysiwyg_frame cke_reset', 'id' => 'desc_ar', 'placeholder' => lang('Desc_ar'), 'value' => set_value('desc_ar'))); ?>
                             </div>
                            
                             <div class="form-group">
                                    <label><?php echo lang('Desc_en'); ?></label>
				   <?php echo form_textarea(array('name' => 'desc_en', 'id' => 'desc_en', 'placeholder' => lang('Desc_en'), 'value' => set_value('desc_en'))); ?>
                             </div>	
                    <div class="form-group">     
                        <label><br />
                        <?php echo lang('Related Tag');?></label>
                                    <?php echo form_input(array('name' => 'related_tag','class' => 'form-control spinner', 'id' => 'related_tag', 'placeholder' => 'Industries Arrange', 'value' => set_value('related_tag'))); ?>
                    </div>  
                  				
                         <div class="form-actions">
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" id="show_on_silder" name="show_on_silder" value="1" class="" <?php echo set_checkbox('show_on_silder', '1'); ?>> <?php echo lang('Show On Slider'); ?>
                                <span></span>
                            </label>
                          
			    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" id="active" name="active" value="1" checked="checked" class="md-check" <?php echo set_checkbox('active', '1'); ?>><?php echo lang('Active');?> 
                                <span></span>
                             </label>
                         </div>     
                             
                             <div class="form-actions">
                                  <?php 
                                    echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => lang('Add Post'), 'class' => 'btn green uppercase'));

                                    echo form_close();
                                    
                                  ?>
                  </div>
			</div>
		</div>
	</div>
</div>
  <!-- END CONTENT -->
  
<?php $this->load->view("admincms/includes2016/footer.php"); ?>

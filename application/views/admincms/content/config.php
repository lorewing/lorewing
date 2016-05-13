<?php $this->load->view("admincms/includes2016/top.php"); ?>  

        	<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Site configuration') ; ?></h3>
                 <hr>
						<?php
						
						echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						
						echo form_open('admincms/content/update_configuration/1');
						
						?>
						
                                                <div class="form-group">             
                            <label><?php echo lang('Main Site Title') ; ?></label>
						<?php echo form_input(array('name' => 'site_title','class' => 'form-control spinner', 'id' => 'site_title' , 'placeholder' => 'Main Site Title', 'value' => $site_title )); ?>
						</div>
                 
                                                <div class="form-group">             
                            <label><?php echo lang('Main Company Phone Number') ; ?></label>
						<?php echo form_input(array('name' => 'main_phone','class' => 'form-control spinner', 'id' => 'main_number' , 'placeholder' => 'Main Company Phone Number', 'value' => $main_phone  )); ?>
						</div>
						
                
                                                <div class="form-group">             
                            <label><?php echo lang('Tagline') ; ?></label>
						<?php echo form_input(array('name' => 'tagline','class' => 'form-control spinner', 'id' => 'tagline' , 'placeholder' => 'Tagline', 'value' => $tagline  )); ?>
						</div>
						
                                                <div class="form-group">             
                                 <label><?php echo lang('Main Contact Email Address') ; ?></label>
						<?php echo form_input(array('name' => 'main_contact_email','class' => 'form-control spinner', 'id' => 'contact_email' , 'placeholder' => 'Main Contact Email Address', 'value' => $main_contact_email  )); ?>
						</div>
                 
                                                <div class="form-group">             
                            <label><?php echo lang('Google Analytics') ; ?></label>
						<?php echo form_textarea(array('name' => 'analytics','class' => 'form-control spinner', 'id' => 'google_analytics' , 'placeholder' => 'Google Analytics Code', 'value' => $analytics  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('SEO Keywords') ; ?></label>
						<?php echo form_textarea(array('name' => 'meta_keywords','class' => 'form-control spinner', 'id' => 'meta_keywords' , 'placeholder' => 'Google Analytics Code', 'value' => $meta_keywords  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('SEO Description') ; ?></label>
						<?php echo form_textarea(array('name' => 'meta_description','class' => 'form-control spinner', 'id' => 'meta_description' , 'placeholder' => 'Google Analytics Code', 'value' => $meta_description  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Facebook Account') ; ?></label>
						<?php echo form_input(array('name' => 'facebook_url','class' => 'form-control spinner', 'id' => 'facebook' , 'placeholder' => 'Facebook Account', 'value' => $facebook_url  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Twitter Account') ; ?></label>
						<?php echo form_input(array('name' => 'twitter_url','class' => 'form-control spinner', 'id' => 'twitter' , 'placeholder' => 'Twitter Account', 'value' => $twitter_url  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('LinkedIn Account') ; ?></label>
						<?php echo form_input(array('name' => 'linkedin_url','class' => 'form-control spinner', 'id' => 'linkedin' , 'placeholder' => 'LinkedIn Account', 'value' => $linkedin_url  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('YouTube Account') ; ?></label>
						<?php echo form_input(array('name' => 'youtube_url','class' => 'form-control spinner', 'id' => 'youtube' , 'placeholder' => 'YouTube Account', 'value' => $youtube_url  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Orchid Leasing') ; ?></label>
						<?php echo form_input(array('name' => 'orchid_fb','class' => 'form-control spinner', 'id' => 'orchid_fb' , 'placeholder' => 'ORCHID Leasing Facebook URL', 'value' => $orchid_fb  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Orchid Leasing') ; ?></label>
						<?php echo form_input(array('name' => 'orchid_linkedin','class' => 'form-control spinner', 'id' => 'orchid_linkedin' , 'placeholder' => 'ORCHID Leasing LinkedIn URL', 'value' => $orchid_linkedin  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Mercury CFLA URL') ; ?></label>
						<?php echo form_input(array('name' => 'cfla_url','class' => 'form-control spinner', 'id' => 'cfla_url' , 'placeholder' => 'CFLA URL', 'value' => $cfla_url  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Mercury CAAMP URL') ; ?></label>
						<?php echo form_input(array('name' => 'caamp_url','class' => 'form-control spinner', 'id' => 'caamp_url' , 'placeholder' => 'CAAMP URL', 'value' => $caamp_url  )); ?>
						</div>
                                                <div class="form-group">             
                            <label><?php echo lang('Mercury IMBA URL') ; ?></label>
						<?php echo form_input(array('name' => 'imba_url','class' => 'form-control spinner', 'id' => 'imba_url' , 'placeholder' => 'IMBA URL', 'value' => $imba_url  )); ?>
						</div>
                 
                                                <div class="form-group">             
						<?php
						echo form_submit(array('name' => 'edit_config','id' => 'edit_config', 'value' => lang('Save configuration'), 'class' => 'btn green uppercase'));
						
						echo form_close();
						
						?>
				
                                                </div>			
			</div>
		
		</div>
	
	</div>
    </div>
    

<?php $this->load->view("admincms/includes2016/footer.php"); ?>


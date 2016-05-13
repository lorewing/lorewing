<?php $this->load->view("admincms/includes/top.php"); ?>

	<div id="content_container" class="row">
		
		<div id="side_content" class="columns large-3 right">
		
			<h4>Instructions / Tips</h4>
			
			<p>Change the website's main configuration files.</p>	
			
			<p>Note: These changes are site wide.</p>
		
		</div>
		
		<div id="main_content" class="columns large-9 left">
		
			<div id="form_add">
		
				<fieldset>
				
					<legend>Edit Site Config</legend>
					
						<?php
						
						echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						
						echo form_open('admincms/content/update_configuration/1');
						
						?>
						
						<label>Main Site Title</label>
						<p><?php echo form_input(array('name' => 'site_title', 'id' => 'site_title' , 'placeholder' => 'Main Site Title', 'value' => $site_title )); ?></p>
						
						<label>Main Company Phone Number</label>
						<p><?php echo form_input(array('name' => 'main_phone', 'id' => 'main_number' , 'placeholder' => 'Main Company Phone Number', 'value' => $main_phone  )); ?></p>
						
						<label>Tagline</label>
						<p><?php echo form_input(array('name' => 'tagline', 'id' => 'tagline' , 'placeholder' => 'Tagline', 'value' => $tagline  )); ?></p>
						
						<label>Main Contact Email Address</label>
						<p><?php echo form_input(array('name' => 'main_contact_email', 'id' => 'contact_email' , 'placeholder' => 'Main Contact Email Address', 'value' => $main_contact_email  )); ?></p>
						
						<label>Google Analytics Account (WITHOUT the script tags)</label>
						<p><?php echo form_textarea(array('name' => 'analytics', 'id' => 'google_analytics' , 'placeholder' => 'Google Analytics Code', 'value' => $analytics  )); ?></p>
						
						<label>SEO Keywords (Separate with commas)</label>
						<p><?php echo form_textarea(array('name' => 'meta_keywords', 'id' => 'meta_keywords' , 'placeholder' => 'Google Analytics Code', 'value' => $meta_keywords  )); ?></p>
						
						<label>SEO Description (Site Description)</label>
						<p><?php echo form_textarea(array('name' => 'meta_description', 'id' => 'meta_description' , 'placeholder' => 'Google Analytics Code', 'value' => $meta_description  )); ?></p>
						
						<label>Facebook Account (without http://)</label>
						<p><?php echo form_input(array('name' => 'facebook_url', 'id' => 'facebook' , 'placeholder' => 'Facebook Account', 'value' => $facebook_url  )); ?></p>
						
						<label>Twitter Account (without http://)</label>
						<p><?php echo form_input(array('name' => 'twitter_url', 'id' => 'twitter' , 'placeholder' => 'Twitter Account', 'value' => $twitter_url  )); ?></p>
						
						<label>LinkedIn Account (without http://)</label>
						<p><?php echo form_input(array('name' => 'linkedin_url', 'id' => 'linkedin' , 'placeholder' => 'LinkedIn Account', 'value' => $linkedin_url  )); ?></p>
						
						<label>YouTube Account (without http://)</label>
						<p><?php echo form_input(array('name' => 'youtube_url', 'id' => 'youtube' , 'placeholder' => 'YouTube Account', 'value' => $youtube_url  )); ?></p>
						
						<label>Orchid Leasing Facebook URL (without http://)</label>
						<p><?php echo form_input(array('name' => 'orchid_fb', 'id' => 'orchid_fb' , 'placeholder' => 'ORCHID Leasing Facebook URL', 'value' => $orchid_fb  )); ?></p>
						
						<label>Orchid Leasing LinkedIn URL (without http://)</label>
						<p><?php echo form_input(array('name' => 'orchid_linkedin', 'id' => 'orchid_linkedin' , 'placeholder' => 'ORCHID Leasing LinkedIn URL', 'value' => $orchid_linkedin  )); ?></p>
						
						<label>Mercury CFLA URL (without http://)</label>
						<p><?php echo form_input(array('name' => 'cfla_url', 'id' => 'cfla_url' , 'placeholder' => 'CFLA URL', 'value' => $cfla_url  )); ?></p>
						
						<label>Mercury CAAMP URL (without http://)</label>
						<p><?php echo form_input(array('name' => 'caamp_url', 'id' => 'caamp_url' , 'placeholder' => 'CAAMP URL', 'value' => $caamp_url  )); ?></p>
						
						<label>Mercury IMBA URL (without http://)</label>
						<p><?php echo form_input(array('name' => 'imba_url', 'id' => 'imba_url' , 'placeholder' => 'IMBA URL', 'value' => $imba_url  )); ?></p>
						
						<?php
						echo form_submit(array('name' => 'edit_config','id' => 'edit_config', 'value' => 'Save', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
    
    

<?php $this->load->view("admincms/includes/footer.php"); ?>

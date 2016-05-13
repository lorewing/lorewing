<?php $this->load->view("admincms/includes/top.php"); ?>

	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
			
		
		</div>
        
        	<div id="content_container" class="row">
		
		
		
		<div id="main_content_section" class="columns large-12 left">
		
			<div id="form_add">
		
				<fieldset>
				
					<legend>Add Main Menu</legend>
					
				
                   		<?php echo form_open('/admincms/add_menu/main_menu'); ?>

                        <?php echo $this->session->flashdata('menu_added'); ?>	
						<?php echo validation_errors('<p class=\'error\'>'); ?>
						
						<label>Link Name</label>
						<?php echo form_input(array('name' => 'link_name', 'id' => 'link_name', 'placeholder' => 'Link Name', 'value' => set_value('link_name'))); ?>
						
                        <label>URL</label>
						<?php echo form_input(array('name' => 'url_link', 'id' => 'url_link', 'placeholder' => 'URL', 'value' => set_value('url_link'))); ?>
						
                        <label>Icon Name</label>
						<?php echo form_input(array('name' => 'icon_name', 'id' => 'icon_name', 'placeholder' => 'Icon Name', 'value' => set_value('icon_name'))); ?>
						
                        <label>Arrange</label>
						<?php echo form_input(array('name' => 'arrange', 'id' => 'arrange', 'placeholder' => 'Arrange', 'value' => set_value('arrange'))); ?>
						
						
						<label>Class Name</label>
						<?php echo form_input(array('name' => 'class_name', 'id' => 'class_name' , 'placeholder' => 'Class Name', 'value' => set_value('class_name'))); ?>
						
                        <input name="active" value="1" type="checkbox" checked="checked" /> <label>Active Menu?</label>

						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'Add Main Menu', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

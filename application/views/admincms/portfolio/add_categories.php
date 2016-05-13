<?php $this->load->view("admincms/includes/top.php"); ?>

	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
			
		
		</div>
        
        	<div id="content_container" class="row">
		
		
		
		<div id="main_content_section" class="columns large-12 left">
		
			<div id="form_add">
		
				<fieldset>
				
					<legend>Add Categories</legend>
					
				
                   		<?php echo form_open_multipart('/admincms/portfolio/add_categories'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
						<label>Category Name</label>
						<?php echo form_input(array('name' => 'category_name', 'id' => 'category_name', 'placeholder' => 'Category Name', 'value' => set_value('category_name'))); ?>
						
                         <label>Category Description</label>
						<?php echo form_textarea(array('name' => 'content', 'id' => 'content', 'placeholder' => 'Category Description', 'value' => set_value('content'))); ?>
					
                    
                        <label>Sort By</label>
                       		<select name="sort_by_cat">
                            <option value="">Sort By</option>
                              
                            <option value="TRADITIONAL" dir="ltr">TRADITIONAL</option>
                            <option value="DIGITAL" dir="ltr">DIGITAL</option>
                            <option value="INTEGRATED" dir="ltr">INTEGRATED</option>

							</select>
					   
					
                         <label>Arrange</label>
						<?php echo form_input(array('name' => 'arrange', 'id' => 'arrange', 'placeholder' => 'Arrange', 'value' => set_value('arrange'))); ?>
						
                        
						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'Add Categories', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

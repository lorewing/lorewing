<?php $this->load->view("admincms/includes/top.php"); ?>

	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
			
		
		</div>
        
        	<div id="content_container" class="row">
		
		
		
		<div id="main_content_section" class="columns large-12 left">
		<?php 
								
								if(!empty($update_record)){
							echo $update_record;
							}
					?> 
                    
			<div id="form_add">
		
				<fieldset>
				
					<legend>Edit Categories</legend>
					
				
                   		<?php echo form_open_multipart('/admincms/portfolio/update_categories'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                        
						 <?php foreach($rows as $r) : ?>
                    	  <?php 
								$category_id= $r->category_id;
								$category_name = $r->category_name;
								$content = $r->content;
								$sort_by_cat = $r->sort_by_cat;
								$arrange = $r->arrange;
							?>
                    	  
                    	  <?php endforeach; ?>
		
						<label>Category Name</label>
						<?php echo form_input(array('name' => 'category_name', 'id' => 'category_name', 'placeholder' => 'Category Name', 'value' => $category_name)); ?>
						
                         <label>Category Description</label>
						<?php echo form_textarea(array('name' => 'content', 'id' => 'content', 'placeholder' => 'Category Description', 'value' => $content)); ?>
					
                    
                        <label>Sort By</label>
                       		<select name="sort_by_cat">
                            <option value="">Sort By</option>  
                           <option value="TRADITIONAL" <?php if ($sort_by_cat === "TRADITIONAL") echo 'selected="selected"'?> dir="ltr">TRADITIONAL</option>
                            <option value="DIGITAL" <?php if ($sort_by_cat === "DIGITAL") echo 'selected="elected"'?> dir="ltr">DIGITAL</option>
                            <option value="INTEGRATED" <?php if ($sort_by_cat === "INTEGRATED") echo 'selected="selected"'?> dir="ltr">INTEGRATED</option>
 						</select>
					   
					
                         <label>Arrange</label>
						<?php echo form_input(array('name' => 'arrange', 'id' => 'arrange', 'placeholder' => 'Arrange', 'value' => $arrange)); ?>
						
                         <input name="category_id" type="hidden" value="<?=$category_id?>" />

						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'Update Categories', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

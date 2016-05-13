<?php $this->load->view("admincms/includes/top.php"); ?>

	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
			
		
		</div>
        
        	<div id="content_container" class="row">
		
		
		
		<div id="main_content_section" class="columns large-12 left">
		
			<div id="form_add">
		
				<fieldset>
				
					<legend>Add Portfolio</legend>
					
				
                   		<?php echo form_open_multipart('/admincms/portfolio/add_portfolio'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
						<label>Portfolio Title</label>
						<?php echo form_input(array('name' => 'product_title', 'id' => 'product_title', 'placeholder' => 'Portfolio Title', 'value' => set_value('product_title'))); ?>
						
                        
                        <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>


                        <label>Category</label>
                       		<select name="category_id">
                            <option value=""> Please Select your category</option>
                            <?
                        	$query = $this->db->get('category');
							
							
									foreach ($query->result() as $row)
									{?>
										 <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>				
									<?} // end for each
							?>
							</select>
					   
					   
                  <label>Portfolio Description</label>
						<?php echo form_textarea(array('name' => 'product_desc', 'id' => 'product_desc', 'placeholder' => 'Portfolio Description', 'value' => set_value('product_desc'))); ?>
						
                         <label>Industries</label>
						<?php
							$options = array(
								  ''  => 'Select Industries',
								  'RETAIL'  => 'RETAIL',
								  'CPG'    => 'CPG',
								  'FOOD_SERVICE'   => 'FOOD_SERVICE',
								  'APPLIANCES' => 'APPLIANCES',
								  'B2B'  => 'B2B',
								  'NON_PROFIT'    => 'NON PROFIT',
								  'FOOD_SERVICE'   => 'FOOD_SERVICE',
								  'PROFESSIONAL_SERVICES' => 'PROFESSIONAL SERVICES',
								  'REAL_ESTATE'   => 'REAL ESTATE',
								  'OTHER' => 'OTHER',
								);
								
								
								echo form_dropdown('Industries', $options);
						
						?>
                        <label>Industries Arrange</label>
						<?php echo form_input(array('name' => 'Industries_arrange', 'id' => 'Industries_arrange', 'placeholder' => 'Industries Arrange', 'value' => set_value('Industries_arrange'))); ?>
						
						<?php
						
						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'Add Portfolio', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

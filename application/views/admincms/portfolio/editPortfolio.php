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
				
					<legend>Edit Portfolio - </legend>
						
					
						
                    
                    	<p>
                    	  <?php foreach($rows as $r) : ?>
                    	  <?php 
								$product_title = $r->product_title;
								$product_image = $r->product_image;
								$product_desc = $r->product_desc;
								$category_id2 = $r->category_id;
								$Industries = $r->Industries;
								$Industries_arrange = $r->Industries_arrange;
								$p_id = $r->p_id;
								
							?>
                    	  
                    	  <?php endforeach; ?>
                    	  
                    	  
                    	  <?php echo form_open_multipart('/admincms/portfolio/update_portfolio/'); 


                        echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
						?>
                    	  <input name="p_id" type="hidden" value="<?=$p_id?>" />
                    	  <label>Portfolio Title</label>
                    	  <?php echo form_input(array('name' => 'product_title', 'id' => 'product_title', 'placeholder' => 'Portfolio Title', 'value' => $product_title )); ?>
                    	  
                   	  <img src="<?php echo base_url(); ?>files/<?= $product_image; ?>" width="250" height="250"></p>
                    	<p>
                    	  <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>
                    	  
                    	  
                    	  <label>Category</label>
                    	  <select name="category_id">
                    	    <option value=""> Please Select your category</option>
                    	    <?
                        	$query = $this->db->get('category');
							
							
									foreach ($query->result() as $row)
									{?>
                    	    <option value="<?= $row->category_id;?>" <?php if ($row->category_id === $category_id2) echo 'selected="selected"'?>>
                   	        <?= $row->category_name;?>
                   	        </option>				
                    	    <?} // end for each
							?>
                   	      </select>
                    	  
                    	  
                    	  <label>Portfolio Description</label>
                    	  <?php echo form_textarea(array('name' => 'product_desc', 'id' => 'product_desc', 'placeholder' => 'Portfolio Description', 'value' => $product_desc)); ?>
                    	  
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
								
								// $Industries  is for selected value
								echo form_dropdown('Industries', $options, $Industries );
						
						?>
                    	  <label>Industries Arrange</label>
                  	  </p>
						<?php echo form_input(array('name' => 'Industries_arrange', 'id' => 'Industries_arrange', 'placeholder' => 'Industries Arrange', 'value' => $Industries_arrange)); ?>
						
						<?php echo form_submit(array('name' => 'edit_portfolio','id' => 'edit_portfolio', 'value' => 'Edit Portfolio', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
	
	</div>

<?php $this->load->view("admincms/includes/footer.php"); ?>

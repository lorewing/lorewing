<?php $this->load->view("admincms/includes/top.php"); ?>

			<div class="row" id='admin_section'>
				
    <div id="content_container" class="row">
		
		<div class="columns large-12">
			
			<ul class="no-bullet inline-list" id="manage_nav">
				<li><a href="<?php echo base_url(); ?>admincms/portfolio/add_categories/"><img src="<?php echo base_url(); ?>admin_view/images/icons/add.png"><span>Add Categories</span></a></li>
			</ul>	
			
			<?php echo $this->session->flashdata('user_updated'); ?>
			
			<?php echo form_open('/admincms/portfolio/update_cat2'); ?>
			<table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th>Category Name</th>
                	<th>Sort By</th>
                    <th>Arrange</th>
                    <th>Update Arrange</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
							<?php 
							if(!empty($categories))
							{
							foreach($categories as $row) : ?>
		           <tr>
						
                        <td><?php echo $row->category_name; ?></td>
                         <td><?php echo $row->sort_by_cat; ?></td>
                         <td><?php echo $row->arrange; ?></td>
						
<?php /*?>						 <td><?php echo form_input(array('arrange' => 'arrange', 'style'=> 'width:27%', 'id' => 'arrange', 'placeholder' => 'Category Arrange', 'name'  => $row->category_id , 'value'=> $row->arrange)); ?></td>
<?php */?>                     

						<td><input type='text' name='arrange[<? echo $row->category_id ?>] ' size='3' dir="ltr" value="<? echo $row->arrange ?>" style="border-style: double; border-width: 3">  </td> 
                        <td><a href="<?= base_url('admincms/portfolio/edit_categories/'.encodeId($row->category_id));?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/portfolio/delete_categories/'.encodeId($row->category_id));?>"> Delete </a></td>
                        
                        <input name="category_id" type="hidden" value="<?= $row->category_id ?>" />
					</tr>
										
					</tr>
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
                    
				<p>
				<?php
						
						echo form_submit(array('name' => 'arrange_cat','id' => 'arrange_cat', 'value' => 'Update Arrange Categories', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
		</div>
	
	</div>

<script src="<?= base_url(); ?>admin_view/js/jquery.dataTables.min.js"></script>
<script>		
$(document).ready(function() {
	$('#example').dataTable();
} );

</script>
 
    
    
<?php $this->load->view("admincms/includes/footer.php"); ?>

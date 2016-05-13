<?php $this->load->view("admincms/includes/top.php"); ?>

			<div class="row" id='admin_section'>
				
    <div id="content_container" class="row">
		
		<div class="columns large-12">
			
			<ul class="no-bullet inline-list" id="manage_nav">
				<li><a href="<?php echo base_url(); ?>admincms/portfolio/bti_portfolio/add_portfolio"><img src="<?php echo base_url(); ?>admin_view/images/icons/add.png"><span>Add Product</span></a></li>
			</ul>	
			
			<?php echo $this->session->flashdata('user_updated'); ?>
			
		<table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th></th>
                	<th>Registrants Name</th>
                    <th>Registrants Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
							<?php 
							if(!empty($products))
							{
							foreach($products as $product) : ?>
		           <tr>
						<td><img src="<?php echo base_url(); ?>files/<?= $product->product_image; ?>" width="56" height="57"></td>
                        <td><?php echo $product->product_title; ?></td>
						<td><?php echo form_input(array('arrange' => 'arrange', 'style'=> 'width:27%', 'id' => 'arrange', 'placeholder' => 'Arrange', 'value'=> $product->arrange)); ?></td>

                        <td><a href="<?= base_url('admincms/portfolio/edit_portfolio/'.$product->p_id);?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/portfolio/delete_portfolio/'.$product->p_id);?>"> Delete </a></td>
					</tr>
										
					</tr>
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
		
		</div>
	
	</div>

<script src="<?= base_url(); ?>admin_view/js/jquery.dataTables.min.js"></script>
<script>		
$(document).ready(function() {
	$('#example').dataTable();
} );

</script>
 
    
    
<?php $this->load->view("admincms/includes/footer.php"); ?>

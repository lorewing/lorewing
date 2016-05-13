<?php $this->load->view("admincms/includes/top.php"); ?>

			<div class="row" id='admin_section'>
				
    <div id="content_container" class="row">
		
		<div class="columns large-12">
			
			<ul class="no-bullet inline-list" id="manage_nav">
				<li><a href="<?php echo base_url(); ?>admincms/portfolio/add_portfolio/"><img src="<?php echo base_url(); ?>admin_view/images/icons/add.png"><span>Add Portfolio</span></a></li>
			</ul>	
			
			<?php echo $this->session->flashdata('user_updated'); ?>
			
		<table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th></th>
                	<th>Portfolio Title</th>
                    <th>Arrange</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
							<?php 
							if(!empty($Industries))
							{
							foreach($Industries as $row) : ?>
		           <tr>
						<td><img src="<?php echo base_url(); ?>files/<?= $row->product_image; ?>" width="56" height="57"></td>
                        <td><?php echo $row->product_title; ?></td>
						<td><?php echo form_input(array('Industries_arrange' => 'Industries_arrange', 'style'=> 'width:27%', 'id' => 'Industries_arrange', 'placeholder' => 'Industries Arrange', 'value'=> $row->Industries_arrange)); ?></td>

                        <td><a href="<?= base_url('admincms/portfolio/edit_portfolio/'.encodeId($row->p_id));?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/portfolio/delete_portfolio/'.encodeId($row->p_id));?>"> Delete </a></td>
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

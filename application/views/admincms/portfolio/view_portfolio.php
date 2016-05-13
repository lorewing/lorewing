<?php $this->load->view("admincms/includes/top.php"); ?>

			<div class="row" id='admin_section'>
				
    <div id="content_container" class="row">
		
		<div class="columns large-12">
			
			<ul class="no-bullet inline-list" id="manage_nav">
				<li><a href="<?php echo base_url(); ?>admincms/portfolio/add_portfolio/"><img src="<?php echo base_url(); ?>admin_view/images/icons/add.png"><span>Add Portfolio</span></a></li>
			</ul>	
			
			<?php echo $this->session->flashdata('user_updated'); ?>
			
          <?php 
		  
		  $attributes = array('class' => 'email', 'id' => 'frm1');
		  echo form_open('/admincms/portfolio/update_portfolio_arrange',$attributes); ?>

		<table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                    <th></th>
                	<th>Portfolio Title</th>
                    <th>Category Name</th>
                    <!-- <th>Sort By</th>-->
                    <th>Arrange</th>
                   <th>Arrange</th>
                  
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
							<?php 
							if(!empty($portfolio))
							{
							foreach($portfolio as $row) : ?>
		           <tr>
                   <td><input type="checkbox" name="contentid[<?= $row->p_id;?>]" value="<?= $row->p_id;?>"></td>
						<td><img src="<?php echo base_url(); ?>files/<?= $row->product_image; ?>" width="56" height="57"></td>
                        <td><?php echo $row->product_title; ?></td>
                        <td><?php echo $row->category_name; ?></td>	
                        <?php /*?><td><?php echo $row->sort_by_cat; ?></td><?php */?>
                        <td><?php echo $row->Industries_arrange; ?></td>
                        	
                        
                        
<?php /*?>						<td><?php echo form_input(array('Industries_arrange' => 'Industries_arrange', 'style'=> 'width:27%', 'id' => 'Industries_arrange', 'placeholder' => 'Industries Arrange', 'value'=> $row->Industries_arrange)); ?></td>
<?php */?>					

						
                        <td><input type='text' name='arrange[<? echo $row->p_id ?>] ' size='3' dir="ltr" value="<? echo $row->Industries_arrange ?>" style="border-style: double; border-width: 3">  </td> 
						
                        <td><a href="<?= base_url('admincms/portfolio/edit_portfolio/'.encodeId($row->p_id));?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/portfolio/delete_portfolio/'.encodeId($row->p_id));?>"> Delete </a></td>
                        
                       <input name="p_id" type="hidden" value="<?= $row->p_id ?>" />

					</tr>
										
					</tr>
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
                                   <br />
		
        <?php
						
						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Update Arrange', 'class' => 'button radius right small'));
						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Delete Selected portfolio', 'class' => 'button radius right small','onclick'=>"return con('Are you sure you want to delete the selected portfolio?')"));

						echo form_close();
						
						?>
		</div>
	
	</div>

<script src="<?= base_url(); ?>admin_view/js/jquery.dataTables.min.js"></script>
<script>		
$(document).ready(function() {
	$('#example').dataTable();
} ); //end ready functions

checked=false;
function checkedAll (frm1) {var aa= document.getElementById('frm1'); if (checked == false)
{
checked = true
}
else
{
checked = false
}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
} // end checkedAll functions

function con(message) {
 var answer = confirm(message);
 if (answer) {
  return true;
 }

 return false;
} //end con functions
</script>
 
    
    
<?php $this->load->view("admincms/includes/footer.php"); ?>

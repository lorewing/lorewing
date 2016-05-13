<?php $this->load->view("admincms/includes2016/header.php"); ?>
<?php $this->load->view("admincms/includes2016/top-menu.php"); ?>
<?php $this->load->view("admincms/includes2016/sidebar.php"); ?>
<?php $this->load->view("admincms/includes2016/top.php"); ?>


			
                    
                    <div class="row">
                  
                      <div class="col-md-12">
			
			<ul class="no-bullet inline-list" id="manage_nav">
				<li><a href="<?php echo base_url(); ?>admincms/post/add_post/"><img src="<?php echo base_url(); ?>admin_view/images/icons/add.png"><span>Add Post</span></a></li>
			</ul>	
			
			<?php echo $this->session->flashdata('user_updated'); ?>
			
          <?php 
		  
		  $attributes = array('class' => 'email', 'id' => 'frm1');
		  echo form_open('/admincms/post/update_post_arrange',$attributes); ?>

		<table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                    <th><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                    <th></th>
                	<th>Post Title Ar</th>
                    <th>Post Title En</th>
                    <th>Category Name Ar</th>
                      <th>Category Name En</th>
                    
                  
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
							<?php 
							if(!empty($post))
							{
							foreach($post as $row) : ?>
		           <tr>
                   <td><input type="checkbox" name="contentid[<?= $row->post_id;?>]" value="<?= $row->post_id;?>"></td>
						<td><img src="<?php echo base_url(); ?>/private/post/<?= $row->image_thumb; ?>" width="140" height="100"></td>
                        <td><?php echo $row->title_ar; ?></td>
                         <td><?php echo $row->title_en; ?></td>
                        <td><?php echo $row->section_name_ar; ?></td>	
                         <td><?php echo $row->section_name_en; ?></td>
                       
                        <td><a href="<?= base_url('admincms/post/edit_post/'.$row->post_id);?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/post/delete_post/'.$row->post_id);?>"> Delete </a></td>
                        
                       <input name="post_id" type="hidden" value="<?= $row->post_id ?>" />

					</tr>
										
					</tr>
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
                                   <br />
		
        <?php
						
/*						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Update Arrange', 'class' => 'button radius right small'));
*/						
						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Delete Selected post', 'class' => 'button radius right small','onclick'=>"return con('Are you sure you want to delete the selected post?')"));

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
 
    
    
<?php $this->load->view("admincms/includes/footer2.php"); ?>

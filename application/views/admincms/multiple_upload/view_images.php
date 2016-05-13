<?php $this->load->view("admincms/includes2016/top.php"); ?>



 <h3 class="page-title"><?php echo lang('View All Images') ; ?> </h3>
 <hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                  
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i><?php echo lang('View All Images') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    <?php echo $this->session->flashdata('user_updated'); ?>
			
          <?php 
		  
		  $attributes = array('class' => 'email', 'id' => 'frm1');
                         echo form_open('admincms/multiple_upload/delete_selected_images',$attributes); ?>
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all"><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                                                <th class="all"><?php echo lang('Image Picture'); ?></th>
                                                <th class="all"><?php echo lang('Image Name'); ?></th>
                                                <th class="all"><?php echo lang('Delete'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                  	
							<?php 
							if(!empty($rows))
							{
							foreach($rows as $row) : ?>
		           <tr>
                   <td><input type="checkbox" name="imageid[<?= $row->image_id;?>]" value="<?= $row->image_id;?>"></td>
                     
                      <?php  
					 	$src2='http://bti-interactive.com/test/multi_upload/private/media/09bf4e9163e8fcc573df5a1693708e25.jpg';
					  $src= base_url() .'private/images/'. $row->image_name;
					  $Image_source = getImageResizePath($src,200,140);
					  
					   ?>
                   <td><img src="<?php echo $Image_source ?>"></td>
                   <td><?php echo $src; ?></td>
                   
                   <?php /*?> <td><?= $row->image_name;?></td><?php */?>
                        	
                        
                        
<?php /*?>						<td><?php echo form_input(array('Industries_arrange' => 'Industries_arrange', 'style'=> 'width:27%', 'id' => 'Industries_arrange', 'placeholder' => 'Industries Arrange', 'value'=> $row->Industries_arrange)); ?></td>
<?php */?>					

						
						
					    <td><a href="<?= base_url('admincms/multiple_upload/delete_images/'.encodeId($row->image_id));?>"> Delete </a></td>
                        
                       <input name="image_id" type="hidden" value="<?= $row->image_id ?>" />

					</tr>
										
					</tr>
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
                                   </table>
                                   <br />
		<div class="form-actions">
                <?php
						
/*						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Update Arrange', 'class' => 'button radius right small'));
*/						
						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => lang('Delete Selected Image'), 'class' => 'btn green uppercase','onclick'=>"return con('Are you sure you want to delete the selected post?')"));

						echo form_close();
						
						?>
                                </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                    </div>
            
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
    
<?php $this->load->view("admincms/includes2016/footer.php"); ?>

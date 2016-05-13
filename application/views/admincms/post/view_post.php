<?php $this->load->view("admincms/includes2016/top.php"); ?>
 <h3 class="page-title"><?php echo lang('View Edit Post') ; ?> </h3>
  <hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                  
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i><?php echo lang('View Edit Post') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    <?php echo $this->session->flashdata('user_updated'); ?>
			
          <?php 
		  
		  $attributes = array('class' => 'email', 'id' => 'frm1');
		  echo form_open('/admincms/post/update_post_arrange',$attributes); ?>
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all"><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                                                <th class="desktop"><?php echo lang('Picture'); ?></th>
                                                <th class="all"><?php echo lang('Post Title Ar'); ?></th>
                                                <th class="all"><?php echo lang('Post Title En'); ?></th>
                                                <!-- <th class="min-phone-l">Post Title Ar</th>-->
                                                <!-- <th class="min-tablet">Category Name En</th>-->
                                                <th class="none"><?php echo lang('Category Name En'); ?></th>
                                                <th class="all"><?php echo lang('Edit'); ?></th>
                                                <th class="all"><?php echo lang('Delete'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
							if(!empty($post))
							{
							foreach($post as $row) : ?>
		           <tr>
                   <td><input type="checkbox" name="contentid[<?= $row->post_id;?>]" value="<?= $row->post_id;?>"></td>
                        <td class="hidden-sm hidden-xs"><img src="<?php echo base_url(); ?>/private/post/<?= $row->image_thumb; ?>" class="responsive" width="140" height="100"></td>
                        <td><?php echo $row->title_ar; ?></td>
                         <td><?php echo $row->title_en; ?></td>
                         <td><?php echo $row->section_name_en; ?></td>
                       
                        <td><a href="<?= base_url('admincms/post/edit_post/'.$row->post_id);?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/post/delete_post/'.$row->post_id);?>"> Delete </a></td>
                        
                       <input name="post_id" type="hidden" value="<?= $row->post_id ?>" />

					</tr>
			
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
                                   <br />
		<div class="form-actions">
                <?php
						
/*						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Update Arrange', 'class' => 'button radius right small'));
*/						
						echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => lang('Delete Selected post'), 'class' => 'btn green uppercase','onclick'=>"return con('Are you sure you want to delete the selected post?')"));

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

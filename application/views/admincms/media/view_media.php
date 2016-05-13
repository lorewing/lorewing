<?php $this->load->view("admincms/includes2016/top.php"); ?>



 <h3 class="page-title"><?php echo lang('View Media') ; ?> 
      <hr>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                  
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i><?php echo lang('View Media') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    
			
			<?php echo $this->session->flashdata('user_updated'); ?>
			
          <?php 
		  
		  $attributes = array('class' => 'email', 'id' => 'frm1');
		  echo form_open('/admincms/media/delete_selected_media',$attributes); ?>

		      <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                                                <th class="desktop"><?php echo lang('Picture'); ?></th>
                                                <th class="all"><?php echo lang('Media Title'); ?></th>
                                                <th class="all"><?php echo lang('Category Name En'); ?></th>
                                                <th class="all"><?php echo lang('Media Type'); ?></th>
                                                <th class="all"><?php echo lang('Edit'); ?></th>
                                                <th class="all"><?php echo lang('Delete'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
							<?php 
							if(!empty($media))
							{
							foreach($media as $row) : ?>
		           <tr>
                                <td><input type="checkbox" name="media_count[<?php echo $row->media_id;?>]" value="<?php echo $row->media_id;?>"></td>
                                <td><img src="<?php echo base_url(); ?>private/media/<?= $row->media_thumb; ?>" width="56" height="57"></td>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->group_name; ?></td>	
                                <td><?php echo $row->type; ?></td>
                                <td><a href="<?= base_url('admincms/media/edit_media/'.encodeId($row->media_id));?>"> Edit </a></td>
                                                    <td><a href="<?= base_url('admincms/media/delete_media/'.encodeId($row->media_id));?>"> Delete </a></td>

                               <input name="media_id" type="hidden" value="<?php echo $row->media_id ?>" />

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

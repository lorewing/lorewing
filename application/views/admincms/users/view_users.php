<?php $this->load->view("admincms/includes2016/top.php"); ?>



 <h3 class="page-title"><?php echo lang('View Users') ; ?> 
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
                                        <i class="fa fa-globe"></i><?php echo lang('View Users') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    
                                
			<?php echo $this->session->flashdata('user_updated'); ?>
			
               
                      <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all"><?php echo lang('First Name'); ?></th>
                                                <th class="all"><?php echo lang('Last Name'); ?></th>
                                                <th class="all"><?php echo lang('User Name'); ?></th>
                                                <th class="all"><?php echo lang('User Email'); ?></th>
                                                 <th class="all"><?php echo lang('Permissions'); ?></th>
                                                  <th class="all"><?php echo lang('Active'); ?></th>
                                                <th class="all"><?php echo lang('Edit'); ?></th>
                                                <th class="all"><?php echo lang('Delete'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                  	
							<?php 
							if(!empty($users))
							{
							foreach($users as $row) : ?>
		           <tr>
                        <td><?php echo $row->user_first_name; ?></td>
                        <td><?php echo $row->user_last_name; ?></td>	
                        <td><?php echo $row->username; ?></td>
                        <td><?php echo $row->user_email; ?></td>
                        <td><?php echo $row->role; ?></td>
                         <td><?php 
						 if ($row->active==1){
							 echo "Yes";
							 }else{
								 	echo "No";
								 } ?></td>
                        	
                        
                        <td><a href="<?= base_url('admincms/users/edit_users/'.encodeId($row->user_id));?>"> Edit </a></td>
                        <td><a href="<?= base_url('admincms/users/delete_users/'.encodeId($row->user_id));?>"> Delete </a></td>

                        
                       <input name="user_id" type="hidden" value="<?= $row->user_id ?>" />

					</tr>
										
					</tr>
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </tbody>
                                   </table>
                            
		
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

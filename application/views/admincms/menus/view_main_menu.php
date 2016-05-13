<?php $this->load->view("admincms/includes2016/top.php"); ?>
 <h3 class="page-title"><?php echo lang('View Main Menu') ; ?> </h3>
 <hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                  
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i><?php echo lang('View Main Menu') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
			<?php echo $this->session->flashdata('user_updated'); ?>
			
			<?php 
                             $attributes = array('class' => 'email', 'id' => 'frm1');
                             echo form_open('/admincms/menus/update_main_menu_order',$attributes); ?>
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                                                <th class="all"><?php echo lang('Menu Name'); ?></th>
                                                <th class="all"><?php echo lang('URL'); ?></th>
                                                <th class="all"><?php echo lang('Active'); ?></th>
                                                 <th class="all"><?php echo lang('Order');?></th>
                                                 <th class="all"><?php echo lang('Order Arrange');?></th>
                                                <th class="all"><?php echo lang('Edit'); ?></th>
                                                <th class="all"><?php echo lang('Delete'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
               
                  	
							<?php 
							if(!empty($mani_menu))
							{
							foreach($mani_menu as $row) : ?>
		           <tr>
                        <td><input type="checkbox" name="contentid[<?php echo $row->mst_menuid;?>]" value="<?php echo $row->mst_menuid;?>"></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->url; ?></td>
                        <td><?php 
						 if($row->is_active==1)
						 {
							 echo "Yes";
							}else{
									echo "No" ;
								}?></td>
                         <td><?php echo $row->order; ?></td>
						
                 

						<td><input type='text' name='arrange[<?php echo $row->mst_menuid ?>] ' size='3' dir="ltr" value="<?php echo $row->order ?>" style="border-style: double; border-width: 3">  </td> 
                        <td><a href="<?php echo base_url('admincms/menus/edit_main_menu/'.encodeId($row->mst_menuid));?>"> Edit </a></td>
					    <td><a href="<?= base_url('admincms/menus/delete_main_menu/'.encodeId($row->mst_menuid));?>"> Delete </a></td>
                        
                        <input name="mst_menuid" type="hidden" value="<?php echo $row->mst_menuid ?>" />
                        
					</tr>
					
                    
                    <?php endforeach; 
					
							}
							?>
					                   
                  </tbody>
                                   </table>
                    
				<br/>
				<?php
						
						echo form_submit(array('name' => 'arrange_cat','id' => 'arrange_cat', 'value' => 'Update Menu Order', 'class' => 'btn green uppercase'));
						
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
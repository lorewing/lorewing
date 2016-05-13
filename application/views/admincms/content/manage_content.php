<?php $this->load->view("admincms/includes2016/top.php"); ?>
 <h3 class="page-title"><?php echo lang('View Edit Content') ; ?> </h3>
  <hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                  
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i><?php echo lang('View Edit Content') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    <?php echo $this->session->flashdata('user_updated'); ?>
						<?php 

						$attributes = array('class' => 'email', 'id' => 'frm1');
                                                echo form_open('/admincms/content/delete_all_content', $attributes); ?>


                      <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all"><input type="checkbox" name="checkall" onclick="checkedAll();"></th>
                                                <th class="desktop"><?php echo lang('ID'); ?></th>
                                                <th class="all"><?php echo lang('Title'); ?></th>
                                                <th class="all"><?php echo lang('Arabic Link'); ?></th>
                                                <!-- <th class="min-phone-l">Post Title Ar</th>-->
                                                <!-- <th class="min-tablet">Category Name En</th>-->
                                                <th class="none"><?php echo lang('English Link'); ?></th>
                                                  <th class="none"><?php echo lang('Content'); ?></th>
                                                <th class="all"><?php echo lang('Edit'); ?></th>
                                                <th class="all"><?php echo lang('Delete'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                  	

							<?php 

							if(!empty($manage_content))

							{

							foreach($manage_content as $row) : ?>

		           

						

                        <tr>

				    		<td><input type="checkbox" name="contentid[<?= $row->id;?>]" value="<?= $row->id;?>"></td>

				    		<td><?php echo $row->id; ?></td>

				    		<td><?php echo $row->title; ?></td>

				    		<td><a href="<?= base_url()?>home/pages/<?php echo $row->id; ?>" target="_blank">home/pages/<?php echo $row->id; ?> </a></td>
<td><a href="<?= base_url()?>home/pages_en/<?php echo $row->id; ?>" target="_blank">home/pages_en/<?php echo $row->id; ?> </a></td>
				    		<td><?php echo strip_tags(word_limiter($row->content, 5)); ?></td>

				    		<td><a href="<?= base_url('admincms/content/edit_content/'.encodeId($row->id));?>"> Edit </a></td>

                            <td><?php echo anchor('admincms/content/delete_content/' . encodeId($row->id), 'Delete', 

							array('onclick' => "return confirm('Are you sure you want to delete this content?')")); ?></td>
	

				    	</tr> 

                        <input name="id" type="hidden" value="<?= $row->id ?>" />

                    <?php endforeach; 
							}

							?>
                  </tbody>

                                   </table>



                                   <?php
                                        echo form_submit(array('name' => 'sbm','id' => 'sbm', 'value' => 'Delete Selected Contents', 'class' => 'btn green uppercase','onclick'=>"return con('Are you sure you want to delete the selected contents?')"));
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

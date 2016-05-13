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
                                                <th class="all"><?php echo lang('User'); ?></th>
                                                <th class="all"><?php echo lang('Role'); ?></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                    <?php 
               
                    $roles=array('administrator'=>'Administrator','power_user'=>'Power User','director'=>'Director','staff'=>'Staff','visitors'=>'Visitors');
                    foreach($roles as $key=>$value){ ?>
                    <tr>
                      <td class="center"><?php echo $value ?></td>
                      
                      <td class="center">
                      <a class="btn btn-info" href="<?php echo base_url() ?>admincms/roles/permission/<?php echo encodeId($key) ?>"> <i class="icon-edit icon-white"></i> Set Permission </a> 
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                      </table>
		
       
		</div>
	
	</div>
                            </div>
	
	</div>

<script src="<?= base_url(); ?>admin_view/js/jquery.dataTables.min.js"></script>
<script>		
$(document).ready(function() {
	$('#example').dataTable();
} );

</script>
 
    
    
<?php $this->load->view("admincms/includes2016/footer.php"); ?>

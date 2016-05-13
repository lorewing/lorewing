<?php $this->load->view("admincms/includes2016/top.php"); ?>



 <h3 class="page-title"><?php echo lang('Set Permission') ; ?> 
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
                                        <i class="fa fa-globe"></i><?php echo lang('Set Permission') ; ?></div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
			<?php echo $this->session->flashdata('user_updated'); ?>
			<div class="row-fluid"> 
    <!-- Side Navigation -->
    <!--/span--> 
    <!-- Bread Crumb Navigation -->
    <div class="span12"><!-- Table -->
      <div class="row-fluid">
        <div class="span12"> 
          <!-- Portlet: Browser Usage Graph --> 
          <!-- Portlet: Datepickers, smart multiselect, autocomplete -->
          <?php echo flash_message() ?>
			
			<div ></div>


<div id="msg_menu" ></div>

          <div class="box" id="box-1">
            <div class="box-container-toggle">
              <div class="box-content">
  


<?php $parent_menus=$this->general->getMenus(true);
		
		if(!empty($parent_menus)){
			
			foreach($parent_menus as $parent_menu){ 
$main_menu_status=$this->general->checkRoleMenu($parent_menu->mst_menuid,$role_id); 
			
			?>			
                  <div class="control-group span2" >                 
							
							<ul style="list-style:none;"> 
							<li >
						<span><input  type="checkbox" id="menu_<?php echo $parent_menu->mst_menuid ?>" name="sub_menu" value="<?php echo $parent_menu->mst_menuid; ?>" <?php echo ($main_menu_status==true)?"checked=\"checked\"":""?> onClick="setPermission('<?php echo $parent_menu->mst_menuid; ?>')"></span>	<b><?php echo $parent_menu->title; ?> </b> 
							
							
		<?php $sub_menus=$this->general->getMenus(false,$parent_menu->mst_menuid);
		

		
		if(!empty($sub_menus)){
			?><ul style="list-style:none;">

			<?php foreach($sub_menus as $sub_menu){ 
			
			if($sub_menu->url_type=='external'){ 
				$menu_url=$sub_menu->url;
			}else{
				$menu_url=base_url().$sub_menu->url;
			}			
			
			?>
            <?php 
				
					$menu_status=$this->general->checkRoleMenu($sub_menu->mst_menuid,$role_id);            	
            	
            	 ?>
             <li>
             <input  type="checkbox" id="menu_<?php echo $sub_menu->mst_menuid ?>" name="sub_menu" value="<?php echo $sub_menu->mst_menuid; ?>" <?php echo ($menu_status==true)?"checked=\"checked\"":""?> onClick="setPermission('<?php echo $sub_menu->mst_menuid; ?>')">
             
              <?php echo $sub_menu->title; ?>  
             </li>             
                    
			<?php }?> </ul><?php }?>							
							</li>
							</ul>                                        
                  </div>
                 <?php }?>  <div class="clr"></div><?php }?>
                  <div class="form-actions">
                    <input type="hidden"  id="role_id" name="role_id" value="<?php echo encodeId($role_id); ?>" />
                    <button type="button" class="btn green uppercase" onClick="javascript:window.location.href='<?php echo base_url()?>admincms/roles'"><?php echo lang('Back To Role'); ?></button>
                  </div>
                </div>
            </div>
          </div>
          <!--/span--> 
          <!--/span--> 
        </div>
      </div>
    </div>
    <!--/span--> 
  </div>
				
		                           <br />
		
       
		</div>
	
	</div>

<script src="<?= base_url(); ?>admin_view/js/jquery.dataTables.min.js"></script>


<script type="text/javascript" >

// for add and update widget at home page
function setPermission(menu_id){
	
			if ($("#menu_"+menu_id).is(':checked') == true) {
				var is_active=1;
         }else {
				var is_active=0;
         }
						// BASE_PATH is define in top.php 
			jQuery.post(BASE_PATH+"admincms/roles/setPermissionStatus",{menu_id:menu_id,is_active:is_active,role_id:'<?php echo $role_id; ?>'},function(message){
					$("#msg_menu").show();
					$("#msg_menu").html("<div class='alert alert-success'><a href='#' data-dismiss='alert' class='close'>×</a><strong> Record Successfully Saved</div>");
			});
}
//Ahmed
</script>   
 
 
    
<?php $this->load->view("admincms/includes2016/footer.php"); ?>

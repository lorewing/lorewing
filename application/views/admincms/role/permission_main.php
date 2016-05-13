<?php echo doctype('html5');?>
<head>
<?php $this->load->view('common/inc_metadata')?>
<?php $this->load->view('common/inc_assets')?>
<?php
/*Just for your server-side code*/
header('Content-Type: text/html; charset=ISO-8859-1');
?>


<script type="text/javascript" >

// for add and update widget at home page
function setPermission(menu_id){
	
			if ($("#menu_"+menu_id).is(':checked') == true) {
				var is_active=1;
         }else {
				var is_active=0;
         }
						
			jQuery.post(BASE_PATH+"admin/roles/setPermissionStatus",{menu_id:menu_id,is_active:is_active,role_id:'<?php echo $role_id; ?>'},function(message){
					$("#msg_menu").show();
					$("#msg_menu").html("<div class='alert alert-success'><a href='#' data-dismiss='alert' class='close'>×</a><strong> Record Successfully Saved</div>");
			});
}

</script>

</head>
<body id="dashboard">
<?php $this->load->view('common/inc_header'); ?>
<!-- Main Content Area | Side Nav | Content -->
<div class="container-fluid">
  <div class="row-fluid"> 
    <!-- Side Navigation -->
    <?php $this->load->view('common/inc_left-sidebar'); ?>
    <!--/span--> 
    <!-- Bread Crumb Navigation -->
    <div class="span12">
      <div>
        <ul class="breadcrumb">
          <li><a href="<?php echo base_url() ?>admin/dashboard"><?php echo lang('dashboard');?></a> <span class="divider">/</span></li>
          <li><a href="<?php echo base_url() ?>admin/roles/"><?php echo lang('role');?></a> <span class="divider">/</span> </li>
          <li><a href="javascript:void(0);">Permission</a> </li>
        </ul>
      </div>
      <!-- Table -->
      <div class="row-fluid">
        <div class="span12"> 
          <!-- Portlet: Browser Usage Graph --> 
          <!-- Portlet: Datepickers, smart multiselect, autocomplete -->
          <?php echo flash_message() ?>
			
			<div ></div>


<div id="msg_menu" ></div>

          <div class="box" id="box-1">
            <h4 class="box-header round-top"><?php echo lang('btn_edit');?> Permission <a class="box-btn" title="close"><i class="icon-remove"></i></a> <a class="box-btn" title="toggle"><i class="icon-minus"></i></a> <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a> </h4>
            <div class="box-container-toggle">
              <div class="box-content">
  


<?php $parent_menus=$this->general->getMenus(true);
		
		if(!empty($parent_menus)){
			
			foreach($parent_menus as $parent_menu){ 
$main_menu_status=$this->general->checkRoleMenu($parent_menu->id,$role_id); 
			
			?>			
                  <div class="control-group span2" >                 
							
							<ul style="list-style:none;"> 
							<li >
						<span><input  type="checkbox" id="menu_<?php echo $parent_menu->id ?>" name="sub_menu" value="<?php echo $parent_menu->id; ?>" <?php echo ($main_menu_status==true)?"checked=\"checked\"":""?> onClick="setPermission('<?php echo $parent_menu->id; ?>')"></span>	<b><?php echo $parent_menu->title; ?> </b> 
							
							
		<?php $sub_menus=$this->general->getMenus(false,$parent_menu->id);
		

		
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
				
					$menu_status=$this->general->checkRoleMenu($sub_menu->id,$role_id);            	
            	
            	 ?>
             <li>
             <input  type="checkbox" id="menu_<?php echo $sub_menu->id ?>" name="sub_menu" value="<?php echo $sub_menu->id; ?>" <?php echo ($menu_status==true)?"checked=\"checked\"":""?> onClick="setPermission('<?php echo $sub_menu->id; ?>')">
             
              <?php echo $sub_menu->title; ?>  
             </li>             
                    
			<?php }?> </ul><?php }?>							
							</li>
							</ul>                                        
                     </div>
                 <?php }?>  <div class="clr"></div><?php }?>
                  <div class="form-actions">
                    <input type="hidden"  id="role_id" name="role_id" value="<?php echo encodeId($role_id); ?>" />
                    <button type="button" class="btn btn-danger" onClick="javascript:window.location.href='<?php echo base_url()?>admin/roles'"><?php echo lang('btn_to_role_back');?></button>
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
  <!--/row-->
  <?php $this->load->view('common/inc_footer'); ?>
</div>
<!--/.fluid-container-->
</body>
</html>
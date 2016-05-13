<?php echo doctype('html5');?>
<head>
<?php $this->load->view('common/inc_metadata')?>
<?php $this->load->view('common/inc_assets')?>
<?php
/*Just for your server-side code*/
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<script>
$(document).ready(function(){
	
 jQuery("#frmRole").validationEngine();
 
});
</script>
<style>
.error{clear:both;}
</style>
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
        <li> <a href="<?php echo base_url() ?>admin/dashboard"><?php echo lang('dashboard');?></a> <span class="divider">/</span></li>
          <li> <a href="<?php echo base_url() ?>admin/roles/">Roles</a> <span class="divider">/</span> </li>
          <li> <a href="javascript:void(0)"><?php echo lang('add');?></a> </li>
        </ul>
      </div>
      <!-- Table -->
      <div class="row-fluid">
        <div class="span12"> 
          <!-- Portlet: Browser Usage Graph --> 
          <!-- Portlet: Datepickers, smart multiselect, autocomplete -->
          <?php echo flash_message() ?>
          <div class="box" id="box-1">
            <h4 class="box-header round-top"><?php echo lang('add');?> <?php echo lang('role');?> <a class="box-btn" title="close"><i class="icon-remove"></i></a> <a class="box-btn" title="toggle"><i class="icon-minus"></i></a> <a class="box-btn" title="config" data-toggle="modal" href="#box-config-modal"><i class="icon-cog"></i></a> </h4>
            <div class="box-container-toggle">
              <div class="box-content">
                <?php 			  
							$attributes = array('name' => 'frmRole','id'=>'frmRole','class'=>'form-horizontal');
							echo form_open('admin/roles/save',$attributes);	
							?>
                <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="typeahead"><?php echo lang('role');?> : 	<span class="red">*</span></label>
                    <div class="controls">
                      <input type="text" name="title" class="input-xlarge validate[required]" id="title" value="<?php echo set_value('title'); ?>" >
                     </div>  <div class="controls">
                           <?php echo requireFieldDisplayError('title')?>
                           </div>
                     </div>
                  <div class="control-group">
                    <label class="control-label" for="is_default"><?php echo lang('default');?></label>
                    <div class="controls">
                      <label class="uniform">
                        <input class="uniform_on" type="checkbox" id="is_default" name="is_default">
                      </label>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="is_active"><?php echo lang('btn_active');?></label>
                    <div class="controls">
                      <label class="uniform">
                        <input class="uniform_on" type="checkbox" id="is_active" name="is_active" checked >
                      </label>
                    </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo lang('btn_save');?></button>
                     <button type="submit" class="btn btn-primary" name="savemore" id="savemore" value="more"><?php echo lang('save_more');?></button>
                    <button type="button" class="btn btn-danger" onClick="javascript:window.location.href='<?php echo base_url()?>admin/roles'"><?php echo lang('cancel');?></button>
                  </div>
                </fieldset>
                <?php echo form_close()?> </div>
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
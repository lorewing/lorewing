<!-- Bootstrap -->
<?php echo add_style(ACTIVE_TEMPLATE.'bootstrap/css/bootstrap')?>
<?php echo add_style(CSS_PATH.'themes/default')?>
<?php echo add_style(ACTIVE_TEMPLATE.'bootstrap/css/bootstrap-responsive')?>
<!-- Full Calender -->
<?php echo add_style(JS_PATH.'fullcalendar/fullcalendar/fullcalendar')?>
<!-- Bootstrap Date Picker --> 
<?php echo add_style(JS_PATH.'datepicker/css/datepicker')?>
<!-- Uniform -->
<?php echo add_style(JS_PATH.'uniform/css/uniform.default')?>
<!-- Chosen multiselect -->
<?php echo add_style(JS_PATH.'chosen/chosen/chosen.intenso')?>
<!-- Simplenso -->
<?php echo add_style(CSS_PATH.'simplenso')?>
<script>
var BASE_PATH="<?php echo base_url()?>";
</script>
<!-- Global JS -->
<?php echo add_jscript(JS_PATH.'global')?>

<!-- jQuery -->
<?php //echo add_jscript(JS_PATH.'1.7.2.jquery.min.js')?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- Data Tables -->
<?php echo add_jscript(JS_PATH.'DataTables/media/js/jquery.dataTables')?>
<!-- jQuery UI Sortable -->
<?php echo add_jscript(JS_PATH.'jquery-ui/ui/minified/jquery.ui.core.min')?><?php echo add_jscript(JS_PATH.'jquery-ui/ui/minified/jquery.ui.widget.min')?><?php echo add_jscript(JS_PATH.'jquery-ui/ui/minified//jquery.ui.mouse.min')?><?php echo add_jscript(JS_PATH.'jquery-ui/ui/minified/jquery.ui.sortable.min')?>
<!-- jQuery UI Draggable & droppable -->
<?php echo add_jscript(JS_PATH.'jquery-ui/ui/minified/jquery.ui.draggable.min')?><?php echo add_jscript(JS_PATH.'jquery-ui/ui/minified/jquery.ui.droppable.min')?>
<!-- Bootstrap -->
<?php echo add_jscript(ACTIVE_TEMPLATE.'bootstrap/js/bootstrap.min')?><?php echo add_jscript(JS_PATH.'bootbox/bootbox.min')?>
<!-- Bootstrap Date Picker -->

<?php echo add_jscript(JS_PATH.'datepicker/js/bootstrap-datepicker')?>

<!-- Bootstrap Time Picker -->
<?php echo add_style(JS_PATH.'bootstrap-timepicker-gh-pages/css/bootstrap-timepicker')?>
<?php echo add_style(JS_PATH.'bootstrap-timepicker-gh-pages/css/bootstrap-timepicker.min')?>
<?php echo add_jscript(JS_PATH.'bootstrap-timepicker-gh-pages/js/bootstrap-timepicker')?>
<?php echo add_jscript(JS_PATH.'bootstrap-timepicker-gh-pages/js/bootstrap-timepicker.min')?>
<!-- jQuery Cookie -->
<?php echo add_jscript(JS_PATH.'jquery.cookie/jquery.cookie')?>
<!-- Full Calender -->
<?php echo add_jscript(JS_PATH.'fullcalendar/fullcalendar/fullcalendar.min')?>
<!-- CK Editor -->
<?php echo add_jscript(JS_PATH.'ckeditor/ckeditor')?><?php //echo add_jscript(JS_PATH.'ckeditor/adapters/jquery')?>
<!-- Chosen multiselect -->
<?php echo add_jscript(JS_PATH.'chosen/chosen/chosen.jquery.min')?>
<!-- Uniform -->
<?php echo add_jscript(JS_PATH.'uniform/jquery.uniform.min')?>
<!-- Simplenso Scripts -->
<?php echo add_jscript(JS_PATH.'simplenso/simplenso')?>
<!-- validation Scripts -->
<?php echo add_style(JS_PATH.'jquery_validation/css/validationEngine.jquery')?>
<?php if($this->session->userdata('lang')=='french'){?>
	<?php echo add_jscript(JS_PATH.'jquery_validation/js/languages/jquery.validationEngine-fr')?>
<?php }else{?>
	<?php echo add_jscript(JS_PATH.'jquery_validation/js/languages/jquery.validationEngine-en')?>
<?php }?>
<?php echo add_jscript(JS_PATH.'jquery_validation/js/jquery.validationEngine')?>
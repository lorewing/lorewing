<!DOCTYPE html>
<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--end -->


<?php echo add_style('public/css/style')?>
<?php echo add_style('private/slider')?>

<?php echo add_jscript(BASE_SCRIPTS_PATH.'js/global')?>
<?php echo add_jscript(BASE_SCRIPTS_PATH.'js/jquery-1.7.1.min')?>
<?php echo add_jscript(BASE_SCRIPTS_PATH.'js/featurify.min')?>
<?php echo add_jscript(BASE_SCRIPTS_PATH.'js/slicing_steps')?>


<?php echo add_style(BASE_TEMPLATES_CSS_PATH.'style')?>
<?php echo add_style(BASE_TEMPLATES_CSS_PATH.'slider')?>


<!-- fancy box-->
<?php echo add_jscript(BASE_SCRIPTS_PATH.'js/jquery.validate')?>
<?php echo add_jscript(BASE_SCRIPTS_PATH.'js/jquery.maskedinput')?>
<?php //echo add_jscript(BASE_SCRIPTS_PATH.'js/jquery.plugins')?>

<!-- datePicker -->
 
 <?php echo add_jscript(BASE_SCRIPTS_PATH.'js/custom-form-elements')?>

<script>
var BASE_PATH="<?php echo base_url()?>";
</script>


<?php if(isset($assets) &&  in_array('star_rating',$assets)){?>

	<?php echo add_jscript(BASE_SCRIPTS_PATH.'star-rating/jquery.MetaData')?>
   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'star-rating/jquery.rating')?>
    <?php echo add_style(BASE_SCRIPTS_PATH.'star-rating/jquery.rating')?>

<?php }if(isset($assets) &&  in_array('ckeditor',$assets)){?>		<!--For Ckeditor load css and js-->

   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'ckeditor/ckeditor')?>
   	<?php echo add_style(BASE_SCRIPTS_PATH.'ckeditor/_samples/sample')?>

<?php } if(isset($assets) &&  in_array('grid',$assets)){?>		<!--For Jqgrid load css and js-->
<link type="text/css" href="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery-ui/css/blitzer/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery-ui/minified/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery-ui/i18n/jquery.ui.datepicker-en.js"></script>
<script type="text/javascript" src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery-ui/minified/jquery.ui.datepicker.min.js"></script>
<script src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery-ui/minified/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery.jqGrid/i18n/grid.locale-en.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery.jqGrid/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/datagrid/datagrid.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/datagrid/datagrid.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().BASE_SCRIPTS_PATH?>js/lib/jquery.jqGrid/css/ui.jqgrid.css" />

<?php }if(isset($assets) &&  in_array('thickbox',$assets)){?>		<!--For Thickbox load css and js-->

   	<?php echo add_style(BASE_SCRIPTS_PATH.'thickbox/thickbox')?>
   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'thickbox/thickboxcompressed')?>
    
 	<script>var tb_pathToImage = "<?php echo base_url().BASE_SCRIPTS_PATH?>thickbox/loadingAnimation.gif";
		  imgLoader = new Image();// preload image
		  imgLoader.src = tb_pathToImage;
	</script>
<?php }if(isset($assets) &&  in_array('calendar',$assets)){?>		<!--For Calendar load css and js-->
   
   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'calendar/src/js/jscal2')?>
   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'calendar/src/js/lang/en')?>
    <?php echo add_style(BASE_SCRIPTS_PATH.'calendar/src/css/jscal2')?>
    <?php echo add_style(BASE_SCRIPTS_PATH.'calendar/src/css/border-radius')?>
    <?php echo add_style(BASE_SCRIPTS_PATH.'calendar/src/css/win2k/win2k')?>
	<script>
	var cal = Calendar.setup({
		onSelect: function(cal) { cal.hide() },	//showTime: true
	});
	</script>

<?php }if(isset($assets) &&  in_array('fancybox',$assets)){?>		<!--For Fancybox load css and js-->

   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'fancybox/jquery.mousewheel-3.0.4.pack')?>
   	<?php echo add_jscript(BASE_SCRIPTS_PATH.'fancybox/jquery.fancybox-1.3.4.pack')?>
    <?php echo add_style(BASE_SCRIPTS_PATH.'fancybox/jquery.fancybox-1.3.4')?>

    <script>
      $(document).ready(function(){
        $(".gallery").fancybox({
        'autoScale'			: true,
        'transitionIn'		: 'elastic',
        'transitionOut'		: 'elastic'
        });
      }); 
    </script>
   
<?php } ?>

<?php echo add_jscript(ACTIVE_TEMPLATE.'fonts/cufon/cufon-yui')?>
<?php echo add_jscript(ACTIVE_TEMPLATE.'fonts/cufon/Helvetica_LT_Condensed_700.font')?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?= $site_title; ?></title>
 		<?php
				 $seo_description = $this->session->userdata('seo_description'); 
				  $seo_keywords = $this->session->userdata('seo_keywords'); 
				  echo meta('description', $seo_description);
				  echo meta('keywords', $seo_keywords); 
				 
		 ?>
<?php /*?>        		<?php echo meta('keywords', $r->seo_keywords); ?>
<?php */?>
			
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>admin_view/css/app.css" />
		<script src="<?php echo base_url(); ?>admin_view/bower_components/modernizr/modernizr.js"></script>
       
        <script>
			var BASE_PATH="<?php echo base_url()?>";
		</script>
        
        <!-- This code for DataTable -->
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		 


		<script type="text/javascript" src="<?php echo base_url(); ?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
		tinymce.init({
		    selector: "textarea",
			document_base_url: "http://www.uaefencing.net/",
			relative_urls: false,
		    theme_advanced_resizing : true,
			directionality : 'rtl',
			entity_encoding : 'raw',
            theme_advanced_resize_horizontal : false ,
            plugins : "arphp,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options 
		theme_advanced_buttons1 : "code,save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,ardate,hijri,arnumber,arkeyboard,enterms,arstandard",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
            selector: "textarea:not(#seo_keywords, #seo_description, #blog_seo_keywords, #blog_seo_description, #google_analytics, #meta_description, #meta_keywords)",
		 });
		</script>
        
<?php /*?>        <script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<?php */?>  
		<style>
			textarea { resize: vertical; }
		</style>
	</head>
	<body>
	
	<?php $this->load->view("admincms/includes/header.php"); ?>

	<?php $this->load->view("admincms/includes/nav.php"); ?>
	
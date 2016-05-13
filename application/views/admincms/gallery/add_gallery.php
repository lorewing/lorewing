<?php $this->load->view("admincms/includes/top.php"); ?>



<script>
  var is_saved = '';
  $(document).ready(function(){
  	// For Auto save
	contentImages();
	$('form#add_content :input').on('change',function (){
		var changeObj = $(this);
		var data = $('form#add_content').serialize();		
		data = data+'&is_ajax=1';		
		
    	var content_id = $('#content_id').val();
		if(content_id==''){
		is_saved = $.ajax({
			url: BASE_PATH+"admincms/gallery/ajax_save",
			data: data,
			cache: false,
			type: 'POST',
			success: function(data){
				var obj = $.parseJSON(data);
				if(obj.content_id!=''){					
					$('#content_id').val(obj.content_id);					
				}
			}
		});
		
		}else{
		
		  return true;
		}
	});
  

   	// upload images
	$('#userfile').on('change',function(e){
		var clickObj = $(this);
		var content_id = $('#content_id').val();
		if(content_id){			
			var data = new FormData();
			jQuery.each($('#userfile')[0].files, function(i, file) {
				data.append('userfile[]',file);
			});
			data.append('content_id',content_id);
			
			var container = $(clickObj).parents('form').find('div#productImages').parent('div');
			$(clickObj).attr('disabled',true);
			$('#form_actions button').attr('disabled',true);
			$(container).append('<div id="img_loader"><span class="fa fa-spinner fa-spin fa-3"></span> Uploading...</div>');
			$(container).css('text-align','center')
			$.ajax({
				url: BASE_PATH+"admincms/gallery/saveImage",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				type: 'POST',
				success: function(data){
					$(clickObj).attr('disabled',false);
					$('#form_actions button').attr('disabled',false);
					$(container).css('text-align','');
					$(container).find('div#img_loader').remove();
					if(data!=""){
						var objJSON = $.parseJSON(data);
						if($(container).find('div#message').length==0){
							$(container).append('<div id="message">'+objJSON.message+'</div>').show();
						}else{
							$(container).find('div#message').html(objJSON.message).show();
							
						}
						$(container).find('div#message').delay(3000).fadeOut(function(){
							contentImages();
						});	
					}
					$('#userfile').val('');
				}
			});
		}else{
			setTimeout(function(){								
				$(clickObj).change();
			},100000);
		}
	});
	

	
	// crop images
	$('#crop').on('click',function(){
		var clickObj = $(this);
		var button_text = $(clickObj).val();
		var data = $('form#add_content').serialize();
		$(clickObj).attr('disabled',true);
		$('#add_content button,#add_content input[type=button]').hide();
		$(clickObj).show().attr('disabled',true).val('Croping...');
		$.ajax({
			url: BASE_PATH+"admincms/gallery/crop",
			data: data,
			type: 'POST',
			success: function(response){
				$(clickObj).attr('disabled',false);
				$('#add_content button,#add_content input[type=button]').show();
				$(clickObj).val(button_text);
				var objJSON = $.parseJSON(response);
				if($('#productImages').find('div#message').length==0){
					$('#productImages').prepend('<div id="message">'+objJSON.message+'</div>');
				}else{
					$('#productImages').find('div#message').html(objJSON.message).show();
					
				}		 	
				$('#productImages div#message').delay(3000).fadeOut(function(){					
					contentImages();
				});
				if(objJSON.error==false){
					$('#crop_container').hide();
				}
			}
		});
	});


}); /// document .ready


	// for images
function contentImages(){
    var content_id = $('#content_id').val();
	$('#productImages').html('<div id="img_loader" class="textC"><span class="fa fa-spinner fa-spin fa-3"></span> Uploading...</div>');
	$.post("<?php echo base_url() ?>admincms/gallery/getContentImages",{content_id:content_id},function(response){
		 $('#productImages').html(response);
	});	
}

function deleteImage(image_id,eventobj){
	var result = confirm('Do you really want to delete.');
	if(image_id!='' && result==true){
		$.post("<?php echo base_url() ?>admincms/gallery/deleteImage",{image_id:image_id},function(response){
			var objJSON = $.parseJSON(response);
			if($('#productImages').find('div#message').length==0){
				$('#productImages').prepend('<div id="message">'+objJSON.message+'</div>');
			}else{
				$('#productImages').find('div#message').html(objJSON.message).show();
				
			}
			if(objJSON.error==false){
				$('#divimage'+image_id).remove();
			}
			$('#productImages div#message').delay(3000).fadeOut(function(){					
				contentImages();
			});
		});
	}else{
		return false;
	}
}

function resetImage(image_id){
	var result = confirm('Do you really want to reset.');
	if(image_id!='' && result==true){
		$.post("<?php echo base_url() ?>admincms/gallery/resetImage",{image_id:image_id},function(response){
			var objJSON = $.parseJSON(response);
			if($('#productImages').find('div#message').length==0){
				$('#productImages').prepend('<div id="message">'+objJSON.message+'</div>');
			}else{
				$('#productImages').find('div#message').html(objJSON.message).show();
				
			}		 	
			$('#productImages div#message').delay(3000).fadeOut(function(){					
				contentImages();
			});
		});
	}else{
		return false;
	}
}

function setDefaultImage(image_id,eventobj){
	
	
	if(image_id!=''){
		$.post("<?php echo base_url() ?>admincms/gallery/setDefaultImage",{image_id:image_id},function(response){
			var objJSON = $.parseJSON(response);
			if($('#productImages').find('div#message').length==0){
				$('#productImages').prepend('<div id="message">'+objJSON.message+'</div>');
			}else{
				$('#productImages').find('div#message').html(objJSON.message).show();
				
			}		 	
			$('#productImages div#message').delay(3000).fadeOut(function(){					
				contentImages();
			});
		});
	}
}
</script>
<script type="text/javascript">
var jcrop_api;
jQuery(function($){
    //initJcrop();
    
    // The function is pretty simple
    function initJcrop(){
		// Invoke Jcrop in typical fashion
		$('#target').Jcrop({
			onChange: updatePreview,
			onSelect: updatePreview,
			boxWidth: 715,
			aspectRatio: 1
		},function(){			
			// Store the API in the jcrop_api variable
			jcrop_api = this;
		});
	};
	function updatePreview(c){
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val((c.w).toFixed(0));
		$('#h').val((c.h).toFixed(0));
	};
	
	$('body').on('click','.rehook',function(e) {
		$('#crop_container').show();
		var image_id = $(this).attr('data-image_id');
		$('#crop_img_id').val(image_id);
		var original_src = $('img#img'+image_id).attr('data-originalsrc');
		$('#target').attr('src',original_src);				
		//jcrop_api.destroy();
				
		initJcrop();		
		if(jcrop_api!=undefined){
			jcrop_api.setImage(original_src);			
			jcrop_api.animateTo([100,100,280,280]);		
			jcrop_api.setOptions({
			  minSize: [ 100, 100 ]
			});			
			jcrop_api.focus();
		}
	});
});
</script>



<style type="text/css">
/* Apply these styles only when #preview-pane has
   been placed within the Jcrop widget */
.jcrop-holder .cropingimg {
	border: 1px rgba(0, 0, 0, .4) solid !important;
	background-color: white;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
	box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}
.jcrop-holder {
	float: left;
}

.img_wrp{
 width:20px;	
}
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>Jcrop/js/jquery.Jcrop.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Jcrop/css/jquery.Jcrop.css">

	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
            <div id="content_container" class="row">
		
		<div id="side_content" class="columns large-3 right">
		
			<h4>Instructions / Tips</h4>
		
			<p>Add copy to the main website.</p>
			
			<p>SEO: Separate keywords with a comma. Page Description should describe the purpose of the page.</p>
		
		</div>
		
		<div id="main_content_section" class="columns large-9 left">
		
			<div id="form_add">
		
				<fieldset>
				
					<legend>Add Content</legend>
					
						<?php
						
						echo validation_errors('<p class=\'error\'>');
						
						echo $this->session->flashdata('message');
						
						//echo form_open('admincms/gallery/add_content' );
						
					$attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');
	  	echo form_open_multipart('admincms/gallery/ajax_save',$attributes);
						//add_content
						
						
						echo form_input(array('name' => 'title', 'id' => 'title' , 'placeholder' => 'Page Title' ));
											
						?>
						
						<label>Page Main Copy</label>
						<p><?php echo form_textarea(array('name' => 'main_content', 'id' => 'main_content', 'placeholder' => 'Page Main Copy')); ?></p>
						
						<label>Associated with</label>
						<p>
							<select name="side_bar">
								
								<option value="">None</option>
						
								<?php
								$where = 'title NOT IN ("Footer Copy") AND title NOT IN ("Home")';
								$this->db->select('title');
								$this->db->where($where);
								$query = $this->db->get('content');
								
								foreach ($query->result() as $row) {
								?>
						
								<option><?php echo $row->title; } ?></option>
								
							</select>
							
						</p>
                        
                        <input type="hidden" name="content_id"  id="content_id"  />
                         
						
						<label>Change link</label>
						<p>
							<?php echo form_input(array('name' => 'link', 'id' => 'link', 'placeholder' => 'Change link')); ?>
						</p>
						
						<label>Position</label>
						<p>
							<?php echo form_input(array('name' => 'position', 'id' => 'position', 'placeholder' => 'Position')) ?>	
						</p>
						
<!-- 						<label>Name of the link of the page</label> -->
						<!-- <p><?php //echo form_input(array('name' => 'link', 'id' => 'link', 'placeholder' => 'Example : Loreum Ipsum')) ?></p> -->
						
						<label>Page Keywords</label>
						<p><?php echo form_textarea(array('name' => 'seo_keywords', 'id' => 'seo_keywords', 'placeholder' => 'Page Keywords')); ?></p>
						
						<label>Page Description</label>
						<p><?php echo form_textarea(array('name' => 'seo_description', 'id' => 'seo_description', 'placeholder' => 'Page Description'));?></p>
						
                        
                        
                        
                        
                        
                        <div class="input-control">
        <label></label>
        <div class="input-group input-switch-group">
          <div id="productImages" class="clearfix" style="margin:10px 0;"></div>
          <div id="crop_container" style="border: 1px dashed; padding: 10px 10px 32px;display:none;" class="clearfix"> <img src="" class="cropingimg" id="target" />          	
            <div style="width:40%;margin:10px;float:right;">
              <div class="inline-control" style="display:none;">
              <label>X</label>
              <input type="text" id="x" name="x" readonly /></div>
              <div class="inline-control" style="display:none;">
              <label>Y</label>
              <input type="text" id="y" name="y" readonly /></div>
              <div class="inline-control" style="display:none;">
              <label>Width</label>
              <input type="text" id="w" name="w" readonly /></div>
              <div class="inline-control" style="display:none;">
              <label>Height</label>
              <input type="text" id="h" name="h" readonly /></div>
            </div>
            <div class="clear" style="margin-bottom:10px;"></div>
            <input type="hidden" id="crop_img_id" name="crop_img_id" />
            <input type="button" id="cancel" name="cancel" class="btn btn-large" value="Cancel" onClick="$('#crop_container').hide();" style="float: right;" />
            <input type="button" id="crop" name="crop" class="btn btn-red btn-large" value="Crop" style="float: right;" />
            <div class="clear"></div>
          </div>
        </div>
      </div>
                        
                        
                        
                        
                        
                        
                        
                        
                              <div class="clearfix"></div>
      <div class="input-control">
        <label class="control-label" for="typeahead">Image: </label>
        <div class="input-group input-switch-group"><input type="file" name="userfile[]"  class="" id="userfile" multiple />
        <?php /*?><button type="button" id="upload" name="upload" class="btn btn-large" style="float: right;">Upload</button><?php */?>
        <br>
        <em>Select multiple images use Ctrl + Select Images</em></div> </div>
      <div class="clearfix"></div>
                        
                        
                        
                        
                        
						<?php
						
						echo form_submit(array('name' => 'add_content','id' => 'add_content', 'value' => 'Add Content', 'class' => 'button radius right small'));
						
						echo form_close();
						
						?>
				
				</fieldset>
			
			</div>
		
		</div>
	
	</div>
		</div>
	</div>
    
    

<?php $this->load->view("admincms/includes/footer.php"); ?>
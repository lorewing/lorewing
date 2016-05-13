<?php $this->load->view("admincms/includes2016/top.php"); ?>

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

			url: BASE_PATH+"admincms/content/ajax_save",

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

				url: BASE_PATH+"admincms/content/saveImage",

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

			url: BASE_PATH+"admincms/content/crop",

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

	$.post("<?php echo base_url() ?>admincms/content/getContentImages",{content_id:content_id},function(response){

		 $('#productImages').html(response);

	});	

}



function deleteImage(image_id,eventobj){

	var result = confirm('Do you really want to delete.');

	if(image_id!='' && result==true){

		$.post("<?php echo base_url() ?>admincms/content/deleteImage",{image_id:image_id},function(response){

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

		$.post("<?php echo base_url() ?>admincms/content/resetImage",{image_id:image_id},function(response){

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

		$.post("<?php echo base_url() ?>admincms/content/setDefaultImage",{image_id:image_id},function(response){

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




        	<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Add Content') ; ?></h3>
                 <hr>

					

	<?php
                echo validation_errors('<p class=\'error\'>');
                echo $this->session->flashdata('message');
                $attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');
                echo form_open_multipart('admincms/content/ajax_save',$attributes);

         ?>
                 <div class="form-group">             
           <label><?php echo lang('Title_ar') ; ?></label>
        <?php
                echo form_input(array('name' => 'title_ar','class' => 'form-control spinner', 'id' => 'title_ar' , 'placeholder' => 'Page Title Arabic' ));				
        ?>
                 </div>           
                    
                 <div class="form-group">             
           <label><?php echo lang('Page Title English') ; ?></label>
                     <?php
			echo form_input(array('name' => 'title','class' => 'form-control spinner', 'id' => 'title' , 'placeholder' => 'Page Title English' ));
		     ?>
                 </div>

						
                       
                        <div class="form-group">             
                            <label><?php echo lang('Page Main Copy Arabic') ; ?></label>
                            <?php echo form_textarea(array('name' => 'main_content_ar', 'id' => 'main_content_ar', 'placeholder' => 'Page Main Copy Arabic')); ?>

                        </div>

                 
                    <div class="form-group">             
                            <label><?php echo lang('Page Main Copy Enlish') ; ?></label>
			    <?php echo form_textarea(array('name' => 'main_content', 'id' => 'main_content', 'placeholder' => 'Page Main Copy English')); ?>

                              </div>		

			 <div class="form-group">             
                            <label><?php echo lang('Associated with') ; ?></label>
							<select name="side_bar">
                                        	<option value="main_link">None</option>
								<?php

								//$where = 'title NOT IN ("Footer Copy") AND title NOT IN ("Home")';

								$this->db->select('id,title');

								$this->db->where('side_bar','main_link');

								$query = $this->db->get('content');

								

								foreach ($query->result() as $row) {

								?>

								<option value="<?php echo $row->id;?>"><?php echo $row->title; } ?></option>
                                                            </select>
	

                         </div>

                        

                        <input type="hidden" name="content_id"  id="content_id"  />

                         
                            <div class="form-group">             
                            <label><?php echo lang('Change link') ; ?></label>
							<?php echo form_input(array('name' => 'link','class' => 'form-control spinner', 'id' => 'link', 'placeholder' => 'Change link')); ?>

                            </div>

                            <div class="form-group">             
                            <label><?php echo lang('Position') ; ?></label>
							<?php echo form_input(array('name' => 'position','class' => 'form-control spinner', 'id' => 'position', 'placeholder' => 'Position')) ?>	

                            </div>

						
                            <div class="form-group">             
                                <label><?php echo lang('Page Keywords') ; ?></label>
				<?php echo form_textarea(array('name' => 'seo_keywords','class' => 'form-control spinner', 'id' => 'seo_keywords', 'placeholder' => 'Page Keywords')); ?>
                            </div>
						

                                <div class="form-group">             
                                    <label><?php echo lang('Page Description') ; ?></label>
                                    <?php echo form_textarea(array('name' => 'seo_description','class' => 'form-control spinner', 'id' => 'seo_description', 'placeholder' => 'Page Description'));?>
                                </div>

			
                        

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

                        

                        

                        

                        

                        
                                        <div class="form-group"> 
						<?php

						echo form_submit(array('name' => 'add_content','id' => 'add_content', 'value' => 'Add Content', 'class' => 'btn green uppercase'));
						echo form_close();
						?>
                                        </div>
				
			

			</div>

		

		</div>

	

	</div>

		

	</div>

    

    



<?php $this->load->view("admincms/includes2016/footer.php"); ?>
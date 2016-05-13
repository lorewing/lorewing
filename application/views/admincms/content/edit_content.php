<?php $this->load->view("admincms/includes2016/top.php"); ?>



<script type="text/javascript" src="<?php echo base_url(); ?>Jcrop/js/jquery.Jcrop.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Jcrop/css/jquery.Jcrop.css">


<script type="text/javascript">

$(document).ready(function(){	

	contentImages();

	

	$('#add_content #update_button').on('click',function(){

		var clickObj = $(this);

		var button_text = $(clickObj).text();

		if($('#add_content').valid()){

			$('#add_content button').hide();

			$(clickObj).show().attr('disabled',true).text('Saving...');

			$('#add_content').submit();

		}

	});

	

	// upload images

	$('#userfile').on('change',function(){

		var clickObj = $(this);

		var data = new FormData();

		jQuery.each($('#userfile')[0].files, function(i, file) {

			data.append('userfile[]',file);

		});

		data.append('content_id',$('#id').val());

		

		var container = $(clickObj).parents('form').find('div#productImages').parent('div');

		var click_text = $(clickObj).html();				

		$(clickObj).html('<span class="fa fa-spinner fa-spin fa-2"></span> Uploading...');

		$(clickObj).attr('disabled',true);

		$('#form_actions button').attr('disabled',true);

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

				if(data!=""){

					var objJSON = $.parseJSON(data);

					if($(container).find('div#message').length==0){

						$(container).append('<div id="message">'+objJSON.message+'</div>').show();

					}else{

						$(container).find('div#message').html(objJSON.message).show();

						

					}				

					$(container).find('div#message').delay(3000).fadeOut(function(){					

						if(objJSON.error==false){

							contentImages();

						}

					});	

				}							

				$('#userfile').val('');

				$(clickObj).html(click_text);

			}

		});

	});

	

	// upload images

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





});

// for images

function contentImages(){

//	var product_id = '<?php echo isset($product[0]->id)?encodeId($product[0]->id):'' ?>';





       var content_id=$('#id').val();



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



</script>

<script type="text/javascript">

var jcrop_api;

jQuery(function($){

    initJcrop();

    

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

		jcrop_api.destroy();

		jcrop_api.setOptions({

		  minSize: [ 100, 100 ]

		});			

		jcrop_api.focus();		

		initJcrop();		

		jcrop_api.setImage(original_src);

		jcrop_api.animateTo([100,100,280,280]);		

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



			<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"> <?php echo lang('Update Content') ; ?></h3>
                 <hr>

				<?php 
                                        if(!empty($update_record)){
                        		echo $update_record;
            				}
				?> 

				
                         <?php 
                            $attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');
                            echo form_open_multipart('admincms/content/update',$attributes);

                                    //add_content

                            echo validation_errors('<p class=\'error\'>');

                            echo $this->session->flashdata('message');

                                    if(!empty($error)){
                                        echo $error;
                                            }
                        ?>


                         <?php foreach($rows as $row) : ?>

                    	  <?php 
								{

									$id 				= $row->id;

									$title 				= $row->title;
									$title_ar 				= $row->title_ar;
									$content_ar			= $row->content_ar;

									$call_name 			= $row->call_name;

									$intro 				= $row->intro;

									$content			= $row->content;

									$side_bar			= $row->side_bar;

									$order_by			= $row->order_by;

									$link				= $row->link;

									$seo_keywords 		= $row->seo_keywords;

									$seo_description	= $row->seo_description;

									$order_by			= $row->order_by;

								} ?>

                    	  

                    	  <?php endforeach; ?>

                          

                        <input name="id" id="id" type="hidden" value="<?= $id;?>" />

                        
				<div class="form-group">             
                                 <label><?php echo lang('Title_ar') ; ?></label>
                        <?php
                        echo form_input(array('name' => 'title_ar', 'id' => 'title_ar' ,'class' => 'form-control spinner', 'placeholder' => 'Page Title Arabic', 'value' => $title_ar ));
					?>
                                   </div>
                      <div class="form-group">             
                     <label><?php echo lang('Page Title English') ; ?></label>
                        <?php
						echo form_input(array('name' => 'title','class' => 'form-control spinner', 'id' => 'title' , 'placeholder' => 'Page Title English', 'value' => $title ));

						

						echo form_input(array('name' => 'call_name','class' => 'form-control spinner', 'id' => 'call_name', 'value' => $call_name, 'disabled' => 'disabled' ));

						

						?>

                          </div>
						<div class="form-group">             
                                              <label><?php echo lang('Page Main Copy Arabic') ; ?></label>

						<p><?php echo form_textarea(array('name' => 'main_content_ar','class' => 'form-control spinner', 'id' => 'main_content_ar', 'placeholder' => 'Page Main Copy Arabic', 'value' => $content_ar)); ?></p>
                                                </div>
						<div class="form-group">             
                                                 <label><?php echo lang('Page Main Copy Enlish') ; ?></label>

						<p><?php echo form_textarea(array('name' => 'main_content','class' => 'form-control spinner', 'id' => 'main_content', 'placeholder' => 'Page Main Copy', 'value' => $content)); ?></p>

						  </div>

						

						 <div class="form-group">             
                            <label><?php echo lang('Associated with') ; ?></label>

						<p>

							<select name="side_bar">
                                                        <option><?php echo $side_bar; ?></option>

								<option value="">None</option>	

								<?php

								$where = 'title NOT IN ("Footer Copy") AND title NOT IN ("Home") AND title NOT IN ("'.$side_bar.'")';

								$this->db->select('title');

								$this->db->where($where);

								$query = $this->db->get('content');

								foreach ($query->result() as $row) {

								?>

								<option><?php echo $row->title; } ?></option>
	

							</select>
                                    </div>
							

						<div class="form-group">             
                            <label><?php echo lang('Change link') ; ?></label>

							<?php echo form_input(array('name' => 'link','class' => 'form-control spinner', 'id' => 'link', 'placeholder' => 'Change link', 'value' => $link)); ?>

                                                </div>

						

						<div class="form-group">             
                            <label><?php echo lang('Position') ; ?></label>
							<?php echo form_input(array('name' => 'position','class' => 'form-control spinner', 'id' => 'position', 'value' => $order_by, 'placeholder' => 'Position')) ?>	

                                                </div>

						

<!-- 						<label>Name of the link of the page</label> -->

						<!--<p><?php // echo form_input(array('name' => 'link', 'id' => 'link', 'placeholder' => 'Example : Loreum Ipsum', 'value' => $link)) ?></p>-->

						

						<div class="form-group">             
                                <label><?php echo lang('Page Keywords') ; ?></label>

						<?php echo form_textarea(array('name' => 'seo_keywords','class' => 'form-control spinner', 'id' => 'seo_keywords', 'placeholder' => 'Page Keywords', 'value' => $seo_keywords)); ?>
                                                </div>
						

						 <div class="form-group">             
                                    <label><?php echo lang('Page Description') ; ?></label>

						<?php echo form_textarea(array('name' => 'seo_description','class' => 'form-control spinner', 'id' => 'seo_description', 'placeholder' => 'Page Description', 'value' => $seo_description));?>
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
                                                	echo form_submit(array('name' => 'save_content','id' => 'save_content', 'value' => 'Save Content', 'class' => 'btn green uppercase '));
                                        	?>
                                        </div>
				

			

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

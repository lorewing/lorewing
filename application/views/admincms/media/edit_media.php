<?php $this->load->view("admincms/includes2016/top.php"); ?>


<div class="row">
                  
            <div class="col-md-12">
                
			<div class="portlet-body">
		<h3 class="page-title"><?php echo lang('Edit Media'); ?> </h3>
                <?php 
								
								if(!empty($update_record)){
							echo $update_record;
							}
					?> 
                
                 <hr>
                      <?php foreach($rows as $r) : ?>

                    	  <?php 

								$media_id = $r->media_id;

								$group_id = $r->group_id;

								$title = $r->title;
                                                                $title_en = $r->title_en;

								$desc = $r->desc;
                                                                $desc_en = $r->desc_en;

								$video_url = $r->video_url;

								$active = $r->active;

								$type = $r->type;

								

								$related_tag = $r->related_tag;

								$media_name = $r->media_name;

								$media_thumb = $r->media_thumb;

								

								

							?>

                    	  

                    	  <?php endforeach; ?>

				

                   		<?php  

						

						$attributes = array('name' => 'add_content','id'=>'add_content','class'=>'');

	  					echo form_open_multipart('/admincms/media/update_media',$attributes);





                        echo validation_errors('<p class=\'error\'>');

						

						echo $this->session->flashdata('message');

						if(!empty($error)){

							echo $error;

							}

						?>

						 <div class="form-group">   
						<label><?php echo lang('Title_ar') ; ?></label>

						<?php echo form_input(array('name' => 'title','class' => 'form-control spinner', 'id' => 'title', 'placeholder' => 'Media Title', 'value' => $title)); ?>

                                                 </div>
                 
                                    <div class="form-group">   
						<label><?php echo lang('Title_en') ; ?></label>

						<?php echo form_input(array('name' => 'title_en','class' => 'form-control spinner', 'id' => 'title_en', 'placeholder' => 'Media Title', 'value' => $title_en)); ?>

                                                 </div>
                 

                         <input name="media_id" type="hidden" value="<?PHP echo $media_id; ?>" />
       
                         <div class="form-group">
                                <img src="<?php echo base_url(); ?>private/media/<?php echo $media_name; ?>" width="250" height="250"></p>
                              <p>
                                <?php echo form_upload(array('name' => 'userfile', 'id' => 'image'));	?>
                            </div>
                        
                 </div>
                          <div class="form-group"> 
						<label>Media Group*</label>

                       		<select name="group_id">

                            <option value=""> Please Select Your Media Group</option>

                            <?php

                        	$query = $this->db->get('media_group');

							

							

									foreach ($query->result() as $row)

									{?>

										 <option value="<?= $row->group_id;?>" <?php if ($row->group_id === $group_id) echo 'selected="selected"'?>><?= $row->group_name;?></option>				

									<?php } // end for each

							?>

							</select>

					   
                          </div>
                  <div class="form-group"> 

                       <label>Type*</label>

                       

						<?php

							 $options=array('image'=>'Image','pdf'=>'PDF','audio'=>'Audio','xls'=>'Excel File','doc'=>'Word file','file'=>'file','video'=>'Video','zip'=>'ZIP File','gallery'=>'Photo Gallery'  );

								// $Industries  is for selected value

								echo form_dropdown('type', $options , $type );

						?>

					   

                  </div>  
 <div class="form-group"> 
     <label><?php echo lang('Desc_ar'); ?></label>

						<?php echo form_textarea(array('name' => 'desc', 'id' => 'desc', 'placeholder' => 'Media Description', 'value' => $desc)); ?>
 </div>
                          <div class="form-group"> 
     <label><?php echo lang('Desc_en'); ?></label>

						<?php echo form_textarea(array('name' => 'desc_en', 'id' => 'desc_en', 'placeholder' => 'Media Description', 'value' => $desc_en)); ?>
 </div>
                         
                        
                          <div class="form-group"> 
                        <label>Related Tag</label>

						<?php echo form_input(array('name' => 'related_tag','class'=>'form-control spinner', 'id' => 'related_tag', 'placeholder' => 'Related Tag', 'value' => $related_tag)); ?>

                          </div>			
 <div class="form-group"> 
                         <label>Video URL</label>

                         
                        <?php echo form_input(array('name' => 'video_url','class'=>'form-control spinner', 'id' => 'video_url', 'placeholder' => 'Video URL', 'value' => $video_url)); ?>
 </div>
				 <div class="form-group"> 		<?php

						echo form_submit(array('name' => 'add_project','id' => 'add_project', 'value' => 'Update Media', 'class' => 'btn green uppercase'));

						echo form_close();

						?>
                          </div>			

			</div>

		

		</div>

	

	</div>

	

	</div>



<?php $this->load->view("admincms/includes2016/footer.php"); ?>


<?php foreach($rows as $row) : ?>

                    	  <?php 
								{
									$post_id 				= $row->post_id;
									$section_id 				= $row->section_id;
									$title_en 			= $row->title_en;
									$title_ar 				= $row->title_ar;
									$desc_en			= $row->desc_en;
									$desc_ar			= $row->desc_ar;
									$created_date			= $row->created_date;
									$count_view				= $row->count_view;
									$related_tag 		= $row->related_tag;
									$alt_desc	= $row->alt_desc;
									$image_name			= $row->image_name;
									$image_thumb			= $row->image_thumb;
								} ?>
                    	  
                    	  <?php endforeach; ?>
                          	
    <div class="blog-single page">

		<div class="section-title">
			<h1 class="title"><?php echo $title_ar ?> </h1>
			
		</div>

		<div class="container">
			<div class="blog-main three-fourths">
            
            <article class="blog-post">
						<div class="blog-date">
							<div>
								<?php  
                                $yrdata= strtotime($row->created_date);
                                echo date('M', $yrdata);
                                ?>
                            </div>
							<div class="day"><?php  
                                $yrdata= strtotime($row->created_date);
                                echo date('d', $yrdata);
                                ?></div>
						</div>

				<article class="blog-post single"><img class="main-image" src="<?php echo base_url(); ?>private/post/<?php echo $image_name;?>" alt="<?php echo $title_ar ?>">
				  
				 
					
					<blockquote>
						<p>
							<?php echo $title_ar ?>
						</p>
					</blockquote>
                   
					
                    <p>
                    	<?php echo $desc_ar ?>
                    </p>
                    
                     <div class="blog-meta">
						تاريخ النشر <?php echo $row->created_date ?>
						 
					</div>
                    <h6> <img src='<?php echo base_url();?>/site_view/img/tags.png' alt='Tags' title='Tags' height='15px'> 
					<?php  $related_tag_array = explode(",", $related_tag); 
							$arrlength = count($related_tag_array);
							//trim($str)
							for($x = 0; $x < $arrlength; $x++) { ?>
                            	
                                <p class="post-tag"><a href="<?php echo base_url();?>news/tag/<?php echo str_replace(' ','-',trim($related_tag_array[$x]));?>" rel="tag"><?php echo trim($related_tag_array[$x]); ?></a>
									
								<?php } ?>
					 </h6>
                    
                     <!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_sharing_toolbox"></div>
                    </article>
				</article><!-- End .blog-post -->

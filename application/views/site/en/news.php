	<div class="blog page">

			<!--<div class="section-title">
				<h1 class="title">Our Blog</h1>
				<p class="description">This is some information about the services we offer.</p>
			</div>-->

			<div class="container">
				<div class="blog-main three-fourths">
<?php
foreach($results as $row) { ?>
					<!-- Blog post 1 -->
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

						<a href="<?= base_url('en/news/news-detalis/');?>/<?php echo preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-',$row->title_en));?>/<?php echo $row->post_id;?>" title="<?php echo $row->title_en; ?>"><img class="main-image" src="<?php echo base_url(); ?>private/post/<?php echo $row->image_name;?>" width="500" height="381"  alt="<?php echo $row->title_en; ?>"></a>

						<div class="post-container">
							<h2 class="blog-title"><a href="<?php echo base_url('en/news/news-detalis/');?>/<?php echo preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-',$row->title_en));?>/<?php echo $row->post_id;?>"><?php echo $row->title_en; ?></a></h2>
                            

							<div class="post-content">
								<p><?php echo word_limiter($row->desc_en, 42);?></p>
								<a class="read-more" href="<?= base_url('en/news/news-detalis/');?>/<?php echo str_replace(' ', '-', $row->title_en);?>/<?php echo $row->post_id;?>">Read More</a>
							</div>

						</div>

					</article>
                    <hr>
<?php } ?>
					<div class="clearfix"></div>
					<hr>

					<div class="pagination" style="direction:ltr !important;">

					<?php echo $links; ?>
                    
                    </div>
				

				

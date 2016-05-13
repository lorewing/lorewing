	<div class="blog page">

			<!--<div class="section-title">
				<h1 class="title">Our Blog</h1>
				<p class="description">This is some information about the services we offer.</p>
			</div>-->

			<div class="container">
				<div class="blog-main three-fourths">
<?php
if(empty($form_search)){
$url_search = urldecode(str_replace('-',' ',$this->uri->segment(3)));
}else{
$url_search = $form_search ;
	}
	
$query = $this->db->query("SELECT * FROM `post` WHERE `title_ar` like'%$url_search%' or `desc_ar` like '%$url_search%'");

if ($query->num_rows() > 0)
{
   foreach ($query->result() as $row)
   

{ ?>
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


						<a href="<?= base_url('news/news-detalis/');?>/<?php echo str_replace(' ', '-',$row->title_ar);?>/<?php echo $row->post_id;?>" title="<?php echo $row->title_ar; ?>"><img class="main-image" src="<?php echo base_url(); ?>private/post/<?php echo $row->image_name ;?>" width="500" height="381" alt="<?php echo $row->title_ar; ?>"></a>

						<div class="post-container">
							<h2 class="blog-title"><a href="<?= base_url('news/news-detalis/');?>/<?php echo str_replace(' ', '-', $row->title_ar);?>/<?php echo $row->post_id;?>"><?php echo $row->title_ar; ?></a></h2>

							<div class="post-content">
								<p><?php echo word_limiter($row->desc_ar, 42);?></p>
								<a class="read-more" href="<?= base_url('news/news-detalis/');?>/<?php echo str_replace(' ', '-', $row->title_ar);?>/<?php echo $row->post_id;?>">المزيد</a>
							</div>

						</div>

					</article>
                    <hr>
<?php } } ?>
					<div class="clearfix"></div>
					<hr>

					<ul class="pagination">
						<!--<li><a class="prev" href="#"><i class="fa fa-angle-left"></i></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li class="current"><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a class="next" href="#"><i class="fa fa-angle-right"></i></a></li>-->
					</ul>

				

				

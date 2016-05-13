	<!-- RECENT POSTS --><!-- End .recent-posts --><!-- End .comments -->
				
				</div><!-- End .three-fourths -->

			<!-- Sidebar -->
			<aside class="aside one-fourth last">
				  	
				<div class="widgets">

					<div class="widget"> 
						<form class="search" action="<?php echo base_url('news/tag/');?>" method="post">
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<input name="q" type="text" class="search-box" placeholder="البحث">
						</form><!-- End .search -->
						<h5 class="sub-title">من نحن</h5>
						<p>لوروينج اسم رائد في تقنية المعلومات، خبرتنا تجاوزت 15 عاماً من العطاء والتميز في مجال الإنترنت مثل:- تصميم واستضافة المواقع ، التسويق الإلكتروني ،برمجة تطبيقات الهواتف الذكية ، التسويق الإلكتروني والحملات التسويقية.<a href="<?php echo base_url(); ?>home#about">المزيد</a></p>
					</div><!-- End .widget -->
					
					
					<div class="widget">
						<h5 class="sub-title">أعمالنا</h5>
						<ul class="categories">
							<li><a href="http://www.uaefa.ae/" target="_blank">اتحاد الإمارات لكرة القدم</a></li>
							<li><a href="http://www.alahliclub.ae/" target="_blank">النادي الأهلي الرياضي الثقافي</a></li>
							<li><a href="http://www.uaefencing.net/" target="_blank">إتحاد المبارزه الإماراتي</a></li>
							<li><a href="http://www.uaehandball.com/" target="_blank">إتحاد كرة اليد الإماراتي</a></li>
							<li><a href="http://aldonianews.com/" target="_blank">صحيفة أخبار الدنيا</a></li>

						</ul>
					</div><!-- End .widget -->	
					
                   <div class="widget tags">
					<h5 class="sub-title">الوسوم</h5>
                   
                   <?php  $related_tag_array = explode(",", $keywords); 
							$arrlength = count($related_tag_array);
							//trim($str)
							for($x = 0; $x < $arrlength; $x++) { ?>
                            	
                               <a href="<?php echo base_url();?>news/tag/<?php echo urldecode(str_replace(' ','-',trim($related_tag_array[$x])));?>"><?php echo trim($related_tag_array[$x]); ?></a>
									
								<?php } ?>
						
					</div><!-- End .widget -->
				</div>	<!-- End .widgets -->

			</aside><!-- End .one-fourth -->
			<!-- End Sidebar -->

			</div><!-- End .container -->
		</div><!-- End .sect-4 -->
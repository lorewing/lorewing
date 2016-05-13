	<!-- RECENT POSTS --><!-- End .recent-posts --><!-- End .comments -->
				
				</div><!-- End .three-fourths -->

			<!-- Sidebar -->
			<aside class="aside one-fourth last">
				  	
				<div class="widgets">

					<div class="widget"> 
						<form class="search" action="<?php echo base_url('en/news/tag/');?>" method="post">
                        
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<input name="q" type="text" class="search-box" placeholder="search">
						</form><!-- End .search -->
						<h5 class="sub-title">About</h5>
						<p>We are committed to simplifying the Internet for businesses by providing a broad range of Web-based solutions that can be tailored to fit your specific needs today and in the future...<a href="<?php echo base_url(); ?>home#about">More</a></p>
					</div><!-- End .widget -->
					
					
					<div class="widget">
						<h5 class="sub-title">PORTFOLIO</h5>
						<ul class="categories">
							<li><a href="http://www.uaefa.ae/" target="_blank">UAE Football Association</a></li>
							<li><a href="http://www.alahliclub.ae/" target="_blank">Al Ahli Sports Club</a></li>
							<li><a href="http://www.uaefencing.net/" target="_blank">UAE Fencing Federation</a></li>
							<li><a href="http://www.uaehandball.com/" target="_blank">UAE Handball Federation</a></li>
							<li><a href="http://aldonianews.com/" target="_blank">Aldonia News Magazine</a></li>


						</ul>
					</div><!-- End .widget -->	
					
					<div class="widget tags">
					<h5 class="sub-title">Skills</h5>
						<a href="#">PHP/Mysql</a>
						<a href="#">Application Development</a>
                        <a href="#">MVC (Codeigniter)</a>
                        <a href="#">JSON</a>
                        <a href="#">XML</a>
                        
                        <a href="#">Open Source</a>
                        <a href="#">WordPress</a>
                        <a href="#">Joomla</a>
                        <a href="#">Magento</a>
                        
						<a href="#">Photoshop</a>
						<a href="#">HTML5</a>
                        <a href="#">CSS3</a>
                        <a href="#">Bootstrap</a>
                        <a href="#">JQuery</a>
                        <a href="#">SEO</a>
                         <a href="#">JavaScript</a>
                        
                        <a href="#">Apache</a>
                        <a href="#">Linux Server / Cpanel</a>
                        
                        
					</div><!-- End .widget -->
                    
                    <div class="widget tags">
					<h5 class="sub-title">Tags</h5>
                   
                   <?php  $related_tag_array = explode(",", $keywords); 
							$arrlength = count($related_tag_array);
							//trim($str)
							for($x = 0; $x < $arrlength; $x++) { ?>
                            	
                               <a href="<?php echo base_url();?>en/news/tag/<?php echo str_replace(' ','-',trim($related_tag_array[$x]));?>"><?php echo trim($related_tag_array[$x]); ?></a>
									
								<?php } ?>
						
					</div><!-- End .widget -->
				</div>	<!-- End .widgets -->

			</aside><!-- End .one-fourth -->
			<!-- End Sidebar -->

			</div><!-- End .container -->
		</div><!-- End .sect-4 -->
<?php
/*
*
* Template Name: Blog Posts Page
*/
get_header(); 
?>	
	
<section class="banner banner_1_img innerpagebanner">
         <div class="container">
         <div class="rwo">
            <div class="col-sm-12 text-center">           
                  <div class="solution-banner-text">                    
                  </div>               
            </div>
         </div>
      </div>
 </section> 
		<section>
		<div class="container">
			<div class="row">			
				<div class="col-md-12">        
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
						<h2 style="margin-top: 0;"><?php the_title(); ?></h2>
						<div class="article-thumbnail">
						  <?php if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('full');
						  } 
						  ?>   
						</div>
						<p class="singledate"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></p>
						<div class="article-content">
						  <p class="content"><?php if(the_content() != "") echo the_content(); ?></p>
						</div>
						
				</div>	
				<?php endwhile; endif; ?> 
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div id="blogSidebar">
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12 footer-form">
					<a href="https://udbhata.com/resources/" class="backtohome"><u>Back to Home</u></a>
				</div>
			</div>
			<br><br>
		</div>
	</section>

<?php get_footer(); ?>
  <script>
  	$(document).ready(function(){
  		$(".blogg").removeClass('active');
  	});
  </script>
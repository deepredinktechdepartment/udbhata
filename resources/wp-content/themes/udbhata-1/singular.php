<?php
/*
*
* Template Name: Blog Posts Page
*/
get_header(); 
?>	
	

		<div class="container">
			<div class="row">			
				<div class="col-md-8 article-content">        
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
						<h2 style="font-size: 25px;padding: 0px 0px 5px 0px;margin-top: 30px;"><?php the_title(); ?></h2>
						<p><?php echo get_the_date(); ?></p>
						<div class="article-thumbnail">
						  <?php if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('full');
						  } 
						  ?>   
						</div>

						<div class="article-content">
						  <p><?php if(the_content() != "") echo the_content(); ?></p>
						</div>
						
				</div>	
				<?php endwhile; endif; ?> 
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div id="blogSidebar">
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div>
				</div>
			</div>
			<div class="row margin-top-30">
				<div class="col-sm-12 text-center footer-form">

					<a href="<?php echo get_home_url(); ?>/blog"><u>Back to Home</u></a>
				</div>
			</div>
			<br><br>
		</div>

<?php get_footer(); ?>
  <script>
  	$(document).ready(function(){
  		$(".blogg").removeClass('active');
  	});
  </script>
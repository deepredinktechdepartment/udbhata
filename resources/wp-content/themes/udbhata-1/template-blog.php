<?php

/*
*
* Template Name: Blog
*/
get_header(); 

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
?>	

        <section class="blog">	
 		<div class="container">
					<div class="row">
				<div class="col-md-8">
							
					<p class="banner-heading small margin-top-30" style="margin-bottom:18px;"><u>Blog Articles</u></p>				
			
					<?php if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
						


					$temp = $wp_query;  // re-sets query
					$wp_query = null;   // re-sets query
					$args = array (
							'post_type' => 'post',
							'posts_per_page' =>8,
							'paged' => $paged,
							'orderby' => 'publish_date',
							'order'   => 'DESC',
							'ignore_sticky_posts' => 1,				

					
					); 									  
					$wp_query = new WP_Query($args);
					if ( $wp_query->have_posts() ) {			
				    $i = 1; while($wp_query->have_posts()) : $wp_query->the_post();?>				
						<div class="a-post a-post-<?php echo $counter; ?> ">					
							<h3 style="font-size: 25px;padding: 0px 0px 5px 0px;margin: 0px;"><?php the_title(); ?></h3>
							<p class="date"><?php echo get_the_date(); ?></p>						
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<div class="box"> 
							<?php if($image[0]!='') { ?>
								<div class="gallery-thumb" style="background-image:url('<?php echo $image[0]; ?>');background-size: cover; height: 300px;"></div> <?php } ?> 
									<div class="box-body" style="padding-top: 10px;">
									  <?php the_excerpt(); ?>
									  <a style="font-size:13px;color:#7C1847;" href="<?php the_permalink(); ?>" class="read-more-link"><u>Read More ></u></a>
									<hr style="margin:20px;" />			
								</div>
							</div>
						</div>
					
					<?php if ( $i % 3 === 0 ) { echo '</div><div class="row">'; } 
					$i++; endwhile; ?>	

						<nav class="pagination">
						 <?php  echo pagination(); ?>
					</nav>	
					</div>

				
			<?php 

		} 


wp_reset_query();
		?>		
				
				<div class=" col-md-4 pull-right" style="padding-left: 20px;">

					
						<?php if ( $has_sidebar_1 ) { ?>

							
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							

						<?php } ?>
                          
				</div>  
		    </div>	
		</div>
	</section>
	

<?php get_footer(); ?>
<?php
/*
*
* Template Name: Blog
*/
get_header(); 

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
?>	


<section class="banner banner_1_img">
         <div class="container">
         <div class="rwo">
            <div class="col-sm-12 text-center">           
                  <div class="solution-banner-text">                    
                  </div>               
            </div>
         </div>
      </div>
 </section> 
        <section class="blog">	
 		<div class="container">
					<div class="row">
				<div class="col-md-8">
							
					<h2 class="banner-heading small margin-top-30" style="margin-bottom:18px;">Resources</h2>				
			
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
						<div class="a-post a-post-<?php echo $counter; ?> " style="margin-top:25px">						
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<div class="row box">
								<div class="col-sm-5 padding-right">
									<?php if($image[0]!='') { ?>
								<img src="<?php echo $image[0]; ?>" class="img-responsive" alt="post-image">
							<?php } ?> 
								</div>
								<div class="col-sm-7">
									<div class="box-body">					
									<h3 class="post-title" style="font-size: 25px;padding: 0px 0px 5px 0px;margin: 0px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></p>
									<p><?php $content = get_the_excerpt();
                           echo mb_strimwidth($content, 0,100, "...");
                           ?></p>
									  
									  <a style="font-size:13px;margin-top: 10px;" href="<?php the_permalink(); ?>" class="read-more-link">Read More</a>	
								</div>
								</div>
							</div>
							<hr>
						</div>
					
					<?php if ( $i % 8 === 0 ) { echo '</div><div class=" ">'; } 
					$i++; endwhile; ?>	

						<nav class="pagination">
						 <?php  echo pagination(); ?>
					</nav>	
					</div>

				
			<?php 

		} 


wp_reset_query();
		?>		
				
				<div class=" col-md-4 pull-right sidebarcolumn blogsidebar">

					
						<?php if ( $has_sidebar_1 ) { ?>

							
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							

						<?php } ?>
                          
				</div>  
		    </div>	
		</div>
	</section>
	

<?php get_footer(); ?>
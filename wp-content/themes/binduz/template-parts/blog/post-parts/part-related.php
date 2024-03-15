<?php 

	$blog_related_post = binduz_option('blog_related_post','no');
	if( $blog_related_post != 'yes' ){
		return;
	}
	$related_posts =  binduz_related_posts_by_tags();

?>

        <?php if( $related_posts->have_posts() ): ?>
			<div class="binduz-er-blog-related-post">
				<div class="binduz-er-related-post-title">
					<h3 class="binduz-er-title"><?php echo esc_html( binduz_option('blog_related_post_title','Related Post') ); ?></h3>
				</div>
				<div class="binduz-er-blog-related-post-slide">
						<?php 
							
							while ($related_posts->have_posts()) :

								$related_posts->the_post(); 
								$single_cat = '';
								$category   = get_the_category();
								
								if(is_array($category)){
									$cat_count       = count($category);
									$single_cat      = $category[random_int( 0, $cat_count - 1 )];
								}
							
						?>

						<?php  if ( has_post_thumbnail() ) : ?>

							<div class="binduz-er-video-post binduz-er-recently-viewed-item">
								<div class="binduz-er-latest-news-item">
									<div class="binduz-er-thumb">
										<img src="<?php echo esc_url(get_the_post_thumbnail_url(null,'full')); ?>" alt=" <?php the_title_attribute(); ?>">
									</div>
									<div class="binduz-er-content">
										<div class="binduz-er-meta-item">
											<?php if(isset($single_cat->term_id)): ?>
												<div class="binduz-er-meta-categories">
													<a href="<?php echo esc_url(get_category_link( $single_cat->term_id )); ?>"><?php echo esc_html($single_cat->cat_name); ?></a>
												</div>
											<?php endif; ?>
											<?php if( binduz_option('blog_single_date','yes') =='yes' ): ?>
												<div class="binduz-er-meta-date">
													<span><i class="fal fa-calendar-alt"></i><?php echo esc_html(get_the_date( get_option('date_format') )); ?></span>
												</div>
											<?php endif; ?>
										</div>
										<h5 class="binduz-er-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html( wp_trim_words( get_the_title() , binduz_option('blog_related_post_title_limit',3)) ); ?></a></h5>
									</div>
								</div>
							</div>
						<?php  endif; ?>
						
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		<?php endif;?>
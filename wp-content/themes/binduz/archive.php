<?php

    get_header();

    $blog_sidebar  = binduz_option('blog_sidebar',3);
	$blog_layout   = binduz_option('blog_style','style1');
    $column        = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-12' : 'col-lg-9';
	
  
?>
	<?php get_template_part( 'template-parts/breadcrumb/part','breadcrumb' );  ?>
    <main id="qs__blog__main__container" class="qs__blog__main__container binduz-er-top-news-2-area pt-40 qs__blog">
		<div class="qs__blog__inner__container">
			<div class="container qs__blog__container">
				<div class="row">
                    <?php
                        if($blog_sidebar == 2):
                            get_sidebar();
                        endif;
                    ?>
					<div class="<?php echo esc_attr($column); ?> qs__blog__archives">
						<div class="qs__blog__content">
					       <?php if($blog_layout == 'style1'): ?>

									<?php

										if ( have_posts() ) :

											/* Start the Loop */
											while ( have_posts() ) :
												the_post();

												/*
												* Include the Post-Type-specific template for the content.
												* If you want to override this in a child theme, then include a file
												* called content-___.php (where ___ is the Post Type name) and that will be used instead.
												*/
											
												get_template_part( 'template-parts/blog/contents/content','layout');
												
										
											endwhile;

										else :

											get_template_part( 'template-parts/content', 'none' );

										endif;

									?>
									
						<?php else: ?>
							<?php get_template_part( 'template-parts/blog/contents/content','archive'); ?>
						<?php endif; ?>
						</div>
						<div class="qs__blog__posts__pagination">
							<?php binduz_pagination(); ?>
						</div>

					</div>

                    <?php
                        if($blog_sidebar == 3):
                            get_sidebar();
                        endif;
                    ?>

				</div>
			</div>
		</div>

	</main><!-- #main -->
<?php

	get_footer();
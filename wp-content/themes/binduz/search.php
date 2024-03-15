<?php

    get_header();
    $blog_sidebar  = binduz_option('blog_sidebar',3);
    $column        = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-12' : 'col-lg-8';
	
?>


	<main id="qs__blog__main__container" class="qs__blog__main__container binduz-er-top-news-2-area pt-40 qs__blog">
		<div class="qs__blog__inner__container ">
			<div class="container qs__blog__container">
				<div class="row">
                    <?php
                        if($blog_sidebar == 2):
                            get_sidebar();
                        endif;
                    ?>
					<div class="<?php echo esc_attr($column); ?> qs__blog__archives">
						<div class="qs__blog__content">
							<div class="row"><!-- Inner Header Row -->
								<div class="col-xs-12"><!-- Inner Header Column -->
									<div class="qs__page__inner__header qs__search"><!-- Inner Header -->
										<h3 class="qs__inner__header__title">
											<?php
												echo '<span class="search__header__pre__text">'.esc_html__( 'Search Results for:', 'binduz' ).'</span>' . '<span>' . get_search_query() . '</span>'
											?>
										</h3>
									</div><!-- Inner Header End -->
								</div><!-- Inner Header Columns End -->
							</div><!-- Inner Header Row End-->
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

									get_template_part( 'template-parts/blog/contents/content', 'none' );

								endif;
							?>
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

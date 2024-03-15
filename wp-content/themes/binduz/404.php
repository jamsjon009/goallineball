<?php

    get_header();

?>
 
    <main id="qs__blog__main__container" class="qs__blog__main__container binduz-er-author-item-area pb-20 qs__blog"><!-- Main Container Start -->
		<div class="qs__blog__inner__container"><!-- Inner Container Start -->
			<div class="container qs__blog__container"><!-- Inner Blog Container Start -->
				<div class="qs__error__404 text-center"><!-- ERROR 404 Start -->
					<div class="row"><!-- Inner Header Row -->
						<div class="col-xs-12"><!-- Inner Header Column -->
							<div class="area404">
								<img src="<?php echo esc_url(BINDUZ_IMG) ?>/404.svg" alt="<?php echo esc_attr__('Page not found', 'binduz'); ?>">
							</div>
							<div class="qs__page__inner__header qs__404">
								<h3 class="qs__inner__header__title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'binduz' ); ?></h3>
							</div>

							<div class="search__content"><!-- Search Content  -->
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'binduz' ); ?></p>
								<a class="binduz-er-main-btn" href="<?php echo esc_url( home_url('/') ) ?>"><?php echo esc_html__( 'Go Back Home', 'binduz' ); ?></a>
							</div><!-- search-content End -->

						</div><!-- Inner Header Columns End -->
					</div><!-- Inner Header Row End-->

				</div><!-- ERROR 404 END -->

			</div><!-- Inner Blog Container End -->
		</div><!-- Inner Container End -->
	</main><!-- Main Container End -->
    
<?php

	get_footer();
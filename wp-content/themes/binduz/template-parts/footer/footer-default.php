<?php

    $binduz_copyright_text = binduz_option('footer_copyright', esc_html__('&copy; 2022, Binduz. All Rights Reserved. ', 'binduz'));
    
?>

	<!--::::: FOOTER AREA START :::::::-->
	<footer class="qs__blog__footer__area"><!-- Footer Area Start -->
		<div class="qs__blog__default__footer"><!-- Default Footer Area -->

			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="qs__blog__footer__top__area qs__blog__footer__widget__area"><!-- Footer Widget Area -->
				<div class="container"><!-- Container -->
					<div class="row"><!-- Row -->

					<?php if( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="col-md-6 col-lg-3">
						<div class="qs__blog__single__footer">
						<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="col-md-6 col-lg-3">
						<div class="qs__blog__single__footer">
						<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					</div>
					<?php endif; ?>
					
					<?php if( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="col-md-6 col-lg-3">
						<div class="qs__blog__single__footer">
						<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					</div>
					<?php endif; ?>
					
					<?php if( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="col-md-6 col-lg-3">
						<div class="qs__blog__single__footer">
						<?php dynamic_sidebar( 'footer-4' ); ?>
						</div>
					</div>
					<?php endif; ?>

					</div><!-- Row End -->
				</div><!-- Container End -->
				</div><!-- Footer Widget Area End -->
			<?php endif; ?>


			<div class="qs__blog__footer__bottom__area qs__blog__footer__copyright__area"><!-- Footer Copyright Area -->
				<div class="container">
				<div class="row">
					<div class="col-lg-<?php echo esc_attr(has_nav_menu( 'footer_menu' )?'6':'12'); ?>">
						<div class="qs__blog__footer__copyright">
							<p> <?php echo binduz_kses($binduz_copyright_text); ?> </p>
						</div>
					</div>
					<?php  if ( has_nav_menu( 'footer_menu' ) ) { ?>
                        <div class="col-lg-6">
                          <?php get_template_part( 'template-parts/navigations/nav', 'footer' ); ?>
                        </div>
                    <?php } ?>
				</div>
				</div>
			</div><!-- Footer Copyright Area End-->
		
		</div><!-- Default Footer Area End-->
	</footer><!-- Footer Area Start End -->
	<!--::::: FOOTER AREA END :::::::-->
   

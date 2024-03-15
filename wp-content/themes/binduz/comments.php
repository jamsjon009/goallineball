<?php
use Binduz\Core\Binduz_Walker_Comment;
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
?>
<?php
	if ( post_password_required() ) {
		return;
	}
?>

<div class="qs__blog__comments__container"> <!-- Comments Container Start -->
	<div id="qs__blog__comments" class="qs__blog__comments__area"> <!-- Comments Area Start -->
		<?php if ( have_comments() ) : // Check for have_comments(). ?>
			<div class="qs__blog__comments__header"><!-- Comments Header -->
				<h3 class="qs__blog__comments__title">
					<?php
						$binduz_comment_count = get_comments_number();
						if ( '1' === $binduz_comment_count ) {
							printf(
								esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'binduz' ),
								'<span>' . wp_kses_post( get_the_title() ) . '</span>'
							);
						} else {
							printf(
								esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $binduz_comment_count, 'comments title', 'binduz' ) ),
								number_format_i18n( $binduz_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'<span>' . wp_kses_post( get_the_title() ) . '</span>'
							);
						}
					?>
				</h3>
			</div><!-- Comments Header End -->
			
			<div class="qs__blog__comments__pagination">
				<?php binduz_comments_pagination(); ?>
			</div>
 
			<div class="qs__blog__comments__lists__area"><!-- Comments list Area Start -->
				<div class="qs__blog__comments__list"><!-- Comments list Start -->
					<?php
						wp_list_comments(
							array(
								'style'      => 'div',
								'short_ping' => true,
								'walker'     => new Binduz_Walker_Comment(),
							)
						);
					?>
				</div><!-- Comments list End -->
			</div><!-- Comments list Area End -->

			<div class="qs__blog__comments__pagination">
				<?php binduz_comments_pagination(); ?>
			</div>
			
			<?php if ( ! comments_open() ) : ?>
			<div class="qs__blog__colse__comment">
				<p class="qs__block__no__comments__msg"><?php esc_html_e( 'Comments are closed.', 'binduz' ); ?></p>
			</div>
			<?php endif; ?>

		<?php endif; // Check for have_comments(). ?>

		<?php if ( comments_open() || get_comments_number() ) : ?>
		<div class="qs__blog__comment__form binduz-er-blog-post-form">
		  <?php binduz_comment_form() ?>
		</div>
		<?php endif; ?>
	</div> <!-- Comments Area Start -->
</div> <!-- Comments Container Start -->
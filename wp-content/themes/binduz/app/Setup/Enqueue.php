<?php

namespace Binduz\Setup;

/**
 * Enqueue.
 */
class Enqueue
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
	}


	public function enqueue_scripts()
	{

		// stylesheets
		// ::::::::::::::::::::::::::::::::::::::::::
		if (!is_admin()) {

			// 3rd party css
			wp_enqueue_style('binduz-fonts', binduz_google_fonts_url(['Roboto:300,400,500,600,700,900']), null, BINDUZ_VERSION);
			wp_enqueue_style('bootstrap', BINDUZ_CSS . '/bootstrap.min.css', null, BINDUZ_VERSION);
			wp_enqueue_style('fontawesome', BINDUZ_CSS . '/font-awesome.min.css', null, BINDUZ_VERSION);
			wp_enqueue_style('magnific-popup', BINDUZ_CSS . '/magnific-popup.css', null, BINDUZ_VERSION);
			wp_enqueue_style('nice-select', BINDUZ_CSS . '/nice-select.css', null, BINDUZ_VERSION);
			wp_enqueue_style('slick', BINDUZ_CSS . '/slick.css', null, BINDUZ_VERSION);

			// theme css

			wp_enqueue_style('binduz-wp-default', BINDUZ_CSS . '/wp-default.css', null, BINDUZ_VERSION);
			wp_enqueue_style('binduz-blog', BINDUZ_CSS . '/blog.css', null, BINDUZ_VERSION);
			wp_enqueue_style('binduz-style', BINDUZ_CSS . '/style.css', null, BINDUZ_VERSION);
		}

		// javascripts
		// :::::::::::::::::::::::::::::::::::::::::::::::
		if (!is_admin()) {

			// 3rd party scripts

			wp_enqueue_script('bootstrap', BINDUZ_JS . '/bootstrap.min.js', array('jquery'), BINDUZ_VERSION, true);
			wp_enqueue_script('popper', BINDUZ_JS . '/popper.min.js', array('jquery'), BINDUZ_VERSION, true);
			wp_enqueue_script('slick', BINDUZ_JS . '/slick.min.js', array('jquery'), BINDUZ_VERSION, true);
			wp_enqueue_script('nice-select', BINDUZ_JS . '/jquery.nice-select.min.js', array('jquery'), BINDUZ_VERSION, true);
			wp_enqueue_script('isotope', BINDUZ_JS . '/isotope.pkgd.min.js', array('jquery', 'imagesloaded'), BINDUZ_VERSION, true);
			wp_enqueue_script('magnific-popup', BINDUZ_JS . '/jquery.magnific-popup.min.js', array('jquery'), BINDUZ_VERSION, true);
			wp_enqueue_script('goodshare', BINDUZ_JS . '/goodshare.min.js', array('jquery'), BINDUZ_VERSION, true);

			// theme scripts

			wp_enqueue_script('binduz-main', BINDUZ_JS . '/main.js', array('jquery', 'slick', 'magnific-popup', 'nice-select'), BINDUZ_VERSION, true);



			$binduz_data = [
				'ajax_url' => admin_url('admin-ajax.php'),
				'loadmore_text' => esc_html__('Loading More Posts...', 'binduz'),
				'newsticker_nav' => binduz_option('newsticker_nav_enable') === 'yes' ? 'yes' : 'no',
			];

			// if (is_page()) {
			// 	$newsticker_nav = binduz_meta_option(get_the_id(), 'newsticker_nav_enable', 'yes') == 'yes' ? true : false;
			// 	$binduz_data['newsticker_nav'] = $newsticker_nav;
			// }

			wp_localize_script('binduz-main', 'binduz_obj', $binduz_data);
			// Load WordPress Comment js
			if (is_singular() && comments_open() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}
		}
	}
}

<?php
      use NewsprkEssential\Api\Open_Weather_Api;

      $binduz_class        = '';
      $user_account        = binduz_option('user_account');
      $binduz_main_logo    = binduz_option('general_main_logo');
      $offcanvas_logo      = binduz_option('general_offcanvas_logo');
      $contact_info        = binduz_option('general_offcanvas_contact_info');
      $header_show_search  = binduz_option('header_show_search','no');
      $header_show_login   = binduz_option('header_show_login','no');
      $header_show_weather = binduz_option('header_show_weather','no');
      $header_show_lang    = binduz_option('header_show_lang','no');
      $weather_forcast     = binduz_option('weather_forcast');
      $logo_url            = binduz_src( 'general_main_logo', BINDUZ_IMG . '/logo.png' );
      $offcanvas_logo_url  = binduz_src( 'general_offcanvas_logo', BINDUZ_IMG . '/logo-6.png' );
      $general_search_logo = binduz_src( 'general_search_logo', BINDUZ_IMG . '/logo-4.png' );
      $login_link          = '#';

		if(isset($user_account['yes'])){
			$login_link = $user_account['yes']['login_link'];
		}
      
?>


    <?php get_template_part( 'template-parts/blog/post-parts/part','offcanvas'); ?>
    
    <!--====== SEARCH PART START ======-->
    <?php get_template_part( 'template-parts/blog/post-parts/part','search'); ?>

    <!--====== SEARCH PART ENDS ======-->

    <!--====== BINDUZ TOP HEADER PART START ======-->
    <?php get_template_part( 'template-parts/topbar/content','style'); ?>
  

	<header class="binduz-er-header-area er-news-header-one">
       <?php get_template_part( 'template-parts/topbar/content','ad'); ?>
        <div class="binduz-er-header-nav">

            <div class="container">
                <div class="row">
              
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-brand logo">
									<?php echo  binduz_text_logo()?'<h1 class="logo-title">':''; ?> 
										<a href="<?php echo esc_url(home_url('/')); ?>">
											<?php if(binduz_text_logo()): ?> 
											<?php echo esc_html(binduz_text_logo()); ?>
											<?php else: ?>
												<img  class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo get_bloginfo('name') ?>">
											<?php endif; ?>
										</a>
									<?php echo binduz_text_logo()?'</h1>':''; ?>
								</div> <!-- logo -->
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                	<?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
                                </div> <!-- navbar collapse -->
                                <div class="binduz-er-navbar-btn d-flex">
                                    <div class="binduz-er-widget d-flex">
										<?php if($header_show_search =='yes'): ?>
                                        	<a class="binduz-er-news-search-open" href="#"><i class="fa fa-search"></i></a>
										<?php endif; ?>
										<?php if($header_show_login == 'yes'): ?>
                                        	<a href="<?php echo esc_url($login_link); ?>"><i class="far fa-user"></i></a>
										<?php endif; ?>
                                    </div>
                                    <span class="binduz-er-toggle-btn binduz-er-news-canvas_open d-block d-lg-none">
                                        <i class="fal fa-bars"></i>
                                    </span>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>
    </header>
    <!--====== BINDUZ TOP HEADER PART ENDS ======-->

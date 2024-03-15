    
    <?php
      
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
      $offcanvas_logo_url  = binduz_src( 'general_offcanvas_logo', BINDUZ_IMG . '/logo-5.png' );
      $general_search_logo = binduz_src( 'general_search_logo', BINDUZ_IMG . '/logo-4.png' );
      $login_link          = '#';
      $multi_lng_list      = binduz_option('header_multi_lng_list',[]);
		if(isset($user_account['yes'])){
			$login_link = $user_account['yes']['login_link'];
		}
	  
    ?>
    <!--====== OFFCANVAS MENU PART START ======-->

    <?php get_template_part( 'template-parts/blog/post-parts/part','offcanvas'); ?>
    
    <!--====== SEARCH PART START ======-->
    <?php get_template_part( 'template-parts/blog/post-parts/part','search'); ?>

    <!--====== SEARCH PART ENDS ======-->
  

    <!--====== BINDUZ HEADER PART START ======-->

    <header class="binduz-er-header-area binduz-er-header-area-3 er-news-header-three">
        <div class="binduz-er-header-nav">
            <div class=" container-fluid p-0">
                <div class="row">
                    <div class=" col-lg-12">
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
                                    <?php get_template_part( 'template-parts/navigations/nav', 'secondary' ); ?>
                                </div> <!-- navbar collapse -->
                                <div class="binduz-er-navbar-btn d-flex">
                                    <?php if($header_show_lang =='yes'): ?>
                                        <div class="binduz-er-header-dropdown-select binduz-er-select-item d-none d-sm-block">
                                            <select onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                                                <?php foreach($multi_lng_list as $lang): ?>
                                                    <option value=" <?php echo esc_url($lang['url']); ?>"> <?php echo esc_html($lang['title']); ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($header_show_search =='yes'): ?>
                                        <div class="binduz-er-widget d-flex">
                                            <a class="binduz-er-news-search-open" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                                        </div>
                                    <?php endif; ?>
                                    <span class="binduz-er-toggle-btn toggle-btn binduz-er-news-canvas_open d-block">
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

    <!--====== BINDUZ HEADER PART ENDS ======-->
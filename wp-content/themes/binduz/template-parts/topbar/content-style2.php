	<?php
	 
	use Element_Ready\Api\Open_Weather_Api;
     
	if(!class_exists('Element_Ready\Api\Open_Weather_Api')){
		return;
	}
	$binduz_topbar_show   = binduz_option('topbar_show','no');

    if($binduz_topbar_show != 'yes' ){
		return;
	}

	$header_show_lang    = binduz_option('header_show_lang','no');
	$header_show_login   = binduz_option('header_show_login','no');
	$user_account        = binduz_option('user_account');
	$login_link = '#';

	if(isset($user_account['yes'])){
		$login_link = $user_account['yes']['login_link'];
	}

	if(class_exists('Element_Ready\Api\Open_Weather_Api')){

		$header_show_weather = binduz_option('header_show_weather','no');
		$weather_forcast     = binduz_option('weather_forcast');
		$Open_Weather_Api = new Open_Weather_Api();
		$weather_forcast['weather_coordinate'] = 'no';
		
		if(isset($weather_forcast['data_source']) && $weather_forcast['data_source'] =='coordinate'){
			$weather_forcast['weather_coordinate'] = 'yes';
		} 
	
		$weather_forcast['units']   = 'imperial';                                //°F
		$weather_data   			= $Open_Weather_Api->get($weather_forcast);
		$weather_forcast['units']   = 'metric';                                  // °C
		$weather_data_celc 			= $Open_Weather_Api->get($weather_forcast);
	}
	
	
	?>
	
	<div class="binduz-er-news-top-header-area-2 bg_cover">
        <div class=" container">
            <div class="row align-items-center">
                <div class=" col-lg-6 col-md-5">
                    <div class="binduz-er-news-top-header-btns">
                        <ul>
                            <li>
                                <span class="binduz-er-toggle-btn binduz-er-news-canvas_open"><i class="fal fa-bars"></i><?php echo esc_html__('Menu','binduz'); ?> </span>
                            </li>
                            <li>
                                <a class="binduz-er-news-search-open" href="#"><i class="fa fa-search"></i> <?php echo esc_html__('Search','binduz'); ?> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" col-lg-6 col-md-7">
                    <div class="binduz-er-news-top-header-weather">
                        <ul>
							<?php if( class_exists('Element_Ready\Api\Open_Weather_Api') ) { ?> 
							    <?php if( isset( $weather_data->main->temp ) ): ?>
									<li><a href="javascript:void(0)"><i class="fal fa-cloud"></i> <?php echo esc_html($weather_data->main->temp); ?><?php echo esc_html__('°F','binduz'); ?> </a></li>
								<?php endif; ?>
								<?php if( isset( $weather_data_celc->main->temp ) ): ?>
									<li><a href="javascript:void(0)"><i class="fal fa-cloud"></i> <?php echo esc_html($weather_data_celc->main->temp); ?><?php echo esc_html__('°C','binduz') ?> </a></li>
								<?php endif; ?>
							<?php } ?>
							<?php if($header_show_login =='yes'): ?>
                            	<li><a href="<?php echo esc_url($login_link); ?>"><i class="fal fa-user"></i> <?php echo esc_html__('Login','binduz'); ?> </a></li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

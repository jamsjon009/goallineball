<?php 

	use Element_Ready\Api\Open_Weather_Api;
     
	if(!class_exists('Element_Ready\Api\Open_Weather_Api')){
		return;
	}

	$binduz_topbar_show   = binduz_option('topbar_show','no');
    if($binduz_topbar_show != 'yes' ){
		return;
	}

	$header_show_weather = binduz_option('header_show_weather','no');
	$weather_forcast     = binduz_option('weather_forcast');
	$header_show_lang    = binduz_option('header_show_lang','no');
	$multi_lng_list      = binduz_option('header_multi_lng_list',[]);
     
	$Open_Weather_Api = new Open_Weather_Api();
	$weather_forcast['weather_coordinate'] = 'no';
	
    if(isset($weather_forcast['data_source']) && $weather_forcast['data_source'] =='coordinate'){
		$weather_forcast['weather_coordinate'] = 'yes';
	} 

	$weather_forcast['units']   = 'imperial';                                //°F
	$weather_data   			= $Open_Weather_Api->get($weather_forcast);
	$weather_forcast['units']   = 'metric';                                  // °C
	$weather_data_celc 			= $Open_Weather_Api->get($weather_forcast);
	
?>

	
	<div class="binduz-er-top-header-area-4 bg_cover d-none d-lg-block">
        <div class=" container">
            <div class="row align-items-center">
                <div class=" col-lg-6 col-md-7">
					<?php if( $header_show_lang =='yes' ): ?>
						<div class="binduz-er-top-header-lang">
							<div class="binduz-er-select-item">
								<select onChange="window.document.location.href=this.options[this.selectedIndex].value;">
								    <?php foreach($multi_lng_list as $lang): ?>
										<option value=" <?php echo esc_url($lang['url']); ?>"> <?php echo esc_html($lang['title']); ?> </option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					<?php endif; ?>
					<?php if( $header_show_weather =='yes' ): ?>
						<div class="binduz-er-top-header-weather">
							<ul>
								<?php if( isset( $weather_data->main->temp ) ): ?>
									<li><a href="#"><i class="fal fa-cloud"></i> <?php echo esc_html( $weather_data->main->temp ); ?> <?php echo esc_html__('°F','binduz'); ?></a></li>
								<?php endif; ?>
								<?php if( isset( $weather_data_celc->main->temp ) ): ?>
									<li><a href="#"><i class="fal fa-cloud"></i> <?php echo esc_html( $weather_data_celc->main->temp ); ?> <?php echo esc_html__('°C','binduz') ?> </a></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
                </div>
               
				<?php  get_template_part( 'template-parts/tranding/content','style4');  ?>

            </div>
        </div>
    </div>
	


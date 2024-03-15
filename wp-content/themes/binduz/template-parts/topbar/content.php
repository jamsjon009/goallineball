

<?php 
	$binduz_topbar_show   = binduz_option('topbar_show','no');
	$topbar_show_button   = binduz_option('topbar_show_button','no');
	$topbar_subs_button   = binduz_option('topbar_subs_button');
	$button_text = esc_html__('Subscribe','binduz');
	$button_url  = '#';
	if($binduz_topbar_show != 'yes' ){
		return;
	}
    
	if(isset($topbar_subs_button['yes'])){
		$button_text = $topbar_subs_button['yes']['text'];
		$button_url = $topbar_subs_button['yes']['link'];
	}
	

?>
  <div class="binduz-er-top-header-area">
        <div class="binduz-er-bg-cover"></div>
        <div class="container">
            <div class="row align-items-center">
				 <?php  get_template_part( 'template-parts/tranding/content','default');  ?>
                 <div class="col-lg-6">
                    <div class="binduz-er-topbar-social d-flex justify-content-end align-items-center">
						<?php get_template_part( 'template-parts/topbar/social');  ?>
						<?php if($topbar_show_button == 'yes'): ?>
							<div class="binduz-er-news-subscribe-btn">
								<a class="binduz-er-main-btn" href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_text); ?></a>
							</div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
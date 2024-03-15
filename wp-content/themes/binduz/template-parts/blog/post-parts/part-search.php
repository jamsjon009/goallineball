  <?php 

        $header_show_search  = binduz_option('header_show_search','no');
        $general_search_logo = binduz_src( 'general_search_logo', BINDUZ_IMG . '/logo-4.png' );

  ?>
  
  <!--====== SEARCH PART START ======-->
  
  <?php if( $header_show_search =='yes' ): ?>
        <div class="binduz-er-news-search-box">
            <div class="binduz-er-news-search-header">
                <div class="container mt-60">
                    <div class="row">
                        <div class="col-6">
                            <?php if( $general_search_logo !='' ): ?>
                                <h5 class="binduz-er-news-search-title"><img src="<?php echo esc_url( $general_search_logo ) ?>" alt="<?php echo esc_attr__('Search','binduz'); ?>"></h5> <!-- search title -->
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <div class="binduz-er-news-search-close float-end">
                                <button class="binduz-er-news-search-close-btn"><?php echo esc_html__('Close','binduz'); ?> <span></span><span></span></button>
                            </div> <!-- search close -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- search header -->
            <div class="binduz-er-news-search-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="binduz-er-news-search-form">
                                <?php get_search_form() ?>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- search body -->
        </div>
    <?php endif; ?>

    <!--====== SEARCH PART ENDS ======-->
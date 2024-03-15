    <?php

        
        $blog_breadcrumb_show = binduz_option('blog_breadcrumb','yes');
        
        if(is_singular( 'post' )){
        
        $blog_sidebar = binduz_option('post_sidebar_layout',3);
        $override     = binduz_meta_option(get_the_id(),'override_default_layout','no');
        // override sidebar layout
        if($override == 'yes'){  
            $blog_sidebar = binduz_meta_option(get_the_id(),'post_sidebar_layout',1);
        }
        
        
        }

        if(is_category()){
        // override category breadcrumb 
            $override             = binduz_term_option(get_queried_object_id(),'override_default','no');
            $blog_breadcrumb_show = binduz_term_option(get_queried_object_id(),'blog_breadcrumb','yes');
        }

        
        if( $blog_breadcrumb_show != 'yes' ){
            return;
        }

          

    ?>
    
    <div class="binduz-er-breadcrumb-area <?php echo esc_attr( ! has_post_thumbnail()?'binduz-er-news-breadcrumb-no-image':'' ); ?> ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="binduz-er-breadcrumb-box">
                        <nav aria-label="breadcrumb">
                            <?php binduz_get_breadcrumbs(''); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
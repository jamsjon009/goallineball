    <?php

          
        $blog_breadcrumb_show = binduz_option('blog_breadcrumb','yes');

        if( is_category() ){
        // override category breadcrumb 
            $override             = binduz_term_option(get_queried_object_id(),'override_default','no');
            if($override == 'yes'){
                $blog_breadcrumb_show = binduz_term_option(get_queried_object_id(),'blog_breadcrumb','yes');
            }
        
        }
        
        if( $blog_breadcrumb_show != 'yes' ){
            return;
        }

    ?>
    
    <div class="binduz-er-breadcrumb-area">
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
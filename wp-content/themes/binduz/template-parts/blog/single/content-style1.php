 
    <?php 

        $blog_sidebar = binduz_option('post_sidebar_layout',3);
        $override     = binduz_meta_option(get_the_id(),'override_default_layout','no');
        $banner_image = '';
        // override sidebar layout

        if($override == 'yes'){  
            $blog_sidebar = binduz_meta_option(get_the_id(),'post_sidebar_layout',1);
        }

        $column = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-12 mx-auto' : 'col-lg-9';
        
        $_blog_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );
       
        if( isset($_blog_image) && $_blog_image != ''){
            $banner_image = 'style="background-image:url('.esc_url( $_blog_image ).');"';
        }
  
    ?>
    
    <?php get_template_part( 'template-parts/breadcrumb/part','breadcrumb' );  ?>
    
    <?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
        <div class="binduz-er-blog-bg-area" <?php echo binduz_kses($banner_image); ?>></div>
    <?php endif; ?>

    <div class="binduz-er-author-item-area binduz-er-author-item-layout-1 pb-20" >
        <div class="container qs__blog__container"> <!-- Inner Blog Container Start -->
            <div class="row"> <!-- Main Row Start -->
                
                <!-- Widget Column start -->
                <?php

                    if($blog_sidebar == 2):
                        get_sidebar('single');
                    endif;

                ?>
                <!-- Widget Column End -->
                <div class="<?php echo esc_attr($column); ?> qs__blog__post"> <!-- Content Column Start -->
                    <div class="qs__post__content">
                        <?php
                            while ( have_posts() ) :

                                the_post();
                        
                                ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(["binduz-er-author-item","post-single",'mb-40']); ?>>
                                    <?php
                                        get_template_part( 'template-parts/blog/single/style/content','style1' ); 
                                    ?>
                                </article> 
                            
                                <?php

                             

                            endwhile; // End of the loop.
                        ?>
                    </div>						
                </div> <!-- Content Column End -->

                <!-- Widget Column start -->
                <?php

                    if($blog_sidebar == 3):
                        get_sidebar('single');
                    endif;

                ?>
                <!-- Widget Column End -->

            </div> <!-- Main Row End -->
        </div> <!-- Inner Blog Container End -->
    </div> <!-- Inner Container End -->
    
    <?php binduz_set_postview(); ?>
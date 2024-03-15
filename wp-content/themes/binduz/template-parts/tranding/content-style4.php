<?php
use Binduz\Core\Tranding_Post;

    $post  = new Tranding_Post();
    $query = $post->get();
    if(!$query){
        return;
    }
?>

    <div class=" col-lg-6 col-md-5">    
        <div class="binduz-er-topbar-headline-2 binduz-er-topbar-headline-slider float-end">
                <?php 

                    while($query->have_posts()) : 
                    $query->the_post(); 

                ?>
                    <p>
                        <span><i class="fas fa-bolt"></i> 
                             <?php echo binduz_option('newsticker_title','Tranding News:'); ?>
                        </span> 
                        <a href="<?php the_permalink(); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), binduz_option('newsticker_post_title_limit',10), '')); ?> </a>
                    </p>
            
                <?php

                    endwhile;
                    wp_reset_postdata(); 

                ?>
        </div>
    </div>

 

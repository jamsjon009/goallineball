<?php if($settings['show_post_meta'] == 'yes'): ?>
 

        <?php  $categories = get_the_category($post->ID);
            if(! empty( $categories) && $settings['show_cat'] == 'yes' ): ?>
             <div class="binduz-er-meta-categories">
               <?php echo '<a class="element-ready-cat" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; ?>
            </div>
        <?php endif; ?>
    
  
<?php endif; ?>
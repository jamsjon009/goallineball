        <?php
   
            $footer_style = binduz_option( 'footer_style','default' );
           
        ?>
        <?php  get_template_part( 'template-parts/footer/footer', $footer_style ); ?>
        <?php wp_footer(); ?>
    </body>
</html>

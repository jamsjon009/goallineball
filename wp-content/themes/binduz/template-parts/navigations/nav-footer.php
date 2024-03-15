<?php
use Binduz\Core\WalkerNav;

  

      wp_nav_menu([
         'menu'            => 'footer_menu',
         'theme_location'  => 'footer_menu',
         'container'       => 'div',
         'container_id'    => 'footer-nav',
         'container_class' => 'binduz-er-copyright-menu float-lg-end float-none',
         'menu_id'         => '',
         'menu_class'      => '',
         'depth'           => 1,
         'walker'          => new WalkerNav(),
         'fallback_cb'     => '\Binduz\Core\WalkerNav::fallback',
      ]);


?>
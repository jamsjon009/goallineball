<?php
use Binduz\Core\WalkerNav_Offcanvas;

wp_nav_menu([
	'menu'            => 'primary',
	'theme_location'  => 'primary',
	'container'       =>  null,
	'container_id'    => null,
	'container_class' => '',
	'menu_id'         => '',
	'menu_class'      => 'binduz-er-news-offcanvas_main_menu',
	'depth'           => 3,
	'walker'          => new WalkerNav_Offcanvas(),
	'fallback_cb'     => '\Binduz\Core\WalkerNav_Offcanvas::fallback',
]);
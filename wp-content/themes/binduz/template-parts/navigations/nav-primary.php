<?php

use Binduz\Core\WalkerNav;

wp_nav_menu([
	'menu'            => 'primary',
	'theme_location'  => 'primary',
	'container'       => false,
	'container_id'    => 'primary-nav',
	'container_class' => '',
	'menu_id'         => '',
	'menu_class'      => 'navbar-nav m-auto',
	'depth'           => 3,
	'walker'          => new WalkerNav(),
	'fallback_cb'     => '\Binduz\Core\WalkerNav::fallback',
]);

?>

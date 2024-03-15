<?php

/**
 * @package  Element Ready
 */
namespace Binduz_Essential\Base\CPT;
use Element_Ready\Api\Callbacks\Custom_Taxonomy;

class Feature_Request_Cat extends Custom_Taxonomy
{
    public $name         = '';
    public $menu         = 'category';
    public $textdomain   = '';
    public $posts        = array('cus_f_request');
    public $public_quary = false;
    public $slug         = 'er_cr_category';
    public $search       = true;

	public function register() {
        
        $this->name = esc_html__('Categories', 'binduz-essential');
    	add_action( 'init', array( $this, 'create_taxonomy' ) );
    }

    public function create_taxonomy(){
        $this->init('er_cr_category', esc_html__('Category','binduz-essential'), esc_html__('Category','binduz-essential'), $this->posts);
        $this->register_taxonomy();
    }
    
}
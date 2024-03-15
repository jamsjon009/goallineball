<?php
namespace Binduz\Core\Hook;

/**
 * Tags.
 */
class Blog
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{
		
		add_filter( 'comment_form_defaults', [$this,'binduz_add_submit_button_attr_class'] );
		add_filter( 'get_search_form', [$this,'binduz_search_form'] );
		// social share
		add_action( 'the_content',  [$this, 'update_share_count' ] );
		add_action( 'publish_page', [$this, 'binduz_insert_facebook_share_custom_field' ] );
        add_action( 'publish_post', [$this, 'binduz_insert_facebook_share_custom_field' ] );
        add_filter( 'binduz_blog_read_more', [$this, 'blog_read_more' ] );
        add_filter( 'binduz_blog_crop_title', [$this, 'blog_crop_title' ] );
        add_filter( 'binduz_blog_crop_desc', [$this, 'blog_crop_desc' ] );
		add_filter( 'comment_form_fields', [$this,'move_comment_field'] );
		
		if(!is_admin()) { 
			add_filter('pre_get_posts',[$this,'binduz_search_filter']);
		}
		
	}

	
	function move_comment_field( $fields ) {
		$override    = binduz_meta_option(get_the_id(),'override_default_layout','no');
		$post_layout = binduz_option('post_header_layout','style1');
		// override layout
		
		if($override == 'yes'){  
			$post_layout = binduz_meta_option(get_the_id(),'post_header_layout','style1');
		}
		if($post_layout == 'style2'){
			$comment_field = $fields['comment'];
			unset( $fields['comment'] );
			$fields['comment'] = $comment_field;
		}
		
		return $fields;
	}

    public function blog_read_more($default){

		$override = binduz_term_option(get_queried_object_id(),'override_default','no');

		if($override == 'yes'){
			
	    	return binduz_term_option(get_queried_object_id(),'blog_readmore','no');
		}

		return binduz_option('blog_readmore',$default);
    }
	/** 
	* blog title crop 
	*  return type int
	*/
    public function blog_crop_title($default = 10){

		$title = binduz_option('blog_crop_title');
		$override = binduz_term_option(get_queried_object_id(),'override_default','no');
	
		if($override == 'yes'){

		   $title = binduz_term_option(get_queried_object_id(),'blog_crop_title');
		   if(isset( $title['block_crop_title_switch'] ) && $title['block_crop_title_switch'] == 'yes'){
				return isset($title['yes']['block_crop_title_limit'])?$title['yes']['block_crop_title_limit']:10; 
		    }
		  
		}else{
             
			if(isset( $title['block_crop_title_switch'] ) && $title['block_crop_title_switch'] == 'yes') {
		   		return isset($title['yes']['block_crop_title_limit'])?$title['yes']['block_crop_title_limit']:10; 
			 }
		}
	  
		return $default;
	}
	
   /** 
	* blog desc crop 
	*  return type int
	*/
   public function blog_crop_desc($default=40){

		$title = binduz_option('blog_crop_desc');
		$override = binduz_term_option(get_queried_object_id(),'override_default','no');
		
		if($override == 'yes'){

			$title = binduz_term_option(get_queried_object_id(),'blog_crop_desc');
			if(isset( $title['block_crop_desc_switch'] ) && $title['block_crop_desc_switch'] == 'yes'){
				return isset($title['yes']['block_crop_desc_limit'])?$title['yes']['block_crop_desc_limit']:10; 
			}

		}else{
           
			if(isset( $title['block_crop_desc_switch'] ) && $title['block_crop_desc_switch'] == 'yes'){
				return isset($title['yes']['block_crop_desc_limit'])?$title['yes']['block_crop_desc_limit']:35; 
			}
		}
	
	
		return $default;
   }

	public function binduz_search_form( $form ) {
		
		$form = '
			<form method="get" action="' . esc_url( home_url( '/' ) ) . '">
			       <div class="binduz-er-input-box">
		        	<input name="s" type="search" placeholder="'.esc_attr__('Search here','binduz').'">
					<button><i class="fal fa-search"></i></button>
					</div>
			</form>';
	   return $form;
	}

	public function binduz_add_submit_button_attr_class( $arg ) {
 
		$arg['class_submit'] = 'submit btn-comment btn btn-primary';

		return $arg;
	}

	function update_share_count($content) {
		
		$post_id = get_the_ID();
		
		if(is_singular( 'post' )){
			$count = binduz_get_fb_share_count($post_id);
        	if(is_object($count) && isset($count->share_count)){
				update_post_meta($post_id, 'binduz_fb_share_count', $count->share_count, false);
			}
             
			if(is_object($count) && isset($count->reaction_count)){
				update_post_meta($post_id, 'binduz_fb_reaction_count', $count->reaction_count, false);
			}
			
		}
	    
		return $content;
	}

	// social share
	function binduz_insert_facebook_share_custom_field($post_ID) {
	  
		if(!is_numeric($post_ID)){
           return;
		}
	    if (!wp_is_post_revision($post_ID)) {
	        add_post_meta($post_ID, 'binduz_fb_share_count', '0', true);
	        add_post_meta($post_ID, 'binduz_fb_reaction_count', '0', true);
	    }
	}
    // allow search post type
	function binduz_search_filter($query) {
	   
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}


}












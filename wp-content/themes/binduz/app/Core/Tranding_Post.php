<?php
namespace Binduz\Core;
/**
* Tranding post for header
*/
Class Tranding_Post {
        
       /**
         * Newsticker active
         *
         * @var active
         */
        private $active = 'no';
        private $skip = 0;
         /**
         * post order desc/asc
         *
         * @var order
         */
        private $order = 'DESC';
          /**
         * post order By
         *
         * @var orderby
         */
        private $orderby = 'date';
          /**
         * post source_orderby
         *
         * @var source_orderby
         */
        private $source_orderby = 'latest';
         /**
         * Selected post
         *
         * @var selectedpost
         */
        private $selected_post = [];
          /**
         * post order By
         *
         * @var orderby
         */
        private $title = null;
        /**
        * post catgeory
        *
        * @var category
        */ 
        private $category = [];
        /**
        * post count
        *
        * @var count
        */
        private $count = 10;
        /**
        * post animation
        *
        * @var animation
        */
        private $animation = null;
          /**
        * post args
        *
        * @var args
        */ 
        private $args = [];
         /**
         * Sets default options initialize
         * @return void 
         */
         public function __construct() {

           $this->active     = binduz_option('newsticker_enable','no');
           $this->count      = binduz_option('newsticker_post_number',10);
           $this->title      = binduz_option('newsticker_title', esc_html__( 'Trending', 'binduz') );
           $this->navigation = binduz_option('newsticker_nav_enable', 'yes' );
           $this->order      = binduz_option('newsticker_post_order', 'DESC' );
           $this->orderby    = binduz_option('newsticker_post_orderby', 'date' );
           $this->animation  = binduz_option('newsticker_animation', 'fade' );
           $this->skip       = binduz_option('newsticker_post_skip', 0 );
          
           $this->source_orderby      = binduz_option('newsticker_post_order_by', 'latest' );
           $newsticker_post_by_choice = binduz_option('newsticker_post_by_choice');
          
           if(isset($newsticker_post_by_choice['category'])){
              $this->category = $newsticker_post_by_choice['category']['newsticker_post_category']; 
           }

           if(isset($newsticker_post_by_choice['selected-post'])){
            $this->selected_post = $newsticker_post_by_choice['selected-post']['newsticker_selected_post']; 
           }
           // set default query args
           $this->query_arg();
           $this->setSource();
          
        }
        /**
         * Sets default options
         *
         */
        public function setSource($source = null) {
          
          if( is_null($source) ){

              if($this->source_orderby == 'category') {
               
                $this->args['tax_query'] = array(
                        array(
                          'taxonomy'         => 'category',
                          'terms'            => $this->category,
                          'field'            => 'id',
                          'include_children' => true,
                          'operator'         => 'IN'
                        ),
                     );
              }
              
              if($this->source_orderby == 'selected-post') {
                $this->args['post__in'] = $this->selected_post;
              }

              if($this->source_orderby == 'trending') {
              
                $this->args['meta_query'] = [
                    array(
                      'key'     => '_binduz_trending',
                      'value'   => 'yes',
                      'compare' => '='
                    )   
                ];

              }
             
              if($this->source_orderby == 'mostcommented') {
                $this->args['orderby'] = 'comment_count';
              }

              if($this->source_orderby == 'mostviews') {
              
               $arg['meta_key'] = 'binduz_post_views_count';
               $arg['orderby']  = 'meta_value_num';

              }
           
          }else{
                $this->query_arg();
                if($source == 'category') {
                  
                  $this->args['tax_query'] = array(
                          array(
                            'taxonomy'         => 'category',
                            'terms'            => $this->category,
                            'field'            => 'id',
                            'include_children' => true,
                            'operator'         => 'IN'
                          ),
                      );
                }
                
                if($source == 'selected-post') {
                  $this->args['post__in'] = $this->selected_post;
                }

                if($source == 'trending') {
                
                  $this->args['meta_query'] = [
                      array(
                        'key' => '_binduz_trending',
                        'value' => 'yes',
                        'compare' => '='
                      )   
                  ];

                }
              
                if($source == 'mostcommented') {
                  $this->args['orderby'] = 'comment_count';
                }

                if($source == 'mostviews') {
                
                $arg['meta_key'] = 'binduz_post_views_count';
                $arg['orderby']  = 'meta_value_num';

                }
         
          }
     
        }

        /**
         * Newsticker Navigation option
         * @return bool 
         */
        public function navigation(){

          if( $this->navigation == 'yes' ){

            return true;
          }
          
          return false;
        }
     
        /**
         * Newsticker post per page option
         * @return number 
         */
        public function count($count=null){

          if( !is_null($count) ){

            $this->args['posts_per_page'] = $count;
          }
          
          return $this->count;
        }
        
        /**
         * Newsticker order
         * @return void 
         */
        public function order($order=null){
           
          if( !is_null( $order ) ){

            $this->args['order'] = $order;
          }
         
        }
        /**
         * Newsticker orderby
         * @return void 
         */
        public function orderBy($orderby = null){

          if( !is_null( $orderby ) ){

            $this->args['orderby'] = $orderby;
          }
         
        }
         /**
         * Newsticker post skip show
         * @return void 
         */
        public function skip($skip = null){

          if( !is_null( $skip ) && $skip > 0 ) {

            $this->args['offset'] = $this->skip;
          }
          
        }
         /**
         * Newsticker activate
         * @return void 
         */
        public function activate($active = null){

          if( !is_null( $active ) ) {

            $this->active = $active; 
          }
          
        }
         /**
         * Newsticker query args
         * @return array 
         */
        public function query_arg(){

           $this->args = [
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'order'            => $this->order,
                'posts_per_page'   => $this->count,
                'orderby'          => 'date',
                'suppress_filters' => false,
                'offset'           => $this->skip, 
           ];

           return $this->args;

        }

        public function get(){
            
            if( $this->active == 'no' ) {
              return false;
            }

            $query = new \WP_Query( $this->args );

            if( $query->have_posts() ) {
                return $query;
            } else {

                return false;
            }
        }
}
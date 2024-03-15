<?php 
namespace Binduz_Essential\Base;


Class Assets {
    
    public function register() {
        
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) ); 
        add_filter( 'element_ready_product', array( $this, '_product' ) ); 
        add_filter( 'element_ready_pro_template_status', array( $this, '_pro_status' ),19 ); 
      
    } 
   
    public function enqueue($api_data){
        
      
    }

  

   public function _product(){
       return 'pro';
   }

   public function _pro_status($data){
     
    //return always false from pro plugin
    return false;
   }
 

}
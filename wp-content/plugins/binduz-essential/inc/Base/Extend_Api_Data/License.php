<?php 
namespace Binduz_Essential\Base\Extend_Api_Data;
use Binduz_Essential\License\service\License as launcher;

Class License {
    
    public function register() {
      
       $this->rst();
       add_filter('element_ready/dashboard/api-data',[$this,'include'],10,1);
    } 
   
    public function include($api_data){

        // $api_data[ 'license_key' ] = [
        //         'lavel'     => esc_html__('License Key','binduz-essential'),
        //         'default'   => '',
        //         'type'      => 'text',
        //         'is_pro'    => 1,
        // ];
       
        return $api_data;
   }

   public function rst(){

       if(class_exists('Binduz_Essential\License\service\License')){
          launcher::getInit();
       } 
   }

}
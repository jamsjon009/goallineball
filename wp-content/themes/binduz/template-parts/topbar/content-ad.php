

    <?php

         $header_banner = binduz_option('header_banner');
        
         if( !isset($header_banner['ad_enable']) ){
           return;
         }

         if( $header_banner['ad_enable'] =='no' ){
             return;
         }

        
        
         if( is_page() ){

            $page_ad = binduz_meta_option(get_the_id(),'header_ad','yes');
           
            if($page_ad == 'no'){
                return;
            }

         }

         if( isset( $header_banner['page_only'] ) && $header_banner['page_only'] =='yes' ){
            if(!is_page()){
                return;
            }
         }
        
     ?>
    
   
    <div class="container">
        <div class="row">
            <div class=" col-lg-12">
                <?php binduz_ad('header_banner'); ?>
            </div>
        </div>
    </div>
       

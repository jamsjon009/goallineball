<?php 
namespace Binduz_Essential\Base;


Class Preloader {
    
    public function register() {
       

        add_action( 'wp_body_open', array( $this, '_body_open' ), 19 ); 
        add_action( 'wp_body_open', array( $this, '_back_to_top' ), 19 ); 
    } 
   
    function _back_to_top(){

        if(function_exists('binduz_option')){
            $general_pre_loader = binduz_option('footer_en_back_button','no');
            if($general_pre_loader != 'yes'){
                return;
            }
        }

       $footer_back_to_top = binduz_option("footer_back_to_top");
        
        echo  "<div class='binduz-er-back-to-top'>
                <p> $footer_back_to_top <i class='fal fa-long-arrow-right'></i></p>
            </div>";
       
    }

    function _body_open(){

        if(function_exists('binduz_option')){
            $general_pre_loader = binduz_option('general_pre_loader','yes');
            if($general_pre_loader != 'yes'){
                return;
            }
        }
     
        echo '<!-- Preloader Icon -->
        <div class="binduz-preloader">
            <div class="binduz-loaderInner">
                <div id="top" class="binduz-mask">
                    <div class="binduz-plane"></div>
                </div>
                <div id="middle" class="binduz-mask">
                    <div class="binduz-plane"></div>
                </div>
                <div id="bottom" class="binduz-mask">
                    <div class="binduz-plane"></div>
                </div>
                <p>LOADING...</p>
            </div>
        </div>
        <!-- Preloader Icon -->';
    }

}
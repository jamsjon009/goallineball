<?php
namespace Binduz\Plugins;

class Option_Include
{
    
     // include theme options
    //================================================

	public static function theme_options() {
		
		$option_list = [

			 'general',
			 'style',
			 'header',
			 'ads',
			 'newsticker',
			 'blog',
			 'blog-single',
			 'blog-style',
			 'footer',
			 
		];

		$options=[];
		
		foreach($option_list as $option){
			$options[] = fw()->theme->get_options( 'customizer/options-' . $option );
		}

		return $options;
    }

}


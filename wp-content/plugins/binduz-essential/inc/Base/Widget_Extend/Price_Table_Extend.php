<?php 
namespace Binduz_Essential\Base\Widget_Extend;

use Element_Ready\Base\BaseController;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use \Binduz_Essential\Base\Traits\Helper;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Modules\DynamicTags\Module as TagsModule;
use Elementor\Utils;
use Elementor\Plugin;
use Elementor\Repeater;

class Price_Table_Extend extends BaseController{
     use Helper;
    public function register() {
        if(!$this->get_sw()){return;}
        add_filter( 'element_ready_price_table_style_presets', [$this, 'price_table_style_presets'] );

    }

    public function price_table_style_presets($data){
        
        return [
            '1'  => __( 'Style One', 'element-ready' ),
            '2'  => __( 'Style Two', 'element-ready' ),
            '3'  => __( 'Style Three', 'element-ready' ),
            '4'  => __( 'Style Four', 'element-ready' ),
            '5'  => __( 'Style Five', 'element-ready' ),
            '6'  => __( 'Style Six', 'element-ready' ),
            '7'  => __( 'Style Seven', 'element-ready' ),
            '8'  => __( 'Upcoming Style Eight', 'element-ready' ),
            '9'  => __( 'Upcoming Style Nine', 'element-ready' ),
            '10' => __( 'Upcoming Style Ten', 'element-ready' ),
        ];
    }

    public function price_table_pro_message( $get_default, $merge ){

        $options = [];
        if( $merge ){
            $return_opt['controls'] = array_merge( $options, $get_default['controls'] );
            return $return_opt;
        }
        $return_opt['controls'] = $options;
        return $return_opt;       
    }

}
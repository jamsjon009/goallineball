!function($){var a=function(c,$){var b=c.find(".element__ready__pdf_btn"),a=c.find(".element__ready__pdf__viewer__wrap"),d=a.data("url"),e=a.data("width"),f=a.data("width_unit"),g=a.data("height"),h=a.data("height_unit"),i=parseInt(a.data("page"));b.length&&(b.css({cursor:"pointer"}),a.hide(),$(b).on("click",function(){a.fadeToggle("slow","swing")})),PDFObject.supportsPDFs&&PDFObject.embed(d,a,{height:g+h,width:e+f,page:i+1})};$(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/Element_Ready_Pdf_View_Widget.default",a)})}(jQuery);
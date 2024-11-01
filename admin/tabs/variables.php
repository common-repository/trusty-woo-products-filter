<?php 
global $post; 

if(isset($id)) {
 $id=$id;
}
else {
 $id=$post->ID;
}
$args = array(
'public'   => true,
);
$output = 'names'; 
$target_div='.twf_filter_main1';
$twf_filter_primary_color="#fff";
$twf_filter_sec_color="#333";
$twf_filter_sec_color2="#333";
$twf_filter_tax_label_font='Roboto';
$twf_filter_tax_label_trans='capitalize';
$twf_filter_tax_label_size='15';
$twf_filter_cat_label_font='Roboto';
$twf_filter_cat_label_trans='capitalize';
$twf_filter_cat_label_size='14';
/*---- ADVANCED TAB USED DEFAULT VARIABLES ----*/

$twf_scroll_top='disable';
$twf_scroll_mobile='-200';
$twf_scroll_tablet='-200';
$twf_scroll_desktop='-200';
$scroll_val='';
$twf_sec_bg_color='#FFFFFF';
$twf_per_page_type="default";
$pp_class='';
$twf_per_page='9';
$twf_pagi_type='number';
$twf_post_animation='off';
if(get_post_meta($id,"twf_Options",true)) {
$data=get_post_meta($id,"twf_Options",true);
 //var_dump($data);
if(isset($data)) { 
 $filters=$data['filters'];
 $filters_id=$data['filters_id'];
 $twf_scroll_top= $data['scroll']['scroll_top'];
 $twf_scroll_desktop=$data['scroll']['scroll_desktop'];
 $twf_scroll_mobile=$data['scroll']['scroll_mobile'];
 $filter_layout=$data['layouts']['filter_layout']['filter_layout'];
 $product_layout=$data['layouts']['product_layout']['product_layout'];
 $twf_filter_primary_color=$data['layouts']['filter_layout']['filter_primary_color'];
 $twf_filter_sec_color=$data['layouts']['filter_layout']['filter_sec_color'];
 $twf_filter_sec_color2=$data['layouts']['filter_layout']['filter_sec_color2'];
 $twf_sec_bg_color=$data['appearance']['twf_sec_bg_color'];
 $twf_per_page=$data['appearance']['twf_per_page'];
 $twf_per_page_type=$data['appearance']['twf_per_page_type'];

 if($twf_per_page_type=='default') {
  $pp_class='twf_hide';
 }
 
 $twf_filter_tax_label_font=$data['typography']['filter']['filter_tax_label_font'];
 $twf_filter_tax_label_trans=$data['typography']['filter']['filter_tax_label_trans'];
 $twf_filter_tax_label_size=$data['typography']['filter']['filter_tax_label_size'];
 $twf_filter_cat_label_font=$data['typography']['filter']['filter_cat_label_font'];
 $twf_filter_cat_label_trans=$data['typography']['filter']['filter_cat_label_trans'];
 $twf_filter_cat_label_size=$data['typography']['filter']['filter_cat_label_size'];
 if(isset($data['woo-use']['woo_use'])) {
 $woo_use=$data['woo-use']['woo_use'];
}
 if(isset($b)) {
 $target_div='.twf_filter_main'.$b;
 }
}
}
?>
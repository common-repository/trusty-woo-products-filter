<?php
if(isset($data)) {
 if(isset($data['twf_Product_tag'])) {
  $products_tags=$data['twf_Product_tag']; 
  //var_dump($products_tags);
  $display=$products_tags[$k]['display'];
  $hierarchical=$products_tags[$k]['hierarchical'];
  $show_count=$products_tags[$k]['show_count'];
  $pr_label=$products_tags[$k]['twf_Product_tag_label'];
  $pr_placeholder=$products_tags[$k]['twf_Product_tag_placeholder'];
  $pr_toggle=$products_tags[$k]['twf_Product_tag_toggle'];
  $tag_skin='simple-checkbox';
  if(isset($products_tags[$k]['tag_skins'])) {
  $tag_skin=$products_tags[$k]['tag_skins'];
  }
  if($show_count=='true') {
   $show_count_cl='show-count';
 }
  else {
   $show_count_cl='no-show-count';
  }
  if($display=="selected-categories") {
  $cats=$products_tags[$k]['twf_Product_tags'];
 }
 else {
$cats='';
}
  echo "<div class='twf_filter_list twf_filter_list".esc_attr($k)." twf_change twf_style twf_product_tag_filter ".esc_attr($tag_skin)."'>";
  if(isset($pr_label)) {
  if($pr_label=="yes") {
   if($pr_toggle=="yes") {
    $cl_price='twf_toggle_on';
   }
   else {
    $cl_price='twf_toggle_off';
   }
 echo "<h3 class='".esc_attr($cl_price)."'>";
 echo esc_html($pr_placeholder);
  if($pr_toggle=="yes") {
   //echo '<i class="fa fa-minus" aria-hidden="true"></i>';
   echo '<i class="fa fa-solid fa-angle-up"></i>';
  }
 
echo "</h3>";
  }
  }
 if($hierarchical=="yes") {
echo "<ul class='hierarchical ".esc_attr($show_count_cl)."' data-name='twf_Product_tag' data-id='".esc_attr($k)."'>";
 $out= wp_list_categories( array(
        'echo' =>'1',
        'orderby'            => 'id',
        'show_count'         => true,
        'use_desc_for_title' => false,
        'hide_empty' => false,
        'taxonomy'=>'product_tag',
        'order'               => 'ASC',
        'orderby'             => 'name',
        'title_li'            => '',
        'style'=>'list',
        'include'=>$cats
    ) );
  // echo $out;
   echo "</ul>";
 } 
  else {
   
   
   if($display=="selected-categories") {
    echo "<ul class='no-hierarchical ".esc_attr($show_count_cl)."'>";
 foreach($cats as $cat) {
  
  $term=get_term_by('ID',$cat,'product_tag');
 echo "<li><input type='checkbox' id='twf_Product_tag_".esc_attr($cat)."' name='twf_Product_tag[]' value='".esc_attr($cat)."' class='twf_checkbox_front twf_Product_tag' data-name='twf_Product_tag'><label for='twf_Product_tag_".esc_attr($cat)."'>".esc_html($term->name)."</label></li>";
    
  //var_dump($out);
 }
 echo "</ul>"; 
   }
   else {
    $terms = get_terms('product_tag',array( 'hide_empty' => false));
  echo "<ul class='no-hierarchical ".esc_attr($show_count_cl)."'>";
   $ch='';
   foreach($terms as $term) {
    if(isset($product_tags['twf_Product_tags'])) {
    if(in_array($term->term_id,$product_tags['twf_Product_tags'])) { $ch="checked";
    }
     else {
      $ch='';
     }
    }
   echo "<li><input type='checkbox' name='twf_Product_tag[]' class='twf_checkbox_front twf_Product_tag' id='twf_Product_tag_".esc_attr($term->term_id)."' value='".esc_attr($term->term_id)."'><label for='twf_Product_tag_".esc_attr($term->term_id)."'>".esc_html($term->name)."</label></li>";
   
   }
   echo "</ul>";
   }
  }
  
 }

}
echo "</div>";
?>

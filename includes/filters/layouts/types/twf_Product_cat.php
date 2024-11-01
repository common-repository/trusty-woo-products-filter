<?php
if(isset($data)) {
 if(isset($data['twf_Product_cat'])) {
  $products_cats=$data['twf_Product_cat'];
  $display=$products_cats[$k]['display'];
  $hierarchical=$products_cats[$k]['hierarchical'];
  $show_count=$products_cats[$k]['show_count'];
  $pr_label=$products_cats[$k]['twf_Product_cat_label'];
  $pr_placeholder=$products_cats[$k]['twf_Product_cat_placeholder'];
  $pr_toggle=$products_cats[$k]['twf_Product_cat_toggle'];
  $cat_skin='simple-checkbox';
  if(isset($products_cats[$k]['cat_skins'])) {
  $cat_skin=$products_cats[$k]['cat_skins'];
  }
  if($show_count=='true') {
   $show_count_cl='show-count';
 }
  else {
   $show_count_cl='no-show-count';
  }
 if($display=="selected-categories") {
  $cats=$products_cats[$k]['twf_Product_cats'];
 }
 else {
$cats='';
}
 
  echo "<div class='twf_filter_list twf_filter_list".esc_attr($k)." twf_change twf_style twf_product_cat_filter ".esc_attr($cat_skin)."'>";
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
echo "<ul class='hierarchical ".esc_attr($show_count_cl)."' data-name='twf_Product_cat' data-id='".esc_attr($k)."'>";
 $out= wp_list_categories( array(
        'echo' =>'1',
       'orderby'            => 'id',
        'show_count'         => $show_count,
        'use_desc_for_title' => false,
        'hide_empty' => false,
        'taxonomy'=>'product_cat',
        'order'               => 'ASC',
       'orderby'             => 'name',
        'title_li'            => '',
        'style'=>'list',
        'include'=>$cats
    ) );
   echo "</ul>";
 }
  else {
   
   
   if($display=="selected-categories") {
    //echo "okkk";
    echo "<ul class='no-hierarchical ".esc_attr($show_count_cl)."'>";
 foreach($cats as $cat) {
  
  $term=get_term_by('ID',$cat,'product_cat');
  //var_dump($term);
 echo "<li><input type='checkbox' id='twf_Product_cat_".esc_attr($cat)."' name='twf_Product_cat[]' value='".esc_attr($cat)."' class='twf_checkbox_front twf_Product_cat' data-name='twf_Product_cat'><label for='twf_Product_cat_".esc_attr($cat)."'>".esc_html($term->name)."</label></li>";
    
  //var_dump($out);
 }
 echo "</ul>"; 
   }
   else {
    $terms = get_terms('product_cat',array( 'hide_empty' => false));
  echo "<ul class='no-hierarchical ".esc_attr($show_count_cl)."'>";
   $ch='';
   foreach($terms as $term) {
    if(isset($product_cat['twf_Product_cats'])) {
    if(in_array($term->term_id,$product_cat['twf_Product_cats'])) { $ch="checked";
    }
     else {
      $ch='';
     }
    }
   echo "<li><input type='checkbox' name='twf_Product_cat[]' class='twf_checkbox_front twf_Product_cat' id='twf_Product_cat_".esc_attr($term->term_id)."' value='".esc_attr($term->term_id)."'><label for='twf_Product_cat_".esc_attr($term->term_id)."'>".esc_html($term->name)."</label></li>";
   
   }
   echo "</ul>";
   }
  }
 }

}
echo "</div>";
?>

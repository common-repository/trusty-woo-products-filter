<?php
if(isset($_POST["id"])) {
$id=sanitize_text_field($_POST["id"]); 
}
if(isset($data)) {
 //print_r($data);
 if(isset($data['twf_Product_tag'])) {
 $product_tags=$data['twf_Product_tag'][$id];
 //var_dump($data);
}
}
if(isset($product_tags['twf_Product_tags'])) {
 $pr_cats=$product_tags['twf_Product_tags'];
 $pr_cats=implode(",",$pr_cats);
 echo "<input type='hidden' id='twf_Product_tags_arr_".esc_attr($id)."' value='".esc_attr($pr_cats)."'>";
}
?>
<div class='list-group-item' data-name='twf_Product_tag' data-id=<?php echo esc_attr($id);?>>
 <div class="manage-list-group-item">
 <?php echo esc_html__('Product Tags','trusty-woo-products-filter'); ?><i class='fa fa-times' aria-hidden='true'></i><i class='fa fa-chevron-down' aria-hidden='true'></i>
  </div>
<div id="twf_Product_tag-options" class="result_twf_Product_tag twf_filter_results twf_hidden">
 <!-- Product Tags -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_tag"><?php echo esc_html__('Select Tags','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <div class="twf_checkbox-inner">
  <?php 
  echo "<ul>";
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
        'style'=>'list'
    ) );
  // echo $out;
  echo "</ul>";
   ?>
  </div>
 </div>
</div>
 <!-- Frontend Display -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Price_skin"><?php echo esc_html__('Frontend Display','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $display='all-categories';
  if(isset($product_tags)) {
   if(isset($product_tags['display'])) {
    $display=$product_tags['display'];
   }
  }
  //var_dump($product_cat);
  ?>
   <select name="twf_tag_display" id="twf_tag_display" class="twf_inner_select">
    <option value='selected-categories' <?php if($display=='selected-categories') { echo esc_attr("selected");} ?>><?php echo esc_html__('Selected Tags','trusty-woo-products-filter'); ?></option>
    <option value='all-categories' <?php if($display=='all-categories') { echo esc_attr("selected");} ?>><?php echo esc_html__('All Tags','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div>
 <!-- Skins -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_tag_skins"><?php echo esc_html__('Skins','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $tag_skins='simple-checkbox';
  if(isset($product_tags)) {
   if(isset($product_tags['tag_skins'])) {
    $tag_skins=$product_tags['tag_skins'];
   }
  }
  ?>
   <select name="twf_tag_skins" id="twf_tag_skins" class="twf_inner_select">
    <option value='simple-checkbox' <?php if($tag_skins=='simple-checkbox') { echo esc_attr("selected");} ?>><?php echo esc_html__('Simple Checkbox','trusty-woo-products-filter'); ?></option>
   
   </select>
 </div>
</div>
 <!-- hierarchical -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_tag_hierarchical"><?php echo esc_html__('Hierarchical','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $hierarchical='';
  if(isset($product_tags)) {
   if(isset($product_tags['hierarchical'])) {
    $hierarchical=$product_tags['hierarchical'];
   }
  }
  ?>
   <select name="twf_tag_hierarchical" id="twf_tag_hierarchical" class="twf_inner_select">
    <option value='yes' <?php if($hierarchical=='yes') { echo esc_attr("selected");} ?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value='no' <?php if($hierarchical=='no') { echo esc_attr("selected");} ?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div>
 <?php
 $hcl='';
 if($hierarchical=="yes") {
 $hcl='';
 }
 else {
  $hcl='twf_hide';
 }
  ?>
 <!-- Count of Products -->
<div class="col-md-12 twf_inner_row row <?php echo esc_attr($hcl); ?>" id="twf_tag_show_count">
 <div class="col-md-5">
 <label for="twf_tag_show_count_in"><?php echo esc_html__('Show Count of Products','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $show_count='';
  if(isset($product_tags)) {
   if(isset($product_tags['show_count'])) {
    $show_count=$product_tags['show_count'];
   }
  }
  //var_dump($product_cat);
  ?>
   <select name="twf_tag_show_count" id="twf_tag_show_count_in" class="twf_inner_select">
    <option value='true' <?php if($show_count=='true') { echo esc_attr("selected");} ?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value='false' <?php if($show_count=='false') { echo esc_attr("selected");} ?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div> 
 <!-- TAGS LABEL -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_tag_label"><?php echo esc_html__('Show Label','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Product_tag_label_<?php echo esc_attr($id);?>" class="twf_Product_tag_label twf_inner_select twf_input_field" id="twf_Product_tag_label">
    <option value="yes" <?php if(isset($product_tags['twf_Product_tag_label'])){ if($product_tags['twf_Product_tag_label']=="yes") {echo esc_attr("selected"); }}?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value="no" <?php if(isset($product_tags['twf_Product_tag_label'])){ if($product_tags['twf_Product_tag_label']=="no") {echo esc_attr("selected"); }}?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div>
 <!-- TAGS PLACEHOLDER-->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_tag_placeholder"><?php echo esc_html__('Tags Placeholder','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
		<input type="text" name="twf_Product_tag_placeholder" value="<?php if(isset($product_tags['twf_Product_tag_placeholder'])){echo esc_attr($product_tags['twf_Product_tag_placeholder']);} else {echo esc_attr("Tags");}?>" id="twf_Product_tag_placeholder" class="twf_Product_tag_placeholder twf_input_field">
 </div>
</div>
 <!-- ENABLE TOGGLE -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_tag_toggle"><?php echo esc_html__('Enable Toggle','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Product_tag_toggle" class="twf_Product_tag_toggle twf_inner_select twf_input_field" id="twf_Product_tag_toggle">
    <option value="yes" <?php if(isset($product_tags['twf_Product_tag_toggle'])){ if($product_tags['twf_Product_tag_toggle']=="yes") {echo esc_attr("selected"); }}?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value="no" <?php if(isset($product_tags['twf_Product_tag_toggle'])){ if($product_tags['twf_Product_tag_toggle']=="no") {echo esc_attr("selected"); }}?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div>
</div>
 </div>
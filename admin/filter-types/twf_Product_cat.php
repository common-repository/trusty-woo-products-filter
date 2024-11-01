<?php
if(isset($_POST["id"])) {
$id=sanitize_text_field($_POST["id"]);
}
if(isset($data)) {
 if(isset($data['twf_Product_cat'])) {
 $product_cat=$data['twf_Product_cat'][$id];
}
}
if(isset($product_cat['twf_Product_cats'])) {
 $pr_cats=$product_cat['twf_Product_cats'];
 $pr_cats=implode(",",$pr_cats);
 echo "<input type='hidden' id='twf_Product_cats_arr_".esc_attr($id)."' value='".esc_attr($pr_cats)."'>";
}
?>
<div class='list-group-item' data-name='twf_Product_cat' data-id=<?php echo esc_attr($id);?>>
 <div class="manage-list-group-item">
 <?php echo esc_html__('Product Categories','trusty-woo-products-filter'); ?><i class='fa fa-times' aria-hidden='true'></i><i class='fa fa-chevron-down' aria-hidden='true'></i>
  </div>
<div id="twf_Product_cat-options" class="result_twf_Product_cat twf_filter_results twf_hidden">
<!-- Select Category -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_cat" ><?php echo esc_html__('Select Categories','trusty-woo-products-filter'); ?></label>
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
        'taxonomy'=>'product_cat',
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
  if(isset($product_cat)) {
   if(isset($product_cat['display'])) {
    $display=$product_cat['display'];
   }
  }
  //var_dump($product_cat);
  ?>
   <select name="twf_cat_display" id="twf_Cat_display" class="twf_inner_select">
    <option value='selected-categories' <?php if($display=='selected-categories') { echo esc_attr("selected");} ?>><?php echo esc_html__('Selected Categories','trusty-woo-products-filter'); ?></option>
    <option value='all-categories' <?php if($display=='all-categories') { echo esc_attr("selected");} ?>><?php echo esc_html__('All Categories','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div> 
 
 <!-- Skins -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_cat_skins"><?php echo esc_html__('Skins','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $cat_skins='simple-checkbox';
  if(isset($product_cat)) {
   if(isset($product_cat['cat_skins'])) {
    $cat_skins=$product_cat['cat_skins'];
   }
  }
  //var_dump($product_cat);
  ?>
   <select name="twf_cat_skins" id="twf_cat_skins" class="twf_inner_select">
    <option value='simple-checkbox' <?php if($cat_skins=='simple-checkbox') { echo esc_attr("selected");} ?>><?php echo esc_html__('Simple Checkbox','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div> 
 
 <!-- hierarchical -->
<div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_cat_hierarchical"><?php echo esc_html__('Hierarchical','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $hierarchical='';
  if(isset($product_cat)) {
   if(isset($product_cat['hierarchical'])) {
    $hierarchical=$product_cat['hierarchical'];
   }
  }
  //var_dump($product_cat);
  ?>
   <select name="twf_cat_hierarchical" id="twf_cat_hierarchical" class="twf_inner_select">
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
<div class="col-md-12 twf_inner_row row <?php echo esc_attr($hcl); ?>" id="twf_show_count">
 <div class="col-md-5">
 <label for="twf_show_count"><?php echo esc_html__('Show Count of Products','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
  <?php
  $show_count='';
  if(isset($product_cat)) {
   if(isset($product_cat['show_count'])) {
    $show_count=$product_cat['show_count'];
   }
  }
  //var_dump($product_cat);
  ?>
   <select name="twf_cat_show_count" id="twf_cat_show_count" class="twf_inner_select">
    <option value='true' <?php if($show_count=='true') { echo esc_attr("selected");} ?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value='false' <?php if($show_count=='false') { echo esc_attr("selected");} ?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div> 
 <!-- CATEGORY Label -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_cat_label"><?php echo esc_html__('Show Label','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Product_cat_label_<?php echo $id;?>" class="twf_Product_cat_label twf_inner_select twf_input_field" id="twf_Product_cat_label">
    <option value="yes" <?php if(isset($product_cat['twf_Product_cat_label'])){ if($product_cat['twf_Product_cat_label']=="yes") {echo esc_attr("selected"); }}?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value="no" <?php if(isset($product_cat['twf_Product_cat_label'])){ if($product_cat['twf_Product_cat_label']=="no") {echo esc_attr("selected"); }}?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div>
 <!-- CATEGORY PLACEHOLDER-->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_cat_placeholder"><?php echo esc_html__('Category Placeholder','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
		<input type="text" name="twf_Product_cat_placeholder" value="<?php if(isset($product_cat['twf_Product_cat_placeholder'])){echo esc_attr($product_cat['twf_Product_cat_placeholder']);} else {echo esc_attr("Category");}?>" id="twf_Product_cat_placeholder" class="twf_Product_cat_placeholder twf_input_field">
 </div>
</div>
 <!-- ENABLE TOGGLE -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Product_cat_toggle"><?php echo esc_html__('Enable Toggle','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Product_cat_toggle" class="twf_Product_cat_toggle twf_inner_select twf_input_field" id="twf_Product_cat_toggle">
    <option value="yes" <?php if(isset($product_cat['twf_Product_cat_toggle'])){ if($product_cat['twf_Product_cat_toggle']=="yes") {echo esc_attr("selected"); }}?>><?php echo esc_html__('Yes','trusty-woo-products-filter'); ?></option>
    <option value="no" <?php if(isset($product_cat['twf_Product_cat_toggle'])){ if($product_cat['twf_Product_cat_toggle']=="no") {echo esc_attr("selected"); }}?>><?php echo esc_html__('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
</div>
</div>
 </div>
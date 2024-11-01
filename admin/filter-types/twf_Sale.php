<?php
if(isset($_POST["id"])) {
$id=sanitize_text_field($_POST["id"]);
}
if(isset($data)) {
 //print_r($data);
 if(isset($data['twf_Sale'])) {
 $sale_data=$data['twf_Sale'];
 //var_dump($data);
}
}
?>

<div class='list-group-item' data-name='twf_Sale' data-id=<?php echo esc_attr($id);?>>
 <div class="manage-list-group-item">
 <?php echo esc_html__('Sale','trusty-woo-products-filter'); ?><i class='fa fa-times' aria-hidden='true'></i><i class='fa fa-chevron-down' aria-hidden='true'></i>
  </div>
<div id="twf_Sale-options" class="result_twf_Sale twf_filter_results twf_hidden">
 <!-- Sale Skins -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Sale_skins">
    <?php echo esc_html__('Skins','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <?php
   $sale_skin='simple-checkbox';
   if(isset($sale_data['sale_skins'])){
   $sale_skin=$sale_data['sale_skins'];
   }
   ?>
   <select name="twf_Sale_skins" class="twf_Sale_skins twf_inner_select twf_input_field" id="twf_Sale_skins">
    <option value="simple-checkbox" <?php if($sale_skin=="simple-checkbox" ) {echo esc_attr("selected"); }?>>
     <?php echo esc_html__('Simple-checkbox','trusty-woo-products-filter'); ?>
    </option>
   
   </select>
  </div>
 </div>
 <!-- ON SALE PLACEHOLDER ROW STARTS -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_on_sale_placeholder">
    <?php echo esc_html('On Sale Placeholder','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
    <input type="text" name="twf_on_sale_placeholder" value="<?php if(isset($sale_data['on_sale_place'])){echo esc_html($sale_data['on_sale_place']);} else {echo esc_html__("On Sale");}?>" id="twf_on_sale_placeholder" class="twf_on_sale_placeholder twf_input_field">
  </div>
 </div>
 <!-- NOT ON SALE PLACEHOLDER ROW STARTS -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_not_on_sale_placeholder">
    <?php echo esc_html__('Not on Sale Placeholder','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
    <input type="text" name="twf_not_on_sale_placeholder" value="<?php if(isset($sale_data['not_on_sale_place'])){echo esc_attr($sale_data['not_on_sale_place']);} else {echo esc_html__("Not on Sale");}?>" id="twf_not_on_sale_placeholder" class="twf_not_on_sale_placeholder twf_input_field">
  </div>
 </div>
 
 <!-- SELECT Sale RANGE SELECTER END Sale-->
 
 <!-- Sale Label -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Sale_label">
    <?php echo esc_html__('Show Label','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Sale_label" class="twf_Sale_label twf_inner_select twf_input_field" id="twf_Sale_label">
    <option value="yes" <?php if(isset($sale_data['sale_label'])){ if($sale_data['sale_label']=="yes" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Yes','trusty-woo-products-filter'); ?>
    </option>
    <option value="no" <?php if(isset($sale_data['sale_label'])){ if($sale_data['sale_label']=="no" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('No','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
 <!-- Sale PLACEHOLDER-->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Sale_placeholder">
    <?php echo esc_html__('Sale Placeholder','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <input type="text" name="twf_Sale_placeholder" value="<?php if(isset($sale_data['sale_place'])){echo esc_attr($sale_data['sale_place']);} else {echo esc_html__("Sale");}?>" id="twf_Sale_placeholder" class="twf_Sale_placeholder twf_input_field">
  </div>

 </div>
 <!-- ENABLE TOGGLE -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Sale_toggle">
    <?php echo esc_html__('Enable Toggle','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Sale_toggle" class="twf_Sale_toggle twf_inner_select twf_input_field" id="twf_Sale_toggle">
    <option value="yes" <?php if(isset($sale_data[ 'sale_toggle'])){ if($sale_data[ 'sale_toggle']=="yes" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Yes','trusty-woo-products-filter'); ?>
    </option>
    <option value="no" <?php if(isset($sale_data[ 'sale_toggle'])){ if($sale_data[ 'sale_toggle']=="no" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('No','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
</div>
 </div>
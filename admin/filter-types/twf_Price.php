<?php
if(isset($_POST["id"])) {
$id=sanitize_text_field($_POST["id"]);
}
if(isset($data)) {
 if(isset($data['twf_Price'])) {
 $price_data=$data['twf_Price'][$id];
 //var_dump($price_data);
}
}
?>
<div class='list-group-item' data-name='twf_Price' data-id=<?php echo esc_attr($id);?>>
 <div class="manage-list-group-item">
 <?php echo esc_html__('Price','trusty-woo-products-filter'); ?><i class='fa fa-times' aria-hidden='true'></i><i class='fa fa-chevron-down' aria-hidden='true'></i>
  </div>
<div id="twf_Price-options" class="result_twf_Price twf_filter_results twf_hidden">
 <!-- SELECT SKIN FOR PRICE -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_skin">
    <?php echo esc_html__('Select Skin for Price Filter','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Price_skin_<?php echo esc_attr($id); ?>" class="twf_Price_skin twf_inner_select twf_input_field" id="twf_Price_skin">
    <option value="skin1" <?php if(isset($price_data[ 'twf_Price_skin'])) { if($price_data[ 'twf_Price_skin']=="skin1" ) {echo esc_attr("selected"); }}?> >
     <?php echo esc_html__('Skin 1 (Checkboxes)','trusty-woo-products-filter'); ?>
    </option>
    <option value="skin2" <?php if(isset($price_data[ 'twf_Price_skin'])) { if($price_data[ 'twf_Price_skin']=="skin2" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Skin 2 (Price Slider)','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
 <!-- SELECT PRICE RANGE SELECTER START PRICE-->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_start">
    <?php echo esc_html__('Price Start From','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <input type="text" name="twf_Price_start" value="<?php if(isset($price_data['twf_Price_start'])){echo esc_attr($price_data['twf_Price_start']);} else {echo esc_html("0");}?>" id="twf_Price_start" class="twf_Price_start twf_input_field">
  </div>
 </div>
 <!-- SELECT PRICE RANGE DIFFERENCE -->
 <?php
 if(isset($price_data['twf_Price_skin'])) {
 if($price_data['twf_Price_skin']=='skin2') {
  $skin_cl="twf_hide";
 }
 else {
  $skin_cl='';
 }
 }
 else {
   $skin_cl='';  
  }
 ?>
 <div class="col-md-12 twf_inner_row row price_range skin1 <?php echo esc_attr($skin_cl);?>">
  <div class="col-md-5">
   <label for="twf_Price_range">
    <?php echo esc_html__('Price Range Steps','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <input type="text" name="twf_Price_range" value="<?php if(isset($price_data['twf_Price_range'])){echo esc_attr($price_data['twf_Price_range']);} else {echo esc_attr(" 10 ");}?>" id="twf_Price_range" class="twf_Price_range twf_input_field">
  </div>
 </div>
 <!-- SELECT PRICE RANGE SELECTER END PRICE-->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_end">
    <?php echo esc_html__('Price End','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <input type="text" name="twf_Price_end" value="<?php if(isset($price_data['twf_Price_end'])){echo esc_attr($price_data['twf_Price_end']);} else {echo esc_html("100");}?>" id="twf_Price_end" class="twf_Price_end twf_input_field">
  </div>
 </div>
 <!-- PRICE CURRENCY -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_currency">
    <?php echo esc_html__('Show Currency','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Price_currency" class="twf_Price_currency twf_inner_select twf_input_field" id="twf_Price_currency">
    <option value="yes" <?php if(isset($price_data['price_currency'])){ if($price_data[ 'price_currency']=="yes" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Yes','trusty-woo-products-filter'); ?>
    </option>
    <option value="no" <?php if(isset($price_data['price_currency'])){ if($price_data[ 'price_currency']=="no" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('No','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
 <!-- PRICE Label -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_label">
    <?php echo esc_html__('Show Label','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Price_label_<?php echo esc_attr($id);?>" class="twf_Price_label twf_inner_select twf_input_field" id="twf_Price_label">
    <option value="yes" <?php if(isset($price_data[ 'twf_Price_label'])){ if($price_data[ 'twf_Price_label']=="yes" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Yes','trusty-woo-products-filter'); ?>
    </option>
    <option value="no" <?php if(isset($price_data[ 'twf_Price_label'])){ if($price_data[ 'twf_Price_label']=="no" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('No','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
 <!-- PRICE PLACEHOLDER-->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_placeholder">
    <?php echo esc_html__('Price Placeholder','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <input type="text" name="twf_Price_placeholder" value="<?php if(isset($price_data['twf_Price_placeholder'])){echo esc_attr($price_data['twf_Price_placeholder']);} else {echo esc_attr(" Price ");}?>" id="twf_Price_placeholder" class="twf_Price_placeholder twf_input_field">
  </div>

 </div>
 <!-- ENABLE TOGGLE -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Price_toggle">
    <?php echo esc_html__('Enable Toggle','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Price_toggle" class="twf_Price_toggle twf_inner_select twf_input_field" id="twf_Price_toggle">
    <option value="yes" <?php if(isset($price_data['twf_Price_toggle'])){ if($price_data[ 'twf_Price_toggle']=="yes" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Yes','trusty-woo-products-filter'); ?>
    </option>
    <option value="no" <?php if(isset($price_data['twf_Price_toggle'])){ if($price_data[ 'twf_Price_toggle']=="no" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('No','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
</div>
 </div>
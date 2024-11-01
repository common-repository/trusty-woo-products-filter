<?php
global $post;
if(isset($_POST["id"])) {
$id=sanitize_text_field($_POST["id"]);
}
if(isset($data)) {
 if(isset($data['twf_Attributes'])) {
 $att_data=$data['twf_Attributes'][$id];
 //var_dump($att_data);
}
}
?>
<div class='list-group-item' data-name='twf_Attributes' data-id='<?php echo esc_attr($id);?>' data-post-id='<?php if(isset($post->ID)) { echo esc_attr($post->ID); } ?>'>
 <div class="manage-list-group-item">
 <?php echo esc_html__('Attributes','trusty-woo-products-filter'); ?><i class='fa fa-times' aria-hidden='true'></i><i class='fa fa-chevron-down' aria-hidden='true'></i>
  </div>
<div id="twf_Attributes-options" class="result_twf_Attributes twf_filter_results twf_hidden">
 <!-- ATTRIBUTE NAME -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Attribute_name_<?php echo esc_attr($id);?>" ><?php echo esc_html__('Attribute','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Attribute_name_<?php echo esc_attr($id);?>" class="twf_Attribute_name twf_inner_select twf_input_field" id="twf_Attribute_name_<?php echo esc_attr($id);?>">
   <?php
    $attributes_tax_slugs = array_keys( wc_get_attribute_taxonomy_labels() );
    foreach($attributes_tax_slugs as $slugs) {
     if(isset($att_data['twf_Attribute_name'])){if($att_data['twf_Attribute_name']==$slugs) {$cl= "selected";} else {$cl='';}} else {$cl='';}
     echo "<option value='".$slugs."' $cl>".esc_html($slugs)."</option>";
    }
    ?>
   </select>
 </div>
 
</div>
 <!-- ATTRIBUTE DISPLAY TYPE -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Attribute_type_<?php echo esc_attr($id);?>"><?php echo esc_html__('Display Type','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Attribute_type_<?php echo esc_attr($id);?>" class="twf_Attribute_type twf_inner_select twf_input_field" id="twf_Attribute_type_<?php echo esc_attr($id);?>">
   <option value="checkbox" <?php if(isset($att_data['twf_Attribute_type'])) {if($att_data['twf_Attribute_type']=="checkbox") {echo esc_attr("selected");}} ?>><?php echo esc_html('Checkbox','trusty-woo-products-filter'); ?></option>
   <option value="color" <?php if(isset($att_data['twf_Attribute_type'])) {if($att_data['twf_Attribute_type']=="color") {echo esc_attr("selected");}} ?>> <?php echo esc_html('Color Selection','trusty-woo-products-filter'); ?></option>
    
   </select>
 </div>
 
</div>
  <!-- ATTRIBUTE SKIN -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Attribute_skin_<?php echo esc_attr($id);?>"><?php echo esc_html__('Attribute Skin','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Attribute_skin_<?php echo esc_attr($id);?>" class="twf_Attribute_skin twf_inner_select twf_input_field" id="twf_Attribute_skin_<?php echo esc_attr($id);?>">
    <option value="skin1" <?php if(isset($att_data['twf_Attribute_skin'])) {if($att_data['twf_Attribute_skin']=="skin1") {echo esc_attr("selected");}} ?>> <?php echo esc_html('Skin1 (Default)','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
 
</div>
 <!-- ATTRIBUTE DYNAMIC SELECTION -->
 
 <div class="col-md-12 twf_inner_row row dynamic_selection">
  
 </div>

 <!-- ATTRIBUTE LABEL -->
 <div class="col-md-12 twf_inner_row row">
 <div class="col-md-5">
 <label for="twf_Attribute_label_<?php echo esc_attr($id);?>"><?php echo esc_html__('Show Label','trusty-woo-products-filter'); ?></label>
  </div>
 <div class="col-md-7">
			<select name="twf_Attribute_label_<?php echo esc_attr($id);?>" class="twf_Attribute_label twf_inner_select twf_input_field" id="twf_Attribute_label_<?php echo esc_attr($id);?>">
    <option value="yes" <?php if(isset($att_data['twf_Attribute_label'])) {if($att_data['twf_Attribute_label']=="yes") {echo esc_attr("selected");}} ?>> <?php echo esc_html('Yes','trusty-woo-products-filter'); ?></option>
    <option value="no" <?php if(isset($att_data['twf_Attribute_label'])) {if($att_data['twf_Attribute_label']=="no") {echo esc_attr("selected");}} ?>><?php echo esc_html('No','trusty-woo-products-filter'); ?></option>
   </select>
 </div>
 
</div>
 <!-- ATTRIBUTE PLACEHOLDER -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Attribute_placeholder_<?php echo esc_attr($id);?>">
    <?php echo esc_html__('Attribute Placeholder','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <input type="text" name="twf_Attribute_placeholder_<?php echo esc_attr($id);?>" value="<?php if(isset($att_data['twf_Attribute_placeholder'])){echo esc_attr($att_data['twf_Attribute_placeholder']);} else {echo esc_attr("Color");}?>" id="twf_Attribute_placeholder_<?php echo esc_attr($id);?>" class="twf_Attribute_placeholder twf_input_field">
  </div>

 </div>
 <!-- ENABLE TOGGLE -->
 <div class="col-md-12 twf_inner_row row">
  <div class="col-md-5">
   <label for="twf_Attribute_toggle_<?php echo esc_attr($id);?>">
    <?php echo esc_html__('Enable Toggle','trusty-woo-products-filter'); ?>
   </label>
  </div>
  <div class="col-md-7">
   <select name="twf_Attribute_toggle_<?php echo esc_attr($id);?>" class="twf_Attribute_toggle twf_inner_select twf_input_field" id="twf_Attribute_toggle_<?php echo esc_attr($id);?>">
    <option value="yes" <?php if(isset($att_data['twf_Attribute_toggle'])){ if($att_data[ 'twf_Attribute_toggle']=="yes" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('Yes','trusty-woo-products-filter'); ?>
    </option>
    <option value="no" <?php if(isset($att_data['twf_Attribute_toggle'])){ if($att_data[ 'twf_Attribute_toggle']=="no" ) {echo esc_attr("selected"); }}?>>
     <?php echo esc_html__('No','trusty-woo-products-filter'); ?>
    </option>
   </select>
  </div>
 </div>
 
</div>
 </div>
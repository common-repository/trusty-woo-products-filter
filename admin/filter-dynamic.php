<?php
if(isset($data_post_id)) {
if(get_post_meta($data_post_id,"twf_Options",true)) {
$data=get_post_meta($data_post_id,"twf_Options",true);
//var_dump($data['twf_Attributes'][$data_id]['twf_Attribute_fields']);
if(isset($data)) {
 if(isset($data['twf_Attributes'][$data_id]['twf_Attribute_fields'])) {
 $att_data=$data['twf_Attributes'][$data_id]['twf_Attribute_fields'];
 }
}
}
}
$terms=get_terms(array(
    'taxonomy' => 'pa_'.$name,
    'hide_empty' => false,
));
if($type=="color") {
 
 //var_dump($terms);
 if(isset($terms) && is_array($terms)) {
  echo "<div class='manage-dyn'>";
  echo "<h4>".esc_html__("Select Color Placeholder For Terms")."</h4>";
  foreach($terms as $term) {
  // echo $term->term_id."<br/>";
   //echo $att_data[$term->term_id];
   $term_keys[]=$term->term_id;
   echo "<div class='dyn_term_".esc_attr($term->term_id)." dyn_term dyn_term_color'>";
   echo "<p class='dyn_title'>".esc_html($term->name)."</p>";
   ?>
    <input type="text" value="<?php if(isset($att_data[$term->term_id])) {echo esc_attr($att_data[$term->term_id]);} ?>" class="twf_import my-color-field" name='twf-dynamic-color-<?php echo esc_attr($term->term_id);?>' data-default-color="#f79918" data-import='caf_filter_primary_color'/>
<?php
   echo "</div>";
  }
  echo "<input type='hidden' name='dynamic_keys_".esc_attr($data_id)."' value='".esc_attr(implode(",",$term_keys))."'>";
  echo "</div>";
 }
}
else {
 if(isset($terms) && is_array($terms)) {
  echo "<ul class='twf_attribute_admin'>";
  echo "<h4>".esc_html("Select Attribute Terms")."</h4>";
  foreach($terms as $term) {
   $cl_at='';
   if(isset($att_data)) {if(is_array($att_data)) {if(in_array($term->term_id,$att_data)) {$cl_at="checked";} }}
   echo "<li><input type='checkbox' name='twf_att_admin_".esc_attr($data_id)."[]' id='twf_att_".esc_attr($term->term_id)."' value='".esc_attr($term->term_id)."' class='twf_att_ad' $cl_at><label for='twf_att_".esc_attr($term->term_id)."'>".esc_html($term->name)."</label></li>";
  }
 }
}
?>
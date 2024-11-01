<?php
$skin='';
$att_fields=array('');
if(isset($data)) {
 //var_dump($data);
 if(isset($data['twf_Attributes'])) {
  $att_data=$data['twf_Attributes'][$k];
  //var_dump($att_data);
  $att_name=$att_data['twf_Attribute_name'];
  $att_type=$att_data['twf_Attribute_type'];
  $att_fields=$att_data['twf_Attribute_fields'];
  $att_skin=$att_data['twf_Attribute_skin'];
  $att_label=$att_data['twf_Attribute_label'];
  $att_place=$att_data['twf_Attribute_placeholder'];
  $att_toggle=$att_data['twf_Attribute_toggle'];
?>
<div class='twf_attribute_skin twf_attribute_filter_front twf_attribute_filter_<?php echo esc_attr($att_skin)?> twf_change twf_style <?php echo esc_attr("twf_att_name_".$att_name);?>'>

<?php 
 if(isset($att_label)) {
  if($att_label=="yes") {
   if($att_toggle=="yes") {
    $cl_att='twf_toggle_on';
   }
   else {
    $cl_att='twf_toggle_off';
   }
 echo "<h3 class='".esc_attr($cl_att)."'>";
 echo esc_html($att_place);
  if($att_toggle=="yes") {
   //echo '<i class="fa fa-minus" aria-hidden="true"></i>';
   echo '<i class="fa fa-solid fa-angle-up"></i>';
  }
 
echo "</h3>";
  }
  }

 
  if($att_type=="color") {
 if($att_skin=='skin1') {
echo '<ul class="attribute_skin skin1">';
 if(isset($att_fields)) {
  foreach($att_fields as $key=>$field) {
   $term=get_term_by("id",$key,"pa_".$att_name);
   echo '<li><input type="checkbox" name="twf_attribute_'.esc_attr($att_name).'" value="'.esc_attr($key).'" class="twf_Attribute twf_checkbox_front" id="twf_attribute_'.esc_attr($key).'" data-name="twf_Attribute" data-att-name="'.esc_attr($term->name).'" data-tax-name="'.esc_attr($att_name).'"><label for="twf_attribute_'.esc_attr($key).'" class="att_label" style="background-color:'.esc_attr($field).'"></label></li>';
  }
 }
echo '</ul>';
 }
 
  }
  else if($att_type=="checkbox") {
   echo '<ul class="attribute_check_skin">';
 if(isset($att_fields)) {
  if(!empty($att_fields)) {
  foreach($att_fields as $key=>$field) {
   $term=get_term_by("id",$field,"pa_".$att_name);
  // var_dump($term);
   echo '<li><input type="checkbox" name="twf_attribute_'.esc_attr($att_name).'" value="'.esc_attr($field).'" class="twf_Attribute twf_checkbox_front" id="twf_attribute_'.esc_attr($field).'" data-name="twf_Attribute" data-tax-name="'.esc_attr($att_name).'"><label for="twf_attribute_'.esc_attr($field).'" class="att_label_check">'.esc_attr($term->name).'</label></li>';
  }
 }
 }
echo '</ul>';
  }
 ?>
 </div>
<?php
  }
}
  ?>
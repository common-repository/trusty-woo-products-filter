<?php
$skin='';
if(isset($data)) {
 if(isset($data['twf_Sale'])) {
  $sale=$data['twf_Sale'];
  $on_sale_place=$sale['on_sale_place'];
  $not_on_sale_place=$sale['not_on_sale_place'];
  $sale_label=$sale['sale_label'];
  $sale_place=$sale['sale_place'];
  $sale_toggle=$sale['sale_toggle'];
  $sale_skin='simple-checkbox';
  if(isset($sale['sale_skins'])) {
   $sale_skin=$sale['sale_skins'];
  }
?>
<div class='twf_sale twf_sale_filter_front twf_sale_filter twf_change twf_style <?php echo esc_attr($sale_skin); ?>'>
<?php
  if($sale_skin=='simple-checkbox') {
 if(isset($sale_label)) {
  if($sale_label=="yes") {
   if($sale_toggle=="yes") {
    $cl_sale='twf_toggle_on';
   }
   else {
    $cl_sale='twf_toggle_off';
   }  
 echo "<h3 class='".esc_attr($cl_sale)."'>";
 echo esc_html($sale_place);
  if($sale_toggle=="yes") {
   //echo '<i class="fa fa-minus" aria-hidden="true"></i>';
   echo '<i class="fa fa-solid fa-angle-up"></i>';
  }
echo "</h3>";
  }
  }
 ?>
<ul class="sale_skin">
 <?php
  echo "<li><input type='checkbox' name='twf_sale[]' value='On' class='twf_Sale twf_checkbox_front' id='twf_sale_on' data-name='twf_Sale'><label for ='twf_sale_on'>".esc_html($on_sale_place)."</label></label></li>";
   echo "<li><input type='checkbox' name='twf_sale[]' value='Not' class='twf_Sale twf_checkbox_front' id='twf_sale_not' data-name='twf_Sale'><label for ='twf_sale_not'>".esc_html($not_on_sale_place)."</label></label></li>";
 ?>
</ul>
 </div>
<?php
  }
}
}
?>
<?php
$skin='';
if(isset($data)) {
 if(isset($data['twf_Price'])) {
  $price=$data['twf_Price'];
  $skin=$price[$k]['twf_Price_skin'];
  $pr_label=$price[$k]['twf_Price_label'];
  $pr_placeholder=$price[$k]['twf_Price_placeholder'];
  $pr_toggle=$price[$k]['twf_Price_toggle'];
  $pr_cur=$price[$k]['price_currency'];
 
?>
<div class='twf_price_skin twf_price_filter_front twf_price_filter_<?php echo esc_attr($skin);?> twf_change twf_style'>

<?php 
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

 if(isset($price[$k]['twf_Price_start'])) {
  $start=$price[$k]['twf_Price_start'];
  $range=$price[$k]['twf_Price_range'];
  $last=$price[$k]['twf_Price_end'];
 }
  $cur_sym= get_woocommerce_currency_symbol();
 if($skin=='skin1') {
echo '<ul class="price_skin">';
 //var_dump($price);
 
 $rt=range($start,$last,$range);
 for($i=0;$i<count($rt);$i++) {
  $l=$rt[$i]+$range;
  if($rt[$i]<$last) {
   if($pr_cur=="yes") {$cr_sym=$cur_sym;}else {$cr_sym='';} 
  if($l>$last) {
  
   echo "<li><input type='checkbox' name='price[]' value='".esc_attr($rt[$i])."-".esc_attr($last)."' class='twf_Price twf_checkbox_front' id='twf_price_".esc_attr($rt[$i])."_".esc_attr($last)."' data-name='twf_Price'><label for ='twf_price_".esc_attr($rt[$i])."_".esc_attr($last)."'>".esc_html($cr_sym.$rt[$i]."-".$cr_sym.$last)."</label></label></li>";
  // return false;
  }
  else {
  echo "<li><input type='checkbox' name='price[]' value='".esc_attr($rt[$i])."-".esc_attr($l)."' class='twf_Price twf_checkbox_front' id='twf_price_".esc_attr($rt[$i])."_".esc_attr($l)."' data-name='twf_Price'><label for ='twf_price_".esc_attr($rt[$i])."_".esc_attr($l)."'>".esc_html($cr_sym.$rt[$i]."-".$cr_sym.$l)."</label></label></li>";
  }
  }
 }
 
echo '</ul>';
 }
 else if($skin=='skin2') {
  
 /*echo '<p>
  <label for="amount">Price range:</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>';*/
  echo '<div id="twf_price_slider">';
  echo "<div class='twf_Price_slider-text'>Price Range: <span></span></div>";
  echo '<div id="twf-price-slider-range"></div>';
  echo '<input id="twf_price_start" type="hidden" value="'.esc_attr($start).'">';
  echo '<input id="twf_price_last" type="hidden" value="'.esc_attr($last).'">';
  echo '<input id="twf_price_currency" type="hidden" value="'.esc_attr($pr_cur).'" data-name="'.esc_attr($cur_sym).'">';
  echo '</div>';
 }
 ?>
 </div>
<?php
  }
}
  ?>
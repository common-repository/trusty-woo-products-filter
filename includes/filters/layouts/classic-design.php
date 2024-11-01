<?php
echo "<div class='twf_container'>";
// var_dump($filters);
//echo "<button class='btn btn-primary twf-reset-filters reset-filters'>Reset filters</button>";

   if(isset($filters)) {
    foreach($filters as $key=>$filter) {
     $k=$filters_id[$key];
     $flt=$filter[$k];
    // var_dump($flt);
     if(isset($k) && $k!=null) {
   //echo $flt;
   include TRUSTY_WOO_FILTER_PATH."includes/filters/layouts/types/".$flt.".php";
      }
    }
   }
  echo "</div>";
echo "<style>";
// #twf_filter_main".$target_div.".classic-design .twf_container { background-color:".$twf_filter_primary_color."; }
echo "#twf_filter_main".$target_div.".classic-design .twf_style li label,#twf_filter_main".$target_div.".classic-design .twf_style .twf_Price_slider-text {
color:".$twf_filter_sec_color."; font-family:".$twf_filter_cat_label_font.";font-size:".$twf_filter_cat_label_size."px;text-transform:".$twf_filter_cat_label_trans.";}

#twf_filter_main".$target_div.".classic-design .twf_style h3 {color:".$twf_filter_sec_color2.";border-bottom: 0px solid ".$twf_filter_sec_color2.";font-family:".$twf_filter_tax_label_font.";font-size:".$twf_filter_tax_label_size."px;text-transform:".$twf_filter_tax_label_trans.";}

#twf_filter_main".$target_div.".classic-design .twf_change h3 i {font-size:".$twf_filter_tax_label_size."px;}


#twf_filter_main".$target_div.".classic-design li.twf-has-child i {font-size:".$twf_filter_cat_label_size."px;}
</style>";
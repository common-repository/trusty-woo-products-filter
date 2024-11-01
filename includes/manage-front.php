<?php
include TRUSTY_WOO_FILTER_PATH.'admin/tabs/variables.php';
  if(isset($twf_filter_tax_label_font) && $twf_filter_tax_label_font!='inherit') {
    wp_enqueue_style( 'tp-google-fonts-'.str_replace(" ","-",$twf_filter_tax_label_font), "https://fonts.googleapis.com/css?family=".$twf_filter_tax_label_font.":regular&display=swap", array(), null ); 
  }
  if(isset($twf_filter_cat_label_font) && $twf_filter_cat_label_font!='inherit') {
    wp_enqueue_style( 'tp-google-fonts-'.str_replace(" ","-",$twf_filter_cat_label_font), "https://fonts.googleapis.com/css?family=".$twf_filter_cat_label_font.":regular&display=swap", array(), null ); 
  }
   if(isset($data['twf_Price'][$b]['twf_Price_skin'])) {
     $price_skin=$data['twf_Price'][$b]['twf_Price_skin'];
     if($price_skin=='skin2') {
      wp_enqueue_script('jquery');
     wp_enqueue_style('trusty-woo-jquery-ui',TRUSTY_WOO_FILTER_URL .'assets/css/jquery-ui.css', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');
      wp_enqueue_script('jquery-ui-slider'); 
     }
     }
 wp_enqueue_script('trusty-woo-frontend-scripts');
 wp_enqueue_style('trusty-woo-font-awesome-style');
 wp_enqueue_style('trusty-woo-front-'.$filter_layout,TRUSTY_WOO_FILTER_URL . 'assets/css/filter/'.$filter_layout.".css", array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');

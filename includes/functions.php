<?php

add_filter('wp_list_categories', 'twf_cat_count_span');
function twf_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="sh_count">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}


class Trusty_Woo_shortcode_render {
	public function __construct() {
  //global $query;
  //var_dump($query);
  //add_filter( 'widget_custom_html', 'do_shortcode', 100 );
		add_shortcode("trusty_woo_filter",array($this,"trusty_woo_filter_call"));
  add_action( 'woocommerce_product_query', array($this,'twf_product_query' ),9999);
  add_filter( 'woocommerce_shortcode_products_query', array($this,'twf_short_product_query'),10,3);
 
  
  //add_action( 'pre_get_posts', array($this,'so_20990199_product_query' ),9999);
  
	}
 
 public function twf_product_query( $q ){
  //var_dump($q);
  if(isset($_REQUEST["twf_filter"])) {
  $filter_id=sanitize_text_field($_REQUEST["twf_filter"]);
   if(get_post_meta($filter_id,"twf_Options",true)) {
$data=get_post_meta($filter_id,"twf_Options",true);
    
   $tax_query = $q->get( 'tax_query' );
   $meta_query = $q->get( 'meta_query' );
   if(isset($tax_query[0])) {
    if(isset($tax_query[0]['taxonomy'])) {
    if($tax_query[0]['taxonomy']=="product_visibility") {
    unset($tax_query[0]);
   }
   }
   }
   if(isset($_REQUEST["twf_Product_cat"])) {
    $cats=sanitize_text_field($_REQUEST["twf_Product_cat"]);
    $cats=explode(",",$cats);
    $tax_query['relation']="OR";
	$tax_query[] = array(
		'taxonomy' => 'product_cat',
        'field'    => 'id',
        'terms'    => $cats,
        'operator' => 'IN',
	);
   }
   if(isset($_REQUEST["twf_Product_tag"])) {
    $cats=sanitize_text_field($_REQUEST["twf_Product_tag"]);
    $cats=explode(",",$cats);
   // var_dump($cats);
	$tax_query[] = array(
		'taxonomy' => 'product_tag',
        'field'    => 'id',
        'terms'    => $cats,
        'operator' => 'IN',
	);
   }
   if(isset($_REQUEST["twf_Price"])) {
    $price=sanitize_text_field($_REQUEST["twf_Price"]);
    $price=explode("-",$price);
    //var_dump($price);
    $price_min='0';
    $price_max='9999999';
    if(isset($price[0])) {
     $price_min=$price[0];
    }
    if(isset($price[1])) {
     $price_max=$price[1];
    }
    $meta_query[]=array('meta_query' => array(
        array(
            'key' => '_price',
            'value' => array($price_min, $price_max),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        )
    )
    );
   }
   if(isset($_REQUEST["twf_Attribute"])) {
    $atts=sanitize_text_field($_REQUEST["twf_Attribute"]);
    $atts=explode(",",$atts);
    foreach($atts as $att) {
     $from=strpos($att, '[');
     $tax=substr($att,0,$from);
     $cats=str_replace("]","",substr($att,$from+1));
     $cats=explode("-",$cats);
     $cats1[$tax]=$cats;
    }
    foreach($cats1 as $key=>$cats) {
     $tax_query[]=array(
		      'taxonomy' => 'pa_'.$key,
        'field'    => 'id',
        'terms'    => $cats,
        'operator' => 'IN',
	       );
       }
       }
   
   $q->set( 'tax_query', $tax_query );
   $q->set( 'meta_query', $meta_query );
 
   if(isset($_REQUEST["twf_Sale"])) {
    if(sanitize_text_field($_REQUEST["twf_Sale"]=="On")) {
   $product_ids_on_sale = wc_get_product_ids_on_sale();
  $q->set( 'post__in', $product_ids_on_sale );
    }
     if(sanitize_text_field($_REQUEST["twf_Sale"]=="Not")) {
   $product_ids_on_sale = wc_get_product_ids_on_sale();
  $q->set( 'post__not_in', $product_ids_on_sale );
    }
   }
    if(isset($data['appearance']['twf_per_page_type'])) {
     $pgtype=$data['appearance']['twf_per_page_type'];
     if($pgtype=="default") {
      $pr_page= wc_get_default_products_per_row()*wc_get_default_product_rows_per_page();
     }
   else  {
    $pr_page=$data['appearance']['twf_per_page'];
   }
    }
    //echo $pr_page;
    $q->set('posts_per_page',$pr_page);
  // echo "<pre>";var_dump($q);echo "</pre>";
  }
  
  }
  else {
   return $q;
  }
}
 
 public function twf_short_product_query($args,$atts,$loop){
  //var_dump($args);
  //return $args;
  
  if(isset($_REQUEST["twf_filter"])) {
   $tax_query = $args['tax_query'];
   $meta_query = $args['meta_query'];
   if(isset($tax_query[0])) {
    if(isset($tax_query[0]['taxonomy'])) {
    if($tax_query[0]['taxonomy']=="product_visibility") {
    unset($tax_query[0]);
   }
   }
   }
   if(isset($_REQUEST["twf_Product_cat"])) {
    $cats=sanitize_text_field($_REQUEST["twf_Product_cat"]);
    $cats=explode(",",$cats);
    $tax_query['relation']="OR";
	$tax_query[] = array(
		'taxonomy' => 'product_cat',
        'field'    => 'id',
        'terms'    => $cats,
        'operator' => 'IN',
	);
	//$q->set( 'tax_query', $tax_query );
   }
   //var_dump($tax_query);
   if(isset($_REQUEST["twf_Product_tag"])) {
    $cats=sanitize_text_field($_REQUEST["twf_Product_tag"]);
    $cats=explode(",",$cats);
    //var_dump($cats);
	$tax_query[] = array(
		'taxonomy' => 'product_tag',
        'field'    => 'id',
        'terms'    => $cats,
        'operator' => 'IN',
	);
   }
   if(isset($_REQUEST["twf_Price"])) {
    $price=sanitize_text_field($_REQUEST["twf_Price"]);
    $price=explode("-",$price);
    //var_dump($price);
    $price_min='0';
    $price_max='9999999';
    if(isset($price[0])) {
     $price_min=$price[0];
    }
    if(isset($price[1])) {
     $price_max=$price[1];
    }
    $meta_query[]=array('meta_query' => array(
        array(
            'key' => '_price',
            'value' => array($price_min, $price_max),
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        )
    )
    );
   }
   
   if(isset($_REQUEST["twf_Sale"])) {
    if(sanitize_text_field($_REQUEST["twf_Sale"]=="On")) {
   $product_ids_on_sale = wc_get_product_ids_on_sale();
  $args['post__in']=$product_ids_on_sale;
    }
     if(sanitize_text_field($_REQUEST["twf_Sale"]=="Not")) {
   $product_ids_on_sale = wc_get_product_ids_on_sale();
  $args['post__not_in']=$product_ids_on_sale;
    }
   }
   
   if(isset($_REQUEST["twf_Attribute"])) {
    $atts=sanitize_text_field($_REQUEST["twf_Attribute"]);
    $atts=explode(",",$atts);
    foreach($atts as $att) {
     $from=strpos($att, '[');
     $tax=substr($att,0,$from);
     $cats=str_replace("]","",substr($att,$from+1));
     $cats=explode("-",$cats);
     $cats1[$tax]=$cats;
    }
    //var_dump($cats1);
    foreach($cats1 as $key=>$cats) {
     //var_dump($key);
     $tax_query[]=array(
		'taxonomy' => 'pa_'.$key,
        'field'    => 'id',
        'terms'    => $cats,
        'operator' => 'IN',
	);
    }
    
  }
   $args['tax_query']=$tax_query;
   $args['meta_query']=$meta_query;
   
//echo "<pre>";var_dump($tax_query);echo "</pre>";
   return $args;
  }
  else {
   return $args;
  }
}
 
	public function trusty_woo_filter_call($atts) {
   ob_start();
  static $b = 1;
		$atts= shortcode_atts( array(
		 'id' => '',
		 ), $atts );
		 $id=$atts['id'];
  $st=get_post_status($id);
  if($st && $st=='publish') {
  $pt=get_post_type($id);
  include TRUSTY_WOO_FILTER_PATH.'includes/manage-front.php';
  if($woo_use=='filter-with-products') {
  $fl_cl="product-filter"; 
  }
  else {
   $fl_cl="only-filter";
  }
  echo "<div id='twf_filter_main' class='twf_main twf_filter_main twf_filter_main$b $filter_layout $fl_cl' data-id='".esc_attr($b)."' data-twf-scroll='".esc_attr($twf_scroll_top)."' data-twf-scroll-mobile='".esc_attr($twf_scroll_mobile)."' data-twf-scroll-desk='".esc_attr($twf_scroll_desktop)."' data-filter-id='".esc_attr($id)."'>";
  //echo $filter_layout;
   include TRUSTY_WOO_FILTER_PATH."includes/filters/layouts/".$filter_layout.".php";
  

  if($woo_use=='filter-with-products') {
   //echo $product_layout;
   include TRUSTY_WOO_FILTER_PATH."includes/product/layouts/".$product_layout.".php";
  }
  echo "</div>";
		 $output = ob_get_contents();
		 ob_end_clean(); 
			$b++;
		 return  $output;
		}
 
 }
}

class TRUSTY_WOO_action_hooks {
 public function __construct() {
	 add_action('wp_ajax_twf_get_product_data', array($this,'twf_get_product_data'));
add_action('wp_ajax_twf_get_product_data', array($this,'twf_get_product_data'));
	}
 

 public function twf_get_product_data() {  
 return 1;
   wp_die();
  }
  
}
new TRUSTY_WOO_action_hooks();
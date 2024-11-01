<?php
class TRUSTY_WOO_FILTER_init {  
const post_type = 'twf_posts';
public function __construct() {
	add_action( 'init', array($this,'register_trusty_post_type'),0);
 add_filter('twf_font_family',array($this,'twf_font_family'),70,1);
 add_filter('the_posts', array($this,'twf_conditionally_add_scripts_and_styles'));
 add_filter('twf_post_animations',array($this,'twf_post_animations'),5,1);
}
 
 public function twf_post_animations() {
  $animations=array("animate-off"=>'off');	
return $animations;
 }
 
 public function twf_get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
public function twf_conditionally_add_scripts_and_styles($posts) {
 if (empty($posts)) return $posts;
		$shortcode_found = false; // use this flag to see if styles and scripts need to be enqueued
		$short_id=array();
		foreach ($posts as $post) {
			if (stripos($post->post_content, '[trusty_woo_filter') !== false) {
				$str=$this->twf_get_string_between($post->post_content,"[trusty_woo_filter id=","]");
				if($str) {
					if(strpos($str, "'")!==false) { 

					$short_ids= trim(str_replace("'", '', $str)); 
					} 
					   }
				if($str) {
					if(strpos($str, '"')!==false) {
						$short_ids= trim(str_replace('"', '', $str));
					}
				}
				$short_id[]=$short_ids;
				$shortcode_found = true; // bingo!
				break;
			}
		}

 if ($shortcode_found) {
			foreach($short_id as $key=>$id) {
   if(get_post_meta($id,"twf_Options",true)) {
    $data=get_post_meta($id,"twf_Options",true);
    $key=$key+1;
    //var_dump($data);
    wp_enqueue_script('jquery');
    if(isset($data['layouts']['filter_layout']['filter_layout'])) {
     $filter_layout=$data['layouts']['filter_layout']['filter_layout'];
    if(isset($data['twf_Price'][$key]['twf_Price_skin'])) {
    $price_skin=$data['twf_Price'][$key]['twf_Price_skin'];
     if($price_skin=='skin2') {
      wp_enqueue_style('trusty-woo-jquery-ui',TRUSTY_WOO_FILTER_URL .'assets/css/jquery-ui.css', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');
       wp_enqueue_script('jquery-ui-slider'); 
     }
    }
     
     wp_enqueue_script('trusty-woo-frontend-scripts',TRUSTY_WOO_FILTER_URL . 'assets/js/script.js', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION);
     	wp_enqueue_style('trusty-woo-font-awesome-style',TRUSTY_WOO_FILTER_URL . 'assets/css/fontawesome/css/font-awesome.min.css', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');
    wp_enqueue_style('trusty-woo-front-'.$filter_layout,TRUSTY_WOO_FILTER_URL . 'assets/css/filter/'.$filter_layout.".css", array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');
   }
   }

	}
			}
		return $posts;
}
public function register_trusty_post_type() {
		register_post_type( self::post_type, array(
			'labels' => array(
				'name' => __( 'Trusty Woo Filters', 'tw-filter' ),
				'singular_name' => __( 'Trusty Woo Filter', 'tw-filter' ),
			),
			'public'              => false,
				'hierarchical'        => false,
				'exclude_from_search' => true,
				'show_ui'             => current_user_can( 'manage_options' ) ? true : false,
				'show_in_admin_bar'   => false,
				'menu_position'       => 7,
				//'menu_icon'           => TRUSTY_WOO_FILTER_URL.'admin/images/logo-icon.png',
			   'menu_icon'           =>'dashicons-layout',
				'rewrite'             => false,
				'query_var'           => false,
				'supports'            => array(
					'title', 
				),
		));
	}
 
 
 public function twf_font_family($fonts) {
 $path = TRUSTY_WOO_FILTER_PATH ."admin/google-fonts.json";
$request = file_get_contents( $path );
$fonts_json_decoded = json_decode( $request,true);
		$fonts = array();
		foreach ( $fonts_json_decoded['items'] as $font_item ) {
			if ( ! isset( $font_item['family'], $font_item['variants'], $font_item['subsets'], $font_item['category'] ) ) {
				continue;
			}
			$fonts[ sanitize_text_field( $font_item['family'] ) ] = array(
				'styles'        => sanitize_text_field( implode( ',', $font_item['variants'] ) ),
				'character_set' => sanitize_text_field( implode( ',', $font_item['subsets'] ) ),
				'type'          => sanitize_text_field( $font_item['category'] ),
			);
		}
		ksort( $fonts );
		return $fonts;
}
}

class TRUSTY_WOO_FILTER_Meta_Boxes {  
	public function __construct() {
		add_action( 'add_meta_boxes',array($this,'twf_add_post_metabox'));
		add_action( 'save_post', array($this,'twf_wpdocs_save_meta_box'),10,2);
	}
	
 public function twf_add_post_metabox() {
		add_meta_box('twf_top_meta_box', __('Settings'),array($this,'twf_top_meta_box'),'twf_posts','normal','core');
	}
 
	public function twf_top_meta_box() {
		?>
<div class='manage-top-logo-helper'>
<div class="logo-helper"><a href='https://trustyplugins.com' target="_blank">

 <img src="<?php echo TRUSTY_WOO_FILTER_URL;?>/admin/images/full-logo.png">
  </a></div>
	<div class="manage-top-dash general-tab new-tab"><span class="dashicons dashicons-admin-tools"></span><span class='text'>
		<?php echo esc_html__('General Settings','trusty-woo-products-filter'); ?></span> <a href='<?php echo esc_url('https://trustyplugins.com','trusty-woo-products-filter'); ?>' target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo esc_html__('Documentation','trusty-woo-products-filter'); ?> </a></div></div>
	<div id="maintain-sidebar">
	
	  <!-- Nav tabs -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item" role="presentation">
		<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general-tab" aria-selected="true"><?php echo esc_html__('Filters');?> <br/><span class="info-bt"><?php echo esc_html__('Post Type, Categories','trusty-woo-products-filter'); ?> </span><span class="dashicons dashicons-admin-tools"></span></a>
	  </li>
   <li class="nav-item" role="presentation">
		<a class="nav-link" id="layouts-tab" data-toggle="tab" href="#layoutstab" role="tab" aria-controls="layouts-tab" aria-selected="false"><?php echo esc_html__('Layouts','trusty-woo-products-filter');?> <br/><span class="info-bt"><?php echo esc_html__('Post Layout, Filter Layout','trusty-woo-products-filter'); ?></span><span class="dashicons dashicons-visibility"></span></a>
	  </li>
  
	  <li class="nav-item" role="presentation">
		<a class="nav-link disabled assign" id="appearance-tab" data-toggle="tab" href="#appearance" role="tab" aria-controls="appearance-tab" aria-selected="false"><?php echo esc_html__('Appearance','trusty-woo-products-filter');?> <br/><span class="info-bt"><?php echo esc_html__('Post Layout, Filter Layout','trusty-woo-products-filter'); ?></span><span class="dashicons dashicons-visibility"></span></a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link" id="typography-tab" data-toggle="tab" href="#typography" role="tab" aria-controls="typography-tab" aria-selected="false"><?php echo esc_html__('Typography','trusty-woo-products-filter');?> <br/><span class="info-bt"><?php echo esc_html__('Title, Description Fonts','trusty-woo-products-filter'); ?></span><span class="dashicons dashicons-editor-spellcheck"></span></a>
	  </li>
	  <li class="nav-item" role="presentation">
		<a class="nav-link" id="advanced-tab" data-toggle="tab" href="#advanced" role="tab" aria-controls="advanced-tab" aria-selected="false"><?php echo esc_html__('Advanced','trusty-woo-products-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Add Extra Classes to Post','trusty-woo-products-filter'); ?></span><span class="dashicons dashicons-tag"></span></a>
	  </li>
		<li class="nav-item" role="presentation">
		<a class="nav-link" id="shortcode-tab" data-toggle="tab" href="#shortcode" role="tab" aria-controls="shortcode-tab" aria-selected="false"><?php echo esc_html__('Shortcode','trusty-woo-products-filter'); ?> <br/><span class="info-bt"><?php echo esc_html__('Get Your shortcode','trusty-woo-products-filter'); ?></span><span class="dashicons dashicons-shortcode"></span></a>
	  </li>
	</ul>
	</div>
	<!-- Tab panes -->
	<div class="tab-content twf_top_meta_box twf-tab-content">
		<?php
  	$twf_admin_fliters=new TRUSTY_WOO_FILTER_init();
		wp_nonce_field( basename( __FILE__ ), 'trusty_woo_post_meta_option' );
		include_once TRUSTY_WOO_FILTER_PATH.'admin/tabs/variables.php';
		?>
		<!-- START GENERAL SETTINGS TAB DATA -->
		<?php 
		include_once TRUSTY_WOO_FILTER_PATH . 'admin/tabs/general.php';
		?>
		<!-- END GENERAL SETTINGS TAB DATA -->
  <!-- START LAYOUTS SETTINGS TAB DATA -->
		<?php 
		include_once TRUSTY_WOO_FILTER_PATH . 'admin/tabs/layouts.php';
		?>
		<!-- END LAYOUTS SETTINGS TAB DATA -->
  
		<!-- START APPEARANCE SETTINGS TAB DATA -->
		<?php 
		include_once TRUSTY_WOO_FILTER_PATH . 'admin/tabs/appearance.php';
		?>
		<!-- END APPEARANCE SETTINGS TAB DATA -->
		<!-- START TYPOGRAPHY SETTINGS TAB DATA -->
		<?php 
	 include_once TRUSTY_WOO_FILTER_PATH . 'admin/tabs/typography.php';
		?>
		<!-- END TYPOGRAPHY SETTINGS TAB DATA -->
		<!-- START ADVANCED SETTINGS TAB DATA -->
		<?php 
		include_once TRUSTY_WOO_FILTER_PATH . 'admin/tabs/advanced.php';
		?>
		<!-- END ADVANCED SETTINGS TAB DATA -->
		<!-- START SHORTCODE TAB DATA -->
		<?php 
		include_once TRUSTY_WOO_FILTER_PATH . 'admin/tabs/shortcode.php';
		?>
		<!-- END SHORTCODE TAB DATA -->
	</div>
		<?php
	}
 
 public function twf_wpdocs_save_meta_box( $post_id,$post ) {
	/* Verify the nonce before proceeding. */
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
				return;
			}
		if (!current_user_can('edit_page',$post_id)) {
    return $post_id;
   }
  if($post->post_type=="twf_posts") {
   $arr=array();
   if(isset($_POST['filter-manage'])) {
    $filters_id=sanitize_text_field($_POST['filter-manage-id']);
    $filters=sanitize_text_field($_POST['filter-manage']);
    $filters=explode(",",$filters);
    $filters_id=explode(",",$filters_id);
    foreach($filters as $key=>$filter) {
     $pos= strpos($filter,"=>");
     $k=substr($filter,0,$pos);
     $v=substr($filter,$pos+2);
     $flt[][$k]=$v;
    }
    $arr['filters']=$flt;
    $arr['filters_id']=$filters_id;
    //var_dump($flt);
    //var_dump($filters);
     foreach($flt as $key=>$filter) {
      $k=$filters_id[$key];
      //var_dump($filter[$k]);
      if($filter[$k]=='twf_Price') {
      $skin="twf_Price_skin_".$k;
      $lbl="twf_Price_label_".$k;
       $pr_skin=sanitize_text_field( $_POST[$skin]);
       $pr_start=sanitize_text_field($_POST['twf_Price_start']);
       $pr_range=sanitize_text_field($_POST['twf_Price_range']);
       $pr_end=sanitize_text_field($_POST['twf_Price_end']);
       $pr_cur=sanitize_text_field($_POST['twf_Price_currency']);
       $pr_lbl=sanitize_text_field($_POST[$lbl]);
       $pr_placeholder=sanitize_text_field( $_POST['twf_Price_placeholder']);
       $pr_toggle=sanitize_text_field( $_POST['twf_Price_toggle']);
       $arr['twf_Price'][$k]=array("twf_Price_skin"=>$pr_skin,"twf_Price_label"=>$pr_lbl,"twf_Price_start"=>$pr_start,"twf_Price_range"=>$pr_range,"twf_Price_end"=>$pr_end,"price_currency"=>$pr_cur,"twf_Price_toggle"=>$pr_toggle,"twf_Price_placeholder"=>$pr_placeholder);
      }
      
      if($filter[$k]=='twf_Attributes') {
       //die;
       $name="twf_Attribute_name_".$k;
       $type="twf_Attribute_type_".$k;
       $skin="twf_Attribute_skin_".$k;
       $lbl="twf_Attribute_label_".$k;
       $plc="twf_Attribute_placeholder_".$k;
       $tgl="twf_Attribute_toggle_".$k;
       $dyn_fields="dynamic_keys_".$k;
       
       $name=sanitize_text_field($_POST[$name]);
       $type=sanitize_text_field($_POST[$type]);
       $skin=sanitize_text_field($_POST[$skin]);  
       $lbl=sanitize_text_field($_POST[$lbl]);
       $plc=sanitize_text_field($_POST[$plc]);
       $tgl=sanitize_text_field($_POST[$tgl]);
       if(isset($_POST[$dyn_fields])) {
       $dyn_fields=sanitize_text_field($_POST[$dyn_fields]);
        $dyn_fields1=array();
        $new_fields=array();
        $dyn_fields1=explode(",",$dyn_fields);
        
        foreach($dyn_fields1 as $fields) {
        if(isset($_POST["twf-dynamic-color-".$fields])) {
         $new_fields[$fields]=sanitize_text_field($_POST["twf-dynamic-color-".$fields]);
        }
        }
       //var_dump($new_fields);
        //die;
       }
       if(isset($_POST['twf_att_admin_'.$k])) {
        $new_fields=sanitize_html_class($_POST['twf_att_admin_'.$k]);
       }
       
       if(!isset($new_fields)) {
        $new_fields='';
       }
       //var_dump($new_fields);
       //exit();
       $arr['twf_Attributes'][$k]=array("twf_Attribute_name"=>$name,"twf_Attribute_type"=>$type,"twf_Attribute_fields"=>$new_fields,"twf_Attribute_skin"=>$skin,"twf_Attribute_label"=>$lbl,"twf_Attribute_placeholder"=>$plc,"twf_Attribute_toggle"=>$tgl);
      }
      
      if($filter[$k]=='twf_Product_cat') {
       $cats="twf_Product_cat_".$k;
        if(isset($_POST[$cats])) {
        $cats=sanitize_html_class($_POST[$cats]);
       }
       else {
        $cats=array('');
       }
       if(isset($_POST['twf_cat_display'])) {
       //$cats=$_POST[$cats];
        $display=sanitize_text_field($_POST["twf_cat_display"]);
        $hierarchical=sanitize_text_field($_POST["twf_cat_hierarchical"]);
        $cat_skins=sanitize_text_field($_POST["twf_cat_skins"]);
        $show_count=sanitize_text_field($_POST["twf_cat_show_count"]);
        $pr_label=sanitize_text_field($_POST["twf_Product_cat_label_".$k]);
        $pr_placeholder=sanitize_text_field($_POST["twf_Product_cat_placeholder"]);
        $pr_toggle=sanitize_text_field($_POST["twf_Product_cat_toggle"]);
       $arr['twf_Product_cat'][$k]=array("twf_Product_cats"=>$cats,"display"=>$display,"cat_skins"=>$cat_skins,"hierarchical"=>$hierarchical,"show_count"=>$show_count,"twf_Product_cat_label"=>$pr_label,"twf_Product_cat_placeholder"=>$pr_placeholder,"twf_Product_cat_toggle"=>$pr_toggle);
       }
      }
      
      if($filter[$k]=='twf_Product_tag') {
       //echo "yes";
       //var_dump($_POST);
       $tags="twf_Product_tag_".$k;
       if(isset($_POST[$tags])) {
        $tags=sanitize_html_class($_POST[$tags]);
       }
       else {
        $tags=array();
       }
       if(isset($_POST['twf_tag_display'])) {
        $display=sanitize_text_field($_POST["twf_tag_display"]);
        $tag_skins=sanitize_text_field($_POST["twf_tag_skins"]);
        $hierarchical=sanitize_text_field($_POST["twf_tag_hierarchical"]);
        $show_count=sanitize_text_field($_POST["twf_tag_show_count"]);
        $pr_label=sanitize_text_field($_POST["twf_Product_tag_label_".$k]);
        $pr_placeholder=sanitize_text_field($_POST["twf_Product_tag_placeholder"]);
        $pr_toggle=sanitize_text_field($_POST["twf_Product_tag_toggle"]);
       $arr['twf_Product_tag'][$k]=array("twf_Product_tags"=>$tags,"display"=>$display,"tag_skins"=>$tag_skins,"hierarchical"=>$hierarchical,"show_count"=>$show_count,"twf_Product_tag_label"=>$pr_label,"twf_Product_tag_placeholder"=>$pr_placeholder,"twf_Product_tag_toggle"=>$pr_toggle);
       }
      }
      if(isset($_POST["twf_on_sale_placeholder"])) {
       $sale_skin=sanitize_text_field($_POST["twf_Sale_skins"]);
       $on_sale_place=sanitize_text_field($_POST["twf_on_sale_placeholder"]);
       $not_on_sale_place=sanitize_text_field($_POST["twf_not_on_sale_placeholder"]);
       $sale_label=sanitize_text_field($_POST["twf_Sale_label"]);
       $sale_place=sanitize_text_field($_POST["twf_Sale_placeholder"]);
       $sale_toggle=sanitize_text_field($_POST["twf_Sale_toggle"]);
       $arr['twf_Sale']=array("sale_skins"=>$sale_skin,"on_sale_place"=>$on_sale_place,"not_on_sale_place"=>$not_on_sale_place,"sale_label"=>$sale_label,"sale_place"=>$sale_place,"sale_toggle"=>$sale_toggle);
      }
      
     }
      
      if(isset($_POST["twf-filter-use"])) {
       $woo_use=sanitize_text_field($_POST["twf-filter-use"]);
       $arr['woo-use']=array("woo_use"=>$woo_use);
      }
      if(isset($_POST["twf-filter-layout"])) {
       $filter_layout=sanitize_text_field($_POST["twf-filter-layout"]);
       $filter_pr_color=sanitize_text_field($_POST["twf-filter-primary-color"]);
       $filter_sec_color=sanitize_text_field($_POST["twf-filter-sec-color"]);
       $filter_sec_color2=sanitize_text_field($_POST["twf-filter-sec-color2"]);
       $arr['layouts']['filter_layout']=array("filter_layout"=>$filter_layout,"filter_primary_color"=>$filter_pr_color,"filter_sec_color"=>$filter_sec_color,"filter_sec_color2"=>$filter_sec_color2);
      }
    if(isset($_POST["twf-product-layout"])) {
       $product_layout=sanitize_text_field($_POST["twf-product-layout"]);
       $product_pr_color=sanitize_text_field($_POST["twf-product-primary-color"]);
       $product_sec_color=sanitize_text_field($_POST["twf-product-sec-color"]);
       $product_sec_color2=sanitize_text_field($_POST["twf-product-sec-color2"]);
       $arr['layouts']['product_layout']=array("product_layout"=>$product_layout,"product_primary_color"=>$product_pr_color,"product_sec_color"=>$product_sec_color,"product_sec_color2"=>$product_sec_color2);
      }
    if(isset($_POST["twf-sec-bg-color"])) {
     $twf_sec_bg_color=sanitize_text_field($_POST["twf-sec-bg-color"]);
     $twf_per_page_type=sanitize_text_field($_POST["twf-per-page-type"]);
     $twf_per_page=sanitize_text_field($_POST["twf-per-page"]);
     $arr['appearance']=array('twf_sec_bg_color'=>$twf_sec_bg_color,"twf_per_page_type"=>$twf_per_page_type,"twf_per_page"=>$twf_per_page);
    }
    
    
    if(isset($_POST["twf_scroll_top"])) {
       $twf_scroll_top=sanitize_text_field($_POST["twf_scroll_top"]);
       $twf_scroll_mobile=sanitize_text_field($_POST["twf_scroll_position_mobile"]);
       $twf_scroll_desktop=sanitize_text_field($_POST["twf_scroll_position_desktop"]);
       $arr['scroll']=array("scroll_top"=>$twf_scroll_top,"scroll_mobile"=>$twf_scroll_mobile,"scroll_desktop"=>$twf_scroll_desktop);
      }
    
    if(isset($_POST["twf-filter-tax-label-font"])) {
       $twf_filter_tax_label_font=sanitize_text_field($_POST["twf-filter-tax-label-font"]);
       $twf_filter_tax_label_trans=sanitize_text_field($_POST["twf-filter-tax-label-trans"]);
       $twf_filter_tax_label_size=sanitize_text_field($_POST["twf-filter-tax-label-size"]);
     $twf_filter_cat_label_font=sanitize_text_field($_POST["twf-filter-cat-label-font"]);
       $twf_filter_cat_label_trans=sanitize_text_field($_POST["twf-filter-cat-label-trans"]);
       $twf_filter_cat_label_size=sanitize_text_field($_POST["twf-filter-cat-label-size"]);
      $arr['typography']['filter']=array("filter_tax_label_font"=>$twf_filter_tax_label_font,"filter_tax_label_trans"=>$twf_filter_tax_label_trans,"filter_tax_label_size"=>$twf_filter_tax_label_size,"filter_cat_label_font"=>$twf_filter_cat_label_font,"filter_cat_label_trans"=>$twf_filter_cat_label_trans,"filter_cat_label_size"=>$twf_filter_cat_label_size);
      }
    
    //print_r($arr);
    update_post_meta( $post_id, 'twf_Options', $arr);
    //exit();
   }
  
  }
	}
 
}


class TRUSTY_WOO_Embed_Admin_Css_Js {
public function __construct() {
	add_action( 'admin_enqueue_scripts', array($this,'trusty_woo_embedCssJs'));
	}
public function trusty_woo_embedCssJs() {
	global $post_type;
 if($post_type=="twf_posts")
	{
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'jquery-ui-sortable', false, array('jquery') );
	wp_enqueue_style( 'twf_filter-custom-admin-style', TRUSTY_WOO_FILTER_URL . 'admin/css/custom.min.css');
	wp_enqueue_style( 'twf_filter-font-awesome-style', TRUSTY_WOO_FILTER_URL . 'assets/css/fontawesome/css/font-awesome.min.css');
	wp_enqueue_script( 'twf_filter-script', TRUSTY_WOO_FILTER_URL . 'assets/bootstrap-5.1.3-dist/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'twf_filter-bootstrap-admin-style', TRUSTY_WOO_FILTER_URL . 'assets/bootstrap-5.1.3-dist/css/bootstrap.min.css');
	wp_enqueue_style( 'wp-color-picker' );
 wp_enqueue_script( 'wp-color-picker');	
	wp_enqueue_script( 'twf-admin-script', TRUSTY_WOO_FILTER_URL . 'admin/js/custom.js', array( 'jquery','wp-color-picker'));
	wp_localize_script( 'twf-admin-script', 'twf_ajax', array( 'ajax_url' => admin_url('admin-ajax.php'),'nonce'=>wp_create_nonce('twf_nonce'),'plugin_url'=>TRUSTY_WOO_FILTER_URL) );
	}
}
}



class TRUSTY_WOO_load_scripts {
public function __construct() {
	add_action('wp_enqueue_scripts', array($this,'Trusty_Woo_enqueue_scripts'));
	}

	public function Trusty_Woo_enqueue_scripts(){
  wp_register_style('trusty-woo-front-css',TRUSTY_WOO_FILTER_URL . 'assets/css/common/common.css', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');
  
	wp_register_script('trusty-woo-frontend-scripts',TRUSTY_WOO_FILTER_URL . 'assets/js/script.js', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION);
  $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
  
	wp_localize_script( 'trusty-woo-frontend-scripts', 'trusty_woo_ajax', array( 'ajax_url' => admin_url('admin-ajax.php'),'nonce'=>wp_create_nonce('trusty_woo_ajax_nonce'),'plugin_path'=>TRUSTY_WOO_FILTER_URL,'shop_page_url'=>$shop_page_url));	
  
	wp_register_style('trusty-woo-font-awesome-style',TRUSTY_WOO_FILTER_URL . 'assets/css/fontawesome/css/font-awesome.min.css', array(), TRUSTY_WOO_FILTER_PLUGIN_VERSION, 'all');

	}
}

class Trusty_Woo_shortcode {	
public function __construct() {
	$this->twf_shortcodes_init();
 
}	
public function twf_shortcodes_init(){
include TRUSTY_WOO_FILTER_PATH . 'includes/functions.php';
new Trusty_Woo_shortcode_render();
 //var_dump($d);
}
}
class twf_Ajax_Actions {
 public function __construct() {
add_action('wp_ajax_twf_get_filter_data', array($this,'twf_get_filter_data'));
add_action('wp_ajax_twf_get_filter_dynamic', array($this,'twf_get_filter_dynamic'));
add_action('admin_enqueue_scripts', array($this,'twf_wptuts_add_color_picker'));
}
public function twf_get_filter_data() {
if(isset($_POST["type"])) {
 $type=sanitize_text_field($_POST["type"]);
// echo TRUSTY_WOO_FILTER_PATH."admin/filter-types/".$type.".php";
 include TRUSTY_WOO_FILTER_PATH."admin/filter-types/".$type.".php";
}
 wp_die();
}
public function twf_get_filter_dynamic() {
if(isset($_POST["type"])) {
 $type=sanitize_text_field($_POST["type"]);
 $name=sanitize_text_field($_POST["name"]);
 $data_id=sanitize_text_field($_POST["data_id"]);
 if(isset($_POST["data_post_id"])) {
 $data_post_id=sanitize_text_field($_POST["data_post_id"]);
 }
 include TRUSTY_WOO_FILTER_PATH."admin/filter-dynamic.php";
}
 wp_die();
} 
 public function twf_wptuts_add_color_picker($hook) {
    if(is_admin()) {  
        wp_enqueue_style( 'wp-color-picker' );  
    }
}
}
new twf_Ajax_Actions();
<?php
$woo_cl='twf_hide';
if(isset($data)) {
 if(isset($data['woo-use'])) {
  $filter_use=$data['woo-use']['woo_use'];
  if($filter_use=='only-filter') {
   $woo_cl='twf_hide';
  }
  else {
   $woo_cl='';
  }
 }
 if(isset($data['layouts'])) {
  $layouts=$data['layouts'];
  $f_layouts=$layouts['filter_layout'];
  $p_layouts=$layouts['product_layout'];
 }
}
//var_dump($data);
//var_dump($f_layouts);
//var_dump($p_layouts);
?>

<div class="tab-pane" id="layoutstab" role="tabpanel" aria-labelledby="layouts-tab">
	<div class="manage-top-dash layout-tab text"> <?php echo esc_html__('Layouts Management','trusty-woo-products-filter'); ?></div>
	<div id="tabs-panel">

  <div class="tab-panel filter-general">

	<div class="tab-header" data-content="filter-general"><i class="fa fa-filter left" aria-hidden="true"></i> <?php echo esc_html__('General Settings','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i>
  </div>

	<div class="tab-content filter-general">

    <!---- START LAYOUT TAB DATA ---->

	<div class='app-tab-content active' id="app-layout">
	
	<!---- START CATEGORY FILTER FORM GROUP ROW ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">
    <label for="twf-filter-use" class='col-sm-12 bold-span-title'><?php echo esc_html__('Display Filter and Product Layouts','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Use default woo shop page layout or use premade layouts by us, Woo Default layout only will work on default shop page.','trusty-woo-products-filter');?></span></label>
	
    <div class="col-sm-12">
    
    <select class="form-control twf_filter_object_field twf_filter_select twf_import" data-import="twf_filter_use" data-field-type='select' id="twf-filter-use" name="twf-filter-use">
		<option value="only-filter" <?php if(isset($filter_use)) { if($filter_use=="only-filter") {echo esc_attr("selected");} }?>><?php echo esc_html__('Show Only Filter','trusty-woo-products-filter');?></option>
     <option value="filter-with-products" <?php if(isset($filter_use)) {if($filter_use=="filter-with-products") {echo esc_attr("selected");}} ?>><?php echo esc_html__('Filter & Product Layout','trusty-woo-products-filter');?></option>
		</select>
	</div>
	</div>
	</div>
	
	
 
	

		 </div>
	</div>

	</div>
  
	<div class="tab-panel filter-layout">

	<div class="tab-header" data-content="filter-layout"><i class="fa fa-filter left" aria-hidden="true"></i> <?php echo esc_html__('Filter Layout','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i>
  </div>

	<div class="tab-content filter-layout">

    <!---- START LAYOUT TAB DATA ---->

	<div class='app-tab-content' id="app-layout">
		<div class='manage-filters'>	

  
	<!---- START CATEGORY FILTER FORM GROUP ROW ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">
    <label for="twf-filter-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Your Filter Design','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select design layout of filter.','trusty-woo-products-filter');?></span></label>
	
    <div class="col-sm-12">
     <?php
     $filter_layout='';
     if(isset($f_layouts['filter_layout'])) {
      $filter_layout=$f_layouts['filter_layout'];
     }
     ?>
    <select class="form-control twf_filter_object_field twf_filter_select twf_import" data-import="twf_filter_layout" data-field-type='select' id="twf-filter-layout" name="twf-filter-layout">
	<!--	<option value="filter-default" <?php if($filter_layout=="filter-default") {echo esc_attr("selected");} ?>><?php echo esc_html__('Default','trusty-woo-products-filter');?></option>-->
		<option value="classic-design" <?php if($filter_layout=="classic-design") {echo esc_attr("selected");} ?>><?php echo esc_html('Classic Design','trusty-woo-products-filter');?></option>
		</select>
	</div>
	</div>
	</div>
	<!---- START FILTER COLOR COMBINATION ---->	
	<div class="col-sm-12 row-bottom filter-color-combo">
  <?php
     $filter_pr_color='#f7f7f7';
     $filter_sec_color='#333333';
     $filter_sec_color2='#333333';
     if(isset($f_layouts['filter_primary_color']) && $f_layouts['filter_primary_color']!='') {
      $filter_pr_color=$f_layouts['filter_primary_color'];
     }
     if(isset($f_layouts['filter_sec_color']) && $f_layouts['filter_sec_color']!='') {
      $filter_sec_color=$f_layouts['filter_sec_color'];
     }
     if(isset($f_layouts['filter_sec_color2']) && $f_layouts['filter_sec_color2']!='') {
      $filter_sec_color2=$f_layouts['filter_sec_color2'];
     }
     
     //echo "sec".$filter_sec_color;
     ?>
	<div class="form-group row">
    <label for="twf-filter-primary-color" class='col-sm-12 bold-span-title'><?php echo esc_html__('Filter Color Combination','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select Primary/Secondary color for filter layout.','trusty-woo-products-filter');?></span></label>
		
    <div class="col-sm-4 filter-primary-color">
    <span class='label-title'><?php echo esc_html__('Primary Color','trusty-woo-products-filter');?></span><br/>
	<input type="text" value="<?php echo esc_attr($filter_pr_color);?>" class="twf_import my-color-field" name='twf-filter-primary-color' data-default-color="#f79918" data-import='twf_filter_primary_color' id='twf-filter-primary-color'/>
	</div>
		
	<div class="col-sm-4 filter-sec-color">
    <span class='label-title'><?php echo esc_html__('Secondary Color','trusty-woo-products-filter');?></span><br/>
	<input type="text" value="<?php echo esc_attr($filter_sec_color);?>" class="twf_import my-color-field" name='twf-filter-sec-color' data-default-color="#ffffff" data-import='twf_filter_sec_color'/>
	</div>
	
	<div class="col-sm-4 filter-sec-color2">
    <span class='label-title'><?php echo esc_html__('Secondary Color 2','trusty-woo-products-filter');?></span><br/>
	<input type="text" value="<?php echo esc_attr($filter_sec_color2);?>" class="twf_import my-color-field" name='twf-filter-sec-color2' data-default-color="#ffffff" data-import='twf_filter_sec_color2'/>
	</div>
		
	</div>
	</div>
  <!---- END FILTER COLOR COMBINATION ---->
 
 
  </div>
  <!---- END MANAGE FILTER DIV ---->
	

		 </div>
	</div>

	</div>
	
  
  <div class="tab-panel product-layout <?php echo esc_attr($woo_cl); ?>">

	<div class="tab-header" data-content="product-layout"><i class="fa fa-filter left" aria-hidden="true"></i> <?php echo esc_html__('Products Layout','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i>
  </div>

	<div class="tab-content product-layout">
    <!---- START LAYOUT TAB DATA ---->
	<div class='app-tab-content active' id="app-layout">
		<div class='manage-product-filters'>	
	<!---- START CATEGORY FILTER FORM GROUP ROW ---->
	<div class="col-sm-12 row-bottom">
	<div class="form-group row">
    <label for="twf-product-layout" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Your Products Layout Design','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select design layout of products.','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-12">
     <?php
     $product_layout='';
     $product_pr_color='#427c64';
     $product_sec_color='#ffffff';
     $product_sec_color2='#333333';
     if(isset($p_layouts['product_layout'])) {
      $product_layout=$p_layouts['product_layout'];
     }
     if(isset($p_layouts['product_primary_color']) && $p_layouts['product_primary_color']!='') {
      $product_pr_color=$p_layouts['product_primary_color'];
     }
     if(isset($p_layouts['product_sec_color']) && $p_layouts['product_sec_color']!='') {
      $product_sec_color=$p_layouts['product_sec_color'];
     }
     if(isset($p_layouts['product_sec_color2']) && $p_layouts['product_sec_color2']!='') {
      $product_sec_color2=$p_layouts['product_sec_color2'];
     }
     ?>
    <select class="form-control twf_product_object_field twf_product_select twf_import" data-import="twf_product_layout" data-field-type='select' id="twf-product-layout" name="twf-product-layout">
		<option value="product-default" <?php if($product_layout=="product-default") {echo esc_attr("selected");} ?>><?php echo esc_html__('Default','trusty-woo-products-filter');?></option>
		</select>
	</div>
	</div>
	</div>
	<!---- START FILTER COLOR COMBINATION ---->	
	<div class="col-sm-12 row-bottom product-color-combo">
	<div class="form-group row">
    <label for="twf-product-primary-color" class='col-sm-12 bold-span-title'><?php echo esc_html__('Product Layout Color Combination','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select Primary/Secondary color for Product layout.','trusty-woo-products-filter');?></span></label>
		
    <div class="col-sm-4 product-primary-color">
    <span class='label-title'><?php echo esc_html__('Primary Color','trusty-woo-products-filter');?></span><br/>
	<input type="text" value="<?php echo esc_attr($product_pr_color);?>" class="twf_import my-color-field" name='twf-product-primary-color' data-default-color="#f79918" data-import='twf_product_primary_color' id='twf-product-primary-color'/>
	</div>
		
	<div class="col-sm-4 product-sec-color">
    <span class='label-title'><?php echo esc_html__('Secondary Color','trusty-woo-products-filter');?></span><br/>
	<input type="text" value="<?php echo esc_attr($product_sec_color);?>" class="twf_import my-color-field" name='twf-product-sec-color' data-default-color="#ffffff" data-import='twf_product_sec_color'/>
	</div>
	
	<div class="col-sm-4 product-sec-color2">
    <span class='label-title'><?php echo esc_html__('Secondary Color 2','trusty-woo-products-filter');?></span><br/>
	<input type="text" value="<?php echo esc_attr($product_sec_color2);?>" class="twf_import my-color-field" name='twf-product-sec-color2' data-default-color="#ffffff" data-import='twf_product_sec_color2'/>
	</div>
		
	</div>
	</div>
  <!---- END FILTER COLOR COMBINATION ---->
 
 
  </div>
  <!---- END MANAGE FILTER DIV ---->
	

		 </div>
	</div>

	</div>
 
 </div>		 
</div>
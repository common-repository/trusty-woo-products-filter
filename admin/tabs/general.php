<div class="tab-pane tab-pad active" id="general" role="tabpanel" aria-labelledby="general-tab">
	<div class="manage-top-dash general-tab text">
		<?php echo esc_html__('Build Your Filter','trusty-woo-products-filter'); ?></div>
	<div id="tabs-panel">
	<!---- START QUERY OPTIONS TOGGLE ---->	
	<div class="tab-panel query">
		<div class="tab-header active" data-content="query"><i class="fa fa-check-square-o left" aria-hidden="true"></i> <?php echo esc_html__('Filter Settings','trusty-woo-products-filter'); ?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
  
		<div class="tab-content query active">
	<!---- START FULL ROW CUSTOM POST TYPE ----> 
	<div class='col-sm-12 row-bottom'>
	<!-- FORM GROUP -->
	<div class="form-group row">
    <label for="custom-post-type-select" class="col-sm-12 col-form-label"><?php echo __('Select Filter Type','trusty-woo-products-filter'); ?><span class="info"><?php echo esc_html__('Select your filter type.','trusty-woo-products-filter'); ?></span></label>
    <div class="col-sm-10 pr-0">
     <?php
    // $twf_mods=new TRUSTY_WOO_FILTER_mods();
     // $filtersList = $twf_mods->getAllFilters();
     //var_dump($filtersList);
     ?>
    <select class="form-control" data-field-type='select' id="twf-filter-type" name="twf-filter-type">
    <option value="twf_Price" data-name="twf_Price"><?php echo esc_html__('Price','trusty-woo-products-filter'); ?></option>
    <option value="twf_Attributes" data-name="twf_Attributes"><?php echo esc_html__('Attributes','trusty-woo-products-filter'); ?></option>
    <option value="twf_Product_cat" data-name="twf_Product_cat"><?php echo esc_html__('Product Categories','trusty-woo-products-filter'); ?></option>
    <option value="twf_Product_tag" data-name="twf_Product_tag"><?php echo esc_html__('Product Tags','trusty-woo-products-filter'); ?></option>
    <!--<option value="twf_Taxonomies" data-name="twf_Taxonomies"><?php echo esc_html__('Custom Taxonomies','trusty-woo-products-filter'); ?></option>-->
     <option value="twf_Sale" data-name="twf_Sale"><?php echo esc_html__('Sale','trusty-woo-products-filter'); ?></option>
    </select>
	</div>
  <div class="col-sm-2">
   <button class="btn btn-primary" id="twf-add"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
  </div>
	</div>
    <!-- FORM GROUP -->
  <input type="hidden" name="filter-manage" id="filter-manage" value="0">
  <input type="hidden" name="filter-manage-id" id="filter-manage-id" value="">
    </div>

   <div class='col-sm-12 row-bottom' id="result-filter-types">
   <div id="twf-filter-types" class="list-group twf-filter-types">
  <?php
    global $post;
    if(isset($filters)) {
    foreach($filters as $key=>$filter) {
     $id=$filters_id[$key];
     $flt=$filter[$id];
     //echo $id;
     if(isset($id) && $id!=null) {
      include TRUSTY_WOO_FILTER_PATH."admin/filter-types/".$flt.".php";
      }
    }
    }
    ?>
</div>
   </div>
	</div>
	</div>
  <?php do_action("tc_caf_after_caf_query_tab"); ?>
	<!---- END QUERY OPTIONS TOGGLE ---->
	</div>
	</div>
<?php
// Get an array of product attribute taxonomies slugs
 // Get an array of product attribute taxonomies slugs
 $attributes_tax_slugs = array_keys( wc_get_attribute_taxonomy_labels() );
//var_dump($attributes_tax_slugs);
 $taxonomies = get_object_taxonomies('product');
//var_dump($taxonomies);  
 ?>
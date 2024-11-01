<div class="tab-pane" id="typography" role="tabpanel" aria-labelledby="typography-tab">

 <div class="manage-top-dash general-tab text">
  <?php echo esc_html__('Typography','trusty-woo-products-filter'); ?> </div>

 <div id="tabs-panel">
  <div class="tab-panel filter-typography">

   <div class="tab-header" data-content="filter-typo"><i class="fa fa-align-center left" aria-hidden="true"></i>
    <?php echo esc_html__('Filter Typography','trusty-woo-products-filter'); ?><i class="fa fa-angle-down" aria-hidden="true"></i>
   </div>
   <div class="tab-content filter-typo">
    <!---- START ROW FORM GROUP OF FILTER TAX LABEL ---->
    <div class="form-group row-bottom">
     <label for="twf-filter-tax-label-font" class="col-sm-12 col-form-label">
      <?php echo esc_html__('Filter Taxonomy Labels','trusty-woo-products-filter');?> <br/>
      <span>
       <?php echo esc_html__('Select font styling for Taxonomy Labels.','trusty-woo-products-filter');?>
      </span>
     </label>
     <!-- START SIDEBAR OF BAR AREA POST TITLE-->
     <div class="col-sm-12">
      <!-- START FIRST ROW OF POST TITLE SIDEBAR -->
      <div class="row">
       <!-- START FONT FAMILY GROUP POST TITLE -->
       <div class="col-sm-4">
        <span class='label-title'>
         <?php echo esc_html__('Font Family','trusty-woo-products-filter');?>
        </span>
        <?php 
        $fonts=apply_filters('twf_font_family',array($twf_admin_fliters,'twf_font_family'));
        ?>
        <select class="form-control twf_import" id="twf-filter-tax-label-font" name="twf-filter-tax-label-font" data-import="twf_filter_tax_label_font">
         <option value="inherit">Default</option>
         <?php
         if ( $fonts ) {
          foreach ( $fonts as $key => $font ) {
           $font_sel = '';
          // echo $twf_filter_tax_label_font;
           
           if($twf_filter_tax_label_font==$key){$font_sel="selected";} else {$font_sel='';}
           ?>
      <option <?php echo esc_attr($font_sel);?> value="<?php echo esc_attr($key);?>" data-val="<?php echo esc_attr($font['character_set']);?>" datat-type="<?php echo esc_attr($font['type']);?>">
          <?php echo esc_html($key);?>
         </option>
         <?php 
      } 
		}
         ?>
        </select>




       </div>
       <!-- END FONT FAMILY GROUP POST TITLE -->

       <!-- START TEXT TRANSFORM GROUP POST TITLE-->
       <div class="col-sm-4">
        <span class='label-title'>
         <?php echo esc_html__('Text Transform','trusty-woo-products-filter'); ?>
        </span>
        <select class="form-control twf_import" data-import="twf_filter_tax_label_trans" id="twf-filter-tax-label-trans" name="twf-filter-tax-label-trans">
         <option value="uppercase" <?php if($twf_filter_tax_label_trans=='inherit'){echo esc_attr("selected");} ?>><?php echo esc_html__('Inherit','trusty-woo-products-filter');?></option>
<option value="uppercase" <?php if($twf_filter_tax_label_trans=='uppercase'){echo esc_attr("selected");} ?>><?php echo esc_html__('Uppercase','trusty-woo-products-filter');?></option>
	<option value="capitalize" <?php if($twf_filter_tax_label_trans=='capitalize'){echo esc_attr("selected");} ?>><?php echo esc_html__('Capitalize','trusty-woo-products-filter');?></option>
	<option value="lowercase" <?php if($twf_filter_tax_label_trans=='lowercase'){echo esc_attr("selected");} ?>><?php echo esc_html__('Lowercase','trusty-woo-products-filter');?></option>
    </select>

       </div>
       <!-- END TEXT TRANSFORM GROUP POST TITLE-->
       <!-- START FONT SIZE GROUP POST TITLE-->
       <div class="col-sm-4">
        <span class='label-title'>
         <?php echo esc_html__('Font Size','trusty-woo-products-filter');?>
        </span>
        <div class="input-group">
         <input type="number" class="form-control caf_import form_group_input" data-import="twf_filter_tax_label_size" placeholder="12" aria-label="font-size" aria-describedby="basic-addon2" name="twf-filter-tax-label-size" value="<?php echo esc_attr($twf_filter_tax_label_size); ?>">
         <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">
           <?php echo esc_html__('px','trusty-woo-products-filter'); ?>
          </span>
         </div>
        </div>
       </div>
       <!---- END FONT SIZE GROUP POST TITLE ---->
      </div>
      <!-- END FIRST ROW OF POST TITLE SIDEBAR -->

     </div>
     <!---- END SIDEBAR OF BAR AREA POST TITLE ---->
    </div>
    <!---- END ROW FORM GROUP OF FILTER TAX LABEL ---->
    
    <!---- START ROW FORM GROUP OF FILTER TERMS LABEL ---->
    <div class="form-group row-bottom">
     <label for="twf-filter-tax-label-font" class="col-sm-12 col-form-label">
      <?php echo esc_html__('Filter Terms/Categories Labels','trusty-woo-products-filter');?> <br/>
      <span>
       <?php echo esc_html__('Select font styling for Category Labels.','trusty-woo-products-filter');?>
      </span>
     </label>
     <!-- START SIDEBAR OF BAR AREA POST TITLE-->
     <div class="col-sm-12">
      <!-- START FIRST ROW OF POST TITLE SIDEBAR -->
      <div class="row">
       <!-- START FONT FAMILY GROUP POST TITLE -->
       <div class="col-sm-4">
        <span class='label-title'>
         <?php echo esc_html__('Font Family','trusty-woo-products-filter');?>
        </span>
        <?php 
        $fonts=apply_filters('twf_font_family',array($twf_admin_fliters,'twf_font_family'));
        ?>
        <select class="form-control twf_import" id="twf-filter-cat-label-font" name="twf-filter-cat-label-font" data-import="twf_filter_cat_label_font">
         <option value="inherit">Default</option>
         <?php
         if ( $fonts ) {
          foreach ( $fonts as $key => $font ) {
           $font_sel = '';
           if($twf_filter_cat_label_font==$key){$font_sel="selected";} else {$font_sel='';}
           ?>
         <option <?php echo esc_attr($font_sel);?> value="<?php echo esc_attr($key);?>" data-val="<?php echo esc_attr($font['character_set']);?>" datat-type="<?php echo esc_attr($font['type']);?>">
          <?php echo esc_html($key);?>
         </option>
         <?php 
      } 
		}
         ?>
        </select>
       </div>
       <!-- END FONT FAMILY GROUP POST TITLE -->

       <!-- START TEXT TRANSFORM GROUP POST TITLE-->
       <div class="col-sm-4">
        <span class='label-title'>
         <?php echo esc_html__('Text Transform','trusty-woo-products-filter'); ?>
        </span>
        <select class="form-control twf_import" data-import="twf_filter_cat_label_trans" id="twf-filter-cat-label-trans" name="twf-filter-cat-label-trans">
         <option value="inherit" <?php if($twf_filter_cat_label_trans=='inherit'){echo esc_attr("selected");} ?>><?php echo esc_html__('Inherit','trusty-woo-products-filter');?></option>
<option value="uppercase" <?php if($twf_filter_cat_label_trans=='uppercase'){echo esc_attr("selected");} ?>><?php echo esc_html__('Uppercase','trusty-woo-products-filter');?></option>
	<option value="capitalize" <?php if($twf_filter_cat_label_trans=='capitalize'){echo esc_attr("selected");} ?>><?php echo esc_html__('Capitalize','trusty-woo-products-filter');?></option>
	<option value="lowercase" <?php if($twf_filter_cat_label_trans=='lowercase'){echo esc_attr("selected");} ?>><?php echo esc_html__('Lowercase','trusty-woo-products-filter');?></option>
    </select>

       </div>
       <!-- END TEXT TRANSFORM GROUP POST TITLE-->
       <!-- START FONT SIZE GROUP POST TITLE-->
       <div class="col-sm-4">
        <span class='label-title'>
         <?php echo esc_html__('Font Size','trusty-woo-products-filter');?>
        </span>
        <div class="input-group">
         <input type="number" class="form-control caf_import form_group_input" data-import="twf_filter_cat_label_size" placeholder="12" aria-label="font-size" aria-describedby="basic-addon2" name="twf-filter-cat-label-size" value="<?php echo esc_attr($twf_filter_cat_label_size); ?>">
         <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">
           <?php echo esc_html__('px','trusty-woo-products-filter'); ?>
          </span>
         </div>
        </div>
       </div>
       <!---- END FONT SIZE GROUP POST TITLE ---->
      </div>
      <!-- END FIRST ROW OF POST TITLE SIDEBAR -->

     </div>
     <!---- END SIDEBAR OF BAR AREA POST TITLE ---->
    </div>
    <!---- END ROW FORM GROUP OF FILTER TERMS LABEL ---->
   </div>

  </div>

 </div>

</div>
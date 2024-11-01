<div class="tab-pane" id="appearance" role="tabpanel" aria-labelledby="appearance-tab">
	<div class="manage-top-dash appearance-tab text"> <?php echo esc_html__('Appearance','trusty-woo-products-filter'); ?></div>
	<div id="tabs-panel">
    <!---- START SECTION BACKGROUND TOGGLE ---->		
	<div class="tab-panel custom-meta">
	<div class="tab-header" data-content="section-background"><i class="fa fa-sign-in left" aria-hidden="true"></i> <?php echo esc_html__('Section Background','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
	<div class="tab-content section-background">
	<!---- START ENABLE/DISABLE FILTER FORM GROUP ROW ---->
	<div class='col-sm-12 section-background row-bottom'>
	<!---- FORM GROUP META FIELD ---->
	<div class="form-group row">
   <label for="twf-sec-bg-color" class='col-sm-12 bold-span-title'><?php echo esc_html__('Background Color','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select background color for main section.','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-12">
    <input id="twf-sec-bg-color" type="text" value="<?php echo esc_attr($twf_sec_bg_color); ?>" class="my-color-field twf_import" data-import='twf_section_bg_color' name='twf-sec-bg-color' data-default-color="#ffffff00" />
	</div>
	</div>
    <!---- FORM GROUP ---->
    </div>
	<!---- END ENABLE/DISABLE FILTER FORM GROUP ROW ---->
  <?php do_action("twf_after_section_bg_row"); ?>
	</div>
	</div>
	<!---- END SECTION BACKGROUND TOGGLE ---->
		<?php do_action("twf_after_section_bg_tab"); ?>
	
	<!---- START PAGINATION TOGGLE ---->
 <div class="tab-panel post-pagination">
	<div class="tab-header" data-content="post-pagination"><i class="fa fa-sort-numeric-asc left" aria-hidden="true"></i><?php echo esc_html__('Pagination','trusty-woo-products-filter');?><i class="fa fa-angle-down" aria-hidden="true"></i></div>
	<div class="tab-content post-pagination">
	<div class='app-tab-content' id="app-extra">
  	<!-- START POSTS PER PAGE TYPE ---->
  <div class="col-sm-12 pad-top-15 row-bottom">
	<div class="form-group row">
    <label for="twf-per-page-type" class='col-sm-12 bold-span-title'><?php echo esc_html__('Posts Per Page Type','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select Posts Per Page according your needs.use -1 for all posts.','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-12">
    <select class="form-control twf_import" data-import="twf_per_page_type" id="twf-per-page-type" name="twf-per-page-type">
     
     <option value="default" <?php if($twf_per_page_type=='default') {echo esc_attr("selected");}?>>Woo Default</option>
     <option value="custom" <?php if($twf_per_page_type=='custom') {echo esc_attr("selected");}?>>Custom</option>
     </select>
	</div>
	</div>
	</div>
  <!-- END POSTS PER PAGE TYPE ---->
  
	<!-- START POSTS PER PAGE GROUP ---->
  <?php
  
  ?>
	<div id='twf-row-per-page' class="col-sm-12 pad-top-15 row-bottom <?php echo esc_attr($pp_class); ?>">
	<div class="form-group row">
    <label for="twf-per-page" class='col-sm-12 bold-span-title'><?php echo esc_html__('Posts Per Page','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select Posts Per Page according your needs.use -1 for all posts.','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-8">
    <input type='text' class="form-control twf_import" data-import="twf_per_page" id="twf-per-page" name="twf-per-page" value='<?php echo esc_attr($twf_per_page); ?>'>
	</div>
	</div>
	</div>
 <!---- END POSTS PER PAGE GROUP ---->
  <?php do_action("twf_after_per_page_row"); ?>

  <div class='manage-page-type' id="manage-page-type">
 <!-- START PAGINATION TYPE PAGE GROUP ---->
	<div class="col-sm-12 p-type row-bottom">
	<div class="form-group row">
    <label for="twf-pagination-type" class='col-sm-12 bold-span-title'><?php echo esc_html__('Pagination Type','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Select what type of pagination you want on frontend.','trusty-woo-products-filter');?></span></label>
  <?php
  //$ptypes=apply_filters('twf_pagi_type',array($twf_admin_fliters,'twf_pagi_type'));
  $ptypes=array("default"=>"Default");
  ?>
  
    <div class="col-sm-12">
    <select class="form-control twf_import" id="twf-pagination-type" name="twf-pagination-type" data-import='twf_pagination_type'>
     <?php
		foreach ($ptypes as $key=>$ptype) {
			if($twf_pagi_type==$key) { $selected='selected';} else {$selected='';}
			echo '<option value="'.esc_attr($key).'" '.$selected.'>'.esc_html($ptype).'</option>';
		}
?>
 </select>
	</div>
	</div>
	</div>
 <!---- END PAGINATION TYPE GROUP ---->
  <?php do_action("twf_after_pagi_type_row"); ?>
    </div>	
</div>
    </div>
	</div>
    <!---- END PAGINATION TOGGLE ---->
<?php do_action("twf_after_post_pagi_tab"); ?>
    <!---- START POST ANIMATION TOGGLE ---->
	<div class="tab-panel post-animation">
	<div class="tab-header" data-content="post-animation"><i class="fa fa-life-ring left" aria-hidden="true"></i> <?php echo esc_html__('Post Animation','trusty-woo-products-filter');?><i class="fa fa-angle-down" aria-hidden="true"></i></div>

	<div class="tab-content post-animation">
 <!-- START POST ANIMATION TYPE GROUP ---->
	<div class="col-sm-12 row-bottom">			
	<div class="form-group row">
    <label for="twf-post-animation" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Post Animation','trusty-woo-products-filter');?><span class='info'><?php echo esc_html('Set Animation for posts.','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-12">
     <?php 
  $animations=apply_filters('twf_post_animations',array($twf_admin_fliters,'twf_post_animations'));
	?>
    <select class="form-control twf_import" data-import="twf_post_animation" id="twf-post-animation" name="twf-post-animation">
     <?php
     foreach ($animations as $key=>$animation) {
			if($twf_post_animation==$key) { $selected='selected';} else {$selected='';}
      if($key==$animation) {
       echo esc_html("<optgroup label='".esc_attr($animation)."'>");
      }
      else if($key=="optionend") {
       echo esc_html("</optgroup>");
      }
      else {
			echo '<option value="'.esc_attr($key).'" '.$selected.'>'.esc_html($animation).'</option>';
      }
		}
     ?>
    </select>
	</div>
	</div>
	</div>
  <!-- END POST ANIMATION TYPE GROUP ---->
  <?php do_action("twf_after_post_animation_row"); ?>
	</div>
	</div>
	<!---- END POST ANIMATION TOGGLE ---->
  <?php do_action("twf_after_post_animation_tab"); ?>
</div>		 
</div>
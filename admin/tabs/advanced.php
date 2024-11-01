<div class="tab-pane tab-pad" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">

	<div class="manage-top-dash general-tab text"><?php echo esc_html__('Advanced','trusty-woo-products-filter');?></div>

<div id="tabs-panel">
    <div class="tab-panel twf-scrolling">
    <div class="tab-header" data-content="twf-scrolling"><i class="fa fa-plus-circle left" aria-hidden="true"></i> <?php echo esc_html__('Scroll Settings','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
    <div class="tab-content twf-scrolling">
	    <!---- START ROW SCROLL TO DIV ----> 
        <div class='col-sm-12 row-bottom'>
            <!-- FORM GROUP -->
            <div class="form-group row">
                <label for="twf_scroll_top" class="col-sm-12 col-form-label"><?php echo esc_html__('Scroll To Main Div','trusty-woo-products-filter'); ?> <span class="info"><?php echo esc_html__('Enable/Disable Scroll while filtering products.','trusty-woo-products-filter');?></span></label>
                <div class="col-sm-12">
                    <select name="twf_scroll_top" class="twf_inner_select" id="twf_scroll_top">
                    <option value='disable' <?php if($twf_scroll_top=="disable") {echo "selected";} ?>><?php echo esc_html__('Disable','trusty-woo-products-filter');?></option>
                    <option value='mobile' <?php if($twf_scroll_top=="mobile") {echo "selected";} ?>><?php echo esc_html__('Mobile','trusty-woo-products-filter');?></option>
                    <option value='desktop' <?php if($twf_scroll_top=="desktop") {echo "selected";} ?>><?php echo esc_html__('Desktop','trusty-woo-products-filter');?></option>
                    <option value='mobile-desktop' <?php if($twf_scroll_top=="mobile-desktop") {echo "selected";} ?>><?php echo esc_html__('Mobile & Desktop','trusty-woo-products-filter');?></option>
                    </select>
                </div>
            </div>
            <!-- FORM GROUP -->
        </div>
        <!---- END ROW SCROLL TO DIV ---->
    <?php
        $clm='';
        $clt='';
        $cld='';
        if($twf_scroll_top=="mobile"){
        $clm='twf_active';
        }
        if($twf_scroll_top=="desktop" || $twf_scroll_top=="mobile-desktop"){
        $cld='twf_active';
        }
        ?>
    <!---- START ROW SCROLL POSITION FOR DESKTOP ----> 
        <div class='col-sm-12 row-bottom scroll_desktop'>
            <!-- FORM GROUP -->
            <div class="form-group row">
                <label for="twf_scroll_position_desktop" class="col-sm-12 col-form-label"><?php echo esc_html__('Set Scroll Position to Products (Desktop)','trusty-woo-products-filter'); ?> <span class="info"><?php echo esc_html__('This Will set the scroll position for Desktop.','trusty-woo-products-filter');?></span></label>
                <div class="col-sm-12">
                    <input type="text" name="twf_scroll_position_desktop" class="twf_input_setting" id="twf_scroll_position_desktop" value='<?php echo esc_attr($twf_scroll_desktop); ?>'>
                </div>
            </div>
            <!-- FORM GROUP -->
        </div>
        <!---- END ROW SCROLL POSITION FOR DESKTOP ---->
    
    <!---- START ROW SCROLL POSITION FOR MOBILE ----> 
        <div class='col-sm-12 row-bottom scroll_mobile'>
            <!-- FORM GROUP -->
            <div class="form-group row">
                <label for="twf_scroll_position_mobile" class="col-sm-12 col-form-label"><?php echo esc_html__('Set Scroll Position to Products (Mobile)','trusty-woo-products-filter'); ?> <span class="info"><?php echo esc_html__('This Will set the scroll position for mobile devices.','trusty-woo-products-filter');?></span></label>
                <div class="col-sm-12">
                <input type="text" name="twf_scroll_position_mobile" class="twf_input_setting" id="twf_scroll_position_mobile" value='<?php echo esc_attr($twf_scroll_mobile); ?>'>
                </div>
            </div>
        <!-- FORM GROUP -->
        </div>
        <!---- END ROW SCROLL POSITION FOR MOBILE ---->

</div>

</div>

   <!-- <div class="tab-panel twf-page-setting">
    <div class="tab-header" data-content="twf-page-setting"><i class="fa fa-plus-circle left" aria-hidden="true"></i> <?php echo esc_html__('Woo Page Settings','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
    <div class="tab-content twf-page-setting">
        <div class='col-sm-12  row-bottom'>
           
            <div class="form-group row">
                <label for="twf_page_url" class='col-sm-12 bold-span-title'><?php echo esc_html__('Select Shop Page','trusty-woo-products-filter');?><span class='info'><?php echo esc_html__('Add Page URL.','trusty-woo-products-filter');?></span></label>
                <div class="col-sm-12">
                <select name="twf_page_url" id="twf_page_url" class="twf_inner_select">
                    <option >--Select--</option>
                    <?php
            //         $argss = array(
            //         'post_type' => 'page',
            //         'post_status' => 'publish',
            //         'numberposts'=>'-1'  
            //             );
            //         $qposts = get_posts($argss);
            //         if ($qposts) {
            //         foreach($qposts as $post1) {
            //         echo "<option value=$post1->ID>";
            //         echo  $post1->post_name;
            //         echo "</option>";
            //         }
            //     }
            //    wp_reset_query();
                ?>

                </select>
	            </div>
	        </div>
          
        </div>  
    </div>
</div>
            -->


</div>
</div>


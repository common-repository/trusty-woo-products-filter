<div class="tab-pane tab-pad" id="shortcode" role="tabpanel" aria-labelledby="shortcode-tab">
	<div class="manage-top-dash shortcode-tab text"><?php echo esc_html__('Shortcode','trusty-woo-products-filter');?></div>
	<div id="tabs-panel">
	<div class="tab-panel shortcode twf_shortcode">
		<div class="tab-header active" data-content="shortcode"><i class="fa fa-check-square-o left" aria-hidden="true"></i> <?php echo esc_html__('Shortcode Options','trusty-woo-products-filter');?> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
		<div class="tab-content shortcode active">
	<div class='col-sm-12'>
<?php global $post;
//  var_dump($post);
$pid=$post->ID;$sh_code="&lt;?php echo do_shortcode('[trusty_woo_filter id='$pid']'); ?&gt;"; ?>
	<!-- FORM GROUP -->
	<div class="form-group row">
    <label for="twf_shortcode" class="col-sm-12 col-form-label"><?php echo esc_html__('Shortcode For Page/Post','trusty-woo-products-filter');?><span class="info"><?php echo esc_html__('Directly paste this shortcode in your page builder/classic editor','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-12">
    <input type="text" readonly="" value="[trusty_woo_filter id='<?php echo esc_attr($pid); ?>']" onfocus="this.select()" class="rd-shortcode" id="twf_shortcode">
	</div>
	</div>
    <!-- FORM GROUP -->
    </div>

	<div class='col-sm-12'>
	<!-- FORM GROUP -->
	<div class="form-group row">
    <label for="twf_shortcode_custom" class="col-sm-12 col-form-label"><?php echo esc_html__('Shortcode For Page Template','trusty-woo-products-filter');?><span class="info"><?php echo esc_html('Directly paste this shortcode in your page template','trusty-woo-products-filter');?></span></label>
    <div class="col-sm-12">
   <?php global $post;
     $pid=$post->ID;
	  
     $sh_code="&lt;?php echo do_shortcode('[trusty_woo_filter id=&quot;".$pid."&quot;]'); ?&gt;"; ?>
	<input type="text" readonly value="<?php echo esc_attr($sh_code); ?>" onfocus="this.select()" class="rd-shortcode" id="twf_shortcode_custom">	
	</div>
	</div>
    <!-- FORM GROUP -->
    </div>		
	</div>
	</div>
	</div>

	</div>
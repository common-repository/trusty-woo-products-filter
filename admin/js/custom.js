function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


jQuery(function($){
 if(getCookie("hashcaf")!='') {
  url=getCookie("hashcaf");
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  var get_text=$.trim($(".tab-content "+url+" .manage-top-dash.text").text());
  $(".manage-top-dash.general-tab.new-tab span.text").text(get_text);
  //console.log(get_text);
} 
 
 if(getCookie("hashcafsub")!='') {
  url=getCookie("hashcafsub");
  //console.log(url);
    var ht=$(".tab-header[data-content='"+url+"']").toggleClass('active');
  var dataDiv=".tab-content."+url;
 var hdrdiv=".tab-header[data-content='"+url+"']";
$(dataDiv).addClass('active');	
$(hdrdiv).find("i.fa-angle-down").removeClass("rotate2").addClass('rotate');
} 
 if(getCookie("hashfiltercookie")!='') {
  url=getCookie("hashfiltercookie");
  //console.log(url);
    $("#twf-filter-types .list-group-item[data-name='"+url+"']").toggleClass('twf_active_list');
    $("#twf-filter-types .list-group-item[data-name='"+url+"'] .twf_filter_results").removeClass('twf_hidden');
   } 
 $("#myTab a").click(function(){
  var hashurl=$(this).attr('href');
  setCookie("hashcaf",hashurl,30);
  var get_text=$.trim($(".tab-content "+hashurl+" .manage-top-dash.text").text());
  $(".manage-top-dash.general-tab.new-tab span.text").text(get_text);
})
//console.log("I am working!!");


	/*---- START Function To LOAD Wp COLOR ----*/
	$('.my-color-field').wpColorPicker();
	/*---- END Function To LOAD Wp COLOR ----*/
	var total_check=jQuery("#caf_top_meta_box .category-lists .category-list.check").length;
var checked_check=jQuery("#caf_top_meta_box .category-lists .category-list.check:checked").length;
	if(total_check==checked_check) {
		jQuery("#caf_top_meta_box .category-lists .category-list-all").attr("checked","checked");}
});


jQuery(function($){
var div="#tabs-panel .tab-panel .tab-header";
var divs="#tabs-panel .tab-panel .tab-content";	
$(div).click(function(){
 //console.log(div);
 var hashcafsub=$(this).attr("data-content");
 setCookie("hashcafsub",hashcafsub,30);
$(this).toggleClass('active');	
var dataDiv="."+$(this).attr("data-content");
//console.log(dataDiv);
if($(dataDiv).hasClass('active')) {
//console.log('exist');
$(dataDiv).removeClass('active');
$(this).find("i.fa-angle-down").removeClass('rotate').addClass('rotate2');
}
else{
//console.log('not');
$(dataDiv).addClass('active');	
$(this).find("i.fa-angle-down").removeClass("rotate2").addClass('rotate');
}	
});	
});



/* START FUNCTION FOR WOO FILTER */

jQuery(function($){
 $("#twf-filter-types").sortable();
 init_list_cats();
 $('#publish').one('click', function( e ) {
  e.preventDefault();
  $("#filter-manage").val('');
  $("#twf-filter-types .list-group-item").each(function(){
   var type=$(this).attr("data-name");
   var id=$(this).attr("data-id");
   var val=$("#filter-manage").val();
   var val1=$("#filter-manage-id").val();
   $("#filter-manage").val(val+","+id+"=>"+type);
   $("#filter-manage-id").val(val1+","+id);
  });
 var val=$("#filter-manage").val();
  var val=val.substr(1);
  $("#filter-manage").val(val);
  var val1=$("#filter-manage-id").val();
  var val1=val1.substr(1);
  $("#filter-manage-id").val(val1);
  $('#publish').trigger( "click" );
 });
  
  
 $("#twf-add").click(function(e) {
  e.preventDefault();
  var type=$("#twf-filter-type").val();
  var typen=$("#twf-filter-type option:selected").attr('data-name');
  //console.log(type,typen);

  if($("#result-filter-types #twf-filter-types .list-group-item[data-name='"+type+"']").length>0) {
   //return false
   if(type!='twf_Attributes') {
    return false;
   }
   var id=parseInt($("#result-filter-types #twf-filter-types .list-group-item:last-child").attr('data-id'));
   var id=id+1;
  }
  else {
   var id=1;
  }
  
 // console.log(id);
  $.ajax({
            url : twf_ajax.ajax_url,
            type : 'post',
	           dataType : "html",
            data : {action: "twf_get_filter_data",nonce_ajax : twf_ajax.nonce,id:id,type:type},
            success : function( response ) {
             //console.log(response);
             if(response) {
             $("#result-filter-types #twf-filter-types").append(response);
              init_list_cats();
              if(type=='twf_Attributes') {
              trigger_attribute();
             }
             }
            }
  });
 
});
 
 //$(".twf_Attribute_type").change(function(){
  $("#twf-filter-types").on("change", ".twf_Attribute_type,.twf_Attribute_name", function (e) {
  var at_type=$(this).closest("#twf_Attributes-options").find(".twf_Attribute_type").val();
  var at_name=$(this).closest("#twf_Attributes-options").find(".twf_Attribute_name").val();
  var data_id=$(this).closest(".list-group-item").attr("data-id");
  var data_post_id=$(this).closest(".list-group-item").attr("data-post-id");
  if(at_type=="color") { 
  //console.log(at_name);
   $(this).closest("#twf_Attributes-options").find(".dynamic_selection").removeClass('twf_hide');
   get_filter_dynamic(at_type,at_name,$(this),data_id);
  }
  else {
   $(this).closest("#twf_Attributes-options").find(".dynamic_selection").html('');
   get_filter_dynamic(at_type,at_name,$(this),data_id);
  }
 });
 trigger_attribute();
 function trigger_attribute() {
  //console.log("hm");
 $(".twf_Attribute_type").each(function(){
  //console.log("hmo");
  var at_type=$(this).val();
  var at_name=$(this).closest("#twf_Attributes-options").find(".twf_Attribute_name").val();
  var data_id=$(this).closest(".list-group-item").attr("data-id");
  var data_post_id=$(this).closest(".list-group-item").attr("data-post-id");
  if(at_type=="color") { 
  //console.log(at_name);
    $(this).closest("#twf_Attributes-options").find(".dynamic_selection").removeClass('twf_hide');
   get_filter_dynamic(at_type,at_name,$(this),data_id,data_post_id);
  }
  else {
    //$(this).closest("#twf_Attributes-options").find(".dynamic_selection").addClass('twf_hide');
   get_filter_dynamic(at_type,at_name,$(this),data_id,data_post_id);
  }
 });
 }
 
 
 $("#result-filter-types").on("click", ".list-group-item i.fa-chevron-down", function (e) {
  $(this).closest(".list-group-item i.fa-chevron-down").toggleClass('fa-chevron-up');
  $(this).closest(".list-group-item").toggleClass('twf_active_list');
  var hashcook=$(this).closest(".list-group-item").attr("data-name");
  setCookie("hashfiltercookie",hashcook,30);
  //console.log("hmm");
  var dataname=$(this).closest(".list-group-item").attr("data-name");
  var div="#"+dataname+"-options";
  //console.log(div);
 $(this).closest(".list-group-item").find(div).slideToggle();
 });
 
 
 $("#result-filter-types").on("click", ".list-group-item i.fa-times", function (e) {
  $(this).closest(".list-group-item").remove();
 });
 
 
 
 /* TESTING SCRIPT FOR WP CATEGORY LIST */
 function init_list_cats() {
 jQuery(".twf_checkbox-inner li").each(function(){
  var id_int=$(this).closest(".list-group-item").attr('data-id');
  var div=$(this).find("a").eq(0);
  var class_str=$(this).attr('class');
  var id = class_str.substr(18,class_str.length);
  // console.log(class_str,id);
  if($("#twf_Product_cats_arr_"+id_int).length>0) {
   var cats=$("#twf_Product_cats_arr_"+id_int).val().split(',');
   //console.log(cats);
  }
  else {
   var cats=[];
  }
  if($("#twf_Product_tags_arr_"+id_int).length>0) {
   var tags=$("#twf_Product_tags_arr_"+id_int).val().split(',');
   //console.log(tags);
  }
  else {
   var tags=[];
  }
  if($(this).closest(".list-group-item").attr("data-name")=='twf_Product_cat') {
   if($(this).find(".twf_checkbox").length==0)
    {
  if(cats.includes(id)) {
   var check='checked';
  }
  else {
   var check='';
  }
  $("<input class='twf_checkbox' type='checkbox' name='twf_Product_cat_"+id_int+"[]' value='"+id+"' id='twf_Product_cat_"+id+"' "+check+">").insertBefore(div);
     if(jQuery(this).find('ul.children').length>0) {
   jQuery(this).addClass('twf-has-child');
   if($(this).hasClass('twf-has-child')) {
  $('<i class="fa fa-plus" aria-hidden="true"></i>').insertAfter(div);
  }
  }
  }
  }
  else if($(this).closest(".list-group-item").attr("data-name")=='twf_Product_tag') {
   if($(this).find(".twf_checkbox").length==0)
    {
   if(tags.includes(id)) {
   var check='checked';
  }
  else {
   var check='';
  }
   $("<input class='twf_checkbox' type='checkbox' name='twf_Product_tag_"+id_int+"[]' value='"+id+"' id='twf_Product_tag_"+id+"' "+check+">").insertBefore(div);
   if(jQuery(this).find('ul.children').length>0) {
   jQuery(this).addClass('twf-has-child');
   if($(this).hasClass('twf-has-child')) {
  $('<i class="fa fa-plus" aria-hidden="true"></i>').insertAfter(div);
  }
  }
  }
  }
  
 });
  
  jQuery("li.twf-has-child i").click(function(){
  // console.log("ok");
    $(this).toggleClass('fa-minus');
   $(this).closest('li').find("ul").eq(0).toggleClass('twf_active_list');
   //console.log(class_s);
   });
  jQuery(".twf_checkbox-inner li a").click(function(e){
    e.preventDefault();
   });
  
 }
 
 $("#twf_scroll_top").change(function(){
  twf_scroll($(this));
 });
 twf_scroll("#twf_scroll_top");
 
});

function twf_scroll(div) {
jQuery(function($) {
if($(div).val()=="disable") {
   $(".scroll_desktop,.scroll_mobile").addClass('twf_hide');
  }
  else if($(div).val()=="mobile") {
   $(".scroll_mobile").removeClass('twf_hide');
   $(".scroll_desktop").addClass('twf_hide');
  }
  else if($(div).val()=="desktop") {
   $(".scroll_mobile").addClass('twf_hide');
   $(".scroll_desktop").removeClass('twf_hide');
  }
  else {
   $(".scroll_mobile").removeClass('twf_hide');
   $(".scroll_desktop").removeClass('twf_hide');
  }
});
}

jQuery(function($){
  twf_toggle_me("#twf_cat_hierarchical","#twf_show_count","no","twf_hide");
 twf_toggle_me("#twf_tag_hierarchical","#twf_tag_show_count","no","twf_hide");
 twf_toggle_me("#twf-filter-use",".tab-panel.product-layout","only-filter","twf_hide");
 twf_toggle_me("#twf-filter-use",".nav-link.assign","only-filter","disabled");
 twf_toggle_me("#twf_Price_skin",".twf_inner_row.skin1","skin2","twf_hide");
 twf_toggle_me("#twf-per-page-type","#twf-row-per-page","default","twf_hide");
 if($("#twf-filter-use").val()=='filter-with-products') {
  $(".nav-link.assign").removeClass('disabled');
 }
})
function twf_toggle_me(id_click,id_toggle,compare_val,remove_me) {
 jQuery(id_click).change(function(){
 //console.log('me2',compare_val);
  if(jQuery(this).val()==compare_val) {
  jQuery(id_toggle).addClass(remove_me);
  }
  else {
   jQuery(id_toggle).removeClass(remove_me);
  }
 })
}

function get_filter_dynamic(at_type,at_name,div,data_id,data_post_id) {
// console.log(div);
 jQuery(function($){
 $.ajax({
            url : twf_ajax.ajax_url,
            type : 'post',
	           dataType : "html",
            data : {action: "twf_get_filter_dynamic",nonce_ajax : twf_ajax.nonce,type:at_type,name:at_name,data_id:data_id,data_post_id:data_post_id},
            success : function( response ) {
            // console.log(response);
             if(response) {
              $(div).closest("#twf_Attributes-options").find(".dynamic_selection").html(response);
              $('.my-color-field').wpColorPicker()
             
             }
            }
  });
  });
 
}

/* END FUNCTION FOR WOO FILTER */





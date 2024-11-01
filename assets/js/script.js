function GetParameterValues(param) {  
            var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
            for (var i = 0; i < url.length; i++) {  
                var urlparam = url[i].split('=');  
                if (urlparam[0] == param) {  
                    return urlparam[1];  
                }  
            }  
        } 
function manageUrl(filter) {
// console.log(filter);
 var arr={};
 var arr1=[];var arr2=[];var arr3=[];var arr4=[];var arr5=[];var obj = {};

 jQuery(".twf_checkbox_front:checked").each(function(i){
  //console.log(i);
 var val=jQuery(this).val();
  var dataname=jQuery(this).attr("data-name");
  if(dataname=='twf_Product_cat') {
   arr1.push(val);
   arr['twf_Product_cat']=arr1;
  }
  if(dataname=='twf_Product_tag') {
   arr2.push(val);
   arr['twf_Product_tag']=arr2;
  }
  if(dataname=='twf_Price') {
   arr3.push(val);
   arr['twf_Price']=arr3;
  }
  if(dataname=='twf_Sale') {
   arr4.push(val);
   arr['twf_Sale']=arr4;
  }
  if(dataname=='twf_Attribute') {
   var tax=jQuery(this).attr('data-tax-name');
   
   if(obj[tax]) {
    var lnt=obj[tax].length;
   }
   else {
    var lnt=0;
   }
    var len=1+lnt;
   // console.log(len);
   if(len==1) {
    arr5=[];
   }
   arr5.push(val);
   obj[tax]=arr5;
   
  //console.log(obj);
   arr['twf_Attribute']=obj;
  }
 // arr.push(val);
 });
 if(jQuery("#twf-price-slider-range").length>0) {
  var price_start=jQuery("#twf-price-slider-range").slider("values",0);
  var price_last=jQuery("#twf-price-slider-range").slider("values",1);
  //console.log(price_start,price_last);
  arr3.push(price_start+"-"+price_last);
  arr['twf_Price']=arr3;
 }
 
 if(arr['twf_Attribute']) {
 var d=arr['twf_Attribute'];
 var keys=Object.keys(d);
 var arr19=[];
 var jn=[];
 for(var i=0;i<keys.length;i++) {
 //console.log(keys[i]);
  var f=d[keys[i]];
  var ft=f.join("-");
  jn.push(keys[i]+"["+ft+"]");
 }
 arr['twf_Attribute']=jn.join(",");
 }
  return arr; 
}
function objectLength(obj) {
  var result = 0;
  for(var prop in obj) {
    if (obj.hasOwnProperty(prop)) {
    // or Object.prototype.hasOwnProperty.call(obj, prop)
      result++;
    }
  }
  return result;
}


jQuery(function($){
 if($("#twf-price-slider-range").length>0) {
 var price_start=parseInt($("#twf_price_start").val());
 var price_last=parseInt($("#twf_price_last").val());
  var price_cur=$("#twf_price_currency").val();
  var price_cur_sym=$("#twf_price_currency").attr('data-name');
  if(price_cur=="yes") {
   var price_cur=price_cur_sym;
  }
  else {
   var price_cur="";
  }
  $("#twf-price-slider-range").slider({
      range: true,
      min: price_start,
      max: price_last,
      values: [price_start,price_last],
      slide: function(event,ui) {
        $(".twf_Price_slider-text span").text(price_cur+ui.values[0]+"-"+price_cur+ui.values[ 1 ]);
      }
    });
  
    $(".twf_Price_slider-text span").text(price_cur+$("#twf-price-slider-range").slider("values",0) +"-"+price_cur+$("#twf-price-slider-range").slider("values",1));
  $("#twf-price-slider-range").on("slidestop",function(event,ui) {
   twf_Products_load(1);
   });
 }
 
 
 $(".twf_price_skin").on("change", "ul.price_skin li", function (e) {
    $(".twf_price_skin ul li").not(this).each(function(){
   if(!$(this).hasClass('twf-disabled')) {
    $(this).find('.twf_Price').attr("disabled","disabled");
    $(this).addClass("twf-disabled");
   }
   else {
   $(this).find('.twf_Price').removeAttr("disabled");
   $(this).removeClass("twf-disabled");
   }
   });
  
 });
 
 $(".twf_sale").on("change", ".sale_skin li", function (e) {
  $(".twf_sale ul li").not(this).each(function(){
   if(!$(this).hasClass('twf-disabled')) {
 $(this).find('.twf_Sale').attr("disabled","disabled");
   $(this).addClass("twf-disabled");
   }
   else {
   $(this).find('.twf_Sale').removeAttr("disabled");
   $(this).removeClass("twf-disabled");
   }
   });
  
 });
 
 
 $(".twf_change").on("change", "ul li", function (e) {
  if($(this).find(".twf_Attribute").length>0) {
   $(this).toggleClass("att_active");
  }
  twf_Products_load(1);
 });
 
 $("form.woocommerce-ordering").submit(function(e){
  e.preventDefault();
  twf_Products_load(1);
 });
 $(".products_sorting_tab ul li").click(function(e){
  e.preventDefault();
  $(".products_sorting_tab ul li").removeClass('active_now');
  $(this).addClass('active_now');
  twf_Products_load(1);
 });
 
 
 $(".woocommerce-pagination").on("click","li a",function(e){
  e.preventDefault();
  var page=$(this).text();
  twf_Products_load(page);
 })
 

 
 $("ul.hierarchical li").each(function(){
  var div=$(this).find("a").eq(0);
  var class_str=$(this).attr('class');
  var id = class_str.substr(18,class_str.length);
  var id_int=$(this).closest(".hierarchical").attr('data-id');
  var htm=div.html();
  if($(this).find('span').length>0) {
  var span=$(this).find('span').html();
  }
  else {
   var span='';
  }
  if(jQuery(this).find('ul.children').length>0) {
   jQuery(this).addClass('twf-has-child');
   if($(this).hasClass('twf-has-child')) {
  var ico='<i class="fa fa-plus" aria-hidden="true"></i>';
  //var ico='<i class="fa fa-solid fa-angle-up" aria-hidden="true"></i>';
  }
  }
  if($(this).closest(".hierarchical").attr("data-name")=='twf_Product_cat') {
   $("<input class='twf_checkbox_front twf_Product_cat' type='checkbox' name='twf_Product_cat[]' value='"+id+"' id='twf_Product_cat_"+id+"' data-name='twf_Product_cat'><label for='twf_Product_cat_"+id+"'>"+htm+"<span class='twf_cnt'>"+span+"</span></label>"+ico).insertBefore(div);
  }
  /* FUNCTION FOR PRODUCT TAGS */
  if($(this).closest(".hierarchical").attr("data-name")=='twf_Product_tag') {
   $("<input class='twf_checkbox_front twf_Product_tag' type='checkbox' name='twf_Product_tag[]' value='"+id+"' id='twf_Product_tag_"+id+"' data-name='twf_Product_tag'><label for='twf_Product_tag_"+id+"'>"+htm+"<span class='twf_cnt'>"+span+"</span></label>"+ico).insertBefore(div);
  } 
 });
 
 jQuery("li.twf-has-child i").click(function(){
    $(this).toggleClass('fa-minus');
    //$(this).toggleClass('fa-angle-up');
 $(this).closest('li').find("ul").eq(0).toggleClass('twf_active_list');
   });
 /* Frontend Filter Tab TOGGLE */
$("h3.twf_toggle_on").click(function(){
 $(this).closest('.twf_change').find("ul").eq(0).slideToggle();
 $(this).closest('.twf_change').find("#twf_price_slider").slideToggle();
//$(this).find("i").toggleClass("fa-plus"); 
$(this).find("i").toggleClass("fa-angle-down"); 

})
 if($("#twf_filter_main.product-filter").length>0) {
  if(GetParameterValues('twf_filter')) {
  }
  else {
   twf_Products_load(1);  
  }
 }
});

function twf_Scroll() {
 var twf_scroll=jQuery("#twf_filter_main").attr("data-twf-scroll");
 if(twf_scroll) {
 var width=jQuery(document).width();
 if(width>600) {
  var actual="desktop";
  if(twf_scroll=="desktop" || twf_scroll=="mobile-desktop") {
   var adjust=jQuery("#twf_filter_main").attr('data-twf-scroll-desk');
   twf_scrollToDiv(parseInt(adjust));
  }
 }
  else {
   var actual='mob';
  if(twf_scroll=="mobile" || twf_scroll=="mobile-desktop") {
  var adjust=jQuery("#twf_filter_main").attr('data-twf-scroll-mobile');
   twf_scrollToDiv(parseInt(adjust));
  }
  }
 }
}

function twf_scrollToDiv(twf_scroll) {
var current=jQuery(".products").offset().top;
var current=current+twf_scroll; 
 jQuery('html, body').animate({
        scrollTop: current
    }, 2000); 
}

function twf_Products_load(page)
 { 
  // console.log("ok");
 jQuery(function($) {
  if($(".products_sorting_tab").length>0) {
   var order_by=$(".products_sorting_tab ul li.active_now").attr('data-name');
  }
  else {
  if($("form.woocommerce-ordering .orderby").val()) {
  var order_by=$("form.woocommerce-ordering .orderby").val();
  }
  else {
   var order_by="menu_order title";
  }
  }
  
  // console.log(order_by);
  var paged=$(".woocommerce-pagination li a").text();
var arr=[];
var arrPrice=[];
var arrCategory=[];
var finalall =[];
  $(".twf_checkbox_front:checked").each(function(){
     var val=$(this).val();
       var dataname=jQuery(this).attr("data-name");
       if(dataname=='twf_Product_cat') {
        arrCategory.push(val);
         arr['twf_Product_cat']=arrCategory;
       }
       if(dataname=='twf_Price') {
         arrPrice.push(val);
         arr['twf_Price']=arrPrice;
       }
     });
  // console.log(arr);   
 var params={
   'price':arr,
  'orderby':order_by
  }
 //console.log(trusty_woo_ajax);
 var filter_id=$("#twf_filter_main").attr("data-filter-id");
  var url=trusty_woo_ajax.shop_page_url;
  if(GetParameterValues('twf_filter')) {
  var href=url;
  }
  else {
   var href=url+"?twf_filter="+filter_id+"&orderby="+order_by+"&paged="+page+"&product-page="+page;
  }
  var data_name=$(this).attr('data-name');
   var url=manageUrl(data_name);
  console.log(url);
  var url_product_cat='';var url_product_tag='';var url_product_price='';var url_product_sale='';
  var url_product_attr='';
  if(url['twf_Product_cat']) {
   var url_product_cat="&twf_Product_cat="+url['twf_Product_cat'];
  }
  if(url['twf_Product_tag']) {
   var url_product_tag="&twf_Product_tag="+url['twf_Product_tag'];
  }
  if(url['twf_Price']) {
   var url_product_price="&twf_Price="+url['twf_Price'];
  }
  if(url['twf_Sale']) {
   var url_product_sale="&twf_Sale="+url['twf_Sale'];
  }
  if(url['twf_Attribute']) {
   var url_product_attr="&twf_Attribute="+url['twf_Attribute'];
  }
  var url_query=url_product_cat+url_product_tag+url_product_price+url_product_sale+url_product_attr;
  var href=href+url_query;
  //console.log(href);
  if($(".products").length>0) {
   $("body").append("<div class='twf_woo_loader'></div>");
   //return false;
   twf_Scroll();
  }
  $.ajax({
		url: href,
		type: 'post',
		dataType: 'html',
		success: function(data, textStatus, XMLHttpRequest) {
  // console.log(data);
   $("body .twf_woo_loader").remove();
   if($(data).find("ul.products").length==0) {
    //console.log("clear");
    var products=$(data).find(".woocommerce-info").html();
    var products="<p class='woocommerce-info'>"+products+"</p>"
   }
   else {
   var products=$(data).find("ul.products").html();
   }
   
   var result_count=$(data).find("p.woocommerce-result-count").html();
   var woo_pagination=$(data).find(".woocommerce-pagination").html();
  //console.log(products);
   if(!woo_pagination) {
   $(".woocommerce-pagination").fadeOut();
   }
   else {
    $(".woocommerce-pagination").fadeIn();
   }
   $("ul.products").html(products);
   $("p.woocommerce-result-count").html(result_count);
   $(".woocommerce-pagination").html(woo_pagination);
		},
		error: function(MLHttpRequest, textStatus, errorThrown) {
		//	$(status).html(textStatus);
		}
		
	}); 
});
}
/*!
 * @project : spage
 * @version : 1.0.0
 * @author  : 
 * @update  : 2018-09-01 8:05:16 pm
 */!function(e){function t(o){if(a[o])return a[o].exports;var i=a[o]={exports:{},id:o,loaded:!1};return e[o].call(i.exports,i,i.exports,t),i.loaded=!0,i.exports}var a={};return t.m=e,t.c=a,t.p="./js/",t(0)}([function(e,t){function a(){!function($){$(".container-full-height").height($(window).height())}(jQuery)}!function($){"use strict";function e(){$(".search-wrap").fadeOut(200),$(".nav-search, #search-close").removeClass("open")}function t(){$(".megamenu").each(function(){$(this).css("width",$(".container").width());var e=$(this).closest(".dropdown").offset();e=e.left;var t=$(window).width()-$(".container").outerWidth();t/=2,e=e-t-15,$(this).css("left",-e)})}function o(){$(".megamenu-wide").each(function(){$(this).css("width",$(".container-fluid").width());var e=$(this).closest(".dropdown").offset();e=e.left;var t=$(window).width()-$(".container-fluid").outerWidth();t/=2,e=e-t-50,$(this).css("left",-e)})}function i(){!function($){var e=$("#owl-promo");e.owlCarousel({pagination:!1,singleItem:!0}),$("#owl-featured-works").owlCarousel({pagination:!1,navigation:!0,navigationText:["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],itemsCustom:[[0,1],[550,2],[700,2],[850,2],[1e3,3],[1200,4],[1600,4]]}),$("#owl-testimonials").owlCarousel({navigation:!0,navigationText:["<i class='prev-btn'></i>","<i class='next-btn'></i>"],autoHeight:!0,slideSpeed:300,pagination:!1,paginationSpeed:400,singleItem:!0,stopOnHover:!0}),$("#owl-testimonials-boxes-2").owlCarousel({navigation:!1,slideSpeed:300,pagination:!0,paginationSpeed:400,stopOnHover:!0,itemsCustom:[[0,1],[450,1],[700,2],[1200,2]]}),$("#owl-testimonials-box").owlCarousel({navigation:!1,slideSpeed:300,pagination:!0,singleItem:!0,stopOnHover:!0}),$("#owl-testimonials-boxes-3").owlCarousel({navigation:!1,slideSpeed:300,pagination:!0,paginationSpeed:400,stopOnHover:!0,itemsCustom:[[0,1],[450,1],[700,2],[1200,3]]}),$("#owl-partners").owlCarousel({autoPlay:3e3,pagination:!1,itemsCustom:[[0,2],[370,3],[550,4],[700,5],[1e3,6]]}),$("#owl-shop-items-slider").owlCarousel({pagination:!1,navigation:!0,navigationText:["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],itemsCustom:[[0,1],[370,2],[550,3],[700,4],[1e3,4]]}),$("#owl-team-slider").owlCarousel({pagination:!0,navigation:!1,navigationText:["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],itemsCustom:[[0,1],[370,2],[550,3],[700,4],[1e3,4]]}),$("#owl-single").owlCarousel({navigation:!0,pagination:!1,slideSpeed:300,paginationSpeed:400,singleItem:!0,navigationText:["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"]}),$(".next").on("click",function(){e.trigger("owl.next")}),$(".prev").on("click",function(){e.trigger("owl.prev")})}(jQuery)}function n(){var e=$(".masonry");e.imagesLoaded(function(){e.isotope({itemSelector:".masonry-item",layoutMode:"masonry"})})}function s(e){$(e.target).prev(".panel-heading").find("a").toggleClass("plus minus")}function l(){var e=$(".masonry-grid");e.imagesLoaded(function(){e.isotope({itemSelector:".work-item",layoutMode:"masonry",percentPosition:!0,resizable:!1,isResizeBound:!1,masonry:{columnWidth:".work-item.quarter"}})}),e.isotope()}function r(){$(".list").removeClass("list-active"),$(".grid").addClass("grid-active"),$(".product-item").animate({opacity:0},function(){$(".shop-catalogue").removeClass("list-view").addClass("grid-view"),$(".product").addClass("product-grid").removeClass("product-list"),$(".product-item").stop().animate({opacity:1})})}function c(){$(".grid").removeClass("grid-active"),$(".list").addClass("list-active"),$(".product-item").animate({opacity:0},function(){$(".shop-catalogue").removeClass("grid-view").addClass("list-view"),$(".product").addClass("product-list").removeClass("product-grid"),$(".product-item").stop().animate({opacity:1})})}if($(window).load(function(){$.fn.postLike=function(){$(this).hasClass("done")||$(this).addClass("done");var e=$(this).data("id"),t=$(this).data("action"),a=$(this).children(".count"),o={action:"specs_zan",um_id:e,um_action:t};return $.post("http://www.hx-h.com/zhaiji_v2/wp-admin/admin-ajax.php",o,function(e){$(a).html(e)}),!1},$(document).on("click",".specsZan",function(){$(this).postLike()}),$(".loader").fadeOut(),$(".loader-mask").delay(100).fadeOut("fast"),$(window).trigger("resize"),n(),i(),l(),w.init()}),$(window).resize(function(){a(),$.stellar("refresh"),t(),o();var e=$(window).width();e<=974&&($(".dropdown-toggle").attr("data-toggle","dropdown"),$(".navigation").removeClass("sticky")),e>974&&($(".dropdown-toggle").removeAttr("data-toggle","dropdown"),$(".dropdown").removeClass("open")),$(".navbar .navbar-collapse").css("max-height",$(window).height()-$(".navbar-header").height())}),!$("body").hasClass("list")&&!$("body").hasClass("art")){var d=location.search.match(new RegExp("[?&]nav=([^&]*)(&?)","i"));d=d?decodeURIComponent(d[1]):d,setTimeout(function(){$("html,body").animate({scrollTop:$("."+d).offset().top},400)},1e3)}$(".navbar-nav").find("a").on("click",function(){var e,t=$(this);$("body").hasClass("list")||$("body").hasClass("art")?location.href="/?nav="+t.data("scroll"):(e=$("."+t.data("scroll")).offset().top,$("html,body").animate({scrollTop:e},400))}),$(window).scroll(function(){var e=$(window).width();$(window).scrollTop()>190&e>974?($(".navigation").addClass("sticky"),$(".logo-wrap").addClass("shrink")):($(".navigation").removeClass("sticky"),$(".logo-wrap").removeClass("shrink")),$(window).scrollTop()>200&e>974?$(".navigation").addClass("offset"):$(".navigation").removeClass("offset"),$(window).scrollTop()>500&e>974?$(".navigation").addClass("scrolling"):$(".navigation").removeClass("scrolling"),$(window).scrollTop()>190?$(".navbar-fixed-top").addClass("sticky"):$(".navbar-fixed-top").removeClass("sticky")}),$(".onepage-nav .navbar-collapse ul li a").on("click",function(){$(".navbar-collapse").collapse("hide")}),$(".local-scroll").localScroll({offset:{top:-60},duration:1500,easing:"easeInOutExpo"}),$("#nav-icon, .overlay-menu").on("click",function(){$("#nav-icon, #overlay").toggleClass("open"),$(function(){var e=0;$(".overlay-menu > ul > li").each(function(){$(this).css({animationDelay:e+"s"}),e+=.1})})}),$(".dropdown-submenu > a").submenupicker(),$(".search-trigger").on("click",function(e){e.preventDefault(),$(".search-wrap").animate({opacity:"toggle"},500),$(".nav-search, #search-close").addClass("open"),$(".search-wrap .form-control").focus()}),$(".search-close").on("click",function(e){e.preventDefault(),$(".search-wrap").animate({opacity:"toggle"},500),$(".nav-search, #search-close").removeClass("open")}),$(document.body).on("click",function(t){e()}),$(".search-wrap, .search-trigger").on("click",function(e){e.stopPropagation()}),$(".nav-icon-trigger, #sidenav-close").on("click",function(e){e.preventDefault(),$(".sidenav").toggleClass("opened"),$(".main-wrapper").toggleClass("sidenav-opened")}),$("#sidenav-close").on("click",function(){$("#nav-icon").removeClass("open")}),$(window).scroll(function(){return!!$(window).scrollTop()&&($(".sidenav").removeClass("opened"),$(".main-wrapper").removeClass("sidenav-opened"),$("#nav-icon").removeClass("open"),void 0)}),$(".dropdown-toggle").on("click",function(e){e.preventDefault()}),/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent||navigator.vendor||window.opera)?($("html").addClass("mobile"),$(".dropdown-toggle").attr("data-toggle","dropdown")):$("html").removeClass("mobile"),Function("/*@cc_on return document.documentMode===10@*/")()&&$("html").addClass("ie"),$(".rotate").textrotator({animation:"dissolve",separator:",",speed:3e3}),$(function(){$(".typing-text").typed({strings:["Landing Page","Startup Site","Onepage"],typeSpeed:30,backDelay:1500,loop:!0})}),$(".statistic").appear(function(){$(".timer").countTo({speed:4e3,refreshInterval:60,formatter:function e(t,a){return t.toFixed(a.decimals)}})}),$("#tabs-slider").flexslider({animation:"slide",manualControls:".flex-control-nav li",useCSS:!1,animationSpeed:200,touch:!0,directionNav:!1,slideshow:!1}),$("#flexslider").flexslider({animation:"slide",directionNav:!0,touch:!0,slideshow:!1,prevText:["<i class='ti-angle-left'></i>"],nextText:["<i class='ti-angle-right'></i>"],start:function x(){var e=$(".masonry");e.imagesLoaded(function(){e.isotope({itemSelector:".masonry-item",layoutMode:"masonry"})})}});var p=$("#showcases-slider").flickity({cellAlign:"center",contain:!0,wrapAround:!0,autoPlay:!1,prevNextButtons:!1,percentPosition:!0,imagesLoaded:!0,lazyLoad:1,pageDots:!0,selectedAttraction:.1,friction:.6,rightToLeft:!1,arrowShape:"M 10,50 L 55,95 L 60,90 L 20,50  L 60,10 L 55,5 Z"}),p=$("#gallery-main").flickity({cellAlign:"center",contain:!0,wrapAround:!0,autoPlay:!1,prevNextButtons:!0,percentPosition:!0,imagesLoaded:!0,lazyLoad:1,pageDots:!1,selectedAttraction:.1,friction:.6,rightToLeft:!1,arrowShape:"M 10,50 L 60,100 L 65,95 L 20,50  L 65,5 L 60,0 Z"});$(".gallery-thumbs").flickity({asNavFor:"#gallery-main",contain:!0,cellAlign:"left",wrapAround:!1,autoPlay:!1,prevNextButtons:!1,percentPosition:!0,imagesLoaded:!0,pageDots:!1,selectedAttraction:.1,friction:.6,rightToLeft:!1});var u=$.map(p.find(".gallery-cell a"),function(e){return{src:e.href,type:$(e).attr("data-popup-type")||"image"}});p.on("staticClick",function(e,t,a,o){a&&$.magnificPopup.open({items:u,gallery:{enabled:!0},callbacks:{open:function i(){$.magnificPopup.instance.goTo(o)}}})}),p.on("click","a",function(e){e.preventDefault()});var f=$(".payment_methods > li > .payment_box").hide();f.first().slideDown("easeOutExpo"),$(".payment_methods > li > input").change(function(){var e=$(this).parent().children(".payment_box");return f.not(e).slideUp("easeInExpo"),$(this).parent().children(".payment_box").slideDown("easeOutExpo"),!1}),$(function(){jQuery(document).on("click",".plus",function(e){e.preventDefault();var t=jQuery(this).parents(".quantity").find("input.qty"),a=parseInt(t.val(),10)+1,o=parseInt(t.attr("max"),10);o||(o=9999999999),a<=o&&(t.val(a),t.change())}),jQuery(document).on("click",".minus",function(e){e.preventDefault();var t=jQuery(this).parents(".quantity").find("input.qty"),a=parseInt(t.val(),10)-1,o=parseInt(t.attr("min"),10);o||(o=1),a>=o&&(t.val(a),t.change())})});var m=$("#animated-skills").appear(function(){function e(){$(t).each(function(){a=$(this).attr("aria-valuenow"),$(this).width(a+"%")})}var t=$(".progress-bar"),a=$(this);e()});$(".chart").appear(function(){$(this).easyPieChart({animate:{duration:1500,enabled:!0},scaleColor:!1,trackColor:"#f5f5f5",easing:"easeOutBounce",lineWidth:3,size:160,lineCap:"square",onStep:function t(e,a,o){$(this.el).find(".percent").text(Math.round(o))}});var e=window.chart=$(".chart").data("easyPieChart");$(".js_update").on("click",function(){e.update(200*Math.random()-100)})}),$("#accordion").on("hide.bs.collapse",s),$("#accordion").on("show.bs.collapse",s);var g=$(".toggle > .panel-content").hide();$(".toggle > .acc-panel > a").on("click",function(){return $(this).hasClass("active")?($(this).parent().next().slideUp("easeOutExpo"),$(this).removeClass("active")):($(this).parent().next(".panel-content"),$(this).addClass("active"),$(this).parent().next().slideDown("easeOutExpo")),!1}),$(".nav-item-submenu").hide(),$(".nav-item-toggle > a").on("click",function(e){e.preventDefault(),$(this).hasClass("active")?($(this).next().slideUp("easeOutExpo"),$(this).removeClass("active")):($(this).next(".nav-item-submenu"),$(this).addClass("active"),$(this).next().slideDown("easeOutExpo"))}),$(".lightbox-gallery").magnificPopup({type:"image",tLoading:"Loading image #%curr%...",gallery:{enabled:!0,navigateByImgClick:!0,preload:[0,1]},image:{titleSrc:"title"}}),$(".lightbox-video").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),$(function(){$('[data-toggle="tooltip"]').tooltip()});var v=$("#portfolio-container");if(v.imagesLoaded(function(){v.isotope({isOriginLeft:!0,stagger:30}),v.isotope()}),$("#portfolio1 .portfolio-filter").on("click","a",function(e){e.preventDefault();var t=$(this).attr("data-filter");v.isotope({filter:t}),$("#portfolio1 .portfolio-filter a").removeClass("active"),$(this).closest("a").addClass("active")}),$("body").hasClass("list")){var h=$("#portfolio-container2");h.imagesLoaded(function(){h.isotope({isOriginLeft:!0,stagger:30}),h.isotope()}),h.infiniteScroll({path:".pagination__next",append:".work-item",history:!1,status:".page-load-status"}),h.on("load.infiniteScroll",function(e,t,a){var o=$(t).find(".work-item");o.imagesLoaded(function(){h.append(o),h.isotope("insert",o)})}),$("#portfolio2 .portfolio-filter").on("click","a",function(e){e.preventDefault();var t=$(this).attr("data-filter");h.isotope({filter:t}),$("#portfolio2 .portfolio-filter a").removeClass("active"),$(this).closest("a").addClass("active")})}$("#list").on("click",function(){c()}),$("#grid").on("click",function(){r()}),$(function(){$("#slider-range").slider({range:!0,min:0,max:1500,values:[160,800],slide:function e(t,a){$("#amount").val("$"+a.values[0]+" - $"+a.values[1])}}),$("#amount").val("$"+$("#slider-range").slider("values",0)+" - $"+$("#slider-range").slider("values",1))}),$.stellar({horizontalScrolling:!1,hideDistantElements:!1}),$(window).load(function(){setTimeout(function(){$.stellar("refresh")},1e3)});var w=new WOW({offset:50,mobile:!1});$(".video-wrap").fitVids();var C=$("#submit-message"),y=$("#msg");C.on("click",function(e){e.preventDefault();var t=$(this);$.ajax({type:"POST",url:"contact.php",dataType:"json",cache:!1,data:$("#contact-form").serialize(),success:function a(e){"error"!==e.info?(t.parents("form").find("input[type=text],input[type=email],textarea,select").filter(":visible").val(""),y.hide().removeClass("success").removeClass("error").addClass("success").html(e.msg).fadeIn("slow").delay(5e3).fadeOut("slow")):y.hide().removeClass("success").removeClass("error").addClass("error").html(e.msg).fadeIn("slow").delay(5e3).fadeOut("slow")}})})}(jQuery),function(){"use strict";function e(){window.addEventListener("scroll",function(){a||(a=!0,setTimeout(scrollPage,50))},!1)}var t=document.documentElement,a=!1,o=550;document.querySelector("#back-to-top")}(),$(window).scroll(function(e){var t=$(window).scrollTop();t>=50?$("#back-to-top").addClass("show"):$("#back-to-top").removeClass("show")}),$('a[href="#top"]').on("click",function(){return $("html, body").animate({scrollTop:0},1350,"easeInOutQuint"),!1}),$(".read-more").on("click",function(){$("body,html").animate({scrollTop:$(".promo-section .title").offset().top-100},400)}),$("article.art-cont img").each(function(){""!=$(this).parent().attr("href")&&"A"==$(this).parent()[0].nodeName&&$(this).parent().addClass("lightbox")}),$(".lightbox").swipebox(),$("article img").bind("contextmenu",function(e){return!1})}]);
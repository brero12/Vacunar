/*
 * FancyBox - jQuery Plugin
 * simple and fancy lightbox alternative
 *
 * Copyright (c) 2009 Janis Skarnelis
 * Examples and documentation at: http://fancybox.net
 * 
 * Version: 1.2.6 (16/11/2009)
 * Requires: jQuery v1.3+
 * 
 * Code changed by AJAX-ZOOM
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

function browserMigrate(){var a,d,b;a=navigator.userAgent;a=a.toLowerCase();d=/(chrome)[ \/]([\w.]+)/.exec(a)||/(webkit)[ \/]([\w.]+)/.exec(a)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(a)||/(msie) ([\w.]+)/.exec(a)||0>a.indexOf("compatible")&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(a)||[];a=d[1]||"";d=d[2]||"0";b={};a&&(b[a]=!0,b.version=d);b.chrome?b.webkit=!0:b.webkit&&(b.safari=!0);jQuery.browser?jQuery.extend(jQuery.browser,b):jQuery.browser=b}browserMigrate();
(function(a){a.fn.fixPNG=function(){return this.each(function(){var b=a(this).css("backgroundImage");b.match(/^url\(["']?(.*\.png)["']?\)$/i)&&(b=RegExp.$1,a(this).css({backgroundImage:"none",filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod="+("no-repeat"==a(this).css("backgroundRepeat")?"crop":"scale")+", src='"+b+"')"}).each(function(){var b=a(this).css("position");"absolute"!=b&&"relative"!=b&&a(this).css("position","relative")}))})};var d,b,l=!1,f=new Image,
m,h=1,q=/\.(jpg|gif|png|bmp|jpeg)(.*)?$/i,r=null,k=a.browser.msie&&6==a.browser.version.substr(0,1)&&!window.XMLHttpRequest,s=k||a.browser.msie&&7==a.browser.version.substr(0,1);a.fn.fancybox=function(c){function g(){a("#fancy_right, #fancy_left, #fancy_close, #fancy_title").hide();var c=b.itemArray[b.itemCurrent].href;if(c.match("iframe")||0<=d.className.indexOf("iframe"))a.fn.fancybox.showLoading(),n('<iframe id="fancy_frame" onload="jQuery.fn.fancybox.showIframe()" name="fancy_iframe'+Math.round(1E3*
Math.random())+'" frameborder="0" hspace="0" src="'+c+'"></iframe>',b.frameWidth,b.frameHeight);else if(c.match(/#/)){var e=window.location.href.split("#")[0],e=c.replace(e,""),e=e.substr(e.indexOf("#"));n('<div id="fancy_div">'+a(e).html()+"</div>",b.frameWidth,b.frameHeight)}else c.match(q)&&!c.match(/zoomData/)?(f=new Image,f.src=c,f.complete?t():(a.fn.fancybox.showLoading(),a(f).unbind().bind("load",function(){a("#fancy_loading").hide();t()}))):(a.fn.fancybox.showLoading(),a.get(c,function(b){a("#fancy_loading").hide();
tempData=b.replace(/<script{1}.*>*<\/script>/i,"");a("<DIV />").attr("id","fancyTemp").css({display:"none",minWidth:150,minHeight:150}).html(tempData).appendTo("body");var c=a("#fancyTemp").outerWidth(),v=a("#fancyTemp").outerHeight();a("#fancyTemp").remove();n('<div id="fancy_ajax">'+b+"</div>",c,v)}))}function t(){var c=f.width,e=f.height,g=2*b.padding+40,u=2*b.padding+60,d=a.fn.fancybox.getViewport();b.imageScale&&(c>d[0]-g||e>d[1]-u)&&(g=Math.min(Math.min(d[0]-g,c)/c,Math.min(d[1]-u,e)/e),c=Math.round(g*
c),e=Math.round(g*e));n('<img alt="" id="fancy_img" src="'+f.src+'" />',c,e)}function w(){if(b.itemArray.length-1>b.itemCurrent){var a=b.itemArray[b.itemCurrent+1].href||!1;a&&a.match(q)&&!a.match(/zoomData/)&&(objNext=new Image,objNext.src=a)}0<b.itemCurrent&&(a=b.itemArray[b.itemCurrent-1].href||!1)&&a.match(q)&&!a.match(/zoomData/)&&(objNext=new Image,objNext.src=a)}function n(c,e,g){l=!0;var d=b.padding;if(s||r)a("#fancy_content")[0].style.removeExpression("height"),a("#fancy_content")[0].style.removeExpression("width");
if(0<d){if(e+=2*d,g+=2*d,a("#fancy_content").css({top:d+"px",right:d+"px",bottom:d+"px",left:d+"px",width:"auto",height:"auto"}),s||r)a("#fancy_content")[0].style.setExpression("height","(this.parentNode.clientHeight - "+2*d+")"),a("#fancy_content")[0].style.setExpression("width","(this.parentNode.clientWidth - "+2*d+")")}else a("#fancy_content").css({top:0,right:0,bottom:0,left:0,width:"100%",height:"100%"});if(a("#fancy_outer").is(":visible")&&e==a("#fancy_outer").width()&&g==a("#fancy_outer").height())a("#fancy_content").fadeOut("fast",
function(){a("#fancy_content").empty().append(a(c)).fadeIn("normal",function(){p()})});else{var d=a.fn.fancybox.getViewport(),f=g+60>d[1]?d[3]:d[3]+Math.round(0.5*(d[1]-g-60)),h={left:e+40>d[0]?d[2]:d[2]+Math.round(0.5*(d[0]-e-40)),top:f,width:e+"px",height:g+"px"};a("#fancy_outer").is(":visible")?a("#fancy_content").fadeOut("normal",function(){a("#fancy_content").empty();a("#fancy_outer").animate(h,b.zoomSpeedChange,b.easingChange,function(){a("#fancy_content").append(a(c)).fadeIn("normal",function(){p()})})}):
0<b.zoomSpeedIn&&void 0!==b.itemArray[b.itemCurrent].orig?(a("#fancy_content").empty().append(a(c)),e=b.itemArray[b.itemCurrent].orig,g=a.fn.fancybox.getPosition(e),a("#fancy_outer").css({left:g.left-20-b.padding+"px",top:g.top-20-b.padding+"px",width:a(e).width()+2*b.padding,height:a(e).height()+2*b.padding}),b.zoomOpacity&&(h.opacity="show"),a("#fancy_outer").animate(h,b.zoomSpeedIn,b.easingIn,function(){p()})):(a("#fancy_content").hide().empty().append(a(c)).show(),a("#fancy_outer").css(h).fadeIn("normal",
function(){p()}))}}function m(){0!==b.itemCurrent&&(a("#fancy_left, #fancy_left_ico").unbind().bind("click",function(a){a.stopPropagation();b.itemCurrent--;g();return!1}),a("#fancy_left").show());b.itemCurrent!=b.itemArray.length-1&&(a("#fancy_right, #fancy_right_ico").unbind().bind("click",function(a){a.stopPropagation();b.itemCurrent++;g();return!1}),a("#fancy_right").show())}function p(){a.browser.msie&&(a("#fancy_content")[0].style.removeAttribute("filter"),a("#fancy_outer")[0].style.removeAttribute("filter"));
m();w();a(document).bind("keydown.fb",function(c){27==c.keyCode&&b.enableEscapeButton?a.fn.fancybox.close():37==c.keyCode&&0!==b.itemCurrent?(a(document).unbind("keydown.fb"),b.itemCurrent--,g()):39==c.keyCode&&b.itemCurrent!=b.itemArray.length-1&&(a(document).unbind("keydown.fb"),b.itemCurrent++,g())});b.hideOnContentClick&&a("#fancy_content").click(a.fn.fancybox.close);b.overlayShow&&b.hideOnOverlayClick&&a("#fancy_overlay").bind("click",a.fn.fancybox.close);b.showCloseButton&&a("#fancy_close").bind("click",
a.fn.fancybox.close).show();if("undefined"!==typeof b.itemArray[b.itemCurrent].title&&0<b.itemArray[b.itemCurrent].title.length){var c=a("#fancy_outer").position();a("#fancy_title div").text(b.itemArray[b.itemCurrent].title).html();a("#fancy_title").css({top:c.top+a("#fancy_outer").outerHeight()-32,left:c.left+(0.5*a("#fancy_outer").outerWidth()-0.5*a("#fancy_title").width())}).show()}b.overlayShow&&k&&a("embed, object, select",a("#fancy_content")).css("visibility","visible");a.isFunction(b.callbackOnShow)&&
b.callbackOnShow(b.itemArray[b.itemCurrent]);a.browser.msie&&(a("#fancy_outer")[0].style.removeAttribute("filter"),a("#fancy_content")[0].style.removeAttribute("filter"));l=!1}var h=a.extend({},a.fn.fancybox.defaults,c),x=this;return this.unbind("click.fb").bind("click.fb",function(){d=this;b=a.extend({},h);if(!l){a.isFunction(b.callbackOnStart)&&b.callbackOnStart();b.itemArray=[];b.itemCurrent=0;if(0<h.itemArray.length)b.itemArray=h.itemArray;else{var c={};if(d.rel&&""!=d.rel)for(var e=a(x).filter("a[rel="+
d.rel+"]"),f=0;f<e.length;f++){c={href:e[f].href,title:e[f].title};a(e[f]).children("img:first").length?c.orig=a(e[f]).children("img:first"):c.orig=a(e[f]);if(""==c.title||"undefined"==typeof c.title)c.title=c.orig.attr("alt");b.itemArray.push(c)}else{c={href:d.href,title:d.title};a(d).children("img:first").length?c.orig=a(d).children("img:first"):c.orig=a(d);if(""==c.title||"undefined"==typeof c.title)c.title=c.orig.attr("alt");b.itemArray.push(c)}}for(;b.itemArray[b.itemCurrent].href!=d.href;)b.itemCurrent++;
b.overlayShow&&(k&&(a("embed, object, select").css("visibility","hidden"),a("#fancy_overlay").css("height",a(document).height())),a("#fancy_overlay").css({"background-color":b.overlayColor,opacity:b.overlayOpacity}).show());a(window).bind("resize.fb scroll.fb",a.fn.fancybox.scrollBox);g()}return!1})};a.fn.fancybox.scrollBox=function(){var c=a.fn.fancybox.getViewport();if(b.centerOnScroll&&a("#fancy_outer").is(":visible")){var d=a("#fancy_outer").outerWidth(),f=a("#fancy_outer").outerHeight(),h={top:f>
c[1]?c[3]:c[3]+Math.round(0.5*(c[1]-f)),left:d>c[0]?c[2]:c[2]+Math.round(0.5*(c[0]-d))};a("#fancy_outer").css(h);a("#fancy_title").css({top:h.top+f-32,left:h.left+(0.5*d-0.5*a("#fancy_title").width())})}k&&a("#fancy_overlay").is(":visible")&&a("#fancy_overlay").css({height:a(document).height()});a("#fancy_loading").is(":visible")&&a("#fancy_loading").css({left:0.5*(c[0]-40)+c[2],top:0.5*(c[1]-40)+c[3]})};a.fn.fancybox.getNumeric=function(b,d){return parseInt(a.css(b.jquery?b[0]:b,d,!0))||0};a.fn.fancybox.getPosition=
function(b){var d=b.offset();d.top+=a.fn.fancybox.getNumeric(b,"paddingTop");d.top+=a.fn.fancybox.getNumeric(b,"borderTopWidth");d.left+=a.fn.fancybox.getNumeric(b,"paddingLeft");d.left+=a.fn.fancybox.getNumeric(b,"borderLeftWidth");return d};a.fn.fancybox.showIframe=function(){a("#fancy_loading").hide();a("#fancy_frame").show()};a.fn.fancybox.getViewport=function(){return[a(window).width(),a(window).height(),a(document).scrollLeft(),a(document).scrollTop()]};a.fn.fancybox.animateLoading=function(){a("#fancy_loading").is(":visible")?
(a("#fancy_loading > div").css("top",-40*h+"px"),h=(h+1)%12):clearInterval(m)};a.fn.fancybox.showLoading=function(){clearInterval(m);var b=a.fn.fancybox.getViewport();a("#fancy_loading").css({left:0.5*(b[0]-40)+b[2],top:0.5*(b[1]-40)+b[3]}).show();a("#fancy_loading").bind("click",a.fn.fancybox.close);m=setInterval(a.fn.fancybox.animateLoading,66)};a.fn.fancybox.close=function(){l=!0;a(f).unbind();a(document).unbind("keydown.fb");a(window).unbind("resize.fb scroll.fb");a("#fancy_overlay, #fancy_content, #fancy_close").unbind();
a("#fancy_close, #fancy_loading, #fancy_left, #fancy_right, #fancy_title").hide();__cleanup=function(){a("#fancy_overlay").is(":visible")&&a("#fancy_overlay").fadeOut("fast");a("#fancy_content").empty();b.centerOnScroll&&a(window).unbind("resize.fb scroll.fb");k&&a("embed, object, select").css("visibility","visible");a.isFunction(b.callbackOnClose)&&b.callbackOnClose();l=!1};if(!1!==a("#fancy_outer").is(":visible"))if(0<b.zoomSpeedOut&&void 0!==b.itemArray[b.itemCurrent].orig){var c=b.itemArray[b.itemCurrent].orig,
d=a.fn.fancybox.getPosition(c),c={left:d.left-20-b.padding+"px",top:d.top-20-b.padding+"px",width:a(c).width()+2*b.padding,height:a(c).height()+2*b.padding};b.zoomOpacity&&(c.opacity="hide");a("#fancy_outer").stop(!1,!0).animate(c,b.zoomSpeedOut,b.easingOut,__cleanup)}else a("#fancy_outer").stop(!1,!0).fadeOut("fast",__cleanup);else __cleanup();return!1};a.fn.fancybox.build=function(){var b;b='<div id="fancy_overlay"></div><div id="fancy_loading"><div></div></div>';b+='<div id="fancy_outer">';b+=
'<div id="fancy_inner">';b+='<div id="fancy_close"></div>';b+='<div id="fancy_bg"><div class="fancy_bg" id="fancy_bg_n"></div><div class="fancy_bg" id="fancy_bg_ne"></div><div class="fancy_bg" id="fancy_bg_e"></div><div class="fancy_bg" id="fancy_bg_se"></div><div class="fancy_bg" id="fancy_bg_s"></div><div class="fancy_bg" id="fancy_bg_sw"></div><div class="fancy_bg" id="fancy_bg_w"></div><div class="fancy_bg" id="fancy_bg_nw"></div></div>';b+='<a href="javascript:;" id="fancy_left"><span class="fancy_ico" id="fancy_left_ico"></span></a><a href="javascript:;" id="fancy_right"><span class="fancy_ico" id="fancy_right_ico"></span></a>';
b+='<div id="fancy_content"></div>';b+="</div>";b+="</div>";b+='<div id="fancy_title"></div>';a(b).appendTo("body");a('<table cellspacing="0" cellpadding="0" border="0"><tr><td class="fancy_title" id="fancy_title_left"></td><td class="fancy_title" id="fancy_title_main"><div></div></td><td class="fancy_title" id="fancy_title_right"></td></tr></table>').appendTo("#fancy_title");a.browser.msie&&a(".fancy_bg").fixPNG();k&&(a("div#fancy_overlay").css("position","absolute"),a("#fancy_loading div, #fancy_close, .fancy_title, .fancy_ico").fixPNG(),
a("#fancy_inner").prepend('<iframe id="fancy_bigIframe" src="javascript:false;" scrolling="no" frameborder="0"></iframe>'),b=a("#fancy_bigIframe")[0].contentWindow.document,b.open(),b.close())};a.fn.fancybox.defaults={padding:10,imageScale:!0,zoomOpacity:!0,zoomSpeedIn:0,zoomSpeedOut:0,zoomSpeedChange:300,easingIn:"swing",easingOut:"swing",easingChange:"swing",frameWidth:560,frameHeight:340,overlayShow:!0,overlayOpacity:0.3,overlayColor:"#666",enableEscapeButton:!0,showCloseButton:!0,hideOnOverlayClick:!0,
hideOnContentClick:!0,centerOnScroll:!0,itemArray:[],callbackOnStart:null,callbackOnShow:null,callbackOnClose:null};a(document).ready(function(){r=a.browser.msie&&!a.boxModel;1>a("#fancy_outer").length&&a.fn.fancybox.build()})})(jQuery);
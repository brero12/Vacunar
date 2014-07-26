/**
* Extension: jQuery AJAX-ZOOM, jquery.axZm.openAjaxZoomInFancyBox.js
* Copyright: Copyright (c) 2010-2013 Vadim Jacobi
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 4.1.5
* Extension Version: 1.1
* Date: 2014-04-06
* URL: http://www.ajax-zoom.com
* Documentation: http://www.ajax-zoom.com/index.php?cid=docs
* Extension usage: http://www.ajax-zoom.com/examples/example27.php
*/

/*
$(selector).openAjaxZoomInFancyBox(
	axZmPath: "../axZm/",								   
	queryString: "example=23&zoomData=/pic/zoom/boutique/bag_0.jpg|/pic/zoom/boutique/bag_6.jpg",
	fullScreenApi: false
);

or

<a href="javascript: void(0)" onclick="openAjaxZoomInFancyBox('example=23&zoomData=/pic/zoom/boutique/bag_0.jpg|/pic/zoom/boutique/bag_6.jpg')">
*/

;(function($){

	$.openAjaxZoomInFancyBox = function(options){

		// Defaults
		var defaults = {
			axZmPath: 'auto', // Path to AJAX-ZOOM, e.g. /zoomTest/axZm/
			queryString: '', // is a single string that determines which images will be loaded
			loadingMsg: 'Loading, please wait...',
			fullScreenCloseBox: false, // when closing fullscreen close fancybox as well 
			fullScreenApi: false, // use browsers fullscreen api when maximizing AJAX-ZOOM
			ajaxZoomCallbacks: {}, // AJAX-ZOOM callbacks, some are set in this plugin and are merged
			
			// Fancybox translated parameters
			boxMargin: 30,
			boxPadding: 10,
			boxCenterOnScroll: true,
			boxOverlayShow: true,
			boxOverlayOpacity: 0.75,
			boxOverlayColor: '#777',
			boxTransitionIn: 'fade', // 'elastic', 'fade' or 'none'
			boxTransitionOut: 'fade', // 'elastic', 'fade' or 'none'
			boxSpeedIn: 300,
			boxSpeedOut: 300,
			boxEasingIn: 'swing',
			boxEasingOut: 'swing',
			boxShowCloseButton: true, // close button
			boxEnableEscapeButton: true,
			boxOnClosed: function(){},
			boxOnComplete: function(){}
		};
		
		if (typeof options == 'object'){
			var op = $.extend(true, {}, defaults, options);
		}else{
			var op = defaults;
			op.queryString = options;
		}

		// Override defaults by user setting
		var op = $.extend(true, {}, defaults, options);

		// Some checks
		if (!op.queryString){
			alert('Please define queryString that you want to pass to AJAX-ZOOM');
			return;
		}
		if (!$.isFunction($.fn.axZm)){
			alert('AJAX-ZOOM JavaScript file is not included');
			return;
		}
		
		// Define the path to the axZm folder, adjust the path if needed! Best of all set absolute path to axZm
		// Try to get /axZm path instantly
		if (op.axZmPath == 'auto'){op.axZmPath = $.fn.axZm.installPath();}
		
		// Needed callbacks
		var	ajaxZoomCallbacks = {
			onFullScreenCloseEndFromRel: function(){
				if (op.fullScreenCloseBox){
					$.fancybox.close();
					return;
				}
				// Scrollbar fix
				var root = document.compatMode == 'BackCompat' ? document.body : document.documentElement;

				if (root.scrollWidth > root.clientWidth){
					$(window).trigger('resize');
					$.fn.axZm.resizeStart();
				} 
				else{
					$(window).trigger('resize');
				}
			}
		};
		
		// Merge AJAX-ZOOM callback functions
		if ($.isEmptyObject(op.ajaxZoomCallbacks)){
			op.ajaxZoomCallbacks = ajaxZoomCallbacks;
		}else{
			$.each(op.ajaxZoomCallbacks, function(k,f){
				if ($.isFunction(f) && ajaxZoomCallbacks[k]){
					op.ajaxZoomCallbacks[k] = function(){
						ajaxZoomCallbacks[k]();
						f();
					};
				}
			});
			
			$.each(ajaxZoomCallbacks, function(k,f){
				if (!op.ajaxZoomCallbacks[k]){
					 op.ajaxZoomCallbacks[k] = f;
				}
			});
		}
		
		 

		// Calculations of the width and hight passed to fancybox
		var boxW = $(window).width() - op.boxPadding*2 - op.boxMargin*2;
		var boxH = (window.innerHeight ? window.innerHeight : $(window).height()) - op.boxPadding*2 - op.boxMargin*2;

		// Helper object to adjust fancybox width and hight when browser window resizes
		var fanyDim = {};
		
		var cBoxOnWinResize = function(){			
			var difW = $(window).width() - fanyDim.wW;
			var difH = (window.innerHeight ? window.innerHeight : $(window).height()) - fanyDim.wH;
			
			$('#fancybox-content').css({
				width: fanyDim.fCw + difW,
				height: fanyDim.fCh + difH,
				opacity: ''
			});
			
			$('#fancybox-wrap').css({
				width: fanyDim.fWrw + difW,
				height: fanyDim.fWrh + difH
			});
		}		
 		
		// Create an html element to pretend there is something to load into fancybox
		$('#tempLoadingMassage').remove(); // if present :-)
		$('<DIV />').html(op.loadingMsg).attr('id', 'tempLoadingMassage').css('display', 'none').appendTo('body');
		
		// Trigger fancybox
		$.fancybox({
			padding: op.boxPadding, // boxPadding defined at very beginning
			margin: op.boxMargin, // boxMargin defined at very beginning
			overlayShow: op.boxOverlayShow, // optional, show overlay
			overlayOpacity: op.boxOverlayOpacity, // optional, overlay opacity
			centerOnScroll: op.boxCenterOnScroll, // optional
			overlayColor : op.boxOverlayColor, // optional
			transitionIn: op.boxTransitionIn, // 'elastic', 'fade' or 'none'
			transitionOut: op.boxTransitionOut, // 'elastic', 'fade' or 'none'
			speedIn: op.boxSpeedIn,
			speedOut: op.boxSpeedOut,
			easingIn: op.boxEasingIn,
			easingOut: op.boxEeasingOut,
			showCloseButton: op.boxShowCloseButton,
			enableEscapeButton: op.boxEnableEscapeButton,
			
			showNavArrows: false, // required, false
			enableKeyboardNav: false, // required, false
			hideOnContentClick: false, // required, do not hide when clicked inside fancybox (AJAX-ZOOM is there)
			scrolling: 'no', // required, no scrolling
			width: boxW, // required, boxW is calculated at very beginning
			height: boxH, // required, boxH is calculated at very beginning
			autoScale: false, // required
			autoDimensions: false, // required
			href: '#tempLoadingMassage', // required, pretend there is something to load :-)
			onComplete: function(){
				// Fancybox callback passed over openAjaxZoomInFancyBox
				op.boxOnComplete();
				
				// Save initial dimensions of the fancybox when it is opened
				// Needed to recalculate the width when window resizes with cBoxOnWinResize function
				fanyDim = {
					fCw: $('#fancybox-content').width(),
					fCh: $('#fancybox-content').height(),
					fWrw: $('#fancybox-wrap').width(),
					fWrh: $('#fancybox-wrap').height(),
					fOw: $('#fancybox-outer').width(),
					fOh: $('#fancybox-outer').height(),
					wW: $(window).width(),
					wH: (window.innerHeight ? window.innerHeight : $(window).height())
				};
				
				// Bind custom window resize function (cBoxOnWinResize) to enable size adjustments for the fancybox
				$(window).unbind('resize', cBoxOnWinResize).bind('resize', cBoxOnWinResize);
				
				// Init AJAX-ZOOM
				window.fullScreenStartSplash = {'enable': true, 'className': false, 'opacity': 0.75}; 
				$.fn.axZm.openFullScreen(op.axZmPath, op.queryString,  op.ajaxZoomCallbacks, 'fancybox-content', op.fullScreenApi, false);
				
			},
			onClosed: function(){
				// Fancybox callback passed over openAjaxZoomInFancyBox
				op.boxOnClosed();
				
				// If 360/3D loaded into the fancybox
				$.fn.axZm.spinStop();
				
				// Completly remove AJAX-ZOOM from DOM
				$.fn.axZm.remove();
				$('#axZmTempBody').axZmRemove(true);
				$('#axZmTempLoading').axZmRemove(true);
				
			}
	
		});
		
	}; // End $.openAjaxZoomInFancyBox	

	$.fn.unbindAjaxZoomInFancyBox = function(){
		return this.each(function(){
			$(this).unbind('click.axZmFb');
		});
	};

	$.fn.openAjaxZoomInFancyBox = function(options){
		return this.each(function(){
			$(this).unbindAjaxZoomInFancyBox().bind('click.axZmFb', function(){
				$.openAjaxZoomInFancyBox(options);
			});
		});
	};

})(jQuery);
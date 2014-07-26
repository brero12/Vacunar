/**
* Plugin: jQuery AJAX-ZOOM, jquery.axZm.mouseOverZoomInit.js
* Copyright: Copyright (c) 2010-2014 Vadim Jacobi
* License Agreement: http://www.ajax-zoom.com/index.php?cid=download
* Version: 4.1.5
* Extension Version: 2.0
* Date: 2014-04-06
* URL: http://www.ajax-zoom.com
* Documentation: http://www.ajax-zoom.com/examples/example32.php
*/

/**
This file is needed to init mouseOverZoom (jquery.axZm.mouseOverZoom.js)
*/

(function($) {
	
	$.mouseOverZoomInit = function(options){  

		// Defaults
		var defaults = {
			axZmPath: 'auto', // Path to AJAX-ZOOM, e.g. /zoomTest/axZm/
			divID: '', // DIV for mouseover zoom
			galleryDivID: '', // DIV id of the gallery, set to false to disable gallery
			
			// Objecct containing absolte paths to the master images, optional with titles. Start with 1, not 0
			// Your master image can be as big as you want, it never loads into cache
			// You can also protect the directory with .htaccess or other http access restrictions.
			// Alternatively you can link to your static images with these keys: 
			// "zoom" - big mouseover image, "preview" - preview image and "thumb" - image for the gallery. 
			// "img" - your master image is needed anyway to open AJAX-ZOOM on click
			images: {},
			firstImageToLoad: 1, // image that should be loaded at first
			
			galleryAxZmThumbSlider: true,  

			preloadMouseOverImages: false, // preload all preview and mouse over images, possible values: false, true, 'oneByOne' 
			width: 'auto', // width of the mouse image or 'auto'
			height: 'auto', // height of the mouse image or 'auto'
			mouseOverZoomWidth: 1200, // max width of the image that will be shown in the zoom window
			mouseOverZoomHeight: 1200, // max height of the image that will be shown in the zoom window
			
			ajaxZoomOpenMode: 'fullscreen', // Ver. 4.1.5+ possible values: 'fullscreen', 'fancyboxFullscreen', 'fancybox', 'colorbox'
			example: 'mouseOverExtension', // Ver. 4.1.5+ configuration set which is passed to ajax-zoom when ajaxZoomOpenMode is 'fullscreen'
			exampleFancyboxFullscreen: 'mouseOverExtension', // Ver. 4.1.5+ configuration set which is passed to ajax-zoom when ajaxZoomOpenMode is 'fancyboxFullscreen'
			exampleFancybox: 'modal', // Ver. 4.1.5+ configuration set which is passed to ajax-zoom when ajaxZoomOpenMode is 'fancybox'
			exampleColorbox: 'modal', // Ver. 4.1.5+ configuration set which is passed to ajax-zoom when ajaxZoomOpenMode is 'colorbox'

			fullScreenApi: false, // try to open AJAX-ZOOM at browsers fullscreen mode, possible on modern browsers except IE and mobile
			axZmCallBacks: {}, // AJAX-ZOOM has several callbacks, http://www.ajax-zoom.com/index.php?cid=docs#onBeforeStart
			thumbW: 50, // gallery thumb width
			thumbH: 80, // gallery thumb height
			quality: 90, // quality of the preview image
			qualityZoom: 80, // quality of the zoom image shown in the flyout window
			adjustContainer: false, // auto adjust parent container height
			
			mouseOverZoomParam: {
				position: 'right', // Position of the flyout zoom window, possible values: 'inside', 'top', 'right', 'bottom', 'left'
				posAutoInside: 150, // applies when width (left, right) or height (top, bottom) of zoom window are less than this px value (zoomWidth || zoomHeight are set to auto); if zoomWidth || zoomHeight are fixed, applies when zoom window is out of page border
				autoFlip: 200, //  flip right to left and bottom to top if less than int px or false to disable
				biggestSpace: false, // Overrides position option and instantly chooses the direction, disables autoFlip; playes nicely when zoomWidth and zoomHeight are set to 'auto'
				zoomFullSpace: false, // Uses full screen height (does not align to the map / disables adjustY) if position is right or left || uses full screen width (does not align to the map / disables adjustX) if position is top or bottom
				
				zoomWidth: 530, // width of the zoom window e.g. 540 or 'auto'
				zoomHeight: 450, // height of the zoom window e.g. 375, or 'auto'!
				
				autoMargin: 15, // if zoomWidth or zoomHeight are set to 'auto', the margin to the edge of the screen
				adjustX: 15, // horizontal margin of the zoom window
				adjustY: -1, // vertical margin of the zoom window
				
				lensOpacity: 0.30, // opacity of the selector lens
				zoomAreaBorderWidth: 1, // border thickness of the zoom window
				galleryFade: 300, // speed of inner fade or false
				shutterSpeed: 150, // speed of shutter fadein or false; applies only if image proportions are different from container
				showFade: 300, // speed of fade in for mouse over
				hideFade: 300, // speed of fade out for mouse over
				smoothMove: 6, // int bigger 1 indicates smoother movements; set 0 to disable
				tint: false, // color value around the lens or false
				tintOpacity: 0.5, // opacity of the area around the lens when tint is not false
				showTitle: true, // bool, enable / disable title on zoom window
				titleOpacity: 0.5, // opacity of the title container
				titlePosition: 'top', // position of the title, top or bottom
				cursorPositionX: 0.5, // cursor over lens  horizontal offset, 0.5 is middle
				cursorPositionY: 0.55, // cursor over lens vertical offset, 0.5 is middle
				touchClickAbort: 500, // Time after which click is aborted without touch movement and mousehover is initialized
				
				loading: true, // display loading information, CSS .mouseOverLoading
				loadingMessage: 'Loading...', // Loading message, not needed, can be just the spinner - see below
				loadingWidth: 90, // width of loading container 
				loadingHeight: 20, // height of loading container 
				loadingOpacity: 1.0, // opacity of the loading container (the transparent background is set via png image on default, see css class)
				
				onLoad: function(){},
				onImageChange: function(){},
				onMouseOver: function(){},
				onMouseOut: function(){},
				spinner: true, // use ajax loading spinner without gif files etc.
				spinnerParam: { // spinner options, for more info see: http://fgnass.github.com/spin.js/
					lines: 11, // The number of lines to draw
					length: 3, // The length of each line
					width: 3, // The line thickness
					radius: 4, // The radius of the inner circle
					corners: 1, // Corner roundness (0..1)
					rotate: 0, // The rotation offset
					color: '#FFFFFF', // #rgb or #rrggbb
					speed: 1, // Rounds per second
					trail: 90, // Afterglow percentage
					shadow: false, // Whether to render a shadow
					hwaccel: false, // Whether to use hardware acceleration
					className: 'spinner', // The CSS class to assign to the spinner
					zIndex: 2e9, // The z-index (defaults to 2000000000)
					top: 0, // Top position relative to parent in px
					left: 1 // Left position relative to parent in px
				}
			},
			
			// If fancybox is used in "ajaxZoomOpenMode" option, below are some fancybox options
			fancyBoxParam: {
				boxMargin: 0,
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
				boxOnComplete: function(){},
				boxTitleShow : false,
				boxTitlePosition : 'float', // 'float', 'outside', 'inside' or 'over'
				boxTitleFormat : null
			},
			
			// If colorbox is used in "ajaxZoomOpenMode" option, below are some Colorbox options
			colorBoxParam: {
				transition: "elastic",
				speed: 300,
				scrolling: true,
				title: true,
				opacity: 0.9,
				className: false,
				current: "image {current} of {total}",
				previous: "previous",
				next: "next",
				close: "close",
				onOpen: false,
				onLoad: false,
				onComplete: false,
				onClosed: false,
				overlayClose: true,
				escKey: true
			},
			
			// axZmThumbSlider parametrs if used - "galleryAxZmThumbSlider" option set to true
			galleryAxZmThumbSliderParam: {
 
			},
			
			data: {}
		};
		
		// Override defaults by user setting
		var op = $.extend(true, {}, defaults, options);
		

		// Try to get /axZm path instantly
		if (op.axZmPath == 'auto'){
			if ($.isFunction($.fn.axZm)){
				op.axZmPath = $.fn.axZm.installPath();
			}else{
				alert('jquery.axZm.js is not loaded');
				return;
			}
		}

		// Helper function
		function getl(sep, str){
			return str.substring(str.lastIndexOf(sep)+1);
		}
		
		// Helper function
		function getf(sep, str){
			var extLen = getl(sep, str).length;
			return str.substring(0, (str.length - extLen - 1));
		}

		// Get ref to instance
		var divID = $('#'+op.divID);
		
		// Clean data
		divID.data('aZ', '').empty();
		
		// Check existence
		if (divID.length <= 0){
			alert('Element with ID '+op.divID+' was not found.');
			return;
		}

		// Define width and height of the small image. 
		// Can be set explicitly or determined instantly
		var w = op.width == 'auto' ? divID.innerWidth() : op.width;
		var h = op.height == 'auto' ? divID.innerHeight() : op.height;
		
		// Adjust width/height of the intance div
		var prevW = divID.width();
		var prevH = divID.height();
		
		if (op.width != 'auto'){
			divID.css('width', w);
		}
		
		if (op.height != 'auto'){
			divID.css('height', h);
		}
		
		// Unique ID 
		var uniqueZoomID = 'zoom_' + Math.floor(Math.random()*999999) + new Date().getTime(); 
		
		
		// Gallery there?
		var showGallery = false;
		if (op.galleryDivID && $('#'+op.galleryDivID).length != -1){
			showGallery = true;
		}
		
		// No gallery at all? Create some ID for the "virtual" gallery...
		if (!op.galleryDivID){
			op.galleryDivID = 'gal_'+uniqueZoomID;
		}
		
		// Function to generate the paths to the images
		var imageSrc = function(num, kind){
			var imageServer = op.axZmPath+'zoomLoad.php?previewPic=';
			var path = '';
			if (op.images[num]){
				var v = op.images[num];
				if (v[kind]){
					path = v[kind];
				}else{
					if (kind == 'zoom'){
						path = imageServer+getl('/', v['img'])+'&previewDir='+getf('/', v['img'])+'&qual='+op.qualityZoom+'&width='+op.mouseOverZoomWidth+'&height='+op.mouseOverZoomHeight;
					} else if (kind == 'preview'){
						path = imageServer+getl('/', v['img'])+'&previewDir='+getf('/', v['img'])+'&qual='+op.quality+'&width='+w+'&height='+h;
					} else if (kind == 'thumb'){
						path = imageServer+getl('/', v['img'])+'&previewDir='+getf('/', v['img'])+'&qual='+op.quality+'&width='+op.thumbW+'&height='+op.thumbH;
					}
					path = path.split(' ').join('%20');
				}
			}
			return path;
		};

		// Preload images
		if (op.preloadMouseOverImages){
			op.mouseOverZoomParam.preloadGalleryImages = function(){
				if (op.preloadMouseOverImages == 'oneByOne'){
					preloadMouseOverImage = function(num){
						if (op.images[num]){
							
							$('<img>').attr('src', imageSrc(num, 'preview'));
							$('<img>').load(function(){
								if (op.images[num+1]){
									preloadMouseOverImage(num+1);
								}
							}).attr('src', imageSrc(num, 'zoom'));
						}
					}
					preloadMouseOverImage(1);
				}else{
					var nnn = 1;
					$.each(op.images, function(k, v){
						
						if (k != op.firstImageToLoad){
							nnn ++;
							setTimeout(function(){
								$('<img>').attr('src', imageSrc(num, 'zoom'));
								$('<img>').attr('src', imageSrc(num, 'preview'));
							}, nnn * 100);
						}
					});
				}
			};
		}
		
		// Function to create mouseover zoom html
		var initMouseOverZoom = function(num){
			var a = $('<a />')
			.addClass('mouseOverImg')
			.data('zoomid', num)
			.attr({
				href: imageSrc(num, 'zoom'),
				id: uniqueZoomID
			});
			
			$('<img>').attr({
				'src': imageSrc(num, 'preview'),
				'title': op.images[num]['title'],
				'border': 0
			}).css('opacity', 0).appendTo(a);
			
			a.appendTo(divID);
		};
	
		// Show gallery
		if (showGallery && !op.galleryAxZmThumbSlider){
			$('#'+op.galleryDivID).css({display: 'block'});
		}

		// Cutom function to what happens when the user clicks on the lens
		jQuery.fn[uniqueZoomID] = function(event){
			event.stopPropagation();
			var thisZoomID = $('#'+uniqueZoomID).data('zoomid');
	
			window.fullScreenStartSplash = {
				enable: true,
				className: false,
				opacity: 1
			};
			
			// Select the proper image if gallery image has been switched in AJAX-ZOOM
			var onBoxesClose = function(){
				if ($.axZm){
					$('.mouseOverThumb:eq('+($.axZm.zoomID-1)+')', '#'+op.galleryDivID).trigger('click');
					
					if (showGallery && op.galleryAxZmThumbSlider && $.isFunction($.fn.axZmThumbSlider)){
                        var posOnClick =  $('#'+op.galleryDivID).data('axZmThumbSlider').opt.posOnClick;
                        if (!posOnClick){
                        	$('#'+op.galleryDivID).axZmThumbSlider('scrollTo', $.axZm.zoomID);
						}
					}				
				}
			};
			
			
			// Open AJAX-ZOOM as fullscreen
			if (op.ajaxZoomOpenMode == 'fullscreen'){
				var aZcallBacks = $.extend(true, {}, op.axZmCallBacks);
				aZcallBacks.onFullScreenClose = onBoxesClose;
				$.fn.axZm.openFullScreen(op.axZmPath, 'zoomID='+thisZoomID+'&zoomData='+allImages+'&example='+op.example, aZcallBacks, 'window', op.fullScreenApi, false);
			} 
			
			// Open AJAX_ZOOM as modified / responsive Fancybox
			else if (op.ajaxZoomOpenMode == 'fancyboxFullscreen'){
				
				if (!$.isFunction($.openAjaxZoomInFancyBox)){
					alert('Please include following scripts in the head section:\n\n/axZm/plugins/demo/jquery.fancybox/jquery.fancybox-1.3.4.css \n/axZm/plugins/demo/jquery.fancybox/jquery.fancybox-1.3.4.pack.js \n/axZm/extensions/jquery.axZm.openAjaxZoomInFancyBox.js \n\nImportant: it has to be adjusted Fancybox from AJAX-ZOOM package!\n');
					return false;
				}
			
				if (op.fancyBoxParam.boxMargin < 30){
					op.fancyBoxParam.boxMargin = 30;
				}

				var aZcallBacks = $.extend(true, {}, op.axZmCallBacks);
				
				var thisParam = {
					axZmPath: op.axZmPath,
					queryString: 'example='+op.exampleFancyboxFullscreen+'&zoomID='+thisZoomID+'&zoomData='+allImages,
					fullScreenApi: op.fullScreenApi,
					ajaxZoomCallbacks: op.axZmCallBacks,
					boxOnClosed: onBoxesClose				
				};
				
				$.openAjaxZoomInFancyBox($.extend(true, {}, thisParam, aZcallBacks));
			} 
			
			// Open AJAX_ZOOM in regular Fancybox
			else if (op.ajaxZoomOpenMode == 'fancybox'){
				
				$('#axZmTempBody, #axZmWrap').axZmRemove(true);
				var axZmWrap = $('<div />').css({display: 'none'}).attr('id', 'axZmWrap').appendTo('body');

				// Trigger fancybox
				var onStart = function(){
					axZmWrap.css('display','');
 					
					// fancyBoxParam
					var thisParam = {
						showNavArrows: false,  
						enableKeyboardNav: false,  
						hideOnContentClick: false, 
						scrolling: 'no', 
						width: 'auto', 
						height: 'auto', 
						autoScale: false, 
						autoDimensions: true,
						href: '#axZmWrap',
						titleShow: true,
						title: op.fancyBoxParam.boxTitleShow ? (op.images[thisZoomID]['title'] || 'Image No. '+thisZoomID) : null,
						onClosed: function(){
							onBoxesClose();
							$.fn.axZm.spinStop();
							$.fn.axZm.remove();
							$('#axZmTempBody').axZmRemove(true);
							$('#axZmTempLoading').axZmRemove(true);
							$('#axZmWrap').axZmRemove(true);
						}		
					};	
					
					var fancyBoxParam = {};
					
					$.each(op.fancyBoxParam, function(k, v){
						k = k.substr(3);
						fancyBoxParam[k.charAt(0).toLowerCase() + k.slice(1)] = v;
					});
					
					$.fancybox($.extend(true, {}, fancyBoxParam, thisParam));
				};
				
				// Change title
				var onImageChange = function(){
					if (op.fancyBoxParam.boxTitleShow){
						if (op.images[$.axZm.zoomID]['title']){
							$('#fancybox-title-float-main').html(op.images[$.axZm.zoomID]['title']);
						}else{
							$('#fancybox-title').html('Image No. '+$.axZm.zoomID);
						}
						
						$('#fancybox-title').css('left', $('#fancybox-wrap').outerWidth()/2 - $('#fancybox-title').outerWidth()/2);
					}					
				};
				
				var aZcallBacks = $.extend(true, {}, op.axZmCallBacks);
				
				aZcallBacks.onStart = onStart;
				aZcallBacks.onImageChange = onImageChange;
				
				$.fn.axZm.load({
					opt: aZcallBacks,
					path: op.axZmPath,
					parameter: 'zoomID='+thisZoomID+'&zoomData='+allImages+'&example='+op.exampleFancybox,
					divID: 'axZmWrap'
				});
				
				
			} 
			
			// Open AJAX_ZOOM in Colorbox
			else if (op.ajaxZoomOpenMode == 'colorbox'){ 
				
				$('#axZmTempBody, #axZmWrap').axZmRemove(true);
				var axZmWrap = $('<div />').css({display: 'none'}).attr('id', 'axZmWrap').appendTo('body');
				
				var onStart = function(){
					axZmWrap.css('display','');
 
					var thisParam = {
						opacity: 0.9,
						initialWidth: 300,
						initialHeight: 300,
						preloading: false,
						scrolling: false,
						scrollbars: false,
						title: op.colorBoxParam.title ? op.images[thisZoomID]['title'] : false,
						onCleanup: function(){
							onBoxesClose();
							$.fn.axZm.spinStop();
							$.fn.axZm.remove();
							$('#axZmTempBody').axZmRemove(true);
							$('#axZmTempLoading').axZmRemove(true);
							$('#axZmWrap').axZmRemove(true);					
						},
						inline: true,
						href: '#axZmWrap',
						ajax: false
					};
					
					$.colorbox($.extend(true, {}, op.colorBoxParam, thisParam));
					
				};

				var onImageChange = function(){
					if (op.colorBoxParam.title){
						if (op.images[$.axZm.zoomID]['title']){
							$('#cboxTitle').html(op.images[$.axZm.zoomID]['title']);
						}else{
							$('#cboxTitle').html('');
						}
					}					
				};
				
				var aZcallBacks = $.extend(true, {}, op.axZmCallBacks);
				
				aZcallBacks.onStart = onStart;
				aZcallBacks.onImageChange = onImageChange;
 
				$.fn.axZm.load({
					opt: aZcallBacks,
					path: op.axZmPath,
					parameter: 'zoomID='+thisZoomID+'&zoomData='+allImages+'&example='+op.exampleFancybox,
					divID: 'axZmWrap'
				});					
			
			} 
			
			// Custom
			else if ($.isFunction(op.ajaxZoomOpenMode)){
				if (op.data.axZmCallbacks){
					$.extend(op.data.axZmCallbacks, op.axZmCallBacks);
				}else{
					op.data.axZmCallbacks = $.extend(true, {}, op.axZmCallBacks);
				}

				op.data.zoomID = thisZoomID;				
				op.ajaxZoomOpenMode(op.data);
			}
			
			else{
				alert('Sorry, but at this point there are no other mods than (AJAX-ZOOM) "fullscreen", "fancyboxFullscreen" and "fancybox".');
			}
			
			$('.mouseOverTrap', '#'+uniqueZoomID).trigger('mouseout');
		};
		
		// Put thumbnails (generated by AJAX-ZOOM or not) into axZmThumbSlider container
		// All thumbnails can be created on the fly while loading first time
		var allImages = '', 
			galContainer,
			ul = $('<ul />');
		
		// Gallery
		if (showGallery){
 			galContainer = $('#'+op.galleryDivID).empty();
		}
		// Virtual gallery
		else{
			galContainer = $('<div />').attr('id', op.galleryDivID);
		}
		
		// Add images to the gallery, virtual or not
		$.each(op.images, function(k, v){
			allImages += v['img'] + '|';

			var li = $('<li />'),
				div = $('<div />'),
				relBind;
			
			// If there was an gallery container and it exists in the dom too
			if (showGallery && op.galleryAxZmThumbSlider){
				// Thumb image
				var img = $("<img src='"+imageSrc(k, 'thumb')+"'>");
				
				// Add image to UL, UL will be added later to galContainer
				li.addClass('mouseOverThumb').append(img).appendTo(ul);
				
				relBind = li;
			}
			else if (showGallery && !op.galleryAxZmThumbSlider){
				// Thumb image
				var img = $("<img src='"+imageSrc(k, 'thumb')+"'>");
				
				// Append images to a div wrapper and then to galContainer
				div.addClass('mouseOverThumb mouseOverThumbWrap').append(img).appendTo(galContainer);
				
				relBind = div;
			}	
			else{
				// Thumb image itself is not needed
				var img = $("<div />").addClass('mouseOverThumb');
				
				relBind = img
			}
			
			// Bind data and so on
			relBind.attr({
				id: uniqueZoomID+'_'+k, 
				//href: imageSrc(k, 'zoom'),
				title: op.images[k]['title']
			})
			.data('href', imageSrc(k, 'zoom'))
			.data('relZoom', uniqueZoomID)
			.data('zoomid', k)
			.data('smallImage', imageSrc(k, 'preview'))
			.bind('click', function(){
				$('#'+uniqueZoomID).data('previd', $('#'+uniqueZoomID).data('zoomid'));
				$('#'+uniqueZoomID).data('zoomid', k);
				$('#'+uniqueZoomID+' img').attr('title', v.title || '');
			});
 
		});
		
		if (showGallery && op.galleryAxZmThumbSlider){
			galContainer.removeData('axZmThumbSlider').append(ul);
		}
		
		if (!showGallery){
			galContainer.css('display', 'none').appendTo('body');
		}

		// This is for AJAX-ZOOM zoomData query string parameter
		allImages = allImages.substring(0, allImages.length-1);

		divID.data('aZ', op);

		$(document).ready(function () {
			// Draw html
			initMouseOverZoom(op.firstImageToLoad);
			
			// Init mousehover
			$('#'+uniqueZoomID).axZmMouseOverZoom(op.mouseOverZoomParam);
			
			
			// Process thumbs
			$.each(op.images, function(k, v){
				$('#'+uniqueZoomID+'_'+k).axZmMouseOverZoom(op.mouseOverZoomParam);
			});
			

			// Init axZmThumbSlider
			if (showGallery && op.galleryAxZmThumbSlider && $.isFunction($.fn.axZmThumbSlider)){
				var defaultAxZmThumbSliderParam = {
					firstThumb: op.firstImageToLoad,
					firstThumbPos: 'middle', 
					firstThumbTriggerClick:	false, 
					firstThumbHighlight: true 
				};

				// Init axZmThumbSlider
				$('#'+op.galleryDivID).axZmThumbSlider($.extend(true, {}, op.galleryAxZmThumbSliderParam, defaultAxZmThumbSliderParam));
			}
			
			if (op.adjustContainer){
				var hhh = 10;
				setTimeout(function(){
					$.each($('#'+op.divID).parent().children(), function(){
						hhh += $(this).outerHeight();
					});
					
					$('#'+op.divID).parent().css('height', hhh);
				}, 100);
				
			}
			
		});
		
	};

	$.mouseOverZoomInit.getParam = function(obj){
		var ref = $('#'+obj);
		if (ref.length > 0){
			return ref.data('aZ');
		}
		return {};
	};
	
	$.fn.mouseOverZoomInit = function(options){
		if (this.jquery){
			$.mouseOverZoomInit(options);
		}else{
			return this.each(function(){
				if ($(this).attr('id')){
					options.divID = $(this).attr('id');
				}
				$.mouseOverZoomInit(options);
			});
		}
	};
	
})(jQuery);
jQuery(document).ready(function ($) {
	var sliderFinalWidth = 400,
		maxQuickWidth = 900;
	$('.cd-trigger').on('click', function (event) {
		var selectedImage = $(this).parent('.cd-item').children('img'),
			slectedImageUrl = selectedImage.attr('src');
		$('body').addClass('overlay-layer');
		animateQuickView(selectedImage, sliderFinalWidth, maxQuickWidth, 'open');
		updateQuickView(slectedImageUrl);
	});
	$('body').on('click', function (event) {
		if ($(event.target).is('.cd-close') || $(event.target).is('body.overlay-layer')) {
			closeQuickView(sliderFinalWidth, maxQuickWidth);
		}
	});
	$(document).keyup(function (event) {
		if (event.which == '27') {
			closeQuickView(sliderFinalWidth, maxQuickWidth);
		}
	});
	$('.cd-slider-navigation a').on('click', function () {
		updateSlider($(this));
	});
	$(window).on('resize', function () {
		if ($('.cd-quick-view').hasClass('is-visible')) {
			window.requestAnimationFrame(resizeQuickView);
		}
	});

	function updateSlider(navigation) {
		var sliderConatiner = navigation.parents('.cd-slider-wrapper').find('.cd-slider'),
			activeSlider = sliderConatiner.children('.selected').removeClass('selected');
		if (navigation.hasClass('cd-next')) {
			(!activeSlider.is(':last-child')) ? activeSlider.next().addClass('selected'): sliderConatiner.children('li').eq(0).addClass('selected');
		} else {
			(!activeSlider.is(':first-child')) ? activeSlider.prev().addClass('selected'): sliderConatiner.children('li').last().addClass('selected');
		}
	}

	function updateQuickView(url) {
		$('.cd-quick-view .cd-slider li').removeClass('selected').find('img[src="' + url + '"]').parent('li').addClass('selected');
	}

	function resizeQuickView() {
		var quickViewLeft = ($(window).width() - $('.cd-quick-view').width()) / 2,
			quickViewTop = ($(window).height() - $('.cd-quick-view').height()) / 2;
		$('.cd-quick-view').css({
			"top": quickViewTop,
			"left": quickViewLeft,
		});
	}

	function closeQuickView(finalWidth, maxQuickWidth) {
		var close = $('.cd-close'),
			activeSliderUrl = close.siblings('.cd-slider-wrapper').find('.selected img').attr('src'),
			selectedImage = $('.empty-box').find('img');
		if (!$('.cd-quick-view').hasClass('velocity-animating') && $('.cd-quick-view').hasClass('add-content')) {
			selectedImage.attr('src', activeSliderUrl);
			animateQuickView(selectedImage, finalWidth, maxQuickWidth, 'close');
		} else {
			closeNoAnimation(selectedImage, finalWidth, maxQuickWidth);
		}
	}

	function animateQuickView(image, finalWidth, maxQuickWidth, animationType) {
		var parentListItem = image.parent('.cd-item'),
			topSelected = image.offset().top - $(window).scrollTop(),
			leftSelected = image.offset().left,
			widthSelected = image.width(),
			heightSelected = image.height(),
			windowWidth = $(window).width(),
			windowHeight = $(window).height(),
			finalLeft = (windowWidth - finalWidth) / 2,
			finalHeight = finalWidth * heightSelected / widthSelected,
			finalTop = (windowHeight - finalHeight) / 2,
			quickViewWidth = (windowWidth * .8 < maxQuickWidth) ? windowWidth * .8 : maxQuickWidth,
			quickViewLeft = (windowWidth - quickViewWidth) / 2;
		if (animationType == 'open') {
			parentListItem.addClass('empty-box');
			$('.cd-quick-view').css({
				"top": topSelected,
				"left": leftSelected,
				"width": widthSelected,
			}).velocity({
				'top': finalTop + 'px',
				'left': finalLeft + 'px',
				'width': finalWidth + 'px',
			}, 1000, [400, 20], function () {
				$('.cd-quick-view').addClass('animate-width').velocity({
					'left': quickViewLeft + 'px',
					'width': quickViewWidth + 'px',
				}, 300, 'ease', function () {
					$('.cd-quick-view').addClass('add-content');
				});
			}).addClass('is-visible');
		} else {
			$('.cd-quick-view').removeClass('add-content').velocity({
				'top': finalTop + 'px',
				'left': finalLeft + 'px',
				'width': finalWidth + 'px',
			}, 300, 'ease', function () {
				$('body').removeClass('overlay-layer');
				$('.cd-quick-view').removeClass('animate-width').velocity({
					"top": topSelected,
					"left": leftSelected,
					"width": widthSelected,
				}, 500, 'ease', function () {
					$('.cd-quick-view').removeClass('is-visible');
					parentListItem.removeClass('empty-box');
				});
			});
		}
	}

	function closeNoAnimation(image, finalWidth, maxQuickWidth) {
		var parentListItem = image.parent('.cd-item'),
			topSelected = image.offset().top - $(window).scrollTop(),
			leftSelected = image.offset().left,
			widthSelected = image.width();
		$('body').removeClass('overlay-layer');
		parentListItem.removeClass('empty-box');
		$('.cd-quick-view').velocity("stop").removeClass('add-content animate-width is-visible').css({
			"top": topSelected,
			"left": leftSelected,
			"width": widthSelected,
		});
	}
});




/* ****** UTM TRACKING CODE: BEGIN ********* */
function getCookie(e){for(var t=e+"=",i=decodeURIComponent(document.cookie).split(";"),r=0;r<i.length;r++){for(var o=i[r];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(t))return o.substring(t.length,o.length)}return""}var UtmCookie;UtmCookie=function(){function e(e){null==e&&(e={}),this._cookieNamePrefix="_uc_",this._domain=e.domain,this._sessionLength=e.sessionLength||1,this._cookieExpiryDays=e.cookieExpiryDays||365,this._additionalParams=e.additionalParams||[],this._utmParams=["utm_source","utm_medium","utm_campaign","utm_term","utm_content"],this.writeInitialReferrer(),this.writeLastReferrer(),this.writeInitialLandingPageUrl(),this.setCurrentSession(),this.additionalParamsPresentInUrl()&&this.writeAdditionalParams(),this.utmPresentInUrl()&&this.writeUtmCookieFromParams()}return e.prototype.createCookie=function(e,t,i,r,o,n){var a,s,m,l,d,u;u=null,i&&((d=new Date).setTime(d.getTime()+24*i*60*60*1e3),u=d),s=null!=u?"; expires="+u.toGMTString():"",m=null!=r?"; path="+r:"; path=/",a=null!=o?"; domain="+o:"",l=null!=n?"; secure":"",document.cookie=this._cookieNamePrefix+e+"="+escape(t)+s+m+a+l},e.prototype.readCookie=function(e){var t,i,r,o;for(o=this._cookieNamePrefix+e+"=",i=document.cookie.split(";"),r=0;r<i.length;){for(t=i[r];" "===t.charAt(0);)t=t.substring(1,t.length);if(0===t.indexOf(o))return t.substring(o.length,t.length);r++}return null},e.prototype.eraseCookie=function(e){this.createCookie(e,"",-1,null,this._domain)},e.prototype.getParameterByName=function(e){var t,i,r;return e=e.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]"),i="[\\?&]"+e+"=([^&#]*)",t=new RegExp(i),(r=t.exec(window.location.search))?decodeURIComponent(r[1].replace(/\+/g," ")):""},e.prototype.additionalParamsPresentInUrl=function(){var e,t,i,r;for(e=0,t=(r=this._additionalParams).length;t>e;e++)if(i=r[e],this.getParameterByName(i))return!0;return!1},e.prototype.utmPresentInUrl=function(){var e,t,i,r;for(e=0,t=(r=this._utmParams).length;t>e;e++)if(i=r[e],this.getParameterByName(i))return!0;return!1},e.prototype.writeCookie=function(e,t){this.createCookie(e,t,this._cookieExpiryDays,null,this._domain)},e.prototype.writeAdditionalParams=function(){var e,t,i,r,o;for(e=0,t=(r=this._additionalParams).length;t>e;e++)i=r[e],o=this.getParameterByName(i),this.writeCookie(i,o)},e.prototype.writeUtmCookieFromParams=function(){var e,t,i,r,o;for(e=0,t=(r=this._utmParams).length;t>e;e++)i=r[e],o=this.getParameterByName(i),this.writeCookie(i,o)},e.prototype.writeCookieOnce=function(e,t){this.readCookie(e)||this.writeCookie(e,t)},e.prototype._sameDomainReferrer=function(e){var t;return t=document.location.hostname,e.indexOf(this._domain)>-1||e.indexOf(t)>-1},e.prototype._isInvalidReferrer=function(e){return""===e||void 0===e},e.prototype.writeInitialReferrer=function(){var e;e=document.referrer,this._isInvalidReferrer(e)&&(e="direct"),this.writeCookieOnce("referrer",e)},e.prototype.writeLastReferrer=function(){var e;e=document.referrer,this._sameDomainReferrer(e)||(this._isInvalidReferrer(e)&&(e="direct"),this.writeCookie("last_referrer",e))},e.prototype.writeInitialLandingPageUrl=function(){var e;(e=this.cleanUrl())&&this.writeCookieOnce("initial_landing_page",e)},e.prototype.initialReferrer=function(){return this.readCookie("referrer")},e.prototype.lastReferrer=function(){return this.readCookie("last_referrer")},e.prototype.initialLandingPageUrl=function(){return this.readCookie("initial_landing_page")},e.prototype.incrementVisitCount=function(){var e,t,i;e="visits",t=parseInt(this.readCookie(e),10),i=1,i=isNaN(t)?1:t+1,this.writeCookie(e,i)},e.prototype.visits=function(){return this.readCookie("visits")},e.prototype.setCurrentSession=function(){var e;e="current_session",this.readCookie(e)||(this.createCookie(e,"true",this._sessionLength/24,null,this._domain),this.incrementVisitCount())},e.prototype.cleanUrl=function(){var e;return e=window.location.search.replace(/utm_[^&]+&?/g,"").replace(/&$/,"").replace(/^\?$/,""),window.location.origin+window.location.pathname+e+window.location.hash},e}();var UtmForm,_uf;UtmForm=function(){function e(e){null==e&&(e={}),this._utmParamsMap={},this._utmParamsMap.utm_source=e.utm_source_field||"USOURCE",this._utmParamsMap.utm_medium=e.utm_medium_field||"UMEDIUM",this._utmParamsMap.utm_campaign=e.utm_campaign_field||"UCAMPAIGN",this._utmParamsMap.utm_content=e.utm_content_field||"UCONTENT",this._utmParamsMap.utm_term=e.utm_term_field||"UTERM",this._additionalParamsMap=e.additional_params_map||{},this._initialReferrerField=e.initial_referrer_field||"IREFERRER",this._lastReferrerField=e.last_referrer_field||"LREFERRER",this._initialLandingPageField=e.initial_landing_page_field||"ILANDPAGE",this._visitsField=e.visits_field||"VISITS",this._addToForm=e.add_to_form||"all",this._formQuerySelector=e.form_query_selector||"form",this.utmCookie=new UtmCookie({domain:e.domain,sessionLength:e.sessionLength,cookieExpiryDays:e.cookieExpiryDays,additionalParams:Object.getOwnPropertyNames(this._additionalParamsMap)}),"none"!==this._addToForm&&this.addAllFields()}return e.prototype.addAllFields=function(){var e,t,i,r;i=this._utmParamsMap;for(t in i)e=i[t],this.addFormElem(e,this.utmCookie.readCookie(t));r=this._additionalParamsMap;for(t in r)e=r[t],this.addFormElem(e,this.utmCookie.readCookie(t));this.addFormElem(this._initialReferrerField,this.utmCookie.initialReferrer()),this.addFormElem(this._lastReferrerField,this.utmCookie.lastReferrer()),this.addFormElem(this._initialLandingPageField,this.utmCookie.initialLandingPageUrl()),this.addFormElem(this._visitsField,this.utmCookie.visits())},e.prototype.addFormElem=function(e,t){var i,r,o,n,a;if(t&&(i=document.querySelectorAll(this._formQuerySelector)).length>0)if("first"===this._addToForm)(r=i[0]).insertBefore(this.getFieldEl(e,t),r.firstChild);else for(n=0,a=i.length;a>n;n++)(o=i[n]).insertBefore(this.getFieldEl(e,t),o.firstChild)},e.prototype.getFieldEl=function(e,t){var i;return i=document.createElement("input"),i.type="hidden",i.name=e,i.value=t,i},e}(),_uf=window._uf||{},window.UtmForm=new UtmForm(_uf);
/* ****** UTM TRACKING CODE: END *********** */

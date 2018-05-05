require(['jquery'], function(jQuery) {
jQuery(function(){
	initCustomSelect();
	initSearchText();
	initAddClassRadio();
	initTouchFooterNav();
	initDropClose();
	initSlides();
	initDivRemover();
	initLoadMore();
});

// initCustomSelect()
function initCustomSelect() {
	var	customSelect	=	'.custom-select';
	var	customTrigger	=	jQuery(customSelect).find('.slide ul li a, .slide-select ul li a');
	
	customTrigger.click(function(e) {
		e.preventDefault();
		
		var	selectedValue	=	jQuery(this).html();
		
		jQuery(this).parents(customSelect).find('.opener .select-text').html(selectedValue);
		jQuery(this).parents(customSelect).find('.opener-select .select-text').html(selectedValue);
		jQuery(this).parent('li').siblings('li').removeClass('selected');
		jQuery(this).parent('li').addClass('selected');
		
		jQuery(this).parents(customSelect).removeClass('active').addClass('value-selected');
		jQuery(this).parents(customSelect).find('.slide, .slide-select').slideUp();
		
		if ( jQuery(this).parents(customSelect).is('.active') ) {
			return (false);
		} else {
			jQuery(this).parents(customSelect).find('.slide, .slide-select').addClass('js-slide-hidden');
		}
	});
}

// initSearchText()
function initSearchText() {
	var	selectText	=	jQuery('.search-list a');
	
	selectText.click(function(e) {
		e.preventDefault();
		
		var	textTrigger	=	jQuery(this).html();
		
		jQuery(this).parents('.search-area').find('[type="search"]').val(textTrigger);
	});
}

// initAddClassRadio()
function initAddClassRadio() {
	var		radioTrigger	=	jQuery('#lightbox1 label'); //[for="search-radio"]
	
	radioTrigger.click(function() {
		
		if (  jQuery(this).attr('for') === 'search-radio' ) {
			jQuery('#lightbox1 .search-holder').addClass('active');
		} else {
			jQuery('#lightbox1 .search-holder').removeClass('active');
		}
		
		
	});
}

// initTouchFooterNav()
function initTouchFooterNav() {
	var 	classtrigger	=	'.footer-nav h3';
	
	jQuery(classtrigger).click(function() {
		
		if ( jQuery(this).parent('.footer-nav').is('.open') ) {
			jQuery(this).parent('.footer-nav').removeClass('open');
		} else {
			jQuery(this).parents('.footer-aside').find('.footer-nav.open').removeClass('open');
			jQuery(this).parent('.footer-nav').addClass('open');
		}
		
		
	});
}

// initDropClose
function initDropClose() {
	var 	btnTrigger		=		'.btn-drop-close';
	
	jQuery(btnTrigger).click(function(e) {
		e.preventDefault();
		
		jQuery(this).parents('.has-drop-down.hover').removeClass('hover');
	});
}

// initSlides()
function initSlides() {
	var	firstLevelLink	=	'.first-level > li > a';
	var	SecondLevelLink	=	'.second-level > li > a';
	
	// first level slide
	jQuery(firstLevelLink).click(function() {
		jQuery(this).parents('.catalog ').siblings('.heading').children('.btn-back').addClass('active');
		jQuery(this).parents('.slideset').addClass('slide-active').animate({
			'margin': '0 0 0 -100%',
		});
	});
	
	// second level slide
	jQuery(SecondLevelLink).click(function() {
		jQuery(this).parents('.catalog ').siblings('.heading').children('.btn-back').addClass('active');
		jQuery(this).parents('.slideset').addClass('slide-active').animate({
			'margin': '0 0 0 -200%',
		});
	});
	
	// first level back
	var	firstLevelBtnBack	=	'.first-level-btn-back';
	jQuery(firstLevelBtnBack).click(function(e) {
		e.preventDefault();
		jQuery(this).removeClass('active');
		jQuery(this).parents('.slideset').animate({
			'margin': '0',
		});
	});
	
	// second level back
	var	secondLevelBtnBack	=	'.second-level-btn-back';
	jQuery(secondLevelBtnBack).click(function(e) {
		e.preventDefault();
		jQuery(this).removeClass('active');
		jQuery(this).parents('.slideset').animate({
			'margin': '0 0 0 -100%',
		});
	});
}

// initDivRemover()
function initDivRemover() {
	var	removerTrigger	=	'.btn-close';
	
	jQuery(removerTrigger).click(function(e) {
		e.preventDefault();
		
		var 	blockRemover	=	jQuery(this).attr('data-close');
		
		jQuery(this).parent(blockRemover).remove();
		jQuery(this).parents(blockRemover).remove();
	});
	
}

// initLoadMore();
function initLoadMore() {
	var		parentBlock		=		'.load-more';
	var		loadBlock		  =		'.list';
	var		loadOpener		 =		jQuery(parentBlock).find('.btn-load-more');
	
	
	jQuery(loadOpener).click(function(e) {
		e.preventDefault();
		
		
		jQuery(this).parent(parentBlock).find('.list.active').next().addClass('active').slideDown();
		
		
	});
	
}
});
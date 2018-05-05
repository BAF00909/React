<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DO CTYPE html>
<html class="loader">
<head>
	<?$APPLICATION->ShowHead()?>
	<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/../rpgu-main/images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<style>html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0;overflow-x:hidden}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:700}dfn{font-style:normal}h1{font-size:2em;margin:.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-.5em}sub{bottom:-.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}nav ul,ul[class],.slideshow .pagination ul,.counter-list,.bullet-list{margin:0;padding:0;list-style:none}.clearfix:after,.container:after,.row:after,.post-tab header:after,.filters-area .slide .slide-holder:after,.result-search .head:after,#lightbox1 .head:after{content:'';display:block;clear:both}.ellipsis{white-space:nowrap;text-overflow:ellipsis;overflow:hidden}[class^="icon-"],[class*=" icon-"]{font-family:'icomoon'!important;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:2.3;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}[class^="icon-"]:before,[class*=" icon-"]:before{display:inline-block;min-height:1em;min-width:1em;background-position:50% 50%;background-repeat:no-repeat;background-size:contain}.icon-check:before{content:"\e954"}.icon-ext_link_white:before{content:"\e951"}.icon-cross .path1:before{content:"\e952";color:#f3b23d}.icon-cross .path2:before{content:"\e953";margin-left:-1em;color:#dc3e54}.icon-arrow-circle .path1:before{content:"\e94e";color:#fff}.icon-arrow-circle .path2:before{content:"\e94f";margin-left:-1em;color:#dbe2e6}.icon-arrow-circle .path3:before{content:"\e950";margin-left:-1em;color:#576472}.icon-help .path1:before{content:"\e949";color:#e6ebec}.icon-help .path2:before{content:"\e94a";margin-left:-1.0126953125em;color:#fff}.icon-help .path3:before{content:"\e94b";margin-left:-1.0126953125em;color:#ea405a}.icon-help .path4:before{content:"\e94c";margin-left:-1.0126953125em;color:#ea405a}.icon-icon10:before{content:"\e92f"}.icon-icon11:before{content:"\e930"}.icon-icon12:before{content:"\e931"}.icon-icon13:before{content:"\e932"}.icon-icon14:before{content:"\e933"}.icon-icon15:before{content:"\e934"}.icon-icon16:before{content:"\e935"}.icon-icon17:before{content:"\e936"}.icon-icon18:before{content:"\e937"}.icon-icon19:before{content:"\e938"}.icon-icon20:before{content:"\e939"}.icon-icon21:before{content:"\e93a"}.icon-icon22:before{content:"\e93b"}.icon-icon23 .path1:before{content:"\e93c";color:#768089}.icon-icon23 .path2:before{content:"\e93d";margin-left:-1em;color:#768089}.icon-icon23 .path3:before{content:"\e93e";margin-left:-1em;color:#fff}.icon-icon23 .path4:before{content:"\e93f";margin-left:-1em;color:#768089}.icon-icon23 .path5:before{content:"\e940";margin-left:-1em;color:#fff}.icon-icon23 .path6:before{content:"\e941";margin-left:-1em;color:#768089}.icon-icon23 .path7:before{content:"\e942";margin-left:-1em;color:#768089}.icon-icon23 .path8:before{content:"\e943";margin-left:-1em;color:#768089}.icon-icon23 .path9:before{content:"\e944";margin-left:-1em;color:#768089}.icon-icon23 .path10:before{content:"\e945";margin-left:-1em;color:#768089}.icon-icon23 .path11:before{content:"\e946";margin-left:-1em;color:#768089}.icon-icon24:before{content:"\e947"}.icon-icon25:before{content:"\e948"}.icon-arrow-down:before,.icon-chevron-down-gray:before{content:"\e92c"}.icon-zoom_white_desk:before{content:"\e900"}.icon-zoom_blur:before{content:"\e901"}.icon-telegram .path1:before{content:"\e902";color:#929595}.icon-telegram .path2:before{content:"\e903";margin-left:-1em;color:#fff}.icon-social_vk:before{content:"\e904"}.icon-social_tw:before{content:"\e905"}.icon-social_inst:before{content:"\e907"}.icon-social_instagram{margin-top:3px}.icon-social_instagram:hover svg{fill:#0173C1;stroke:#0173C1}.icon-social_tw2:before{content:"\e906"}.icon-social_fb:before{content:"\e907"}.icon-slider_arrow_sq_rh .path1:before{content:"\e908";color:#fbfbfb}.icon-slider_arrow_sq_rh .path2:before{content:"\e909";margin-left:-1em;color:#0963ae}.icon-slider_arrow_sq_lh .path1:before{content:"\e90a";color:#fbfbfb}.icon-slider_arrow_sq_lh .path2:before{content:"\e90b";margin-left:-1em;color:#0963ae}.icon-logo_nobeta .path1:before{content:"\e90c";color:#ee3f58}.icon-logo_nobeta .path2:before{content:"\e90d";margin-left:-6.33984375em;color:#0065b1}.icon-key_new:before{content:"\e90e"}.icon-icon9 .path1:before{content:"\e90f";color:#768089}.icon-icon9 .path2:before{content:"\e910";margin-left:-.853515625em;color:#768089}.icon-icon9 .path3:before{content:"\e911";margin-left:-.853515625em;color:#768089}.icon-icon9 .path4:before{content:"\e912";margin-left:-.853515625em;color:#768089}.icon-icon9 .path5:before{content:"\e913";margin-left:-.853515625em;color:#fff}.icon-icon9 .path6:before{content:"\e914";margin-left:-.853515625em;color:#768089}.icon-icon9 .path7:before{content:"\e915";margin-left:-.853515625em;color:#fda729}.icon-icon9 .path8:before{content:"\e916";margin-left:-.853515625em;color:#fff}.icon-icon9 .path9:before{content:"\e917";margin-left:-.853515625em;color:#fff}.icon-icon8:before{content:"\e918"}.icon-icon7:before{content:"\e919"}.icon-icon6:before{content:"\e91a"}.icon-icon5:before{content:"\e91b"}.icon-icon4:before{content:"\e91c"}.icon-icon3:before{content:"\e91d"}.icon-icon2:before{content:"\e91e"}.icon-icon1:before{content:"\e91f"}.icon-gos_logo_mobile .path1:before{content:"\e920";color:#ef3e58}.icon-gos_logo_mobile .path2:before{content:"\e921";margin-left:-.9111328125em;color:#ef3e58}.icon-gos_logo_mobile .path3:before{content:"\e922";margin-left:-.9111328125em;color:#ef3e58}.icon-gos_logo_mobile .path4:before{content:"\e923";margin-left:-.9111328125em;color:#ef3e58}.icon-gos_logo_mobile .path5:before{content:"\e924";margin-left:-.9111328125em;color:#ef3e58}.icon-gos_logo_mobile .path6:before{content:"\e925";margin-left:-.9111328125em;color:#ef3e58}.icon-gos_logo_mobile .path7:before{content:"\e926";margin-left:-.9111328125em;color:#0f67b1}.icon-gos_logo_mobile .path8:before{content:"\e927";margin-left:-.9111328125em;color:#0f67b1}.icon-gos_logo_mobile .path9:before{content:"\e928";margin-left:-.9111328125em;color:#0f67b1}.icon-gos_logo_mobile .path10:before{content:"\e929";margin-left:-.9111328125em;color:#000}.icon-closed:before{content:"\e92a"}.icon-arrow_east_white:before{content:"\e92b"}.icon-home:before{content:"\e94d"}.icon-open:before{content:"\e92e"}.icon-map-marker:before{content:"\e92d"}.icon-arrowCategory:before{content:'';background-image:url(../Img/nut_arrow.svg)}.icon-arrow-right:before{content:"\e92b"}html{box-sizing:border-box}html.body-lock{height:100%;overflow-y:scroll}html.body-lock body{overflow:hidden;height:100%}*,:before,:after{box-sizing:inherit}*{max-height:1000000px}a,button,[type]{-webkit-transition:all linear .25s;transition:all linear .25s;text-decoration:none}img{max-width:100%;height:auto}.gm-style img{max-width:none}[style*=background-],[style^=background-]{background-size:cover;background-position:50% 50%;background-repeat:no-repeat}.container{margin:0 auto;padding:0 10px;max-width:1200px}.row{margin:0 -10px}.col-1{width:8.3333333333333%}.col-2{width:16.666666666667%}.col-3{width:25%}.col-4{width:33.333333333333%}.col-5{width:41.666666666667%}.col-6{width:50%}.col-7{width:58.333333333333%}.col-8{width:66.666666666667%}.col-9{width:75%}.col-10{width:83.333333333333%}.col-11{width:91.666666666667%}.col-12{width:100%}[class*=col-],[class^=col-]{float:left;padding-left:10px;padding-right:10px}</style>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>	
	<!--<link rel="stylesheet" href="/bitrix/templates/rpgu-main/Parts/Style/style.css">
	<link rel="stylesheet" href="/bitrix/templates/rpgu-main/Parts/Style/bvi.min.css">-->

	<?
		$APPLICATION->SetAdditionalCSS("/bitrix/templates/rpgu-main/Parts/Style/style.css");
		$APPLICATION->SetAdditionalCSS("/bitrix/templates/rpgu-main/Parts/Style/bvi.min.css");
		$APPLICATION->AddHeadScript('<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/jquery.1.11.3.js');
		$APPLICATION->AddHeadScript('<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/responsivevoice.min.js');
		$APPLICATION->AddHeadScript('<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/bvi.min.js');
		$APPLICATION->AddHeadScript('<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/bvi-panel.min.js');
	?>

	<!--<script src="<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/jquery.1.11.3.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/responsivevoice.min.js"> </script>
	<script src="<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/bvi.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/../rpgu-main/Parts/Script/bvi-panel.min.js"></script>-->
</head>
<body>
<!-- bundle -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/rpgu-main/Portal/commonHtml.html");?>

<?$APPLICATION->ShowPanel();?> 
	<div id="wrapper">
		<h1 class="hidden">Госуслуги</h1>
		<!-- topbar -->
		<div class="topbar-holder">
			
			<!-- top-bar -->
			<div class="top-bar">
				<div class="container">
				
					<!-- dropdown-holder -->
					<strong class="logo-svg pull-left"></strong>
					
					<!-- dropdown -->					
					<div class="open-close dropdown pull-left" id="nvxUserSelect">					
						<a class="opener">
							<span data-bind="text: activeType"></span>
							<i class="icon-arrow-down"></i>
						</a>
						<div class="slide">
							<ul class="list-unstyled">
								<!-- ko foreach: availTypes -->
								<li>
									<a data-bind="click: $parent.changeType, text: title"></a>
								</li>
								<!-- /ko -->
							</ul>
						</div>
					</div>

					<span class="vertion-control pull-left">
						<a href="#" class="bvi-panel-open" onclick="return false;">Версия для слабовидящих</a>
					</span>
					
					<!-- civi-picker -->
					<!----><!--<div class="civi-picker open-close custom-select pull-right">
						<a href="#" class="opener">
							<span class="select-text">
								<i class="flag-russia"></i>
								<span class="text">RUS</span>
							</span>
							<i class="icon-arrow-down"></i>
						</a>
						<div class="slide">
							<ul class="list-unstyled">
								<li><a href="#"><i class="flag-uk"></i> GBR</a></li>
								<li><a href="#"><i class="flag-germany"></i> GER</a></li>
								<li><a href="#"><i class="flag-france"></i> FRA</a></li>
								<li class="selected"><a href="#"><i class="flag-russia"></i> RUS</a></li>
							</ul>
						</div>
					</div>-->
					
					<!-- locationButton -->
					<div id="nvxCurrentLocation">
						<a href="#lightbox1" class="locationButton pull-right lightbox" data-bind="click: showSelectLocations"><i class="icon-map-marker"></i> <span data-bind="text: locationBaseText">Выберите район</span></a>
					</div>
				</div>
			</div>
			
			<!-- header -->
			<header id="header">
				<div class="container">
					
					<div class="logo-holder">
						<!-- logo -->
						<h1 class="logo pull-left"><a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/../rpgu-main/images/logo_svg.svg" alt="Госуслуги"></a></h1>
						
						<!-- opener -->
						<a href="#" class="nav-opener"><span></span></a>
						
						<!-- topbar-opener -->
						<a href="#" class="topbar-opener pull-right"><i class="icon-open"></i></a>
					</div>
					
					<!-- main navigation -->
					<nav id="nav" class="pull-left">
						<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "top-2-lvl",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "top_menu"
	),
	false
);?>
					</nav>
					<div id="nvxAuth">
						<!-- ko if: userLoggedStatus() == false -->
							<a data-bind="click: click" class="btn-link pull-right"><i class="icon-key_new"></i><span data-bind="text: loginButtonTitle">Личный кабинет</span></a>
						<!-- /ko -->
						<!-- ko if: userLoggedStatus -->
							<a data-bind="click: showMenu" class="btn-link pull-right">
								<span data-bind="text: currentUserName"></span>
								<img src="<?=SITE_TEMPLATE_PATH?>/. ./rpgu-main/Parts/Img/blue_dw_arrow.svg" style="width: 13px;">
								<i class="icon-key_new"></i>
							</a>
							<div class="auth-submenu" data-bind="visible: submenuVisible" style="display: none">
								<a class="auth-submenu-item" href="/cabinet/">Личный кабинет</a>
								<a class="auth-submenu-item" data-bind="click: click" href="#">Выйти</a>
							</div>							
						<!-- /ko -->
						<input id="userLoggedStatus" type="hidden" data-bind="value: userLoggedStatus">
					</div>
				</div>
				
				<!-- form-search -->
		<?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"nvx-mainsearch", 
	array(
		"PAGE" => "#SITE_DIR#search/index.php",
		"USE_SUGGEST" => "Y",
		"COMPONENT_TEMPLATE" => "nvx-mainsearch"
	),
	false
);?>
			</header>
			
		</div>
		
		<a href="#" class="form-overlay form-opener"></a>
		
		<div class="slider-area">


<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"nvx-breadcrumb", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"COMPONENT_TEMPLATE" => "nvx-breadcrumb"
	),
	false
);?>
		</div>
		
		
		<div class="article">
		
<section class="news-wrapper container">

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"nvx_system_message",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "948",
		"IBLOCK_TYPE" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"ServiceURL",1=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "nvx_system_message"
	)
);?>

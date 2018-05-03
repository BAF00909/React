<!DOCTYPE html>
<!-- saved from url=(0046)http://bootstrap.imazin.ru/examples/jumbotron/ -->
<html lang="en">
<head>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>

	<?$APPLICATION->ShowMeta("keywords")?>
	<?$APPLICATION->ShowMeta("description")?>

	<?$APPLICATION->ShowHead()?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?$APPLICATION->ShowTitle()?></title>

	
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
	<!--<link href='http://mfc31.ru/fonts/PT+Sans+Narrow.css' rel='stylesheet' type='text/css'>-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=cyrillic-ext,latin' rel='stylesheet' type='text/css'>
	<!--<link href='http://mfc31.ru/fonts/Open+Sans.css' rel='stylesheet' type='text/css'>-->
    <!-- Bootstrap core CSS -->
    <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="<?=SITE_TEMPLATE_PATH?>/Parts/Style/style.css" rel="stylesheet">
    <link href="<?=SITE_TEMPLATE_PATH?>/css/template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=SITE_TEMPLATE_PATH?>/js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <!-- <script src="<?//=SITE_TEMPLATE_PATH?>/js/jquery.min.js"></script> -->

	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.11.2.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/addresses.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/filter.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/record.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/send_teh_q.js"></script> 
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"> </script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.placeholder.js"></script>    

<script type="text/javascript">
  $(document).ready(function(){
$('input, textarea').placeholder();
	var url=document.location.href;
	/* $.each($(".marker_into"),function(){
	  if(this.href==url){$(this).addClass('active');};
	});
	$.each($(".dropdown"),function(){
	  if(url.indexOf(this.href)+1){$(this).addClass('active');};
	}); */
	$.each($(".marker_into"),function(){
	  if(this.href==url){$(this).addClass('active');};
	});
	$.each($(".marker"),function(){
	  if(url.indexOf(this.href)+1){$(this).addClass('active');};
	});
	$.each($(".marker_into"),function(){
	  if(url.indexOf(this.href)+1){$(this).addClass('active');};
	});
	$(".marker_into").click( function() {
		if($(this).text()=="Ведомства") this.href=this.href+"?tags="+localStorage.getItem('0');
		if($(this).text()=="Физическим лицам" || $(this).text()=="Юридическим лицам") this.href=this.href+"%2C"+localStorage.getItem('0');
	});
	$(".marker_into").click( function() {
		if ($(this).text()=="Физическим лицам" || $(this).text()=="Юридическим лицам") this.href=this.href+"%2C"+localStorage.getItem('0');
		if ($(this).text()=="Новостная лента") this.href=this.href+"?arrFilter_pf%5Btown%5D="+localStorage.getItem('0')+"&set_filter=Фильтр&set_filter=Y";   
	});
	$(".left_service").click( function() {
		if($(this).text()!="Проверка предварительной записи" && $(this).text()!="Проверка предварительной записи на день") this.href=this.href+"%2C"+localStorage.getItem('0');
	});
	
	$.each($("a"),function(){
	  if(this.href=="http://"+window.location.hostname+"/pressroom/news/detail/"){$(this).hide();};
	});

	});

    </script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/modernizr.min.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/css3-mediaqueries.js"></script>   
<!--<script src="<?//=SITE_TEMPLATE_PATH?>/js/ie-emulation-modes-warning.js"></script>-->
    
    <script src="<?=SITE_TEMPLATE_PATH?>/js/html5shiv.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/respond.js"></script>

	</head>

  <body>

	<?$APPLICATION->ShowPanel();?>
	<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/mfc44/Portal/commonHtml.html");?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-8 header-top-nav-bar">  

				<div id="nvxCurrentLocation">
					<a href="#lightbox1"  class="locationButton lightbox" data-bind="click: showSelectLocations">
						<i class="geo-icon"></i> 
						<span class="location-text" data-bind="text: locationBaseText">Выберите район</span>
					</a>
				</div>
			
				<div id="nvxAuth">
							<!-- ko if: userLoggedStatus() == false -->
							<a data-bind="click: click" class="btn-link pull-right"><i class="icon-key_new"></i><span data-bind="text: loginButtonTitle">Личный кабинет</span></a>
							<!-- /ko -->
							<!-- ko if: userLoggedStatus -->
							<a data-bind="click: showMenu" class="btn-link pull-right">
								<span data-bind="text: currentUserName "></span>
							
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
	
	<div class="container">	
		<div class="row">

			<div class="col-md-4 pnull">
				<a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" class="pull-right logo img-responsive" alt="ГАУ БО "МФЦ""></a>
				<span class="subtitle">государственные<br>и муниципальные услуги</span>
			</div>

			<div class="col-md-8 header-bottom-nav-bar"> 
			<!--
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>
					  </div>
					  -->
					  <div class="navbar-collapse collapse pnull">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "top_part", array(
							"ROOT_MENU_TYPE" => "top_part",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MAX_LEVEL" => "2",
							"CHILD_MENU_TYPE" => "sub_top",
							"USE_EXT" => "N",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N"
							),
							false
						);?>
					  </div><!--/.nav-collapse -->
				<span class="title">
					Государственное автономное учреждение Белгородской области «Многофункциональный центр предоставления государственных и муниципальных услуг»
				
				</span>				
				<span class="contact-content">
					  <span class="geo-adress">30800, г. Белгрод, пр-т Славы, д. 25</span>
					  <span class="geo-phone">  Горячая линия +7-4722-42-42-42 </span>
					  <span class="maps-icon"></span><a href="#"><span class="maps-text" data-toggle="modal" data-target="#myModal">Как добраться</a></span>
				</span>
			</div>
		</div>	
		 
	</div> <!-- /container -->
		
		<div class="container">	
		<div class="row">
			<div class="col-md-4 pnull">
				<!--<a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" class="pull-right logo img-responsive" alt="ГАУ БО "МФЦ""></a>
				<span class="subtitle">государственные<br>и муниципальные услуги</span>-->
			</div>
			<div class="col-md-8 pnull title-box">

				<!--<span class="title">
					Государственное автономное учреждение Белгородской области<br>«Многофункциональный центр предоставления государственных и муниципальных услуг»
				
				</span>				
				<span class="contact-content">
					  <span class="geo-adress">30800, г. Белгрод, пр-т Славы, д. 25</span>
					  <span class="geo-phone">  Горячая линия +7-4722-42-42-42 </span>
					  <span class="maps-icon"></span><a href="#"><span class="maps-text" data-toggle="modal" data-target="#myModal">Как добраться</a></span>
				</span> -->
			          <span>
						<br><center><b>Внимание! Сайт находится в режиме наполнения!</b></center>
					</span>
			</div>
        </div>   
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Как добраться</h4>
			  </div>
			  <div class="modal-body" id="first_map">
			  <div id="cont_map"  style="width:500px; height:500px;"></div>
				<?/* $APPLICATION->IncludeComponent("bitrix:map.yandex.search", "ya_maps", array(
					"INIT_MAP_TYPE" => "MAP",
					"MAP_WIDTH" => "600",
					"MAP_HEIGHT" => "500",
					"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:55.73830000000000239879227592609822750091552734375;s:10:\"yandex_lon\";d:37.5945999999999997953636921010911464691162109375;s:12:\"yandex_scale\";i:17;}",
					"CONTROLS" => array(
						0 => "TYPECONTROL",
						1 => "SCALELINE",
					),
					"OPTIONS" => array(
						0 => "ENABLE_DRAGGING",
					),
					"MAP_ID" => ""
					),
					false
				); */?>
			  </div>
			  
			</div>
		  </div>
		</div>
		
		
		
		<div class="row main-content">
			<div class="col-md-4 pnull">
				<div class="main-left-nav">
				<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_part", 
	array(
		"ROOT_MENU_TYPE" => "sub_top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_THEME" => "site"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "N"
	)
);?>
				</div>
				<div class="main-left-nav" id="for_record">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left_submenu",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
<div id="left_info" class="banner-block">
	<div id="first_string">Спланируйте Ваш визит в МФЦ.<a href="http://mfc44.ru/predvaritelnaya-zapis"><p><img src="/upload/docs/otchet/запись.jpg"></p></a></div>
		<div id="second_string"></div>
	</div>
	<? if ($APPLICATION->GetCurPage(false) === '/predvaritelnaya-zapis/' || $APPLICATION->GetCurPage(false) === '/services/service/' || $APPLICATION->GetCurPage(false) === '/services/departments/'): ?> 
		<div id="left_info" class="main-left-nav">
			<div id="first_string">Запишитесь онлайн на приём в мфц</div>
			<div id="second_string">Запись на услуги осуществляется строго только на текущий и следующий месяц</div>
		</div>
	<? endif; ?> 
			</div>
		</div>
<div class="col-md-8 pnull">
<? if ($APPLICATION->GetCurPage(false) !== '/'): ?> 
<h1><?$APPLICATION->ShowTitle(false)?></h1>
<? endif; ?> 

	<?$APPLICATION->IncludeComponent(
	 "bitrix:breadcrumb",
	 "",
	 Array(
	 )
	);?>
<script type="text/javascript"> var mkgu_widget_param = { id: 136};</script>
<script type="text/javascript" src="https://vashkontrol.ru/widget2-js/mkgu_widget.js"></script>
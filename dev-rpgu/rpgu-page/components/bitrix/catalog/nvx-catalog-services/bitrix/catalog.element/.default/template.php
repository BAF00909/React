<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$templateLibrary = array('popup');
$currencyList = '';
if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BASIS_PRICE' => $strMainID.'_basis_price',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'BASKET_ACTIONS' => $strMainID.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);
?>
<div class="container search-page <? echo $templateData['TEMPLATE_CLASS']; ?>" id="<? echo $arItemIDs['ID']; ?>">

<?
if ('Y' == $arParams['DISPLAY_NAME'])
{
?>
<div class="container detail-info">
	<h2><? 	echo ( 		isset($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] != ''
		? $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]
		: $arResult["NAME"] ); ?>
	</h2>
				
	<div class="result-search">		
			<nav class="tabset">
				<ul>
			<li class="active"><a href="#qury-tab1">Описание</a></li>
			<li><a href="#qury-tab2">Документы</a></li>
			<li><a href="#qury-tab3">Дополнительная информация</a></li>
		</ul>
			</nav>
			<div class="queries">
					
						<!-- qury-tab1 -->
						<div id="qury-tab1">
							
							<div class="load-more">
								<div class="list-holder">
								<ul class="accordion-list">
									
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["TAKESERVICE"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Как получить услугу<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["TAKESERVICE"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["PRICEANDPAY"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Стоимость и порядок оплаты<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["PRICEANDPAY"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									
									<? if (!empty($arResult["DISPLAY_PROPERTIES"]["HOWLONGSERVICE"]["DISPLAY_VALUE"])){?> 
									<li class="open-close-open">
										<a href="#" class="opener">Сроки оказания услуги<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["HOWLONGSERVICE"]["DISPLAY_VALUE"]?></div>
									</li><? } ?>
									
									<? if (!empty($arResult["DISPLAY_PROPERTIES"]["SERVICCUSTOMERS"]["DISPLAY_VALUE"])){?> 
									<li class="open-close-open">
										<a href="#" class="opener">Категории получателей<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["SERVICCUSTOMERS"]["DISPLAY_VALUE"]?>	</div>
									</li><? } ?>
									
									<? if (!empty($arResult["DISPLAY_PROPERTIES"]["REASONFORSERVICE"]["DISPLAY_VALUE"])){?> 
									<li class="open-close-open">
										<a href="#" class="opener">Основание для оказания услуги, основания для отказа<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["REASONFORSERVICE"]["DISPLAY_VALUE"]?></div>
									</li><? } ?>
									
									<? if (!empty($arResult["DISPLAY_PROPERTIES"]["SERVICERESULT"]["DISPLAY_VALUE"])){?> 
									<li class="open-close-open">
										<a href="#" class="opener">Результат оказания услуги<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["SERVICERESULT"]["DISPLAY_VALUE"]?></div>
									</li><? } ?>
									
									<? if (!empty($arResult["DISPLAY_PROPERTIES"]["CONSULTVALUE"]["DISPLAY_VALUE"])){?> 
									<li class="open-close-open">
										<a href="#" class="opener">Сведения о консультировании<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["CONSULTVALUE"]["DISPLAY_VALUE"]?>
</div>
									</li><? } ?>
								</ul>
								
								</div>
							</div>
						</div>
						
						<!-- qury-tab2 -->
						<div id="qury-tab2">
							
							<div class="load-more">
								<div class="list-holder">
									<ul class="accordion-list">
										
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["DOCSFORSERVICE"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Документы, необходимые для получения услуги<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["DOCSFORSERVICE"]["DISPLAY_VALUE"]?>
										</div>
										</li><? } ?>
									
									
										
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["DOCSAFTERSERVICE"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Документы, предоставляемые по завершении оказания услуги<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["DOCSAFTERSERVICE"]["DISPLAY_VALUE"]?>
										</div>
										</li><? } ?>
									</ul>
								</div>
							</div>
						</div>
						
						<!-- qury-tab3 -->
						<div id="qury-tab3">
							<div class="load-more">
								<div class="list-holder">
									<ul class="accordion-list">
										
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["ABOUTCONSULT"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Сведения о консультировании<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["ABOUTCONSULT"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									
									<? if (!empty($arResult["DISPLAY_PROPERTIES"]["ORDERAPPEAL"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Порядок обжалования<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["ORDERAPPEAL"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									
									
									
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["PARTORG"]["DISPLAY_VALUE"])){?>
<li class="open-close-open">
										<a href="#" class="opener">Участвующие организации<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">											
<?=$arResult["DISPLAY_PROPERTIES"]["PARTORG"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["REGULDOCSSERVICE"]["DISPLAY_VALUE"])){?>
<li class="open-close-open">
										<a href="#" class="opener">Нормативно-правовые акты<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">											
<?=$arResult["DISPLAY_PROPERTIES"]["REGULDOCSSERVICE"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									
											<? if (!empty($arResult["DISPLAY_PROPERTIES"]["RIGTANDDUTOFFICIALS"]["DISPLAY_VALUE"])){?> 
											<li class="open-close-open">
										<a href="#" class="opener">Права и обязанности должностных лиц при осуществлении государственного контроля<i class="icon-arrow-circle"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></a>
										<div class="slide">
<?=$arResult["DISPLAY_PROPERTIES"]["RIGTANDDUTOFFICIALS"]["DISPLAY_VALUE"]?>
										</div>
									</li><? } ?>
									</ul>	
								</div>
							</div>
						</div>
						</div>
		</div>


	</div>
<?
}

?>
	<div class="clb"></div>
</div>

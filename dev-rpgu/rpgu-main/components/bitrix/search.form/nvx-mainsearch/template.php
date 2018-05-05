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
$this->setFrameMode(true);?>
					
<form action="<?=$arResult["FORM_ACTION"]?>" class="form-search-slider">
	
<div class="container">
						<a href="#" class="form-opener pull-right"><i class="icon-closed"></i></a>
						<div class="field-holder">
			<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"nvx-suggestinput",
				array(
					"NAME" => "q",
					"VALUE" => "",
					"INPUT_SIZE" => 15,
					"DROPDOWN_SIZE" => 10,
				),
				$component, array("HIDE_ICONS" => "Y")
			);?>
		<?else:?>
		<input type="search" class="form-control" placeholder="что вы ищете?" name="q" value="" /><?endif;?>
		<button type="submit" class="btn"><i class="icon-zoom_blur"></i> <?=GetMessage("BSF_T_SEARCH_BUTTON");?></button>
	</div>
</div>
</form>

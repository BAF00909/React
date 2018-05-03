<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
$(document).ready (function () {
document.getElementById("news_href").href=document.getElementById("news_href").href+"?arrFilter_pf%5Btown%5D="+localStorage.getItem('0')+"&set_filter=Фильтр&set_filter=Y";
})
</script>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="col-md-12 pnull">
	<h2 class="section-title"><a class="news_href" id="news_href" href="/pressroom/news/">Новости</a> </h2>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<?if(!$arItem["PREVIEW_PICTURE"]["SRC"]):?>	

	<div class="col-md-4">
		
		<p class="news-item--date" style="margin-top: 20px;">
			<? $arDATE = ParseDateTime($arItem["DISPLAY_ACTIVE_FROM"], FORMAT_DATETIME);
  			echo $arDATE["DD"].".".$arDATE["MM"].".".$arDATE["YYYY"]; ?>
		</p>

		<a class="news-item--title-container" href="/pressroom/news/detail/?ELEMENT_ID=<?echo $arItem['ID']?>">
			<?if(iconv_strlen($arItem["NAME"]) > 44): ?>
			<p class="news-item--title"><?echo mb_strimwidth($arItem["NAME"],0,44,'...') ?></p>
			<?else:?>
			<p class="news-item--title"><?echo $arItem["NAME"] ?></p>
			<?endif?>
		</a>
		
		<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

			<?if(iconv_strlen($arItem["PREVIEW_TEXT"]) > 200): ?>
			<?echo mb_strimwidth($arItem["PREVIEW_TEXT"],0,200,'...') ?>
			<?else:?>
			<?echo $arItem["PREVIEW_TEXT"] ?>
			<?endif?>

		</div>

		<p class="read-more"><a href="/pressroom/news/detail/?ELEMENT_ID=<?echo $arItem['ID']?>">Подробнее ></a></p>
	</div>

	<?else:?>

	<div class="col-md-4">
		<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>"> 
			<img class="preview_picture img-responsive" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
		</div>

		<p class="news-item--date">
			<? $arDATE = ParseDateTime($arItem["DISPLAY_ACTIVE_FROM"], FORMAT_DATETIME);
  			echo $arDATE["DD"].".".$arDATE["MM"].".".$arDATE["YYYY"]; ?>
		</p>

		<a class="news-item--title-container" href="/pressroom/news/detail/?ELEMENT_ID=<?echo $arItem['ID']?>">
			<?if(iconv_strlen($arItem["NAME"]) > 44): ?>
			<p class="news-item--title"><?echo mb_strimwidth($arItem["NAME"],0,44,'...') ?></p>
			<?else:?>
			<p class="news-item--title"><?echo $arItem["NAME"] ?></p>
			<?endif?>
        </a>

		<p class="read-more"><a href="/pressroom/news/detail/?ELEMENT_ID=<?echo $arItem['ID']?>">Подробнее ></a></p>
	</div>

	<?endif;?>
			
	<?endforeach;?>
</div>
</div>
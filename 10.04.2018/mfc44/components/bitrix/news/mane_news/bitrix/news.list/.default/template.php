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
	<div class="news-item">
		
		<p class="news-item--date">
			<? 
			$_monthsList = array(
				"01" => "января",
				"02" => "февраля",
				"03" => "марта",
				"04" => "апреля",
				"05" => "мая",
				"06" => "июня",
				"07" => "июля",
				"08" => "августа",
				"09" => "сентября",
				"10" => "октября",
				"11" => "ноября",
				"12" => "декабря"
			  );
			$arDATE = ParseDateTime($arItem["DISPLAY_ACTIVE_FROM"], FORMAT_DATETIME);
			  echo $arDATE["DD"]. " " .$_monthsList[$arDATE["MM"]]. " " .$arDATE["YYYY"]; 
			  ?>
		</p>

		<a class="news-item--title-container" href="/pressroom/news/detail/?ELEMENT_ID=<?echo $arItem['ID']?>">
			<?if(iconv_strlen($arItem["NAME"]) > 75): ?>
			<p class="news-item--title"><?echo mb_strimwidth($arItem["NAME"],0,75,'...') ?></p>
			<?else:?>
			<p class="news-item--title"><?echo $arItem["NAME"] ?></p>
			<?endif?>
        </a>

		<span class="read-more"><a href="/pressroom/news/detail/?ELEMENT_ID=<?echo $arItem['ID']?>">Подробнее ></a></span>
		<hr style="margin: 10px 0;">
	</div>
	
			
	<?endforeach;?>
</div>
</div>
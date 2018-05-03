<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$APPLICATION->AddHeadScript('<?=SITE_TEMPLATE_PATH?>/js/filter.js');
?>
<div class="instruction_title">Инструкция по предварительной записи</div>
 <div class="instruction">1. Выберите населенный пункт.  <br/>
 2. Нажмите кнопку "Записаться" в нужном для Вас ведомстве. </div>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
	<table class="data-table" cellspacing="0" cellpadding="2">
	<thead>
	</thead>
	<tbody>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if(!array_key_exists("HIDDEN", $arItem)):?>
				<tr>
					<td valign="top"><?=$arItem["NAME"]?>:</td>
					<td valign="top" style="display:none;"><?=$arItem["INPUT"]?></td>
					<td valign="top">
						<select size="1" name="town_list" id="foo">
							<option value="Волгореченск">Волгореченск</option>
							<option value="Нерехта">Нерехта</option>
							<option value="Судиславль">Судиславль</option>
							<option value="Буй">Буй</option>
							<option value="Галич">Галич</option>
							<option value="Макарьев">Макарьев</option>
							<option value="Мантурово">Мантурово</option>
							<option value="Шарья">Шарья</option>
							<option value="Боговарово">Боговарово</option>
							<option value="Кострома">Кострома</option>
							<option value="Красное-на-Волге">Красное-на-Волге</option>
							<option value="Антропово">Антропово</option>
							<option value="Островское">Островское</option>
							<option value="Солигалич">Солигалич</option>
							<option value="Нея">Нея</option>
							<option value="Чухлома">Чухлома</option>
							<option value="Вохма">Вохма</option>
							<option value="Кадый">Кадый</option>
							<option value="Кологрив">Кологрив</option>
							<option value="Межа">Межа</option>
							<option value="Павино">Павино</option>
							<option value="Парфеньево">Парфеньево</option>
							<option value="Поназырево">Поназырево</option>
							<option value="Пыщуг">Пыщуг</option>
							<option value="Сусанино">Сусанино</option>
						</select>
						<script type='text/javascript'>
					    (function () {
					        var wrapper = document.getElementById("foo"),
					        nodes = wrapper.getElementsByTagName("OPTION"),
					        len = nodes.length,
					        sorted = [];
					        while (nodes[0]) {
					            sorted.push(new String(nodes[0].value));
					            sorted[sorted.length-1].element = nodes[0];
					            wrapper.removeChild(nodes[0]);
					        }
					        sorted = sorted.sort();
					        for (var i = 0; i < len; i++) {
					            wrapper.appendChild(sorted[i].element);
					        }
					    })();
						</script>
				   </td>
				</tr>
			<?endif?>
		<?endforeach;?>
	</tbody>
	<tfoot style="display:none;">
		<tr>
			<td colspan="2">
				<input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" /><input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" /></td>
		</tr>
	</tfoot>
	</table>
</form>

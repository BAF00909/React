<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $USER;
if ($USER->IsAdmin() || in_array(6, $USER->GetUserGroupArray())): ?><div id="isAdmin" style="display:none"></div>
<?endif;//echo $arResult["PREVIEW_TEXT"];$try='12345'?>
<div class="instruction_title">Инструкция по предварительной записи  </div>

<div class="instruction">3. Выберите дату и время приема. Дата и время, на которые талоны отсутствуют, в списке не отображаются. <br/>
4. Заполните ФИО и e-mail (необязательно), на который Вам придет подтверждение записи. <br/>
5. Введите номер телефона, для связи с Вами, в случае необходимости сообщить Вам дополнительную информацию. <br/>
6. Запомните адрес МФЦ, дату и время посещения. <br/>
7. <a href="http://www.mfc44.ru/gositd.php">Реквизиты на оплату гоcпошлины.</a><br/>
</div>
<div class="instruction_footer">В случае если вы не можете подойти к указанному времени, просьба позвонить на горячую линию 8-800-200-10-38 </div>
<input type="hidden" value="<?echo $arResult["ID"];?>" id="hidden_ID">
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3 style="display:none"><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?//echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value): ?>
	<?php
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;?>
	<div id="prop">

	<?php foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
	

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<div id="<?php echo("field_".$arProperty["CODE"]) ?>"><?=$arProperty["DISPLAY_VALUE"];?></div>
		<?endif?>
		<br />
	<?endforeach;?>
	</div>
	<?php
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.calendar", 
	".default", 
	array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "",
		"MONTH_VAR_NAME" => "month",
		"YEAR_VAR_NAME" => "year",
		"WEEK_START" => "1",
		"SHOW_YEAR" => "Y",
		"SHOW_TIME" => "Y",
		"TITLE_LEN" => "0",
		"SHOW_CURRENT_DATE" => "Y",
		"SHOW_MONTH_LIST" => "Y",
		"NEWS_COUNT" => "0",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DATE_FIELD" => "DATE_ACTIVE_FROM",
		"TYPE" => "EVENTS",
		"SET_TITLE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
	<div class="add_time" data-toggle='modal' data-target='#addTimeModal'>Добавить строку расписания</div>
	<div id="block_day_message" style="display:none">К сожалению, запись на выбранный Вами день не осуществляется.</div>
	<div class="datetime_table"></div>
	<div id="thanks">Ваша заявка отправлена. Если Вы хотите отказаться, пожалуйста, обратитесь к нам по телефону 8-800-200-10-38</div>
	<div id="record_form">
	<div id="stop_record" style="display:none">Поля "Ф.И.О", "Email" и "Телефон" обязательны для заполнения</div>
	<div id="stop_email" style="display:none">Проверьте правильность ввода Email</div>
	<div id="stop_phone" style="display:none">Проверьте правильность ввода телефона</div>
	<div id="stop_compliance" style="display:none">Для отправки сообщения, нужно принять согласие на обработку персональных данных</div>
	<input type="text" id="fullname" placeholder="Ф.И.О." value="<? echo $USER->GetFullName();?>"/><br/>
	<input type="text" id="email" placeholder="Email" value="<? echo $USER->GetEmail();?>"/><br/>
	<?
	   $id=$USER->GetID();
	   $rsUser = CUser::GetByID($id);
	$arUser = $rsUser->Fetch();
    ?>
	<input type="text" id="phone" placeholder="Телефон" value="<? echo $arUser['PERSONAL_MOBILE'];?>"/><br/>
	<textarea id="comment" placeholder="Комментарий"></textarea><br/>
	<label>
		<input type="checkbox" id="compliance" value="compliance" style="height: 10px !important;">
		Согласие на обработку персональных данных.
		Продолжая пользование настоящим сайтом Вы выражаете своё согласие на обработку Ваших персональных данных. 
		Порядок обработки Ваших персональных данных, а также реализуемые требования к их защите, содержатся в <a href="/qa/Download/Politika_PD_%D0%9C%D0%A4%D0%A6.pdf" target="_blank">Политике в отношении обработки персональных данных.</a>
	</label> 
	<br/>
	<input type="submit" id="send_record" value="Записаться"/>
	<input type="hidden" id="hidden_day"/>
	<input type="hidden" id="hidden_month"/>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Удаление записи</h4>
		  </div>
		  <div class="modal-body" id="delete_alert">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" id="delete_button">Удалить</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="deleteTimeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="myModalLabel">Удаление строки расписания</h4>
		  </div>
		  <div class="modal-body" id="deleteTime_alert">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" id="deleteTime_button">Удалить</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="addTimeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title addTime_title" id="myModalLabel">Добавление строки расписания</h4>
		  </div>
		  <div class="modal-body">
		  <div class="instruction_add">Введите часы и минуты в соответсвующие поля:</div>
		  <input type="text" size="4" maxlength="2" id="add_hour"/><span class="add_hour_title"> ч   </span>
		  <input type="text" size="4" maxlength="2" id="add_minute"/><span class="add_minute_title"> м   </span>
		  <div  id="addTime_alert"></div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" id="addTime_button">Добавить</button>
		  </div>
		</div>
	  </div>
	</div>
</div>
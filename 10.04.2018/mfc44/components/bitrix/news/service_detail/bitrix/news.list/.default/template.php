<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
Date.prototype.daysInMonth = function() {
        return 33 - new Date(this.getFullYear(), this.getMonth(), 33).getDate();
    };
</script>

<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" /></a>
			<?else:?>
				<img class="preview_picture" border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<b><?//echo $arItem["NAME"]?></b><br />
			<?else:?>
				<b><?//echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?><br/>
			
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;?>
		<div class="prop" style="display:none">
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<div id="field_<?php echo $arProperty["CODE"]?>"><?=$arProperty["DISPLAY_VALUE"];?></div>
			<?else:?> 
			<div id="field_<?php echo $arProperty["CODE"]?>"><?=$arProperty["DISPLAY_VALUE"];?></div>
			<?endif?>
			<script>
			/* var str_code='<?php echo $arProperty["CODE"]?>';
			var val='<?echo $arProperty["DISPLAY_VALUE"];?>';
			switch (str_code) {
				case "finish": var finish=val.split(".",2); break;
				case "period": var period=val; break;
				case "start": {var time=val.split(".",2); var start=val.split(".",2); break;}
			} */
			</script>
			</small><br />
		<?endforeach;?>
		</div>
	</p>
	<a class="go_to_record" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">Записаться</a>
	<script>
		/* var m=new Date();
		var month=m.getMonth()+1;
		var day=m.getDate();
		var hour=m.getHours();
		var minute=m.getMinutes();
		var service='<?php echo $arItem["NAME"]?>';
		var hour_array=new Array(),
			minute_array=new Array();
		var hour_next=0,
			minute_next=0,
			day_next=0,
			month_next=0;
		var i=0;
		$.ajax({
			url: "/ajax.handler.php",
			type: "POST",
			data: "PAGE=record_search&day="+day+"&month="+month+"&hour="+hour+"&minute="+minute+"&service="+service,
			dataType:"json",
			async: false,
			success: function(data){
				//alert(data[0].id);
				while (parseInt(time[0])<parseInt(finish[0]) || parseInt(time[1])<parseInt(finish[1])) {
					hour_array[i]=time[0];
					minute_array[i]=time[1];
					if (parseInt(time[1])+period>60) {
						time[0]=parseInt(time[0])+1;
						if (60-parseInt(time[1])<period) {
							time[1]=period-(60-parseInt(time[1]));
						}
						else {
							time[1]=parseInt(time[1])+period;
						}
					}
					else
						if (60-parseInt(time[1])>period) {
							time[1]=parseInt(time[1])+period;
						}
						else {
							time[1]=period-(60-parseInt(time[1]));
							time[0]=parseInt(time[0])+1;
						}
					i++;
				}
				if (data.length==0) {  //alert(data);
					if (m.getDay()<5) {
						var j=0;
						var a=hour+(minute/100);
						if (a>(parseInt(finish[0])+(finish[1]/100))) {
							hour_next=start[0];
							minute_next=start[1];
							if (m.getDay()==4) {
								if ((day+3)>m.daysInMonth()) {
									day_next=(4)-(m.daysInMonth()-day);
									if (month=12) month_next=1;
									else month_next=month+1;
								}
								else {
									day_next=m.getDate()+3;
									month_next=month;
								}
							}
							else {
								if (day==m.daysInMonth()) {
									day_next=1;
									if (month=12) month_next=1;
									else month_next=month+1;
								}
								else {
									day_next=day+1;
									month_next=month;
								}
							}
						}
						else {
							while((a>(parseInt(hour_array[j])+(minute_array[j]/100)))||j<hour_array.length) {
								j++;
							}
							hour_next=hour_array[j];
							minute_next=minute_array[j];
							day_next=m.getDate();
							month.next=m.getMonth();
						}
					}
					else {
						hour_next=start[0];
						minute_next=start[1];
						if ((day+(7-m.getDay()))>m.daysInMonth()) {
							day_next=(7-m.getDay())-(m.daysInMonth()-day);
						}
						else {
							day_next=m.getDate()+(7-m.getDay());
						}
						if (month=12) month_next=1;
						else month_next=month+1;
						
					}
				}
				else {
					var start_day=data[0].day;
					var start_month=data[0].month;
					var busy_hour= new Array(),
						busy_minute= new Array(),
						free_time=new Array();
					var tmp_date= new Date();
					tmp_date.setMonth(start_month-1);
					tmp_date.setDate(start_day);
					while (free_time.length==0) {
						for(var i=0; i<data.length; i++) {
							if (data[i].day==start_day && data[i].month==start_month) {
								busy_hour[i]=data[i].hour;
								busy_minute[i]=data[i].minute;
							}
						}
						for (var t1=0; t1<hour_array.length; t1++){
							for (var t2=0; t2<busy_hour.length; t2++){
								if (hour_array[t1]!=busy_hour[t2] && minute_array[t1]!=busy_minute[t2])
									free_time.push(parseInt(hour_array[t1])+(minute_array[t1]/100));
							}
						}
						if (free_time.length==0) {
							if (tmp_date.getDay()==4) {
								if ((start_day+3)>tmp_date.daysInMonth()) {
										start_day=((4)-(tmp_date.daysInMonth()-start_day));
										if (start_month=12) start_month=1;
										else start_month=start_month+1;
								}
								else {
									start_day=tmp_date.getDate()+3;
									start_month=start_month;
								}
							}
							else {
								if (start_day==tmp_date.daysInMonth()) {
									start_day=1;
									if (start_month=12) start_month=1;
									else start_month=start_month+1;
								}
								else {
									start_day=start_day+1;
									start_month=start_month;
								}
							}
							tmp_date.setMonth(start_month-1);
							tmp_date.setDate(start_day);
						}
					}
					day_next=start_day;
					month_next=start_month;
					hour_next=free_time[0];
					minute_next="";
				}
				alert("день "+day_next+"."+month_next+" время "+hour_next+":"+minute_next);
			},
			error: function(jqxhr, status, errorMsg) {
				//alert("Статус: " + status + " Ошибка: " + errorMsg);
			}		
		});	 */
	</script>
	<hr>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

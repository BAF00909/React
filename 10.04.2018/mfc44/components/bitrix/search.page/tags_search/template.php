<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>
<script>
/* var dep_details = { "муниципальные%20услуги": "<a class='dep_detail_href' href='http://www.gradkostroma.ru/'>Администрация города Костромы. Официальный сайт</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 19.00,</div><div class='detaile_table_string'> суббота: 08.00 - 13.00, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Управление%20записи%20актов%20гражданского%20состояния%20Костромской%20области": "<a class='dep_detail_href' href='http://www.zags44.ru'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
					"Департамент%20транспорта%20и%20дорожного%20хозяйства%20Костромской%20области": "<a class='dep_detail_href' href='http://trans.adm44.ru/index.aspx'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Департамент%20природных%20ресурсов%20и%20охраны%20окружающей%20среды%20Костромской%20области": "<a class='dep_detail_href' href='http://dpr44.ru'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Департамент%20экономического%20развития%20Костромской%20области": "<a class='dep_detail_href' href='http://dep-economy44.ru'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Департамент%20имущественных%20и%20земельных%20отношений%20Костромской%20области": "<a class='dep_detail_href' href='http://dizo44.ru'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
					"Департамент%20по%20труду%20и%20занятости%20населения%20Костромской%20области": "<a class='dep_detail_href' href='http://dfgszn.kostroma.ru'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 19.00,</div><div class='detaile_table_string'> суббота: 08.00 - 13.00, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Департамент%20социальной%20защиты%20населения%20опеки%20и%20попечительства%20Костромской%20области": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
					"Пенсионный%20Фонд%20России": "<a class='dep_detail_href' href='http://www.pfrf.ru'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Управление%20Федеральной%20налоговой%20службы%20по%20Костромской%20области": "<a class='dep_detail_href' href='http://www.nalog.ru/rn44/'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Управление%20Федеральной%20службы%20по%20надзору%20в%20сфере%20защиты%20прав%20потребителей%20и%20благополучия%20человека%20в%20Костромской%20области": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
					"Управление%20Министерства%20внутренних%20дел%20Российской%20Федерации%20по%20Костромской%20области": "<a class='dep_detail_href' href='http://www.gibdd.ru'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
					"Управление%20Федеральной%20службы%20судебных%20приставов%20по%20Костромской%20области": "<a class='dep_detail_href' href='http://fssprus.ru'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
					"Государственная%20инспекция%20труда%20в%20Костромской%20области": "<a class='dep_detail_href' href='http://git44.rostrud.ru'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
					"Филиал%20ФГБУ%20«Федеральная%20кадастровая%20палата%20Росреестра»": "<a class='dep_detail_href' href='http://www.to44.rosreestr.ru'>Официальный сайт управления</a>",
					"УФМС%20России%20по%20Костромской%20области": "<a class='dep_detail_href' href='http://fms-k.ru'>Официальный сайт управления</a>",
					"ЕИРКЦ": "<a class='dep_detail_href' href='http://www.eirkc.ru'>Официальный сайт</a>",
					"ГП%20Костромаоблтехинвертаризация": "<a class='dep_detail_href' href='http://www.kobti.ru'>Официальный сайт</a>",
					"ФБТИ": "<a class='dep_detail_href' href='http://www.rosinv.ru'>Официальный сайт</a>"
	}
$(document).ready( function () {
	var url=document.location.href;
	$("#dep_details").html(dep_details[key]);
	for(var key in dep_details) {
	if (url.indexOf(key)+1)
		$("#dep_details").html(dep_details[key]);
	}
} Тут закоментировано добавлять вниз !!! */

var dep_details_Kostroma = {"dep_1": "<a class='dep_detail_href' href='http://www.gradkostroma.ru/' target='_blank'>Администрация города Костромы. Официальный сайт</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 19.00,</div><div class='detaile_table_string'> суббота: 08.00 - 13.00, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_2": "<a class='dep_detail_href' href='http://www.zags44.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_3": "<a class='dep_detail_href' href='http://trans.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_4": "<a class='dep_detail_href' href='http://dpr44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_6": "<a class='dep_detail_href' href='http://dizo44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_7": "<a class='dep_detail_href' href='http://dfgszn.kostroma.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 19.00,</div><div class='detaile_table_string'> суббота: 08.00 - 13.00, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_10": "<a class='dep_detail_href' href='http://www.nalog.ru/rn44/' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_15": "<a class='dep_detail_href' href='http://www.to44.rosreestr.ru' target='_blank'>Официальный сайт управления</a>",
							"dep_16": "<a class='dep_detail_href' href='http://fms-k.ru' target='_blank'>Официальный сайт управления</a>",
							"dep_25": "<a class='dep_detail_href' href='http://www.eirkc.ru' target='_blank'>Официальный сайт</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - четверг: 08.00 - 17.15, пятница:08.00-16.00, обед: 12.00-13.00</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>",
							"dep_26": "<a class='dep_detail_href' href='http://www.kobti.ru' target='_blank'>Официальный сайт</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_27": "<a class='dep_detail_href' href='http://www.rosinv.ru' target='_blank'>Официальный сайт</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div>"
}
var dep_details_Buy = { "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
						"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
						"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
						"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
						"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
						"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
						"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
						"dep_17": "<div class='detail_table'><span class='title_detail_table' > График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> перерыв: 12.00 - 13.00, </div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
						"dep_18": "<div class='detail_table'><span class='title_detail_table' > График приема:</span> <div class='detaile_table_string'>понедельник - среда: 10.00 - 12.00</div></div>"
}
var dep_details_Volgorechensk = {   "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
									"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
									"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 18.30,</div><div class='detaile_table_string'> суббота: 08.00 - 12.30, </div><div class='detaile_table_string'> воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
									"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
									"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
									"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
									"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>"
}
var dep_details_Manturovo = {   "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_10": "<a class='dep_detail_href' href='http://www.nalog.ru/rn44/' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
								"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
								"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_17": "<div class='detail_table'><span class='title_detail_table' > График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> перерыв: 12.00 - 13.00, </div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_18": "<div class='detail_table'><span class='title_detail_table' > График приема:</span> <div class='detaile_table_string'>понедельник, среда: 08.00 - 12.00</div></div>"
}
var dep_details_Makarev = { "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_17": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>среда: 10.00 - 12.00,</div></div>",
							"dep_18": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник-пятница: 10.00 - 12.30</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>"
}
var dep_details_Sudislavl = {   "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_15": "<a class='dep_detail_href' href='http://www.to44.rosreestr.ru' target='_blank'>Официальный сайт управления</a>",
								"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
								"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
								"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_18": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник-пятница: 08.00 - 17.00</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>"
}
var dep_details_Sharia = {  "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_10": "<a class='dep_detail_href' href='http://www.nalog.ru/rn44/' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_18": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник-пятница: 08.00 - 17.00</div><div class='detaile_table_string'> перерыв: 12.00 - 13.00</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>"
}
var dep_details_Bogovarovo = {  "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
								"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_19": "<a class='dep_detail_href' href='http://r44.fss.ru' target='_blank'>Официальный сайт Фонда социального страхования</a>",
								"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
								"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
								"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
								"dep_18": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник, четверг: 10.00 - 12.00</div></div>"
}
var dep_details_Galich = {  "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_10": "<a class='dep_detail_href' href='http://www.nalog.ru/rn44/' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_17": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> перерыв: 12.00 - 13.00, </div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_18": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 17.00,</div><div class='detaile_table_string'> перерыв: 12.00 - 13.00, </div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>"
}
var dep_details_Nerehta = { "dep_14": "<a class='dep_detail_href' href='http://git44.rostrud.ru' target='_blank'>Официальный сайт инспекции</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_13": "<a class='dep_detail_href' href='http://fssprus.ru' target='_blank'>Официальный сайт Федеральной службы</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_12": "<a class='dep_detail_href' href='http://www.gibdd.ru' target='_blank'>Официальный сайт министерства</a><div class='dep_information'>Государственные услуги оказываются через информационные киоски </div>",
							"dep_11": "<a class='dep_detail_href' href='http://rospotrebnadzor.ru' target='_blank'>Официальный сайт управления</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_9": "<a class='dep_detail_href' href='http://www.pfrf.ru' target='_blank'>Официальный сайт пенсионного фонда</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 11.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_8": "<a class='dep_detail_href' href='http://socdep.adm44.ru/index.aspx' target='_blank'>Официальный сайт департамента</a><a class='doc_forms' href='/qa/Download/'>Формы документов</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_5": "<a class='dep_detail_href' href='http://dep-economy44.ru' target='_blank'>Официальный сайт департамента</a><div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 16.30,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>",
							"dep_17": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 10.00 - 12.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div>",
							"dep_18": "<div class='detail_table'><span class='title_detail_table'> График приема:</span> <div class='detaile_table_string'>понедельник - пятница: 08.00 - 10.00,</div><div class='detaile_table_string'> суббота, воскресенье - выходной  </div></div><a class='dep_record' href='/predvaritelnaya-zapis/'>Предварительная запись</a>"
}

$(document).ready( function () { 
	if (window.location.pathname=='/services/service/') {
		var url=document.location.href;
		if (localStorage.getItem("12")){
			switch (localStorage.getItem("0")) {
				case "Кострома": str_d=dep_details_Kostroma[localStorage.getItem("12")]; break;
				case "Буй": str_d=dep_details_Buy[localStorage.getItem("12")]; break;
				case "Волгореченск": str_d=dep_details_Volgorechensk[localStorage.getItem("12")]; break;
				case "Мантурово": str_d=dep_details_Manturovo[localStorage.getItem("12")]; break;
				case "Макарьев": str_d=dep_details_Makarev[localStorage.getItem("12")]; break;
				case "Судиславль": str_d=dep_details_Sudislavl[localStorage.getItem("12")]; break;
				case "Шарья": str_d=dep_details_Sharia[localStorage.getItem("12")]; break;
				case "Боговарово": str_d=dep_details_Bogovarovo[localStorage.getItem("12")]; break;
				case "Галич": str_d=dep_details_Galich[localStorage.getItem("12")]; break;
				case "Нерехта": str_d=dep_details_Nerehta[localStorage.getItem("12")]; break;
			}
			$("#dep_details").html(str_d);
		}
	}
});
</script>
<div class="search-page">
<div id="dep_details">
</div>
<form action="" method="get">
	<?$APPLICATION->IncludeComponent(
		"bitrix:search.suggest.input",
		"",
		array(
			"NAME" => "q",
			"VALUE" => $arResult["REQUEST"]["~QUERY"],
			"INPUT_SIZE" => 40,
			"DROPDOWN_SIZE" => 10,
			"FILTER_MD5" => $arResult["FILTER_MD5"],
		),
		$component
	);?>
<?if($arParams["SHOW_WHERE"]):?>
	<select name="where">
	<option value=""><?=GetMessage("SEARCH_ALL")?></option>
	<?foreach($arResult["DROPDOWN"] as $key=>$value):?>
	<option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo " selected"?>><?=$value?></option>
	<?endforeach?>
	</select>
<?endif;?>
	<input type="button" class="service_search" placeholder="Поиск услуги" value="<?=GetMessage("SEARCH_GO")?>" />
	<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
<?if($arParams["SHOW_WHEN"]):?>
	<script>
	var switch_search_params = function()
	{
		var sp = document.getElementById('search_params');
		var flag;
		var i;

		if(sp.style.display == 'none')
		{
			flag = false;
			sp.style.display = 'block'
		}
		else
		{
			flag = true;
			sp.style.display = 'none';
		}

		var from = document.getElementsByName('from');
		for(i = 0; i < from.length; i++)
			if(from[i].type.toLowerCase() == 'text')
				from[i].disabled = flag;

		var to = document.getElementsByName('to');
		for(i = 0; i < to.length; i++)
			if(to[i].type.toLowerCase() == 'text')
				to[i].disabled = flag;

		return false;
	}
	</script>
	<a class="search-page-params" href="#" onclick="return switch_search_params()"><?echo GetMessage('CT_BSP_ADDITIONAL_PARAMS')?></a>
	<div id="search_params" class="search-page-params" style="display:<?echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"]? 'block': 'none'?>">
		<?$APPLICATION->IncludeComponent(
			'bitrix:main.calendar',
			'',
			array(
				'SHOW_INPUT' => 'Y',
				'INPUT_NAME' => 'from',
				'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
				'INPUT_NAME_FINISH' => 'to',
				'INPUT_VALUE_FINISH' =>$arResult["REQUEST"]["~TO"],
				'INPUT_ADDITIONAL_ATTR' => 'size="10"',
			),
			null,
			array('HIDE_ICONS' => 'Y')
		);?>
	</div>
<?endif?>
</form>

<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
	?>
	<div class="search-language-guess">
		<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div><?
endif;?>

<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
	<p><?=GetMessage("SEARCH_ERROR")?></p>
	<?ShowError($arResult["ERROR_TEXT"]);?>
	<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
	<p><?=GetMessage("SEARCH_SINTAX")?><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
	<table border="0" cellpadding="5">
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
			<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
			<td><?=GetMessage("SEARCH_AND_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
			<td><?=GetMessage("SEARCH_OR_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
			<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top">( )</td>
			<td valign="top">&nbsp;</td>
			<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
		</tr>
	</table>
<?elseif(count($arResult["SEARCH"])>0):?>
	<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
	<? $count=0;
	foreach($arResult["SEARCH"] as $arItem):?>
		<div class="green_div<?echo $count?>"><?//echo $arItem["TITLE_FORMATED"]?>
		<script>
		/* var incorrect_url="<?echo $arItem["URL"]?>";
		var correct_url=incorrect_url;
		correct_url=correct_url.replace("detail.php?", "?ELEMENT_");
		document.getElementById("need_href").href=correct_url; */
		</script>
		<p>
		<?$grab = GetIBlockElement($arItem["ITEM_ID"]);
		echo $grab["PREVIEW_TEXT"];?> </p> </div>
		<? if ($count==0)  $count=1;
		else $count=0;
		if (
			$arParams["SHOW_RATING"] == "Y"
			&& strlen($arItem["RATING_TYPE_ID"]) > 0
			&& $arItem["RATING_ENTITY_ID"] > 0
		):?>
			<div class="search-item-rate"><?
				$APPLICATION->IncludeComponent(
					"bitrix:rating.vote", $arParams["RATING_TYPE"],
					Array(
						"ENTITY_TYPE_ID" => $arItem["RATING_TYPE_ID"],
						"ENTITY_ID" => $arItem["RATING_ENTITY_ID"],
						"OWNER_ID" => $arItem["USER_ID"],
						"USER_VOTE" => $arItem["RATING_USER_VOTE_VALUE"],
						"USER_HAS_VOTED" => $arItem["RATING_USER_VOTE_VALUE"] == 0? 'N': 'Y',
						"TOTAL_VOTES" => $arItem["RATING_TOTAL_VOTES"],
						"TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
						"TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
						"TOTAL_VALUE" => $arItem["RATING_TOTAL_VALUE"],
						"PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);?>
			</div>
		<?endif;?>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>


<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>
</div>
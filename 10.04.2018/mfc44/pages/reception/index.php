<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Запись на приём");
$APPLICATION->AddChainItem("Запись на приём");
?>		
			
<main id="main">
	<div id="nvxReception" class="clearfix" style="margin-bottom: 20px;">
	<h1 class="reception-title">Запись на приём</h1>
	<div class="paddings reception-redoc-form">
		<h2 class="declinePlate m-top" data-bind="visible: userInfo() == null">Для записи на приём вы должны быть авторизованы</h2>
		
		<!-- ko if: place -->
		<div class="reception-selected-pave" data-bind="click: goLevel1">
			<span style="font-size:18px;color:#e96343;">Организация: <span data-bind="text: place().name"></span></span>
		</div>
		<!-- /ko -->

		<!-- ko if: service -->
		<div class="reception-selected-pave" data-bind="click: goLevel2">
			<span>Направление: <span data-bind="text: service().name"></span></span>
		</div>
		<!-- /ko -->
	
		<!-- ko if: specialist-->
		<div class="reception-selected-pave" data-bind="click: goLevel3">
			<span>Специалист: <span data-bind="text: specialist().name"></span></span>
		</div>
		<!-- /ko -->

		<!-- ko if: date -->
		<div class="reception-selected-pave" data-bind="click: goLevel3">
			<span>Дата приёма: <span data-bind="text: date().name"></span></span>
		</div>
		<!-- /ko -->

		<!-- ko if: position -->
		<div class="reception-selected-pave" data-bind="click: goLevel4">
			<span>Время приёма: <span data-bind="text: position().name"></span></span>
		</div>
		<!-- /ko -->

		<p class="m-top-dbl" data-bind="html: commonInfoString, visible: commonInfoString() != null"></p>

		<div data-bind="template: { name: templateId, data: templateViewModel }"></div>
	</div>
</div>
	<a style="padding:10px;background:#69321f;color:#fff;margin-top:15px;font-size:13px;" href="/predvaritelnaya-zapis/">Предварительная запись в другие филиалы МФЦ</a>
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
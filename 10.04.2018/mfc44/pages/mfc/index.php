<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация о МФЦ");
$APPLICATION->AddChainItem("МФЦ", "/mfc/");
$APPLICATION->AddChainItem("Информация о МФЦ");
?>		
			
<main id="main">
	
<div id="nvxMfcInfo">
	<!--ko if: pageTitle-->
	<h1 data-bind="text: pageTitle, css: pageIcon()"></h1>
	<!--/ko-->
	<!--ko template: { name: templateId, data: templateModel }--><!--/ko-->
</div>
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
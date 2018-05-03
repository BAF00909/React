<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заявление");
$APPLICATION->AddChainItem("Заявление");
?>
			
<main id="main">	
<div id="nvxRequestAttachment">
	<h1 data-bind="text: pageTitle"></h1>
	<!-- ko if: backText -->
	<a class="btn primary button b-back" data-bind="attr: {href: backUrl }, text: backText" rel="back"></a>
	<!-- /ko -->
	<div class="paddings" data-bind="css: { 'hasBack': backText }">
		<!-- ko with: requestInfoViewModel -->
		<!-- ko template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/request/requestGeneralInfo.tmpl.html' } -->
		<!-- /ko -->
		<!-- /ko -->
		<div>
			<!-- ko if: visibleEditButton -->
			<div class="btn button b-solid button-small button-small--blue" data-bind="click: editButtonClick">Редактировать</div>
			<!-- /ko -->
			<!-- ko if: visibleRemoveDraftButton -->
			<div class="btn button b-solid button-small button-small--blue" data-bind="click: removeDraftClick, text: removeDraftTitle"></div>
			<!-- /ko -->
		</div>
		<div class="m-top-dbl" data-bind="template: { name: templateId, data: templateViewModel, if: templateViewModel }"></div>
		<!-- ko if: useNextButton -->
		<div class="btn b-solid  b-modal button-small button-small--blue" data-bind="click: nextAction, text: nextText"></div>
		<!-- /ko -->
	</div>
</div>

</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
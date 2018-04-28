<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заявление");
$APPLICATION->AddChainItem("Заявление");
?>
			
<main id="main">	
	<div id="nvxRequestInfo">
		<h1>Информация о заявлении</h1>
		<div class="paddings">
		<!-- ko template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/request/requestGeneralInfo.tmpl.html' } --><!-- /ko -->
		</div>
		<div class="container tabs-area">
		
			<nav class="nav-tabset tabset">
				<ul> 
					<li class="active" data-bind="event: { click: tabs.formPreview.onclick }, css: { 'active': tabs.formPreview.active }">
						<a href="#tab1" data-bind="text: tabs.formPreview.title">Заявление</a>
					</li>
					<li data-bind="event: { click: tabs.result.onclick }, css: { 'active': tabs.result.active }">
						<a href="#tab2" data-bind="text: tabs.result.title">Результаты</a>
					</li>
					
					<li data-bind="event: { click: tabs.changes.onclick }, css: { 'active': tabs.changes.active }">
						<a href="#tab3" data-bind="text: tabs.changes.title">История</a>
					</li>
					<li data-bind="event: { click: tabs.attachments.onclick }, css: { 'active': tabs.attachments.active }">
						<a href="#tab4" data-bind="text: tabs.attachments.title">Файлы</a>
					</li>				
				</ul>
			</nav>	
			
			<!-- Заявление. -->
			<div class="tab paddings" data-bind="visible: tabs.formPreview.active, template: { name: formPreviewTemplateId, data: formPreviewModel, if: formPreviewModel }"></div>
			<!-- Результат. -->
			<div class="tab tab2tr" data-bind="visible: tabs.result.active , template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/request/requestInfoResult.tmpl.html', data: $data }"></div>
			<!-- История изменений. -->
			<div class="tab tab3tr" data-bind="visible: tabs.changes.active, template: { name: tabs.changes.template, data: requestChangesModel, if: requestChangesModel }"></div>	
			<!-- Файлы. -->
			<div class="tab tab4tr" data-bind="visible: tabs.attachments.active, template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/request/requestInfoAttachments.tmpl.html', data: requestAttachmentsModel, if: requestAttachmentsModel }"></div>
		</div>
	</div>
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
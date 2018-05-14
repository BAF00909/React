<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация об услуге");
$APPLICATION->AddChainItem("Каталог услуг", "/services/");
$APPLICATION->AddChainItem("Информация об услуге");
?>		
			
<main id="main">
<div id="nvxServiceInfoPage">

   <div data-bind="template: { name: 'Nvx.ReDoc.StateStructureServiceModule/Service/View/servicePassportInfoPage.tmpl.html'}"></div>
    
</div>
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
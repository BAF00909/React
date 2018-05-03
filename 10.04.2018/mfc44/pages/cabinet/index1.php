<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональная информация");
$APPLICATION->AddChainItem("Личный кабинет");
?>
			
<main id="main">
	<div id="nvxStartCreateFile"></div>

	<div class="container tabs-area">
	
		<nav class="nav-tabset tabset">
			<ul> 
				<li class="active"><a href="#tab1">Персональная информация</a></li>
				<li><a href="#tab2">Заявления</a></li>					
			</ul>
		</nav>
		
		<div class="">			
			<div id="tab1" class="row">
				<div id="nvxCustomerInfo">
					<!-- Информация о заявителе. -->
					<!-- ko if: (isPhysical() && !isIndividual()) -->
					<div data-bind="template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/customer/customer.tmpl.html', data: customerViewModel, if: customerViewModel }"></div>
					<!-- /ko -->
					<!-- ko if: (!isPhysical()) -->
					<div data-bind="template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/customer/juridical.tmpl.html', data: customerViewModel, if: customerViewModel }"></div>
					<!-- /ko -->

					<!-- ko if: (isPhysical() && isIndividual()) -->
					<div data-bind="template: { name: 'Nvx.ReDoc.Rpgu.PortalModule/Cabinet/View/customer/individual.tmpl.html', data: customerViewModel, if: customerViewModel }"></div>
					<!-- /ko -->
				</div>				
			</div>
			<div id="tab2" class="row" style="margin:0;">
				<div id="nvxRequestList">
					<!--ko if: requestList().length > 0-->
					<table class="table-new">
						<tr class="table-new-header">
							<th>Заявление</th>
							<th class="col-150">Дата подачи</th>
							<th class="col-150">Статус</th>
						</tr>
						<!--ko foreach: requestList-->
						<tr class="table-new-row" data-bind="click: $parent.goFile">
							<td>
								<span data-bind="text: identificator" style="font-weight: bold;"></span>
								<span data-bind="text: title"></span>
							</td>

							<td class="col-150" data-bind="text: createdStr"></td>
							<td class="col-150" data-bind="text: rpguFileStatus">
								<span data-bind="text: rpguFileStatus"></span>
								<!-- ko if: isArchived && status <= 1 -->
								<span>(Архивировано)</span>
								<!-- /ko -->
							</td>
						</tr>
						<!--/ko-->
					</table>
					<!--/ko-->
					<!--ko if: requestList().length == 0-->
					<h2>Заявлений нет</h2>
					<!--/ko-->
				</div>
			</div>
		</div>
	</div>	
	
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
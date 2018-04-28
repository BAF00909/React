<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональная информация");
$APPLICATION->AddChainItem("Личный кабинет");
?>
			
<main id="main">
	<div class="tabs-area">
	
	<div id="nvxStartCreateFile"></div>

	<nav class="nav-tabset tabset">
		<ul> 
			<li class="active"><a href="#tab1">Персональная информация</a></li>
			<li><a href="#tab2">Заявления</a></li>
			<!--<li><a href="#tab3">Платежи</a></li>-->
			<li><a href="#tab4">Жалобы</a></li>
			<li><a href="#tab5">Запись на приём</a></li>
		</ul>
	</nav>
			
	<div>
		<div id="tab1">
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


<div id="tab2">
			<div id="nvxRequestList">
					<!--ko if: requestList().length > 0-->
					<table class="table-new">
						<tr class="table-new-header">
							<th>Заявление</th>
							<th class="col-150">Дата подачи</th>
							<th class="col-150">Статус</th>
							<th class="col-150">Оценить</th>
							<th class="col-150">Удалить</th>
						</tr>
						<!--ko foreach: requestList-->
						<tr class="table-new-row">
							<td  data-bind="click: $parent.goFile">
								<span data-bind="text: identificator"></span>
								<span data-bind="text: title"></span>
							</td>

							<td class="col-150" data-bind="text: createdStr, click: $parent.goFile"></td>
							<td class="col-150" data-bind="text: rpguFileStatus, click: $parent.goFile">
								<span data-bind="text: rpguFileStatus"></span>
								<!-- ko if: isArchived && status <= 1 -->
								<span>(Архивировано)</span>
								<!-- /ko -->
							</td>
                            <!-- ko if: $parent.qualityControlVisible -->
							<td class="col-180">
								<!--ko if: status == 5 || status == 6 -->
								<!-- ko ifnot: isRpguServiceQualityRated -->
								<div class="btn button btn-rating" data-bind="click: $parent.rateQuality"></div>
								<!-- /ko -->
								<!-- ko if: isRpguServiceQualityRated -->
								<span>Услуга оценена</span>
								<!-- /ko -->
								<!-- /ko -->
							</td>
							<!-- /ko -->
                           
						    <td style="width: 7%; text-align: center;">
								<!-- ko if: status == 1 -->
								<div class="btn-del-req" data-bind=" click: function(){$parent.removeDraftClick($data.id);}"></div>
								<!-- /ko -->
						    </td>
							
						</tr>
						<!--/ko-->
					</table>
					<!--/ko-->
					<!--ko if: requestList().length == 0-->
					<h2>Заявлений нет</h2>
					<!--/ko-->
                        <!-- ko if: rateQualityDialog -->
				       <div data-bind="template: { name: 'Nvx.ReDoc.WebInterfaceModule/View/modalDialog.tmpl.html', data: rateQualityDialog }"></div>
				    <!-- /ko -->
				</div>
		</div>

		<div id="tab4">
			<div id="nvxLkComplaint">
				<!--ko if: complaintList().length > 0-->

				<table class="table-new">
						<tr class="table-new-header">
							<th class="col-150">Дата подачи</th>
							<th class="col-150">Номер</th>
							<th class="col-150">Ведомство</th>
							<th class="col-150">Статус</th>
						</tr>
							<!--ko foreach: complaintList-->
							<tr>

							<td>
							<a data-bind="attr: { href: fileLink }"><span class="col-140" data-bind="text: date"></span></a>
							</td>

							<td style="width: 150px;text-align: center;">
							<a data-bind="attr: { href: fileLink }"><span class="col-200" data-bind="text: number"></span></a>
							</td>

							<td style="text-align: center;padding: 10px 0;">
							<a data-bind="attr: { href: fileLink }"><span data-bind="text: oiv"></span></a>
							</td>

							<td>
							<a data-bind="attr: { href: fileLink }"><span class="col-245" data-bind="text: status"></span></a>
							</td>
							
							</tr>
					<!--/ko-->
					</table>
				<!--/ko-->
				<!--ko if: complaintList().length == 0-->
				<h2 class="declinePlate withIcon fa-exclamation-triangle m-top-hlf">Жалоб нет</h2>
				<!--/ko-->
			</div>
		</div>

		<div id="tab5">
			<div id="nvxLkReception">
				<div class="reception-redoc-form paddings">
					<p class="m-top-dbl" data-bind="text: commonInfoString, visible: commonInfoString() != null"></p>
					<!-- ko if: tickets().length > 0 -->
					<div class="reception-ticket-container">
						<!-- ko foreach: tickets -->
						<div class="reception-ticket-hrz m-btm">
							<div class="reception-ticket-hrz-1">
								<span style="display: inline-block;font-weight:bold; margin-bottom: 15px;" data-bind="dateFormat: ticketDateTime, format: 'Simple'"></span>
								<br/>
								<!-- ko if: status -->
								<span class="opa" style="margin-bottom: 15px;">Статус: </span> <span data-bind="text: status.recName"></span>
								<!-- /ko -->
							</div>
							<div class="reception-ticket-hrz-2">
								<!-- ko if: service -->
								<span class="opa" style="margin-bottom: 15px;">Услуга: </span> <span data-bind="text: service.name"></span>
								<br/>
								<!-- /ko -->
								<!-- ko if: specialist && specialist.name -->
								<span class="opa" style="margin-bottom: 15px;">Специалист: </span> <span data-bind="text: specialist.name"></span>
								<!-- /ko -->
							</div>
							<div class="reception-ticket-hrz-4 button btn primary" data-bind="click: $parent.printTicket">Печать</div>
							<div class="reception-ticket-hrz-3 button btn b-delete" data-bind="click: $parent.cancelReception, visible: canCancel">Отменить запись</div>
						</div>
						<!-- /ko -->
					</div>
					<!-- /ko -->
				</div>
			</div>
		</div>
	</div>
</div>
	
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
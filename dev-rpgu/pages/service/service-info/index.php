<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация об услуге");
$APPLICATION->AddChainItem("Каталог услуг", "/services/");
$APPLICATION->AddChainItem("Информация об услуге");
?>		
			
<main id="main">
<div id="nvxServiceInfoPage">

 <div class="head-info">
    <h1 data-bind="text: passportFullName" class="headerPave"></h1>
    <div class="btn button-small" data-bind="click: function(){window.history.back();}">Назад к выбору услуги</div>
    <div class="tabs-area servicePassportContent">
        <a name="description"></a>
        <nav class="nav-tabset nav-tabset-small">
            <ul>
                <!-- Описание -->
                <li data-bind="css: { 'active': tabs.description.active }"><a href="#tabDescription" data-bind="text: tabs.description.title, event: { click: tabs.description.onclick }"></a></li>
                <!-- ko if: documentsService -->
                <!-- Документы -->
                <li data-bind=" css: { 'active': tabs.documents.active }"><a href="#tabDocs" data-bind="text: tabs.documents.title, event: { click: tabs.documents.onclick }"></a></li>
                <!-- /ko -->
                <!-- Дополнительная информация -->
                <li data-bind="css: { 'active': tabs.additionalInformation.active }"><a href="#tabInfo" data-bind="text: tabs.additionalInformation.title, event: { click: tabs.additionalInformation.onclick }"></a></li>
                <!-- ko if: tabs.mfcList.visible -->
                <!-- МФЦ -->
                <li data-bind="css: { 'active': tabs.mfcList.active }"><a href="#tabInfo" data-bind="text: tabs.mfcList.title, event: { click: tabs.mfcList.onclick }"></a></li>
                <!-- /ko -->
            </ul>
        </nav>

        <div class="btn-panell" style="display:flex;flex-direction:column;">
        <!-- ko if: currentService -->
        <div style="margin: 0px 20px 10px 0; float: right" class="btn b-create button-small button-small--blue" data-bind="click: createTreatment, visible: currentService()">Получить услугу</div>
        <!-- /ko -->

        <!-- ko if: tabs.additionalInformation.active && canComplaint-->
        <div style="margin: 0px 20px 10px 0; float: right" class="btn b-create button-small button-small--blue" data-bind="click: createComplaint">Подать жалобу</div>
        <!-- /ko -->

        <!-- ko if: canGoIgtn -->
        <a class="btn btn-get-doc button-small--blue" href="/igtn/">Получить документ на оплату</a>
        <!-- /ko -->
        </div>

        <!-- Описание -->
        <div id="tabDescription" class="tab" data-bind="'visible': tabs.description.active">
            <div class="service-name" data-bind="'visible': tabs.description.active">
                 <!-- Описание -->
                 <div data-bind="visible: descriptionService != null && descriptionService != ''">
                    <div class="pave-table-header" ><!-- data-bind="slideArrowBefore: {}"-->
                        <span class="service-h3">Описание</span>
                    </div>
                    <div class="pave-content" data-bind="html: descriptionService.description"></div>
                </div>

                <div data-bind="with:descriptionService">   
                <!-- Как получить услугу -->
                <!-- ko if: requestMethods || responseMethods -->
                <div>
                    <div class="pave-table-header" data-bind="slideArrowBefore: {}">
                    <h3 class="service-h3">Как получить услугу</h3>
                    </div>
                <div class="pave-content">
                     <!-- ko if: requestMethods -->
                    <div data-bind="if: Array.isArray(requestMethods) && requestMethods.length > 0">
                        <p class="plain-text--bold">Способы подачи заявления:</p>
                        <ul data-bind="foreach: requestMethods">
                            <li class="plain-text" data-bind="text: title"></li>
                        </ul>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: responseMethods -->
                    <div data-bind="if: Array.isArray(responseMethods) && responseMethods.length > 0">
                        <p class="plain-text--bold">Способы получения результата:</p>
                        <ul data-bind="foreach: responseMethods">
                            <li class="plain-text" data-bind="text: title"></li>
                        </ul>
                    </div>
                    <!-- /ko -->
                </div>
                </div>
                <hr style=" background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- Стоимость и порядок оплаты-->
                <!-- ko with: payments -->
                <div>
                    <div class="pave-table-header" data-bind="slideArrowBefore: {}">
                        <h3 class="service-h3">Стоимость и порядок оплаты</h3>
                    </div>
                    <div class="pave-content">
                        <!-- ko if: isFree -->
                        <div>Услуга оказывается бесплатно.</div>
                         <!-- /ko -->
                        <!-- ko if: freeComment != null && freeComment !== '' -->
                        <div data-bind="scriptdel: freeComment"></div>
                        <!-- /ko -->

                        <!-- ko if: (Array.isArray(payments) && payments.length > 0) -->
                        <div data-bind="foreach: payments">
                            <h3 data-bind="text: title"></h3>
                            <div>
                                <h4 style="display: inline-block;">Вид платежа: </h4> <span class="plain-text" data-bind="text: title"></span>
                            </div>
                            <div>
                                 <h4 style="display: inline-block;">Стоимость: </h4> <span class="plain-text" data-bind="text: parseFloat(amount) + ' руб'"></span>
                            </div>
                            <h4>Вариант оплаты:</h4>
                            <ul data-bind="foreach: paymentMethods">
                                <li data-bind="text: $data"></li>
                            </ul>
                        </div>
                <!-- /ko -->
                </div>
                </div>
                <hr style=" background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                 <!-- Сроки оказания услуги-->
                <!-- ko if: (submitPeriod && submitPeriod != '') || (requestRegistration && requestRegistration != '') ||(maxTermQueue && maxTermQueue != '')  -->
                <div>
                    <div class="pave-table-header" data-bind="slideArrowBefore: {}">
                        <h3 class="service-h3">Сроки оказания услуги</h3>
                    </div>
                    <div class="pave-content">
                        <!-- ko if: submitPeriod && submitPeriod != '' -->
                        <h4 class="service-plain-text">Срок выполнения услуги:</h4>
                        <div class="plain-text pave-content__element" data-bind="scriptdel: submitPeriod"></div>
                        <!-- /ko -->

                        <!-- ko if: requestRegistration && requestRegistration != '' -->
                        <h4 class="service-plain-text">Срок, в течение которого заявление о предоставлении услуги должно быть зарегистрировано:</h4>
                        <div class="plain-text pave-content__element" data-bind="scriptdel: requestRegistration"></div>
                        <!-- /ko -->

                        <!-- ko if: maxTermQueue && maxTermQueue != '' -->
                        <h4 class="service-plain-text">Максимальный срок ожидания в очереди при подаче заявления о предоставлении услуги лично:</h4>
                        <div class="plain-text pave-content__element" data-bind="scriptdel: maxTermQueue"></div>
                        <!-- /ko -->
                    </div>
                </div>
                <hr style=" background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- Категории получателей -->
                <!-- ko if: Array.isArray(customers) && customers.length > 0 -->
                <div>
                    <div class="pave-table-header" data-bind="slideArrowBefore: {}">
                        <h3 class="service-h3">Категории получателей</h3>
                    </div>
                    <div class="pave-content">
                        <ul data-bind="foreach: customers">
                            <li>
                                <h4 data-bind="text: value"></h4>
                                <div class="plain-text" data-bind="scriptdel: description"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr style=" background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- Основание для оказания услуги, основания для отказа -->
                <!-- ko if: (groundForAction && groundForAction.length != '') || (rejects && rejects != '' ) -->
                <div>
                    <div class="pave-table-header" data-bind="slideArrowBefore: {}">
                        <h3 class="service-h3">Основание для оказания услуги, основания для отказа</h3>
                    </div>
                    <div class="pave-content">
                        <!-- ko if: groundForAction != null && groundForAction.length > 0 -->
                        <h4 class="service-plain-text">Основание для оказания услуг:</h4>
                        <div class="plain-text pave-content__element" data-bind="scriptdel: groundForAction"></div>
                        <!-- /ko -->

                        <!-- ko if: rejects != null && rejects.length > 0 -->
                        <h4 class="service-plain-text">Основания для отказа:</h4>
                        <ul data-bind="foreach: rejects">
                            <li class="plain-text pave-content__element" data-bind="scriptdel: $data"></li>
                        </ul>
                        <!-- /ko -->
                    </div>
                </div>
                <hr style=" background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- Результат оказания услуги -->
                <!-- ko if: result != null && result.length > 0 -->
                <div>
                    <div class="pave-table-header" data-bind="slideArrowBefore: {}">
                        <h3 class="service-h3">Результат оказания услуги</h3>
                    </div>
                    <div class="pave-content plain-text" data-bind="scriptdel: result">
                    </div>
                    <span data-bind="if: result == null || result.length == 0">Список не заполнен</span>
                </div>
                <hr style=" background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->            
                </div>
                <!--Описание конец-->
            </div>
        </div>

        <!-- Документы. -->
        <div id="tabDocs" class="tab" data-bind="'visible': tabs.documents.active">
            <div data-bind="with: documentsService">

                <!-- ko if: Array.isArray(inDocuments) && inDocuments.length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Документы, необходимые для получения услуги</span>
                    </div>
                    <div class="pave-content" style="display: none" data-bind="foreach: inDocuments">
                        <div class="group" data-bind="template: { name: 'Nvx.ReDoc.StateStructureServiceModule/Service/View/serviceDocument.tmpl.html', data: $data }"></div>
                    </div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- ko if: Array.isArray(completions) && completions.length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Документы, предоставляемые по завершении оказания услуги</span>
                    </div>
                    <div class="pave-content" style="display: none">
                        <div class="group formData likeInputs" data-bind="foreach: completions">
                            <!-- ko if: type && type !== '' -->
	            			<h3 class="service-h3" data-bind="text: type"></h3>
                            <!-- /ko -->				
	            			<div class="service-document-info">
                                <div class="service-document-info__data plain-text" data-bind="scriptdel: title"></div>
                            </div>
                            <!-- ko if: comments && comments !== '' -->
                            <div class="service-document-info">
                                <div class="service-document-info__label plain-text--bold">Описание: </div>
                                <div class="service-document-info__data plain-text" data-bind="scriptdel: comments"></div>
                            </div>
                            <!--<dl>
                                <dt>Описание</dt><dd data-bind="scriptdel: comments"></dd>
                            </dl>-->
                            <!-- /ko -->
                            <div data-bind="foreach: outDocuments">
                                <!-- ko template: { name: 'Nvx.ReDoc.StateStructureServiceModule/Service/View/serviceDocument.tmpl.html', data: $data } --><!-- /ko -->
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->
            </div>
        </div>

        <!-- Дополнительная информация. -->
        <div id="tabInfo" class="tab" data-bind="'visible': tabs.additionalInformation.active">
            <div data-bind="with:additionalInformation">

                <div>
		            <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
		            	<span class="service-h3">Сведения о государственной услуге</span>
		            </div>
		            <div class="pave-content group niceList" style="display: none;" data-bind="scriptdel: serviceFullTitle"></div>
		            <div class="pave-content group">
		            	<h3>Реестровый номер услуги:</h3>
		            	<div data-bind="scriptdel: idPassport"></div>
		            	<h3>Идентификатор цели:</h3>
		            	<div data-bind="scriptdel: targetId"></div>
		            	<h3>Дата размещения сведений в Региональном реестре государственных услуг:</h3>
		            	<div data-bind="scriptdel: creationDate"></div>
		            	<h3>Дата последнего обновления сведений в Региональном реестре государственных услуг:</h3>
		            	<div data-bind="scriptdel: modificationDate"></div>
		            </div>
	            </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- ko if: appealDescription != null && appealDescription.length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Порядок обжалования</span>
                    </div>
                    <div class="pave-content group niceList" style="display: none" data-bind="scriptdel: appealDescription"></div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <div>
		            <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
		            	<span class="service-h3">Межведомственное взаимодействие</span>
		            </div>
		            <!-- ko if: isInteragency == false -->
		            <div class="pave-content group niceList" style="display: none;">
		            	<p class="plain-text--main">Услуга не предусматривает межведомственное взаимодействие</p>
		            </div>
		            <!-- /ko -->
		            <!-- ko if: isInteragency -->
		            <div class="pave-content group niceList" style="display: none;">
		            	<p class="plain-text--main">Услуга предполагает межведомственное взаимодействие</p>
		            	<div>
		            		<h3>Тип межведомственного взаимодействия:</h3>
		            		<div>
		            			<ul class="niceList" data-bind="foreach: interagencyTypes">
		            				<li data-bind="text: $data"></li>
		            			</ul>
		            		</div>
		            	</div>
		            	<!-- ko if: Array.isArray(participantOrganisations) && participantOrganisations.length > 0 -->
		            	<div>
		            		<h3>Участвующие организации</h3>
		            		<div data-bind="foreach: participantOrganisations">
		            			<div class="group">
		            				<h4 data-bind="text: title"></h4>
		            				<ul data-bind="foreach: actionTypes">
		            					<li data-bind="text: $data"></li>
		            				</ul>
		            			</div>
		            		</div>
		            	</div>
		            	<!-- /ko -->
		            	<!-- ko if: tkmvName  && tkmvName !== '' -->
		            	<div>
		            		<h3>Технологическая карта межведомственного взаимодействия:</h3>
		            		<h4 data-bind="text: tkmvName"></h4>
		            		<!-- ko if: tkmvDocTextId && tkmvDocTextId !== '' -->
		            		<div><a class="inline service-plain-text-link" data-bind="attr: { href: window.nvxCommonPath.authPortalPath + '/portal/serviceDocument/' + tkmvDocTextId }, text: 'Сохранить'"></a></div>
		            		<!-- /ko -->
		            	</div>
		            	<!-- /ko -->
		            </div>
		            <!-- /ko -->
	            </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                
                <!-- ko if: Array.isArray(regulatoryActs) && regulatoryActs.length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Нормативно-правовые акты</span>
                    </div>
                    <div class="pave-content group" style="display: none">
                        <ul class="niceList" data-bind="foreach: regulatoryActs">
                            <li>
                                <p class="plain-text--main" data-bind="text: title"></p>
                                <div data-bind="if: sn != null && sn !== '' ">
                                    <span class="plain-text--bold">Регистрационный номер: </span><span class="plain-text" data-bind="text: sn"></span>
                                </div>
                                <div data-bind="if: approvalDate != null && approvalDate !== '' ">
                                    <span class="plain-text--bold">Дата утверждения: </span><span class="plain-text" data-bind="text: approvalDate"></span>
                                </div>
                                <div data-bind="if: url != null && url !== '' ">
                                    <span class="plain-text--bold">Источник официального опубликования: </span>
                                    <div>
                                        <a data-bind="text: url, attr: { href: url }"></a>
                                    </div>
                                </div>
                                <!-- ko if: offDocId && offDocId !== '' -->
                                <div><a class="inline service-plain-text-link" data-bind="attr: { href: window.nvxCommonPath.authPortalPath + '/portal/serviceDocument/' + offDocId }, text: 'Документ'"></a></div>
                                <!-- /ko -->
                            </li>
                        </ul>
                    </div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- ko if: $parent.currentServiceRightsAndDutuesObject() != null && $parent.currentServiceRightsAndDutuesObject().length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Права и обязанности должностных лиц при осуществлении государственного контроля (надзора)</span>
                    </div>
                    <div class="pave-content group niceList" style="display: none" data-bind="scriptdel: $parent.currentServiceRightsAndDutuesObject"></div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- ko if: $parent.currentServiceRightsAndDutuesSubject() != null && $parent.currentServiceRightsAndDutuesSubject().length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Права и обязанности лиц, в отношении которых осуществляются мероприятия по контролю (надзору)</span>
                    </div>
                    <div class="pave-content group niceList" style="display: none" data-bind="scriptdel: $parent.currentServiceRightsAndDutuesSubject"></div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- ko if: $data.reglament != null &&  $data.reglament.length > 0-->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Административный регламент</span>
                    </div>
                    <div class="pave-content group niceList" style="display: none">
	            		<!-- ko if: $data.reglamentOffDocTitle != null && $data.reglamentOffDocTitle.length > 0 -->
	            		<p data-bind="scriptdel: $data.reglamentOffDocTitle"></p>
	            		<div>
	            			<span class="plain-text--bold">Регистрационный номер: </span><span class="plain-text" data-bind="scriptdel: $data.reglamentOffDocSn"></span>
	            		</div>
	            		<!-- /ko -->
	            		<div data-bind="scriptdel: $data.reglament"></div>
	            	</div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- ko ifnot: $data.reglament != null &&  $data.reglament.length > 0-->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Административный регламент</span>
                    </div>
                    <div class="pave-content group niceList" style="display: none">
	            		<div>Административный регламент не утвержден.</div>
	            	</div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->

                <!-- ko if: $data.admProcedures != null && $data.admProcedures.length > 0 -->
	            <div>
	            	<div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
	            		<span class="service-h3">Административные процедуры</span>
	            	</div>
	            	<div class="pave-content group niceList" style="display: none">
	            		<div data-bind="foreach: $data.admProcedures">
	            			<div class="group formData likeInputs" style="margin-bottom: 10px">
	            				<span class="service-h4" data-bind="scriptdel: title"></span>
	            				<p class="plain-text--bold">Основания для начала:</p>
	            				<p data-bind="scriptdel: startingReason"></p>
	            				<p class="plain-text--bold">Критерии принятия решения для административной процедуры:</p>
	            				<ul class="niceList" data-bind="foreach: decidingCriteriaList">
	            					<li>
	            						<p data-bind="scriptdel: title"></p>
	            						<p data-bind="scriptdel: description" style="margin-top: 10px;"></p>
	            					</li>
	            				</ul>
	            				<p class="plain-text--bold">Порядок передачи результата оказания:</p>
	            				<p data-bind="scriptdel: resultTransferOrder"></p>
	            				<p class="plain-text--bold">Результат:</p>
	            				<p data-bind="scriptdel: executingResult"></p>
	            			</div>
	            		</div>
	            	</div>
	            </div>
	            <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->
                
                <!-- ko if: $data.interactionWithApplicants != null && $data.interactionWithApplicants.length > 0 -->
                <div>
                    <div class="pave-table-header pointer" data-bind="slideArrowBefore: { minimizedGroup: true }">
                        <span class="service-h3">Показатели доступности и качества</span>
                    </div>
	            	<div class="pave-content group niceList" style="display: none;">
	            		<span>Количество взаимодействий заявителей с должностными лицами:</span>
	            		<span data-bind="scriptdel: $data.interactionWithApplicants"></span>
	            	</div>
                </div>
                <hr style="display: block; background: #e4e4e4; color: #e4e4e4; height: 1px; border: 0px; width: 91.5%;">
                <!-- /ko -->
                
            </div>
        </div>
        <!-- МФЦ. -->
        <div id="tabMFC" class="tab" data-bind="'visible': tabs.mfcList.active, if: mfcList > 0 ">
            <div data-bind="with: mfcList">

            </div>
        </div>

    </div>
    
</div>
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
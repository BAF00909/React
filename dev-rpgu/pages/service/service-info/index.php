<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Информация об услуге");
$APPLICATION->AddChainItem("Каталог услуг", "/services/");
$APPLICATION->AddChainItem("Информация об услуге");
?>		
			
<main id="main">
<div id="nvxServiceInfoPage">
<div data-bind="with: description">
<h1 data-bind="text: serviceFullName"></h1>


 	<div class="btn get_search  button-small--blue" data-bind="click: $parent.createTreatment, visible:canCreateTreatment">Получить услугу</div>
 
	<h3>Способы подачи заявления:</h3>	
	<ul data-bind="foreach: requestMethods">
		<li data-bind="text:title"></li>
	</ul>
	<h3>Способы получения результата:</h3>
	<ul data-bind="foreach: responseMethods">
		<li data-bind="text:title"></li>
	</ul>
	<h3>Стоимость и порядок оплаты</h3>
	<!-- ko if: payments.isFree -->
	<div>Услуга оказывается бесплатно.</div>
            <!-- /ko -->
            <!-- ko if: payments.freeComment != null && payments.freeComment !== '' -->
            <div data-bind="scriptdel: payments.freeComment"></div>
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
	<h3 class="service-h3">Сроки оказания услуги</h3>
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
	<h3 class="service-h3">Категории получателей</h3>
	<ul data-bind="foreach: customers">
                <li>
                    <h4 data-bind="text: value"></h4>
                    <div class="plain-text" data-bind="scriptdel: description"></div>
                </li>
			</ul>

	<!-- Основание для оказания услуги, основания для отказа -->
    <!-- ko if: (groundForAction && groundForAction.length != '') || (rejects && rejects != '' ) -->
    <div>
        <div class="pave-table-header">
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
    <!-- /ko -->

    <!-- Результат оказания услуги -->
    <!-- ko if: result != null && result.length > 0 -->
    <div>
        <div class="pave-table-header">
            <h3 class="service-h3">Результат оказания услуги</h3>
        </div>
        <div class="pave-content plain-text" data-bind="scriptdel: result">
        </div>
        <span data-bind="if: result == null || result.length == 0">Список не заполнен</span>
    </div>
    <!-- /ko -->
</div>
</div>
</main>
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
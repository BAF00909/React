<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>
  
  </div>
     </div>  <!-- /container -->
	 <div class="main-content">
		<footer>
			<div class="row footer">
				<div class="col-md-4 pnull footer-left">
				<p class="footer-copyright" >©2018 ГАУ БО "МФЦ"</p>

				</div>	
				<div class="col-md-8 pnull footer-content">
					<div class="width33">
					<a class="footer-dropdown-toggle" data-toggle="modal" data-target="#support-mfc">Техническая поддержка</a>
					<span class="contact_footer">E-mail: <a href="mailto:mfc@mfc31.ru">mfc@mfc31.ru</a><br>
					<span class="phone_footer">+7-4722-42-42-42</span></span>
					</div>
					<div class="width33">
					&nbsp;
					</div>
					<div class="width33">
					Адрес головного офиса: <br>г. Белгород, пр-т Славы, д. 25
					</div>			
				</div>	
			</div>
			
				<!-- inline lightbox structure example -->
	<div class="popup-holder" id="nvxSelectLocation">
		<div id="lightbox1" class="lightbox">
			<div class="head">
				<a href="#" class="close" data-bind="click: showSelectLocations"><i class="icon-closed"></i></a>
	
				<strong class="heading">Укажите ваше местоположение</strong>
			</div>
			
			<form action="#">
				<div class="scroll-holder">
					<p>Вам будет доступен список услуг, предоставляемых в соответствующем районе</p>
					
					<!-- ko if: isLocationSet -->
					<strong class="sub-heading">Ваше текущее местоположение</strong>
					<div class="field-row">
						<label for="radio1" class="radio">
							<input type="radio" id="radio1" checked>
							<span></span>
						</label>
						<span class="label"><label for="radio1" data-bind="text: locationBaseText"></label></span>
					</div>
					<!-- /ko -->
					<!-- ko if: window.localStorage.nvxCurrentLocation-->
					<a href="#" style="display: block;" class="btn button-small--blue" data-bind="click: removeLocations">Сбросить местоположение</a>
					<!-- /ko -->


					<strong class="sub-heading">Выберите район:</strong>
					
					<div class="row">
						<!-- ko foreach: locations -->
						<div class="col-6">
							<div class="field-row">
								<label class="radio" data-bind="attr: {for: 'sr' + id }">
									<input type="radio" name="type1" data-bind="attr: { id: 'sr' + id }, value: id">
									<span data-bind="click: $parent.clickLocation"></span>
								</label>
								<span class="label"><label for="search-radio" data-bind="text: location"></label></span>
							</div>
						</div>
						<!-- /ko -->
					</div>

					<a href="#" class="btn" data-bind="click: save">Сохранить</a>
				</div>
			</form>
		</div>
	</div>
			
		<footer>		 		
		</div> <!-- /container -->

<div class="modal fade" id="support-mfc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Закрыть</span></button>
				<h4 class="modal-title" id="myModalLabel">Связь с технической поддержкой центра</h4>
			  </div>
			  <div class="modal-body" >
				<div id="thanks_teh" style="display:none">Ваша заявка отправлена. Спасибо!</div>
				<div id="error_teh" style="display:none">Вашe сообщение не отправлено по техническим причинам. Пожалуйста, обратитесь в службу технической поддержки.</div>
				<div id="teh_form">
						<div id="stop_teh" style="display:none">Поля "Ф.И.О", "Email" и "Причина обращения" обязательны для заполнения</div>
						<div id="stop_email_teh" style="display:none">Проверьте правильность ввода Email</div>
						<div id="stop_phone_teh" style="display:none">Проверьте правильность ввода телефона</div>
						<input type="text" id="fullname_teh" placeholder="Ф.И.О." value="<? echo $USER->GetFullName();?>"/><br/>
						<input type="text" id="email_teh" placeholder="Email" value="<? echo $USER->GetEmail();?>"/><br/>
						<?
						   $id=$USER->GetID();
						   $rsUser = CUser::GetByID($id);
						$arUser = $rsUser->Fetch();
						?>
						<input type="text" id="phone_teh" placeholder="Телефон" value="<? echo $arUser['PERSONAL_MOBILE'];?>"/><br/>
						<textarea id="comment_teh" placeholder="Причина обращения"></textarea><br/> 
						<input type="submit" id="send_teh" value="Отправить"/>
				</div>
			</div>
		  </div>
		</div>
		<script src="<?=SITE_TEMPLATE_PATH?>/../mfc44/Portal/script/requirejs/require.min.js"> </script>
		<script src="<?=SITE_TEMPLATE_PATH?>/../mfc44/Portal/script/requirejs-config.js"> </script>
		<script src="<?=SITE_TEMPLATE_PATH?>/../mfc44/Parts/Script/parts.bundle.rdc_v38.js"> </script>
 

</body></html>
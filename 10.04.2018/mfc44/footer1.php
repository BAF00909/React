<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>
  
  </div>
     </div>  <!-- /container -->
	 <div class="main-content">
		<footer>
			<div class="row footer">
				<div class="col-md-4 pnull footer-left">
				<p class="footer-copyright">©2016 МФЦ Костромской области</p>

				</div>	
				<div class="col-md-8 pnull footer-content">
					<div class="width33">
					<a class="footer-dropdown-toggle" data-toggle="modal" data-target="#support-mfc">Техническая поддержка</a>
					<span class="contact_footer">E-mail: <a href="mailto:mfc@mfc44.ru">mfc@mfc44.ru</a><br>
					<span class="phone_footer">8-800-250-10-38</span></span>
					</div>
					<div class="width33">
					&nbsp;
					</div>
					<div class="width33">
					Адрес головного офиса: <br>г. Кострома, ул. Калиновская, д. 38
					</div>			
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
		<script src="<?=SITE_TEMPLATE_PATH?>/../mfc44/Parts/Script/nwxCommonPath-file.js"> </script>
		<script src="<?=SITE_TEMPLATE_PATH?>/../mfc44/Parts/Script/parts.bundle.rdc_v38.js"> </script>
   
 <!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter24346981 = new Ya.Metrika({id:24346981,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/24346981" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter --> 

</body></html>
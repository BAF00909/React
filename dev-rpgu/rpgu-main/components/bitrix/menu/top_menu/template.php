<ul>
 	<li class="has-drop-down"><span><a href="/services/" class="has-drop-down-a menu-top__item">Каталог услуг</a></span>
		<div class="drop">
			<div class="container" id="nvxCategory">
				<ul class="drop-list" data-bind="foreach: cats">

					<li><a data-bind="attr: { 'href': link }, if : recId != 'OtherService' "><i class="icon-icon10" data-bind="css: recId"></i> <span class="text" data-bind="text: title"></span></a></li>

				</ul>
				<div class="drop-menu__controls">
					<a href="/services" class="btn open-all-catalog">Весь каталог</a>
					<a href="#" class="btn close-menu-services" data-bind="click: closeMenu">Закрыть</a>
				</div>
			</div>
		</div>
	</li>
	<li id="nvxTopmenuComplaint"><a href="#" data-bind="click: createComplaint" class="menu-top__item">Подача жалобы</a></li>
	<li><a href="/reception/?type=doctor" class="menu-top__item">Запись на приём</a></li>
	<li><a href="/pay/" class="menu-top__item">Оплата</a></li>
</ul>
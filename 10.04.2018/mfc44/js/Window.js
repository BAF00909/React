$(document).ready( function () {
var Dialog = new BX.CDialog({
	title: "МФЦ для бизнеса",
	head: 'Текст до формы',
	content: '<form method="POST" style="overflow:hidden;" action="/search/" id="searchform">\
		<textarea name="search" style="height: 78px; width: 374px;">Ищем много текста</textarea>\
		</form>',
	icon: 'head-block',
	resizable: true,
	draggable: true,
	height: '168',
	width: '400',
	buttons: ['<input type="submit" value="test" />', BX.CDialog.btnSave, BX.CDialog.btnCancel, BX.CDialog.btnClose]
});
})
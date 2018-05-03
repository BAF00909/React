define('Nvx.ReDoc.WebInterfaceModule/Content/lib/rubytojs/opalRunner', [
		'opal',
		'opal-parser',
		'opal-native',
		'opal-datetime',
		'Nvx.ReDoc.WebInterfaceModule/Content/lib.fix/guid/guid',
		'opal-guid',
		'opal-arrayExt'
	],
	function (opal) {
		//парсер ruby
		opal.load('opal-parser');
		//класс native для взаимодействия с js из ruby кода
		opal.load('native');
		//модули для C sharp
		//opal.load('date');
		opal.load('DateTime');
		opal.load('Guid');
		opal.load('ArrayExt');


		//этот модуль тянет парочку тяжёлых либ
		return opal;
	});
	$(document).ready( function () {
var center1="", center2="", map_address="", tmp_town = '';

	var addresses= { 'Кострома': '156013, г. Кострома, ул. Калиновская, д. 38',
					'Судиславль': '157860 пгт. Судиславль, ул. Советская, д. 2а',
					'Буй': '157000 г. Буй, ул. Ленина, д.3',
					'Галич': '157201 г. Галич, пл. Революции, Гостиный двор, верхний корпус № 4',
					'Мантурово': '157302 г.Мантурово, ул. Нагорная, д.19',
					'Шарья': '157505 г. Шарья, ул. 50 лет Советской власти, д.4 а',
					'Боговарово': '157780, с. Боговарово, ул. Чапаева, д. 2',
					'Макарьев': '157460, г. Макарьев,  ул. Большая Советская, д. 6.',
					'Волгореченск': '156019, г. Волгореченск, Им. 50-летия Ленинского Комсомола, 17а', 
					'Нерехта': '157800, г. Нерехта, улица Красноармейская, 25',
					'Красное-на-Волге': '157940, П. Красное-на-Волге, улица Садовая, 1',
					'Антропово': '157260, П. Антропово, улица Свободы, 6',
					'Островское': '157900, П. Островское, улица Свердлова, 5Д'};
					
var numbers= { 'Кострома': '0',
					'Судиславль': '1',
					'Буй': '2',
					'Галич': '3',
					'Мантурово': '4',
					'Шарья': '5',
					'Боговарово': '6',
					'Макарьев': '7',
					'Волгореченск': '8', 
					'Нерехта': '9',
					'Красное-на-Волге': '10',
					'Антропово': '11',
			  		'Островское':'12'};
					
	var geos= { 'КостромаLON': '57.776097',
				'КостромаLAT': '40.941042',
				'СудиславльLON': '57.88031732',
				'СудиславльLAT': '41.71023895',
				'БуйLON': '58.48155563',
				'БуйLAT': '41.53597239',
				'ГаличLON': '58.38095213',
				'ГаличLAT': '42.34657549',
				'МантуровоLON': '58.30898605',
				'МантуровоLAT': '44.75902998',
				'ШарьяLON': '58.3821115',
				'ШарьяLAT': ' 45.49949948',
				'БоговаровоLON': '58.97672938',
				'БоговаровоLAT': '47.02786014',
				'МакарьевLON': '57.88059537',
				'МакарьевLAT': '43.80878816',
				'ВолгореченскLON': '57.44176098', 
				'ВолгореченскLAT': '41.15363768',
				'НерехтаLON': '57.45756222',
				'НерехтаLAT': '40.57576819',
				'Красное-на-ВолгеLON':	'57.509298',
				'Красное-на-ВолгеLAT':	'41.238806',
				'АнтроповоLON':	'58.397416',
				'АнтроповоLAT':	'43.003547',
				'ОстровскоеLON':'57.806337',
				'ОстровскоеLAT':'42.245753'};
								

	if (localStorage.getItem('0')) {
		$('.selected_town').text(localStorage.getItem('0'));
		$.each($(".title_map"), function(){ 
			if($(this).text()==localStorage.getItem('0')){
				tmp_town=$(this).text();
				$("#town_details").html(details[$(this).text()]);
				$(this).append($("#town_details_container"));
				$( ".ico" ).removeClass( "active_ico" );
				$(this).parent().children('.ico').addClass("active_ico");
			};
		});
	}
	else {
		localStorage.setItem('0', "Кострома");
		$('.selected_town').text("Кострома");
		$.each($(".title_map"), function(){ 
			if($(this).text()=="Кострома"){
				tmp_town=$(this).text();
				$("#town_details").html(details[$(this).text()]);
				$(this).append($("#town_details_container"));
				$( ".ico" ).removeClass( "active_ico" );
				$(this).parent().children('.ico').addClass("active_ico");
			};
		});
	}
	$('.geo-adress').text(addresses[$('.selected_town').text()]);
		map_address=addresses[$('.selected_town').text()];
		center1=geos[localStorage.getItem('0')+"LON"];
		center2=geos[localStorage.getItem('0')+"LAT"];
	if (window.location.pathname=='/' || window.location.pathname=='/index.html' || window.location.pathname =='/#')
		{
			if ($('input[name="arrFilter_pf[town]"]').length) {
				$('input[name="arrFilter_pf[town]"]').val(localStorage.getItem('0')); 
				$('input[name="set_filter"]').click();}
			
			
		}
		
	if (window.location.pathname=='/' || window.location.pathname=='/index.html' || window.location.pathname=='/#') {
		$(".bx_breadcrumbs").css("display", "none");
		}
	else 
	{
		
		$(".bx_breadcrumbs").css("display", "block");
	}
	if (window.location.pathname=='/' || window.location.pathname=='/index.html' || window.location.pathname=='/#') {
		$(".bx_breadcrumbs").css("display", "none");
	}
	
	setInterval('if ($(".news-detail").length) $("#slider").css("display", "none"); else $("#slider").css("display", "block");', 100);
	var id_contact=0;
		var id_shed=0;
		var id_center=0;
		var id_job=0;
		var id_otch=0;
		
		$.ajax({
			url: "/ajax.handler.php",
			type: "POST",
			data: "PAGE=get_element_ids&filial="+localStorage.getItem('0'),
			dataType:"json",
			async: false,
			success: function(data){
			//alert(JSON.stringify(data));
				for (var i=0; i<data.length; i++) {
					//alert(data[i]['IBLOCK_ID']);
					switch (data[i]['IBLOCK_ID']) {
						case '11': id_contact=data[i]['ID']; break;
						case '12': id_shed=data[i]['ID']; break;
						case '13': id_center=data[i]['ID']; break;
						case '14': id_job=data[i]['ID']; break;
						case '15': id_otch=data[i]['ID']; break;
					}
				}
				//alert("id_contact: "+id_contact+" id_shed: "+id_shed+" id_center: "+id_center+" id_job: "+id_job+" id_otch: "+id_otch);

			},
			error: function(jqxhr, status, errorMsg) {
			//alert("Статус: " + status + " Ошибка: " + errorMsg);
			}
	
		});	
	$(".marker_into").click( function() {
		//var id_contact=numbers[localStorage.getItem('0')]-0+450;
		if($(this).text()=="Контакты") this.href=this.href+"?ELEMENT_ID="+id_contact;
	});
	$(".marker_into").click( function() {
		//var id_shed=numbers[localStorage.getItem('0')]-0+460;
		if($(this).text()=="Режим работы") this.href=this.href+"?ELEMENT_ID="+id_shed;
	});
	$(".marker_into").click( function() {
		//var id_center=numbers[localStorage.getItem('0')]-0+470;
		if($(this).text()=="О центре") this.href=this.href+"?ELEMENT_ID="+id_center;
	});
	$(".marker_into").click( function() {
		//var id_job=numbers[localStorage.getItem('0')]-0+480;
		if($(this).text()=="Вакансии") this.href=this.href+"?ELEMENT_ID="+id_job;
	});
	$(".marker_into").click( function() {
		//var id_otch=numbers[localStorage.getItem('0')]-0+490;
		if($(this).text()=="Отчеты") this.href=this.href+"?ELEMENT_ID="+id_otch;
	});

	$('.town').click( function () {
		var str=addresses[$(this).text()];
		$('.geo-adress').text(str);
		localStorage.setItem('0', $(this).text());
		localStorage.setItem('1', str);
		$('.selected_town').text($(this).text());
		if (window.location.pathname=='/' || window.location.pathname=='/index.html' || window.location.pathname=='/#'|| window.location.pathname=="/pressroom/news/" || window.location.pathname=='/pressroom/news/#')
			{
			if ($('input[name="arrFilter_pf[town]"]').length) {
				$('input[name="arrFilter_pf[town]"]').val(localStorage.getItem('0')); 
				$('input[name="set_filter"]').click();}
			}
		map_address=addresses[$('.selected_town').text()]; 
		center1=geos[localStorage.getItem('0')+"LON"];
		center2=geos[localStorage.getItem('0')+"LAT"];
		$.each($(".title_map"), function(){ 
			if($(this).text()==localStorage.getItem('0')){
				tmp_town=$(this).text();
				$("#town_details").html(details[$(this).text()]);
				$(this).append($("#town_details_container"));
				$( ".ico" ).removeClass( "active_ico" );
				$(this).parent().children('.ico').addClass("active_ico");
			};
		});
		
		//$('#town_main_filter').val(localStorage.getItem('0'));
		//$("#set_filter").click();
		switch (window.location.pathname) {
			case "/services/departments/": document.location.href=window.location.pathname+"?tags="+localStorage.getItem('0'); break;
			case "/services/fiz/": document.location.href=window.location.pathname+"?tags=физические+лица%2C"+localStorage.getItem('0'); break;
			case "/services/urid/": document.location.href=window.location.pathname+"?tags=юридические+лица%2C"+localStorage.getItem('0'); break;
			case "/services/benefits/": document.location.href=window.location.pathname+"?tags=льготы%2C"+localStorage.getItem('0'); break;
			case "/services/nationality/": document.location.href=window.location.pathname+"?tags=гражданство%2C"+localStorage.getItem('0'); break;
			case "/services/population-property/": document.location.href=window.location.pathname+"?tags=имущество+населения%2C"+localStorage.getItem('0'); break;
			case "/services/production-sales/": document.location.href=window.location.pathname+"?tags=производство+и+торговля%2C"+localStorage.getItem('0'); break;
			case "/services/social-support/": document.location.href=window.location.pathname+"?tags=меры+социальной+поддержки%2C"+localStorage.getItem('0'); break;
		}
		
		
		var id_contact=0;
		var id_shed=0;
		var id_center=0;
		var id_job=0;
		var id_otch=0;
		//alert(localStorage.getItem('0'));
		$.ajax({
			url: "/ajax.handler.php",
			type: "POST",
			data: "PAGE=get_element_ids&filial="+localStorage.getItem('0'),
			dataType:"json",
			async: false,
			success: function(data){
			//alert(JSON.stringify(data));
				for (var i=0; i<data.length; i++) {
					//alert(data[i]['IBLOCK_ID']);
					switch (data[i]['IBLOCK_ID']) {
						case '11': id_contact=data[i]['ID']; break;
						case '12': id_shed=data[i]['ID']; break;
						case '13': id_center=data[i]['ID']; break;
						case '14': id_job=data[i]['ID']; break;
						case '15': id_otch=data[i]['ID']; break;
					}
				}
				//alert("id_contact: "+id_contact+" id_shed: "+id_shed+" id_center: "+id_center+" id_job: "+id_job+" id_otch: "+id_otch);

			},
			error: function(jqxhr, status, errorMsg) {
			//alert("Статус: " + status + " Ошибка: " + errorMsg);
			}
	
		});	
		
		
		if (window.location.pathname=='/about/contacts/') {
			document.location.href = window.location.pathname+"?ELEMENT_ID="+id_contact;
		}
		if (window.location.pathname=='/about/rezhim_raboti/') {
			document.location.href = window.location.pathname+"?ELEMENT_ID="+id_shed;
		}
		if (window.location.pathname=='/about/mfc/') {
			document.location.href = window.location.pathname+"?ELEMENT_ID="+id_center;
		}
		if (window.location.pathname=='/about/Vakansii/') {
			document.location.href = window.location.pathname+"?ELEMENT_ID="+id_job;
		} 
		if (window.location.pathname=='/about/Otcheti/') {
			document.location.href = window.location.pathname+"?ELEMENT_ID="+id_otch;
		}
	});
	
	localStorage.setItem('2', geos[localStorage.getItem('0')+"LON"]);
	localStorage.setItem('3', geos[localStorage.getItem('0')+"LAT"]);
	$(".maps-text").click( function () {
		
		var filial_map;
    ymaps.ready(function(){
		var el = document.getElementById('cont_map');
		el.parentNode.removeChild(el);
		var newDiv = document.createElement('div');
		var parent = document.getElementById('first_map');
		$(newDiv).attr('id', 'cont_map');
		parent.appendChild(newDiv);
		$("#cont_map").css("width", "567px");
		$("#cont_map").css("height", "500px");
		parent.appendChild(newDiv);


        filial_map = new ymaps.Map("cont_map", {
            center: [center1, center2],
            zoom: 17
        });
		filial_map.controls.add('zoomControl');
		var myPlacemark = new ymaps.Placemark(
			[center1, center2],
			{
				balloonContentBody: map_address,
			},
			{
				draggable: false, // метку можно перемещать
				preset: 'twirl#redIcon'
			});
		filial_map.geoObjects.add(myPlacemark);
    });
		
	
		
		//var point = new YMaps.GeoPoint(37.609218,55.753559);
		//filial_map.setCenter(point);
	});

	/* $.each($(".marker_into"),function(){
		var url=this.href;
	  if(url.indexOf("services/service")+1){this.href=this.href+"%2C"+localStorage.getItem('0');};
	}); */
	$(".service_search").click( function() {
		var url=document.location.href;
		var arr_url=url.split("&",2);
		url=arr_url[0];
		var href=url+"&q="+$("#qplSKIW").val()+"&how=r";
		location.href=href;
	});
	

		$('#qplSKIW').keydown(function(eventObject){
		  if (eventObject.which==13) {
			return false;
		  }
		});

	
	
	$(".department_href").click( function() {
		this.href=this.href+"%2C"+localStorage.getItem('0')+"&d_name=" + $(this).text();
		localStorage.setItem("12",$(this).attr("id"));
	});
	$(".marker_into").click( function() {
		localStorage.setItem("12","");
	});
})
$(document).ready( function () {
		$("#send_q").click( function (){
			var fullname=document.getElementById("fullname_q").value;
			var compliance=document.getElementById("compliance_q").checked;
			var email=document.getElementById("email_q").value;
			var phone=document.getElementById("phone_q").value;
			var comment=document.getElementById("comment_q").value;
			if (email=="" || fullname=="" || comment=="") {
				$("#stop_q").css("display", "block");
			}
			else {
				var check=true;
				$("#stop_q").css("display", "none");
				var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
				if (pattern.test(email)){
					$("#stop_email_q").css("display", "none");
					
				} else {
					$("#stop_email_q").css("display", "block");
					check=false;
				}
				var pattern = /^[0-9()\-+ ]+$/;
				if (pattern.test(phone)){
					$("#stop_phone_q").css("display", "none");
				} else {
					$("#stop_phone_q").css("display", "block");
					check=false;
				}
				if(!compliance) {
					$("#stop_compliance").css("display", "block");
					check=false;
				}else{
					$("#stop_compliance").css("display", "none");
				}
				if (check) {
					$.ajax({
						url: "/ajax.handler.php",
						type: "POST",
						data: "PAGE=q_send&fullname="+fullname+"&email="+email+"&phone="+phone+"&comment="+comment,
						dataType:"html",
						async: false,
						success: function(data){
							document.getElementById("thanks_q").style.display="block";
							setTimeout('location.reload()', 6000);
						},
						error: function(jqxhr, status, errorMsg) {
						//alert("Статус: " + status + " Ошибка: " + errorMsg);
							document.getElementById("error_q").style.display="block";
					}
				
					});	
					}
				}
	});	
	
	$("#send_teh").click( function (){
			var fullname=document.getElementById("fullname_teh").value;
			var email=document.getElementById("email_teh").value;
			var phone=document.getElementById("phone_teh").value;
			var comment=document.getElementById("comment_teh").value;
			if (email=="" || fullname=="" || comment=="") {
				$("#stop_teh").css("display", "block");
			}
			else {
				var check=true;
				$("#stop_teh").css("display", "none");
				var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
				if (pattern.test(email)){
					$("#stop_email_teh").css("display", "none");
					
				} else {
					$("#stop_email_teh").css("display", "block");
					check=false;
				}
				var pattern = /^[0-9()\-+ ]+$/;
				if (pattern.test(phone)){
					$("#stop_phone_teh").css("display", "none");
				} else {
					$("#stop_phone_teh").css("display", "block");
					check=false;
				}
				if (check) {
					$.ajax({
						url: "/ajax.handler.php",
						type: "POST",
						data: "PAGE=teh_send&fullname="+fullname+"&email="+email+"&phone="+phone+"&comment="+comment,
						dataType:"html",
						async: false,
						success: function(data){
							document.getElementById("thanks_teh").style.display="block";
							setTimeout('location.reload()', 6000);
						},
						error: function(jqxhr, status, errorMsg) {
						//alert("Статус: " + status + " Ошибка: " + errorMsg);
							document.getElementById("error_teh").style.display="block";
					}
				
					});	
					}
				}
	});
	
	
	$("#search_button").click( function (){
			var user_services= new Array();
			user_services=document.getElementById("user_services").value.split(',');
			user_services.pop();
			var fullname=document.getElementById("search_name").value,
					parent=$("#record_results");
			if (fullname=="") {
			}
			else {
				$("#record_results").text('Результаты поиска для "'+fullname+'"');
				var table=document.createElement('table');
							$(table).addClass('table');
							$(table).addClass('table-striped');
							$(parent).append(table);
							
							var thead=document.createElement('thead');
							$(table).append(thead);
							
							var tr1=document.createElement('tr');
							$(thead).append(tr1);
							
							var th1=document.createElement('th');
							$(tr1).append(th1);
							$(th1).text("Имя");
							
							var th2=document.createElement('th');
							$(tr1).append(th2);
							$(th2).text("Email");
							
							var th3=document.createElement('th');
							$(tr1).append(th3);
							$(th3).text("Телефон");
							
							var th4=document.createElement('th');
							$(tr1).append(th4);
							$(th4).text("Дата");
							
							var th5=document.createElement('th');
							$(tr1).append(th5);
							$(th5).text("Время");
							
							var th6=document.createElement('th');
							$(tr1).append(th6);
							$(th6).text("Услуга");
							
							var th7=document.createElement('th');
							$(tr1).append(th7);
							
							var tbody=document.createElement('tbody');
							$(tbody).attr('id', 'tbody_parent');
							$(table).append(tbody);
				for (var p=0; p<user_services.length; p++){
					$.ajax({
						url: "/ajax.handler.php",
						type: "POST",
						data: "PAGE=search_record&fullname="+fullname+"&idservice="+user_services[p],
						dataType:"json",
						async: false,
						success: function(data){
							for (var i=0; i<data.length; i++) {
								var tr=document.createElement('tr');
								$(tr).attr('id', 'id'+data[i].id);
								$(tbody).append(tr);
								var t=data[i].minute;
								if (data[i].minute<10) t='0'+data[i].minute;
								var tt=data[i].hour;
								if (data[i].hour<10) tt='0'+data[i].hour;
								var d=data[i].day;
								if (data[i].day<10) d='0'+data[i].day;
								var dd=data[i].month;
								if (data[i].month<10) dd='0'+data[i].month;
								var str="<td class='fullname'>"+data[i].fullname+"</td><td>"+data[i].email+"</td><td>"+data[i].phone+"</td><td><span class='day'>"+d+"</span>"+".<span class='month'>"+dd+"</span></td><td><span class='hour'>"+tt+"</span>:<span class='minute'>"+t+"</span></td><td class='service'>"+data[i].service+"</td><td class='del_rec_id' data-toggle='modal' data-target='#deleteIdModal'>Удалить<span class='id_rec' style='display:none'>"+data[i].id+"</span></td>";
								$("#id"+data[i].id).html(str);
							}
						},
						error: function(jqxhr, status, errorMsg) {
						//alert("Статус: " + status + " Ошибка: " + errorMsg);
					}
				
					});	
					}
				}
				$(".del_rec_id").click( function (){
		var del_text=$(this).parent().find('.day').text()+"."+$(this).parent().find('.month').text()+"  "+$(this).parent().find('.hour').text()+":"+$(this).parent().find('.minute').text()+"  "+$(this).parent().find('.service').text();
		var id=$(this).parent().find('.id_rec').text();
		$("#id_del_item").val(id);
		$("#del_text").val(del_text);
		$("#delete_id_alert").text('Вы уверены, что хотите удалить запись "'+del_text+'"?');
		//alert(id);
	});
	});
	
	$(".NewsCalDefault").click( function (){
		if (window.location.pathname=='/check_day_record/' ) {
			var user_services= new Array();
			user_services=document.getElementById("user_services").value.split(',');
			user_services.pop();
			parent=$("#record_day_results");
			var day=$(this).children('span').text();
			var month=$("#month_sel option:selected").val();
			month=month.replace("/check_day_record/?month=","");
			month=month.substr(0,month.indexOf("&year"));
			$("#record_day_results").text('Результаты поиска на '+day+'.'+month);
			for (var p=0; p<user_services.length; p++){
			$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=search_day_record&day="+day+"&month="+month+"&idservice="+user_services[p],
				dataType:"json",
				async: false,
				success: function(data){
					for (var i=0; i<data.length; i++) {
						var div=document.createElement('div');
						$(div).attr('id', 'id'+data[i].id);
						if (i==0 || i%2==0) $(div).addClass("green_div0");
						else $(div).addClass("green_div1");
						parent.append(div);
						var t=data[i].minute;
						if (data[i].minute<10) t='0'+data[i].minute;
						var tt=data[i].hour;
						if (data[i].hour<10) tt='0'+data[i].hour;
						var str="<span class='hour'>"+tt+"</span>:<span class='minute'>"+t+"</span>     <span class='fullname'>"+data[i].fullname+"</span>     <span class='service'>"+data[i].service+"</span><span class='id_rec' style='display:none'>"+data[i].id+"</span><div class='del_rec_id' data-toggle='modal' data-target='#deleteIdModal'>Удалить</div>";
						$("#id"+data[i].id).html(str);
					}
				},
				error: function(jqxhr, status, errorMsg) {
				alert("Статус: " + status + " Ошибка: " + errorMsg);
				}
			});
			}
	$(".del_rec_id").click( function (){
		var del_text=$(this).parent().children('.hour').text()+":"+$(this).parent().children('.minute').text()+"  "+$(this).parent().children('.fullname').text()+"  "+$(this).parent().children('.service').text();
		var id=$(this).parent().children('.id_rec').text();
		$("#id_del_item").val(id);
		$("#del_text").val(del_text);
		$("#delete_id_alert").text('Вы уверены, что хотите удалить запись "'+del_text+'"?');
	});
		}
	});	
	
	$("#delete_id_button").click( function (){
			$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=record_id_delete&id="+$("#id_del_item").val(),
				dataType:"html",
				async: false,
				success: function(data){
					$("#delete_id_alert").text('Запись "'+$("#del_text").val()+'" удалена.');
					$("#delete_id_button").css("display", "none");
					setTimeout('location.reload()', 3000);
				},
				error: function(jqxhr, status, errorMsg) {
					$("#delete_id_alert").text('Не удалось удалить запись "'+$("#del_text").val()+'".');
			}
				
		});	
	});
})


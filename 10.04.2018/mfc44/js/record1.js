$(document).ready( function () {
							if (window.location.pathname =='/predvaritelnaya-zapis/'){
								if ($("#isAdmin").length>0) {
									$(".instruction").css("display", "none");
									$(".instruction_title").css("display", "none");
									$(".instruction_footer").css("display", "none");
									$(".add_time").css("display", "none");
								}
								else {
									$(".delete").remove();
									$(".red_name").remove();
									$(".red_email").remove();
									$(".red_phone").remove();
									$(".red_comment").remove();
									$(".red_time").remove();
									$(".add_time").remove();
								}
							}

		var red_hour=new Array();
		var red_minute=new Array();
		var red_names=new Array();
		var red_emails=new Array();
		var red_phones=new Array();
		var red_comments=new Array();
		if (window.location.pathname !='/check_day_record/' ) {
		var idservice=$("#hidden_ID").val();
		var start=$("#field_start").text().split(".",2),
			finish=$("#field_finish").text().split(".",2),
			period=parseInt($("#field_period").text()),
			time=$("#field_start").text().split(".",2),
			dinner_start=$("#field_dinner_start").text().split(".",2),
			dinner_finish=$("#field_dinner_finish").text().split(".",2),
			arr=new Array();
			while (parseInt(time[0])<parseInt(finish[0]) || parseInt(time[1])<parseInt(finish[1])) {
				if (parseInt(time[1])+period>60) {
					time[0]=parseInt(time[0])+1;
					if (60-parseInt(time[1])<period) {
						time[1]=period-(60-parseInt(time[1]));
						if ((parseInt(time[0])<parseInt(dinner_start[0]) && parseInt(time[1])<parseInt(dinner_start[1])) || (parseInt(time[0])>=parseInt(dinner_finish[0]) && parseInt(time[1])>=parseInt(dinner_finish[1])))
							arr.push(time[0]+":"+time[1]);
					}
					else {
						time[1]=parseInt(time[1])+period;
						if ((parseInt(time[0])<parseInt(dinner_start[0]) && parseInt(time[1])<parseInt(dinner_start[1])) || (parseInt(time[0])>=parseInt(dinner_finish[0]) && parseInt(time[1])>=parseInt(dinner_finish[1])))
							arr.push(time[0]+":"+time[1]);
					}
				}
				else
					if (60-parseInt(time[1])>period) {
						time[1]=parseInt(time[1])+period;
						if ((parseInt(time[0])<parseInt(dinner_start[0]) && parseInt(time[1])<parseInt(dinner_start[1])) || (parseInt(time[0])>=parseInt(dinner_finish[0]) && parseInt(time[1])>=parseInt(dinner_finish[1])))
							arr.push(time[0]+":"+time[1]);
						}
					else {
						time[1]=period-(60-parseInt(time[1]));
						time[0]=parseInt(time[0])+1;
						if (!(parseInt(time[0])>=parseInt(dinner_start[0]) && parseInt(time[0])<=parseInt(dinner_finish[0])))
							arr.push(time[0]+":"+time[1]);
						else
							if(!((parseInt(time[0])==parseInt(dinner_start[0]) && parseInt(time[1])>=parseInt(dinner_start[1])) && (parseInt(time[0])==parseInt(dinner_finish[0]) && parseInt(time[1])<parseInt(dinner_finish[1]))))
								arr.push(time[0]+":"+time[1]);
					}
			}
			
		}
		$.each($(".NewsCalToday"),function(){
			$(this).addClass("NewsCalDefault");
		});			
					
		$.each($(".NewsCalDefault"),function(){
			if (window.location.pathname !='/check_day_record/' ) {
				var day=$(this).children('span').text();
				var month=$("#month_sel option:selected").val();
				if (window.location.pathname =='/check_day_record/predvaritelnaya-zapis/' ) 
					month=month.replace("/check_day_record/predvaritelnaya-zapis/?month=","");
				else
					month=month.replace("/predvaritelnaya-zapis/?month=",""); 
				month=month.substr(0,month.indexOf("&year"));
				var service=$("h3").text();
				var el=$(this);
				$.ajax({
					url: "/ajax.handler.php",
					type: "POST",
					data: "PAGE=record&day="+day+"&month="+month+"&service="+service,
					dataType:"json",
					async: false,
					success: function(data){
						if(data.length==0) el.addClass("free"); //нет записей
						else {
							if(data.length==arr.length) el.addClass("no_free");
							if(data.length<arr.length) el.addClass("almost_free");
						} 
					},
					error:  function(jqxhr, status, errorMsg) {
						alert("Статус: " + status + " Ошибка: " + errorMsg);
					}
					}); 
				}
		});
		
		$.each($(".NewsCalWeekend"),function(){
			if (window.location.pathname !='/check_day_record/' ) {
				var day=$(this).children('span').text();
				var month=$("#month_sel option:selected").val();
				if (window.location.pathname =='/check_day_record/predvaritelnaya-zapis/' ) 
					month=month.replace("/check_day_record/predvaritelnaya-zapis/?month=","");
				else
					month=month.replace("/predvaritelnaya-zapis/?month=",""); 
				month=month.substr(0,month.indexOf("&year"));
				var tmp=new Date();
				tmp.setDate(day);
				tmp.setMonth(month-1);
				if (tmp.getDay()==6) {
					var service=$("h3").text();
					var el=$(this);
					el.addClass("NewsCalDefault");
					$.ajax({
						url: "/ajax.handler.php",
						type: "POST",
						data: "PAGE=record&day="+day+"&month="+month+"&service="+service,
						dataType:"json",
						async: false,
						success: function(data){
							if(data.length==0) el.addClass("free"); //нет записей
							else {
								if(data.length==arr.length) el.addClass("no_free");
								if(data.length<arr.length) el.addClass("almost_free");
							} 
						},
						error:  function(jqxhr, status, errorMsg) {
							alert("Статус: " + status + " Ошибка: " + errorMsg);
						}
					}); 
				}
			}
		});
		
		$(".NewsCalWeekend").click( function (){
			$("#block_day_message").css("display", "block");
			$( "td" ).removeClass( "active_cell" );
			$( this ).addClass( "active_cell" );
			$(".cont").css("display", "none");
			$(".add_time").css("display", "none");
		});
		$(".NewsCalDefault").click( function (){
			if (window.location.pathname =='/predvaritelnaya-zapis/'){
				if ($("#isAdmin").length>0) {
					$(".add_time").css("display", "block");
				}
			}
			if (window.location.pathname !='/check_day_record/' ) {
				document.getElementById("record_form").style.display="none";
				red_hour=[];
				red_minute=[];
				red_names=[];
				red_emails=[];
				red_phones=[];
				red_comments=[];
				var day=$(this).children('span').text();
				document.getElementById("hidden_day").value=day;
				var month=$("#month_sel option:selected").val();
				if (window.location.pathname =='/check_day_record/predvaritelnaya-zapis/' )
					month=month.replace("/check_day_record/predvaritelnaya-zapis/?month=","");
				else
					month=month.replace("/predvaritelnaya-zapis/?month=","");
				month=month.substr(0,month.indexOf("&year"));
				//ВНИМАНИЕ!!!
				var service=$("h3").text();
				var m=new Date();
				var tmp=new Date();
				tmp.setDate(day);
				tmp.setMonth(month-1);
				if ((m.getMonth()+1)<parseInt(month) || ((m.getMonth()+1)==parseInt(month) && m.getDate()<=parseInt(day)) || ($("#isAdmin").length>0))
				{
					if (parseInt(month)-(m.getMonth()+1)<2 || (parseInt(month)==12 && (m.getMonth()+1)<parseInt(month)) || ($("#isAdmin").length>0)) {
						var block_day=$("#field_block_days").text();
						if (block_day.indexOf(tmp.getDay())+1) {$("#block_day_message").css("display", "block");}
						else {
							$("#block_day_message").css("display", "none");
							$( "td" ).removeClass( "active_cell" );
							$( this ).addClass( "active_cell" );
							document.getElementById("hidden_month").value=month;
							$.ajax({
								url: "/ajax.handler.php",
								type: "POST",
								data: "PAGE=record&day="+day+"&month="+month+"&service="+service,
								dataType:"json",
								async: false,
								success: function(data){
								for (var i=0; i<data.length; i++)
									{red_hour[i]=data[i].hour;
									red_minute[i]=data[i].minute;
									red_names[i]=data[i].fullname;
									red_emails[i]=data[i].email;
									red_phones[i]=data[i].phone,
									red_comments[i]=data[i].comment}
								},
								error:  function(jqxhr, status, errorMsg) {
									 alert("1Статус: " + status + " Ошибка: " + errorMsg);
								}
								
							});
							
							var service_arr=window.location.search.split("&"),
								less = new Array(),
								more = new Array(),
								idservice=0;
							for (var k=0; k<service_arr.length; k++) {
								if (service_arr[k].indexOf("ELEMENT_ID")+1) {
									service_arr[k]=service_arr[k].replace("ELEMENT_ID=","");
									service_arr[k]=service_arr[k].replace("?","");
									idservice=service_arr[k];
								}
							}
							
							$.ajax({
								url: "/ajax.handler.php",
								type: "POST",
								data: "PAGE=delete_time_search&day="+day+"&month="+month+"&service="+idservice,
								dataType:"json",
								async: false,
								success: function(data){
								for (var i=0; i<data.length; i++) {
									less[i]=data[i].hour*100+data[i].minute*1;
									}
								},
								error:  function(jqxhr, status, errorMsg) {
									 alert("2Статус: " + status + " Ошибка: " + errorMsg);
								}
								
							});
							//alert("PAGE=add_time_search&day="+day+"&month="+month+"&service="+idservice);
							$.ajax({
								url: "/ajax.handler.php",
								type: "POST",
								data: "PAGE=add_time_search&day="+day+"&month="+month+"&service="+idservice,
								dataType:"json",
								async: false,
								success: function(data){
								//alert("1"+data);
								for (var i=0; i<data.length; i++) {
									more[i]=data[i].hour*100+data[i].minute*1;
									}
								},
								error:  function(jqxhr, status, errorMsg) {
									 alert("3Статус: " + status + " Ошибка: " + errorMsg);
									 /* var s = "", obj=jqxhr;
									for (prop in obj) {
									   if (typeof obj[prop] != "function") {
										   s += "obj[" + prop + "] = " + obj[prop] + "; ";
									   }
									}
									alert(s); */
								}
								
							});
							var tmp=new Date();
							tmp.setDate(day);
							tmp.setMonth(month-1);
							if (tmp.getDay()==7) { //По дням запись
								var start=$("#field_s_start").text().split(".",2),
									finish=$("#field_s_finish").text().split(".",2),
									period=parseInt($("#field_s_period").text()),
									time=$("#field_s_start").text().split(".",2),
									dinner_start=new Array(),
									dinner_finish=new Array();

							}
							else {
								var start=$("#field_start").text().split(".",2),
									finish=$("#field_finish").text().split(".",2),
									period=parseInt($("#field_period").text()),
									time=$("#field_start").text().split(".",2),
									dinner_start=$("#field_dinner_start").text().split(".",2),
									dinner_finish=$("#field_dinner_finish").text().split(".",2);
							}
							var parent=$(".datetime_table"),
								count_string=0,
								time_hour="";
							parent.append(document.getElementById("record_form"));
							parent.append(document.getElementById("thanks"));
							$(".cont").remove();
						var t1t2_pre=0;
						while (parseInt(time[0])<parseInt(finish[0]) || parseInt(time[1])<parseInt(finish[1])) {
							var t1t2=time[0]*100+time[1]*1;
							if (t1t2_pre==0) {
								for (var j=0; j<more.length; j++) {
									if (t1t2_pre<more[j] && more[j]<t1t2) {
										var m1=parseInt(more[j]/100),
											m2=Math.ceil(((more[j]/100)-parseInt(more[j]/100))*100);
											//alert(m1+":"+m2);
											
									var dinner=true;
									if (!(m1>=parseInt(dinner_start[0]) && m1<=parseInt(dinner_finish[0])))
										dinner=false;
									else
										if(!((m1==parseInt(dinner_start[0]) && m2>=parseInt(dinner_start[1])) && (m1==parseInt(dinner_finish[0]) && m2<parseInt(dinner_finish[1]))))
											dinner=false;
									if (dinner==false) {
										var datetime_string=document.createElement('div');
										$(".cont").removeAttr("id");
										$(datetime_string).attr('id', 'parent');
										$(datetime_string).addClass("cont");
										var status="",
											flag=true,
											str_name="Занято",
											str_email="",
											str_phone="",
											str_comment="";
										for (var i=0; i<red_hour.length; i++) { 
											if (red_hour[i]==m1 && red_minute[i]==m2) {
												str_name=red_names[i];
												str_email=red_emails[i];
												str_phone=red_phones[i];
												str_comment=red_comments[i];
												flag=false; }
										}
										if (m1<10) m1="0"+parseInt(m1);
										else m1=parseInt(m1);
										
												if (flag==false) {
													$(datetime_string).addClass("red_div"+count_string);
													if (m2<10) $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='red_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>0"+m2+"</span>   <span class='red red_name'>"+str_name+"</span>  <span class='red red_email'>"+str_email+"</span>  <span class='red red_phone'>"+str_phone+"</span>  <span class='red red_phone'>"+str_comment+"</span>  <span class='red_message red red"+count_string+"'>Занято</span><span class='delete delete"+count_string+"' data-toggle='modal' data-target='#deleteModal'>(удалить)</span></div>");
													else $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='red_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>"+m2+"</span>   <span class='red red_name'>"+str_name+"</span>  <span class='red red_email'>"+str_email+"</span>  <span class='red red_phone'>"+str_phone+"</span>  <span class='red red_phone'>"+str_comment+"</span>  <span class='red red_message red"+count_string+"'>Занято</span><span class='delete delete"+count_string+"' data-toggle='modal' data-target='#deleteModal'>(удалить)</span></div>");
												}
												else {
													$(datetime_string).addClass("green_div"+count_string);
													if (m2<10) $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='green_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>0"+m2+"</span>   <span class='green green"+count_string+"'>Свободно</span></div>");
													else $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='green_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>"+m2+"</span>   <span class='green green"+count_string+"'>Свободно</span></div>");
												}
												if (count_string!=0) count_string=0;
												else count_string=count_string+1;
											}
											flag=true;
											dinner=true;
											
										//alert(parseInt(time[0])+" сравниваем с "+parseInt(finish[0])+", а это "+parseInt(time[1])+" сравниваем с "+parseInt(finish[1]));
										parent.append(datetime_string);
									} 
								}
							}
							var delete_flag=false;
							for (var j=0; j<less.length; j++) {
								if (t1t2==less[j]) delete_flag=true;
							}
							if (delete_flag==false) {
								var dinner=true;
								if (!(parseInt(time[0])>=parseInt(dinner_start[0]) && parseInt(time[0])<=parseInt(dinner_finish[0])))
									dinner=false;
								else
									if(!((parseInt(time[0])==parseInt(dinner_start[0]) && parseInt(time[1])>=parseInt(dinner_start[1])) && (parseInt(time[0])==parseInt(dinner_finish[0]) && parseInt(time[1])<parseInt(dinner_finish[1]))))
										dinner=false;
								if (dinner==false) {
									var datetime_string=document.createElement('div');
									$(".cont").removeAttr("id");
									$(datetime_string).attr('id', 'parent');
									$(datetime_string).addClass("cont");
									var status="",
										flag=true,
										str_name="Занято",
										str_email="",
										str_phone="",
										str_comment="";
									for (var i=0; i<red_hour.length; i++) { 
										if (red_hour[i]==parseInt(time[0]) && red_minute[i]==parseInt(time[1])) {
											str_name=red_names[i];
											str_email=red_emails[i];
											str_phone=red_phones[i];
											str_comment=red_comments[i];
											flag=false; }
									}
									if (parseInt(time[0])<10) time_hour="0"+parseInt(time[0]);
									else time_hour=parseInt(time[0]);
									
										if (flag==false) {
											$(datetime_string).addClass("red_div"+count_string);
											if (parseInt(time[1])<10) $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='red_div'><span class='h hour"+count_string+"'>"+time_hour+"</span>.<span class='m m"+count_string+"'>0"+parseInt(time[1])+"</span>   <span class='red red_name'>"+str_name+"</span>  <span class='red red_email'>"+str_email+"</span>  <span class='red red_phone'>"+str_phone+"</span>    <span class='red red_phone'>"+str_comment+"</span>  <span class='red_message red red"+count_string+"'>Занято</span><span class='delete delete"+count_string+"' data-toggle='modal' data-target='#deleteModal'>(удалить)</span></div>");
											else $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='red_div'><span class='h hour"+count_string+"'>"+time_hour+"</span>.<span class='m m"+count_string+"'>"+parseInt(time[1])+"</span>   <span class='red red_name'>"+str_name+"</span>  <span class='red red_email'>"+str_email+"</span>  <span class='red red_phone'>"+str_phone+"</span>  <span class='red red_phone'>"+str_comment+"</span>  <span class='red red_message red"+count_string+"'>Занято</span><span class='delete delete"+count_string+"' data-toggle='modal' data-target='#deleteModal'>(удалить)</span></div>");
										}
										else {
											$(datetime_string).addClass("green_div"+count_string);
											if (parseInt(time[1])<10) $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='green_div'><span class='h hour"+count_string+"'>"+time_hour+"</span>.<span class='m m"+count_string+"'>0"+parseInt(time[1])+"</span>   <span class='green green"+count_string+"'>Свободно</span></div>");
											else $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='green_div'><span class='h hour"+count_string+"'>"+time_hour+"</span>.<span class='m m"+count_string+"'>"+parseInt(time[1])+"</span>   <span class='green green"+count_string+"'>Свободно</span></div>");
										}
										if (count_string!=0) count_string=0;
										else count_string=count_string+1;
									}
									flag=true;
									dinner=true;
									
								//alert(parseInt(time[0])+" сравниваем с "+parseInt(finish[0])+", а это "+parseInt(time[1])+" сравниваем с "+parseInt(finish[1]));
								parent.append(datetime_string);
							}
							delete_flag=false;
							t1t2_pre=time[0]*100+time[1]*1;
							if (parseInt(time[1])+period>60) {
								time[0]=parseInt(time[0])+1;
								if (60-parseInt(time[1])<period) {
									time[1]=period-(60-parseInt(time[1]));
								}
								else {
									time[1]=parseInt(time[1])+period;
								}
							}
							else
								if (60-parseInt(time[1])>period) {
									time[1]=parseInt(time[1])+period;
								}
								else {
									time[1]=period-(60-parseInt(time[1]));
									time[0]=parseInt(time[0])+1;
								}
							t1t2=time[0]*100+time[1]*1;
							if (t1t2==finish[0]*100+finish[1]*1) t1t2=2424;
							for (var j=0; j<more.length; j++) {
								if (t1t2_pre<more[j] && more[j]<t1t2) {
									//alert(parseInt(more[j]/100)+"  "+(more[j]/100));
									var m1=parseInt(more[j]/100),
										m2=more[j]-(parseInt(more[j]/100))*100;
									//alert(m1+":"+m2);
									var dinner=true;
									if (!(m1>=parseInt(dinner_start[0]) && m2<=parseInt(dinner_finish[0])))
										dinner=false;
									else
										if(!((m1==parseInt(dinner_start[0]) && m2>=parseInt(dinner_start[1])) && (m1==parseInt(dinner_finish[0]) && m1<parseInt(dinner_finish[1]))))
											dinner=false;
									if (dinner==false) {
										var datetime_string=document.createElement('div');
										$(".cont").removeAttr("id");
										$(datetime_string).attr('id', 'parent');
										$(datetime_string).addClass("cont");
										var status="",
											flag=true,
											str_name="Занято",
											str_email="",
											str_phone="",
											str_comment="";
										for (var i=0; i<red_hour.length; i++) { 
											if (red_hour[i]==m1 && red_minute[i]==m2) {
												str_name=red_names[i];
												str_email=red_emails[i];
												str_phone=red_phones[i];
												str_comment=red_comments[i];
												flag=false; }
										}
										if (m1<10) m1="0"+parseInt(m1);
										else m1=parseInt(m1);
										
												if (flag==false) {
													$(datetime_string).addClass("red_div"+count_string);
													if (m2<10) $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='red_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>0"+m2+"</span>   <span class='red red_name'>"+str_name+"</span>  <span class='red red_email'>"+str_email+"</span>  <span class='red red_phone'>"+str_phone+"</span>  <span class='red red_phone'>"+str_comment+"</span>  <span class='red_message red red"+count_string+"'>Занято</span><span class='delete delete"+count_string+"' data-toggle='modal' data-target='#deleteModal'>(удалить)</span></div>");
													else $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='red_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>"+m2+"</span>   <span class='red red_name'>"+str_name+"</span>  <span class='red red_email'>"+str_email+"</span>  <span class='red red_phone'>"+str_phone+"</span>  <span class='red red_phone'>"+str_comment+"</span>  <span class='red red_message red"+count_string+"'>Занято</span><span class='delete delete"+count_string+"' data-toggle='modal' data-target='#deleteModal'>(удалить)</span></div>");
												}
												else {
													$(datetime_string).addClass("green_div"+count_string);
													if (m2<10) $(datetime_string).html("<span class='red_time' data-target='#deleteTimeModal'  data-toggle='modal'>X</span> <div class='green_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>0"+m2+"</span>   <span class='green green"+count_string+"'>Свободно</span></div>");
													else $(datetime_string).html("<span class='red_time' data-toggle='modal' data-target='#deleteTimeModal'>X</span> <div class='green_div'><span class='h hour"+count_string+"'>"+m1+"</span>.<span class='m m"+count_string+"'>"+m2+"</span>   <span class='green green"+count_string+"'>Свободно</span></div>");
												}
												if (count_string!=0) count_string=0;
												else count_string=count_string+1;
										}
										flag=true;
										dinner=true;
										
									//alert(parseInt(time[0])+" сравниваем с "+parseInt(finish[0])+", а это "+parseInt(time[1])+" сравниваем с "+parseInt(finish[1]));
									parent.append(datetime_string);
								} 
							}
								
								
						}
							
							
						$(".green_div").click( function (){
								$(this).parent().append(document.getElementById("record_form"));
								$(this).parent().append(document.getElementById("thanks"));
								$(".h").removeAttr("id");
								$(".m").removeAttr("id");
								$(this).children('.h').attr('id', 'hour');
								$(this).children('.m').attr('id', 'minute');
								var hour=$("#hour").text();
								var minute=$("#minute").text();
								var m=new Date();
								if ((m.getMonth()+1)==parseInt(month) && m.getDate()==parseInt(day)) {
									if ((m.getHours())<parseInt(hour) || ((m.getHours()+1)==parseInt(hour) && m.getMinute()<=parseInt(minute))) {
										document.getElementById("record_form").style.display="block";
									}
									else {
									
									}
								}
								else {
									document.getElementById("record_form").style.display="block";
								}
							
						});
						$(".red_div").click( function (){
							$(".h").removeAttr("id");
							$(".m").removeAttr("id");
							$(this).children('.h').attr('id', 'hour');
							$(this).children('.m').attr('id', 'minute');
						});
						
						$(".delete").click( function (){
							$(".h").removeAttr("id");
							$(".m").removeAttr("id");
							$(this).parent().children('.h').attr('id', 'hour');
							$(this).parent().children('.m').attr('id', 'minute');
							var day=document.getElementById("hidden_day").value;
							if (day*1<10) day="0"+day;
							var month=document.getElementById("hidden_month").value;
							if (month*1<10) month="0"+month;
							var hour=$("#hour").text();
							var minute=$("#minute").text();
							var service=$("h3").text();
							$("#delete_alert").text("Вы уверены, что хотите удалить запись на "+day+"."+month+" "+hour+":"+minute+"?");
							
						});
						
						$(".red_time").click( function (){
							$(".h").removeAttr("id");
							$(".m").removeAttr("id");
							$(this).parent().find('.h').attr('id', 'hour');
							$(this).parent().find('.m').attr('id', 'minute');
							var day=document.getElementById("hidden_day").value;
							if (day*1<10) day="0"+day;
							var month=document.getElementById("hidden_month").value;
							if (month*1<10) month="0"+month;
							var hour=$("#hour").text();
							var minute=$("#minute").text();
							var service=$("h3").text();
							$("#deleteTime_alert").text("Вы уверены, что хотите удалить строку расписания на "+day+"."+month+" "+hour+":"+minute+"?");
							
						});
						
						$(".add_time").click( function (){
							$(".h").removeAttr("id");
							$(".m").removeAttr("id");
							$(this).parent().find('.h').attr('id', 'hour');
							$(this).parent().find('.m').attr('id', 'minute');
							var day=document.getElementById("hidden_day").value;
							if (day*1<10) day="0"+day;
							var month=document.getElementById("hidden_month").value;
							if (month*1<10) month="0"+month;
							var service=$("h3").text();
							$(".addTime_title").text("Добавление строки расписания на "+day+"."+month);
							
						});
						
							if (window.location.pathname =='/predvaritelnaya-zapis/'){
								if ($("#isAdmin").length>0) {
									$(".delete").css("display", "inline");
									$(".red_name").css("display", "inline");
									$(".red_message").css("display", "none");
									$(".instruction").css("display", "none");
									$(".instruction_title").css("display", "none");
									$(".instruction_footer").css("display", "none");
								}
								else {
									$(".delete").remove();
									$(".red_name").remove();
									$(".red_email").remove();
									$(".red_phone").remove();
									$(".red_comment").remove();
									$(".red_time").remove();
									$(".add_time").remove();
								}
							}

						
					}
				}
			}
			else {
				var parent=$(".datetime_table");
				$( "td" ).removeClass( "active_cell" );
				$( this ).addClass( "active_cell" );
				$("#block_day_message").css("display", "block");
				parent.append(document.getElementById("record_form"));
				parent.append(document.getElementById("thanks"));
				$(".cont").remove();
			}
		}
	});
		$("#send_record").click( function (){
			var day=document.getElementById("hidden_day").value;
			var month=document.getElementById("hidden_month").value;
			var fullname=document.getElementById("fullname").value;
			var email=document.getElementById("email").value;
			var phone=document.getElementById("phone").value;
			var comment=document.getElementById("comment").value;
			var hour=$("#hour").text();
			var minute=$("#minute").text();
			var service=$("h3").text();
			if (fullname=="" || phone=="") {
				$("#stop_record").css("display", "block");
			}
			else {
				var check=true;
				$("#stop_record").css("display", "none");
				/* var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
				if (pattern.test(email)){
					$("#stop_email").css("display", "none");
					
				} else {
					$("#stop_email").css("display", "block");
					check=false;
				} */
				var pattern = /^[0-9()\-+ ]+$/;
				if (pattern.test(phone)){
					$("#stop_phone").css("display", "none");
				} else {
					$("#stop_phone").css("display", "block");
					check=false;
				}

				if (check) {
					$.ajax({
						url: "/ajax.handler.php",
						type: "POST",
						data: "PAGE=record_send&day="+day+"&month="+month+"&hour="+hour+"&minute="+minute+"&fullname="+fullname+"&email="+email+"&phone="+phone+"&comment="+comment+"&service="+service+"&idservice="+idservice,
						dataType:"html",
						async: false,
						success: function(data){
							//alert(data);
							document.getElementById("record_form").style.display="none";
							document.getElementById("thanks").style.display="block";
							setTimeout('location.reload()', 6000);
						},
						error: function(jqxhr, status, errorMsg) {
						    alert("Статус: " + status + " Ошибка: " + errorMsg);
							document.getElementById("record_form").style.display="none";
							document.getElementById("error").style.display="block";
					}
				
					});	
					}
				}
	});
		$("#delete_button").click( function (){
			var day=document.getElementById("hidden_day").value;
			var month=document.getElementById("hidden_month").value;
			var hour=$("#hour").text();
			var minute=$("#minute").text();
			var service=$("h3").text();
			$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=record_delete&day="+day+"&month="+month+"&hour="+hour+"&minute="+minute+"&service="+service,
				dataType:"html",
				async: false,
				success: function(data){
					$("#delete_alert").text("Запись на "+day+"."+month+" "+hour+":"+minute+" удалена.");
					$("#delete_button").css("display", "none");
					setTimeout('location.reload()', 100);
				},
				error: function(jqxhr, status, errorMsg) { 
					$("#delete_alert").text("Не удалось удалить запись на "+day+"."+month+" "+hour+":"+minute+".");
			}
				
		});	
	});	
	
	$("#deleteTime_button").click( function (){
			var day=document.getElementById("hidden_day").value;
			var month=document.getElementById("hidden_month").value;
			var hour=$("#hour").text();
			var minute=$("#minute").text();
			if (day*1<10) day="0"+day;
			if (month*1<10) month="0"+month;
			if (hour*1<10) hour="0"+hour;
			if (minute*1<10) minute="0"+minute;
			var service_arr=window.location.search.split("&"),
				service=0;
			for (var k=0; k<service_arr.length; k++) {
				if (service_arr[k].indexOf("ELEMENT_ID")+1) {
					service_arr[k]=service_arr[k].replace("ELEMENT_ID=","");
					service_arr[k]=service_arr[k].replace("?","");
					service=service_arr[k];
				}
			}  
			$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=delete_time&day="+day+"&month="+month+"&hour="+hour+"&minute="+minute+"&service="+service,
				dataType:"html",
				async: false,
				success: function(data){
					$("#deleteTime_alert").text("Строка расписания на "+day+"."+month+" "+hour+":"+minute+" удалена.");
					$("#deleteTime_button").css("display", "none");
					setTimeout('location.reload()', 10);
				},
				error: function(jqxhr, status, errorMsg) { 
					$("#deleteTime_alert").text("Не удалось удалить строку расписания на "+day+"."+month+" "+hour+":"+minute+".");
			}
				
		});	
	});
	
	function isnumor(x) {
		if (x == 0 || x == '00') return true;
		return res = (x/x) ? true : false;
	}
	
	$("#addTime_button").click( function (){
			var day=document.getElementById("hidden_day").value;
			var month=document.getElementById("hidden_month").value;
			var hour=$("#add_hour").val();
			var minute=$("#add_minute").val();
			if (day*1<10) day="0"+day;
			if (month*1<10) month="0"+month;
			if (hour*1<10) hour="0"+hour;
			if (minute*1<10) minute="0"+minute;
			var service_arr=window.location.search.split("&"),
				service=0;
			for (var k=0; k<service_arr.length; k++) {
				if (service_arr[k].indexOf("ELEMENT_ID")+1) {
					service_arr[k]=service_arr[k].replace("ELEMENT_ID=","");
					service_arr[k]=service_arr[k].replace("?","");
					service=service_arr[k];
				}
			}
			var empty_string="";
			$("#addTime_alert").text(empty_string);
			if (isnumor(hour)) {
				hour=hour*1;
				$("#addTime_alert").text(empty_string);
			}
			else $("#addTime_alert").text("Расписание не было изменено. Пожалуйста, проверьте правильность ввода данных.");
			if (isnumor(minute)) {
				minute=minute*1;
				$("#addTime_alert").text(empty_string);
			}
			else $("#addTime_alert").text("Расписание не было изменено. Пожалуйста, проверьте правильность ввода данных.");
			if (hour>23 || minute>59) $("#addTime_alert").text("Расписание не было изменено. Пожалуйста, проверьте правильность ввода данных.");
			if ($("#addTime_alert").text().length==0) {
				
				$.ajax({
					url: "/ajax.handler.php",
					type: "POST",
					data: "PAGE=add_time&day="+day+"&month="+month+"&hour="+hour+"&minute="+minute+"&service="+service,
					dataType:"html",
					async: false,
					success: function(data){
						$("#addTime_alert").text("Строка расписания на "+day+"."+month+" "+hour+":"+minute+" добавлена.");
						$("#addTime_button").css("display", "none");
						setTimeout('location.reload()', 10);
					},
					error: function(jqxhr, status, errorMsg) { 
						$("#addTime_alert").text("Не удалось добавить строку расписания на "+day+"."+month+" "+hour+":"+minute+".");
					}
					
				});	
			}
	});
			
})
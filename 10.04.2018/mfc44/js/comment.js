$(document).ready( function () {
		var parent = ($("#comment_block").length)? $("#comment_block"): $('<div id="comment_block" />').appendTo('body');
		$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=comment",
				dataType:"json",
				async: false,
				success: function(data){
				for (var i=0; i<data.length; i++)
					{var comment_string=document.createElement('tr');
					$(comment_string).html("<td><div class='id'>"+data[i].id+"</div><div id='com_name'>"+data[i].com_name+"</div><div id='com_date'>"+data[i].com_date+"</div><div class='com'>"+data[i].com+"</div><span class='com_delete' data-toggle='modal' data-target='#comModal'>(удалить)</span></td>");
					parent.append(comment_string);}
				},
				error: function(jqXHR, exception) {
				console.log(jqXHR.responseText);	
				alert("faild");
				}
				
			});



		$(".com_delete").click( function (){
				$(".id").removeAttr("id");
				$(this).parent().children('.id').attr('id', 'com_id_for_delete');
				$("#com_alert").text("Вы уверены, что хотите удалить этот комментарий?");
				
			});
		
		$("#send_comment").click( function (){
			var fullname=document.getElementById("fullname").value;
			var comment=document.getElementById("comment").value;
			if (fullname=="" || comment=="") {document.getElementById("stop_comment").style.display="block";}
			else { document.getElementById("stop_comment").style.display="none";
			$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=comment_send&com_name="+fullname+"&com="+comment,
				dataType:"json",
				async: false,

				success: function(data){
					document.getElementById("thanks").style.display="block";
					location.reload();
				},
				error: function() {
				}
				
		});	
		
					document.getElementById("thanks").style.display="block";
					setTimeout('location.reload()', 6000);
			}		
	});
	
	$("#com_delete_button").click( function (){
			var id_com=$("#com_id_for_delete").text();
			$.ajax({
				url: "/ajax.handler.php",
				type: "POST",
				data: "PAGE=com_delete&id="+id_com,
				dataType:"html",
				async: false,
				success: function(data){
					$("#com_alert").text("Комментарий удалён.");
					$("#com_delete_button").css("display", "none");
					setTimeout('location.reload()', 500);
				},
				error: function(jqxhr, status, errorMsg) {
					$("#com_alert").text("Не удалось удалить комментарий.");
			}
				
		});	
	});
				
	if ($("#isAdmin").length>0) 
		$(".com_delete").css("display", "inline");
	else 
		$(".com_delete").css("display", "none");		
})


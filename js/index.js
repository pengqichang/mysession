$(function(){
	$("#btn").click(function(){
		$.ajax({
			url : "check.php",
			type : 'POST',
			data : {"userName":$("#userName").val(),"pwd":$('#pwd').val()},
			dataType : 'json',
			success : function(data){
				if(data.status == 1){
					$("#tip").html(data.msg);
				}else{
					location.href="manneger.php";
				}
			}
		})
	});
	$("#userName","#pwd").focus(function(){
		$("#tip").html("");
	})
});
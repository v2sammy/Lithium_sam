$(document).ready(function(){
		$('#errorAlert').css("display", "none");
		$('#alertDiv').css("display", "none");
		
		$('#btnCreateWhat').click(function(){
			if($('#txtWhat').val() == ""){
				$('#alertDiv').html("<strong>Fill in the name man !!!");
				$('#alertDiv').css("display","block");
				$('#alertDiv').hide().fadeIn(500);
				return false;
			}
			else
				return true;
		});
		
		$('.whats').click(function(){
			var whatName = $(this).attr("id");
			$.post("/getWhich",{name : whatName},function(data){
				console.log(data);
			});
			return false;
		});
		
		
});







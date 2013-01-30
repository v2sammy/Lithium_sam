// To validate Email id

function validateEmail(sEmail) {
    var filter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (filter.test(sEmail)) {

        return true;
    }
    else {

        return false;
    }


}


// For Admin Pages


function validateInvitePage()
{
	var result = false;

	
	if(validateEmail($("#txtrefemail").val())){
		$("#refemailalertBox").css("display","block").hide().fadeIn(200);
		$("#refemailalertBox").css("display","none");
		result = true;
		
	}

	else{
		$("#refemailalertBox").css("display","block").hide().fadeIn(200);
		$("#refemailalertBox").html("Please enter valid email id");
		
	}

	if(validateEmail($("#txtuseremail").val())){
		$("#useremailalertBox").css("display","block").hide().fadeIn(200);
		$("#useremailalertBox").css("display","none");
		result = true;
		
	}

	else{
		$("#useremailalertBox").css("display","block").hide().fadeIn(200);
		$("#useremailalertBox").html("Please enter valid email id");
		result = false;

	}
		return result;

}



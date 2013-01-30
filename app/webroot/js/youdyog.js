$(document).ready(function(){

		// hide the unwanted contents at the load-time
		$('#errorAlert').css("display", "none");
		$('#alertDiv').css("display", "none");	
		
		
		
		// set nav-bar item active according to the current url
		var pathname = window.location.pathname;
		
		if(pathname == '/connect'){
			$('#homeNav').attr('class','active');
		}
		else if(pathname == '/connect/connections'){
			$('#friendsNav').attr('class','active');
		}
		else if(pathname == '/connect/about'){
			$('#aboutNav').attr('class','active');
		}
		else{
		
		}
		
		// connect to a user
		$('#content').on('click','.connect',function(){		
		
			$.post('/connect',{id:$(this).attr('id')},function(data){
				if(data == '1')
				{
					$('#searchUserResults').html("Connected Successfully.");
				}
				else
				{
					$('#searchUserResults').html("Connection failed!");
				} 
			});
			return false;
		});
		
		// load all groups when groups button is ready
		$('#content').on('ready', '.btnAction', function(){				
			$.post('/getPrivateGroups',{},function(data){
				var newdata = jQuery.parseJSON(data);
				console.log(newdata);
				for(var i=0;i<newdata.length;i++){
					$('.groups').append("<li> <a href='#' id='"+newdata[i]+"' class='groupItem'>"+newdata[i]+"</a> </li>");
				}
			});	
			return false;	
		});
		
		
		// override close dropdown on click of add new group text box
		$('.txtGroupName').click(function(){
			return false;		
		});

		// add a group
		$('.frmNewGroup').submit(function(){
			$.post('/addGroup', {group : $('#txtGroupName').val()} , function(data){
				var newdata = jQuery.parseJSON(data);
				var userid = $(this).closest('div.groups').attr('data-id');
				$('.groups').html('');
					for(var i=0;i<newdata.length;i++){
						$('.groups').append("<li> <a href='#' id='"+newdata[i]+"' class='groupItem'>"+newdata[i]+"</a> </li>");				
					}
					$('#txtGroupName').val('');		
			});
			return false;	
		});	
		
		// add user to a group		
		$( '.groups' ).on( 'click', '.groupItem', function () { 
			var userid = $(this).closest('div.groups').attr('data-id');
			var groupName = $(this).attr('id');
			$.post('connections/addUserToGroup', {userid: userid, group: groupName}, function(data){
				
			});
		});
		
		// add user to a public group
		$('#groupsList').on('click', '.btnJoinPublicGroup', function(){
			$.post('/addUserToPublicGroup', {groupId: $(this).attr('id')}, function(data){
				location.reload();
			});
			return true;
		});
		
		// remove user from public group
		$('#groupsList').on('click', '.btnUnjoinPublicGroup', function(){
			$.post('/removeUserFromPublicGroup', {groupId: $(this).attr('id')}, function(data){
				location.reload();
			});
			return true;
		});
		
		//get members of a public group
		$('#groupsList').on('click', '.publicGroup',function(){
			var id = $(this).attr('id');
			var groupName = $(this).attr('data-name');
			$.post('/getMembers',{groupId : id}, function(data){
				var newdata = jQuery.parseJSON(data);
				$('#groupsList').html('');
				$('#groupLegend').html('<a href="/getPublicGroups" onclick=""> Groups </a> | Members for '+groupName);
				for(var i=0;i<newdata.length;i++)
					$('#groupsList').append('<div class="listDiv"> <a href=""> '+newdata[i]+' </a></div>');
			});
			return false;
		});
		
		// get the searched groups 
		$('#txtSearchGroup').submit(function(){
			var groupName = $(this).val();
			alert(groupName);
			$.post('/searchGroup',{group_name : groupName}, function(data){
				console.log(data);
			});
			return false;
		});		
		$('#btnSearchGroup').click(function(){
			var groupName = $('#txtSearchGroup').val();
			$.post('/searchGroup',{group_name : groupName}, function(data){
				var newdata = jQuery.parseJSON(data);
				console.log(newdata.length);
				$('#groupsList').html('');
				$('#groupLegend').html('<a href="/getPublicGroups" onclick=""> Groups </a> | Search Results for "'+groupName+'"');
				if(newdata.length == 0)
				{
					$('#groupsList').append('<h5><span style="color:#6F6F6F;">No matching groups.</span><h5>');
				}
				else{
					for(var i=0;i<newdata.length;i++)
					{
						$('#groupsList').append('<div class="listDiv"> <a class="publicGroup" data-name="'+newdata[i]['group_name']+'" href="" id="'+newdata[i]['id']['$id']+'">'+newdata[i]['group_name']+'</a>');
						if(newdata[i]['isMember'] == "1"){
							$('#groupsList').append("<button class='btn btn-success pull-right btnUnjoinPublicGroup' style='margin-top : -50px;' id='"+newdata[i]['id']['$id']+"'> UnJoin </button></div>");					
						}
						else{
							$('#groupsList').append("<button class='btn btn-success pull-right btnJoinPublicGroup' style='margin-top : -50px;' id='"+newdata[i]['id']['$id']+"'> Join </button></div>");
						}					
					}
				}
			});
			return false;
		});
		
		// delete a group
		$('#groupsList').on('click','.btnDeleteGroup',function(){
			var groupId = $(this).attr('id');
			$.post('/deleteGroup',{groupId : groupId},function(data){
				console.log(data);
				if(data == '0')
				{
					$('#myGroupsAlert').attr('class','alert alert-danger');
					$('#myGroupsAlert').css('display','block');
					$('#myGroupsAlert').html('<strong> Oops! </strong> Something terribly went wrong. Please try after sometime.');
					$('#myGroupsAlert').hide().fadeIn(300);
				}
				else
				{
					location.reload();
				}
			}); 
			return false;
		});
		
		// search a user via navbar search box
		$('#frmSearchUser').submit(function(){
			var searchName = $('#txtSearchName').val();
			$.post('/searchUser', {searchName : searchName}, function(data){
				var newdata = jQuery.parseJSON(data);
				console.log(newdata);
				for(var i=0;i<newdata.length;i++){
					if(newdata[i]['isFriend'] == '0')
					{
						$('#content').html('<div id="searchUserResults" class="wrapper"> <legend> Search Results </legend> <div id="resultsList" class="listDiv"> Name : '+newdata[i]['name']+' <br> Email : '+newdata[i]['email']+'<button id="'+newdata[i]['id']['$id']+'" class="btn btn-success pull-right connect"> Connect </button> </div></div>');
					}
					else
					{
						$('#content').html('<div id="searchUserResults" class="wrapper"> <legend> Search Results </legend> <div id="resultsList" class="listDiv"> Name : '+newdata[i]['name']+' <br> Email : '+newdata[i]['email']+'<button id="'+newdata[i]['id']['$id']+'" class="btn btn-success pull-right unconnect"> Unconnect </button> </div></div>');
					}
				}
			});
			return false;
		});
		
				
});


/* integration_25-01-13 | login, register | Sumanth, Pavan */

// For alternate Email 

$(document).ready(function(){
		 $("#emailshow").click(function(){
		
			$(".txtemail").show();
			return false;
		});
});

$(document).ready(function(){
		 $("#emailshow").dblclick(function(){
			$(".txtemail").hide();
			return false;
		});
});


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

// Password shopuld contain alpha numeric type

function validateAlphanumeric(sPass) {
    var filter = /^[a-zA-Z0-9]+$/;
    if (filter.test(sPass)) {

        return true;
    }
    else {

        return false;
    }
}


// To validate Password

function validatePassword(sPass) {
    var filter = /^[a-zA-Z0-9]{4,32}$/;
    if (filter.test(sPass)) {

        return true;
    }
    else {

        return false;
    }
}


// username should contain only alphabets n check

function validateAlphabets(sAlpha) {
    var filter = /^[a-zA-Z]+$/;
    if (filter.test(sAlpha)) {

        return true;
    }
    else {

        return false;
    }
}

// to check for login

function validateLogin(val1,val2){

if(validateEmail($("#txtemail").val()) && validatePassword($("#txtpassword").val())){

return true;
}

return false;

}


// for First Name and Last Name
function validateName(sname) {
    var filter = /^[a-zA-Z]{2,32}$/;
    if (filter.test(sname)) {

        return true;
    }
    else {

        return false;
    }
}
	

 // To check for Registration for a user

function validateRegisterPage(){
var result = false;

	if(validateEmail($("#txtemail").val())){
		$("#emailalertBox").css("display","block").hide().fadeIn(200);
		$("#emailalertBox").css("display","none");
		result = true;
		
	}

	else{
		$("#emailalertBox").css("display","block").hide().fadeIn(200);
		$("#emailalertBox").html("Please enter valid email id");
		return false;
	}
	
	if(validateAlphabets($("#txtfname").val())){
		$("#fnamealertBox").css("display","block").hide().fadeIn(200);
		$("#fnamealertBox").css("display","none");
		result = true;
		
	}

	else{
		$("#fnamealertBox").css("display","block").hide().fadeIn(200);
		$("#fnamealertBox").html("First Name cannot be empty");
		return false;
	}
         
         if(validateAlphabets($("#txtlname").val())){
		$("#lnamealertBox").css("display","block").hide().fadeIn(200);
		$("#lnamealertBox").css("display","none");
		result = true;
		
	}

	else{
		$("#lnamealertBox").css("display","block").hide().fadeIn(200);
		$("#lnamealertBox").html("Last Name cannot be empty");
		return false;
	}
         
	if(validateAlphanumeric($("#password").val())){
		$("#passwordalertBox").css("display","block").hide().fadeIn(200);
		$("#passwordalertBox").css("display","none");
		result =  true;
	}

	else{
		$("#passwordalertBox").css("display","block").hide().fadeIn(200);
		$("#passwordalertBox").html("Password cannot be empty!");
		return false;

	}
	if(validateAlphabets($("#txtusername").val())){
		$("#usernamealertBox").css("display","block").hide().fadeIn(200);
		$("#usernamealertBox").css("display","none");
		result = true;
	}

	else{
		$("#usernamealertBox").css("display","block").hide().fadeIn(200);
		$("#usernamealertBox").html("Only Alphabets allowed");
		return false;
	}
	return result;
	
}


// password Strength ..... 

function passwordStrength(password,passwordStrength,errorField)
{
 var desc = new Array();
 desc[0] = "Password strength: Very weak";
 desc[1] = "Password strength: Weak";
 desc[2] = "Password strength: Better";
 desc[3] = "Password strength: Medium";
 desc[4] = "Password strength: Strong";
 desc[5] = "Password strength: Strongest";

 var score   = 0;

 //if password bigger than 6 give 1 point
 if (password.length > 6) score++;
 
 //if password has both lower and uppercase characters give 1 point 
 if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

 //if password has at least one number give 1 point
 if (password.match(/\d+/)) score++;

 //if password has at least one special caracther give 1 point
 if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) score++;

 //if password bigger than 12 give another 1 point
 if (password.length > 10) score++;

  passwordStrength.innerHTML = desc[score];
  passwordStrength.className = "strength" + score;

 if (password.length < 6)
 {} 
 
}

// Recaptcha Colors / Custimization ... use white, red, or remove script for classic use

var RecaptchaOptions = {
    theme : 'white'
 };
 
// for Password Comparission
 
 function comp_pass()
 {
 var pass_comp = false;

 	if($("#password").val() == $("#txtcpass").val())
 	{
		$("#cpasswordalertBox").css("display","block").hide().fadeIn(200);
	$("#cpasswordalertBox").css("display","none");
	result = true;	
	}
        else
        {
		$("#cpasswordalertBox").css("display","block").hide().fadeIn(200);
		$("#cpasswordalertBox").html("Password did not match. Please try again!!");
		return false;
        }
 
 return pass_comp;       
 } 
 
// for phone number 

$(document).ready(function() {
    $("#txtcontactno").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 190 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
});

// Recaptcha Colors / Custimization ... use white, red, or remove script for classic use

var RecaptchaOptions = {
    theme : 'white'
 };
 




// For alternate Email 

$(document).ready(function(){
		 $("#emailshow").click(function(){
		
			$(".txtemail").show();
			return false;
		});
});

$(document).ready(function(){
		 $("#emailshow").dblclick(function(){
			$(".txtemail").hide();
			return false;
		});
});



/* for Participate pages*/


function showdiv(id)
{
      document.getElementById(id).style.display = "block";
      
}
function hidediv(id)
{
	document.getElementById(id).style.display ="none";
} 



/* forgotten password */

$(document).ready(function() {
	$('#btnSubmitEmail').click(function(){
		var email = $('#txtForgotEmail').val();
		$.post('/getLink',{email : email}, function(data){
			var newdata = jQuery.parseJSON(data);
			$('#uniqueId').val(newdata['link']);
			$('#newPassword').css('display' , 'block');
			$('#emailContainer').append('<a href ="http://localhost/forgotpassword/'+newdata['link']+'" id="changePasswordLink">Change Password </a>');
		});
	});
	
	$('#partner_submit').click(function(){
		var what = $('#select_what').find(":selected").text();
		var date = $('#datepicker').val();
		var where = $('#select_where').find(":selected").text();
		var how = $('#select_how').find(":selected").text();
		var amount = $('#txtcontactno').val();
		// new variable : value 
		//alert(what);
		$.post('/addPartner',{what:what, date:date, where:where, how:how, amount: amount});
		return false;
	});
	
	$('#btnResetPassword').click(function(){
		var newPassword = $('#txtNewPassword').val();
		var confirmPassword = $('#txtConfirmPassword').val();
		
		if(newPassword != confirmPassword)
		{
			$('#alertNewPassword').css('display','block');
			$('#alertNewPassword').attr('class','alert alert-danger');
			$('#alertNewPassword').html('<strong> Oops! </strong> Passwords do not match. Please try again.');
			$('#alertNewpassword').hide().fadeIn(300);

		}
		else
		{
			var uniqueId = location.pathname.substring(16);
			$.post('/updatePassword',{password : newPassword, uniqueId : uniqueId},function(data){
				if(data == 1){
					$('#alertNewPassword').css('display','block');
					$('#innerWrapper').css('display','none');
					$('#alertNewPassword').attr('class','alert alert-success');
					$('#alertNewPassword').html('Your password has been changed. Please <strong> <a href="/login"> login </a> </strong> with your new password.');
					$('#alertNewpassword').hide().fadeIn(300);
				}
			});
		}
		return false;
	});
});


$(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: new Date() 
    });
  });

// for adding values in database ... 


<div class="wrapper" id="wrapperLoginn" style="align:center; margin-top:50px">
<div id="newPassword">
<legend><div style="color : #58ACFA !important;"> Reset Password </div></legend>

<div class="control-group" style="margin-left:80px; margin-top: 15px">
<label class="control-label" for="txtNewPassword"">New Password
<input type="password" id="txtNewPassword" style="margin-Right:10px"/>
</label>
</div>

<div class="control-group" style="margin-left:60px">
<label class="control-label" for="txtConfirmPassword">Confirm Password
<input type="password" id="txtConfirmPassword"/>
</label>
</div>
<center>
<?php
$publickey = "6Lcb8tsSAAAAAIld1G9c4CS4nkPzgkqxpghlTrqw"; // you got this from the signup page
echo "<span style='margin-top:30px; margin-left: 10px;'>".recaptcha_get_html($publickey)."</span>";
?>
</center>
<br>
<button id="btnResetPassword" class="btn btn-primary" style="margin-left:200px"> Submit </button>
<br>
<br>
<div id="alertNewPassword"> </div>
</div>
</div>
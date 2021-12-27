<?php
require_once 'includes/header.php';
?>
	<div class="three">
	<div class="three-inner-container">
		<div class="subscribe">
				<h1>Subscribe to newsletter</h1>
			<p>Subscribe to our newsletter and get 10% discount on pineapple glasses</p>
			<div class="form-subscribe">	
				<form name="subscribeform" method="post" action="includes/validate.php">
				<div class="input-email">
				<input type="text" id="email-input" name="email" placeholder="Type your email address here..." onmouseout="return validateEmail();" onclick="return btnOn();" />
				<button type="submit" id="email-btn" name="submit" onmouseover="return validateChk();" onmouseout="return btnOn();" />&#8594;</button>
				</div>
				<div class="ckbx">
				<input type="checkbox" id="email-chekbox" name="agree" onclick="return btnOn();" />
				<p>I agree to <a href=#>terms of service</a></p>
				</div>
				</form>
				<p class="error" id="error-message"></p>
<?php 
if(!isset($_GET['error'])) {
exit();
} else {
$signupCheck = $_GET['error'];
}
if ($signupCheck== "emptyfield") {
echo '<p class="error">Email address is required</p>';
exit();
}
elseif  ($signupCheck== "invalidemail") {
echo '<p class="error">Please provide a valid e-mail address</p>';
exit();
}
elseif  ($signupCheck== "checkboxunchecked") {
echo '<p class="error">You must accept the terms and conditions</p>';
exit();
}
elseif  ($signupCheck== "coaddress") {
echo '<p class="error">We are not accepting subscriptions from Colombia emails</p>';
exit();
}
elseif  ($signupCheck== "emailtaken") {
echo '<p class="error">This email is already registered.</p>';
exit();
}
?>
			</div>
		</div>
<?php
require_once 'includes/footer.php';
?>
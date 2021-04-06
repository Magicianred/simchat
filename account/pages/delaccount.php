<?php 
	if (!checklogin()) {
		header('Location: ../../index.php?act=anon');
	}
?>

<div style = "">
<p> Delete your account </p>
<p> This action cannot be undone. Please be certain.</p>
<form action = "./account/delaccount_ok.php" method = "POST">
	<input type = "password" name = "passconfirm1" maxlength='20' placeholder = "enter your password" required>
	<br><br>
	<input type = "password" name = "passconfirm2" maxlength='20' placeholder = "enter your password again" required>
	<br><br>
	<button class = "btn1"> Confirm </button>
	<button class = "btn1" type = "button" onclick = "location.href='./?act=user'"> back </button>
</form>
</div>
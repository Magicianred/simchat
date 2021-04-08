<?php 
	if (isset($_SESSION['userid'])) {
		$writeform_username = $_SESSION['userid'];
		$writeform_passwd = "*******";
	} else {
		$writeform_username = "Anonymous";
		$writeform_passwd = "<input class = 'inputbox2' type = 'password' name = 'passwd' placeholder = 'password' required>";
	}
?>
<link href = "./css/write_form.css" rel = "stylesheet" type = "text/css">
<div class = "write_form">
	<form action = "./board/write_ok.php" method = "POST" >
	<table>
		<tr>
			<td style = "width: 20%;">
				<?=(string)$writeform_username?>
				<br>
				<?=(string)$writeform_passwd?>
			</td>
			<td style = "width: 50%;">
				<textarea rows = "2" name = "contents" wrap = "hard" required></textarea>
			</td>
			<td style = "width: 15%;">
				<button type = "submit" class = "btn1"> Submit </button>
			</td>
		</tr>
	</table>
	</form>
</div>
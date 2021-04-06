<?php 
	if (!checklogin()) {
		header('Location: ../index.php?act=anon');
	}
?>
<?php
	$usersignupdate = str_replace("-", "/", $usersignupdate); 
?>

<div style = "">
	<table style = "width: 320px; margin: auto;">
	<tr>
		<td> <img src = "<?=(string)$avatar?>" style = "height: 60px; width: 60px; border-radius: 10px 10px; box-shadow: 0px 0px 5px #000;"> </td>
		<td style = "padding-left: 5%; font-family: Noto Sans JP, sans-serif; font-size: 105%;">
			<p style = "text-align: left;"> 
			User <span style = "color: grey;"><?=(string)$r?></span></p>
			<p style = "text-align: left;"> (Sign Up date: <?=(string)$usersignupdate?>) </p>
		</td>
	</tr>
	</table>
	<button class = "btn1" type = "button" onclick = "location.href='./account/signout.php'"> Sign Out </button>
	<button class = "btn1" type = "button" onclick = "location.href='./index.php?act=editinfo'"> Edit account </button>
	<button class = "btn1" type = "button" onclick = "location.href='./index.php?act=delaccount'"> Delete account </button>
</div>
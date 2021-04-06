<!DOCTYPE html>

<html lang = "ko">
<head>
	<meta http-equiv = "content-type" content = "text/html" charset = "utf-8">
	<title> SIMCHAT 0.1.0 </title>
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<link href = "https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel = "stylesheet"> 
	<link rel = "chortcut icon" href = "./files/icon.svg">
	<?php
		include './account/session.php';
		
		function checklogin() {	
			if (isset($_SESSION['userid'])) {
				return true;
			} else {
				return false;
			}
		}
		function loginredirect() {
			if (checklogin()) {
				header('Location: ./?act=user');
			}
		}
		
		if (checklogin()) {
			echo '<link href = "./css/'.$_SESSION['theme'].'" rel = "stylesheet" type = "text/css">';
			$r = (string)$_SESSION['userid'];
			$usersignupdate = (string)$_SESSION['signupdate'];
			$avatar = (string)$_SESSION['avatar'];
		} else {
			echo '<link href = "./css/theme_default.css" rel = "stylesheet" type = "text/css">';
			$r = "Anonymous"."(".$_SERVER['REMOTE_ADDR'].")";
		}	
	?>
</head>

<body>

<div id = "container">

	<div id = "header">
		<p> &nbsp;Welcome user <?=(string)$r?></p>
		<div class = "reload">
			<a class = "header_a" href = "./"> <b>Reload</b> </a>
		</div>
	</div>
	
	<div id = "main">
		<div id = "useraccount">
			<?php require_once "./account/useraccount.php"; ?>
		</div>
		
		<div id = "contents">
			<div class = "write">
			<?php require_once "./board/write_form.php"; ?>
			</div><br>
			<?php require_once "./board/view_list.php"; ?>
		</div>
	</div>
	
	<div id = "footer">
		<p> SIMCHAT 0.1.0 &nbsp;&nbsp; | &nbsp;&nbsp; 
		<a class = "footer_a" href = "https://github.com/antibiotics11/simchat"> GitHub </a>
		</p>
		<p> Made by <a class = "footer_a" href = "https://blog.abxattic.com"> Antibiotics </a>, 2021</p>
	</div>
	
</div>

</body>
</html>
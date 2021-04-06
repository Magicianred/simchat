<?php
	if ((int)$_POST['theme']) {
		include './session.php';
		include '../func/db.php';
		$theme = $_POST['theme'];
		$userid = $_SESSION['userid'];
		$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
		$theme_sql = "update members set theme='$theme' where userid='$userid';";
		$theme_result = mysqli_query($conn, $theme_sql);
		#$_SESSION['theme'] = $theme;
		session_destroy();
		echo "
			<!DOCTYPE html>
			<meta charset = 'utf-8'>
			<script type = 'text/javascript'>
				alert('Success. Please sign in again.');
				location.href='./index.php?act=editinfo';
			</script>
			";
		#header('Location: ../index.php?act=editinfo');
	}
?>
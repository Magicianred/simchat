<?php
	if ($_POST['userid'] || $_POST['password']) {
		
		include '../func/db.php';
		include './session.php';
		$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
		$signin_sql = "select * from members where userid='".$_POST['userid']."';";
		$signin_result = mysqli_query($conn, $signin_sql);
		
		while ($userinfo = mysqli_fetch_array($signin_result)) {
        	$userid = (string)$userinfo['userid'];
			$password = (string)$userinfo['password'];
			$signupdate = (string)$userinfo['signupdate'];
			$avatar = (string)$userinfo['avatar'];
			
			if ((int)$userinfo['theme'] == (int)1) {
				$theme = 'theme_default.css';
			} else if ((int)$userinfo['theme'] == (int)2) {
				$theme = 'theme_milkyway.css';
			} else if ((int)$userinfo['theme'] == (int)3) {
				$theme = 'theme_snowmt.css';
			}
		}
		
		if ((string)md5((string)$_POST['password']) == (string)$password) {
			$_SESSION['userid'] = (string)$userid;
			$_SESSION['theme'] = (string)$theme;
			$_SESSION['signupdate'] = (string)$signupdate;
			$_SESSION['avatar'] = (string)$avatar;
			header('Location: ../index.php?act=user');
		} else {
			echo "
			<script type = 'text/javascript'>
				alert('Incorrect username or password.');
				location.href='../';
			</script>
			";
		}	
	} else {	
		echo "
		<script type = 'text/javascript'>
			alert('Incorrect username or password.');
			location.href='../';
		</script>
		";
	}
?>
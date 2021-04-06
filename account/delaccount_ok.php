<?php
	if ((string)$_POST['passconfirm1'] == (string)$_POST['passconfirm2']) {
		include '../func/db.php';
		include './session.php';
		$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
		$chaccount_sql = "select * from members where userid='".$_SESSION['userid']."';";
		$chaccount_result = mysqli_query($conn, $chaccount_sql);
		
		while ($userinfo = mysqli_fetch_array($chaccount_result)) {
			$password = (string)$userinfo['password'];
		}
		
		if ((string)md5((string)$_POST['passconfirm1']) == (string)$password) {
			$delaccount_sql = "delete from members where userid = '".$_SESSION['userid']."';";
			$delaccount_result = mysqli_query($conn, $delaccount_sql);
			session_destroy();
			echo "
			<script type = 'text/javascript'>
				alert('Account successfully deleted');
				location.href='../';
			</script>
			";
		} else {
			echo "
			<script type = 'text/javascript'>
				alert('Incorrect password.');
				location.href='../';
			</script>
			";
		}
	} else {
		echo "
		<script type = 'text/javascript'>
			alert('Incorrect password.');
			location.href='../';
		</script>
		";
	}
?>
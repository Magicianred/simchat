<?php
	if ($_POST['userid'] || $_POST['password']) {
		
		include '../func/db.php';
		$userid = $_POST['userid'];
		$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");	
		$idcheck_sql = "select * from members where userid='$userid';";
		$idcheck_result = mysqli_query($conn, $idcheck_sql);
		
		while ($idcheck = mysqli_fetch_array($idcheck_result)) {
			$id_idcheck = (string)$idcheck['userid'];
		}
		if ((string)$userid == (string)$id_idcheck) {
			echo "
			<script type = 'text/javascript'>
				alert('userid already exists.');
				location.href='../index.php?act=signup';
			</script>
			";
		}
		
		$password = (string)md5((string)$_POST['password']);
		$signupdate = date("Y-m-d");
		$signup_sql = "insert into members values('$userid','$password','1','./files/etc/anon.png','$signupdate');";
		$singup_result = mysqli_query($conn, $signup_sql);
		echo "
		<script type = 'text/javascript'>
			alert('Successfully created account. Please sign in again.');
			location.href='../index.php?act=signin';
		</script>
		";
		
		
	} else {
		header('Location: ../');
	}
?>
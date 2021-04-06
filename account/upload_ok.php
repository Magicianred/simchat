<!DOCTYPE html>
<?php
	if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
		include "../func/db.php";
		include "./session.php";
		
		$avatar = $_FILES['avatar']['name'];
		$userid = $_SESSION['userid'];
		$loc = "../files/avatars";
		$ext = explode('.', (string)$avatar);
		$ext = array_pop($ext);
		$allowed_ext = array('jpg','jpeg','png');
	 
		if(!in_array($ext, $allowed_ext)) {
			echo " 
			<script type = 'text/javascript'>
				alert('extension not allowded');
				location.href='../';
			</script>
			";
		}

		#if (!is_dir("$loc/$userid")) {
		#	mkdir((string)$loc/$userid, 0707);
		#}
		move_uploaded_file($_FILES['avatar']['tmp_name'], $loc.'/'.$avatar);

		$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
		$ava_sql = "update members set avatar='./files/avatars/$avatar' where userid='$userid';";
		$ava_result = mysqli_query($conn, $ava_sql);
		$_SESSION['avatar'] = './files/avatars/'.$avatar;

		echo "
			<script type = 'text/javascript'>
				alert('File successfully Uploaded');
				location.href='../';
			</script>
		";
	} else {
		echo "
			<script type = 'text/javascript'>
				alert('No uploaded file');
				location.href='../';
			</script>
		";
	}
?>
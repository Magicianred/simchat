<!DOCTYPE html>
<html>
<head>
        <meta charset = "utf-8">
</head>
<body style = "background-color:;">

<?php
	if (isset($_GET['code'])) {

		$code = (int)$_GET['code'];
		include '../account/session.php';
		include '../func/db.php';
		$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
		require_once '../func/encoding.php';
		
		function delete_post() {
			global $conn;
			global $code;
			$dsql_1 = "delete from board where code='$code';"; 
			$dsql_2 = "delete from numlike where code='$code';";
			$del_confirm_1 = mysqli_query($conn, (string)$dsql_1);
			$del_confirm_2 = mysqli_query($conn, (string)$dsql_2);
			echo "
				<script type = 'text/javascript'>
		     		alert('Confirm');
					window.location.href = '../';
				</script>
			";
		}

		if (isset($_SESSION['userid'])) {
			$userid = (string)$_SESSION['userid'];
			$che_sql = "select * from board where code=$code";
			$che_result = mysqli_query($conn, $che_sql);
			while ($info = mysqli_fetch_array($che_result)) {
				$boa_userid = (string)$info['username'];
			}
			if ((string)$userid == (string)$boa_userid) {
				delete_post();
			} else {
				echo "
				<script>
        			alert('Unable to delete this post');
				    window.location.href = '../';
				</script>";
			}
		} else {
			if (isset($_POST['passwd'])) {
				$che_sql = "select * from board where code=$code";
				$che_result = mysqli_query($conn, $che_sql);
				
				while ($info = mysqli_fetch_array($che_result)) {
					$boa_passwd = (string)$info['password'];
				}

				if ((string)md5((string)$_POST['passwd']) == (string)$boa_passwd) {
					delete_post();
				} else {
					echo "
					<script type = 'text/javascript'>
						alert('password does not match');
						history.back();
					</script>
					";
				}
			}
		}
	} else {
		echo "
			<script type = 'text/javascript'>
				history.back();
			</script>
        ";
	}
?>
</body>
</html>
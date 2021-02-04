<!DOCTYPE html>
<html>
<body style = "background-color: #292a2d;">
<?php
	$conn = mysqli_connect("localhost","simchat","","simchat");
	$encoding = "set names utf8;";
	$set_encoding = mysqli_query($conn, $encoding);
	$sql = "select * from board order by code desc limit 1;";
	$result = mysqli_query($conn, $sql);

	#$username = $_POST['id'];
	$username = "Anonymous";
	
	while ($info = mysqli_fetch_array($result)) {
        	$code = $info['code'] + 1;
	}

	$contents = $_POST['contents'];
	$passwd = $_POST['passwd'];
	$today = date("Y-m-d");

	$wsql = "insert into board values('$code','$username','$passwd','$contents','$today', '0', '0');";
	echo $wsql;
	$writeresult = mysqli_query($conn, $wsql);

	echo "
	<script>
        	alert('Confirm');
	        window.location.href = './';
	</script>";
?>
</body>
</html>

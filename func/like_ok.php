<!DOCTYPE html>
<html>
<body style = "background-color: #292a2d;">
<?php
	if ($_GET['code']) {
		$code = $_GET['code'];
		$conn = mysqli_connect("localhost","simchat","","simchat");
		$sql = "update board set numlike = numlike + 1 where code='$code';";
		$result = mysqli_query($conn, $sql);
		header('Location: ../');
	} else {
		header('Location: ../');
	}
?>
</body>
</html>

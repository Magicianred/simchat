<!DOCTYPE html>
<html>
<body style = "background-color: #292a2d;">
<?php
include_once '../board/auto_reset_count.php';
	
if ($_GET['code']) {

	$ip = $_SERVER['REMOTE_ADDR'];
	include '../func/db.php';
	$code = $_GET['code'];
	$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
	$confov = "select * from numlike where ip = '$ip' and code = '$code'";
	$result_1 = mysqli_query($conn, $confov);

	while ($confirm_1 = mysqli_fetch_array($result_1)) {
		$confno = $confirm_1['no'];
	}

	if ($confno) {
		echo "
		<script>
		alert('History already exists');
		history.back();
		</script>
		";
	} else if ($confno == "") {
		
		$adl = "update board set numlike = numlike + 1 where code='$code';";
		$result_3 = mysqli_query($conn, $adl);

		$sel = "select * from numlike order by no desc limit 1;";
		$result_2 = mysqli_query($conn, $sel);

		while ($addno_1 = mysqli_fetch_array($result_2)) {
			$no = $addno_1['no'] + 1;
		}

		$addno_2 = "insert into numlike values('$no','$ip','$code');";
		$result_4 = mysqli_query($conn, $addno_2);
						
		header('Location: ../');

	}

} else {
	header('Location: ../');
}
?>
</body>
</html>

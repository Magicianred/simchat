<?php 
	if (!checklogin()) {
		header('Location: ../../index.php?act=anon');
	}
?>

<div style = "">
	<!-- <p> User <?=(string)$r?></p> -->
	<p> Select another theme </p>
	<form method = "POST" action = "./account/editinfo_ok.php">
		<select name = "theme">
			<option value = "1"> Default </option>
			<option value = "2"> Milky Way </option>
			<option value = "3"> Snow Mountain </option>
		</select>
	<button class = "btn1" type = "submit">Change theme</button>
	</form>

	<p> Upload your Avatar </p>
	<form enctype = "multipart/form-data" action = "./account/upload_ok.php" method = "POST">
		<!-- <label class = "btn1" > <span style = "font-size: 13px; font-family:Trebuchet MS;"> 찾아보기 </span> -->
		<span class = "uploadavatar">
		<input class = "btn1" type = "file"  type = "file" name = "avatar">
		</span>
		<!-- </label> -->
		<button class = "btn1" type = "submit">Upload</button>
	</form>
	<br>
	<button class = "btn1" type = "button" onclick = "location.href='./?act=user'"> back </button>
</div>
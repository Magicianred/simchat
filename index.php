<!DOCTYPE html>

<html lang = "ko">
<head>
	<meta http-equiv = "content-type" content = "text/html" charset = "utf-8">
	<title> SIMCHAT 0.0.2 </title>
	<!-- <meta name = "viewport" content = "width=device-width, initial-scale=1.0"> -->
	<link href = "https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel = "stylesheet"> 
	<link href = "./css/main.css" rel = "stylesheet" type = "text/css">
	<link rel = "chortcut icon" href = "./files/icon.svg">

	<?php
                $r = $_SERVER['REMOTE_ADDR'];

                if ($_GET['r']) {
                } else {
                        header('Location: ./?r=true');
                }
        ?>

</head>

<body>

<div id = "container">

	<div id = "header">
		<?php #include "./db/session.php"; ?>
		<p> &nbsp;Welcome user Anonymous (<?php echo $r; ?>)</p>
		<a href = ""> <?php #echo $username; ?> </a>
		<div class = "reload">
			<a class = "header_a" href = "./"> <b>Reload</b> </a>
		</div>
	</div>
	
	<div id = "main">
		<div id = "contents">
			<div class = "write">
			<?php 
				require_once "./board/write_form.html"; 
			?>
			</div><br>
			<?php 
				require_once "./board/view_list.php"; 
			?>
		</div>
	</div>
	
	<div id = "footer">
		<p> SIMCHAT 0.0.2 &nbsp;&nbsp; | &nbsp;&nbsp; 
		<a class = "footer_a" href = "https://github.com/antibiotics11/simchat"> GitHub </a>
		</p>
		<p> Made by <a class = "footer_a" href = "https://blog.abxattic.com"> Antibiotics </a>, 2021</p>
	</div>
	
</div>

</body>
</html>

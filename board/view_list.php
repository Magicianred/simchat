<link href = "./css/view_list.css" rel = "stylesheet" type = "text/css">
<?php
	include './func/db.php';
	include './account/session.php';
	$conn = mysqli_connect("$hostname","$dbuserid","$dbpasswd","simchat");
	require_once './func/encoding.php';
	$view_sql = "select * from board order by code desc;";
	$result = mysqli_query($conn, $view_sql);
	while ($board = mysqli_fetch_array($result)) { 
		if ((string)$board['username'] == 'Anonymous') {
			$viewavatar = "./files/etc/anon.png";
			$viewdel = true;
		} else {
			$avatar_sql = "select * from members where userid = '".$board['username']."';";
			$avatar_sql = mysqli_query($conn, $avatar_sql);
			while ($useravatar = mysqli_fetch_array($avatar_sql)) {
				$viewavatar = (string)$useravatar['avatar']; 
			}
			if ($_SESSION['userid'] == $board['username']) {
				$viewdel = true;
			} else {
				$viewdel = false;
			}
		}
?>

<br>
<div class = "view_list">
<table>
	<tr>
	<td width = "30%" style = "vertical-align: top; text-align: center;">
		<img src = "<?=$viewavatar?>" alt = "img-avatar">
		<p> <?=htmlspecialchars($board['username'])?> </p>
	</td>
	<td width = "65%" style = "vertical-align: top;">
		<div class = "read">
			<p style = "word-break: break-all;">
			<?=htmlspecialchars($board['contents'])?>
			</p>
			<div style = "width: 100%; border-top: 1px solid grey; text-align: center;">
			<span><?=$board['date']?></span>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href = "./func/like_ok.php?code=<?=$board['code']?>">
				<img src = "./files/etc/like.svg" alt = "like">
				<?=$board['numlike']?>
			</a>
			<?php if ($viewdel) { ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<div style = "display: inline-block;">
			<details>
				<summary> Delete </summary>
				<p> enter your password </p>
				<form action = "./board/delete_ok.php?code=<?=$board['code']?>" method = "POST">
					<input type = "password" name = "passwd" placeholder = "password" required>
					<button class = "btn1"> Delete </button>
				</form>
			</details>
			</div>
			<? } ?>
			</div>
		</div>
	</td>
	</tr>
</table>
</div>

<?php } ?>
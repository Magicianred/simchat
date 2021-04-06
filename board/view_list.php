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

<script type = "text/javascript">
function del<?=$board['code']?>(){
	
	var url = './board/delete_ok.php?code=<?=$board['code']?>&passwd=';
	var text = prompt("enter your password","");
	
	if (text) {
		location.href = url + text;
	}
}
</script>
<br>
<div class = "view_list" width = "100%">
<table width = "100%">
	<tr>
	<td width = "30%" style = "vertical-align: top; text-align: center;">
		<img src = "<?=$viewavatar?>" alt = "img-avatar" style = "height: 50px; width: 50px; border-radius: 10px 10px; border: 1px solid black;">
		<p> <?=htmlspecialchars($board['username'])?> </p>
	</td>
	<td width = "65%" style = "vertical-align: top;">
		<div class = "read">
			<p style = "word-break: break-all;">
			<?=htmlspecialchars($board['contents'])?>
			</p>
			<div style = "width: 100%; border-top: 1px solid grey; text-align: center;">
			<?=$board['date']?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href = "./func/like_ok.php?code=<?=$board['code']?>" style = "text-decoration: none; color: black;">
				<img src = "./files/etc/like.svg" alt = "like" width = "15px">
				<?=$board['numlike']?>
			</a>
			<?php if ($viewdel) { ?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href = "javascript:del<?=$board['code']?>()" style = "text-decoration: none; color: black;">Delete</a>
			<? } ?>
			</div>
		</div>
	</td>
	</tr>
</table>
</div>

<?php } ?>
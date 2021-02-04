<?php
	$conn = mysqli_connect("localhost","simchat","","simchat");
	$encoding = "set names utf8;";
	$set_encoding = mysqli_query($conn, $encoding);
	$view_sql = "select * from board order by code desc;";
	$result = mysqli_query($conn, $view_sql);
	while ($board = mysqli_fetch_array($result)) { ?>

<script type = "text/javascript">
function del<?=$board['code']?>(){
	var url = './board/delete_ok.php?code=<?=$board['code']?>&passwd=';
	var text = prompt("Enter the password","");
		if (text) {
			location.href = url + text;
		}
}
</script>
<br>
<div class = "view_list" width = "100%">
<table width = "60%">
	<tr>
	<td width = "10%" style = "vertical-align: top;">
		<img src = "./files/anon.png" alt = "이미지" width = "40px">
		<p> <?php echo htmlspecialchars($board['username']);?> </p>
	</td>
	<td width = "50%" style = "vertical-align: top;">
		<div class = "read">
			<p style = "word-break: break-all;">
			<?php echo htmlspecialchars($board['contents']);?>
			</p>
			<div style = "width: 100%; border-top: 1px solid grey; text-align: center;">
			<?php echo $board['date'];?>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href = "./func/like_ok.php?code=<?=$board['code']?>">
				<img src = "./files/like.svg" alt = "like" width = "15px">
				<?php echo $board['numlike'];?>
			</a>
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href = "javascript:del<?=$board['code']?>()">삭제하기</a>
			</div>
		</div>
	</td>
	</tr>
</table>
</div>

<?php } ?>

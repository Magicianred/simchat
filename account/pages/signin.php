<div style = "">
<script type = "text/javascript">
	function alponly(e)  {
			e.value = e.value.replace(/[^\\!-z]/gi,"");
			/* e.value = e.value.replace(/[^A-Za-z]/ig, '') */
	}
</script>
<p> Sign in to SimChat </p>
<form action = "./account/signin_ok.php" method = "POST">
	<input type = "text" oninput = "alponly(this)" name = "userid" maxlength = "15" placeholder = "usernid" required>
	<br><br>
	<input type = "password" oninput = "alponly(this)" name = "password" maxlength = "20" placeholder = "password" required>
	<br><br>
	<button class = "btn1"> Sign In </button>
	<button class = "btn1" type = "button" onclick = "location.href='./index.php?act=signup'"> Sign Up </button>
	<button class = "btn1" type = "button" onclick = "location.href='./index.php?act=anon'"> back </button>
</form>
</div>
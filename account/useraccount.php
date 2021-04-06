<?php
	if ((string)$_GET['act'] == 'anon') {
		loginredirect();
		require_once "./account/pages/anon.php";
	} else if ((string)$_GET['act'] == 'user') {
		if (!checklogin()) {
			header('Location: ./index.php?act=anon');
		}
		require_once "./account/pages/userinfo.php";
	} else if ((string)$_GET['act'] == 'signin') {
		loginredirect();
		require_once "./account/pages/signin.php";
	} else if ((string)$_GET['act'] == 'signup') {
		loginredirect();
		require_once "./account/pages/signup.php";
	} else if ((string)$_GET['act'] == 'delaccount') {
		if (!checklogin()) {
			header('Location: ./index.php?act=anon');
		}
		require_once "./account/pages/delaccount.php";
	} else if ((string)$_GET['act'] == 'editinfo') {
		if (!checklogin()) {
			header('Location: ./index.php?act=anon');
		}
		require_once "./account/pages/editinfo.php";
	} else {
		header('Location: ./index.php?act=anon');
	}
?>		
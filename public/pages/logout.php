<?php
	require_once('../php-assets/class.session.php');
	require_once('../php-assets/class.user.php');
	$user_logout = new USER();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('advert-overview.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('login.php');
	}

<?php
	session_start();

	require_once 'app/core/Core.php';

	require_once 'lib/Rafael/Database/Connection.php';

	require_once 'app/controller/LoginController.php';
	require_once 'app/controller/DashboardController.php';
	require_once 'app/model/User.php';

	require_once 'vendor/autoload.php';

	$core = new Core;
	echo $core->start($_GET);
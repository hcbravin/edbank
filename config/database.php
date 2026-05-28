<?php

	$db = new mysqli(
		$_ENV['DB_HOST'],
		$_ENV['DB_USER'],
		$_ENV['DB_PASS'],
		$_ENV['DB_NAME']
	);

	if($db -> connect_errno){
		print 'Ocorreu algum problema com o banco de dados. Tente novamente mais tarde.';
		exit;
	} mysqli_set_charset($db,'UTF8MB4');
	

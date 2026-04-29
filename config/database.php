<?php

	$db = new mysqli(
		'localhost',
		'SEU_USUARIO_MYSQL',
		'SUA_SENHA_MYSQL',
		'edbank'
	);

	if($db -> connect_errno){
		print 'Ocorreu algum problema com o banco de dados. Tente novamente mais tarde.';
		exit;
	} mysqli_set_charset($db,'UTF8MB4');
	

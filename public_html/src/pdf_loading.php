<?php

$CSS = file_get_contents(__DIR__.'/../css/bootstrap.min.css');

$Dados = [
	'orientacao' => 'letter', // letter -> em pé || landscape -> deitado
	'ano' => date('Y'),
	'LogoType' => @mime_content_type(PublicHTML.'/images/LogoPlaca.png'),
	'Logo64' => @base64_encode(file_get_contents(PublicHTML.'/images/LogoPlaca.png')),
	'RodapeInfo' => 'Espírito Santo, '.date('d').' DE '.Data(null,11).' DE '.date('Y'),
	'cssx' => $CSS,
    'TituloPage' => 'EDBank'
];
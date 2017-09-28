<?php

require_once './vendor/autoload.php';

use GUMP;
//Dados Formulario
$dadosForm = [
	'nome' => 'Evandro de Souza',
	'email' => 'oevandrodesouza@gmail.com'
];

//Regras de Validação
$regras = [
	'nome' => 'required|max_len,100|min_len,3',
	'email' => 'required|max_len,100|min_len,6|valid_email'
];

$is_valid = GUMP::is_valid($dadosForm, $regras);

if($is_valid === true) {
	// continue
	echo "Dados Válidos";
} else {
	print_r($is_valid);
}
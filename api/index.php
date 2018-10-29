<?php 
// load ES api & config ES
require 'vendor/autoload.php';
require_once 'config/conexao.php';

// requisições
//-------------------------------------
$index = isset($_REQUEST['index']) ? $_REQUEST['index'] : null;
$doc = isset($_REQUEST['doc']) ? $_REQUEST['doc'] : null;
$acao = isset($_REQUEST['acao']) ? $_REQUEST['acao'] : null;

// obj ES de conexao com elasticsearch
//-------------------------------------
$cli = new Configuracao();
$client = $cli->getClient();


// validação index
//-------------------------------------
if(!$client->indices()->exists(array('index'=> $index)) && $acao != "new_index"){
	echo json_encode(array('status' => 404, 'status_message'=> 'index não encontrado'));
}


// controller
switch ($acao) {
	case 'new_index':
		if(!$client->indices()->exists(array('index'=> $index))) {
			$client->indices()->create(array('index'=> $index));
			echo json_encode(array('status' => 250, 'status_message'=> 'index criado com sucesso'));
		}
		else
			echo json_encode(array('status' => 250, 'status_message'=> 'index já existe'));
		break;
}

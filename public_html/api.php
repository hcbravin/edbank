<?php
// Este é um arquivo que fará a interação do ajax com o sistema
// Deste modo, iremos fazer algumas validações iniciais, carregar alguns modulos e depois promover as chamadas necessárias.
// Todo retorno desta api será em formato JSON e só será aceito se o usuário possuir uma sessão ativa.

use Dom\Node;

header('Content-Type: application/json');
session_start(); // Inicia a sessão do usuário

require_once __DIR__ . '/src/AppLoading.php'; // Carrega as configurações e dependências do aplicativo
if(!$Logado){ // Verifica se o usuário está logado
    print json_encode(['status'=>'error','message'=>'Usuário não autenticado. Por favor, faça login para continuar.']);
    exit;
}

// --- Início das operações da API --- //
if($URI[1]=='agencia'){ // Operações relacionadas às agências
    
    // Buscar agência
    if($URI[2]=='buscar' AND is_numeric($URI[3])){
        $Agencia = new Agencia();
        $Agencia -> numero = $URI[3];
        $Data = $Agencia -> Buscar();
        if($Data){
            print json_encode(['status'=>'success','data'=>$Data]);
        } else {
            print json_encode(['status'=>'error','message'=>'Agência não encontrada.']);
        }
        exit;
    }

goto JsonErro;}

if($URI[1] == 'conta'){ // Operações relacionadas às contas

    if($URI[2] == 'conta_transferir'){ // Verifica se a agencia e contas informadas correspondem a um par valido.
        
        $Conta = new Conta();
        $Conta -> agencia = $_POST['agencia']; // Informa o numero da agencia passado via post
        $Conta -> numero = $_POST['conta']; // Informa o número da conta passado via post
        $findConta = $Conta -> findConta();
        if(is_array($findConta) AND array_key_exists('ct_id',$findConta)){
            print json_encode(['status'=>'success', 'message'=>'Conta encontrada!', 'destinatario'=>$findConta['user_nome']]);
            goto Fim;
        } else {
            print json_encode(['status'=>'error', 'message'=>'Conta inválida!']);
            goto Fim;
        }

    goto Fim;}

    if($URI[2] == 'pix'){ // Operações relacionadas aos pix

        if($URI[3] == 'receber'){ // Gera as informações de receber com pix

            $nome = strtoupper($MS['user_nome']); // ou nome da conta
            $nome = preg_replace('/[^A-Z0-9 ]/', '', $nome);
            $nome = substr($nome, 0, 25);

            $chave = $_POST['chave']; // Infomra a chave que será usada
            $valor = number_format($_POST['valor'], 2, '.', ''); // informa o valor a ser cobrado

            $Pix = new Pix();
            $payload = $Pix -> encodePixPayload($chave, $nome, $valor);

            // Gera o retorno
            print json_encode([
                'status' => 'success',
                'message' => 'Pix gerado com sucesso!',
                'pix' => $payload
            ]);

        goto Fim;}

        if($URI[3] == 'qrcode'){ // Promove a leitura do qrCode
            print json_encode([
                'status' => 'success',
                'message' => 'QrCode gerado com sucesso!',
                'qrcode' => $_POST
            ]);
        goto Fim;}

        if($URI[3] == 'colar'){
            $Pix = new Pix();
            $Payload = $Pix -> decodePixPayload($_POST['payload']);
            print json_encode($Payload);
        goto Fim;}

        if($URI[3] == 'buscarChave'){
            $Pix = new Conta();
            print json_encode($Pix -> PixBuscarChave($_POST['chave']));
        goto Fim;}

    goto JsonErro;}

    if($URI[2] == 'notificacoes'){ // Processa as notificacoes

        if($URI[3] == 'lido'){ // Altera o status de uma notificacao para lida

            $Notificacao = new Notificacao();
            $Notificacao -> Conta = $_POST['conta'];
            // Se for passado um número, irá ser referente a uma notificação específica.
            if(is_numeric($_POST['id'])){
                $Return = $Notificacao -> Lido($_POST['id']);
            }
            // Se for passado um booleano, irá ser referente a todas as notificações.
            if(is_bool($_POST['id'] AND $_POST['id'] == true)){
                $Return = $Notificacao -> LidoTodos();
            }

            if(isset($Return) AND $Return){
                print json_encode([
                    'status' => 'success',
                    'message' => 'Notificação lida com sucesso!',
                ]);

            }else{goto JsonErro;}

        goto Fim;}


    goto JsonErro;}

    

goto JsonErro;}

JsonTeste:
    print json_encode(['status'=>'teste','data'=>$URI]); goto Fim;

JsonErro:
    print json_encode(['status'=>'error','message'=>'Erro interno no servidor.']);

Fim:
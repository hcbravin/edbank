<?php
// Valida os numeros informados.
if(!isset($_POST['cartoes']) OR !is_array($_POST['cartoes']) OR count($_POST['cartoes']) == 0) { 
    Alert('Nenhum cartão foi selecionado!'); 
    exit; 
}

// Carrega os clientes
$Contas = $Agencia -> getContas();

// Verifica se as contas informadas pertencem a agencia
foreach($_POST['cartoes'] as $KeyC=>$ViewC){
    if(isset($Contas[$KeyC])){
        
        $Cliente = new Conta($ViewC);
        $Contas[$KeyC]['card_debito'] = $Cliente -> getCartaoDebito(true);

    }else{
        // Se nao pertencer, remove das solicitacoes
        unset($_POST['cartoes'][$KeyC]);
    }
}

// Dados
$Dados = array_merge($Dados, [
    'datahora' => date('d/m/Y H:i:s'),
    'gerente'  => $MS['user_nome'],
    'agencia'  => $MS['gerente'][$URI[2]]['ag_info'],
]);

// Carrega os arquivos
$Html = file_get_contents( Views . '/pdf/pdf_cartao_debito_main.html');
$Card = file_get_contents( Views . '/pdf/pdf_cartao_debito_body.html');
$Dados['body'] = '';

// ppre($Contas); exit;

use tekintian\TekinQR;

foreach($Contas as $KeyC=>$ViewC){

    // Dados do(s) cartao(oes)
    $CardDados = [
        'nome'     => AbreviarNome(mb_strtoupper($ViewC['user_nome'], 'UTF-8')),
        'numero'   => chunk_split($ViewC['card_debito']['card_numero'], 4, ' '),
        'validade' => date('m/y', strtotime($ViewC['card_debito']['card_validade'])),
        'cvv'      => '123',
        'bandeira' => 'VISA',
        'tipo'     => 'DÉBITO',
        'qrCode'   => TekinQR::getQRImg($ViewC['card_debito']['card_numero'], 10, null, 1),
    ];

    $Dados['body'] .= str_replace(
        array_map(fn($k) => '{' . $k . '}', array_keys($CardDados)),
        array_values($CardDados),
        $Card
    );

}
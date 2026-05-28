<?php 
// PHP Version 8.4.18
// =========================================================================
// Verificações de segurança
if (!Logado()) { goto Fim; }
if (!Token(@$_POST['form_token'])) { Alert('Token de Segurança expirado!'); goto Fim; }
$P = $_POST; $countErro = 0;
// =========================================================================

if($URI[1]=='nova-agencia'){

    // Cria uma nova agência
    $Agencia = new Agencia();
    $Nova = $Agencia -> Criar($P['agencia']['cep'], isset($P['agencia']['key']) ? true : false);
    if($Nova == false){ 
        Alert('Não foi possível criar a nova agência!'); 
        $countErro++;
        shdr('abertura/agencia');
        goto Status; 
    }
    $Agencia -> AtualizarSession(); // Atualiza a sessão do usuário com a nova agência

    // Redireciona para a página de gerenciamento da nova agência
    shdr("gerencia/{$Nova}/configuracoes");

goto Status;}

if($URI[1] == 'conta'){ // Operações com contas

    if($URI[2] == 'nova'){ // Cria uma nova conta

        $Agencia = new Agencia($P['agencia-id']); // Busca a agência selecionada
        $getAgencia = $Agencia -> getAgencia();

        if($getAgencia == false){  // Verifica se a agência informada existe.
            Alert('Agência não encontrada!'); 
            $countErro++;
            shdr('abertura/conta');
            goto Status; 
        }

        // Se a agencia possuir chave de acesso, verifica se ela esta correta
        if(isset($getAgencia['ag_key']) AND strlen($getAgencia['ag_key']) == 5 AND $getAgencia['ag_key'] != $P['agencia-codigo']){
            Alert('Chave de acesso inválida para esta agência!'); 
            $countErro++;
            shdr('abertura/conta');
            goto Status; 
        }

        $NovaConta = $Agencia -> CriarConta(); // Cria a nova conta na agência selecionada
        if($NovaConta == false){ 
            Alert('Não foi possível criar a nova conta!'); 
            $countErro++;
            shdr('abertura/conta');
            goto Status; 
        }

        // Redireciona para a página da nova conta
        shdr("conta/{$NovaConta}");  

    goto Status;}

    if($URI[2] == 'transferencia'){ // Executa uma nova transferência entre contas
    
        $valor = numHTML($P['contaTransferirValor']);
        $agencia = $P['contaTransferirAgencia'];
        $conta = $P['contaTransferirConta'];
        $suaConta = $P['conta'];

        // Valida se a conta realmente existe
        $Conta = new Conta();
        $Conta -> agencia = $agencia;
        $Conta -> numero = $conta; // Informa o número da conta passado via post
        $findConta = $Conta -> findConta();

        // Se a conta existir, prossegue
        if(is_array($findConta) AND array_key_exists('ct_id',$findConta)){

            // Verifica se a conta não é sua
            foreach($MS['contas'] as $KeyC => $ViewC){
                if($ViewC['ct_agencia'] == $agencia AND $ViewC['ct_conta'] == $conta){
                    $countErro++;
                    Alert('Você não pode realizar uma transferência para a sua conta.');
                    shdr("conta/$suaConta/transferir");
                    goto Status;
                    break;
                }
            }

            // Verifica se você tem saldo suficiente para realizar a transferência
            if(!isset($MS['contas'][$P['conta']]['ct_saldo']) AND $MS['contas'][$P['conta']]['ct_saldo'] < $valor){
                $countErro++;
                Alert('Saldo insuficiente para realizar a transferência!');
                shdr("conta/$suaConta/transferir");
                goto Status;   
            }

            $Conta = new Conta();
            $Conta -> contaID = $suaConta;
            $Transferencia = $Conta -> Transferencia($findConta['ct_id'], $valor);

            // Se a transferência for bem sucedida, retorna para a página de transferência
            if(!$Transferencia){
                Alert('Sua transferência não pode ser processada por problemas técnicos. Tente novamente.');
                shdr("conta/$suaConta/transferir");
                goto Status;
            }

            // Se a transferencia for bem sucedida, retorna para a página inicial
            shdr("conta/$suaConta");
            goto Status;
            
        }else{

            // Se não existir, informa erro e retorna a página de transferência
            $countErro++;
            Alert('Conta de destino inválida!');
            shdr("conta/$suaConta/transferir");
            goto Status;
        }

        // print $valor;
        // ppre($P);

    goto Status;}

    if($URI[2]=='pix'){ // Executa uma nova transferência com pix

        if($URI[3] == 'enviar'){ // Envia um pix
            
            $valor = numHTML($P['pixEnviarValor']); // Converte o valor para float
            $Forma = (is_numeric($P['pixEnviarValorForma']) ? $P['pixEnviarValorForma'] : 0); // Verifica a forma de pagamento do pix
            $DestinatarioNome = strip_tags($P['pixEnviarDestinatarioNome']);
            // Busca a chave pix
            $Conta = new Conta(); 
            $Chave = $Conta -> pixBuscarChave($P['pixEnviarChave']);

            if($Chave['status'] != 'success'){
                $countErro++;
                Alert('Chave pix inválida!');
                shdr("conta/{$P['conta']}/pix/enviar");
                goto Status;
            }

            // Verifica se a conta possui saldo suficiente para realizar a transferência
            $Conta -> contaID = $P['conta'];
            $findConta = $Conta -> findConta();

            // Pagamento com saldo em conta
            if($Forma == 0){

                // Se não houver saldo suficiente para realizar a transferência
                if(!isset($findConta['ct_saldo']) OR $findConta['ct_saldo'] < $valor){
                    $countErro++;
                    Alert('Saldo insuficiente para realizar a transferência!');
                    shdr("conta/{$P['conta']}/pix/enviar");
                    goto Status;
                }

                $Transferencia = $Conta -> Transferencia($Chave['conta'], $valor, 'pix');
                if(!$Transferencia){ // Se a transferência não for bem sucedida
                    $countErro++;
                    Alert('Sua transferência nao pode ser processada por problemas tecnicos. Tente novamente.');
                    shdr("conta/{$P['conta']}/pix/enviar");
                    goto Status;
                }

                // Se a transferência for bem sucedida, retorna para a página inicial
                shdr("conta/{$P['conta']}/pix/enviar");
                goto Status;
                
            }

            // Pagamento com cartão de crédito
            if($Forma > 0){

                $ValorCobrado = $valor * 1.05; // Cobrar 5% de taxa de pix

                // Se o cartão não for seu, retorna erro
                if(!isset($findConta['cartoes'][$Forma])){
                    $countErro++;
                    Alert('Cartão inválido!');
                    shdr("conta/{$P['conta']}/pix/enviar");
                    goto Status;
                }

                // Se o cartão não tiver limite suficiente
                if($findConta['cartoes'][$Forma]['card_limite_livre'] < $ValorCobrado){
                    $countErro++;
                    Alert('Cartão sem saldo suficiente!');
                    shdr("conta/{$P['conta']}/pix/enviar");
                    goto Status;
                }

                // Realiza a transferência para conta de destino
                $Destinatario = new Conta($Chave['conta']);
                $Transferencia = $Destinatario -> setExtrato('Pix recebido de ' . $findConta['ct_id'], $valor);
                if(!$Transferencia){ // Se a transferência não for bem sucedida
                    $countErro++;
                    Alert('Sua transferência nao pode ser processada por problemas tecnicos. Tente novamente.');
                    shdr("conta/{$P['conta']}/pix/enviar");
                    goto Status;
                }

                // Realiza o registro da transferencia.
                $Conta -> TransferenciaRegistrar(0, $Chave['conta'], $valor);

                // Desconta o saldo do cartão
                $Conta -> cardID = $Forma;
                $Fatura = $Conta -> CartoesCompra('Envio de Pix', $ValorCobrado);

                // Se a transferência for bem sucedida, retorna para a página inicial
                shdr("conta/{$P['conta']}/pix/enviar");
                goto Status;
            }

            $countErro++;
            Alert('Sua transferência nao pode ser processada por problemas tecnicos. Tente novamente.');
            shdr("conta/{$P['conta']}/pix/enviar");
            
        }

    goto Status;}

    if($URI[2] == 'cartao'){ // Executa as operações de cartão

        // Validação da conta apresentada se de fato é do usuário com base na sessão criada
        if(!isset($MS['contas'][$P['conta']])){
            $countErro++;
            Alert('A conta que você apresentou não é válida!');
            shdr('conta/' . $P['conta'] . '/cartoes');
            goto Status;
        }

        // Busca a conta
        $Conta = new Conta();
        $Conta -> contaID = $P['conta'];

        if($URI[3] == 'novo'){ // Associa um novo cartão a conta quando possível

            // Associa o cartão            
            if(!$Conta -> CartoesNovo($P['novoCartao'])){ // Tenta associar o cartão ao perfil
                $countErro++; // Se falhar, informa erro
                Alert('Não foi possivel associar o cartão ao seu perfil!');
            
            }

            shdr('conta/' . $P['conta'] . '/cartoes');

        goto Status;}

        // Busca os cartoes e verifica se o cartão é do usuário para continuar
        $Cartoes = $Conta -> Cartoes();
        if(!isset($Cartoes[$P['card']])){
            $countErro++;
            Alert('Cartão inválido!');
            shdr('conta/' . $P['conta'] . '/cartoes');
            goto Status;
        }

        if($URI[3] == 'pagar'){ // Pagar a fatura do cartão

            $Pagar = numHTML($P['ModalCartoesPagarValor']);

            // Se o valor informado para pagamento for maior que o valor da fatura, limita o valor do pagamento
            if($Pagar > $Cartoes[$P['card']]['card_fatura_valor']){
                $Pagar = $Cartoes[$P['card']]['card_fatura_valor'];
            }
            // Verifica se existe saldo suficiente em conta
            if($MS['contas'][$P['conta']]['ct_saldo'] < $Pagar){
                Alert('Saldo insuficiente para pagaemnto do cartão!');
                $countErro++;
                shdr('conta/' . $P['conta'] . '/cartoes');
                goto Status;
            }

            $Conta -> cardID = $P['card'];
            $Pagamento = $Conta -> CartoesPagar($Pagar);

            if($Pagamento == false){ // Se o pagamento falhar.
                Alert('Pagamento falhou!');
                $countErro++;
            }

            shdr('conta/' . $P['conta'] . '/cartoes');
        goto Status;}

    goto Status;}

    if($URI[2] == 'investimento'){ // Executa as operações de investimento

        if(!isset($MS['contas'][$P['conta']])){ // Verifica se a conta apresentada se de fato é do usuário com base na sessão criada
            $countErro++;
            Alert('A conta que você está tentando acessar não pertence a você!');
            shdr('conta/' . $P['conta'] . '/investimentos');
            goto Status;
        }


        // Atualiza as informações do saldo para a sessão ativa
        $Conta = new Conta($P['conta']) -> updSaldo(); 

        $Investir = new Investimentos($P['conta']);
        $Investir -> tipo = $P['invModalTipo'];
        $Investir -> tempo = (isset($P['invModalTempo']) ? $P['invModalTempo'] : 1);
        $Investir -> valor = numHTML($P['invModalValor']);
        $Novo = $Investir -> Novo();

        if($Novo['status'] == false){
            $countErro++;
            Alert('O cofrinho nao pode ser criado. '.$Novo['message']);
        }

        shdr('conta/' . $P['conta'] . '/investimentos');
    goto Status;}

    if($URI[2]=='pagamento'){

        // Verifica se a conta apresentada se de fato é do usuário com base na sessão criada
        if(!isset($MS['contas'][$P['conta']])){ 
            $countErro++;
            Alert('A conta que você está tentando acessar não pertence a você!');
            shdr('conta/' . $P['conta'] . '/pagamentos');
            goto Status;
        }

        $Conta = new Conta();
        $Conta -> contaID = $P['conta'];
        $Pagamentos = $Conta -> getPagamentos();

        $Saldo = $MS['contas'][$P['conta']]['ct_saldo'];
        $Cartoes = $Conta -> Cartoes();

        // Percorre o post enviado para realizar os pagamentos
        foreach($P['pagamento'] as $KeyP => $ViewP){
            if(is_numeric($KeyP)){ // Verifica se de fato é um item de pagamento e não a forma
                if(isset($Pagamentos[$KeyP])){ // Verifica se a busca no banco resultou um pagamento valido

                    // Percorre os itens de pagamentos passados
                    foreach($ViewP as $KeyI => $ViewI){
                        // Verifica se o item é valido
                        if(
                            isset($Pagamentos[$KeyP]['ctp_contas'][$KeyI]) AND  // Se o item existe
                            $ViewI == $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['valor'] // Se o valor bate com o valor do banco
                        )
                        {

                            if($P['pagamento']['forma'] == 0){ // Se a forma de pagamento for saldo em conta
                                
                                if($Saldo >= $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['valor']){ // Se o saldo da conta for menor que o valor do pagamento
                                    // Realiza o pagamento
                                    if(!$Conta -> setExtrato(
                                        $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['nome'], // Informa o nome do pagamento
                                        (-1) * $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['valor'], // Informa o valor do pagamento
                                    )){ continue; };
                                    // Atualiza o saldo da conta
                                    $Saldo = $Saldo - $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['valor'];
                                }
                            }

                            if($P['pagamento']['forma'] > 0){ // Se a forma de pagamento for cartão
                                                                
                                // Valor com juros
                                $Valor = $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['valor'] * 1.05;
                                
                                if(
                                    isset($Cartoes[$P['pagamento']['forma']]) AND // Verifica se o cartão passado é de fato do usuário
                                    $Cartoes[$P['pagamento']['forma']]['card_limite_livre'] > $Valor // Verifica se o cartão tem limite
                                ){
                                    // Informa o cartão usado
                                    $Conta -> cardID = $P['pagamento']['forma'];

                                    // Registra o pagamento
                                    if(!$Conta -> CartoesCompra(
                                        $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['nome'], // Informa o nome do pagamento
                                        $Valor, // Informa o valor do pagamento
                                    )){ continue; };

                                    // Reduz o limite do vetor
                                    $Cartoes[$P['pagamento']['forma']]['card_limite_livre'] -= $Valor;
                                }
                            }

                            // Informa o pagamento
                            $Pagamentos[$KeyP]['ctp_contas'][$KeyI]['pago'] = true;
                                    
                        }
                    }
                }
            }
        }

        // Percorre o array de pagamento vindo do banco para atualizar
        foreach($Pagamentos as $KeyP => &$ViewP){
            // Verifica se existe itens pagos no vetor post. Busca otimizar processamento
            if(!array_key_exists($KeyP, $P['pagamento'])){ continue; }

            $Pagos = array_column($ViewP['ctp_contas'], 'pago');
            $ViewP['ctp_aberto'] = (in_array(false, $Pagos, true) || in_array(0, $Pagos, true) || in_array('', $Pagos, true));
            $ViewP['ctp_contas'] = json_encode($ViewP['ctp_contas']);

            if(!$Conta -> updPagamentos($ViewP)){
                $countErro++;
            }
        }
        
        shdr("conta/{$P['conta']}/pagar");

    goto Status;}

    if($URI[2]=='shop'){ // Compras na loja

        $Shop = new Shop();
        $Shop -> agenciaID = $P['agencia'];
        $Produto = $Shop -> getProduto($P['compraModalItem']);

        $Conta = new Conta();
        $Conta -> contaID = $P['conta'];
        $Conta -> agenciaID = $P['agencia'];
        $Cartoes = [];
        $Valor = false;

        if(!is_array($Produto)){ 
            $countErro++; 
            Alert('O produto que você apresentou é inválido!');
            shdr('gerencia/'.$P['agencia'].'/shopping');
            goto Status;
        }

        // Verifica se o produto que estamos querendo comprar existe em estoque
        if($Produto['stock'] < $P['compraModalQuantidade']){
            $countErro++;
            Alert('Pedimos desculpas, mas, a quantidade desejada já não existe mais em estoque!');
            goto ContaShopProduto;
        }

        // Verifica se a conta é de fato sua
        if($P['conta'] != $MS['contas'][$P['conta']]['ct_id']){
            $countErro++;
            Alert('A conta que apresentou é inválida!');
            shdr('conta/'.$P['conta'].'/shopping');
            goto Status;
        }

        // Verifica a forma de pagamento e o saldo existente
        // Se a forma de pagamento for saldo em conta
        if($P['compraModalMetodo'] == 0){
            
            $Valor = $Produto['price_real_discount'] * $P['compraModalQuantidade'];

            if($MS['contas'][$P['conta']]['ct_saldo'] < $Valor){
                $countErro++;
                Alert('Saldo insuficiente para compra do produto!');
                goto ContaShopProduto;
            }

            // Desconta o valor da conta e registra no extrato
            $Conta -> setExtrato(
                'Shop: ' . $Produto['title'],
                $Valor * (-1)
            );
        }

        // Se o pagamento for através de cartão
        if($P['compraModalMetodo'] > 0){

            $ValorReal = $P['compraModalParcela'] == 1 ? $Produto['price_real_discount'] : $Produto['price_real']; // Verifica se o produto tem desconto ou não
            $ValorJuros = $P['compraModalParcela'] < 4 ? 0 : 0.05; // Se for mais de 3 parcelas, incide um juros de 5%;
            $Valor = $ValorReal * (1 + $ValorJuros * $P['compraModalParcela']) * $P['compraModalQuantidade']; // Calcula o valor final do produto com juros (se houver)

            $Cartoes = $Conta -> Cartoes(); // Busca os cartões do usuário
            
            // Verifica se o cartão passado é de fato do usuário
            if(!isset($Cartoes[$P['compraModalMetodo']])){
                $countErro++;
                Alert('Cartão inválido para compra do produto!');
                goto ContaShopProduto;
            }

            // Verifica se o cartão tem saldo suficiente para compra
            if($Cartoes[$P['compraModalMetodo']]['card_limite_livre'] < $Valor){
                $countErro++;
                Alert('Cartão sem saldo suficiente para compra do produto!');
                goto ContaShopProduto;
            }


            // Verifica se houve parcelamento ou não
            // Se não houve, registra o item no cartão

            $Conta -> cardID = $P['compraModalMetodo']; // Informa o ID do cartão
            $Conta -> CartoesCompra( // Registra a compra
                "Shop: " . $Produto['title'],
                $Valor,
                $P['compraModalParcela']
            );

        }

        // Verifica se o valor informado foi calculado
        if(!isset($Valor) OR !is_numeric($Valor)){
            $countErro++;
            Alert('O valor do produto que vocé apresentou é inválido!');
            goto ContaShopProduto;
        }

        $Shop -> contaID = $P['conta'];
        $Shop -> ComprarProduto($Valor, $P['compraModalQuantidade']);

        ContaShopProduto:
            shdr('conta/'.$P['conta'].'/shopping/produto/'.$P['compraModalItem']);
            goto Status;


    goto Status;}

goto Status;}

if($URI[1]=='agencia'){

    $AgenciaID = (isset($P['agencia']) ? $P['agencia'] : $URI[3]);

    // Verifica se a agência apresentada se de fato é do usuário com base na sessão criada
    if(!isset($MS['gerente'][$AgenciaID])){
        $countErro++;
        Alert('A agência que vocês apresentou não é válida!');
        shdr('dashboard');
        goto Status;
    }
    
    // Busca a agência
    $Agencia = new Agencia($AgenciaID);

    // Realiza um deposito pela agência na conta associada
    if($URI[2] == 'depositar'){
        
        $valor = numHTML(($P['sendCashValueRemove'] ? (-1) * numHTML($P['sendCashValueRemove']) : $P['sendCashValue']));
        $conta = $P['sendCashConta'];

        // Se não for um numero ou todas, retorna erro;
        if($conta != 'all' AND !is_numeric($conta)){ 
            $countErro++;
            Alert('Conta de destino inválida!');
            // shdr('gerencia/' . $AgenciaID);
            goto Status;
        }

        // Busca as contas da agência
        $Agencia -> getContas();
        $Agencia -> getContas = reKey($Agencia -> getContas, 'ct_id'); // Reindexa as contas da agência

        $Conta = new Conta();

        foreach($Agencia -> getContas as $KeyC => $ViewC){
            if($conta == 'all' OR $conta == $ViewC['ct_id']){ // Percorre todas as contas, ou procura a específica
                // Deposita o dinheiro
                $Conta -> contaID = $ViewC['ct_id'];
                if(!$Conta -> setExtrato(($valor < 0 ? 'Débito' : 'Deposito')  . ' da agência', $valor)){
                    $countErro++;
                }
            }
        }

        shdr('gerencia/' . $AgenciaID);
        
    goto Status;}

    // Executa o ciclo manualmente
    if($URI[2] == 'ciclo'){
        // Busca a agência
        $Agencias = $Agencia;
        $AgenciasMap[$URI[3]] = $Agencias -> getAgencia();
        $AgenciasMap[$URI[3]]['agc_config'] = $Agencias -> getConfig(); // Busca as configurações da agência
        $AgenciasMap[$URI[3]]['contas'] = $Agencias -> getContas(); // Busca as contas da agência

        // Executa o ciclo
        require_once __DIR__ . '/../../config/AppCronJobEngine.php';

        shdr('gerencia/' . $URI[3]);
        goto Status;
    }

goto Status;}

Status: 
    require_once Error . '/systemEngineStatus.php'; // Apesar de estar em error, este arquivo exibe o status das operações do sistema
    goto Fim;

Fim:

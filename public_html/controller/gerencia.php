<?php

    // Verifica se está solicitando a lista de gerências desativadas
    if($URI[1]=='desativadas'){
        $Map = []; foreach($MS['gerente'] as $KeyG=>$ViewG){
            if(Data($ViewG['ag_dref'],'ano') < $AnoAtual){
                $Map[] = $KeyG;
            }
        }
        require_once Views.'/gerencia/desativadas.php';
    goto Fim;}

    // Verifica se o usuário tem acesso à gerência solicitada
    if(!isset($MS['gerente'][$URI[1]])){
        require_once Error . '/403.php';
        goto Fim;
    }

    // Inicia a gerência
    $URI[2] = $URI[2] ?? 'contas'; // Define a página padrão como contas
    $Agencia = new Agencia();
    $Agencia -> id = $URI[1];

    $Sorte = new Sorte();
    $Cards = $Sorte -> getCards();

    $Taxas = New Taxas();
    require_once Views.'/gerencia/header.php';

    
    if($URI[2]=='contas'){

        // Busca todas as contas da agência
        $Contas = $Agencia -> getContas();
        
        if(!$URI[3]){ // Exibe todas as contas
            require_once Views.'/gerencia/contas.php';

        }

        if(is_numeric($URI[3])){ // Abre a conta selecionada
            

            $ClassConta = new Conta();
            $ClassConta -> contaID = (in_array($URI[3], array_column($Contas, 'ct_id')) ? $URI[3] : false); // Verifica se a conta existe
            
            // Busca informações da conta
            $Conta = $ClassConta -> findConta();

            // Se a conta nao existir, exibe o alerta e pula para o fim
            if($Conta == false){alert('A conta que você quer acessar não foi encontrada!'); goto Fim;}

            // Exibe o nome do cliente na conta de fomra contínua
            require_once Views.'/gerencia/conta_header.php';

            // Pagina principal com resumo da conta do cliente
            if(!$URI[4]){
            
                // Associa a soma dos valores de cartões e investimentos
                $Conta['cartoesValor'] = array_sum(array_column($Conta['cartoes'], 'card_fatura_valor'));
                $Conta['investimentosValor'] = array_sum(array_column($Conta['investimentos'], 'inv_saldo'));
                $Conta['extrato'] = $ClassConta -> getExtrato(10);
                $Conta['pendencias'] = $ClassConta -> Pendencias();

                require_once Views.'/gerencia/contas_abrir.php';

            goto Fim;}

            // Abrir extrato completo da conta do clinete.
            if($URI[4] == 'extrato'){
                $Extrato = $ClassConta -> getExtratoCiclo();
                require_once Views . '/conta/conta_extrato.php';
            }

            // Pagina de gerencia de cartoes
            if($URI[4] == 'cartoes'){
                foreach($Conta['cartoes'] as $KeyC => &$ViewC){
                    $ClassConta -> cardID = $ViewC['card_id'];
                    $ViewC['card_fatura_view'] = $ClassConta -> CartoesFatura(true);
                }
                $MinCardKey = (is_array($Conta['cartoes']) AND count($Conta['cartoes']) > 0) ? min(array_keys($Conta['cartoes'])) : false;
                if($MinCardKey === false){ Alert('Esta conta não possui cartões'); goto Fim; }
                require_once Views.'/gerencia/conta_cartoes.php';
            }

            // Pagina de gerencia de investimentos
            if($URI[4] == 'investimentos'){
                // ppre($Conta['investimentos']);
                foreach($Conta['investimentos'] as $KeyI => &$ViewI){
                    $ViewI['inv_tipo_info'] = (new Investimentos($URI[1]) -> Tipos($ViewI['inv_tipo']));
                }
                // ppre($Conta['investimentos']);

                require_once Views.'/gerencia/conta_investimentos.php';
            }

            // Realizar um deposito direto na conta
            if($URI[4] == 'depositar'){
                require_once Views.'/gerencia/conta_depositar.php';
            }

            // Exibe as contas ativas e as pendências em nome da pessoa
            if($URI[4] == 'pendencias'){
                $Pendencias = $ClassConta -> Pendencias();
                require_once Views . '/gerencia/conta_pendencias.php';

            }

            // Exibe os itens adqiridos pela pessoa no shopping
            if($URI[4] == 'shop'){
                $TokenShop = Token('get');
                $Shop = $ClassConta -> getMyShopItens();
                require_once Views . '/gerencia/conta_shop.php';
            }
        }

    goto Fim;}

    if($URI[2]=='configuracoes'){
        
        $Historico = $Taxas -> MediaAnual();
        $Configuracoes = $Agencia -> getConfig();

        // VERIFICA SE EXISTEM DEBITOS CADASTRADOS, SE NAO, CARREGA O PADRAO
        $Configuracoes['debitos'] = (array_key_exists('debitos',$Configuracoes) AND is_array($Configuracoes['debitos']) AND count($Configuracoes['debitos'])) ? $Configuracoes['debitos'] : json_decode(file_get_contents(PublicHTML.'/files/agencia_debitos_main.json'),true);

        // Contas
        $Contas = $Agencia -> getContas();
        $SalarioMinimo = new Taxas() -> getSalarioMinimo();
        $Dolar = new Taxas() -> getDolar();

        $Shop = new Shop($URI[1]);

        // Manipula as profissoes
        $Profissoes = new Profissoes() -> getProfissoes(); // Busca todas as profissoes
        uasort($Profissoes, function($a, $b) {
            return $a['pf_salario'] <=> $b['pf_salario']; // For ascending order
        });
        $ProfissoesSalario = [
            'min' => number_format(reset($Profissoes)['pf_salario'] * $SalarioMinimo,2,'.',''), 
            'max' => number_format(end($Profissoes)['pf_salario'] * $SalarioMinimo,2,'.','')
        ];

        require_once Views.'/gerencia/configuracoes.php';
    
    goto Fim;}

    if($URI[2]=='ranking'){

        if(!$URI[3]){
            require_once Views.'/gerencia/ranking.php';
        }

        // Ranking de Transacoes
        if($URI[3]=='transacoes'){
            $Chart = $Agencia -> Chart('transacoes');
            require_once Views.'/gerencia/ranking_transacoes.php';

        goto Fim;}

        // Ranking de Transacoes
        if($URI[3]=='shop'){
            $Chart = $Agencia -> Chart('shop');
            require_once Views.'/gerencia/ranking_shop.php';

        goto Fim;}

    goto Fim;}

    if($URI[2]=='ciclo'){
        require_once Views . '/gerencia/ciclos.php';
    goto Fim;}

    if($URI[2]=='depositar'){ // Depositar dinheiro em todas as conta
        require_once Views.'/gerencia/conta_depositar.php';
    goto Fim;}

    if($URI[2]=='fechar'){
        require_once Views . '/gerencia/fechar.php';
    goto Fim;}



    Fim:
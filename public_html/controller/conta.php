<?php

    // Verifica se a conta passada na URL existe e pertence ao usuário logado
    if($URI[0]!='conta' OR !is_numeric($URI[1]) OR !isset($MS['contas'][$URI[1]])){
        alert('A conta que você tentou acessar não foi encontrada!');
        shdr('');
        goto Fim;
    }

    // Busca e Verifica se a conta informado existe e é de propriedado do usuário
    $Conta = new Conta(); 
    $Conta -> contaID = $URI[1];
    $fConta = $Conta -> findConta();

    if($fConta == false){
        alert('Acesso negado a está conta.');
        shdr('');
        goto Fim;
    }

    if($fConta['ag_fim'] . ' 23:59:59' < date('Y-m-d H:i:s') AND $fConta['ag_fim'] != '0000-00-00 00:00:00'){
        alert('Sua agência (<strong>'.ZeroEsquerda($fConta['ag_num']).'</strong>) encontra-se fechada desde '.date('d/m/Y', strtotime($fConta['ag_fim'])), false, true);
        require_once Views . '/main/publicidade.php';
        goto Fim;
    }

    $Notificacoes = new Notificacao($URI[1]) -> Listar(($URI[2] == 'notificacoes')); // Gera as notificacoes que não foram lidas
    $NotificacoesClose = count(array_filter($Notificacoes, function($item) {return $item['nt_lido'] == 0;})); // Quantidade de notificações não visualizadas
    require_once Views . '/conta/conta_header.php'; // Cabecalho da Conta

    // Se a conta estiver inativa;
    if($fConta['ct_ativo'] == 0){
        require_once Views . '/conta/conta_inativa.php';
        goto Fim;
    }

    if(!$URI[2]){
        require_once Views . '/conta/conta_geral.php'; // Página inicial da Área Conta

    goto Fim;}

    if($URI[2] == 'transferir'){
        require_once Views . '/conta/conta_transferir.php'; // Página inicial da Área Transferir
        
    }

    if($URI[2] == 'pix'){
        $MinhasChaves = $Conta -> PixMinhasChaves();
        $PixChavesAtivas = count(array_filter($MinhasChaves, function($item) {return $item['ativo'] == 1;})); // Quantidade de chaves ativas
        $PixChaveMain =  ($PixChavesAtivas == 0) ? false : reset($MinhasChaves)['chave']; // Pega a primeira chave informada
        $PixTransferencias = $Conta -> getTransferencia(1, 10);

        require_once Views . '/conta/conta_pix.php'; // Página inicial da Área PIX

        require_once Modal . '/pixEnviar.php'; // Modal para enviar pix
        require_once Modal . '/pixLerQrCode.php'; // Modal para ler QrCode e Enviar Pix
        require_once Modal . '/pixChaves.php'; // Modal para gerenciar as chaves pix
        require_once Modal . '/pixReceber.php'; // Modal para receber pix
    }

    if($URI[2] == 'cartoes'){
    
        if(!$URI[3]){
            // Abre a página de gerenciamento dos cartoes da conta
            $CartoesTipoFirsKey = array_keys($fConta['cartoes']); $CartoesTipoFirsKey = (isset($CartoesTipoFirsKey[0]) ? $CartoesTipoFirsKey[0] : false);
            $CartoesAtivos = count($fConta['cartoes']);
            
            require_once Views . '/conta/conta_cartoes.php';
            require_once Modal . '/cartoesPagar.php';
        }
        
        if($URI[3] == 'novo'){
            //  Abre a página de solicitação de um novo cartão de cŕedito / debito
            $CartoesTipo = $Conta -> CartoesTipo();
            $CartoesTipoFirsKey = array_keys($CartoesTipo)[0];
            require_once Views . '/conta/conta_cartoes_novo.php';
        }

        if(is_numeric($URI[3]) AND $URI[4] == 'faturas'){
            if(!array_key_exists($URI[3],$fConta['cartoes'])){
                Alert('O cartão que você está tentando acessar não foi encontrado!');
                goto Fim;
            }

            // Abre a página de faturas do cartão de crédito
            $ViewC = $fConta['cartoes'][$URI[3]]; // Busca o cartão na conta
            
            $ViewCBar = 100 * (max(0,$ViewC['card_limite_livre']) / $ViewC['card_limite']); // Compara o valor atual livre com zero e calcula a porcentagem
            $ViewCBar = ($ViewCBar > 100 ? 100 : $ViewCBar); // Associa a barra do cartão

            $Conta -> cardID = $URI[3]; // Informa qual cartão de crédito está sendo trabalhado

            $Faturas = $Conta -> CartoesFatura();
            require_once Views . '/conta/conta_cartoes_faturas.php';
        }
    }

    if($URI[2] == 'notificacoes'){
        // Abre a página de notificações
        require_once Views . '/conta/conta_notificacoes.php';
    }

    if($URI[2] == 'investimentos'){

        // Abre a página de investimentos
        require_once Views . '/conta/conta_investimentos_header.php';
        
        // Se for aberto a pagina inicial de investimento, carrega uma série de opções de novos investimentos
        if(!$URI[3]){ 
            $MeusInvestimentos = $fConta['investimentos'];
            require_once Views . '/conta/conta_investimentos.php'; // Meus investimentos
            require_once Views . '/conta/conta_investimentos_novo.php'; // Novos Investimentos

            // Modals
            require_once Modal . '/investimentoCrofrinho.php'; // Cofrinho de investimento
        goto Fim;}

        if(is_numeric($URI[3])){
            $Inv = $fConta['investimentos'][$URI[3]];
            $Inv = array_merge($Inv, ['inv_tipo_info' => new Investimentos($URI[1]) -> Tipos($Inv['inv_tipo'])]);
            require_once Views . '/conta/conta_investimentos_detalhes.php'; // Detalhes do Investimento
            require_once Modal . '/investimentoDetalhes.php'; // Modal de detalhes do investimento

        goto Fim;}
    }

    if($URI[2] == 'extrato'){

        // Abre a página de extrato
        $Extrato = $Conta -> getExtratoCiclo();
        require_once Views . '/conta/conta_extrato.php';
        
    }

    if($URI[2] == 'pagar'){         
        $ContasAbertas = $Pagar = $Conta->getPagamentos();
        // Abre a página de pagar
        require_once Views . '/conta/conta_pagar.php';
    }

    if($URI[2] == 'emprestimos'){

        $EmpMax = number_format(($fConta['pf_salario'] * 10 + $fConta['ct_saldo'] * 0.1),0,'','');
        require_once Views . '/conta/conta_emprestimos.php';
    }

    if($URI[2] == 'shopping'){

        $Shop = new Shop();
        $Shop -> agenciaID = $fConta['ct_agencia'];

        require_once Views . '/conta/conta_shop_header.php';

        if(!$URI[3]){
            require_once Views . '/conta/conta_shop_geral.php';
        }

        if($URI[3] == 'categoria'){

            // Verifica se a categoria de fato existe.
            if(!array_key_exists($URI[4], $Shop -> getCategorias())){
                Alert('A categoria que vocé esta tentando acessar nao foi encontrada!');
                goto Fim;
            }

            
            $Shop -> categoriaID = $URI[4];
            $Categoria = $Shop -> getCategorias()[$URI[4]];
            $Shop -> getAllProdutos();

            // Verifica se a categoria de fato existe e existem itens nela
            if(!is_array($Shop -> apiCategory) OR count($Shop -> apiCategory) == 0){
                alert('Nao foi possivel carregar a categoria, tente novamente mais tarde.',false,true);
                goto Fim;
            }

            require_once Views . '/conta/conta_shop_categoria.php';
        }

        if($URI[3] == 'produto'){

            // Busca o produto
            $Produto = $Shop -> getProduto($URI[4]);

            // Verifica se o produto de fato existe.
            if(!is_array($Produto)){
                Alert('O produto que vocé esta tentando acessar nao foi encontrado!');
                goto Fim;
            }

            require_once Views . '/conta/conta_shop_produto.php';
            require_once Modal . '/shopCompra.php';
        }

        if($URI[3] == 'compras'){
            $Itens = $Conta -> getMyShopItens();
            require_once Views . '/conta/conta_shop_compras.php';
        }

    }


    Fim:
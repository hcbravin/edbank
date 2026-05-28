<?php

    // Este arquivo irá executar o ciclo baseado nas informações das agências
    // Se faz necessário separar esta mecânica do arquivo principal de CronJob devido a atualização
    // que possibilitou a execução do ciclo manual, anteriormente não pensada.

    if(!isset($AgenciasMap) OR !is_array($AgenciasMap)){
        $countError = 1; // Informa que houve um erro
        goto Fim;
    }

    foreach($AgenciasMap as $KeyA=>$ViewA){

        // Verifica se o ciclo é do tipo manual ou automático
        if(
            // Se o ciclo for do tipo manual e não existir a variavel de ciclo, pula para o próximo item
            (@$ViewA['agc_config']['cicloForma'] == 0 AND (isset($AgenciasCiclo) OR @$AgenciasCiclo == 1))
            OR
            (@$ViewA['agc_config']['cicloForma'] == 1 AND (!isset($AgenciasCiclo) OR @$AgenciasCiclo == 0))
            // Se o ciclo for do tipo automatico e não existir a variavel de ciclo ou ela for zero, pula para o próximo item
        
        ){ continue; }

        if(isset($ViewA['contas']) AND count($ViewA['contas'])){

            foreach($ViewA['contas'] as $KeyC => $ViewC){

                $Conta = new Conta();
                $Conta -> contaID = $ViewC['ct_id'];
                
                // Associa o salário ao extrato/conta
                if(isset($ViewC['ct_salario']) AND $ViewC['ct_salario'] > 0){
                    $Conta -> setExtrato('Seu salário caiu na conta.', $ViewC['ct_salario']);
                }

                $Conta -> findConta(); // Busca informações da conta
                
                // NOVO: Processa as parcelas do cartão de crédito
                // $Conta -> CartoesProcessarParcelas(); // Gera as próximas parcelas se houver
                
                $Conta -> CartoesFaturaGerar(); // Gera a fatura com base nos itens aleatórios
                $Conta -> InvestimentoRentabilizar(); // Realiza a rentabilidade dos investimentos
                $Conta -> PagamentosGerar(); // Gera os pagamentos do ciclo em relação a configuração 
                
                $Conta -> SorteReves((isset($ViewA) AND is_numeric($ViewA['agc_config']['sorte'])) ? $ViewA['agc_config']['sorte'] : 0); // Realiza o sorte reves
            }
        }

        // Atualiza as informações de ciclo da agência
        $Agencias -> id = $KeyA;
        $Agencias -> CicloUpdate();
    }

    Fim:
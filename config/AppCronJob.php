<?php
    // Este arquivo tem como finalidade promover a seguinte interação
    // Sugerimos configurar a cron para rodar de madrugada, onde o fluxo de usuário é menor
    // Para rodar basta chamar o arquivo com o comando: php config/AppCronJob.php
    //
    // 1. Verifica os bancos que estão ativos
    // 2. Procura as contas deste banco
    // 2.1 Realiza as operações com o cartão associando os gastos
    // 2.2 Realiza as operações com os investimentos
    // 2.3 Realiza as operações de débitos automáticos
    // 2.4 Realiza as operações de sorte reves (caso estejam configuradas)


    // Carrega as configurações e dependências do aplicativo
    session_start();
    define('IS_CLI', php_sapi_name() === 'cli');
    require_once __DIR__ . '/../public_html/src/AppLoading.php';

    // Busca as agências ativas
    $Agencias = new Agencia();
    $AgenciasMap = $Agencias -> Ciclos();
    $AgenciasCiclo = 1;
    
     // Se não for um array ou não houver agências elegíveis para o ciclo, encerra;
    if(!is_array($AgenciasMap) OR count($AgenciasMap) == 0){ 
        print '[ Info: Nenhuma agência encontrada para o ciclo.' . PHP_EOL;    
    exit; }
    
    // Arquivo com toda mecânica de execução do ciclo baseado em um array AgenciasMap
    require_once __DIR__ . '/AppCronJobEngine.php';
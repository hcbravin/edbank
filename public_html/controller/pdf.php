<?php
// Verificação de Logado
if(!Logado()){ Alert('Você não está logado.'); goto Fim; }
// Verificação de Token válido
// if (!Token(@$_POST['form_token'])) { Alert('Token de Segurança expirado!'); goto Fim; }

// Carrega as configurações
require_once Src . '/pdf_loading.php';

// Processos de gerencia
if($URI[1]=='gerencia' AND is_numeric($URI[2])){

    if(!isset($MS['gerente'][$URI[2]])){
        Alert('Gerência inválida!');
        goto Fim;
    }

    $Agencia = new Agencia();
    $Agencia -> id = $URI[2];

    // Carrega a geração de cartão de débito físico
    if($URI[3] == 'cartoes'){
        require_once Views . '/pdf/pdf_cartao_debito.php';

    goto Render;}

}





Render:

foreach($Dados as $KeyD => $ViewD){
    $Html = str_replace('{'.$KeyD.'}', $ViewD, $Html);
}

use Dompdf\Dompdf;
$dompdf = new Dompdf(); // instantiate and use the dompdf class
$dompdf->loadHtml($Html);
$dompdf->setPaper('A4', $Dados['orientacao']); // (Optional) Setup the paper size and orientation

if(in_array($URI[1],['boletim','avaliacoes'])){
	$dompdf->setBasePath(__DIR__.'/../css/');
}

$dompdf->render(); // Render the HTML as PDF
$dompdf->stream($Dados['TituloPage'], array("Attachment" => false)); // Output the generated PDF to Browser
exit(0);

Fim:
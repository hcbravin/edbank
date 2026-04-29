<?php
// FUNCOES PRINCIPAIS

use phpDocumentor\Reflection\Types\Null_;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

function Data($data=null,$tipo=null){
	global $ANOATUAL,$ANOBASE,$db, $MYSCT;

	if($data==null AND $tipo==null){return date('Y-m-d H:i:s');} # DATA PADRÃO PHP
	if($data===null){$data = date('Y-m-d H:i:s');} # CASO $DATA NÃO EXISTA
	if($tipo === 0){return date("d/m/Y H:i:s",strtotime($data));}
	if($tipo == 1){return date('d/m/Y',strtotime($data));} # CONVERTENDO DATA BR
	if($tipo == 2){return date('Y-m-d',strtotime(str_replace('/','-',$data)));}
	if($tipo == 3){return date('d/m/Y',strtotime(str_replace('/','-',$data)));}
	if($tipo == 4){return date('H:i:s',strtotime(str_replace('/','-',$data)));}
	if($tipo == 5){return date("d/m", strtotime(str_replace('/','-',$data)));}
	if($tipo == 6){return date("H:i", strtotime(str_replace('/','-',$data)));}
	if($tipo == 7){return date("m", strtotime(str_replace('/','-',$data)));} # EXIBE O MÊS
	if($tipo == 8){return date("d", strtotime(str_replace('/','-',$data)));} # EXIBE O DIA
	if($tipo == 9){return date('N',strtotime(str_replace('/','-',$data)));} # EXIBE  DIA DA SEMANA 
	if($tipo ==10){ $DIAS = [NULL,'SEG','TER','QUA','QUI','SEX','SAB','DOM','SEGUNDA-FEIRA','TERÇA-FEIRA','QUARTA-FEIRA','QUINTA-FEIRA','SEXTA-FEIRA','SÁBADO','DOMINGO'];
      return ((is_numeric($data))? $DIAS[$data] : $DIAS[date('N',strtotime(str_replace('/','-',$data)))]);
    }
	if($tipo ==11){ // RETORNA MES NOME INTEIRO
		$BR = [null,'JANEIRO','FEVEREIRO','MARÇO','ABRIL','MAIO','JUNHO','JULHO','AGOSTO','SETEMBRO','OUTUBRO','NOVEMBRO','DEZEMBRO'];
		return $BR[(is_numeric($data))?$data:date('n',strtotime(str_replace('/','-',$data)))];
	}
	if($tipo ==12){ // RETORNA MES NOME ABREVIADO
		if(!is_numeric($data)){$data = intval(date('m',strtotime(str_replace('/','-',$data))));}else{ $data = intval($data); }
		$BR = [null,'JAN','FEV','MAR','ABR','MAI','JUN','JUL','AGO','SET','OUT','NOV','DEZ'];
		return $BR[$data];
	}
	if($tipo == 13){return date('W',strtotime(str_replace('/','-',$data)));} // RETORNA O NUMERO DA SEMANA
	if($tipo == 14 OR $tipo == 'ano'){return date('Y', strtotime(str_replace('/','-',$data)));} // RETORNA O ANO

	if($tipo == 28){
		$DiaExtenso = [
			1   => 'um',
            2   => 'dois',
            3   => 'três',
            4   => 'quatro',
            5   => 'cinco',
            6   => 'seis',
            7   => 'sete',
            8   => 'oito',
            9   => 'nove',
            10  => 'dez',
            11  => 'onze',
            12  => 'doze',
            13  => 'treze',
            14  => 'quatorze',
            15  => 'quinze',
            16  => 'dezesseis',
            17  => 'dezessete',
            18  => 'dezoito',
            19  => 'dezenove',
            20  => 'vinte',
			30  => 'trinta'
		];

		$dia = date('j', strtotime($data));
		$mes = date('M', strtotime($data));
		$ano = date('y', strtotime($data));

		return ($DiaExtenso[$dia]) . " dia".($dia > 1?'s':'')." do mês de " . mb_strtolower(Data($mes,11),'UTF-8');

	}
	if($tipo == 29){$week_start = new DateTime(); $week_start->setISODate($ANOBASE,$data); return $week_start->format('Y-m-d');} # RETORNA A SEGUNDA COM BASE NO NUMERO DA SEMANA
	
	if($tipo == 'feriados'){
		$ano = intval(date('Y',strtotime(str_replace('/','-',$data))));
		$pascoa = easter_date($ano); // Limite de 1970 ou após 2037 da easter_date PHP consulta http://www.php.net/manual/pt_BR/function.easter-date.php

		$dia_pascoa = date('j', $pascoa);
		$mes_pascoa = date('n', $pascoa);
		$ano_pascoa = date('Y', $pascoa);
		
		$feriados = array(
			mktime(0, 0, 0, 1, 1, $ano), // Confraternização Universal - Lei nº 662, de 06/04/49
			mktime(0, 0, 0, 4, 21, $ano), // Tiradentes - Lei nº 662, de 06/04/49
			mktime(0, 0, 0, 5, 1, $ano), // Dia do Trabalhador - Lei nº 662, de 06/04/49
			mktime(0, 0, 0, 9, 7, $ano), // Dia da Independência - Lei nº 662, de 06/04/49
			mktime(0, 0, 0, 10, 12, $ano), // N. S. Aparecida - Lei nº 6802, de 30/06/80
			mktime(0, 0, 0, 11, 2, $ano), // Todos os santos - Lei nº 662, de 06/04/49
			mktime(0, 0, 0, 11, 15, $ano), // Proclamação da republica - Lei nº 662, de 06/04/49
			mktime(0, 0, 0, 11, 20, $ano), // Dia da consciência negra - Lei 12.519/2011
			mktime(0, 0, 0, 12, 25, $ano), // Natal - Lei nº 662, de 06/04/49
			
	
			// Essas Datas depem diretamente da data de Pascoa
			mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 47, $ano_pascoa), //3ºferia Carnaval
			mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 2, $ano_pascoa), //6ºfeira Santa
			mktime(0, 0, 0, $mes_pascoa, $dia_pascoa, $ano_pascoa), //Pascoa
			mktime(0, 0, 0, $mes_pascoa, $dia_pascoa + 60, $ano_pascoa), //Corpus Cirist
		
		); 
		// PROCURA OS DIAS DE FERIADOS REGISTRADOS NO CALENDARIO ESCOLAR
		$Base = $db -> query("SELECT ce_data FROM agenda_escolar WHERE ce_secretaria = '$MYSCT' AND ce_tipo = 5 AND YEAR(ce_data) = $ANOBASE") -> fetch_all();
		foreach($Base as $V){ $feriados[] = strtotime($V[0]); }

		// REORDENA E FORMATA A DATA
		sort($feriados); foreach($feriados as $K1=>$V1){$feriados[$K1] = date('Y-m-d',$V1);}

		return $feriados;
	}	
	if($tipo == 'agenda'){ // USADO PARA SEMANAS DA AGENDA
		for($c=0;$c<=4;$c++){$Fim[] = date('d/m/Y', strtotime($data." + $c day"));} return $Fim;
    }
	if($tipo == 'datatime-br'){
		return date('d/m/Y H:i', strtotime($data));
	}
}
function ZeroEsquerda($numero) {
    // Converte o número para string para contar os caracteres
    $numeroStr = (string)$numero;
    $quantidadeCaracteres = strlen($numeroStr);
    
    // Verifica se a quantidade de caracteres é menor que 5
    if ($quantidadeCaracteres < 5) {
        // Completa com zeros à esquerda até ter 5 caracteres
        $numeroFormatado = str_pad($numeroStr, 5, '0', STR_PAD_LEFT);
        return $numeroFormatado;
    } else {
        // Retorna o número original se já tiver 5 ou mais caracteres
        return $numeroStr;
    }
}
function dbE(){
	global $db;
	if($db->error){
		print "<pre>DB ERROR: ".$db->error."</pre>";
	}
}
function numBR($Num) { // Converte numérico para formato brasileiro
    // Converte para string e limpa
    $valor = (string)$Num;
    $valor = preg_replace('/[^\d.,-]/', '', $valor);
    
    // Se string vazia, retorna 0,00
    if (empty($valor)) {
        return '0,00';
    }
    
    // Detecta se já está em formato numérico com separadores
    $ultimoPonto = strrpos($valor, '.');
    $ultimaVirgula = strrpos($valor, ',');
    
    // Converte para float
    $numero = 0.0;
    
    if ($ultimaVirgula !== false && ($ultimoPonto === false || $ultimaVirgula > $ultimoPonto)) {
        // Formato BR: 1.234,56 ou 123,50
        $numero = floatval(str_replace('.', '', str_replace(',', '.', $valor)));
    } elseif ($ultimoPonto !== false && ($ultimaVirgula === false || $ultimoPonto > $ultimaVirgula)) {
        // Formato HTML: 1,234.56 ou 123.50
        $numero = floatval(str_replace(',', '', $valor));
    } else {
        // Sem separadores ou formato não reconhecido
        $numero = floatval($valor);
    }
    
    // Formata para o padrão brasileiro
    return number_format($numero, 2, ',', '.');
}
function numHTML($Num) { // Converte numérico para formato HTML
    $valor = (string)$Num;
    $valor = preg_replace('/[^\d.,-]/', '', $valor);
    
    // Detecta se está no formato BR (vírgula decimal) ou HTML (ponto decimal)
    $ultimoPonto = strrpos($valor, '.');
    $ultimaVirgula = strrpos($valor, ',');
    
    if ($ultimaVirgula !== false && ($ultimoPonto === false || $ultimaVirgula > $ultimoPonto)) {
        // Formato BR: 1.234,56 ou 123,50
        // Remove pontos (separadores de milhar) e converte vírgula para ponto
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
    } else {
        // Formato HTML: 1,234.56 ou 123.50
        // Remove vírgulas (separadores de milhar) - ponto já é decimal
        $valor = str_replace(',', '', $valor);
    }
    
    return floatval($valor);
}	
function BaseEL_encode($num) { // Converte numérico para base58
    $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz'; // Base58 sem 0, O, I, l
    $digits = '123456789'; // Apenas números de 1 a 9 (evitando 0)

    $num1 = ($num % 9) + 1; // Primeiro número (1 a 9)
    $num2 = (intval($num / 9) % 9) + 1; // Segundo número (1 a 9)

    $letter1 = $letters[$num % strlen($letters)]; // Primeira letra baseada no número
    $letter2 = $letters[intval($num / 2) % strlen($letters)]; // Segunda letra baseada no número
    $letter3 = $letters[intval($num / 3) % strlen($letters)]; // Terceira letra baseada no número

    return "{$num1}{$letter1}{$letter2}{$num2}{$letter3}";
}
function BaseEL_decode($str) { // Converte base58 para numérico
	$num1 = (int)$str[0] - 1;
    $num2 = (int)$str[3] - 1;

    return ($num2 * 9) + $num1;
}
function eSex($data=0){return date('Y-m-d',strtotime(eSeg($data).' +4 days'));} // Informa qual dia sera sexta feira
function eSeg($data=0){ // Informa qual dia sera segunda feira
	if(is_date($data)){
		return date("Y-m-d",strtotime(Data($data,2)." monday"));
	}
	if(is_numeric($data)){
		$data_agora = Data(null,2);
		return date("Y-m-d",strtotime("$data_agora ".((date("N",strtotime($data_agora))==1)?null:'last')." monday +$data weeks"));
	}
}
function is_date($date, $format = 'Y-m-d'){ // Verifica se uma data é válida
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}
function URINull($max,$min=1){global $URI; for($i=$min;$i<=$max;$i++){ if(!isset($URI[$i])){$GLOBALS['URI'][$i] = null;} }}
function UrlOpen(){ // Verifica se a URL é aberta
	global $URI;
	$URLs = ['login','wiki','descad','atas','qrCode','politicas-de-cookies'];
	return ((in_array($URI[0],$URLs))?true:false);
}
function gCaptcha($Exibir=false){
	global $MS;
	if($Exibir == true OR @$MS['exibir-captcha']){
		$Key = UniqMD5();
		$N1 = rand(0,9);
		$N2 = rand(0,9);
		$_SESSION['captcha'][$Key] = $N1 + $N2;
		return ['codigo'=>"Quanto é <span class=\"badge text-bg-warning mx-1 mb-1\"><i class=\"fa fa-$N1\"></i> + <i class=\"fa fa-$N2\"></i></span>?",'key'=>$Key];
	} return ['codigo'=>NULL,'key'=>NULL];
}
function Logado($Conta=false){ // Verifica se o usuário está logado
	global $MS;
	$Logado = (isset($MS['user_id']))?true:false;
	$Logado = (isset($Conta) OR $Conta == false) ? $Logado : boolval(is_numeric($MS['user_id']));
	return $Logado;
}
function hdr($pagina=''){ // Redireciona para outra pagina
	print "<script>window.location = '/$pagina';</script>";
    return true;
}
function shdr($pagina,$tempo=2){ // Redireciona para outra pagina com status
    if(strlen($pagina) == 0 OR is_numeric($pagina)){ return false; }
	$tempo = $tempo?:1;
	$GLOBALS['SHDR'] = $tempo;
    print "<script>
	$(function(){
		var bar = $('#shdr_bar');
		var b = ".str_replace(',','.',(100 / ceil($tempo/0.250))).";
		var w = 0;
		setInterval(function(){
			w = w + parseInt(b);
			bar.width((w<=100?w:100)+'%');
			if(w >= 100){ return false; }
		}, 250);
		setTimeout(function(){window.location = '/$pagina';}, ".($tempo*1000+250).");
	});
	</script>";
    return true;
}
function Token($Token=false){ // Gera ou verifica um token
	
	// Verificação se a sessão tokens foi criada
	if (!isset($_SESSION['form_token'])) {
        $_SESSION['form_token'] = [];
    }

	// Verificação se a sessão tokens possui mais de 30 tokens
	if(count($_SESSION['form_token']) > 30){
		// Caso tenha mais de 30 tokens, ele irá remover os 30 primeiros
		$_SESSION['form_token'] = array_slice($_SESSION['form_token'], -10);
	}

    // Verificação se o token informado consta na sessão tokens
    if ($Token !== false) {
		// Caso seja informado um token, ele irá verificar se ele consta na sessão
        if (($key = array_search($Token, $_SESSION['form_token'], true)) !== false) {
			// Caso o token conste na sessão, ele irá remover o token da sessão e retornar verdadeiro
            $_SESSION['form_token'] = [];
            return true;
        }
        return false;

    }else{

		// Caso não seja informado um token, ele irá gerar um novo token e atribuir a sessão;
		$Token = bin2hex(random_bytes(16));
		$_SESSION['form_token'][] = $Token;
		return '<input type="hidden" name="form_token" value="'.$Token.'">';
	}
}
function crc16($payload) { // Calcula o CRC16
    $polynomial = 0x1021;
    $result = 0xFFFF;

    foreach (str_split($payload) as $char) {
        $result ^= (ord($char) << 8);
        for ($i = 0; $i < 8; $i++) {
            $result = ($result & 0x8000)
                ? (($result << 1) ^ $polynomial)
                : ($result << 1);
            $result &= 0xFFFF;
        }
    }
    return strtoupper(dechex($result));
}
function gerarQRCodeBase64($url) {
    // Cria o QR Code com a URL fornecida
    $qrCode = QrCode::create($url)
        ->setSize(300) // Tamanho do QR Code
        ->setEncoding(new Encoding('UTF-8')); // Definindo a codificação UTF-8

    // Usa o writer para gerar o PNG do QR Code
    $writer = new PngWriter();
    $qrCodeImage = $writer->write($qrCode);

    // Obtém o conteúdo do QR Code em formato PNG
    $imagemPng = $qrCodeImage->getString();

    // Codifica a imagem em Base64
    $imagemBase64 = base64_encode($imagemPng);

    // Retorna a string Base64 no formato de URL data:image/png
    return 'data:image/png;base64,' . $imagemBase64;
}
function Button($Tipo='save',$Badge=false,$ButtonID=NULL){

	$BadgeButton = '<span id="FNButtonBadge" class="badge-alt text-bg-warning float-start">'.(is_numeric($Badge)?$Badge:0).'</span>';
	$BadgeButton = ($Badge === false) ? NULL : $BadgeButton ;
	$ButtonID = (strlen($ButtonID))?$ButtonID:NULL;

	switch($Tipo){
		case 'save': return '<button type="submit" id="'.$ButtonID.'" class="btn btn-sm btn-success w-px-150">'.$BadgeButton.'<i class="fa fa-save me-1"></i> SALVAR</button>'; break;
		case 'save-b': return '<button type="button" id="'.$ButtonID.'" class="btn btn-sm btn-success w-px-150">'.$BadgeButton.'<i class="fa fa-save me-1"></i> SALVAR</button>'; break;
		case 'upload': return '<button type="submit" id="'.$ButtonID.'" class="btn btn-sm btn-success w-px-150">'.$BadgeButton.'<i class="fa fa-upload me-1"></i> ENVIAR</button>'; break;
		case 'upload-b': return '<button type="button" id="'.$ButtonID.'" class="btn btn-sm btn-success w-px-150">'.$BadgeButton.'<i class="fa fa-upload me-1"></i> ENVIAR</button>'; break;
		default: return false;
	}
}
function ppre($vetor){
	global $MEUTIPO,$MS; if($MEUTIPO != 0 AND @$MS['superuser']==false AND $_SERVER['HTTP_HOST']!='learnpilot.com'){return false; }
	// Rastreia o local que esta chamando a funcao
	$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
	echo "Função chamada por: " . $trace[1]['function'] . " no arquivo " . $trace[0]['file'] . " linha " . $trace[0]['line'] . '<br/>' . PHP_EOL;
	// Rastreia o nome do vetor
	foreach($GLOBALS as $K1=>$V1){
		if(is_array($V1) AND $V1===$vetor){print "[=======( $K1 )=======]<br/>".PHP_EOL; break;}
	}
	// Exibe o vetor
	print '<pre>'; print_r($vetor); print '</pre>';
	
	return false;
}
function iSelect($valor,$check){ return $valor == $check ? 'selected="selected"':null; }
function iCheck($valor,$check,$precision=false){ if($precision){ return $valor === $check ? 'checked':null; }else{ return $valor == $check ? 'checked':null; } }
function ReKey($Array,$Key){$ATemp = []; if(is_array($Array) AND $Key){foreach($Array as $K=>$V){if(array_key_exists($Key,$V)){$ATemp[$V[$Key]] = $V;}}}else{return false;} unset($Array); return $ATemp;}
function Alert($texto,$color=false,$reduce=false){

	$Content = '<div class="card shadow-md my-2">
		<div class="card-header text-bg-'.($color?'success':'danger').'">
			<i class="bi bi-exclamation-triangle-fill me-1"></i> ATENÇÃO!
		</div>
		<div class="card-body text-center">'.$texto.'</div>
	</div>';

	if($reduce){
		$Content = '<div class="row justify-content-center">
			<div class="col-12 col-sm-10 col-md-8">
				'.$Content.'
			</div>
		</div>';
	}
	
	print $Content;
	return;
}
function Calendario($MES=false,$Saida=false){
	global $ANOBASE;
	$MES = (is_numeric($MES))?$MES:date('m');
	$MES = ($MES<0)?1:$MES; $MES = ($MES>12)?12:$MES;
	$MAX = date('t',strtotime("$ANOBASE-$MES-$01"));
	$FDay = date("Y-m-d",strtotime("$ANOBASE-$MES-01 ".(1 - intval(date('N',strtotime("$ANOBASE-$MES-01"))))." days"));
	$LDay = date("Y-m-d",strtotime("$ANOBASE-$MES-$MAX ".(5 - intval(date('N',strtotime("$ANOBASE-$MES-$MAX"))))." days"));
	$Cd = []; $DIA = $FDay;
	if($Saida==='fl'){
		// INICIO E FIM DO MES
		$Cd = [$FDay,$LDay];
	}else{
		while($DIA <= $LDay){
			$N = intval(date("N",strtotime($DIA)));
			if($N!=6 AND $N!=7){
				$INS = date('d',strtotime($DIA));
				$Cd[intval(date("W",strtotime($DIA)))][$N] = ($Saida==false) ? (($MES!=date('m',strtotime($DIA))) ? 'false' : $INS) : $INS;
			} $DIA = date("Y-m-d",strtotime("$DIA +1 day"));
		}
	} return $Cd;
}
function is_par($Valor){
	return ($Valor % 2 == 0)?true:false;
}
function Romanos($integer) {
	if(!is_numeric($integer)){return null;}
	$table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); $return = '';
	while($integer > 0){foreach($table as $rom=>$arb){if($integer >= $arb){$integer -= $arb;$return .= $rom;break;}}}
	return $return;
}
function VarrerIsNumeric($Array){ // VALIDA SE A LISTA É SÓ DE NÚMEROS
	if(is_array($Array)){foreach($Array as $K1=>$V1){if(!is_numeric($V1)){unset($Array[$K1]);}} return $Array;} return false;
}
function Byte2($size){
	$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
	$power = $size > 0 ? floor(log($size, 1024)) : 0;
	return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}  
function FileIcon($Ext,$Mod='icon'){
	$TIPO = [
		'pdf'=>['file-pdf','danger'],
		'doc'=>['file-word','primary'],
		'docx'=>['file-word','primary'],
		'png'=>['file-image','verpsc'],
		'jpg'=>['file-image','verpsc'],
		'jpge'=>['file-image','verpsc'],
		'gif'=>['file-image','verpsc'],
		'bug'=>['file','secondary']
	];
	$Ext = array_key_exists($Ext,$TIPO) ? $Ext : 'bug';
	switch($Mod){
		case 'icon': return $TIPO[$Ext][0]; break;
		case 'color': return $TIPO[$Ext][1]; break;
		default: return $TIPO;
	}
}
function TextTag($Texto,$All=false){
	switch($All){
		case true: return strip_tags($Texto); break;
		case false: return strip_tags($Texto,'<img><a><p><font><b><strong><span><br><hr><i><li><ol><ul><table><tr><td><u><em><i>'); break;
		default: return strip_tags($Texto,$All);
	}
}
function UniqMD5(){return md5(date('dmY His').rand(0,99999999).date('Y-m-d H:i:s'));}
function ValidarCPF($cpf){
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {return false;}
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {return false;}
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function GoogleTranslateAPI($texto) {
    // Preparar a URL com o texto codificado
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=pt&dt=t&q=" . urlencode($texto);
    
    // Fazer a requisição
    $resposta = file_get_contents($url);
    
    if ($resposta === false) {
        return false;
    }
    
    // Decodificar o JSON
    $dados = json_decode($resposta, true);
    
    // Extrair a tradução
    if (isset($dados[0][0][0])) {
        return $dados[0][0][0];
    }
    
    return false;
}


function Publicidade($Return = false){
	$Json = file_get_contents("https://hcbravin.github.io/edbank/api/sponsors.json");
	$Json = json_decode($Json, true);

	switch($Return){
		case 'company':
			return $Json['sponsors'][0]['company'];
			break;
			
		case 'person':
			return $Json['sponsors'][0]['person'];
			break;

		default: return $Json['sponsors'][0];
	}
}
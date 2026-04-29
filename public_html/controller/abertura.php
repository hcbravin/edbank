<?php if($URI[0] == 'abertura'){ 
    
    if($URI[1] == 'agencia'){
        require_once Views . '/abertura/agencia.php';
    }

    if($URI[1] == 'conta'){
        require_once Views . '/abertura/conta.php';
    }




 } 
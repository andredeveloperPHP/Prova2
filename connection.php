<?php
//variaveis de conexão

//instancia da minha conexão:
    function connections(){
     try{
            $host = "localhost";
            $db = "Andre";
            $user = "root";
            $pass = "";
            $port = "3306";
    $connect = new mysqli($host, $user, $pass, $db, $port);
            return $connect;
            }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
/*
    ($connect->connect_errno) {
    echo "Erro de conexão com a base" . $connect->connect_error;
    
}

if (isset($connect)) :
    $frase = strtoupper("<center> Conectado a sua base de dados! </center>");
    echo $frase;

else :
    echo strtoupper("<center> Sem conexão com a Base de dados </center>");
    exit();
//Poderia tratar com try/catch aqui.
endif;

}
*/
?>

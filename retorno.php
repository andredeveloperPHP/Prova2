<?php
session_start();

include_once('connection.php');
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$creci = filter_input(INPUT_POST, 'creci', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);


$inserir = ("INSERT INTO corretor VALUES('$nome','$creci','$cpf')");
$sql = mysqli_query(connections(),$inserir);
$row = mysqli_fetch_row($sql);

if($row > 0){
    $_SESSION['texto'] = "Funcionou!";
    header("Location:prova2.php");

}else{
    $_SESSION['negativo'] = "Não Funcionou!";
    header("Location:prova2.php");
   
}

//header("Location:prova2.php");
//$andre->bind_param("sii",$nome, $creci, $cpf);
//$andre->execute

/*
var_dump($nome);
echo "<br>";
var_dump($creci);
echo "<br>";
var_dump($cpf);
echo "<br>";
echo "inserido no banco";
*/



function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

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




?>
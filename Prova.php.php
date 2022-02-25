

    ?>

    <p><?php echo strtoupper($frase); ?> </p>

    <form action="" method="POST">
        <label class="lb--1"> Digite seu Nome </label><br>
        <br>
        <input class="box--1" type="text" name="nome">
        <br>
        <label class="lb--2"> Digite seu Creci </label><br>
        <br>
        <input class="box--2" type="text" name="creci">
        <br>
        <label class="lb--3">Digite seu CPF </label>
        <br><br>
        <input class="box--3" type="int" name="cpf">
        <br><br>
        <input class="button" type="submit" value="Enviar">

        <input class="button2" type="button" value="Editar">
        <br><br>
        <input class="button3" type="button" value="Limpar Campos">
        <br>
        <hr>
        <br>
        

    </form>

    <?php

    $locale = "../Prova.php";

    if (empty($_POST['nome']) || empty($_POST['creci'] || empty($_POST['cpf']))) :
        header("Location:$locale");
        exit();
    endif;
    //dados que vem do formulario:

    $arg =  mysqli_real_escape_string($connect, $_POST['nome']);
    $arg2 = mysqli_real_escape_string($connect, $_POST['creci']);
    $arg3 = mysqli_real_escape_string($connect, $_POST['cpf']);

    //validador CPF:
    if(empty($cpf)) {
        return false;
    }
 
    $cpf = preg_match('/[0-9]/', $cpf)?$cpf:0;

    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    
    if (strlen($cpf) != 11) {
        echo "length";
        return false;
    }
    
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;

     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }

     //funcão ára inserir os dados na base de dados
     $statement = $connect->prepare("INSERT INTO corretor(nome, cpf, creci) VALUES(?, ? , ?)");
     $statement->bind_param('sss', $arg, $arg2, $ar3);
     $query = $connect->query("SELECT * FROM corretor);

     function excluirRegistro(){
        $sql = DELETE FROM corretor WHERE nome == $arg AND creci == arg2 AND cpf == arg3;
        return $sql;
       
    </body>
</html>

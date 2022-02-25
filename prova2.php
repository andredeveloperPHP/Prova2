<?php session_start();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Prova </title>
</head>
<body>

    <h1 class="title">        
    </h1>
    <div class="table">
        <form action="retorno.php" method="POST">
            <label class="lb1">Digite o Nome:</label>
            <br><br>
            <hr>
            <input type="text" name="nome" class="campo">
            <br>
            <hr>
            <label class="lb2">Digite o Creci</label>
            <br><br>
            <input type="text" name="creci" class="campo2">
            <br>
            <label class="lb3">Digite o CPF</label>
            <br><br>
            <input type="text" name="cpf" maxlength="11" class="campo3">
            <br><br>
            <input type="submit" value="Enviar">
            <br><br>
            <input type="button" value="Limpar">
            <br><br>
            <input type="button" value="Editar">
            <br>
                     
        </form>
        <?php
        if(isset($_SESSION['texto'])):
            echo $_SESSION['texto'];
            unset($_SESSION['texto']);
        endif;
        


        ?>
            

    </div>
</body>
</html>
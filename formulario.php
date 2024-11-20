

<?php
    if (isset($_POST['submit']))
    { 
    

    //    print_r($_POST['nome']);
    //    print_r($_POST['email']);
    //    print_r($_POST['telefone']);

    //}
    //else{
    
    //    print_r('não funcionou');
            
    // }



    //print_r('Gênero: ' . $_POSt['genero']);
    //print_r('<br>');

    //print_r('Data de Nascimento: ' . $_POSt['data_nascimento']);
    //print_r('<br>');

    //print_r('Cidade: ' . $_POSt['cidade']);
    //print_r('<br>');

    //print_r('Estado: ' . $_POSt['estado']);
    //print_r('<br>');

    //print_r('Endereco: ' . $_POSt['endereco']);
    //print_r('<br>');

    //print_r('Senha: ' . $_POSt['senha']);
    //print_r('<br>');


    //print_r($_POST['email']);
    //print_r($_POST['telefone']);
    //print_r($_POST['genero']);
    //print_r($_POST['data_nascimento']);
    //print_r($_POST['cidade']);
    //print_r($_POST['estado']);
    //print_r($_POST['endereco"']);
    //print_r($_POST['senha"']);

    include_once('config.php');


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];

    
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,genero,data_nascimento,cidade,estado,endereco,senha) 
    VALUES('$nome','$email','$telefone','$genero','$data_nasc','$cidade','$estado','$endereco','$senha')");
    
    //$result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,genero,data_nascimento,cidade,estado,endereco,senha) 
    //VALUES ('$nome','$email','$telefone','$genero','$data_nasc','$cidade','$estado','$endereco','$senha')");
    }

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap"
        rel="stylesheet">
    <title>Formulario de Cadastro</title>
</head>

<body>
    <div class="container">
        <form action="formulario.php" method="POST">
            <h1>Cadastro Clientes Coffee Dream</h1>

            <div class="input-container">
                <input placeholder="Nome Completo" name="nome" type="text" id="nome" class="inputuser" required>
                <img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/48/user--v1.png" alt="user--v1"/>
            
            </div>


            <div class="input-container">
                <input placeholder="E-mail" name="email" type="email" id="email" class="inputuser" required>
                <!--<img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/48/user--v1.png" alt="user--v1"/>
            -->
            </div>

            <div class="input-container">
                <input placeholder="Telefone" name="telefone" type="tel" id="telefone" class="inputuser" required>
                <!--<img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/48/user--v1.png" alt="user--v1"/>
            -->
            </div>


            <div class="select">
                <p> Como gostaria de ser chamado ?</p>

                <input type="radio" id="Sr." name="genero" value="Sr."required>
                <label for="Sr.">Sr.</label>

                <input type="radio" id="Sra." name="genero" value="Sra."required>
                <label for="Sra.">Sra.</label>

                <input type="radio" id="voce" name="genero" value="voce"required>
                <label for="voce">Você</label>
            </div>

            <div class="input-container">
                <label for="data_nascimento">Data de nascimento</label>
                <input placeholder="data_nascimento" name="data_nascimento" type="date"
                    id="data_nascimento"required>
                <!--<img width="20" height="20" src="https://img.icons8.com/ios-filled/50/lock-2.png" alt="lock-2"/>-->
            </div>

            <div class="input-container">
                <input placeholder="Cidade" type="text" name="cidade" id="cidade" class="inputuser"required>
                <!--<img width="20" height="20" src="https://img.icons8.com/ios-filled/50/lock-2.png" alt="lock-2"/>-->
            </div>

            <div class="input-container">
                <input placeholder="Estado" type="text" name="estado" id="estado" class="inputuser"required>
                <!--<img width="20" height="20" src="https://img.icons8.com/ios-filled/50/lock-2.png" alt="lock-2"/>-->
            </div>

            <div class="input-container">
                <input placeholder="Endereco" type="text" name="endereco" id="endereco"
                    class="inputuser"required>
                <!--<img width="20" height="20" src="https://img.icons8.com/ios-filled/50/lock-2.png" alt="lock-2"/>-->
            </div>

            <div class="input-container">
                <input placeholder="senha" type="password" name="senha" id="senha" class="inputuser"required>
                <!--<img width="20" height="20" src="https://img.icons8.com/ios-filled/50/lock-2.png" alt="lock-2"/>-->
            </div>

            <!--<div class="input-container">
                <a href="#">Esqueci minha senha</a>
                
            </div>-->
            
            <button href = "./login.php" type="submit" name="submit" id="submit" class="submit-button">Enviar</button>    

            <div class="register-link">
                <!--<p>Não está cadastrado ? <a href="#">Cadastrar</a></p>-->
                <p><a href="./home.php">Voltar</a></p>
            </div>

        </form>
    </div>

    
    



</body>

</html>
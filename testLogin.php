<?php
session_start();

//print_r($_REQUEST);

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{
//Acessa sistema
    include_once('config.php');
    $email= $_POST['email'];
    $senha= $_POST['senha'];

//print_r('Email: ' . $email);
//print_r('<br>');
//print_r('Senha: ' . $senha);
    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) 
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);    
        header('location: formulario.php');

    }
    else
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location: produtos.php');  
    }
//print_r($result);
//print_r($sql);


}


else {

    header('location: login.php');

}


//else {
// não acessa sistema
//}

//if ($conexao->connect_errno) {
//    echo "Erro";
//}
//else {
//    echo "Conexão efetuada com sucesso";
//}
?>
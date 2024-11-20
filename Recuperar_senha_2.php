<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="style_rec_senha_2.css">
    <title>Coffee_Dream - Recuperar Senha</title>
    <br><br><br>
</head>

<body>
<div class="container">
    <h1>Recuperar Senha</h1>
<?php
session_start();
ob_start();
//include_once 'config.php';

// Configurações do banco de dados
$dbHost = 'localhost';
$dbUsername = 'Fernando';
$dbPassword = '515651';
$dbName = 'clientes_coffee_dream';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//if ($conexao->connect_errno) {
  //echo "Erro";
//}
//else {
  //  echo "Conexão efetuada com sucesso";
//}

//Consulta email na base:

$dados = filter_input_array(type: INPUT_POST, options: FILTER_DEFAULT);

if (!empty($dados['SendRecupSenha'])) {
    
   // var_dump("dados do formulario" , $dados);
    //var_dump("email informado" ,$dados ["usuario"]);
    $email = $dados["usuario"];
    $query_usuario = 'SELECT id, Nome, email 
                FROM usuarios 
                WHERE email = $email 
                LIMIT 1';
    $result_usuario = $conexao->query($query_usuario);
    //$result_usuario->execute ($dados['email']);
   // var_dump("resultado 1 consulta" ,$result_usuario);
    //echo"$result_usuario";
    
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//$mail = new PHPMailer(true);
// Verifica se o e-mail foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $dados["usuario"];

  // Verifica se o e-mail existe no banco de dados
  $query = "SELECT * 
            FROM usuarios
            WHERE email = '$email'
            LIMIT 1";
  $result = $conexao->query($query);
  //var_dump("numero de registros encontrados no cadastro" ,$result);

  $row = $result->num_rows;



  if ($row > 0) {
    // Gera uma nova senha aleatória
    $nova_senha = substr(md5(rand()), 0, 80);

    // Atualiza a senha no banco de dados
    $query = "UPDATE usuarios SET senha = '" . password_hash($nova_senha, PASSWORD_DEFAULT) . "' WHERE email = '$email'";
    $conexao->query($query);
    $query_new_pass = "SELECT senha
                       FROM usuarios
                       WHERE email = '$email'
                       LIMIT 1";
    $result_query_new_pass = $conexao->query($query_new_pass);
    while( $nova_senha = mysqli_fetch_row($result_query_new_pass)){
      //echo "<p>" .$nova_senha[0];
      $nova_senha_final = $nova_senha[0];
    };
    //$nova_senha_final = $nova_senha[0];
   
    
    //var_dump("senha alterada no Cadastro" , $nova_senha_final);

  

    // Envia e-mail com a nova senha (opcional)
    require_once "phpMailer/src/phpMailer.php";
    require_once "phpMailer/src/SMTP.php";
    require_once "phpMailer/src/Exception.php";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "sandbox.smtp.mailtrap.io";
    $mail->SMTPAuth = true;
    $mail->Username = "fa3e50125f4666";
    $mail->Password = "867fa9a375a450";
    $mail->Port = 2525;

    $mail->setFrom("bibogot321@opposir.com");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Recuperação de senha Cofee Dream";
    $mail->Body = " Olá $email <p> Sua Senha foi Recuparada com Sucesso!! 
    <p> Retorne a tela de Login e entre novamente!
    <p>Sua nova senha:<p> $nova_senha_final ";
   // var_dump(($nova_senha_final));

    $mail->send();

    echo "Senha recuperada com sucesso! acesse seu email para obter a nova senha.<p>";
  } else {
    echo "E-mail não encontrado!";
  }
}

$conexao->close();

?>
<form method="POST" action="">
        <?php
        $usuario = "";
        if (isset($dados['usuario'])) {
            $usuario = $dados['usuario'];
        } ?>

        <label></label>
        <div class="input-container">
        <input type="text" name="usuario" placeholder="Digite o email cadastrado" value="<?php echo $usuario; ?>"><br><br>
        </div>  
        <!--<input type="submit" value="Recuperar" name="SendRecupSenha">-->
        <button type="submit" value="Recuperar" name="SendRecupSenha" id="submit" class="submit-button">Recuperar</button> 
    </form>

    <br>
    <div class="register-link">
    <p>Lembrou? <a href="login.php">clique aqui</a> para logar</p>
    </div>

</div>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="style_alterar_senha.css">
    <title>Coffee_Dream - Alterar Senha</title>
</head>

<body>
<div class="container">
    <h1>Alterar Senha</h1>
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
  // var_dump("email informado" ,$dados ["usuario"]);
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
  $query_validacao = "SELECT senha
                       FROM usuarios
                       WHERE email = '$email'
                       LIMIT 1";
  $result_validacao = $conexao->query($query_validacao);
  $validacao = mysqli_fetch_row($result_validacao);
  //$validado = $validacao[0];  

 // var_dump('resultado validação', $validado);


  if ($row > 0 and ($validacao[0] == $dados['senha_Atual'])) {
    // Gera uma nova senha aleatória
    $nova_senha = substr(md5(rand()), 0, 80);
            $usuario = $dados['usuario'];
            $senhaAtual = $dados['senha_Atual'];
            $novaSenhaManual = $dados['nova_senha'];
    // Atualiza a senha no banco de dados
   
    $query_new_pass = "SELECT senha
                       FROM usuarios
                       WHERE email = '$email'
                       LIMIT 1";
    $result_query_new_pass = $conexao->query($query_new_pass);
    while( $nova_senha = mysqli_fetch_row($result_query_new_pass)){
    //  echo "<p>" .$nova_senha[0];
      $nova_senha_final = $nova_senha[0];

      $query = "UPDATE usuarios 
                SET senha = '$novaSenhaManual' 
                WHERE EMAIL LIKE '$email'";
    $result_update = $conexao->query($query);



    };

    
    //$nova_senha_final = $nova_senha[0];
   
    
   // var_dump("senha alterada no Cadastro" , $nova_senha_final);
   // var_dump("senha atual" , $senhaAtual);
   // var_dump("senha alterada no update" , $result_update);

  

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
    $mail->Subject = "Informe de tentativa de atualização de senha!!";
    $mail->Body = " Senha Atualizada Com Sucesso ! 
    <p> Caso nao reconheca a atualizacao sugerimos atualizar em nosso site imediatamente!
    ";
   // var_dump(($nova_senha_final));

    $mail->send();

    

    echo "Senha alterada com sucesso! <p>";
  } else {
    echo "E-mail não encontrado! ou Dados incorretos";
  }
}

$conexao->close();

?>
<form method="POST" action="">
        <?php
        $usuario = "" ; $senhaAtual = ""; $novaSenhaManual = "";
        if (isset($dados['usuario'])) {
            $usuario = $dados['usuario'];
            $senhaAtual = $dados['senha_Atual'];
            $novaSenhaManual = $dados['nova_senha'];
            //var_dump($novaSenhaManual);
        } ?>

        <label></label> <p>
        <div class="input-container">
        <input type="text" name="usuario" placeholder="Digite o e-mail" value="<?php echo $usuario; ?>"required><br><br>
        <input type="text" name="senha_Atual" placeholder="Digite a senha Atual" value="<?php echo $senhaAtual; ?>"required><br><br>
        <input type="text" name="nova_senha" placeholder="Digite a nova Senha" value="<?php echo $novaSenhaManual; ?>"required><br><br>
        <!--<input type="submit" value="Trocar Senha" name="SendRecupSenha">-->
      </div>

      <button type="submit" value="Trocar Senha" name="SendRecupSenha" id="submit" class="submit-button">Alterar Senha</button> 
    

    </form>

    <br>
    <div class="register-link">
    <p>Login? <a href="login.php">clique aqui</a> para logar</p> 
    
    </div>
</div>
</body>

</html>

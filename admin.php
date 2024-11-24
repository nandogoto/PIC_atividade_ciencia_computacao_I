<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="Style_Admin.css">
    <title>Coffee_Dream - Alterar Senha</title>
</head>

<body>
<div class="">
    <h1>Administração Coffee Dream</h1>
<?php
session_start();
ob_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']); 
    header('location: login.php');

}
$logado = $_SESSION['email'];
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

if (!empty($dados['Consulta']) and (($dados['usuario'])=='Administrador')) {
    
   //var_dump("dados do formulario" , $dados);
  // var_dump("email informado" ,$dados ["usuario"]);
    $email = $dados["usuario"];
    $query_usuario = 'SELECT * 
                FROM usuarios 
                ';
    $result_usuario = $conexao->query($query_usuario);
    echo "<h1>Cadastro de usuários</h1>";
    echo "<table>";
    echo "<thead>";
   
    echo"<tr>";
        echo "<th>ID</th>";
         echo "<th>Nome</th>";
         echo "<th>E-mail</th>";
         echo "<th>Telefone</th>";
         echo "<th>Tratamento</th>";
         echo "<th>Dt.Nasc.</th>";
         echo "<th>cidade</th>";
         echo "<th>estado</th>";
         echo "<th>Endereço</th>";
         echo "<th>Senha</th>";
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
        
while($exibe = mysqli_fetch_assoc($result_usuario)){
   echo "
            
                <tr>
                <td>".$exibe["id"]."</td>
                <td>".$exibe["Nome"]."</td>
                <td>".$exibe["email"]."</td>
                <td>".$exibe["telefone"]."</td>
                <td>".$exibe["genero"]."</td>
                <td>".$exibe["data_nascimento"]."</td>
                <td>".$exibe["cidade"]."</td>
                <td>".$exibe["estado"]."</td>
                <td>".$exibe["endereco"]."</td>
                <td>".$exibe["senha"]."</td>
                </tr>
                </tbody>
                  
             
             <br>";
  
}

echo "</table>";




    //$result_usuario->execute ($dados['email']);
   // var_dump("resultado 1 consulta" ,$result_usuario);
    //echo"$result_usuario";
    
}
//echo $dados["delete"];
if (!empty($dados['deletar']) and (($dados['usuario'])=='Administrador')) {
    
    //var_dump("dados do formulario" , $dados);
    // var_dump("email informado" ,$dados ["usuario"]);
      $id = $dados["exclusao"];
      //var_dump("id inserido" , $id);
      $query_usuario = "DELETE 
                  FROM usuarios
                  WHERE id LIKE $id        ";
      $result_usuario = $conexao->query($query_usuario);
      echo "Usuário excluido com Sucesso";
      
  
  
  
  
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
    $id = $dados["exclusao"];

  // Verifica se o e-mail existe no banco de dados
  $query = "SELECT * 
            FROM usuarios
            WHERE id = '$id'
            LIMIT 1";
  $result = $conexao->query($query);
  //var_dump("numero de registros encontrados no cadastro" ,$result);

  $row = $result->num_rows;
  $query_validacao = "SELECT id
                       FROM usuarios
                       WHERE id = '$id'
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
    echo "";
  }
}

$conexao->close();

?>
<form method="POST" action="">
        <?php
        $usuario = "" ; $senhaAtual = ""; $novaSenhaManual = "";
        if (isset($dados['usuario'])) {
            $usuario = $dados['usuario'];
           // $senhaAtual = $dados['senha_Atual'];
           // $novaSenhaManual = $dados['nova_senha'];
            //var_dump($novaSenhaManual);
        } ?>

        <label></label> <p>
        <div class="input-container">
        <input type="text" name="usuario" placeholder="Digite o usuario" value="<?php echo $usuario; ?>"required><br><br>
        <!--<input type="text" name="senha_Atual" placeholder="Digite a senha Atual" value=""required><br><br>
        <input type="text" name="nova_senha" placeholder="Digite a nova Senha" value=""required><br><br>
        <input type="submit" value="Trocar Senha" name="SendRecupSenha">-->
      </div>

      <button type="submit" value="Trocar Senha" name="Consulta" id="submit" class="submit-button">Consultar cadastro de usuários</button><br><br> 
      <div class="input-container"> 
      <input type="text" name="exclusao" placeholder="ID do usuario a excluir" value="<?php //echo $novaSenhaManual; ?>"><br><br>  
      </div>  
      <button type="submit" value="Trocar Senha" name="deletar" id="submit" class="submit-button">Exclui usuários</button> <br><br>
      
    </form>

    <br>
    <div class="register-link">
    <p><a href="./home.php">clique aqui</a> para home Page</p>   
    <p><a href="./sair.php">clique aqui</a> para sair</p> 
    
    </div>
</div>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap"
        rel="stylesheet">
    <title>Tela de Login</title>
</head>
<body>
    <header class="header">
        <section>
            <a href="./home.php" class="logo">
                <img src="./Coffee_Dream_logo1.png" alt="logo">
            </a>
            <nav class="navbar">
                <a href="./home.php">Home</a>
                <a href="./home.php#about">Sobre</a>
                <a href="home.php#menu">Menu</a>
                <a href="home.php#review">Avaliações</a>
                <a href="home.php#address">Endereço</a>
                <a href="./login.php">Login</a>
            </nav>
            <div class="icons">
                
            <a href="#" class="busca">
            <img width="30" height="30" src="https://img.icons8.com/ios-filled/30/ffffff/search--v1.png"
                    alt="search--v1" />
            </a>
            
            <a href="./produtos.php" class="carrinho">
            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/ffffff/shopping-cart--v1.png"
                    alt="shopping-cart--v1" />
            </a>
                
            </div>
        </section>
    </header>

    <div class="container">
        <form action = "testLogin.php" method ="POST">
            <h1>Login Coffee Dream</h1>
            <div class="input-container">
                <input name="email" placeholder="Email" type="email" required>
                <img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/48/user--v1.png" alt="user--v1"/>
            </div>
            
            <div class="input-container">
                <input name="senha" placeholder="senha" type="password" required>
                <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/lock-2.png" alt="lock-2"/>
                <a href="./recuperar_senha_2.php">Esqueci minha senha</a>
            </div>

            <button type="submit" name="submit" id="submit" class="submit-button">Login</button> 
            <div class="register-link">
                <p>Não está cadastrado ? <a href="formulario.php">Cadastrar</a></p> 
                <p>Trocar senha ? <a href="AlterarSenha.php">Atualizar Senha</a></p> 
                <p><a href="./home.php">Voltar</a></p> 
            </div>
  
        </form>
    </div>
    
    



</body>
</html>
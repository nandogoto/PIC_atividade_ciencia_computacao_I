<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']); 
        header('location: login.php');
    }
    $logado = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_produtos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap"
        rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script async src= "loja.js" async></script>
    
        <title>Checkout</title>
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
                
            </nav>
            <div class="end_session">
            <?php
                echo"<a>Bem vindo(a): <u>$logado<u>  </a>";
                ?>  
            <a href="./sair.php" type="subnit" name="button" id="button" class="submit-button">SAIR</a> 
             
            </div>  
            
            
            <div class="icons">
                <img width="30" height="30" src="https://img.icons8.com/ios-filled/30/ffffff/search--v1.png"
                    alt="search--v1" />
                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/ffffff/shopping-cart--v1.png"
                    alt="shopping-cart--v1" />

                
            </div>
            
              

        </section>
        
    </header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php


?>
     <section class="container2 normal-section">
        <h2 class="section-title">Carrinho</h2>

        <table class="cart-table">
          <thead>
            <tr>
              <th class="table-head-item first-col">Item</th>
              <th class="table-head-item second-col">Preço</th>
              <th class="table-head-item third-col">Quantidade</th>
            </tr>
          </thead>

          <tbody>
            <tr class="cart-product">
              <td class="product-identification">
                <img src="./menu-1 - mini.png" alt="Miniatura" class="cart-product-image">
                <br>
                <strong class="cart-product-title">Café Coado </strong>
              </td>
              <td>
                <span class="cart-product-price">R$ 15,90</span>
              </td>
              <td>
                <input type="number" value="2" min="0" class="product-qtd-input">
                <button type="button" class="btn-remove">Remover</button>
              </td>
            </tr>
            <tr class="cart-product">
              <td class="product-identification">
                <img src="./menu-2 - mini.png" alt="Poster 3" class="cart-product-image">
                <br>
                <strong class="cart-product-title">Café Expresso Fast</strong>
              </td>
              <td>
                <span class="cart-product-price">R$ 25,90</span>
              </td>
              <td>
                <input type="number" value="1" min="0" class="product-qtd-input">
                <button type="button" class="btn-remove">Remover</button>
              </td>
            </tr>
          </tbody>

          <tfoot>
            <tr>
              <td colspan="3" class="cart-total-container">
                <strong>Total</strong>
                <span>R$ 00,00</span>
              </td>
            </tr>
          </tfoot>
        </table>

        <button type="button" class="purchase-button">Finalizar Compra</button>
      </section>
    </main>

    



</body>    


</html>
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
    include_once('config.php');

    
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
    
        <title>Produtos</title>
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
                <?php
                if($logado == "Administrador@cofeeDream.com.br"){
                  echo'<a href="./admin.php">Admin</a>';
                }
                ?>
              
                
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

    <br>
    <br>
    <br>
    <br>

    <main class="main-section">
      <section class="container normal-section">
        <h2 class="section-title">Nossas delícias diárias.</h2>

        <div class="products-container">
          <div class="cafes">
            <strong class="product-title">Café coado        </strong>
            <!-- <br> -->
            <img src="./menu-1.png" alt="item-1" class="product-image">
            <div class="product-price-container">
              <span class="product-price">R$ 15,90</span>
              <button type="button" class="buttonAddChart">Adicionar ao carrinho</button>
            </div>
          </div>

          <div class="cafes">
            <strong class="product-title">Café expresso fast</strong>
            <!-- <br> -->
            <img src="./menu-2.png" alt="item-2" class="product-image">
            <div class="product-price-container">
              <span class="product-price">R$ 25,90</span>
              <button type="button" class="buttonAddChart">Adicionar ao carrinho</button>
            </div>
          </div>
  
          <div class="cafes">
            <strong class="product-title">Café expresso relax</strong>
            <!-- <br> -->
            <img src="./menu-3.png" alt="item-3" class="product-image">
            <div class="product-price-container">
              <span class="product-price">R$ 29,90</span>
              <button type="button" class="buttonAddChart">Adicionar ao carrinho</button>
            </div>
          </div>
  
          <div class="cafes">
            <strong class="product-title">Café expresso dream</strong>
            <!-- <br> -->
            <img src="./menu-4.png" alt="item-4" class="product-image">
            <div class="product-price-container">
              <span class="product-price">R$ 35,99</span>
              <button type="button" class="buttonAddChart">Adicionar ao carrinho</button>
            </div>
          </div>
        </div>
      </section>

      <section class="container2 normal-section">
        <h2 class="section-title">Delícias Especiais</h2>

        <div class="products-container">
          <div class="cafes">
            <strong class="product-title">Café voyager</strong>
            <!-- <br> -->
            <img src="./menu-5.png" alt="Camiseta" class="product-image">
            <div class="product-price-container">
              <span class="product-price">R$ 45,90</span>
              <button type="button" class="buttonAddChart">Adicionar ao carrinho</button>
            </div>
          </div>

          <div class="products-container">
          <div class="cafes">
            <strong class="product-title">Café Expresso Max</strong>
            <!-- <br> -->
            <img src="./menu-6.png" alt="Miniatura" class="product-image">
            <div class="product-price-container">
              <span class="product-price">R$ 45,99</span>
              <button type="button" class="buttonAddChart">Adicionar ao carrinho</button>
            </div>
          </div>
        </div>
      </section>

      <section class="container2 normal-section" id="container2">
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
                <br>   <div class="pagamento">
              <p> Escolha a Forma de pagamento ?</p>
                
              <input type="radio" id="Pix" name= "fPagamento" value="Pix"required>
              <label for="Pix">Pix</label>

              <input type="radio" id="Crédito" name="fPagamento" value="Crédito"required>
              <label for="Crédito">Crédito</label>

              <input type="radio" id="Débito" name="fPagamento" value="Débito"required>
              <label for="Débito">Débito</label>

              <input type="radio" id="Dinheiro" name="fPagamento" value="Dinheiro"required>
              <label for="Dinheiro">Dinheiro</label>
          </div>             
            </div>
              </td>
            </tr>
          </tfoot>
        </table>
        
        

        <button type="button" class="purchase-button">Finalizar Compra</button>
         <!--<a href="./checkout.php" type="button" name="button_finalizar" id="button_finalizar" class="checkout_button">FINALIZAR COMPRA</a> 
  --> 
      </section>
      <p> </p>
      <p> </p>
      <p> </p>
      <p> </p>
      <p> </p>
    </main>

    <!--<footer class="main-footer">
      <div class="container3 main-footer-container">
        <h3 class="movie-title-medium movie-title">Coffee Dream redes sociais</h3>
        <ul class="list-container">
          <li class="footer-item">
            <a href="https://pt-br.facebook.com/" target="_blank">
              <img src="./facebook.png" alt="Facebook logo">
            </a>
          </li>
          <li class="footer-item">
            <a href="https://open.spotify.com/" target="_blank">
              <img src="./spotify.png" alt="Spotify logo">
            </a>
          </li>
          <li class="footer-item">
            <a href="https://www.youtube.com/" target="_blank">
              <img src="./youtube.png" alt="Youtube logo">
            </a>
          </li>
        </ul>
      </div>
    </footer>-->
    
</div class ="endereco_entrega">
<?php
     $entrega = substr(md5(rand()), 0, 80);

  $emailConsulta = $logado;  
  $query_endereco ="SELECT endereco 
                    FROM usuarios
                    WHERE email = '$logado'
                    LIMIT 1";
$result_query_endereco = $conexao->query($query_endereco); 
while( $entrega = mysqli_fetch_row($result_query_endereco)){
    $entrega_final = $entrega[0];
    //  echo($entrega_final);
};
if (document.readyState = "loading") {
    document.addEventListener("DOMContentLoaded", ready)
} else {
    ready()
}

var totalAmount = "0,00"

function ready() {

    const removeProductButtons = document.getElementsByClassName("btn-remove")
    for (var i = 0; i < removeProductButtons.length; i++) {
        removeProductButtons[i].addEventListener("click", removeProduct)
        
    }
    const quantityInputs = document.getElementsByClassName("product-qtd-input")
    for (var i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener("change", checkIfInputIsNull)
        
    }

    const addToCartButtons = document.getElementsByClassName("buttonAddChart")
    for (var i = 0; i < addToCartButtons.length; i++) {
        addToCartButtons[i].addEventListener("click", addProductToCart)
    }

    
    const purchaseButton = document.getElementsByClassName("purchase-button")[0]
    purchaseButton.addEventListener("click", makePurchase)
}

function removeProduct(event) {
    event.target.parentElement.parentElement.remove()
    updateTotal()
  }

function checkIfInputIsNull(event){
    if(event.target.value == "0") {
     event.target.parentElement.parentElement.remove()
    }
 
     updateTotal()
 }

function addProductToCart(event) {
        const button = event.target
        const productInfos = button.parentElement.parentElement
        const productImage = productInfos.getElementsByClassName("product-image")[0].src
        const productTitle = productInfos.getElementsByClassName("product-title")[0].innerText
        const productPrice = productInfos.getElementsByClassName("product-price")[0].innerText
        
        const productChartName = document.getElementsByClassName("cart-product-title")
        for(var i = 0; i < productChartName.length; i++) {
            if (productChartName[i].innerText == productTitle){
                productChartName[i].parentElement.parentElement.getElementsByClassName("product-qtd-input")[0].value++
                return
            
            }
        }

        
        let newChartProduct = document.createElement("tr")
        newChartProduct.classList.add("cart-product")
        //newChartProduct.getElementsByClassName("buttonAddChart")[0].addEventListener("click", updateTotal)

        newChartProduct.innerHTML = 
        `
        <td class="product-identification">
                <img src="${productImage}" alt="${productTitle}" class="cart-product-image">
                <br>
                <strong class="cart-product-title">${productTitle}</strong>
              </td>
              <td>
                <span class="cart-product-price">${productPrice}</span>
              </td>
              <td>
                <input type="number" value="1" min="0" class="product-qtd-input">
                <button type="button" class="btn-remove">Remover</button>
              </td>
        `

        const tableBody = document.querySelector(".cart-table tbody")
        tableBody.append(newChartProduct)
        updateTotal()

       newChartProduct.getElementsByClassName("btn-remove")[0].addEventListener("click", removeProduct)
       newChartProduct.getElementsByClassName("product-qtd-input")[0].addEventListener("change", checkIfInputIsNull)
         
}

function makePurchase() {
    if(totalAmount == "0,00"){
       alert ("Seu Carrinho está vazio!")
    }else{
        
        var FormaPagamento = ["Dinheiro"]
        //var entregaFinal = ''
        console.log(FormaPagamento)
        
        var entrega_final = "<?php echo $entrega_final; ?>";
        console.log(entrega_final)
        alert(
            
        
   
           `Obrigado pela sua compra!
           
           valor do pedido: R$ ${totalAmount}
           Forma de pagamento: ${FormaPagamento}
           volte Sempre :) `
                        
       )
    }
   
   document.querySelector(".cart-table tbody").innerHTML = ""
   updateTotal()
   
   }
   
function updateTotal() {

    
    const cartProduct = document.getElementsByClassName("cart-product")
    totalAmount = 0
    
    for (var i = 0; i < cartProduct.length; i++) {
        //console.log(cartProduct [i])
        const productPrice = cartProduct[i].getElementsByClassName("cart-product-price")[0].innerText.replace("R$ ", "").replace(",", ".")
        const productQuantity = cartProduct[i].getElementsByClassName("product-qtd-input")[0].value

        totalAmount += productPrice * productQuantity

    }
    totalAmount = totalAmount.toFixed(2)
    totalAmount = totalAmount.replace(".", ",")
    document.querySelector(".cart-total-container span").innerText = "R$" + totalAmount

}



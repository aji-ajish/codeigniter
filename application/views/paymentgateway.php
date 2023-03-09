<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  .product-page-container {
  display: flex;
  flex-wrap: wrap;
}

.product-image {
  flex-basis: 50%;
  padding: 20px;
  box-sizing: border-box;
}

.product-image img {
  max-width: 100%;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.product-info {
  flex-basis: 50%;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.product-info h2 {
  font-size: 36px;
  margin-bottom: 20px;
}

.product-info p {
  font-size: 20px;
  margin-bottom: 30px;
  line-height: 1.5;
}

.product-info #product-price {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 30px;
  color: #f9a11b;
  text-shadow: 1px 1px 0px #e68a00;
}

.product-info label {
  display: block;
  margin-bottom: 20px;
  font-size: 20px;
  color: #777;
}

.product-info input[type="number"],input[type="text"] {
  width: 80px;
  margin-right: 10px;
  border-radius: 5px;
  border: 2px solid #ccc;
  padding: 5px;
  font-size: 20px;
  color: #444;
}

.product-info button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin-top: 30px;
  border-radius: 5px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease;
  cursor: pointer;
}

.product-info button:hover {
  background-color: #3e8e41;
}


    </style>
</head>
<body>
<div class="product-page-container">
  <div class="product-image">
    <img src="https://cdn.shopify.com/s/files/1/0984/4522/products/PHP-Open-tag-T-Shirt-5_large.jpg?v=1581667416" alt="Product Image">
  </div>
  <div class="product-info">
    <h2>Product Title</h2>
    <p>Product Description</p>
    <p>Product Price: <span id="product-price">150</span></p>
    <!-- <label for="quantity">Quantity:</label> -->
    <!-- <input type="number" id="quantity" value="1"> -->
    <form method="post" action="<?=base_url('PaymentGateway/payment')?>">
    <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1">
        <input type="hidden" id="amount" name="amount" value="150">
        <input type="text" id="total"   value="150" disabled> <br>
    <button id="add-to-cart-button">Add to Cart</button>
    </form>
     
  </div>
</div>

<script> 
const quantityInput = document.getElementById("quantity"); 
quantityInput.addEventListener("change", (event) => {
    const quantity = parseInt(quantityInput.value);
  const productPrice = parseFloat(document.getElementById("product-price").innerText);
  const totalPrice = quantity * productPrice;
  // document.getElementById("amount").value=totalPrice;
  document.getElementById("total").value=totalPrice;
});


</script>
</body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <title>Payment Failure</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<style>
    body {
  background-color: #f1f1f1;
}

.container {
  width: 50%;
  margin: 0 auto;
  padding: 50px;
  background-color: #fff;
  text-align: center;
}

h1 {
  font-size: 36px;
  margin-bottom: 20px;
}

p {
  font-size: 18px;
  margin-bottom: 20px;
}

a {
  display: block;
  margin-top: 20px;
  font-size: 18px;
  color: #fff;
  background-color: #4CAF50;
  padding: 10px 20px;
  text-decoration: none;
}

a:hover {
  background-color: #3e8e41;
}

</style>
</head>
  <body>
    <div class="container">
      <h1>Payment Failure</h1>
      <p>Your payment could not be processed.</p>
      <p>Please try again later or contact customer support.</p>
      <a href="<?=base_url('PaymentGateway/')?>">Return to Checkout</a>
    </div>
  </body>
</html>

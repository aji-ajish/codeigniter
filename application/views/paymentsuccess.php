<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>.payment-success-container {
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
  padding: 50px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.success-icon {
  font-size: 100px;
  color: #4CAF50;
  margin-bottom: 50px;
}

.success-icon i {
  animation: scale-up 0.5s ease-in-out;
}

@keyframes scale-up {
  0% {
    transform: scale(0.5);
  }
  100% {
    transform: scale(1);
  }
}

h2 {
  font-size: 36px;
  margin-bottom: 20px;
}

p {
  font-size: 20px;
  margin-bottom: 10px;
}

.continue-shopping-button {
  display: inline-block;
  background-color: #4CAF50;
  color: #fff;
  padding: 15px 30px;
  border-radius: 5px;
  text-decoration: none;
  margin-top: 30px;
  transition: background-color 0.3s ease;
}

.continue-shopping-button:hover {
  background-color: #3e8e41;
}
</style>
</head>
<body>
<div class="payment-success-container">
  <div class="success-icon">
    <i class="fas fa-check-circle"></i>
  </div>
  <h2>Payment Successful</h2>
  <p>Thank you for your purchase!</p>
  <p>Order ID: <?=rand(99999,9999999)?></p>
  <p>Total Amount: $99.99</p>
  <a href="<?=base_url('PaymentGateway/')?>" class="continue-shopping-button">Continue Shopping</a>
</div>


</body>
</html>
<?php
include 'connection.php';
session_start();
$id = $_GET['id'];
$type = $_GET['type'];
$customer = $_SESSION['customer-id'];
if (!isset($_SESSION['customer-id'])){
  header("location:?page=home");
}
$select=$connection->query("SELECT REFERENCENO,IF('$type'='fp',TOTAL,TOTAL/2) as 'TOTAL' from tblbookpackages where ID='$id'");
$rows = mysqli_fetch_array($select);
$amount = $rows['TOTAL'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Greenfields Paradise Resort</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Online Billing and Reservation system is an online system that manages the billing and reservation transaction of the resort." />
  <meta name="author" content="Bael, Sheberllie Moira K. - Partosa, Claude Mikhail O. - Naybe, Sean Kyle G." />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="misc/logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body> 
 
<div class="container">
  <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h2>Payment Transaction</h2>
          <div class="panel panel-default">
            <div class="panel-body">
              <p>This portal payment is for capstone purposes only.</p>
              <form method="POST" action="stripepayment.php?id=<?php echo $id;?>&type=<?php echo $type;?>&a=<?php echo $amount;?>">
                <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="pk_test_IfBx5x5L006GXzsACplEw5fS"
                                            data-amount="<?php echo $rows['TOTAL']*100;?>"
                                            data-currency="php"
                                            data-label="Pay with Your Card"
                                            data-name="Greenfield Paradise Resort | Payments"
                                            data-description="<?php echo $rows['REFERENCENO'];?>"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto">
               </script>
              </form>
            </div>
          </div>
      </div>
      <div class="col-md-4"></div>

  </div>
  
</div>

</body>
</html>

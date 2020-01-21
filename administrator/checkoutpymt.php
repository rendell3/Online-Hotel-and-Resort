<?php
session_start();
include ('../connection.php');
$username = $_SESSION['username'];
$roleid = $_SESSION['roleid'];
if (!isset($username) && $roleid < 1)
{
  header("location:index");
}
?>
<!DOCTYPE html>
<html lang="en">

<?php 
include ('inc/head.php');
?>
<body>
    <!--Preloader-->
    <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
<div class="wrapper theme-1-active pimary-color-red">
        <!--/Preloader-->
<!-- Top Menu Items -->
<!-- Navbar Menu -->
<?php 
include ('inc/navbar.php');
?>
<!-- Navbar Menu -->

<!-- Left Sidebar Menu -->
<?php include ('inc/sidebar-staff.php');?>
<!-- /Left Sidebar Menu -->
<!-- Main Content -->
<div class="page-wrapper">
 <?php include ('forms/checkoutpymtContent.php');?>
</div>
        <!-- /Main Content -->
</div>
<?php 
include ('inc/footer-script.php');
?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$(".loader").hide();
var remaining = $("#remaining").val();
$("#amount").keyup(function(){
  var additional = parseInt($("#additional").val());
  var remaining = parseInt($("#remaining").val());
  // alert(additional);
  var amount = parseInt($("#amount").val());
  var total = amount-(remaining+additional);
  $("#changeamount").val(total.toFixed(2));
  });

$(".btnPayment").click(function(){
  $(".loader").show();
  var amount = $("#amount").val();
  var refno = $("#refno").val();
  var remarks = $("#remarks").val();
  
  $.ajax({
                    url: "../userprograms/addCheckoutPayments.php",
                    type :"POST",
                    data:{amount:amount,refno:refno,remarks:remarks},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
  });
});

</script>

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
 <?php include ('forms/entrystaffContent.php');?>
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
 $('.add-cart').click(function () {
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');
        var name = $(this).attr('data-name');
        var quantity = $('#cartPackage' + id).val();
        var total = price*quantity;
        // alert(id);
        var data={id:id,price:price,name:name,quantity:quantity,total:total};
        $.ajax({
                url: "../userprograms/addCart.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".cartProducts").html(result);
                $(".loaderLogin").hide();

       //       
         }});
        });
  $('.delete-packages').click(function () {
    var id = $(this).attr('data-id');
            // alert(id);
              $.ajax({
                      url: "../userprograms/deleteCart.php",
                      type :"POST",
                      data:{id:id},
                      success: function(result){
                      $(".cartProducts").html(result);
                      $(".loaderLogin").hide();
               }});
    });


$(".btnCheckOut").click(function(){
    var lastname = $("#lastname").val();
    var firstname = $("#firstname").val();
    var contact = $("#contact").val();
    var email = $("#email").val();
    var refno = $("#refno").val();
    var checkin = $("#checkin").val();
    var checkout = $("#checkout").val();
    var downpayment = $("#downpayment").val();
  $.ajax({
                        url: "../userprograms/addWalkin.php",
                        type :"POST",
                        data:{firstname:firstname,lastname:lastname,contact:contact,email:email,refno:refno,checkin:checkin,checkout:checkout,downpayment:downpayment},
                        success: function(result){
                        $(".cartProducts").html(result);
                        $(".loaderLogin").hide();
  }});
});

});

</script>

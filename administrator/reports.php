<?php
session_start();
include ('../connection.php');
$username = $_SESSION['username'];
$roleid = $_SESSION['roleid'];
if (!isset($username) || $roleid != 1)
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
<?php include ('inc/sidebar.php');?>
<!-- /Left Sidebar Menu -->
<!-- Main Content -->
<div class="page-wrapper">
 <?php include ('forms/reportsContent.php');?>
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

$(".btnPrint").click(function(){
  $(".loader").show();
  var tor = $("#tor").val();
  var datefrom = $("#dateFrom").val();
  var dateto = $("#dateTo").val();
  var status = $("#status").val();
  $.ajax({
        url: "../userprograms/collReports.php",
        type :"POST",
        data:{tor:tor,datefrom:datefrom,dateto:dateto,status:status},
        success: function(result){
        $(".reportsresults").html(result);
        $(".loader").hide();
    }});
  });

$(".tor").change(function(){

  $('.status')[0].options.length = 0;

  var tor = $("#tor").val();
    if (tor == "Collection") {
      var selectValues = {
      "Fully Payment": "Fully Payment",
      "Half Payment": "Half Payment"
      };
    }
      if (tor == "Bookings"){
      var selectValues = {
        "Cancelled": "Cancelled",
        "Checked Out": "Checked Out",
        "Check In" : "Checked In",
        "Request Reschedule":"Reschedule"
        };
    }

      var $mySelect = $('.status');
      //
      $.each(selectValues, function(key, value) {
        var $option = $("<option/>", {
          value: key,
          text: value
        });
        $mySelect.append($option);
      });

  });
});    
</script>

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
 <?php include ('forms/dashboardContent.php');?>
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
  var dataTable = $('#tablePackages').DataTable({
    'processing': true,
    'serverSide': true,
    'serverMethod': 'post',
    //'searching': false, // Remove default Search Control
    'ajax': {
       'url':'scripts/dashboard.php',
       'data': function(data){
          // Read values
          var category = $('#searchByCategory').val();
          var pricefrom = $('#pricefrom').val();
          var priceto = $('#priceto').val();

          // Append to data
          data.searchByCategory = category;
          data.pricefrom = pricefrom;
          data.priceto = priceto;
       }
    },
    'columns': [
       { data: 'fldProductName' }, 
       { data: 'fldProductUnit' },
       { data: 'fldProductPrice' },
       { data: 'tblCategories_fldCategoryId' },
       { data: 'fldProductCode' },
    ]
  });

  $('#searchByCategory').change(function(){
    dataTable.draw();
  });

  $('#priceto').change(function(){
    dataTable.draw();
  });
});

</script>

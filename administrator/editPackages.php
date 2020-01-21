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
   <?php include ('forms/editPackagesContent.php');?>
 </div>

<?php 
include ('inc/footer-script.php');
?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$(".loader").hide();

$(".btnUpdate").click(function(){
    $(".loader").show();
    var forms = $("#formUploadUpdate").serialize();
    $.ajax({
        url: "../userprograms/updatePackages.php",
        type :"POST",
        data:forms,
        success: function(result){
        $(".results").html(result);
        $(".loader").hide();
    }});
});

});
</script>
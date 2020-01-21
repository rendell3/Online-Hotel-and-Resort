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
 <?php include ('forms/categoriesContent.php');?>
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
$(".btnUpdateCategory").hide();
$(".btnDeleteCategory").hide();

$(".btnAddCategory").click(function(){
    $(".loader").show();
    var categoryname = $("#txtCategoryName").val();
            // alert(categoryid);
    $.ajax({
        url: "../userprograms/addCategory.php",
        type :"POST",
        data:{categoryname:categoryname},
        success: function(result){
        $(".results").html(result);
        $(".loader").hide();
    }});
});

var tableCategories = $('#tableCategories').DataTable({
      "processing": true,
        "serverSide": true,
        "ajax": "scripts/categories.php",
        "columnDefs": [ {
            "targets": 1
       }]
});

    $('#tableCategories tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
          var data = tableCategories.row('.selected').data();
          $(".btnUpdateCategory").show();
          $(".btnDeleteCategory").show();
          $(".btnAddCategory").hide();
          $("#txtCategoryId").val(data[0]);
          $("#txtCategoryName").val(data[1]);
          
          $(".btnUpdateCategory").click(function(){
            $(".loader").show();
            var categoryid = $("#txtCategoryId").val();
            var categoryname = $("#txtCategoryName").val();
            // alert(categoryid);
            $.ajax({
                    url: "../userprograms/updateCategory.php",
                    type :"POST",
                    data:{categoryid:categoryid,categoryname:categoryname},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
          });

          $(".btnDeleteCategory").click(function(){
            $(".loader").show();
            var categoryid = $("#txtCategoryId").val();
            var categoryname = $("#txtCategoryName").val();
            // alert(categoryid);
            $.ajax({
                    url: "../userprograms/deleteCategory.php",
                    type :"POST",
                    data:{categoryid:categoryid,categoryname:categoryname},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
          });


          $(this).removeClass('selected');
        }
        else {
            tableCategories.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

    });
});    
</script>
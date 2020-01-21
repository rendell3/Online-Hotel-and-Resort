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
 <?php include ('forms/usersContent.php');?>
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
$(".btnUpdateUser").hide();
$(".btnDeleteUser").hide();

$(".btnAddUser").click(function(){
    $(".loader").show();
    var txtRole = $("#txtRole").val();
    var txtUsername = $("#txtUsername").val();
    var txtPassword = $("#txtPassword").val();
    var txtRepeatPassword = $("#txtRepeatPassword").val();

            // alert(Roleid);
    $.ajax({
        url: "../userprograms/addUsers.php",
        type :"POST",
        data:{txtRole:txtRole,txtUsername:txtUsername,txtPassword:txtPassword,txtRepeatPassword:txtRepeatPassword},
        success: function(result){
        $(".results").html(result);
        $(".loader").hide();
    }});
});

var tableUsers = $('#tableUsers').DataTable({
      "processing": true,
        "serverSide": true,
        "ajax": "scripts/users.php",
        "columnDefs": [ {
            "targets": 4
       }]
});

    $('#tableUsers tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
          var data = tableUsers.row('.selected').data();
          $(".btnUpdateUser").show();
          $(".btnDeleteUser").show();
          $(".btnAddUser").hide();
          $("#txtUserId").val(data[0]);
          $("#txtUsername").attr('readonly',true);
          $("#txtUsername").val(data[1]);
          $("#txtPassword").val(data[2]);
          $("#txtRepeatPassword").val(data[2]);
          $("#txtRole").val(data[4]);

          
          $(".btnUpdateUser").click(function(){
            $(".loader").show();
            var txtUserId = $("#txtUserId").val();
            var txtRole = $("#txtRole").val();
            var txtUsername = $("#txtUsername").val();
            var txtPassword = $("#txtPassword").val();
            var txtRepeatPassword = $("#txtRepeatPassword").val();
            // alert(Roleid);
            $.ajax({
                    url: "../userprograms/updateUsers.php",
                    type :"POST",
                    data:{txtUserId:txtUserId,txtRole:txtRole,txtUsername:txtUsername,txtPassword:txtPassword,txtRepeatPassword:txtRepeatPassword},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
          });

          $(".btnDeleteUser").click(function(){
            $(".loader").show();
            var txtUserId = $("#txtUserId").val();
            // alert(Roleid);
            $.ajax({
                    url: "../userprograms/deleteUsers.php",
                    type :"POST",
                    data:{txtUserId:txtUserId},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
          });


          $(this).removeClass('selected');
        }
        else {
            tableUsers.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

    });
});    
</script>
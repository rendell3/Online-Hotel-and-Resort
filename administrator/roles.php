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
 <?php include ('forms/RolesContent.php');?>
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
$(".btnUpdateRole").hide();
$(".btnDeleteRole").hide();

$(".btnAddRole").click(function(){
    $(".loader").show();
    var rolename = $("#txtRoleName").val();
            // alert(Roleid);
    $.ajax({
        url: "../userprograms/addRole.php",
        type :"POST",
        data:{rolename:rolename},
        success: function(result){
        $(".results").html(result);
        $(".loader").hide();
    }});
});

var tableRoles = $('#tableRoles').DataTable({
      "processing": true,
        "serverSide": true,
        "ajax": "scripts/roles.php",
        "columnDefs": [ {
            "targets": 1
       }]
});

    $('#tableRoles tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
          var data = tableRoles.row('.selected').data();
          $(".btnUpdateRole").show();
          $(".btnDeleteRole").show();
          $(".btnAddRole").hide();
          $("#txtRoleId").val(data[0]);
          $("#txtRoleName").val(data[1]);
          
          $(".btnUpdateRole").click(function(){
            $(".loader").show();
            var Roleid = $("#txtRoleId").val();
            var Rolename = $("#txtRoleName").val();
            // alert(Roleid);
            $.ajax({
                    url: "../userprograms/updateRole.php",
                    type :"POST",
                    data:{Roleid:Roleid,Rolename:Rolename},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
          });

          $(".btnDeleteRole").click(function(){
            $(".loader").show();
            var Roleid = $("#txtRoleId").val();
            var Rolename = $("#txtRoleName").val();
            // alert(Roleid);
            $.ajax({
                    url: "../userprograms/deleteRole.php",
                    type :"POST",
                    data:{Roleid:Roleid,Rolename:Rolename},
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});
          });


          $(this).removeClass('selected');
        }
        else {
            tableRoles.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

    });
});    
</script>
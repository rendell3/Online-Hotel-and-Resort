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


<head>
    <meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Greenfields Paradise Resort</title>
<!-- CSRF Token -->
<meta name="csrf-token" content="NiIjBAMP9f7RFDJv9SEu6HjtTy76DtkCNyGmjuKq">
<meta name="description" content="Online Billing and Reservation system is an online system that manages the billing and reservation transaction of the resort." />
<meta name="author" content="Bael, Sheberllie Moira K. - Partosa, Claude Mikhail O. - Naybe, Sean Kyle G." />

<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Noto+Sans:400,700" rel="stylesheet">
<link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
<link href="vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
<!-- vector map CSS -->
<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Data table CSS -->
<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

<!-- select2 CSS -->
<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
<link href="vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css" rel="stylesheet" type="text/css"/>
        
<!-- Custom CSS -->
<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

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
 <?php include ('forms/packagesContent.php');?>
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
$('.textarea_editor').wysihtml5({
    toolbar: {
      fa: true,
      "link": true,
    }
});

$('#txtProducts').select2();
$.ajax({
        url: "../userprograms/sp_Products.php",
        type :"GET",
        success: function(result){
        $("#txtProducts").html(result);
        // $(".loader").hide();
}});
$('#btnAdd').click(function () {
  var name = $('#txtName').val();
  var price = $('#txtPrice').val();
  var description = $('#txtDescription').val();
  var succeeding = $('#txtSucceeding').val()
  var products = $('#txtProducts').val();
  var code = $('#txtCode').val();
  var data = {name:name,price:price,description:description,succeeding:succeeding,products:products,code:code};
  $.ajax({
                    url: "../userprograms/addPackages.php",
                    type :"POST",
                    data:data,
                    success: function(result){
                    $(".results").html(result);
                    $(".loader").hide();
             }});

});
var tablePackages = $('#tablePackages').DataTable({
      "processing": true,
        "serverSide": true,
        "ajax": "scripts/packages.php",
        "columnDefs": [ {
            "targets": 5,
            "data" : null,
            "render": function ( data, type, row ) {
                   return "<a href ='editPackages?id="+data[0]+"' class='btn btn-primary btn-xs' target='_blank' ><i class= 'fa fa-edit'></i></a> <button type = 'button' class='btn btn-danger btn-xs delete-package'><i class= 'fa fa-trash'></i></button>";
                },
       }]
});


    $('#tablePackages tbody').on( 'click', '.delete-package', function () {
          var data = tablePackages.row( $(this).parents('tr') ).data();
          // alert(data[0]);
          // console.log(data[0]);
          swal({
                    title: 'Are you sure? ',
                    text: 'Do you want to delete this package?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'No, cancel'
                }).then(result => {
                  // alert(result);
                    if (result) {
                        var id = data[0];
                        // alert(data);
                        // console.log(id);
                        $.ajax({
                                url: "../userprograms/deletePackages.php",
                                type :"POST",
                                data:{id:id},
                                success: function(result){
                                  // if (result){
                                  swal('Successful!', 'Package was successfully deleted.', 'success');    
                                  location. reload(true);
                                  // }
                                // $(".results").html(result);
                                // $(".loader").hide();
                                
                         }});
                      };
                });
    });
});    
</script>

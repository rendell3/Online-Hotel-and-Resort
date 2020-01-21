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
 <?php include ('forms/RequestReScheduleContent.php');?>
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

  var tableRequest = $('#tableRequest').DataTable({
        "processing": true,
          "serverSide": true,
          "ajax": "scripts/resched.php",
          "columnDefs": [ {
              "targets":5,
              "data" : null,
              "render": function ( data, type, row ) {
                   return "<button type = 'button' class='btn btn-info btn-xs approve'><i class= 'fa fa-clock-o'></i> For Approval</button>";
                },
         }]
  });

  $('#tableRequest tbody').on( 'click', '.approve', function () {
          var data = tableRequest.row( $(this).parents('tr') ).data();
          // alert(data[0]);
          // console.log(data[0]);
          swal({
                    title: 'Are you sure? ',
                    text: 'Do you want to approved this rescheduling transaction?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, I Approved it',
                    cancelButtonText: 'No, cancel'
                }).then(result => {
                  // alert(result);
                    if (result) {
                        var id = data[0];
                        // alert(data);
                        // console.log(id);
                        $.ajax({
                                url: "../userprograms/updateApproveRescheduling.php",
                                type :"POST",
                                data:{id:id},
                                success: function(result){
                                  // if (result){
                                  swal('Successful!', 'Approved reschedule!', 'success');    
                                  location. reload(true);
                                  // console.log(result);
                                  // alert(result);
                                  // }
                                // $(".results").html(result);
                                // $(".loader").hide();
                                
                         }});
                      };
                });
    });

});    
</script>
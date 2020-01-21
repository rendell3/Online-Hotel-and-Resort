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
   <?php include ('forms/editProductContent.php');?>
 </div>

<?php 
include ('inc/footer-script.php');
?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$(".loader").hide();
$(".roomcounters").hide();
$('#inputImage').fileinput({
        showPreview: false,
        browseLabel: "Select an image file...",
        // msgPlaceholder: null,
        // removeClass: 'btn btn-danger',
        // uploadClass: 'btn btn-success',
        showCancel: false,
        allowedFileExtensions: ["jpg", "svg", "png"],
        elErrorContainer: '#divImageError',
        mainClass: 'fileinput fileinput-new input-group'
    }).on('filebatchpreupload', function (event, data, id, index) {
        $('#divImageError').html('');
        // $('#div-success').hide();
    }).on('fileuploaded', function (event, data, id, index) {
        $('#divImageError').html('');
        response = data.response;
        filename = response['filename'];
        $('#inputFilename').val(filename);
});

$("#formUploadUpdate").on('submit',(function(e) {
      // alert("Upload");
      $(".loader").show();
        e.preventDefault();
        $.ajax({
        url: "../userprograms/updateuploadProducts.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
        // alert(data);
        $(".results").html(data);
        $(".loader").hide();
        // $(".progress").hide();
        // alert(data);
        }
      });
}));

});
</script>
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
 <?php include ('forms/galleryContent.php');?>
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

$("#formUploadSell").on('submit',(function(e) {
      // alert("Upload");
      $(".loader").show();
        e.preventDefault();
        $.ajax({
        url: "../userprograms/uploadGallery.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
        // alert(data);
        $("#divError").html(data);
         $(".loader").hide();
        // $(".progress").hide();
        // alert(data);
        }
      });
}));

$('.delete-image').click(function () {
   var dataid = $(this).attr('data-id');
   swal({
                    title: 'Are you sure? ',
                    text: 'Do you want to delete this Image?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, I Approved it',
                    cancelButtonText: 'No, cancel'
                }).then(result => {
                  // alert(result);
                    if (result) {
                        var id = dataid;
                        // alert(data);
                        // console.log(id);
                        $.ajax({
                                url: "../userprograms/updateGalleryDeleted.php",
                                type :"POST",
                                data:{id:id},
                                success: function(result){
                                  // if (result){
                                  swal('Successful!', 'Image successfully deleted.', 'success');    
                                  location. reload(true);
                                  // }
                                // $(".results").html(result);
                                // $(".loader").hide();
                                
                         }});
                      };
                });
});


setTimeout(function () {
            /* Gallery */
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function () {
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });

            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        }, 2000);

});    
</script>
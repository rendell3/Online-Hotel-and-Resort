<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="icon" type="image/png" sizes="16x16" href="misc/logo.png">
	<title>
		<?php echo APP_NAME; ?>
	</title>
	<!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="theme/luxe-master/css/superfish.css">
	<link rel="stylesheet" href="theme/luxe-master/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="theme/luxe-master/css/cs-select.css">
	<link rel="stylesheet" href="theme/luxe-master/css/cs-skin-border.css">
	<link rel="stylesheet" href="theme/luxe-master/css/themify-icons.css">
	<link rel="stylesheet" href="theme/luxe-master/css/flaticon.css">
	<link rel="stylesheet" href="theme/luxe-master/css/icomoon.css">
	<link rel="stylesheet" href="theme/luxe-master/css/flexslider.css">
	<link rel="stylesheet" href="plugins/fullcalendar.min.css">
	<link rel="stylesheet" href="plugins/magnific-popup.css">
	<link rel="stylesheet" href="plugins/sweetalert2.min.css">
	<link rel="stylesheet" href="theme/luxe-master/css/style.css">
	<link rel="stylesheet" href="theme/css/style.css">
	<script src="theme/luxe-master/js/modernizr-2.6.2.min.js"></script>
	<link href="administrator/dist/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="theme/luxe-master/js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
			<div id="fh5co-header">
				<header id="fh5co-header-section">
					<div class="container">
						<div class="nav-header">
							<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
							<h1 id="fh5co-logo"><a href="index.html"><img src="misc/logo.png" height="40"> <strong>GREENFIELDS</strong></a></h1>
							<nav id="fh5co-menu-wrap" role="navigation">
								<ul class="sf-menu" id="fh5co-primary-menu">
									<li><a class="active" href="?page=home">Home</a></li>
									<!-- <li>
								<a href="hotel.html" class="fh5co-sub-ddown">Hotel</a>
								<ul class="fh5co-sub-menu">
								 	<li><a href="#">Luxe Hotel</a></li>
								 	<li><a href="#">Deluxe Hotel</a></li>
									<li>
										<a href="#" class="fh5co-sub-ddown">King Hotel</a>
										<ul class="fh5co-sub-menu">
											<li><a href="http://freehtml5.co/preview/?item=build-free-html5-bootstrap-template" target="_blank">Build</a></li>
											<li><a href="http://freehtml5.co/preview/?item=work-free-html5-template-bootstrap" target="_blank">Work</a></li>
											<li><a href="http://freehtml5.co/preview/?item=light-free-html5-template-bootstrap" target="_blank">Light</a></li>
											<li><a href="http://freehtml5.co/preview/?item=relic-free-html5-template-using-bootstrap" target="_blank">Relic</a></li>
											<li><a href="http://freehtml5.co/preview/?item=display-free-html5-template-using-bootstrap" target="_blank">Display</a></li>
											<li><a href="http://freehtml5.co/preview/?item=sprint-free-html5-template-bootstrap" target="_blank">Sprint</a></li>
										</ul>
									</li>
									<li><a href="#">Five Star Hotel</a></li> 
								</ul>
							</li> -->
									<li><a href="?page=rooms">Rooms</a></li>
									<li><a href="?page=gallery">Gallery</a></li>
									<?php 
										echo $list;
									?>
									
								</ul>
							</nav>
						</div>
					</div>
				</header>
			</div>

			<?php include($include); ?>

			<footer id="footer" class="fh5co-bg-color">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="copyright">
								<p class="text-center"><img src="misc/logo.png" height="80"><br><small>&copy; 2019 <br>Greenfields Paradise
										Resort. <br> All Rights Reserved. </small></p>
							</div>
						</div>
						<div class="col-md-3">
							<h3>Proponents</h3>
							<p>Bael, Sheberllie Moira K. <br>Partosa, Claude Mikhail O. <br>Naybe, Sean Kyle G.</p>
						</div>
						<div class="col-md-3">
							<h3>Navigation</h3>
							<ul class="link">
								<li><a href="?page=home">Home</a></li>
								<li><a href="?page=rooms">Rooms</a></li>
								<li><a href="?page=gallery">Gallery</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<ul class="social-icons">
								<li>
									<a href="#"><i class="icon-twitter-with-circle"></i></a>
									<a href="#"><i class="icon-facebook-with-circle"></i></a>
									<a href="#"><i class="icon-instagram-with-circle"></i></a>
									<a href="#"><i class="icon-linkedin-with-circle"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

		</div>
		<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
<form method="POST" id="formsSerials">
	<!-- Modal -->
	<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><img src="misc/logo.png" height="30"> Greenfields Login</h4>
					<h3 class="modal-title" id="modalLoginLabel"></h3>
					
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="text" class="form-control" placeholder="E-mail address" id="txtUsername">
						</div>
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="password" class="form-control" placeholder="Password" id="txtPassword">
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12 resultLogin">
							<div class="progress loaderLogin">
	                                <div class="progress-bar progress-bar-striped active" role="progressbar"
	                                                          aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
	                                                            Processing
	                            	</div>
	                        </div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btnLogin">Log-in</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><img src="misc/logo.png" height="30"> Greenfields Registration</h4>
					<h3 class="modal-title" id="modalRegisterLabel"></h3>
					
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="text" class="form-control" placeholder="Firstname" id="txtFirstname">
						</div>
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="text" class="form-control" placeholder="Lastname" id="txtLastname">
						</div>
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="text" class="form-control" placeholder="Email" id="txtEmail">
							<small class="text-danger">* Please make sure that this is your correct e-mail address, we will send a confirmation to this e-mail.</small>
						</div>
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="text" class="form-control" placeholder="Mobile" id="txtMobile">
						</div>
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="password" class="form-control" placeholder="Password" id="txtRegisterPassword">
						</div>
						<div class="col-md-12" style="margin-bottom:5px;">
							<input type="password" class="form-control" placeholder="Confirm Password" id="txtConfirmPassword">
						</div>

						<div class="col-md-12 results">
							<div class="progress loader">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                          aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                            Processing
                            	</div>
                            </div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btnRegister">Register</button>
				</div>
			</div>
		</div>
	</div>
</forms>
	<script src="theme/luxe-master/js/jquery-2.1.4.min.js"></script>
	<script src="theme/luxe-master/js/hoverIntent.js"></script>
	<script src="theme/luxe-master/js/superfish.js"></script>
	<script src="theme/luxe-master/js/bootstrap.min.js"></script>
	<script src="theme/luxe-master/js/jquery.waypoints.min.js"></script>
	<script src="theme/luxe-master/js/jquery.countTo.js"></script>
	<script src="theme/luxe-master/js/jquery.stellar.min.js"></script>
	<!-- // <script src="theme/luxe-master/js/owl.carousel.min.js"></script> -->
	<script src="theme/luxe-master/js/bootstrap-datepicker.min.js"></script>
	<script src="theme/luxe-master/js/classie.js"></script>
	<script src="theme/luxe-master/js/selectFx.js"></script>
	<script src="plugins/moment.js"></script>
	<script src="plugins/sweetalert2.min.js"></script>
	<script src="plugins/fullcalendar.min.js"></script>
	<script src="theme/luxe-master/js/jquery.flexslider-min.js"></script>
	<script src="theme/luxe-master/js/custom.js"></script>
	<script src="administrator/dist/js/bootstrap-datetimepicker.js"></script>

	<?php echo $javascript; ?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    $(".loader").hide();
    $(".loaderLogin").hide();
    $(".resultsCheckOut").hide();
    $(".resultsResched").hide();
    
    $(".btnRequestResched").click(function(){
    	$(".resultsResched").show();
    	var req_id = $(".req_id").val();
    	var req_checkIn = $(".req_checkIn").val();
    	var req_checkOut = $(".req_checkOut").val();
    	var req_refno = $(".req_refno").val();
    	// alert(refno+' '+ checkOut +' '+checkIn);
    	var data={req_id:req_id,req_checkIn:req_checkIn,req_checkOut:req_checkOut,req_refno:req_refno};
    	$.ajax({
                url: "userprograms/addRequestReschedule.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".resultSched").html(result);
                $(".resultsResched").hide();
         }});
    });

  //   $(".btnCancelBooking").click(function(){
  //   	$(".resultsResched").show();
  //   	var can_id = $(".can_id").val();
		// var can_refno = $(".can_refno").val();
  //   	// alert(refno+' '+ checkOut +' '+checkIn);
  //   	var data={can_id:can_id,can_refno:can_refno};
  //   	$.ajax({
  //               url: "userprograms/addCancelBooking.php",
  //               type :"POST",
  //               data:data,
  //               success: function(result){
  //               $(".resultSched").html(result);
  //               $(".resultsResched").hide();
  //        }});
  //   });

    $(".btnCheckOut").click(function(){
    	$(".resultsCheckOut").show();
    	var refno = $("#refno").val();
    	var checkIn = $("#checkIn").val();
    	var checkOut = $("#checkOut").val();
    	// alert(refno+' '+ checkOut +' '+checkIn);
    	var data={refno:refno,checkIn:checkIn,checkOut:checkOut};
    	$.ajax({
                url: "userprograms/addBookingCustomer.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".resultChkout").html(result);
                $(".resultsCheckOut").hide();
         }});
    });

    $('.add-cart').click(function () {
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');
        var name = $(this).attr('data-name');
        var quantity = $('#cartPackage' + id).val();
        var total = price*quantity;
        
        var data={id:id,price:price,name:name,quantity:quantity,total:total};
        $.ajax({
                url: "userprograms/addCart.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".cartProducts").html(result);
                $(".loaderLogin").hide();

       //   		
         }});
        });

     $('.delete-packages').click(function () {
		var id = $(this).attr('data-id');
		        // alert(id);
			        $.ajax({
			                url: "userprograms/deleteCart.php",
			                type :"POST",
			                data:{id:id},
			                success: function(result){
			                $(".cartProducts").html(result);
			                $(".loaderLogin").hide();
			         }});
		});


        $('.add-cart-products').click(function () {
        var id = $(this).attr('data-id');
        var price = $(this).attr('data-price');
        var name = $(this).attr('data-name');
        var quantity = $('#cartProd' + id).val();
        var total = price*quantity;
        
        var data={id:id,price:price,name:name,quantity:quantity,total:total};
        console.log(data);
        // $.ajax({
        //         url: "userprograms/addCart.php",
        //         type :"POST",
        //         data:data,
        //         success: function(result){
        //         $(".cartProducts").html(result);
        //         $(".loaderLogin").hide();

        //  }});
        });

    $('.btnLogin').click(function () {
        $(".loaderLogin").show();
        var username = $('#txtUsername').val();
        var password = $('#txtPassword').val();

        var data = {
            username: username,
            password: password
        };
        $.ajax({
                url: "userprograms/login.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".resultLogin").html(result);
                $(".loaderLogin").hide();
         }});
    });

    $('.btnVerify').click(function () {
        $(".loaderLogin").show();
        var ver_code = $('#ver_code').val();
        // var password = $('#txtPassword').val();
        alert(ver_code);
        // var data = {
        //     username: username,
        //     password: password
        // };
        // $.ajax({
        //         url: "userprograms/login.php",
        //         type :"POST",
        //         data:data,
        //         success: function(result){
        //         $(".resultLogin").html(result);
        //         $(".loaderLogin").hide();
        //  }});
    });


    $('.btnRegister').click(function () {
        $(".loader").show();
        var firstname = $('#txtFirstname').val();
        var lastname = $('#txtLastname').val();
        var email = $('#txtEmail').val();
        var contact = $('#txtMobile').val();
        var password = $('#txtRegisterPassword').val();
        var confirm = $('#txtConfirmPassword').val();
        // $('#divRegisterError').html('');
        var data = {
            firstname: firstname,
            lastname: lastname,
            email: email,
            mobile: contact,
            password: password,
            confirm:confirm
        };
        $.ajax({
                url: "userprograms/register.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".results").html(result);
                $(".loader").hide();
         }});
    });

    var dateToday = new Date();
    $('#date-start, #date-end').datepicker({
        startDate:dateToday
    });
    var tabs = function () {
        $('#hotel-facilities').css('height', $('.tab-content.active').height() + 600);

        $(window).resize(function () {
            $('#hotel-facilities').css('height', $('.tab-content.active').height() + 600);
        });

        $('.tabs-nav > a').on('click', function (e) {

            var tab = $(this).data('tab');

            $('.tabs-nav > a').removeClass('active');
            $(this).addClass('active');

            $('.tab-content').removeClass('active show');

            setTimeout(function () {
                $('.tab-content[data-tab-content="' + tab + '"]').addClass('active');
                $('#hotel-facilities').css('height', $('.tab-content.active').height() + 600);
            }, 200);
            setTimeout(function () {
                $('.tab-content[data-tab-content="' + tab + '"]').addClass('show');
            }, 400);


            e.preventDefault();
        });
    };
    $('#date-start').change(function () {
        var start = $(this).val();
        start = moment(start);
        var end = start.add('days', 1);
        end = end.format('MM/DD/YYYY');
        $('#date-end').val(end);
    });

    $('#checkAvailability').click(function () {
        var start = $('#date-start').val();
        var end = $('#date-end').val();

        location.href = '?page=book&start='+start;
    });
    
    $('.form_datetime').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
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

function btnVerify()
{	
	 $(".loaderLogin").show();
	var username = $('#txtUsername').val();
	var ver_code = $('#ver_code').val();
        // var password = $('#txtPassword').val();
     // alert(username+' '+ver_code);
     $.ajax({
                url: "userprograms/verify.php",
                type :"POST",
                data:{username:username,ver_code:ver_code},
                success: function(result){
                $(".resultLogin").html(result);
                $(".loaderLogin").hide();
    }});

}
</script>
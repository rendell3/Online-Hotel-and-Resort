<?php
session_start();
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
    <!--/Preloader-->
    
<div class="wrapper pa-0">
    <header class="sp-header">
        <div class="sp-logo-wrap pull-left">
            <a href="login">
                <img class="brand-img mr-10" src="img/logo.png" alt="brand" height="20" />
                <span class="brand-text">Greenfields Paradise Resort</span>
            </a>
        </div>
        <div class="clearfix"></div>
    </header>

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container-fluid">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Administrator</h3>
                                    <h6 class="text-center nonecase-font txt-grey">Enter credentials below</h6>
                                </div>
                                <div class="form-wrap">

                                <form method="POST">
                                        <input type="hidden" name="_token" value="4qCihibify7o7DuiCAv1axc1rU8mvQBecurJ0Rn5">                                        <div class="form-group">
                                            <label class="control-label mb-10" for="username">Username</label>
                                            <input id="username" type="text" class="form-control"
                                                name="username" value="" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="password">Password</label>
                                            <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot
                                                password ?</a>
                                            <div class="clearfix"></div>
                                            <input id="password" type="password" class="form-control"
                                                name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox checkbox-primary pr-10 pull-left">
                                                <input id="checkbox_2" type="checkbox">
                                                <label for="checkbox_2"> Keep me logged in</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    <div class="col-md-12">
                                        <div class="resultLogin"></div>
                                    </div>
                                    <div class="row loader">
                                        <div class="col-md-4"></div>
                                           <div class="col-md-4" style="text-align: center;">
                                            <img src="img/loader.gif" align="Loader" height="80" width="80" >
                                           </div>
                                        <div class="col-md-4"></div>
                                    </div>

                                        <div class="form-group text-center">
                                            <button type="button" class="btn btn-info btn-rounded btnLogin">sign in</button>
                                        </div>
                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->

</div>
    <!-- JavaScript -->
<?php 
include ('inc/footer-script.php');
?>
<script type="text/javascript">
$(document).ready(function(){
$(".loader").hide();
    $('.btnLogin').click(function () {
        $(".loader").show();
        var username = $('#username').val();
        var password = $('#password').val();

        var data = {
            username: username,
            password: password
        };
        $.ajax({
                url: "../userprograms/login.php",
                type :"POST",
                data:data,
                success: function(result){
                $(".resultLogin").html(result);
                $(".loader").hide();
         }});
    });
});
</script>
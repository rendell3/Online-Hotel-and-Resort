<input type="hidden" id="txtHiddenId" value="<?php echo $userId;?>">
<div class="fh5co-parallax" style="background-image: url(misc/book.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Almost there</h1>
                    <p>We need to verify you</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-5 offset-lg-1 contact_col">
            <div class="contact_content">
                <h1>Thank you for signing-up!</h1>
                <div class="contact_content_text">
                    <p>Unfortunately, we need to confirm you identity by sending a verification code to your registered
                        e-mail address.</p>
                </div>

            </div>
        </div>

        <div class="col-lg-6">
            <div class="intro_form_container text-right">
                <h1 class="intro_form_title input_block">4 DIGIT VERIFICATION CODE</h1>
                <div class="intro_form" id="intro_form">
                    Did not receive any message? <a href='javascript:;' id="btnResend">Resend</a>
                    <div class="d-flex flex-row align-items-start justify-content-between flex-wrap">
                        <input type="text" class="form-control" id="txtPin" placeholder="Please enter verification pin"
                            maxlength="4">
                    </div>
                    <br>
                    <button class="btn btn-success btn-lg" id="btnSubmit">SUBMIT</button>
                    <br>
                    <br>
                    <div id="divError"></div>
                </div>
            </div>
        </div>

    </div>
</div>
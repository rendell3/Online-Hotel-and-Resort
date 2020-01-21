<input type="hidden" id="txtHiddenId" value="<?php echo $userId;?>">
<div class="fh5co-parallax" style="background-image: url(misc/rooms.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Reschedule bookings</h1>
                    <p>Change date of your book now!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 style="font-weight:700;" class="mt-3">Reschedule Bookings</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <input class="form-control req_id" type="hidden" id = "req_id" name="req_id" readonly value="<?php echo $_GET['id'];?>">
                        <input class="form-control req_refno" type="hidden" id = "req_refno" name="req_refno" readonly value="<?php echo $_GET['refno'];?>">

                        <label for="dtp_input1" class="col-md-3 control-label">Check In  Date/Time: </label>
                        <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                            
                            <input class="form-control req_checkIn" type="text" id = "req_checkIn" name="req_checkIn" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" /><br/>
                    </div>

                    <div class="col-md-12">
                        <label for="dtp_input1" class="col-md-3 control-label">Check Out Date/Time:</label>
                        <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                            <input class="form-control req_checkOut" type="text" id="req_checkOut" name="req_checkOut" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" />
                    </div>
                    
                </div>

                <br/>
                <button type="button" class="btn btn-success btnRequestResched pull-right" onclick="">Submit Request</button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="resultSched"></div>
                        <div class="progress resultsResched">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                            Processing
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>



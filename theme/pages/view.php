<input type="hidden" id="txtHiddenId" value="<?php echo $userId;?>">
<div class="fh5co-parallax" style="background-image: url(misc/rooms.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">View bookings</h1>
                    <p>Pay and view your bookings now</p>
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
                <h3 style="font-weight:700;" class="mt-3">Bookings</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label style="color:red;">Note: </label><br/>
                <small style="color:red;">• Please take note your reference no. after your payment has been made.!</small><br/>
                <small style="color:red;">• Strictly no cancellation after your booking is approved or if the payment has been made. Please kindly contact us for the assistance. Thank you!</small>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Reference</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>
                                <th>Details</th>
                                <th>Total Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $select=$connection->query("SELECT * from tblbookpackages where createdby = '$customer' AND STATUS not in ('Cancelled','Checked Out') limit 10");
                            while ($rows=mysqli_fetch_array($select))
                            {
                                $chkin=DateTime::createFromFormat("Y-m-d H:i:s",$rows['CHECKIN'])->format(" F j,Y g:ia l");
                                $chkout=DateTime::createFromFormat("Y-m-d H:i:s",$rows['CHECKOUT'])->format(" F j,Y g:ia l");
                            ?>
                            <tr>
                                <?php 
                                if ($rows['STATUS']=="Half Payment" || $rows['STATUS']=="Fully Payment" )
                                {
                                    ?>
                                    <td><a href="#" class="btn btn-danger btn-xs">Payment Successful</a></td>
                                    <?php
                                }
                                else if ($rows['STATUS']=="For Payment") {
                                    ?>
                                    <td>
                                        <a href="pymt?id=<?php echo $rows['ID'];?>&type=fp" class="btn btn-block btn-success btn-xs" target="_blank">Fully Payment</a>
                                        <a href="pymt?id=<?php echo $rows['ID'];?>&type=hp" class="btn btn-block btn-success btn-xs" target="_blank">Half Payment</a>
                                    </td>
                                    <?php
                                }
                                else if ($rows['STATUS']=="Cancelled") {
                                    ?>
                                     <td><a href="#" class="btn btn-danger btn-xs">Cancelled</a></td>
                                    <?php
                                }

                                else
                                {
                                    ?>
                                    <td><button class="btn btn-block btn-success btn-xs">Pending Request</button>
                                       
                                    </td>
                                    <?php
                                }
                                ?>
                                <td><?php echo $rows['REFERENCENO'];?></td>

                                <td><?php echo $chkin;?></td>
                                <td><?php echo $chkout;?></td>
                                <td style="text-align: center;"><button type="button" class="btn btn-info btn-link btn-xs" data-toggle="modal" data-target="#<?php echo $rows['ID'];?>"><span class="glyphicon glyphicon-list-alt"></span></button></td>

                                <!-- Modal -->
                                <div id="<?php echo $rows['ID'];?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Items <?php echo $rows['REFERENCENO'];?></h4>
                                      </div>
                                      <div class="modal-body">
                                            <?php 
                                            $refno = $rows['REFERENCENO'];
                                            $selectItems = $connection->query("SELECT * from tblbookpackageitems WHERE REFERENCENO = '$refno' and Createdby = '$customer'");
                                            while ($rowItems = mysqli_fetch_array($selectItems))
                                            {
                                                ?>
                                                    <small><b>Name :</b><?php echo $rowItems['fldPackageName'];?></small><br/>
                                                    <small><b>Qty :</b><?php echo $rowItems['fldPackageQuantity'];?></small><br/>
                                                    <small><b>Price :</b><?php echo $rowItems['fldPackagePrice'];?></small><br/>
                                                    <hr>
                                                <?php
                                            }
                                            ?>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                                <td><?php echo $rows['TOTAL'];?></td>
                                <?php 
                                if ($rows['STATUS']!="Cancelled" && $rows['STATUS']!="Approved" && $rows['STATUS']!="Half Payment" && $rows['STATUS']!="Fully Payment" )
                                {
                                    ?>
                                <td>
                                    <a href = "?page=resched&id=<?php echo $rows['ID'];?>&refno=<?php echo $rows['REFERENCENO'];?>" class="btn btn-block btn-info btn-xs" target="_blank">Request for Reschedule</a>

                                    <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#cancel<?php echo $rows['ID'];?>">Cancel Booking</button>

                                     <!-- Modal -->
                                        <div id="cancel<?php echo $rows['ID'];?>" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Cancellation of Booking</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>Are you sure to cancel your booking ?</p>
                                                        <input class="form-control can_id" type="hidden" id = "can_id" name="can_id" readonly value="<?php echo $rows['ID'];?>">
                                                        <input class="form-control can_refno" type="hidden" id = "can_refno" name="can_refno" readonly value="<?php echo $rows['REFERENCENO'];?>">
                                                </div>     
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

                                              <div class="modal-footer">
                                                <a href="userprograms/addCancelBooking?can_id=<?php echo $rows['ID'];?>&can_refno=<?php echo $rows['REFERENCENO'];?>" type="button" class="btn btn-success" onclick="">Yes</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                </td>
                            <?php
                                }
                            ?>

                            </tr>
                           
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



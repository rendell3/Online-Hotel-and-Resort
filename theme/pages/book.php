
<input type="hidden" id="txtStart" value="<?php echo $start;?>">
<input type="hidden" id="txtRoom" value="<?php echo $room;?>">
<input type="hidden" id="txtHiddenId" value="<?php echo $userId;?>">
<div class="fh5co-parallax" style="background-image: url(misc/book.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Have yourself booked now</h1>
                    <p>See you soon at Greenfields Paradise Resort</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <span class="text-danger">The resort implement a strictly no cancellation policy but guests are allowed to reschedule within two weeks or two days depends on the season before the first booking date or else the reservation fees will be forfeited.</span>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>List of Packages/Products Book</b>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <label class="col-md-3 control-label">Transaction Reference #:</label>
                                
                                 <div class="input-group col-md-8">
                                    <input class="form-control" type="text" name="refno" id="refno" value="<?php echo mt_rand();?>" readonly>
                                    
                                </div>

                        </div>

                     <div class="col-md-12">
                                <label for="dtp_input1" class="col-md-3 control-label">Check In Date/Time</label>
                                <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                                    <input class="form-control" type="text" id = "checkIn" name="checkIn" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" value="" /><br/>
                        </div>
                    </div>

                    <div class="row">
                     <div class="col-md-12">
                                <label for="dtp_input1" class="col-md-3 control-label">Check Out Date/Time</label>
                                <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                                    <input class="form-control" type="text" id="checkOut" name="checkOut" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" value="" /><br/>
                        </div>
                    </div>

                    <div class="col-md-12 results">
                            <div class="progress loader">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                          aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                                            Processing
                                </div>
                            </div>
                    </div>

                    <div class="cartProducts"></div>

                    <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <th></th>
                                <th>Name</th>
                                <th>Quanity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $total = array();
                                $createdby = $_SESSION['customer-id'];
                                $select= $connection->query("SELECT * FROM tblmodbookpackages WHERE createdby = '$createdby'");
                                while ($rows = mysqli_fetch_array($select))
                                {
                                 $total[] = $rows['fldPackageTotal'];   
                                ?>
                                    <tr>
                                        <td><?php echo $rows['ID'];?></td>
                                        <td><?php echo $rows['fldPackageName'];?></td>
                                        <td><?php echo number_format($rows['fldPackageQuantity'],2);?></td>
                                        <td><?php echo number_format($rows['fldPackagePrice'],2);?></td>
                                        <td><?php echo number_format($rows['fldPackageTotal'],2);?></td>
                                        <td><a href="javascript:;" class="pull-left delete-packages" data-id="<?php echo $rows['ID'];?>" style="margin-top:10px;"><i class="fas fa-trash"></i></a>
                                    </td>
                                    </tr>
                                <?php
                                }

                                ?>
                                <tr><td>Total</td><td></td><td></td><td></td>
                                <td><?php echo number_format(array_sum($total),2);?></td></tr>
                            </tbody>    
                        </table>
                        </div>
                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="javascript:;" class="btn btn-info btnCheckOut"> Check-out</a>
                        </div> 
                    </div>
                    <div class="resultChkout"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="progress resultsCheckOut">
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
        <div class="col-md-6">
            <ul class="nav nav-tabs nav-justified" id="choicesLinks">
                <li class="active"><a data-toggle="tab" href="#packages">Packages</a></li>
                <li><a data-toggle="tab" href="#rooms">Rooms</a></li>
                <li><a data-toggle="tab" href="#cottages">Cottages</a></li>
                <li><a data-toggle="tab" href="#amenities">Amenities</a></li>
                <li><a data-toggle="tab" href="#recre">Recreational</a></li>

            </ul>
            <div class="panel panel-default" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-top:none;">
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="packages" class="tab-pane fade in active">
                            <?php 
                            $selectPack = $connection->query("SELECT * FROM tblpackages where fldPackageDeleted <> 1 ");
                            while ($rowsPack = mysqli_fetch_arraY($selectPack))
                            {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><i class="fas fa-box"></i></center></div>
                                    <div class="panel-body">
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark"> <?php echo $rowsPack['fldPackageName'];?></span>
                                        </div>
                                    </div>
                                     <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-check-square inline-block mr-10"></i><span class="inline-block txt-dark"> <?php echo $rowsPack['PRODUCTS'];?></span>
                                        </div>
                                    </div>
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money"></i>₱ <?php echo $rowsPack['fldPackagePrice'];?></span>
                                        </div>
                                    </div>
                                   <!--  <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span>
                                        </div>
                                    </div> -->
                                    </div>
                                        <div class="panel-footer">
                                            <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldPackageId'];?>" data-name="<?php echo $rowsPack['fldPackageName'];?>" data-price="<?php echo $rowsPack['fldPackagePrice'];?>" style="margin-top:10px;">
                                            <small>Add to cart <i class="fas fa-cart-plus"></i></small>
                                            </a> 
                                            <input class="form-control form-control-sm pull-right" placeholder="Quantity" type="number" id="cartPackage<?php echo $rowsPack['fldPackageId'];?>" style="width:60%" value="1">
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="rooms" class="tab-pane fade">
                            <?php 
                            $selectPack = $connection->query("SELECT * FROM tblproducts where tblCategories_fldCategoryId = 1 GROUP BY fldProductName");
                            while ($rowsPack = mysqli_fetch_arraY($selectPack))
                            {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
                                    <div class="panel-body">
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark" id="packageName<?php echo $rowsPack['fldProductId'];?>"> <?php echo $rowsPack['fldProductDescription'];?></span>
                                        </div>
                                    </div>
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money"></i>₱ <?php echo $rowsPack['fldProductPrice'];?></span>
                                        </div>
                                    </div>
                                   <!--  <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span>
                                        </div>
                                    </div> -->
                                    </div>
                                        <div class="panel-footer">
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="margin-top:10px;">
                                            <small>Add to cart <i class="fas fa-cart-plus"></i></small></a> 
                                            <input class="form-control form-control-sm pull-right" placeholder="Quantity" type="number" id="cartPackage<?php echo $rowsPack['fldProductCode'];?>" style="width:60%" value="1">
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="cottages" class="tab-pane fade">
                            <?php 
                            $selectPack = $connection->query("SELECT * FROM tblproducts where tblCategories_fldCategoryId = 2");
                            while ($rowsPack = mysqli_fetch_arraY($selectPack))
                            {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
                                    <div class="panel-body">
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark" id="packageName<?php echo $rowsPack['fldProductId'];?>"> <?php echo $rowsPack['fldProductDescription'];?></span>
                                        </div>
                                    </div>
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money"></i>₱ <?php echo $rowsPack['fldProductPrice'];?></span>
                                        </div>
                                    </div>
                                   <!--  <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span>
                                        </div>
                                    </div> -->
                                    </div>
                                        <div class="panel-footer">
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="margin-top:10px;">
                                            <small>Add to cart <i class="fas fa-cart-plus"></i></small></a> 
                                            <input class="form-control form-control-sm pull-right" placeholder="Quantity" type="number" id="cartPackage<?php echo $rowsPack['fldProductCode'];?>" style="width:60%" value="1">
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                         <div id="amenities" class="tab-pane fade">
                            <?php 
                            $selectPack = $connection->query("SELECT * FROM tblproducts where tblCategories_fldCategoryId = 3");
                            while ($rowsPack = mysqli_fetch_arraY($selectPack))
                            {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
                                    <div class="panel-body">
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15">
                                            <i class="fa fa-list-alt inline-block mr-10" ></i>
                                            <span class="inline-block txt-dark" id="packageName<?php echo $rowsPack['fldProductId'];?>"> <?php echo $rowsPack['fldProductDescription'];?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money"></i>₱ <?php echo $rowsPack['fldProductPrice'];?></span>
                                        </div>
                                    </div>
                                   <!--  <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span>
                                        </div>
                                    </div> -->
                                    </div>
                                        <div class="panel-footer">
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="margin-top:10px;">
                                            <small>Add to cart <i class="fas fa-cart-plus"></i></small></a> 
                                            <input class="form-control form-control-sm pull-right" placeholder="Quantity" type="number" id="cartPackage<?php echo $rowsPack['fldProductCode'];?>" style="width:60%" value="1">
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                        <div id="recre" class="tab-pane fade">
                            <?php 
                            $selectPack = $connection->query("SELECT * FROM tblproducts where tblCategories_fldCategoryId = 4");
                            while ($rowsPack = mysqli_fetch_arraY($selectPack))
                            {
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
                                    <div class="panel-body">
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15">
                                            <i class="fa fa-list-alt inline-block mr-10" ></i>
                                            <span class="inline-block txt-dark" id="packageName<?php echo $rowsPack['fldProductId'];?>"> <?php echo $rowsPack['fldProductDescription'];?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money"></i>₱ <?php echo $rowsPack['fldProductPrice'];?></span>
                                        </div>
                                    </div>
                                   <!--  <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span>
                                        </div>
                                    </div> -->
                                    </div>
                                        <div class="panel-footer">
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="margin-top:10px;">
                                            <small>Add to cart <i class="fas fa-cart-plus"></i></small></a> 
                                            <input class="form-control form-control-sm pull-right" placeholder="Quantity" type="number" id="cartPackage<?php echo $rowsPack['fldProductCode'];?>" style="width:60%" value="1">
                                            <div class="clearfix"></div>
                                        </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="panel-footer">
                    <strong>Note:</strong> If an item has succeeding charge, adding a quantity will not multiply it. <br> Example: x3 Venue = 21 hours + 2 hours
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

           <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-dashboard"></i> Clients</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="panel">Staffs</a></li>
<li><a href="entrystaff" class="active">Customer</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
<div class="row">
                 <div class="col-md-3">
                    <div class="panel panel-primary">
                      <div class="panel-heading" style="color:#fff;">Customer Information</div>
                      <div class="panel-body">
                          <div class="col-md-12">
                            <label style="font-weight: bold;">Last Name :</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" >
                          </div>

                          <div class="col-md-12">
                            <label style="font-weight: bold;">Firstname :</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" >
                          </div>

                          <div class="col-md-12">
                            <label style="font-weight: bold;">Contact Number :</label>
                            <input type="text" name="contact" id="contact" class="form-control" >
                          </div>

                          <div class="col-md-12">
                            <label style="font-weight: bold;">Email Address :</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Optional">
                          </div>

                      </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="panel panel-primary">
                      <div class="panel-heading" style="color:#fff;">Items</div>
                      <div class="panel-body">
                                 <div class="col-md-4">
                                   <label >Transaction Reference #:</label>
                                      <input class="form-control" type="text" name="refno" id="refno" value="<?php echo mt_rand();?>" readonly>

                                    <label>Check In:</label>
                                    <input class="form-control" type="date" name="checkin" id="checkin" value="<?php echo date("Y-m-d");?>">

                                    <label>Check Out:</label>
                                    <input class="form-control" type="date" name="checkout" id="checkout" value="<?php echo date("Y-m-d");?>">

                                    <label>Downpayment:</label>
                                    <input class="form-control" type="number" name="downpayment" id="downpayment" >

                                  </div>

                     <div class="col-md-8">
                        <div class="cartProducts"></div>
                     </div>

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
                                $createdby = $_SESSION['username'];
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
                                        <td><a href="javascript:;" class="pull-left delete-packages" data-id="<?php echo $rows['ID'];?>" style="color:red;"><i class="fa fa-trash"></i></a>
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
                            <button type="button" class="btn btn-info btnCheckOut"> Check-out</button>
                        </div> 
                    </div>
           <div class="resultChkout"></div>
         </br>
           <div class="col-md-12">
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center"><center><i class="fas fa-box"></i></center></div>
                                    <div class="panel-body">
                                        <i class="fa fa-list-alt inline-block mr-10"></i><span class="inline-block txt-dark"> <?php echo $rowsPack['fldPackageName'];?></span><br/>
                                       
                                        <i class="fa fa-check-square inline-block mr-10"></i><span class="inline-block txt-dark"> <?php echo $rowsPack['PRODUCTS'];?></span><br/>
                                    
                                       <i class="fa fa-money inline-block mr-10"></i><span class="inline-block txt-dark"><i class="fas fa-money"></i>₱ <?php echo $rowsPack['fldPackagePrice'];?></span>
                                        </div>
                                   <!--  <div class="user-others-details pl-15 pr-15">
                                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i><span class="inline-block txt-dark"><i class="far fa-money-bill-alt"></i> ' + buildSucceeding + '</span>
                                        </div>
                                    </div> -->
                                        <div class="panel-footer" style="padding: 5px;">
                                            <a href="javascript:;" class="btn btn-link pull-left add-cart" data-id="<?php echo $rowsPack['fldPackageId'];?>" data-name="<?php echo $rowsPack['fldPackageName'];?>" data-price="<?php echo $rowsPack['fldPackagePrice'];?>" style="text-decoration: none;">
                                            <small style="color:red;font-weight: bold;">Add to cart <i class="fa fa-cart-plus"></i></small>
                                            </a> 
                                            <input class="form-control form-control-sm pull-left" placeholder="Quantity" type="number" id="cartPackage<?php echo $rowsPack['fldPackageId'];?>" style="width:20%" value="1">
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
                            $selectPack = $connection->query("SELECT * FROM tblproducts where tblCategories_fldCategoryId = 1");
                            while ($rowsPack = mysqli_fetch_arraY($selectPack))
                            {
                            ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="../misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
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
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="text-decoration:none;">
                                            <small style="color:red;font-weight: bold;">Add to cart <i class="fa fa-cart-plus"></i></small></a> 
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="../misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
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
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="text-decoration:none;">
                                            <small style="color:red;font-weight: bold;">Add to cart <i class="fa fa-cart-plus"></i></small></a> 
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <div class="panel panel-default contact-card card-view">
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="../misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
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
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="text-decoration:none;">
                                            <small style="color:red;font-weight: bold;">Add to cart <i class="fa fa-cart-plus"></i></small></a> 
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
                                    <div class="panel-heading text-center"><center><img class="card-user-img img-circle img-products img-responsive" style="object-fit:cover" src="../misc/<?php echo $rowsPack['IMAGES'];?>" alt="<?php echo $rowsPack['IMAGES'];?>"/><strong id="<?php echo $rowsPack['fldProductCode'];?>"><?php echo $rowsPack['fldProductName'];?></strong></center></div>
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
                                             <a href="javascript:;" class="pull-left add-cart" data-id="<?php echo $rowsPack['fldProductCode'];?>" data-name="<?php echo $rowsPack['fldProductName'];?>" data-price="<?php echo $rowsPack['fldProductPrice'];?>" style="text-decoration:none;">
                                            <small style="color:red;font-weight: bold;">Add to cart <i class="fa fa-cart-plus"></i></small></a> 
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
            </div>
        </div>
      </div>
  </div>
 </div>


</div>

<?php 
include ('inc/footer.php');
?>
</div>
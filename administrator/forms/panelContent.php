           <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-dashboard"></i> Dashboard</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="panel">Staffs</a></li>
<li><a href="panel" class="active">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
<div class="row">
                 <div class="col-md-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading" style="color:#fff;">Incoming Customer</div>
                      <div class="panel-body">
                                <div class="col-md-12">
                                  <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th>Refno</th>
                                          <th>Name</th>
                                          <th>Book Date</th>
                                          <th>Check In</th>
                                          <th>Check Out</th>
                                          <th>Status</th>
                                          <th></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                    <?php 
                                    $selectBookings = $connection->query("SELECT *,
                                                                                IFNULL(fldCustomerEmail,CREATEDBY) as 'NAME',
                                                                                a.ID as 'IDBOOK'
                                                                        FROM tblbookpackages a 
                                                                        LEFT OUTER JOIN tblcustomers b ON b.fldCustomerEmail = a.CREATEDBY
                                                                          WHERE 
                                                                        a.STATUS not in ('Cancelled','Checked Out')
                                                                        ORDER BY a.BOOKDATE");
                                    while ($rowsBookings = mysqli_fetch_array($selectBookings))
                                    {
                                        ?>
                                        <tr>
                                          <td><?php echo $rowsBookings['REFERENCENO'];?></td>
                                          <td><?php echo $rowsBookings['NAME'];?></td>
                                          <td><?php echo $rowsBookings['BOOKDATE'];?></td>
                                          <td><?php echo $rowsBookings['CHECKIN'];?></td>
                                          <td><?php echo $rowsBookings['CHECKOUT'];?></td>
                                          <td><span class="label label-danger"><?php echo $rowsBookings['STATUS'];?></span></td>
                                          <td>
                                             <?php 
                                                $status = $rowsBookings['STATUS'];
                                                if ($status == "Checked Out")
                                                {
                                                ?>
                                                 <span class="label label-success">Paid</span>
                                                <?php
                                                }
                                                else
                                                {
                                                  if ($status !="Cancelled") {
                                                    ?>
                                                    <a href="checkoutpymt?id=<?php echo $rowsBookings['IDBOOK'];?>&refno=<?php echo $rowsBookings['REFERENCENO'];?>&n=<?php echo $rowsBookings['fldCustomerEmail'];?>" class="btn btn-block btn-info btn-xs">Check Out</a>
                                                    <?php
                                                  }
                                                  ?>
                                                  <?php
                                                }
                                              ?>
                                          </td>
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
</div>

<div class="row">
                 <div class="col-md-6">
                    <div class="panel panel-info">
                      <div class="panel-heading" style="color:#fff;">Latest Booking</div>
                      <div class="panel-body">
                                <div class="col-md-12">
                                  <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th>Refno</th>
                                          <th>Name</th>
                                          <th>Book Date</th>
                                          <th>Forecast Check In</th>
                                          <th>Forecast Check Out</th>
                                          <th>Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                    <?php 
                                    $selectBookings = $connection->query("SELECT *
                                                                        FROM tblbookpackages a 
                                                                        LEFT OUTER JOIN tblcustomers b ON b.fldCustomerEmail = a.CREATEDBY

                                                                        ORDER BY a.BOOKDATE limit 5");
                                    while ($rowsBookings = mysqli_fetch_array($selectBookings))
                                    {
                                        ?>
                                        <tr>
                                          <td><?php echo $rowsBookings['REFERENCENO'];?></td>
                                          <td><?php echo $rowsBookings['fldCustomerFirstname']." ".$rowsBookings['fldCustomerLastname'];?></td>
                                          <td><?php echo $rowsBookings['BOOKDATE'];?></td>
                                          <td><?php echo $rowsBookings['CHECKIN'];?></td>
                                          <td><?php echo $rowsBookings['CHECKOUT'];?></td>
                                          <td><?php echo $rowsBookings['STATUS'];?></td>
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

                <div class="col-md-6">
                    <div class="panel panel-warning">
                      <div class="panel-heading" style="color:#fff;">Products/Packages</div>
                      <div class="panel-body">
                          <div class="row">
                                
                                <div class="col-md-12">
                                  <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th>Image</th>
                                          <th>Product Code</th>
                                          <th>Product Name</th>
                                          <th>Price</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                    <?php 
                                    $selectProduct = $connection->query("SELECT * FROM tblproducts WHERE fldProductDeleted <>1 ORDER BY RAND() LIMIT 4");
                                    while ($rowsProducts = mysqli_fetch_array($selectProduct))
                                    {
                                        ?>
                                        <tr>
                                          <td><img src="../misc/<?php echo $rowsProducts['IMAGES'];?>" height="30" width="30"></td>
                                          <td><?php echo $rowsProducts['fldProductCode'];?></td>
                                          <td><?php echo $rowsProducts['fldProductName'];?></td>
                                          <td><?php echo $rowsProducts['fldProductPrice'];?></td>
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
                </div>

</div>


<?php 
include ('inc/footer.php');
?>
</div>
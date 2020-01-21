           <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-dashboard"></i> Dashboard</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="dashboard">Administrator</a></li>
<li><a href="dashboard" class="active">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
<div class="row">
                <div class="col-md-3">
                    <div class="panel panel-success">
                      <div class="panel-heading" style="color:#fff;">Users</div>
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <h5><i class="fa fa-users fa-4x" style="color:green;"></i></h5>
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                    $selectUsers = $connection->query("SELECT b.fldRoleName,
                                                                              COUNT(*) as 'COUNT' 
                                                                        FROM tblusers a
                                                                        LEFT OUTER JOIN tblroles b on b.fldRoleId = a.tblRoles_fldRoleId
                                                                        GROUP BY b.fldRoleName");
                                    while ($rowsUsers = mysqli_fetch_array($selectUsers))
                                    {
                                        ?>
                                        <small><i class="fa fa-arrow-circle-o-right"></i> <?php echo $rowsUsers['fldRoleName'];?></small> <span class="pull-right label label-success"><?php echo $rowsUsers['COUNT']?> </span><br/>
                                        <?php
                                    }
                                    ?>
                                </div>
                          </div>
                      </div>
                    </div>
                </div>

                 <div class="col-md-3">
                    <div class="panel panel-info">
                      <div class="panel-heading" style="color:#fff;">Latest Booking</div>
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <h5><i class="fa fa-newspaper-o fa-4x" style="color:#dc4666;"></i></h5>
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                    $selectBookings = $connection->query("SELECT BOOKDATE,COUNT(*) as 'COUNT'
                                                                        FROM tblbookpackages
                                                                        ORDER BY BOOKDATE DESC LIMIT 4");
                                    while ($rowsBookings = mysqli_fetch_array($selectBookings))
                                    {
                                        ?>
                                        <small><i class="fa fa-arrow-circle-o-right"></i> <?php echo $rowsBookings['BOOKDATE'];?></small> <span class="pull-right label label-info"><?php echo $rowsBookings['COUNT']?> </span><br/>
                                        <?php
                                    }
                                    ?>
                                </div>
                          </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-danger">
                      <div class="panel-heading" style="color:#fff;">Collection</div>
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <h5><i class="fa fa-money fa-4x" style="color:#ea6c41;"></i></h5>
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                    $selectPayments = $connection->query("SELECT SUM(AMOUNT) as 'TOTAL'
                                                                        FROM payments");
                                    $rowsPayment = mysqli_fetch_array($selectPayments);
                                    ?>
                                        <span style="font-size: 25px;color:#ea6c41;">&#8369; <?php echo number_format($rowsPayment['TOTAL'],2);?> </span>
                                        <?php
                                    ?>
                                </div>
                          </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-warning">
                      <div class="panel-heading" style="color:#fff;">Products/Packages</div>
                      <div class="panel-body">
                          <div class="row">
                                <div class="col-md-4" style="text-align: center;">
                                    <h5><i class="fa fa-bookmark fa-4x" style="color:#dc4666;"></i></h5>
                                </div>
                                <div class="col-md-8">
                                    <?php 
                                    $selectProduct = $connection->query("SELECT * FROM tblproducts WHERE fldProductDeleted <>1 ORDER BY RAND() LIMIT 4");
                                    while ($rowsProducts = mysqli_fetch_array($selectProduct))
                                    {
                                        ?>
                                        <small style="font-size: 12px;"><i class="fa fa-arrow-circle-o-right"></i> <?php echo $rowsProducts['fldProductName'];?></small> <span class="pull-right label label-info">&#8369; <?php echo $rowsProducts['fldProductPrice']?> </span><br/>
                                        <?php
                                    }
                                    ?>
                                </div>
                          </div>
                      </div>
                    </div>
                </div>

</div>
<div class="col-12">
     

    <div class="panel pa-0">
        <div class="panel-wrapper collapse in">
            <div class="panel-body  pa-0">
                <div class="table-responsive mb-30">
                <div class="col-md-2">
                    <label>Filter by Category :</label>
                     <select id='searchByCategory' class="form-control form-control-xs">
                       <option value=''>-- Select Categories--</option>
                       <?php 
                            $selectcategory = $connection->query("SELECT * FROM tblcategories WHERE fldCategoryDeleted <> 1");
                            while ($rowsCategory = mysqli_fetch_array($selectcategory))
                            {
                            ?>
                            <option value="<?php echo $rowsCategory['fldCategoryId'];?>"><?php echo $rowsCategory['fldCategoryName'];?></option>
                        <?php
                            }
                        ?>
                     </select>
                 </div>

                  <div class="col-md-2">
                    <label>Filter by From Price :</label>
                    <input type="number" name="pricefrom" id="pricefrom" class="form-control">
                 </div>
                  <div class="col-md-2">
                    <label>Filter by To Price :</label>
                    <input type="number" name="priceto" id="priceto" class="form-control">
                 </div>


                    <table id="tablePackages" class="table display table-hover mb-30" data-page-size="10">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>CategoryId</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include ('inc/footer.php');
?>
</div>
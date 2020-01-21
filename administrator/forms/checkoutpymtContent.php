<?php 
$id = $_GET['id'];
$email = $_GET['n'];
$refno = $_GET['refno'];
$selectUsers = $connection->query("SELECT * FROM tblcustomers WHERE fldCustomerEmail = '$email'");
$rowsUsers = mysqli_fetch_array($selectUsers);

$selectPayments = $connection->query("SELECT *,SUM(AMOUNT) as 'TOTALAMOUNT' FROM payments WHERE REFERENCENO = '$refno'");
$rowsPayments = mysqli_fetch_array($selectPayments);

$selectPackages = $connection->query("SELECT * FROM tblbookpackages WHERE REFERENCENO = '$refno'");
$rowsPackages = mysqli_fetch_array($selectPackages);

?>
<div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-money"></i> Check Out</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="panel">Staffs</a></li>
<li><a href="panel" class="active">Check Out</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
<div class="row">
                 <div class="col-md-3">
                   <div class="panel panel-primary">
                      <div class="panel-heading" style="color:#fff;">Customer Info</div>
                        <div class="panel-body">
                          <div class="col-md-12" style="text-align: center;">
                              <img src="img/usericon.png" class="img-rounded" style="height: 120px;width: 120px;margin-left: -20px;">
                          </div>

                          <div class="col-md-12">
                            <p>Name : <?php echo $rowsUsers['fldCustomerFirstname']." ".$rowsUsers['fldCustomerLastname'];?></p>
                            <p>Email : <?php echo $rowsUsers['fldCustomerEmail'];?></p>
                            <p>Email : <?php echo $rowsUsers['fldCustomerMobile'];?></p>
                          </div>

                        </div>
                    </div>
                 </div>
                 <div class="col-md-9">
                    <div class="panel panel-primary">
                      <div class="panel-heading" style="color:#fff;">Transactions History - Reference Number : <span style="color:white;font-weight: bold;"><?php echo $refno;?></span></div>
                      <input type="hidden" name="refno" id="refno" value="<?php echo $refno;?>">
                      <div class="panel-body">
                                <div class="col-md-12">
                                  <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Qty</th>
                                          <th>Price</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                    <?php 

                                    $selectBookings = $connection->query("SELECT *
                                                                          FROM tblbookpackageitems
                                                                          WHERE REFERENCENO = '$refno'
                                                                        ");
                                    while ($rowsBookings = mysqli_fetch_array($selectBookings))
                                    {
                                      $total[] = $rowsBookings['fldPackageTotal']; 
                                        ?>
                                        <tr>
                                          <td><?php echo $rowsBookings['fldPackageName'];?></td>
                                          <td><?php echo number_format($rowsBookings['fldPackageQuantity'],2);?></td>
                                          <td><?php echo number_format($rowsBookings['fldPackageTotal'],2);?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr><td>Total</td><td></td>
                                    <td><?php echo number_format(array_sum($total),2);?></td></tr>
                                     </tbody>
                                  </table>
                                  <p>Total Amount Due: &#8369; <?php echo number_format(array_sum($total),2);?></p>
                                  <p>Total Payment : &#8369; <?php echo number_format($rowsPayments['TOTALAMOUNT'],2);?></p>
                                  <p>Remaining Payment: &#8369; <?php 
                                                    $tad = array_sum($total);
                                                    $tpayment = $rowsPayments['TOTALAMOUNT'];
                                                    $remain = $tad-$tpayment;
                                                  echo number_format($remain,2);
                                  ?>
                                    <input type="hidden" name="remaining" id="remaining" class="form-control" value="<?php 
                                                    $tad = array_sum($total);
                                                    $tpayment = $rowsPayments['TOTALAMOUNT'];
                                                    $remain = $tad-$tpayment;
                                                  echo $remain;
                                  ?>"></p>
                                  <p>Additional Charges Extra Person/Package : <input type="number" name="additional" id="additional" class="form-control form-control-xs" style="width: 20%;height: 40px;" value="0.00"></p>
                                  <p>Enter Amount : <input type="number" name="amount" id="amount" class="form-control form-control-xs" style="width: 20%;height: 40px;" value="0.00"></p>
                                  <p>Change : <input type="text" name="changeamount" id="changeamount" class="form-control form-control-xs" style="width: 20%;height: 40px;" readonly value="0.00"></p>
                                  <p>Remarks : <textarea class="form-control" placeholder="Enter your remarks..." name="remarks" id="remarks" rows="4" style="resize: none;"></textarea></p>
                                  <br/>

                                  <?php 
                                  $status = $rowsPackages['STATUS'];
                                  if ($status == "Checked Out")
                                  {
                                  ?>
                                   <h1><span class="label label-success">Paid</span></h1>
                                  <?php
                                  }
                                  else
                                  {
                                    ?>
                                  <button type="button" class="btn btn-info btnPayment">Check Out</button>
                                    <?php
                                  }
                                  ?>

                                  
                                </div>

                      </div>
                      <div class="row loader">
                                                        <div class="col-md-4"></div>
                                                           <div class="col-md-4" style="text-align: center;">
                                                            <img src="img/loader.gif" align="Loader" height="80" width="80" >
                                                           </div>
                                                        <div class="col-md-4"></div>
                                </div>
                      <div class="results"></div>
                    </div>
                </div>
</div>


<?php 
include ('inc/footer.php');
?>
</div>
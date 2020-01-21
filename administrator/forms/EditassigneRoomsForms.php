           <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark"><i class="fa fa-dashboard"></i>Update Room Assigned</h5>
              </div>
              <!-- Breadcrumb -->
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                  <li><a href="panel">Staffs</a></li>
                  <li><a href="panel" class="active">Update Assign Room</a></li>
                </ol>
              </div>
              <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <div class="row">
             

             <div class="col-md-4">
              <div class="row">
               <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading" style="color:#fff;">Customer Information</div>
                  <div class="panel-body">
                    <div class="col-md-12">
                      <?php 
                          $referenceno = $_GET['refno'];
                          $id = $_GET['id'];
                          $selectBookings = $connection->query("SELECT a.REFERENCENO,
                           CONCAT(d.fldCustomerFirstname,' ',d.fldCustomerLastname) as 'NAME',
                           b.fldProductCode as 'ROOMNO',
                           b.fldProductName as 'ROOMTYPE',
                           a.ID as 'CURRENTID',
                           d.fldCustomerEmail as 'EMAIL'
                           FROM currentbookrooms a
                           LEFT OUTER JOIN tblproducts b on b.fldProductID = a.PRODUCTID
                           LEFT OUTER JOIN tblbookpackages c on c.REFERENCENO = a.REFERENCENO
                           LEFT OUTER JOIN tblcustomers d on d.fldCustomerEmail = c.CREATEDBY
                           WHERE a.REFERENCENO = '$referenceno' and a.ID = '$id'");
                           $rowsBooking = mysqli_fetch_array($selectBookings);
                          ?>

                        <label><span style="color:black;font-weight: bold;">Reference Number :</span> <?php echo $referenceno;?></label>
                        <label><span style="color:black;font-weight: bold;">Name :</span> <?php echo $rowsBooking['NAME'];?></label>
                        <label><span style="color:black;font-weight: bold;">Email :</span> <?php echo $rowsBooking['EMAIL'];?></label>
                        <label><span style="color:black;font-weight: bold;">Current Room Number :</span> <?php echo $rowsBooking['ROOMNO'];?></label>
                        <label><span style="color:black;font-weight: bold;">Current Room Type:</span> <?php echo $rowsBooking['ROOMTYPE'];?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <form method="POST" id="formSerials">
             <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading" style="color:#fff;">Editing Room Assign</div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <input type="hidden" name="refno" id="refno" value="<?php echo $referenceno;?>">
                    <input type="hidden" name="refid" id="refid" value="<?php echo $id;?>">

                     <div class="form-group">
                      <label>Room #/ Name</label>
                      <select class="form-control form-control-sm" name="roomno" id="roomno">
                        <?php 
                        $select= $connection->query("SELECT * FROM tblproducts where tblCategories_fldCategoryId = 1 and fldProductId not in (SELECT PRODUCTID FROM currentbookrooms) ORDER BY fldProductId ASC" );
                        while ($rows = mysqli_fetch_arraY($select))
                        {
                          ?>
                          <option value="<?php echo $rows['fldProductId'];?>"><?php echo $rows['fldProductCode']." - ".$rows['fldProductName'];?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>

                    <button class="btn btn-success btn-block btnSave btn-sm" type="button" ><i class="fa fa-save"></i> Assign</button>

                    <div class="results"></div>
                    <div class="row loader">
                      <div class="col-md-4"></div>
                      <div class="col-md-4" style="text-align: center;">
                        <img src="img/loader.gif" align="Loader" height="80" width="80" >
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             </form>

          </div>

          <?php 
          include ('inc/footer.php');
          ?>
        </div>
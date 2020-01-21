           <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark"><i class="fa fa-dashboard"></i> Room Assigned</h5>
              </div>
              <!-- Breadcrumb -->
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                  <li><a href="panel">Staffs</a></li>
                  <li><a href="panel" class="active">Assign Room</a></li>
                </ol>
              </div>
              <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <div class="row">
              <form method="POST" id="formSerials">
             <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading" style="color:#fff;">Room Assign</div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Reference No/Name</label>
                      <select class="form-control form-control-sm" name="refno" id="refno">
                        <?php 
                        $select= $connection->query("SELECT * FROM tblbookpackages a
                          LEFT OUTER JOIN tblcustomers b on b.fldCustomerEmail = a.CREATEDBY
                          where `STATUS` IN ('Half Payment','Fully Payment')  ORDER BY a.REFERENCENO ASC ");
                        while ($rows = mysqli_fetch_arraY($select))
                        {
                          ?>
                          <option value="<?php echo $rows['REFERENCENO'];?>"><?php echo $rows['REFERENCENO']." - ".$rows['fldCustomerFirstname']." ".$rows['fldCustomerLastname'];?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>

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

                    <button class="btn btn-success btn-block btnSave" type="button" ><i class="fa fa-save"></i> Assign</button>

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

             <div class="col-md-8">
              <div class="row">
               <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-heading" style="color:#fff;">Rooms</div>
                  <div class="panel-body">
                    <div class="col-md-12">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Refno</th>
                            <th>Name</th>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $selectBookings = $connection->query("SELECT a.REFERENCENO,
                           CONCAT(d.fldCustomerFirstname,' ',d.fldCustomerLastname) as 'NAME',
                           b.fldProductCode as 'ROOMNO',
                           b.fldProductName as 'ROOMTYPE',
                           a.ID as 'CURRENTID'
                           FROM currentbookrooms a
                           LEFT OUTER JOIN tblproducts b on b.fldProductID = a.PRODUCTID
                           LEFT OUTER JOIN tblbookpackages c on c.REFERENCENO = a.REFERENCENO
                           LEFT OUTER JOIN tblcustomers d on d.fldCustomerEmail = c.CREATEDBY");
                          while ($rowsBookings = mysqli_fetch_array($selectBookings))
                          {
                            ?>
                            <tr>
                              <td><?php echo $rowsBookings['REFERENCENO'];?></td>
                              <td><?php echo $rowsBookings['NAME'];?></td>
                              <td><span class="label label-danger"><?php echo $rowsBookings['ROOMNO'];?></span></td>
                              <td><?php echo $rowsBookings['ROOMTYPE'];?></td>
                              <td><a href="editAssignedRooms?refno=<?php echo $rowsBookings['REFERENCENO'];?>&id=<?php echo $rowsBookings['CURRENTID'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></td>
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
          </div>

          <?php 
          include ('inc/footer.php');
          ?>
        </div>
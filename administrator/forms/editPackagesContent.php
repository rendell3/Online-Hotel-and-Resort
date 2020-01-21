         <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-list-alt"></i> Packages
</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="dashboard">Administrator</a></li>
<li><a href="packages" class="active">Packages</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
<div class="row" id="rowProducts">
    <?php 
    $id = $_GET['id'];
    $select=$connection->query("SELECT * FROM tblpackages a 
                                WHERE a.fldPackageId = '$id'");
    while ($rows=mysqli_fetch_array($select))
    {
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form id="formUploadUpdate" method="POST" >
                              <div class="modal-header">
                                <h4 class="modal-title"><?php echo $rows['fldPackageName'];?></h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtCode">Package Code</label>
                                            <div class="clearfix"></div>
                                            <input type="hidden" class="form-control" id="txtId" name="txtId" value="<?php echo $id; ?>">
                                            <input type="text" class="form-control" id="txtCode"  name="txtCode"  value="<?php echo $rows['CODE']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtName">Name</label>
                                            <div class="clearfix"></div>
                                            <input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $rows['fldPackageName']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="textarea_editor form-control" id="txtDescription" name="txtDescription" rows="15"
                                            placeholder="Enter description. E.g: Venue Setup (Standard)">
                                                <?php echo $rows['fldPackageDescription']; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtPrice">Price</label>
                                            <div class="clearfix"></div>
                                            <input type="number" class="form-control" id="txtPrice" name="txtPrice"  value="<?php echo $rows['fldPackagePrice']; ?>">
                                        </div>
                                        <div class="form-group" id="groupSucceeding">
                                            <label class="pull-left control-label mb-10" for="txtSucceeding">Succeeding
                                            charge/price per hour</label>
                                            <div class="clearfix"></div>
                                            <input class="form-control" type="number" id="txtSucceeding" name="txtSucceeding" value="<?php echo $rows['fldPackageSucceeding']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-10">Product inclusions</label>
                                            <div class="clearfix"></div>
                                            <input type="text" class="form-control" id="txtProducts" name="txtProducts" value="<?php echo $rows['PRODUCTS']; ?>">
                                        </div>

                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="results"></div>
                                    </div>
                                </div>
                                <div class="row loader">
                                                        <div class="col-md-4"></div>
                                                           <div class="col-md-4" style="text-align: center;">
                                                            <img src="img/loader.gif" align="Loader" height="80" width="80" >
                                                           </div>
                                                        <div class="col-md-4"></div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-info btnUpdate">Update</button>
                                <a href = "packages" class="btn btn-danger">Back</a>
                              </div>
        </form>
    </div>
    <?php
    }   
    ?>
</div>

<?php 
include ('inc/footer.php');
?>
</div>
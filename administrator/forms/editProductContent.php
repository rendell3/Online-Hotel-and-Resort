         <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-list-alt"></i> Products
</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="dashboard">Administrator</a></li>
<li><a href="products" class="active">Products</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
<div class="row" id="rowProducts">
    <?php 
    $id = $_GET['id'];
    $select=$connection->query("SELECT * FROM tblproducts a 
                                LEFT OUTER JOIN tblcategories b on b.fldCategoryId = a.tblCategories_fldCategoryId
                                WHERE a.fldProductId = '$id'");
    while ($rows=mysqli_fetch_array($select))
    {
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form id="formUploadUpdate" method="POST" enctype="multipart/form-data">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo $rows['fldProductCode']." - ".$rows['fldProductName'];?></h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="card-user-img img-thumbnail pull-left" style="width:180px;height:180px;object-fit:cover" src="../misc/<?php echo $rows['IMAGES'];?>" alt="<?php echo $rows['IMAGES'];?>" />
                                    </div>
                                    <div class="col-md-9">

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtCodeupdate">Upload Image</label>
                                            <div class="clearfix"></div>
                                            <input type="file" id = "inputImage" name="file" class="form-control">
                                            <input type="hidden" id="inputFilename">
                                            <div id="divImageError"></div>
                                        </div>

                                        <div class="form-group roomcounters">
                                            <label class="pull-left control-label mb-10" for="txtCodeupdate">Code</label>
                                            <div class="clearfix"></div>
                                            <input type="hidden" class="form-control" id="txtItemID" name="txtItemID" value="<?php echo $rows['fldProductId'];?>">
                                            <input type="text" class="form-control" id="txtCodeupdate" name="txtCodeupdate" value="<?php echo $rows['fldProductCode'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtNameupdate">Name</label>
                                            <div class="clearfix"></div>
                                            <input type="text" class="form-control" id="txtNameupdate" name="txtNameupdate" value="<?php echo $rows['fldProductName'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtUnitupdate">Unit</label>
                                            <div class="clearfix"></div>
                                            <select id="txtUnitupdate" class="form-control" name="txtUnitupdate">
                                                <option value="<?php echo $rows['fldProductUnit'];?>"><?php echo $rows['fldProductUnit'];?></option>
                                                <option value="Hour">Hour</option>
                                                <option value="Quantity">Quantity / (Per)</option>
                                                <option value="Piece">Piece</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtQuantityupdate">Initial Quantity <small>E.g: 4 hours / 1 piece</small></label>
                                            <div class="clearfix"></div>
                                            <input type="number" class="form-control" id="txtQuantityupdate" name="txtQuantityupdate" value="<?php echo $rows['fldProductQuantity'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtDescriptionupdate">Description</label>
                                            <div class="clearfix"></div>
                                            <textarea type="text" class="form-control" id="txtDescriptionupdate" name="txtDescriptionupdate" style="resize: none;"><?php echo $rows['fldProductDescription'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtPriceupdate">Price</label>
                                            <div class="clearfix"></div>
                                            <input type="number" class="form-control" id="txtPriceupdate" name="txtPriceupdate" value="<?php echo $rows['fldProductPrice'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtCategoryupdate">Category</label>
                                            <div class="clearfix"></div>
                                            <select class="form-control" id="txtCategoryupdate" name="txtCategoryupdate">
                                                <option value="<?php echo $rows['tblCategories_fldCategoryId'];?>"><?php echo $rows['fldCategoryName'];?></option>
                                                <?php 
                                                $selectCategory=$connection->query("SELECT * from tblcategories");
                                                while ($rowsCategory = mysqli_fetch_array($selectCategory))
                                                {
                                                    ?>
                                                    <option value="<?php echo $rowsCategory['fldCategoryId'];?>"><?php echo $rowsCategory['fldCategoryName'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
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
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href = "products" class="btn btn-danger">Back</a>
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
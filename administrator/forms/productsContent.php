         <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-list-alt"></i> Amenities
</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="dashboard">Administrator</a></li>
<li><a href="products" class="active">Amenities</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
                <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark" style="margin-top:3px;"><strong>List of Amenities</strong></h6>
                </div>
                <div class="pull-right">
                    <button data-toggle="modal" data-target="#modalAdd" class="pull-left btn btn-success btn-sm btn-round mr-15">
                        Add new product
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="rowProducts">
    <?php 
    $select=$connection->query("SELECT * FROM tblproducts a 
                                LEFT OUTER JOIN tblcategories b on b.fldCategoryId = a.tblCategories_fldCategoryId
                                WHERE a.fldProductDeleted <> 1");
    while ($rows=mysqli_fetch_array($select))
    {
    ?>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-default contact-card card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="pull-left user-img-wrap mr-15">
                        <img class="card-user-img img-circle pull-left" style="object-fit:cover" src="../misc/<?php echo $rows['IMAGES'];?>" alt="<?php echo $rows['IMAGES'];?>" />
                    </div>
                        <div class="pull-left user-detail-wrap">
                            <span class="block card-user-name" style="color:black; font-weight:bold;"><?php echo $rows['fldProductCode'];?></span>
                            <span class="block card-user-name" style="color:black; font-weight:bold;"><?php echo $rows['fldProductName'];?></span>
                            <span class="block card-user-desn" style="color:black"><?php echo $rows['fldCategoryName'];?>
                                 
                                 <?php
                                 if ($rows['fldCategoryName']=='Rooms')
                                 {
                                    echo " - Capacity ".$rows['fldProductQuantity'];
                                 }
                                 ?>
                                 <?php
                                 if ($rows['fldCategoryName']<>'Rooms')
                                 {
                                    echo " - Hours ".$rows['fldProductQuantity'];
                                 }
                                 ?>
                                 </span>
                           
                        </div>
                </div>
                    <div class="pull-right"> 

                        <a class="pull-left inline-block mr-15 edit-product" href="editProduct?id=<?php echo $rows['fldProductId'];?>"> 
                            <i class="zmdi zmdi-edit txt-dark"></i>
                        </a>
                        <a class="pull-left inline-block mr-15" href="../userprograms/deleteProduct?id=<?php echo $rows['fldProductId'];?>">
                            <i class="zmdi zmdi-delete txt-dark delete-product"></i>
                        </a>
                    </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body row">
                    <div class="user-others-details pl-15 pr-15">
                        <div class="mb-15"><i class="fa fa-list-alt inline-block mr-10"></i>
                            <span class="inline-block txt-dark" style="white-space: nowrap; width:90%; 
  overflow: hidden;text-overflow:ellipsis;"><?php echo $rows['fldProductDescription'];?></span>
                        </div>
                    </div>
                    <div class="user-others-details pl-15 pr-15">
                        <div class="mb-15"><i class="fa fa-money inline-block mr-10"></i>
                            <span class="inline-block txt-dark"><?php echo $rows['fldProductPrice'];?></span>
                         </div>
                    </div>
                    <!-- <div class="user-others-details pl-15 pr-15">
                        <div class="mb-15"><i class="fa fa-plus-square-o inline-block mr-10"></i>
                            <span class="inline-block txt-dark">' + buildSucceeding + '</span>
                        </div>
                    </div> -->
                    <hr class="light-grey-hr mt-20 mb-20" />
                    <div class="emp-detail pl-15 pr-15">
                        <div class="mb-5"><span class="inline-block capitalize-font mr-5">Date created:</span>
                            <span class="txt-dark"><?php echo $rows['fldProductCreated'];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <!-- Modal -->

    <!-- END EDIT MODAL-->
    <?php
    }
    ?>

</div>

<!-- Modal -->
<div id="modalAdd" class="modal fade" role="dialog">
<form id="formUploadSell" method="POST" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload an image</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" id="inputImage" name="file[]">
                    <input type="hidden" id="inputFilename">
                    <div id="divImageError"></div>
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtCategory">Category</label>
                    <div class="clearfix"></div>
                    <select class="form-control txtCategory" id="txtCategory" name="txtCategory">
                        <option value="">[Select Category]</option>
                        <?php 
                        $select=$connection->query("SELECT * from tblcategories");
                        while ($rowsCategory = mysqli_fetch_array($select))
                        {
                            ?>
                            <option value="<?php echo $rowsCategory['fldCategoryId'];?>"><?php echo $rowsCategory['fldCategoryName'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtName">Name</label>
                    <div class="clearfix"></div>
                    <input type="text" class="form-control" id="txtName" name="txtName">
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtUnit">Unit</label>
                    <div class="clearfix"></div>
                    <select id="txtUnit" class="form-control" name="txtUnit">
                        <option value="Hour">Hour</option>
                        <option value="Quantity">Quantity / (Per)</option>
                        <option value="Piece">Piece</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtQuantity">Initial Quantity <small>E.g: 4 hours / 1 piece</small></label>
                    <div class="clearfix"></div>
                    <input type="number" class="form-control" id="txtQuantity" name="txtQuantity">
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtDescription">Description</label>
                    <div class="clearfix"></div>
                    <textarea type="text" class="form-control" id="txtDescription" name="txtDescription" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtPrice">Price</label>
                    <div class="clearfix"></div>
                    <input type="number" class="form-control" id="txtPrice" name="txtPrice">
                </div>
                

                <div id="divError"></div>
                <div class="row loader">
                                        <div class="col-md-4"></div>
                                           <div class="col-md-4" style="text-align: center;">
                                            <img src="img/loader.gif" align="Loader" height="80" width="80" >
                                           </div>
                                        <div class="col-md-4"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
</div>
<?php 
include ('inc/footer.php');
?>
</div>
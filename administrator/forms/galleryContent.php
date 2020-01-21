<div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-list-alt"></i> Gallery</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Administrator</a></li>
<li><a href="gallery" class="active">Gallery</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h3 class="panel-title txt-light" style="margin-top:5px;"><strong>Resort Images</strong></h3>
                </div>
                <div class="pull-right">
                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalAdd">Upload image</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="port">
                            <div class="portfolioContainer">
                            <?php 
                            $select = $connection->query("SELECT * from tblimages where fldImageDeleted <> 1");
                            while ($rows = mysqli_fetch_array($select))
                            {
                            ?>
                            <div class="col-sm-4 col-md-3 webdesign illustrator">
                                <a href="uploads/<?php echo $rows['fldImagePath'];?>" class="image-popup">
                                <div class="portfolio-masonry-box">
                                <div class="portfolio-masonry-img">
                                <img src="uploads/<?php echo $rows['fldImagePath'];?>" class="thumb-img img-responsive" alt="work-thumbnail">
                                </div>
                                <div class="portfolio-masonry-detail">
                                <h4 class="font-18"><?php echo $rows['fldImageName'];?></h4>
                                <p><?php echo $rows['fldImageDescription'];?></p>
                                <p><button class="btn btn-danger delete-image" style="margin-bottom:5px;" data-id="<?php echo $rows['fldImageId'];?>">Delete <i class="fa fa-trash"></i></button></p>
                                </div>
                                </div>
                                </a>
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
<!-- Modal -->
<form id="formUploadSell" method="POST" enctype="multipart/form-data">
<div id="modalAdd" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload an image</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" id="inputImage" name="file">
                    <input type="hidden" id="inputFilename">
                    <div id="divImageError"></div>
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtName">Name</label>
                    <div class="clearfix"></div>
                    <input type="text" class="form-control" id="txtName" name="txtName">
                </div>
                <div class="form-group">
                    <label class="pull-left control-label mb-10" for="txtDescription">Description</label>
                    <div class="clearfix"></div>
                    <textarea type="text" class="form-control" id="txtDescription" name="txtDescription"></textarea>
                </div>
                <div id="divError"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>

<?php 
include ('inc/footer.php');
?>
</div>
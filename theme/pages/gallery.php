<div class="fh5co-parallax" style="background-image: url(misc/rooms.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Feel free to browse around the gallery</h1>
                    <p>See you soon at Greenfields Paradise Resort</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-hotel-section">
    <div class="container-fluid">
        <!-- <div class="col-md-12"> -->
            <div class="port">
                <div class="portfolioContainer">

                </div>
            </div> <!-- End row -->
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
                                        <a href="administrator/uploads/<?php echo $rows['fldImagePath'];?>" class="image-popup">
                                            <div class="portfolio-masonry-box">
                                                <div class="portfolio-masonry-img">
                                                    <img src="administrator/uploads/<?php echo $rows['fldImagePath'];?>" class="thumb-img img-responsive" alt="work-thumbnail">
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
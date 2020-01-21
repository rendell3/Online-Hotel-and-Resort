<div class="fh5co-parallax" style="background-image: url(misc/rooms.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Choose between the most comfortable rooms</h1>
                    <p>Made with love by Greenfields Paradise Resort</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="featured-hotel" class="fh5co-bg-color">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Featured Rooms</h2>
                </div>
            </div>
        </div>

        <div class="row" id="rowRooms">
            <?php 
            $select = $connection->query("SELECT * from tblproducts WHERE fldProductId = 25");
            $rowsRoom1 = mysqli_fetch_array($select);
            ?>
            <div class="feature-full-1col">
                            <div class="image" style="background-image: url('misc/<?php echo $rowsRoom1['IMAGES'];?>');">
                            <div class="descrip text-center">
                            <p><small>For as low as</small><span>₱ <?php echo $rowsRoom1['fldProductPrice'];?> /night</span></p>
                            </div>
                            </div>
                            <div class="desc">
                            <h3><?php echo $rowsRoom1['fldProductName'];?></h3>
                            <p><?php echo $rowsRoom1['fldProductDescription'];?></p>
                            <p><a href="?page=book&room='+id+'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                            </div>
            </div>

            <?php 
            $selectRoom2 = $connection->query("SELECT * from tblproducts WHERE fldProductId = 18");
            $rowsRoom2 = mysqli_fetch_array($selectRoom2);
            ?>

            <div class="feature-full-2col">
                <div class="f-hotel">
                            <div class="image" style="background-image: url('misc/<?php echo $rowsRoom2['IMAGES'];?>');">
                            <div class="descrip text-center">
                            <p><small>For as low as</small><span>₱ <?php echo $rowsRoom2['fldProductPrice'];?> /night</span></p>
                            </div>
                            </div>
                            <div class="desc">
                            <h3><?php echo $rowsRoom2['fldProductName'];?></h3>
                            <p><?php echo $rowsRoom2['fldProductDescription'];?></p>
                            <p><a href="?page=book&room='+id+'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                            </div>
                </div>

            <?php 
            $selectRoom3 = $connection->query("SELECT * from tblproducts WHERE fldProductId = 19");
            $rowsRoom3 = mysqli_fetch_array($selectRoom3);
            ?>

                <div class="f-hotel">
                            <div class="image" style="background-image: url('misc/<?php echo $rowsRoom3['IMAGES'];?>');">
                            <div class="descrip text-center">
                            <p><small>For as low as</small><span>₱ <?php echo $rowsRoom3['fldProductPrice'];?> /night</span></p>
                            </div>
                            </div>
                            <div class="desc">
                            <h3><?php echo $rowsRoom3['fldProductName'];?></h3>
                            <p><?php echo $rowsRoom3['fldProductDescription'];?></p>
                            <p><a href="?page=book&room='+id+'" class="btn btn-primary btn-luxe-primary">Book Now <i class="ti-angle-right"></i></a></p>
                            </div>
                </div>
            </div>

        </div>

    </div>
</div>
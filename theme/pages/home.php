<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(misc/carousel1.jpg); background-size:cover; background-position:center;">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center slider-text">
                        <div class="slider-text-inner js-fullheight">
                            <div class="desc">
                                <p><span>Greenfields Paradise Resort</span></p>
                                <h2>Reserve room for family vacation</h2>
                                <p>
                                    <a href="?page=book" class="btn btn-primary btn-lg">Book now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(misc/carousel2.jpg); background-position:center;">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center slider-text">
                        <div class="slider-text-inner js-fullheight">
                            <div class="desc">
                                <p><span>Greenfields Paradise Resort</span></p>
                                <h2>Make your vacation comfortable</h2>
                                <p>
                                    <a href="?page=book" class="btn btn-primary btn-lg">Book now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(misc/carousel3.jpg); background-position:center;">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center slider-text">
                        <div class="slider-text-inner js-fullheight">
                            <div class="desc">
                                <p><span>Greenfields Paradise Resort</span></p>
                                <h2>The best place to enjoy life</h2>
                                <p>
                                    <a href="?page=book" class="btn btn-primary btn-lg">Book now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</aside>
<div class="wrap">
    <div class="container">
        <div class="row">
            <div id="availability">
                <form action="#">

                    <div class="a-col">
                        <section>
                            <!-- <select class="cs-select cs-skin-border">
                                <option value="" disabled selected>Head count</option>
                                <?php 
                                        for($counter = 1; $counter <= 15; $counter++) {
                                            echo '<option value="'.$counter.'">'.$counter.'</option>';
                                        }
                                    ?>
                            </select> -->
                        </section>
                    </div>
                    <div class="a-col alternate">
                        <div class="input-field">
                            <label for="date-start">Check In</label>
                            <input type="text" class="form-control" id="date-start" readonly/>
                        </div>
                    </div>
                    <div class="a-col alternate">
                        <div class="input-field">
                            <label for="date-end">Check Out</label>
                            <input type="text" class="form-control" id="date-end" readonly/>
                        </div>
                    </div>
                    <div class="a-col action">
                        <a href="javascript:;" id="checkAvailability">
                            <span>Check</span>
                            Availability
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-counter-section" class="fh5co-counters">
    <div class="container">
        <div class="row">
            
            <?php 
                $selectPackages = $connection->query("SELECT * from tblpackages");
                $countPackages = mysqli_num_rows($selectPackages);
            ?>

            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $countPackages;?>" data-speed="2000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Packacges</span>
            </div>

            <?php 
                $selectProduct = $connection->query("SELECT * from tblproducts");
                $countProduct = mysqli_num_rows($selectProduct);
            ?>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $countProduct;?>" data-speed="2000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Product</span>
            </div>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="8200" data-speed="2000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Users</span>
            </div>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="8763" data-speed="2000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Transactions</span>
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

<div id="hotel-facilities">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Resort Amenities</h2>
                </div>
            </div>
        </div>

        <div id="tabs">
            <nav class="tabs-nav" id="amenitiesTabs">
                <?php 
                    $selectAmenities = $connection->query("SELECT * from tblproducts a
                                                            LEFT OUTER JOIN tblcategories b on b.fldCategoryId=a.tblCategories_fldCategoryId
                                                            WHERE a.tblCategories_fldCategoryId in (3,4) order by rand()");
                    while ($rowsAmenities= mysqli_fetch_array($selectAmenities))
                    {
                ?>
                        <a href="javascript:;" data-tab="tab<?php echo $rowsAmenities['fldProductId'];?>">
                            <i class="flaticon-bicycle icon"></i><?php echo $rowsAmenities['fldProductName']?>
                        </a>
                <?php
                    }
                 ?>

                 <!-- <?php 
                    $selectAmenities = $connection->query("SELECT * from tblproducts a
                                                            LEFT OUTER JOIN tblcategories b on b.fldCategoryId=a.tblCategories_fldCategoryId
                                                            WHERE a.tblCategories_fldCategoryId in (3,4) order by rand()");
                    while ($rowsAmenities= mysqli_fetch_array($selectAmenities))
                    {
                ?>
                       <div class="tab-content active show" data-tab-content="tab<?php echo $rowsAmenities['fldProductId'];?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="misc/<?php echo $rowsAmenities['IMAGES'];?>" class="img-responsive" alt="Image">
                                    </div>
                                    <div class="col-md-6">
                                        <span class="super-heading-sm"><?php echo $rowsAmenities['fldCategoryName'];?></span>
                                        <h3 class="heading"><?php echo $rowsAmenities['fldProductName'];?></h3>
                                        <p style="height:320px;"><?php echo $rowsAmenities['fldProductDescription'];?></p>
                                        <p class="service-hour">
                                        <span>Price</span>
                                        <strong>₱ <?php echo $rowsAmenities['fldProductPrice'];?></strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                       </div>
                <?php
                    }
                 ?> -->
                 
            </nav>
            <div class="tab-content-container" id="amenitiesTabsContents">
            </div>
        </div>
    </div>
</div>



<!-- <div id="fh5co-blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(theme/luxe-master/images/image-1.jpg);">
                    <div class="date text-center">
                        <span>09</span>
                        <small>Aug</small>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="#">Most Expensive Hotel</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(theme/luxe-master/images/image-2.jpg);">
                    <div class="date text-center">
                        <span>09</span>
                        <small>Aug</small>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="#">1st Anniversary of Luxe Hotel</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(theme/luxe-master/images/image-3.jpg);">
                    <div class="date text-center">
                        <span>09</span>
                        <small>Aug</small>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="#">Discover New Adventure</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
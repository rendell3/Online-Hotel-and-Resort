<div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-line-chart"></i> Reports</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Administrator</a></li>
<li><a href="reports" class="active">Reports</a></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
        

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default card-view pa-0">
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="contact-list">
                        <div class="row">
                            <aside class="col-lg-3 col-md-5 pr-0">
                                <div class="mt-20 mb-20 ml-15 mr-15">

                                    <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="dateFrom">Types Of Report</label>
                                              <div class="clearfix"></div>
                                        <select class="form-control tor" name="tor" id="tor">
                                            <option selected disabled>[Select Report]</option>
                                            <option value="Collection">Collection</option>
                                            <option value="Bookings">Bookings</option>
                                        </select>
                                     </div>

                                     <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="dateFrom">Status</label>
                                              <div class="clearfix"></div>
                                                <select class="form-control status" name="status" id="status">
                                                </select>
                                     </div>

                                     <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="dateFrom">Date From</label>
                                              <div class="clearfix"></div>
                                        <input type="date" class="form-control" id="dateFrom" name="dateFrom">
                                     </div>

                                      <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="dateTo">Date To</label>
                                              <div class="clearfix"></div>
                                        <input type="date" class="form-control" id="dateTo" name="dateTo">
                                     </div>

                                    <button class="btn btn-success btn-block btnPrint">
                                        <i class="fa fa-sign-in"></i> Proceed
                                    </button>
                                    <!-- <button class="btn btn-primary btn-block btnPrint">
                                        <i class="fa fa-download"></i> Export
                                    </button> -->
                                    <br/>
                                    <div class="results"></div>
                                </div>

                               
                            </aside>

                            <aside class="col-lg-9 col-md-7 pl-0">
                                <div class="panel pa-0">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body  pa-0">
                                            <div class="table-responsive mb-30">
                                                 <div class="row loader">
                                                        <div class="col-md-4"></div>
                                                           <div class="col-md-4" style="text-align: center;">
                                                            <img src="img/loader.gif" align="Loader" height="80" width="80" >
                                                           </div>
                                                        <div class="col-md-4"></div>
                                                 </div>

                                                <div class="reportsresults"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
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
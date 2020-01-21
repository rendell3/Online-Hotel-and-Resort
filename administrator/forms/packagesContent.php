<div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-list-alt"></i> Packages</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Administrator</a></li>
<li><a href="packages" class="active">Packages</a></li>
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
                                    <button data-toggle="modal" data-target="#modalAdd" class="pull-left btn btn-success btn-sm btn-round btn-block ">
                                            Add Packages
                                    </button>
                                </div>

                   <!-- Modal -->
                                    <div aria-hidden="true" role="dialog" tabindex="-1" id="modalAdd" class="modal fade"
                                        style="display: none;">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="modalAddLabel">Add New Package</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="pull-left control-label mb-10" for="txtCode">Package Code</label>
                                                        <div class="clearfix"></div>
                                                        <input type="text" class="form-control" id="txtCode">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="pull-left control-label mb-10" for="txtName">Name</label>
                                                        <div class="clearfix"></div>
                                                        <input type="text" class="form-control" id="txtName">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="textarea_editor form-control" id="txtDescription" rows="15"
                                                            placeholder="Enter description. E.g: Venue Setup (Standard)"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="pull-left control-label mb-10" for="txtPrice">Price</label>
                                                        <div class="clearfix"></div>
                                                        <input type="number" class="form-control" id="txtPrice">
                                                    </div>
                                                    <div class="form-group" id="groupSucceeding">
                                                        <label class="pull-left control-label mb-10" for="txtSucceeding">Succeeding
                                                            charge/price per hour</label>
                                                        <div class="clearfix"></div>
                                                        <input class="form-control" type="number" id="txtSucceeding">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label mb-10">Product inclusions</label>
                                                        <select class="select2 select2-multiple" multiple="multiple"
                                                            data-placeholder="Choose" id="txtProducts" name="txtProducts">
                                                        </select>
                                                    </div>

                                                    <div class="results"></div>
                                                    <!-- <div class="form-group">
                                                        <label class="pull-left control-label mb-10" for="txtProducts">Products</label>
                                                        <select class="select2" id="txtProducts" multiple data-placeholder="Select products"></select>
                                                    </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success waves-effect" id="btnAdd">Save</button>
                                                    <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                                <div class="row loader">
                                                        <div class="col-md-4"></div>
                                                           <div class="col-md-4" style="text-align: center;">
                                                            <img src="img/loader.gif" align="Loader" height="80" width="80" >
                                                           </div>
                                                        <div class="col-md-4"></div>
                                                </div>
                                            </aside>

                                            <aside class="col-lg-9 col-md-7 pl-0">
                                                <div class="panel pa-0">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body  pa-0">
                                                            <div class="table-responsive mb-30">
                                                                <table id="tablePackages" class="table display table-hover mb-30"
                                                                    data-page-size="10">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Code</th>
                                                                            <th>Name</th>
                                                                            <th>Price</th>
                                                                            <th>Products</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
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
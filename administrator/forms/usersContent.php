<div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><i class="fa fa-list-alt"></i> Users</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Administrator</a></li>
<li><a href="users" class="active">Users</a></li>
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
                                            <label class="pull-left control-label mb-10" for="txtRoleName">Roles</label>
                                              <div class="clearfix"></div>
                                        <input type="hidden" class="form-control" id="txtUserId" name="txtUserId">
                                        <select class="form-control" name="txtRole" id="txtRole" name="txtRole">
                                             <option selected disabled>[Select Role]</option>
                                            <?php
                                            $select = $connection->query("SELECT * FROM tblroles");
                                            while ($rows = mysqli_fetch_array($select))
                                            {
                                            ?>
                                                <option value="<?php echo $rows['fldRoleId'];?>"><?php echo $rows['fldRoleName'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                     </div>

                                     <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtUsername">Username</label>
                                              <div class="clearfix"></div>
                                        <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Username">
                                     </div>

                                     <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtPassword">Password</label>
                                              <div class="clearfix"></div>
                                        <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password">
                                     </div>

                                     <div class="form-group">
                                            <label class="pull-left control-label mb-10" for="txtRepeatPassword">Repeat Password</label>
                                              <div class="clearfix"></div>
                                        <input type="password" class="form-control" id="txtRepeatPassword" name="txtRepeatPassword" placeholder="Repeat Password">
                                     </div>

                                    <button class="btn btn-success btn-block btnAddUser">
                                        <i class="fa fa-save"></i> Add New User
                                    </button>
                                    <button class="btn btn-info btn-block btnUpdateUser">
                                        <i class="fa fa-edit"></i> Update User
                                    </button>
                                     <button class="btn btn-danger btn-block btnDeleteUser">
                                        <i class="fa fa-trash"></i> Delete User
                                    </button>
                                    <br/>
                                    <div class="results"></div>
                                </div>

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
                                                <table id="tableUsers" class="table display table-hover mb-30"
                                                    data-page-size="10">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Password</th>
                                                            <th>Status</th>
                                                            <th>Role</th>
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
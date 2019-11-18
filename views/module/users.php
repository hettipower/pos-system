<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manage Users</h1>
        <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">Add User</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tables dt-responsive">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Picture</th>
                            <th>Role</th>
                            <th>State</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $item = null; 
                            $value = null;
                            $users = UserController::ctrShowUsers($item, $value);
                            if( is_array($users) && !empty($users) ):
                                foreach( $users as $key => $value ):
                        ?>
                            <tr>
                                <td><?php echo ($key+1); ?></td>
                                <td><?php echo $value["name"]; ?></td>
                                <td><?php echo $value["username"]; ?></td>
                                <td>
                                    <?php if ($value["picture"] != ""): ?>
                                        <img src="<?php echo $value["picture"]; ?>" class="img-thumbnail" width="40px">
                                    <?php else: ?>
                                        <img src="./views/img/users/default/anonymous.png" class="img-thumbnail" alt="User Image" width="40px">
                                    <?php endif; ?>
                                </td>                                
                                <td><?php echo $value["profile"]; ?></td>
                                <td>
                                    <?php if($value["status"] != 0): ?>
                                        <button class="btn btn-success btnActivate btn-xs" userId="<?php echo $value["id"]; ?>" userStatus="0">Activated</button>
                                    <?php else: ?>
                                        <button class="btn btn-danger btnActivate btn-xs" userId="<?php echo $value["id"]; ?>" userStatus="1">Deactivated</button>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $value["last_login"]; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditUser" idUser="<?php echo $value["id"]; ?>" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnDeleteUser" userId="<?php echo $value["id"]; ?>" username="<?php echo $value["username"]; ?>" userPhoto="<?php echo $value["picture"]; ?>"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<!-- Add New User Modal -->
<div class="modal fade" id="modalAddUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">
                <div class="modal-header" style="background-color: #3c8dbc; color: #fff">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!--Input name -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control input-lg" type="text" name="newName" placeholder="Add name" required>
                            </div>
                        </div>

                        <!-- input username -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control input-lg" type="text" id="newUser" name="newUser" placeholder="Add username" required>
                            </div>
                        </div>

                        <!-- input password -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input class="form-control input-lg" type="password" name="newPasswd" placeholder="Add password" required>
                            </div>
                        </div>

                        <!-- input profile -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="newProfile">
                                    <option value="">Select profile</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="special">Special</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                        </div>

                        <!-- Uploading image -->
                        <div class="form-group">
                            <div class="panel">Upload image</div>
                            <input class="newPics" type="file" name="newPhoto">
                            <p class="help-block">Maximum size 2Mb</p>
                            <img class="thumbnail preview" src="./views/img/users/default/anonymous.png" width="100px">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                    $createUser = new UserController();
                    $createUser->ctrCreateUser();
                ?>
            </form>
        </div>
    </div>
</div>

<!--=====================================
=            module edit user            =
======================================-->

<div id="editUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">

                <div class="modal-header" style="background: #3c8dbc; color: #fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit user</h4>
                </div>

                <div class="modal-body">
                    <div class="box-body">

                        <!--Input name -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control input-lg" type="text" id="EditName" name="EditName" placeholder="Edit name" required>
                            </div>
                        </div>

                        <!-- input username -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control input-lg" type="text" id="EditUser" name="EditUser" placeholder="Edit username" readonly>
                            </div>
                        </div>

                        <!-- input password -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input class="form-control input-lg" type="password" name="EditPasswd" placeholder="Add new password">
                                <input type="hidden" name="currentPasswd" id="currentPasswd">
                            </div>
                        </div>

                        <!-- input profile -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <select class="form-control input-lg" name="EditProfile">
                                    <option value="" id="EditProfile"></option>
                                    <option value="administrator">Administrator</option>
                                    <option value="special">Special</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                        </div>

                        <!-- Uploading image -->
                        <div class="form-group">
                            <div class="panel">Upload image</div>
                            <input class="newPics" type="file" name="editPhoto">
                            <p class="help-block">Maximum size 2Mb</p>
                            <img class="thumbnail preview" src="views/img/users/default/anonymous.png" alt="" width="100px">
                            <input type="hidden" name="currentPicture" id="currentPicture">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit User</button>          
                </div>

                <?php
                    $editUser = new UserController();
                    $editUser->ctrEditUser();
                ?>

            </form>
        </div>
    </div>
</div>

<?php
    $deleteUser = new UserController();
    $deleteUser->ctrDeleteUser();
?> 
<div class="content-wrapper">
    <section class="content-header">
        <h1>Customer management</h1>
        <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomer">Add Customer</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tables" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Name</th>
                            <th>I.D Document</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Birthday</th>
                            <th>Total purchases</th>
                            <th>Last Purchase</th>
                            <th>Last login</th>
                            <th>Actions</th>
                        </tr> 
                    </thead>
                    <tbody>            
                        <?php
                            $item = null;
                            $valor = null;
                            $Customers = controllerCustomers::ctrShowCustomers($item, $valor);
                            if( is_array($Customers) && !empty($Customers) ):
                                foreach ($Customers as $key => $value) :
                        ?>
                            <tr>
                                <td style="width:10px"><?php echo ($key+1); ?></th>
                                <td><?php echo $value["name"]; ?></td>
                                <td><?php echo $value["idDocument"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                                <td><?php echo $value["phone"]; ?></td>
                                <td><?php echo $value["address"]; ?></td>
                                <td><?php echo $value["birthdate"]; ?></td>
                                <td><?php echo $value["purchases"]; ?></td>
                                <td>0000-00-00 00:00:00</td>
                                <td><?php echo $value["registerDate"]; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditCustomer" data-toggle="modal" data-target="#modalEditCustomer" idCustomer="<?php echo $value["id"]; ?>"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnDeleteCustomer" idCustomer="<?php echo $value["id"]; ?>"><i class="fa fa-times"></i></button>
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

<!--=====================================
MODAL ADD CUSTOMER
======================================-->

<div id="addCustomer" class="modal fade" role="dialog">  
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background: #3c8dbc; color: #fff">          
                    <button type="button" class="close" data-dismiss="modal">&times;</button>          
                    <h4 class="modal-title">Add Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!-- NAME INPUT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control input-lg" type="text" name="newCustomer" placeholder="Write name" required>
                            </div>
                        </div>

                        <!-- I.D DOCUMENT INPUT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control input-lg" type="number" min="0" name="newIdDocument" placeholder="Write your ID" required>
                            </div>
                        </div>

                        <!-- EMAIL INPUT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control input-lg" type="text" name="newEmail" placeholder="Email" required>
                            </div>
                        </div>

                        <!-- PHONE INPUT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input class="form-control input-lg" type="text" name="newPhone" placeholder="phone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                            </div>
                        </div>

                        <!-- ADDRESS INPUT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input class="form-control input-lg" type="text" name="newAddress" placeholder="Address" required>
                            </div>
                        </div>


                        <!-- BIRTH DATE INPUT -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Birth Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            </div>
                        </div>
                    
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Customer</button>
                </div>

                <?php
                    $createCustomer = new controllerCustomers();
                    $createCustomer -> ctrCreateCustomer();
                ?>
            </form>
        </div>
    </div>
</div>


<!--=====================================
MODAL EDIT CUSTOMER
======================================-->

<div id="modalEditCustomer" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Customer</h4>
                </div>
                
                <div class="modal-body">
                    <div class="box-body">

                        <!-- NAME INPUT -->            
                        <div class="form-group">              
                            <div class="input-group">              
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" class="form-control input-lg" name="editCustomer" id="editCustomer" required>
                                <input type="hidden" id="idCustomer" name="idCustomer">
                            </div>
                        </div>

                        <!-- I.D DOCUMENT INPUT -->            
                        <div class="form-group">              
                            <div class="input-group">              
                                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                                <input type="number" min="0" class="form-control input-lg" name="editIdDocument" id="editIdDocument" required>
                            </div>
                        </div>

                        <!-- EMAIL INPUT -->            
                        <div class="form-group">              
                            <div class="input-group">              
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                                <input type="email" class="form-control input-lg" name="editEmail" id="editEmail" required>
                            </div>
                        </div>

                        <!-- PHONE INPUT -->            
                        <div class="form-group">              
                            <div class="input-group">              
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                                <input type="text" class="form-control input-lg" name="editPhone" id="editPhone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                            </div>
                        </div>

                        <!-- ADDRESS INPUT -->            
                        <div class="form-group">              
                            <div class="input-group">              
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                                <input type="text" class="form-control input-lg" name="editAddress" id="editAddress"  required>
                            </div>
                        </div>

                        <!-- BIRTH DATE INPUT -->            
                        <div class="form-group">              
                            <div class="input-group">              
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control input-lg" name="editBirthdate" id="editBirthdate"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

                <?php
                    $EditCustomer = new controllerCustomers();
                    $EditCustomer -> ctrEditCustomer();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
  $deleteCustomer = new controllerCustomers();
  $deleteCustomer -> ctrDeleteCustomer();
?>
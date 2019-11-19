<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manage Categories</h1>
        <ol class="breadcrumb">
            <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Category Management</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addCategories">Add Categories</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tables" width="100%">                
                    <thead>                    
                        <tr>                    
                            <th style="width:10px">#</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                            $item = null; 
                            $value = null;
            
                            $categories = CategoryController::ctrShowCategories($item, $value);
                            if( is_array($categories) && !empty($categories) ):
                                foreach ($categories as $key => $value):
                        ?>
                            <tr>                    
                                <td><?php echo ($key+1); ?></td>
                                <td class="text-uppercase"><?php echo $value['Category']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditCategory" idCategory="<?php echo $value["id"]; ?>" data-toggle="modal" data-target="#editCategories"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnDeleteCategory" idCategory="<?php echo $value["id"]; ?>"><i class="fa fa-times"></i></button>
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
=            module add categories            =
======================================-->

<!-- Modal -->
<div id="addCategories" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background: #3c8dbc; color: #fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    
                        <!--Input name -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input class="form-control input-lg" type="text" id="newCategory" name="newCategory" placeholder="New Category" required>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                    $newCategory = new CategoryController();
                    $newCategory->ctrCreateCategory();
                ?>
            </form>
        </div>
    </div>
</div>
<!--====  End of module add categories  ====-->

<!--=====================================
=            module edit Categories            =
======================================-->

<!-- Modal -->
<div id="editCategories" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form role="form" method="POST">
                <div class="modal-header" style="background: #3c8dbc; color: #fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Categories</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">

                        <!--Input name -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input class="form-control input-lg" type="text" id="editCategory" name="editCategory" required>
                                <input type="hidden" name="idCategory" id="idCategory" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

                <?php
        
                $editCategory = new CategoryController();
                $editCategory -> ctrEditCategory();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
  
  $deleteCategory = new CategoryController();
  $deleteCategory -> ctrDeleteCategory();
?>
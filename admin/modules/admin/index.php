<?php 
    #link
    require_once __DIR__. "/../../autoload/autoload.php";
    $admin = $db->fetchAll("admin");

    if(isset($_GET['page'])){
        $p = $_GET['page'];

    }
    else{
        $p = 1;
    }

    
    $sql= "SELECT  admin.*, admin.name as nameadmin FROM admin ORDER BY ID DESC";
    
    $admin = $db ->fetchJone('admin', $sql, $p, 5, true);

    if(isset($admin['page'])){
        $sotrang = $admin['page'];
        unset($admin['page']);
    }
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>

<!-- include '/layouts/header/php' -->
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../../index.php">Bảng điều khiển</a>
                    </li>
                    <li class="breadcrumb-item active">Admin</li>
                </ol>

                <!-- Page Content -->
                <h1>Admin</h1>

                <div class="row">
                    <div class="card mb-3" style="width: 100%">
                        <div class="card-header">
                            <a href="add.php" class="btn btn-success">Thêm quản trị viên</a>
                            
                        </div>
                        <div class="clearfix">
                            <!-- THÔNG BÁO LỖI Ở ĐÂY 
                                GỌI FILE THÔNG BÁO RA
                            -->
                            <?php require_once __DIR__. "/../../../partials/notification.php";?>

                            <!-- THÔNG BÁO LỖI Ở ĐÂY 
                                GỌI FILE THÔNG BÁO RA
                            -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="dataTable_length">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="dataTable_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style=";">STT</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style=";">Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Address</th>
                                                        
                                                        
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Avatar</th>
                                                        
                                                        
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Information</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Level</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="">Created</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:20%;">Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">STT</th>
                                                        <th rowspan="1" colspan="1">Name</th>
                                                        <th rowspan="1" colspan="1">Address</th>
                                                        
                                                        <th rowspan="1" colspan="1">Avatar</th>
                                                        
                                                       
                                                        <th rowspan="1" colspan="1">Information</th>
                                                        <th rowspan="1" colspan="1">Level</th>
                                                        <th rowspan="1" colspan="1">Created</th>
                                                        <th rowspan="1" colspan="1">Action</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php  
                                                        $stt = 1;
                                                        foreach ($admin as $item) { ?>
                                                        <tr>
                                                            <td> <?php echo $stt ; ?> </td>
                                                            <td><?php echo $item['name'] ; ?></td>
                                                            <td><?php echo $item['address'] ; ?></td>
                                                            
                                                            <td><img style="width: 200px;"src=" <?php  echo uploads() ?>avatar/<?php echo $item['avatar'] ; ?> " alt=""></td>
                                                            
                                                            <td>
                                                                <div class="detailadmin"><strong>Email </strong><?php echo $item['email'] ; ?></div> 
                                                                <div class="detailadmin"><strong>Password: </strong><?php echo $item['password'] ; ?></div> 
                                                                <div class="detailadmin"><strong>phone: </strong><?php echo $item['phone'] ; ?></div> 
                                                                <div class="detailadmin"><strong>Status: </strong><?php echo $item['status'] ; ?></div> 
                                                                
                                                            </td>
                                                            <td><?php echo $item['level'] ; ?></td>
                                                            <td><?php echo $item['created_at'] ; ?></td>
                                                           
                                                            <td>
                                                               
                                                                <a class="btn btn-xs btn-info "href="edit.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-edit"></i>Sửa</a>
                                                                <a class="btn btn-xs btn-danger " href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                                            </td>
                                                        </tr>
                                                    <?php   
                                                         $stt++;
                                                         }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <?php for($i= 1; $i <= $sotrang ; $i ++) { ?>
                                                        <?php 
                                                            if(isset($_GET['page'])){
                                                                $p= $_GET['page'];
                                                            }
                                                            else{

                                                                $p = 1;
                                                            }
                                                         ?>
                                                         <li class="paginate_button page-item <?php echo ($i == $p) ? 'active' : '' ?> ">
                                                             
                                                             <a href="?page=<?php echo $i ;?>" class="page-link"> <?php echo $i; ?> </a>

                                                         </li>
                                                     <?php } ?>
                                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
        
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
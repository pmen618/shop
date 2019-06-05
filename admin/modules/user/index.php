<?php 
    #link
    require_once __DIR__. "/../../autoload/autoload.php";
    $category = $db->fetchAll("category");
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
                    <li class="breadcrumb-item active">Danh mục</li>
                </ol>

                <!-- Page Content -->
                <h1>Danh sách Danh mục</h1>

                <div class="row">
                    <div class="card mb-3" style="width: 100%">
                        <div class="card-header">
                            <a href="add.php" class="btn btn-success">Thêm mới</a>
                            
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
                                                <label>Show
                                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label>
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
                                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">STT</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:30%;">Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 25%;">Slug</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 20%;">Created</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:20%;">Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">STT</th>
                                                        <th rowspan="1" colspan="1">Name</th>
                                                        <th rowspan="1" colspan="1">Slug</th>
                                                        <th rowspan="1" colspan="1">Created</th>
                                                        <th rowspan="1" colspan="1">Action</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php  
                                                        $stt = 1;
                                                        foreach ($category as $item) { ?>
                                                        <tr>
                                                            <td> <?php echo $stt ; ?> </td>
                                                            <td><?php echo $item['name'] ; ?></td>
                                                            <td><?php echo $item['slug'] ; ?></td>
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
                                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
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
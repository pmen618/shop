<?php 
    #link
    require_once __DIR__. "/../../autoload/autoload.php";
    $product = $db->fetchAll("product");
    $category = $db->fetchAll("category");

    if(isset($_GET['page'])){
        $p = $_GET['page'];

    }
    else{
        $p = 1;
    }

    $sql= "SELECT  product.*, category.name as namecate FROM product 
    LEFT JOIN category on category.id = product.category_id ";

    $product = $db ->fetchJone('product', $sql, $p, 5, true);

    if(isset($product['page'])){
        $sotrang = $product['page'];
        unset($product['page']);
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
                    <li class="breadcrumb-item active">Sản phẩm</li>
                </ol>

                <!-- Page Content -->
                <h1>Danh sách Sản phẩm</h1>

                <div class="row">
                    <div class="card mb-3" style="width: 100%">
                        <div class="card-header">
                            <a href="add.php" class="btn btn-success">Thêm sản phẩm</a>
                            
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
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Slug</th>
                                                        
                                                        
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Thumbar</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Category</th>
                                                        
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="">Information</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="">Created</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:20%;">Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">STT</th>
                                                        <th rowspan="1" colspan="1">Name</th>
                                                        <th rowspan="1" colspan="1">Slug</th>
                                                        
                                                        <th rowspan="1" colspan="1">Thumbar</th>
                                                        <th rowspan="1" colspan="1">Category</th>
                                                       
                                                        <th rowspan="1" colspan="1">Information</th>
                                                        <th rowspan="1" colspan="1">Created</th>
                                                        <th rowspan="1" colspan="1">Action</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php  
                                                        $stt = 1;
                                                        foreach ($product as $item) { ?>
                                                        <tr>
                                                            <td> <?php echo $stt ; ?> </td>
                                                            <td><?php echo $item['name'] ; ?></td>
                                                            <td><?php echo $item['slug'] ; ?></td>
                                                            
                                                            <td><img style="width: 200px;"src=" <?php  echo uploads() ?>product/<?php echo $item['thumbar'] ; ?> " alt=""></td>
                                                            <td><?php echo $item['namecate'] ; ?></td>
                                                            <td>
                                                                <div class="detailProduct"><strong>Giá: </strong><?php echo $item['price'] ; ?></div> 
                                                                <div class="detailProduct"><strong>Giảm giá: </strong><?php echo $item['sale'] ; ?></div> 
                                                                <div class="detailProduct"><strong>Số lượng: </strong><?php echo $item['number'] ; ?></div> 
                                                                <div class="detailProduct"><strong>Mô tả: </strong><?php echo $item['content'] ; ?></div> 
                                                                
                                                            </td>
                                                            
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
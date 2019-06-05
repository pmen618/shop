<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "category";

    $id = intval(getInput('id'));

    $deleteCategory = $db->fetchID("category", $id);

    if(empty($deleteCategory)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }
    

    // Thêm điều kiện danh mục có sản phẩm thì không được xóa
    // 
    $is_product = $db ->fetchOne("product", " category_id = $id "); //chú ý phải có dấu cách " category_id = $id " không là sai
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($is_product == NUll){

        $id_delete = $db->delete("category", $id);

        if($id_delete > 0){

            $_SESSION['success'] = "Xóa thành công";
            redirectAdmin("category");
        }
        else{
            // them that bai
            $_SESSION['error'] = "Xóa lỗi";
            redirectAdmin("category");
        }
    }
    else{
            $_SESSION['error'] = "Danh mục có sản phẩm bạn không thể xóa";
            redirectAdmin("category");
        }
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
                    <li class="breadcrumb-item">
                        <a href="index.php">Danh sách Danh mục</a>
                    </li>
                    <li class="breadcrumb-item active">Xóa</li>
                </ol>

                <!-- Page Content -->
                
                <div class="row">
                    <div class="col-md-8 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST">
                          <div class="form-group" >
                            <h2 style="color: #dc3545;">Bạn có chắc chắn xóa sản phẩm này ?</h2>
                            <input type="text" class="form-control" id="name" placeholder="Tên danh mục" name="name" value="<?php echo $deleteCategory['name'] ?>" disabled>
                            <?php 
                                if(isset($error['name'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['name']; } 
                                         ?>
                                    </p>
                          </div>
                         
                          <button type="submit" class="btn btn-primary btn-success">Xóa</button>
                          <a href="<?php echo modules("category")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
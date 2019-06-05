<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "category";

    $id = intval(getInput('id'));

    $deleteCategory = $db->fetchID("category", $id);
    if(empty($deleteCategory)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       $data =[
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))
       ];

       /*$error = [];

       if(postInput('name') == '')
       {
            $error['name'] = "Tên danh mục không được để trống, mời nhập tên danh mục";
       }*/
       
       if(empty($error)){

        $id_delete = $db->delete("category", $id);

        if($id_delete > 0){

            $_SESSION['success'] = "Xóa thành công";
            redirectAdmin("category");
        }
        else{
            // them that bai
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin("category");
        }
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
                    <div class="col-md-10 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST">
                          <div class="form-group" >
                            <label for="exampleInputEmail1">Bạn có chắc muốn xóa danh mục này ?</label>
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
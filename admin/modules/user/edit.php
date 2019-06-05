<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "category";

    $id = intval(getInput('id'));

    $editCategory = $db->fetchID("category", $id);

    if(empty($editCategory)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");

    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $data =[
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];

        $error = [];

        if(postInput('name') == '')
        {
            $error['name'] = "Tên danh mục không được để trống, mời nhập tên danh mục";
        }
       
        if(empty($error)){

            if($editCategory['name'] != $data['name']){

                $isset = $db->fetchOne("category", " name = '" .$data['name']."' ");
                if(count($isset) > 0){

                    $_SESSION['error'] = "Tên danh mục đã tồn tại";

                }
                else{

                    $id_update = $db->update("category", $data, array("id"=>$id));

                    if($id_update > 0){

                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("category");
                    }

                    else{
                        // them that bai
                        // 
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("category");
                    }

                }
            }
            else{

                $id_update = $db->update("category", $data, array("id"=>$id));

                    if($id_update > 0){

                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("category");
                    }

                    else{
                        // them that bai
                        // 
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("category");
                    }
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
                    <li class="breadcrumb-item active">Sửa mới</li>
                </ol>

                <!-- Page Content -->
                <h2>Sửa Mới</h2>
                <div class="row">
                    <div class="col-md-10 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST">
                          <div class="form-group" >
                            <label for="exampleInputEmail1">Sửa Danh mục</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên danh mục" name="name" value="<?php echo $editCategory['name'] ?>">
                            <?php 
                                if(isset($error['name'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['name']; } 
                                         ?>
                                    </p>
                          </div>
                         
                          <button type="submit" class="btn btn-primary btn-success">Lưu</button>
                          <a href="<?php echo modules("category")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
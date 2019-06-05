<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "admin";

    $id = intval(getInput('id'));

    $deleteadmin = $db->fetchID("admin", $id);
    
    if(empty($deleteadmin)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       $data =[
        "name" => postInput('name'),
       
       ];
       
       if(empty($error)){

        $id_delete = $db->delete("admin", $id);

        if($id_delete > 0){

            $_SESSION['success'] = "Xóa thành công";
            redirectAdmin("admin");
        }
        else{
            // them that bai
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin("admin");
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
                        <a href="index.php">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Xóa</li>
                </ol>

                <!-- Page Content -->
                
                <div class="row">
                    <div class="col-md-8 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group" >
                                <h2 style="color: #dc3545;">Bạn có chắc chắn xóa quản trị viên này ?</h2>
                            </div>

                            <div class="form-group" >
                                <label for="" class="col-md-3"> Họ và tên</label>
                                <input type="text" class="form-control" id="name" placeholder="AlexXander" name="name" value="<?php echo $deleteadmin['name'] ?>" disabled>
                                <?php 
                                    if(isset($error['name'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['name']; } 
                                             ?>
                                        </p>
                              </div>
                             <div class="form-group" >
                                <label for="" class="col-md-3"> Email</label>
                                <input type="email" class="form-control" id="email" placeholder="admin@gmail.com" name="email" value="<?php echo $deleteadmin['email'] ?>" disabled>
                                <?php 
                                    if(isset($error['email'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['email']; } 
                                             ?>
                                        </p>
                              </div>
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Địa chỉ</label>
                                <input type="text" class="form-control" id="address" placeholder="Tân Phú, Hồ Chí Minh" name="address" value="<?php echo $deleteadmin['address'] ?>" disabled>
                                <?php 
                                    if(isset($error['address'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['address']; } 
                                             ?>
                                        </p>
                              </div>
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Mật khẩu</label>
                                <input type="password" class="form-control" id="Password" placeholder="password " name="password" value="<?php echo $deleteadmin['password'] ?>" disabled>
                                <?php 
                                    if(isset($error['password'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['password']; } 
                                             ?>
                                        </p>
                              </div>
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Avatar</label>
                                <input type="file" class="form-control" id="avatar" placeholder="Hình ảnh" name="avatar" disabled>
                                <?php 
                                    if(isset($error['avatar'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['avatar']; } 
                                             ?>
                                        </p>
                                        <img style="width: 50%;margin: 20px auto;" src="<?php echo "/shop/public/uploads/avatar/"?><?php echo $deleteadmin['avatar'] ?>" alt="">
                              </div>
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Số điện thoại</label>
                                <input type="number" class="form-control" id="phone" placeholder="0934213759" name="phone" value="<?php echo $deleteadmin['phone'] ?>" disabled>
                                <?php 
                                    if(isset($error['phone'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['phone']; } 
                                             ?>
                                        </p>
                              </div>
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Cấp độ</label>
                                <input type="level" class="form-control" id="level" placeholder="Cấp độ: 4" name="level" value="<?php echo $deleteadmin['level'] ?>" disabled>
                                <?php 
                                    if(isset($error['level'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['level']; } 
                                             ?>
                                        </p>
                              </div>

                            <button type="submit" class="btn btn-primary btn-success">Xóa</button>
                            <a href="<?php echo modules("admin")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "admin";

    $id = intval(getInput('id'));

    $editadmin = $db->fetchID("admin", $id);

    if(empty($editadmin)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");

    }
    
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){

         $data =[
        "name" => postInput('name'),
        "address" => postInput('address'),
        "email" =>postInput('email'),
        "password" =>postInput('password'),
        "level" => postInput('level'),
        "phone" =>postInput('phone')
       ];

        // Báo Lỗi để trống admin

       if(postInput('name') == '')
       {
        $error['name'] = "Tên quản trị viên không được để trống";
       }

       if(postInput('email') == '')
       {
        $error['email'] = "Email không được để trống";
       }
        /*
         if(postInput('passsword') == '')
         {
             $error['password'] = "Password không được để trống";
         }*/

       if( ! isset($_FILES['avatar']))
       {
        $error['avatar'] = "Hình ảnh không được để trống";
       }

       if(postInput('phone') == '')
       {
        $error['phone'] = "Số điện thoại không được để trống";
       }

       if(postInput('level') == '')
       {
        $error['level'] = "Cấp độ không được để trống";
       }


        if(empty($error)){

            if (isset($_FILES['thumbar'])) {
              # code...
              
                $thumbar_name = $_FILES['thumbar']['name'];
                $thumbar_tmp = $_FILES['thumbar']['tmp_name'];
                $thumbar_type = $_FILES['thumbar']['type'];
                $thumbar_error = $_FILES['thumbar']['error'];

                if ($thumbar_error == 0) {
                # code...
                
                    $part = ROOT ."avatar/";
                    $data['thumbar'] = $thumbar_name;
                }
            }

            if($editadmin['name'] != $data['name']){

                $isset = $db->fetchOne("admin", " name = '" .$data['name']."' ");
                if(count($isset) > 0){

                    $_SESSION['error'] = "Tên quản trị viên đã tồn tại";

                }
                else{

                    $id_update = $db->update("admin", $data, array("id"=>$id));

                    if($id_update > 0){

                        move_uploaded_file($thumbar_tmp, $part.$thumbar_name);
                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("admin");
                    }

                    else{
                        // them that bai
                        // 
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("admin");
                    }

                }
            }
            else{

                $id_update = $db->update("admin", $data, array("id"=>$id));

                    if($id_update > 0){

                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("admin");
                    }

                    else{
                        // them that bai
                        // 
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("admin");
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
                        <a href="index.php">Danh sách quản trị viên</a>
                    </li>
                    <li class="breadcrumb-item active">Sửa quản trị viên</li>
                </ol>

                <!-- Page Content -->
                <h2>Sửa Mới</h2>
                <div class="clearfix">
                  <?php 
                    if (isset($_SESSION['error'])) { ?>
                                                    
                        <div class="alert alert-danger">
                            <?php  echo $_SESSION['error'] ; unset($_SESSION['error'])?>
                        </div>    

                <?php  } ?>

                </div>
                <div class="row"> 
                    <div class="col-md-8 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                          
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Họ và tên</label>
                                <input type="text" class="form-control" id="name" placeholder="AlexXander" name="name" value="<?php echo $editadmin['name'] ?>">
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
                                <input type="email" class="form-control" id="email" placeholder="admin@gmail.com" name="email" value="<?php echo $editadmin['email'] ?>">
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
                                <input type="address" class="form-control" id="address" placeholder="Hồ Chí Minh" name="address" value="<?php echo $editadmin['address'] ?>">
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
                                <input type="password" class="form-control" id="Password" placeholder="password " name="password" value="<?php echo $editadmin['password'] ?>">
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
                                <input type="file" class="form-control" id="avatar" placeholder="Hình ảnh" name="avatar">
                                <?php 
                                    if(isset($error['avatar'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['avatar']; } 
                                             ?>
                                        </p>
                                        <img style="width: 50%;margin: 20px auto;" src="<?php echo "/shop/public/uploads/avatar/"?><?php echo $editadmin['avatar'] ?>" alt="">
                              </div>
                              <div class="form-group" >
                                <label for="" class="col-md-3"> Số điện thoại</label>
                                <input type="phone" class="form-control" id="phone" placeholder="0934213759" name="phone" value="<?php echo $editadmin['phone'] ?>">
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
                                <select name="level" id="level" placeholder="Cấp độ: 1" class="form-control">
                                 <option value="1" <?php echo isset($editadmin['level']) && $editadmin['level']==1 ? "selected = 'selected' " : '' ?> >CTV</option>
                              <option value="2" <?php echo isset($editadmin['level']) && $editadmin['level']==1 ? "selected = 'selected' " : '' ?> >Admin</option>
                                  
                                </select>
                                <?php 
                                    if(isset($error['level'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['level']; } 
                                             ?>
                                        </p>
                              </div>
                              <button type="submit" class="btn btn-primary btn-success">Cập nhật</button>
                              <a href="<?php echo modules("admin")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
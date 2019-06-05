<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "admin";
   

    
    $admin = $db->fetchAll("admin");
    $data =[
        "name" => postInput('name'),
       
        "email" =>postInput('email'),
        "password" =>MD5(postInput('password')),
       
        "level" => postInput('level'),
        "phone" =>postInput('phone')
       ];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
       
       
       
       // Báo Lỗi để trống admin

       if(postInput('name') == '')
       {
        $error['name'] = "Tên quản trị viên không được để trống";
       }

       if(postInput('email') == '')
       {
        $error['email'] = "Email không được để trống";
       }
       else{
        $is_check_mail = $db->fetchOne("admin", "email = '".$data['email']."'");
        if($is_check_mail != null){
          $error['email'] = "Email đã tồn tại";
        }
       }
/*
       if(postInput('passsword') == '')
       {
        $error['password'] = "Password không được để trống";
       }*/

       

       if(postInput('phone') == '')
       {
        $error['phone'] = "Số điện thoại không được để trống";
       }

       if(postInput('level') == '')
       {
        $error['level'] = "Cấp độ không được để trống";
       }

       //MD5
       //
       /*if($data['password'] != MD5(postInput("re_password"))){
          $error['password'] = "mật khẩu không giống";
       }*/


       // error trong nghia la khong co loi
       // 
       if(empty($error)){
        
        if (isset($_FILES['avatar'])) {
          # code...
          
          $avatar_name = $_FILES['avatar']['name'];
          $avatar_tmp = $_FILES['avatar']['tmp_name'];
          
          $avatar_type = $_FILES['avatar']['type'];
          $avatar_error = $_FILES['avatar']['error'];

          if ($avatar_error == 0) {
            # code...
            $part = ROOT ."avatar/";
            $data['avatar'] = $avatar_name;
          }
        }
        //_debug($data);
        //
        $isset = $db->fetchOne("admin", " name = '" .$data['name']."' ");

        if(count($isset) > 0){
          $_SESSION['error'] = "Tên quản trị viên đã tồn tại";
        }

        else{
          $id_insert = $db->insert("admin", $data);

            if($id_insert){

              move_uploaded_file($avatar_tmp, $part.$avatar_name);
              $_SESSION['success'] = "Thêm thành công";
              redirectAdmin("admin");

            }
            else{
                // them that bai
                $_SESSION['error'] = "Thêm thất bại";
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
                        <a href="index.php">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm quản trị viên</li>
                </ol>

                <!-- Page phone -->
                <h2>Thêm Mới</h2>
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
                            <input type="text" class="form-control" id="name" placeholder="AlexXander" name="name">
                            <?php 
                                if(isset($error['name'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['name']; } 
                                         ?>
                                    </p>
                          </div>
                         <div class="form-group" >
                            <input type="email" class="form-control" id="email" placeholder="admin@gmail.com" name="email">
                            <?php 
                                if(isset($error['email'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['email']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="text" class="form-control" id="address" placeholder="Tân Phú, Hồ Chí Minh" name="address">
                            <?php 
                                if(isset($error['address'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['address']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="password" class="form-control" id="password" placeholder="password " name="password">
                            <?php 
                                if(isset($error['password'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['password']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="password" class="form-control" id="re_password" placeholder="config password " name="re_password">
                            <?php 
                                if(isset($error['re_password'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['re_password']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="file" class="form-control" id="avatar" placeholder="Hình ảnh" name="avatar">
                            <?php 
                                if(isset($error['avatar'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['avatar']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="number" class="form-control" id="phone" placeholder="0934213759" name="phone">
                            <?php 
                                if(isset($error['phone'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['phone']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <select name="level" id="level" placeholder="Cấp độ: 1" class="form-control">
                              <option value="1" <?php echo isset($data['level']) && $data['level']==1 ? "selected = 'selected' " : '' ?> >CTV</option>
                              <option value="2" <?php echo isset($data['level']) && $data['level']==1 ? "selected = 'selected' " : '' ?> >Admin</option>
                            </select>
                            
                            <?php 
                                if(isset($error['level'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['level']; } 
                                         ?>
                                    </p>
                          </div>
                          <button type="submit" class="btn btn-primary btn-success">Thêm quản trị viên</button>
                          <a href="<?php echo modules("admin")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
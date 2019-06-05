<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "category";
   
    $category = $db->fetchAll("category");
    
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

       // error trong nghia la khong co loi
       // 
       if(empty($error)){

        $isset = $db->fetchOne("category", " name = '" .$data['name']."' ");

        if(count($isset) > 0){
          $_SESSION['error'] = "Tên danh mục đã tồn tại";
        }

        else{
          $id_insert = $db->insert("category", $data);

            if($id_insert > 0){

                 $_SESSION['success'] = "Thêm thành công";
                redirectAdmin("category");

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
                        <a href="index.php">Danh sách Danh mục</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>

                <!-- Page Content -->
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
                    <div class="col-md-10 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST">
                          <div class="form-group" >
                            <label for="exampleInputEmail1">Thêm Danh mục</label>
                            <input type="text" class="form-control" id="name" placeholder="Tên danh mục" name="name">
                            <?php 
                                if(isset($error['name'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['name']; } 
                                         ?>
                                    </p>
                          </div>
                         
                          <button type="submit" class="btn btn-primary btn-success">Thêm mới</button>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
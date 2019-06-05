<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "product";

    $id = intval(getInput('id'));

    $editproduct = $db->fetchID("product", $id);

    if(empty($editproduct)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");

    }
    
    $category = $db->fetchAll('category');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $data =[
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name')),
            "category_id" => postInput('category_id'),
            "price" =>postInput('price'),
            "number" => postInput('number'),
            "content" =>postInput('content')
        ];

        // Báo Lỗi để trống sản phẩm
            $error = [];

           if(postInput('category_id') == '')
           {
            $error['category_id'] = "Danh mục sản phẩm không được để trống";
           }

           if(postInput('name') == '')
           {
            $error['name'] = "Tên sản phẩm không được để trống, mời nhập tên sản phẩm";
           }

           if(postInput('price') == '')
           {
            $error['price'] = "Giá sản phẩm không được để trống, mời nhập giá sản phẩm";
           }
           if(postInput('number') == '')
           {
            $error['number'] = "Thêm số lượng cho sản phẩm";
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
                
                    $part = ROOT ."product/";
                    $data['thumbar'] = $thumbar_name;
                }
            }

            if($editproduct['name'] != $data['name']){

                $isset = $db->fetchOne("product", " name = '" .$data['name']."' ");
                if(count($isset) > 0){

                    $_SESSION['error'] = "Tên sản phẩm đã tồn tại";

                }
                else{

                    $id_update = $db->update("product", $data, array("id"=>$id));

                    if($id_update > 0){

                        move_uploaded_file($thumbar_tmp, $part.$thumbar_name);
                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("product");
                    }

                    else{
                        // them that bai
                        // 
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("product");
                    }

                }
            }
            else{

                $id_update = $db->update("product", $data, array("id"=>$id));

                    if($id_update > 0){

                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("product");
                    }

                    else{
                        // them that bai
                        // 
                        $_SESSION['error'] = "Dữ liệu không đổi";
                        redirectAdmin("product");
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
                        <a href="index.php">Danh sách sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                            
                                <select name="category_id" class="form-control" >
                                    <option value=""> Chọn danh mục loại sản phẩm</option>
                                    <?php foreach ($category as $item) { ?>

                                    <option value=" <?php echo $item['id'] ?>"
                                        <?php echo $editproduct['category_id'] == $item['id'] ? "selected = 'selected'" : '' ?> >
                                        <?php echo $item['name'] ?></option>
                                  
                                    <?php } ?>
                                </select>

                                <?php 
                                    if(isset($error['category'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['category']; } 
                                             ?>
                                        </p>
                            </div>
                          <div class="form-group" >
                            <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" name="name" value="<?php echo $editproduct['name'] ?>">
                            <?php 
                                if(isset($error['name'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['name']; } 
                                         ?>
                                    </p>
                          </div>
                         <div class="form-group" >
                            <input type="number" class="form-control" id="price" placeholder="2.000.000" name="price" value="<?php echo $editproduct['price'] ?>">
                            <?php 
                                if(isset($error['price'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['price']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="text" class="form-control" id="sale" placeholder="Sale % " name="sale" value="<?php echo $editproduct['sale'] ?>">
                            <?php 
                                if(isset($error['sale'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['sale']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="file" class="form-control" id="thumbar" placeholder="Hình ảnh" name="thumbar" >
                            <?php 
                                if(isset($error['thumbar'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['thumbar']; } 
                                         ?>
                                    </p>
                                    <img style="width: 50%;margin: 20px auto;" src="<?php echo "/shop/public/uploads/product/"?><?php echo $editproduct['thumbar'] ?>" alt="">
                          </div>
                          <div class="form-group" >
                            <textarea type="text" class="form-control" id="content" placeholder="Mô tả" name="content" > <?php echo $editproduct['content'] ?></textarea>
                            <?php 
                                if(isset($error['content'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['content']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="number" class="form-control" id="number" placeholder="Số lượng: 100" name="number" value="<?php echo $editproduct['number'] ?>">
                            <?php 
                                if(isset($error['number'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['number']; } 
                                         ?>
                                    </p>
                          </div>
                          <button type="submit" class="btn btn-primary btn-success">Sửa sản phẩm</button>
                          <a href="<?php echo modules("product")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
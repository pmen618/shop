<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "product";
    $open2 = "category";

    $category = $db->fetchAll("category");
    $product = $db->fetchAll("product");
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       
       $data =[
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name')),
        "category_id" => postInput('category_id'),
        "price" =>postInput('price'),
        "number" => postInput('number'),
        "content" =>postInput('content')
       ];
       
       // Báo Lỗi để trống danh mục

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

       if( ! isset($_FILES['thumbar']))
       {
        $error['thumbar'] = "Thêm hình ảnh cho sản phẩm";
       }

       if(postInput('content') == '')
       {
        $error['content'] = "Thêm mô tả cho sản phẩm";
       }
       if(postInput('number') == '')
       {
        $error['number'] = "Thêm số lượng cho sản phẩm";
       }


       // error trong nghia la khong co loi
       // 
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
        //_debug($data);
        //
        $isset = $db->fetchOne("product", " name = '" .$data['name']."' ");

        if(count($isset) > 0){
          $_SESSION['error'] = "Tên sản phẩm đã tồn tại";
        }

        else{
          $id_insert = $db->insert("product", $data);

            if($id_insert){

              move_uploaded_file($thumbar_tmp, $part.$thumbar_name);
              $_SESSION['success'] = "Thêm thành công";
              redirectAdmin("product");

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
                        <a href="index.php">Danh sách sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                    <div class="col-md-8 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group" >
                            
                            <select name="category_id" id="" class="form-control">
                              <option value=""> Chọn danh mục loại sản phẩm</option>
                              <?php foreach ($category as $item) { ?>

                               <option value=" <?php echo $item['id'] ?>" > <?php echo $item['name'] ?></option>
                              
                              <?php } ?>
                            </select>

                            <?php 
                                if(isset($error['category_id'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['category_id']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" name="name">
                            <?php 
                                if(isset($error['name'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['name']; } 
                                         ?>
                                    </p>
                          </div>
                         <div class="form-group" >
                            <input type="number" class="form-control" id="price" placeholder="2.000.000" name="price">
                            <?php 
                                if(isset($error['price'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['price']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="text" class="form-control" id="sale" placeholder="Sale % " name="sale">
                            <?php 
                                if(isset($error['sale'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['sale']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <input type="file" class="form-control" id="thumbar" placeholder="Hình ảnh" name="thumbar">
                            <?php 
                                if(isset($error['thumbar'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['thumbar']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <textarea type="text" class="form-control" id="content" placeholder="Mô tả" name="content"></textarea>
                            <?php 
                                if(isset($error['content'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['content']; } 
                                         ?>
                                    </p>
                          </div>
                          <div class="form-group" >
                            <textarea type="number" class="form-control" id="number" placeholder="Số lượng: 100" name="number"></textarea>
                            <?php 
                                if(isset($error['number'])) { ?>
                                    <p class="text-danger">
                                        <?php 
                                        echo $error['number']; } 
                                         ?>
                                    </p>
                          </div>
                          <button type="submit" class="btn btn-primary btn-success">Thêm sản phẩm</button>
                          <a href="<?php echo modules("product")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
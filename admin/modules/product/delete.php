<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    $open = "product";

    $id = intval(getInput('id'));

    $deleteproduct = $db->fetchID("product", $id);
    $category = $db->fetchAll('category');

    if(empty($deleteproduct)){

        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       $data =[
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))
       ];

       /*$error = [];

       if(postInput('name') == '')
       {
            $error['name'] = "Tên sản phẩm không được để trống, mời nhập tên sản phẩm";
       }*/
       
       if(empty($error)){

        $id_delete = $db->delete("product", $id);

        if($id_delete > 0){

            $_SESSION['success'] = "Xóa thành công";
            redirectAdmin("product");
        }
        else{
            // them that bai
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin("product");
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
                    <li class="breadcrumb-item active">Xóa</li>
                </ol>

                <!-- Page Content -->
                
                <div class="row">
                    <div class="col-md-8 add" style="margin: 20px auto;">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group" >
                                <h2 style="color: #dc3545;">Bạn có chắc chắn xóa sản phẩm này ?</h2>
                                <select disabled="disabled"  name="category_id" id="" class="form-control">
                                    <option value=""> Chọn danh mục loại sản phẩm</option>
                                    <?php foreach ($category as $item) { ?>

                                    <option value=" <?php echo $item['id'] ?>"
                                        <?php echo $deleteproduct['category_id'] == $item['id'] ? "selected = 'selected'" : '' ?> >
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
                                
                                <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm" name="name" value="<?php echo $deleteproduct['name'] ?>" disabled>
                                <?php 
                                    if(isset($error['name'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['name']; } 
                                             ?>
                                        </p>
                            </div>

                            <div class="form-group" >
                                <input type="number" class="form-control" id="price" placeholder="2.000.000" name="price" value="<?php echo $deleteproduct['price'] ?>" disabled>
                                <?php 
                                    if(isset($error['price'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['price']; } 
                                             ?>
                                        </p>
                            </div>
                            <div class="form-group" >
                                <input type="text" class="form-control" id="sale" placeholder="Sale % " name="sale" value="<?php echo $deleteproduct['sale'] ?>" disabled>
                                <?php 
                                    if(isset($error['sale'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['sale']; } 
                                             ?>
                                        </p>
                            </div>
                            <div class="form-group" >
                                <input type="file" class="form-control" id="thumbar" placeholder="Hình ảnh" name="thumbar" disabled>
                                <?php 
                                    if(isset($error['thumbar'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['thumbar']; } 
                                             ?>
                                        </p>
                                        <img style="width: 50%;margin: 20px auto;" src="<?php echo "/shop/public/uploads/product/"?><?php echo $deleteproduct['thumbar'] ?>" alt="">
                            </div>
                            <div class="form-group" >
                                <textarea type="text" class="form-control" id="content" placeholder="Mô tả" name="content" disabled> <?php echo $deleteproduct['content'] ?></textarea>
                                <?php 
                                    if(isset($error['content'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['content']; } 
                                             ?>
                                        </p>
                            </div>
                            <div class="form-group" >
                                <input type="number" class="form-control" id="number" placeholder="Số lượng: 100" name="number" value="<?php echo $deleteproduct['number'] ?>" disabled>
                                <?php 
                                    if(isset($error['number'])) { ?>
                                        <p class="text-danger">
                                            <?php 
                                            echo $error['number']; } 
                                             ?>
                                        </p>
                            </div>

                            <button type="submit" class="btn btn-primary btn-success">Xóa</button>
                            <a href="<?php echo modules("product")?>" class="btn btn-primary btn-danger">Hủy bỏ</a>
                        </form>
                    </div>
                    
                </div>
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/../../layouts/footer.php";?>
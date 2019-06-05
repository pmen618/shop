<?php 
    require_once __DIR__. "/autoload/autoload.php";
   
    $category = $db->fetchAll("category");
    

?>

<?php require_once __DIR__. "/layouts/header.php";?>

<!-- include '/layouts/header/php' -->
        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href=" <?php echo base_url()?>/admin/">Bảng điều khiển</a>
                    </li>
                    <li class="breadcrumb-item active">Welcome</li>
                </ol>

                <!-- Page Content -->
                <h1>CHÀO MỪNG BẠN</h1>
                <hr>
                <p>Xin chào bạn đã tới trang quản trị của Admin</p>
                <?php 
                    var_dump($category);

                ?>

        
            </div>
            <!-- /.container-fluid -->

            
<?php require_once __DIR__. "/layouts/footer.php";?>
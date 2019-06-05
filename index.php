<?php 
    require_once __DIR__. "/autoload/autoload.php";
   
   $sqlHomecate= "SELECT * FROM category WHERE home = 1 ORDER BY updated_at";

   $categoryHome = $db->fetchsql($sqlHomecate);
   $category =$db->fetchAll("category");
   $data =[];

   // Show category
   // 
   foreach ($categoryHome as $item) {
        # code...
        $cateId = intval($item['id']);
        $sql= " SELECT * FROM product WHERE category_id = $cateId";
        $productHome = $db->fetchsql($sql);
        $data[$item['name']] = $productHome; 

    } 

    // Page number
    // 
    $product = $db->fetchAll("product");
   

    if(isset($_GET['page'])){
        $p = $_GET['page'];

    }
    else{
        $p = 1;
    }

    $sql2= "SELECT  product.*, category.name as namecate FROM product 
    LEFT JOIN category on category.id = product.category_id ";

    $product2 = $db ->fetchJone('product', $sql2, $p, 9, true);
    if(isset($product2['page'])){
        $sotrang = $product2['page'];
        unset($product2['page']);
    }

?>

<?php require_once __DIR__. "/layouts/header.php";?>

<!-- include '/layouts/header/php' -->
    
    <!-- SLIDER -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url() ?>/public/frontend/img/bg_5.jpg" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>We had such a great time in LA!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url() ?>/public/frontend/img/bg_1.jpg" alt="Chicago" >
                <div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p>
                </div>
            </div>
            
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!-- END SLIDER -->
    <!-- PRODUCTS -->
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">Popular on Little Closet</div>
                </div>
                
            </div>
            <div class="row">
                <div class="content-products">
                    <div class="row page_nav_row">
                        <div class="col">
                            <div class="page_nav">
                                <ul class="d-flex flex-row align-items-start justify-content-center">
                                    <?php foreach ($category as $item) { ?>
                                    <li class=""><a href="danh-muc-san-pham.php?<?php echo $item['name']?>&id=<?php echo $item['id'] ?>">
                                        <?php echo $item['name']?>
                                    </a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row products_row">

                     <!--    <?php #foreach ($data as $key => $value): ?>-->
                            <!--
                            <div class="title col-md-12">
                                <a href=""><?php #echo $key ?></a>
                            </div>             value     --> 

                            <?php foreach ($product2 as $item) :  ?> 
                                <div class="col-xl-4 col-md-6">
                                    <div class="product">
                                        <div class="product_image">
                                           <a href="chi-tiet-san-pham.php?<?php echo $item['name'] ?>&id=<?php echo $item['id'] ?>"><img src="<?php echo "/shop/public/uploads/product/"?><?php echo $item['thumbar'] ?>" alt=""></a> 
                                        </div>
                                        <div class="product_content">
                                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                                <div>
                                                    <div>
                                                        <div class="product_name"><a href="product.html"><?php echo $item['name'] ?></a></div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="ml-auto text-right">
                                                    <div class="rating_r rating_r_4 home_item_rating"></div>
                                                    <div class="product_price text-right"><?php echo formatPrice($item['price']) ?></div>
                                                </div>
                                            </div>
                                            <div class="product_buttons">
                                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                                        <img class="svg" src="<?php echo base_url() ?>/public/frontend/img/heart.svg">
                                                    </div>
                                                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                        <img class="svg" src="<?php echo base_url() ?>/public/frontend/img/cart.svg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>  

                       <!-- <?php #endforeach ?>-->
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    <!-- END  PRODUCTS -->
    <!-- PAGE -->

    <div class="row">
        <div class="col-sm-12 col-md-9">

        </div>
        <div class="col-sm-12 col-md-3">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                <ul class="pagination">
                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><<</a></li>
                    <?php for($i= 1; $i <= $sotrang ; $i ++) { ?>
                        <?php 
                            if(isset($_GET['page'])){
                                $p= $_GET['page'];
                                }
                                else{
                                $p = 1;
                            }
                        ?>
                    <li class="paginate_button page-item <?php echo ($i == $p) ? 'active' : '' ?> ">
                        <a href="?page=<?php echo $i ;?>" class="page-link">
                            <?php echo $i; ?>
                        </a>
                    </li>
                            <?php } ?>
                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">>></a></li>
                 </ul>
            </div>
        </div>
    </div>
    
    

<!-- /.container-fluid -->

            
<?php require_once __DIR__. "/layouts/footer.php";?>
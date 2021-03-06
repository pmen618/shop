<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
    $id = intval(getInput('id'));
    $editcategory = $db->fetchID("category", $id);

    $sql = "SELECT * FROM product WHERE category_id = $id";
    $product = $db->fetchsql($sql);


    $product2 = $db->fetchAll("product");
    
    $category = $db->fetchAll("category");

    if(isset($_GET['page'])){
        $p = $_GET['page'];

    }
    else{
        $p = 1;
    }

    $sql2= "SELECT  product.*, category.name as namecate FROM product 
    LEFT JOIN category on category.id = product.category_id ";

    $product2 = $db ->fetchJone('product', $sql2, $p, 5, true);
    if(isset($product2['page'])){
        $sotrang = $product2['page'];
        unset($product2['page']);
    }
    
?>

<?php require_once __DIR__. "/layouts/header.php";?>

<!-- include '/layouts/header/php' -->
    
    <!-- PRODUCTS -->
    <div class="home">
            <div class="home_container d-flex flex-column align-items-center justify-content-end">
                <div class="home_content text-center">
                    <div class="home_title">Danh mục sản phẩm</div>
                    <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                        <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                            <li><a href="<?php echo base_url() ?>/index.php">Trang chủ /</a></li>
                            <li><a href=""><?php echo $editcategory['name'] ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="row products_bar_row">
                    <div class="col">
                        <div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
                            <div class="products_bar_links">
                                <ul class="d-flex flex-row align-items-start justify-content-start">
                                    <li><a href="#" class="active"><?php echo $editcategory['name'] ?></a></li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                <div class="content-products">
                    <div class="row products_row">
                        <?php if($product) {
                         foreach ($product as $item): ?>
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
                    <?php }
                    else
                        echo '<p style="padding-left: 15px;">Hiện chưa có sản phẩm</p>' ;
                     ?>
                        
                    </div>
                    
                </div>
                
            </div>
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
        </div>
    </div>

    <!-- END  PRODUCTS -->

<!-- /.container-fluid -->

            
<?php require_once __DIR__. "/layouts/footer.php";?>
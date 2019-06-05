<?php 
    require_once __DIR__. "/autoload/autoload.php";
   
    $id = intval(getInput('id'));

    //chi tiết sản phẩm
    $product = $db->fetchID("product", $id);

    $sql = "SELECT * FROM category WHERE id = $id";
    $category = $db->fetchsql($sql);

    // San phẩm liên quan
    // 
    $cateid = intval($product['category_id']);
    $sql = "SELECT * FROM product WHERE category_id= $cateid ORDER BY id DESC LIMIT 4";
    $productRelated = $db->fetchsql($sql);

?>

<?php require_once __DIR__. "/layouts/header.php";?>

<!-- include '/layouts/header/php' -->
    
    <!-- PRODUCTS -->
    <div class="home" style="height: 150px; ">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-left" style="padding: 25px;"> 
                 <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                    <ul class="d-flex flex-row align-items-start justify-content-start text-center" style="width: 100%;">
                        <li><a href="<?php echo base_url() ?>/index.php">Trang chủ /</a></li>
                        
                        <li><a href="" class="active" style="color: #2fce98;"><?php echo $product['name'] ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="products" style="padding-top: 0;">
        <div class="row">
            <div class="container">
                <div class="card">

                    <div class="container-fliud">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                
                                <div class="preview-pic tab-content wraper">
                                    <div class="product_image zoom_area" style="height: 100%;">
                                        <a href="" class="preview">
                                            <img class="tile" data-scale="2.4" src="<?php echo "/shop/public/uploads/product/"?><?php echo $product['thumbar'] ?> ">
                                        </a> 
                                    </div>
                                </div>
                                
                                <ul class="preview-thumbnail nav nav-tabs">
                                  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo "/shop/public/uploads/product/"?><?php echo $product['thumbar'] ?>" style="width: 100%; height: auto;"/></a></li>
                                  <li><a data-target="#pic-2" data-toggle="tab"><img  src="<?php echo "/shop/public/uploads/product/"?><?php echo $product['thumbar'] ?>" style="width: 100%; height: auto;"/></a></li>
                                  <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo "/shop/public/uploads/product/"?><?php echo $product['thumbar'] ?>" style="width: 100%; height: auto;"/></a></li>
                                  <li><a data-target="#pic-4" data-toggle="tab"><img src="<?php echo "/shop/public/uploads/product/"?><?php echo $product['thumbar'] ?>" style="width: 100%; height: auto;"/></a></li>
                                  <li><a data-target="#pic-5" data-toggle="tab"><img src="<?php echo "/shop/public/uploads/product/"?><?php echo $product['thumbar'] ?>" style="width: 100%; height: auto;"/></a></li>
                                </ul>
                                
                            </div>
                            <div class="details col-md-6">
                                <h1 class="product_name"><a href="" style="font-size: 30px;color: #ff9f1a;"><?php echo $product['name'] ?></a></h1>
                                <div class="rating">
                                    <div class="stars">
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="review-no">41 đánh giá</i>
                                    </div>
                                    
                                </div>
                                <div class="row products-detail">
                                    <div class="product-sale-title product-title col-md-3">Giảm giá</div>
                                    <div class="product-sale col-md-9"><?php echo $product['sale'] ?></div>
                                </div>
                                <div class="row products-detail">
                                    <div class="product-price-title product-title col-md-3">Giá bán</div>
                                    <div class="product-price col-md-9"><?php echo formatPrice($product['price']) ?><span style="color:#4a4a4a; transform: uppercase; margin-left:10px;">  VNĐ</span></div>
                                </div>
                                <div class="row products-detail">
                                    <div class="count-title product-title col-md-3">Số lượng</div>

                                    <div class="count col-md-3"><input type="number" name="count" value="1" style="width: 50px;" /></div>
                                    <div class="product-number"><?php echo formatPrice($product['number']) ?><span>   </span>sản phẩm có sẵn</div>
                                </div>
                                <div class="row products-detail">
                                    <div class="vote-title product-title col-md-3"><strong>91%</strong></div>
                                    <div class="vote col-md-9">người dùng lựa chọn sản phẩm <strong>(87 đánh gía)</strong></div>
                                </div>
                                
                            
                                <h5 class="sizes">sizes:
                                    <span class="size" data-toggle="tooltip" title="small">s</span>
                                    <span class="size" data-toggle="tooltip" title="medium">m</span>
                                    <span class="size" data-toggle="tooltip" title="large">l</span>
                                    <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                                </h5>
                                
                                <div class="action">
                                    <button class="add-to-cart btn btn-default" type="button">Mua hàng</button>
                                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                </div>

                                <div class="row products-detail">
                                    <div class="product-describe product-title col-md-12">Mô tả sản phẩm</div>
                                    <div class="product-description col-md-12"><?php echo $product['content'] ?></div>
                                </div>

                                    
                            </div>
                        </div>
                    </div>
                </div> 

            
                <div class="content-products">
                    <div class="row">
                        <div class="col-lg-12 offset-lg-12">
                            <div class="section_title text-left product-related">Sản phẩm liên quan</div>
                        </div>
                        
                    </div>
                    <div class="row products_row">
                        <?php foreach ($productRelated as $item): ?>
                            <div class="col-xl-3 col-md-4">
                                    <div class="product">
                                        <div class="product_image" style="height: 50%;">
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
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
  
    <!-- END  PRODUCTS -->

<!-- /.container-fluid -->

            
<?php require_once __DIR__. "/layouts/footer.php";?>
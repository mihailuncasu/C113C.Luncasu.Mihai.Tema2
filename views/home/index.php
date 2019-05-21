<link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/index.css'); ?>" />
<div class="col-sm-10 myContainer-ads">
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <?php
        $images = $viewData['images'];
        $imagesCount = count($images);
        foreach ($images as $key => $image):
            ?>
            <div class="mySlides">
                <div class="mySlideImage">
                    <img src="<?= $image['path'] ?>" style="width:100%">
                </div>
                <div class="text">
                    <h4>
                        <?= $image['description'] ?>
                    </h4>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- The dots/circles -->
        <div style="text-align:center">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <?php foreach ($images as $key => $image): ?>
                <span class="dot" onclick="currentSlide(<?= $key + 1 ?>)"></span> 
            <?php endforeach; ?>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>

    <div class="row">
        <?php
            $promotionProducts = $viewData['products'];
            foreach ($promotionProducts as $promotionProduct) :
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid6">
                    <div class="product-image6">
                        <a href="#">
                            <img class="pic-1" src="<?= PRODUCTS_IMAGES . $promotionProduct['images'] . "0" ?>.jpg" alt="<?= $promotionProduct['name'] ?>">
                        </a>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?= $promotionProduct['name'] ?></a></h3>
                        <?php if ($promotionProduct['sale_percentage']) : ?>
                        <div class="price"><?= $promotionProduct['price'] - $promotionProduct['price'] * $promotionProduct['sale_percentage'] / 100 ?> lei
                            <span><?= $promotionProduct['price'] ?> lei</span>
                        </div>
                        <?php else: ?>
                        <div class="price"><?= $promotionProduct['price']?> lei </div>
                        <?php endif; ?>
                    </div>
                    <ul class="social">
                        <li><a href="<?= ROOT_URL ?>home/product/<?= $promotionProduct['id'] ?>" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <!--li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li-->
                        <li><a onclick="addToCart('<?= $promotionProduct['id'] ?>')" style="cursor: pointer" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
        <?php
            endforeach;
         ?>
    </div>
</div>

<script src="<?php echo auto_version(ASSETS_URL . '/js/index.js'); ?>"></script>
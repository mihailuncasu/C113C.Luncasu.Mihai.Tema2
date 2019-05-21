<link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/index.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/product.css'); ?>" />

<div class="row">
    <?php
    $promotionProduct = $viewData;
    ?>
    <div class="col-sm-6 col-md-6 myContainer-product">
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
                    <div class="price"><?= $promotionProduct['price'] ?> lei </div>
                <?php endif; ?>
                <p>
                    <?= $promotionProduct['description'] ?>
                </p>
            </div>
            <ul class="social">
                <li><a onclick="addToCart('<?= $promotionProduct['id'] ?>')" style="cursor: pointer" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<script src="<?php echo auto_version(ASSETS_URL . '/js/product.js'); ?>"></script>
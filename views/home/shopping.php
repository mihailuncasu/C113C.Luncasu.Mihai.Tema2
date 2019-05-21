
<link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/shopping.css'); ?>" />
<div class="col-sm-10 myContainer-shopping-cart">
    <div class="row">
        <h3>
            Cos cumparaturi actual
        </h3>
        <?php
        // M: $shoppingCart array will have [index] => [id => value, quantity => value];
        $shoppingCartItems = $viewData;
        $productsModel = new ProductsModel();
        $sum = 0;
        foreach ($shoppingCartItems as $item) :
            $product = $productsModel->GetProductById($item['id']);
            $salePrice = $product['price'] - $product['price'] * $product['sale_percentage'] / 100;
            $totalPrice = $item['quantity'] * $salePrice;
            $sum += $totalPrice;
            ?>
            <div class="shopping-cart-item"> 
                <div class="shopping-cart-item-info"> 
                    <img src=" <?= PRODUCTS_IMAGES . $product['images'] ?>0.jpg"  alt="<?= $product['name'] ?>">
                    <h6> <?= $product['name'] ?> </h6>
                </div>
                <div class="shopping-cart-item-value">
                    <h4>Pret: <?= $salePrice ?> </h4>
                    <h4>Cantitate: <?= $item['quantity'] ?> </h4>
                    <h4>Pret total: <?= $totalPrice ?> </h4>
                    <a id="removeItem-<?= $product['id']?>" onclick="removeProduct(<?= $product['id'] ?>)">&#x274E</a> 
                </div>
            </div>                    
        <?php endforeach; ?>

    </div>
    <div class="myTotal">
        <span class="itemName">Total:</span>
        <span class="price"><?= $sum ?> lei</span>
        <button class="btn btn-success">Comanda</button>
    </div>

    <script src="<?php echo auto_version(ASSETS_URL . 'js/shopping.js'); ?>"></script>
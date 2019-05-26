<link type="text/css" rel="stylesheet" href="<?= auto_version(ASSETS_URL . 'css/history.css'); ?>" />

<div class="container">
    <br><h3>Tranzactii</h3><br>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Produs</th>
                <th style="width:10%">Pret</th>
                <th style="width:8%">Cantitate</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <?php $total = 0; ?>
        <tbody>
            <?php
            // M: $shoppingCart array will have [index] => [id => value, quantity => value];
            $shoppingCartItems = $viewData;
            $productsModel = new ProductsModel();
            $sum = 0;
            if (!empty($shoppingCartItems)) 
            foreach ($shoppingCartItems as $item) :
                $product = $productsModel->GetProductById($item['id']);
                $salePrice = $product['price'] - $product['price'] * $product['sale_percentage'] / 100;
                $totalPrice = $item['quantity'] * $salePrice;
                $sum += $totalPrice;
                ?>
                <tr id="product-<?= $product['id'] ?>">
                    <td data-th="Produs">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?= PRODUCTS_IMAGES . $product['images'] ?>0.jpg" alt="..." class="cart-img"></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?= $product['name'] ?></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Pret" id="product-price-<?= $product['id'] ?>"><?= $product['price'] ?></td>
                    <td data-th="Cantitate">
                        <input type="text" readonly id="quantity-<?= $product['id'] ?>" class="form-control text-center" value="<?= $product['quantity'] ?>">
                    </td>
                    <td data-th="Subtotal" class="text-center" id="subtotal-<?= $product['id'] ?>"><?= $product['price'] * $product['quantity'] ?></td>
                </tr>
                <?php $total += $product['quantity'] * $product['price'] ?>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center" name="total-sum"><strong>Total <?= $total ?> lei</strong></td>
            </tr>
            <tr>
                <td><a href="<?= ROOT_URL ?>" class="btn btn-light"><i class="fa fa-angle-left"></i> Continua cumparaturile</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center" name="total-sum"><strong>Total <?= $total ?> lei</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
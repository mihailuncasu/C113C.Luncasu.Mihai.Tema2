<?php

/*
 * M: Controller for the login part of the web app;
 */

class Home extends Controller {

    public function Index() {
        $mainPageAdsModel = new MainPageAdsModel();
        $data = [
            'images' => $mainPageAdsModel->GetImages()
        ];
        $this->returnView($data, true, true);
    }

    public function AjaxAddCart() {
        // M: TODO: Eventually sanitize the info. Implement for adding different quantities;
        // M: Fetch the id of the product;
        $id = $_POST['id'];
        $content = '';
        $total = 0;
        $productModel = new ProductsModel();
        // M: TODO: Check if the cart is empty;
        if ($id == -1) {
            // M: It means that the page was freshly refreshed so we just load the old cart;
            
        } else {
            // M: Put it in the session after the following rule: if it exists, increment the quantity. If not, add it and set quantity to 0;
            if (isset($_SESSION['shopping_cart'])) {
                // M: The session already exists so we search for our product in order to see if it is in the cart or we have to add it;
                $itemsId = array_column($_SESSION['shopping_cart'], 'id');
                // M: We search after our product id to see if it's already in the cart or not;
                if (in_array($id, $itemsId)) {
                    // M: If it's already in the shopping cart we increment the quantity;
                    foreach ($_SESSION['shopping_cart'] as $position => $product) {
                        if ($product['id'] == $id) {
                            $_SESSION['shopping_cart'][$position]['quantity'] ++;
                        }
                    }
                } else {
                    // M: We place the new product at the bottom of the cart;
                    $position = count($_SESSION['shopping_cart']);
                    $newItem = [
                        'id' => $id,
                        'quantity' => 1
                    ];
                    $_SESSION['shopping_cart'][$position] = $newItem;
                }
            } else {
                // M: We create the session for the cart where we will save all the products;
                $newItem = [
                    'id' => $id,
                    'quantity' => 1
                ];
                $_SESSION['shopping_cart'][0] = $newItem;
            }
        }
        // M: $content var contains all the html for the shopping cart;
        foreach ($_SESSION['shopping_cart'] as $item) {
            $product = $productModel->GetProductById($item['id']);
            $salePrice = $product['price'] - $product['price'] * $product['sale_percentage'] / 100;
            $totalPrice = $item['quantity'] * $salePrice;
            $content .= "<div class=\"shopping-cart-item\"> <div class=\"shopping-cart-item-info\"> <img src=\"" .
                    PRODUCTS_IMAGES . $product['images'] .
                    "0.jpg\" alt=\"" . $product['name'] .
                    "\"><h6> " .
                    $product['name'] .
                    "</h3></div><div class=\"shopping-cart-item-value\"><h4>Price: " .
                    $salePrice .
                    "</h4><h4>Quantity: " .
                    $item['quantity'] .
                    "<h4>Total price: " .
                    $totalPrice .
                    "</h4><a id=\"removeItem\" onclick=\"removeProduct(" .
                    $product['id'] .
                    ")\">&#x274E</a>" .
                    "</div></div>";
            $total += $item['quantity'] * ($product['price'] - $product['price'] * $product['sale_percentage'] / 100);
        }
        $data = [
            'content' => $content,
            'msg' => 'success'
        ];
        echo json_encode($data);
    }

    public function AjaxRemoveCart() {
        // M: TODO: More security checks;
        $id = $_POST['id'];
        foreach ($_SESSION['shopping_cart'] as $position => $product) {
            if ($product['id'] == $id) {
                $removeIndex = $position;
            }
        }
        unset($_SESSION['shopping_cart'][$position]);
        $data = [
            'msg' => 'success'
        ];
        echo json_encode($data);
    }
    
    public function Product() {
        echo basename($_SERVER['REQUEST_URI']);
    }
}

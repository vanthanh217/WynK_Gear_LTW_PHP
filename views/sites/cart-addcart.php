<?php

use App\Models\Product;

if (isset($_REQUEST['addcart'])) {
    $id = $_GET['id'];
    $qty = $_GET['qty'];
    $product = Product::find($id);
    $cart_item = [
        'id' => $id,
        'name' => $product->name,
        'price' => ($product->pricesale < $product->price ? $product->pricesale : $product->price),
        'qty' => $qty ?? 1,
        'image' => $product->image
    ];
    Cart::addCart($cart_item);
    echo count($_SESSION['cart']);
}

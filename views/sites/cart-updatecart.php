<?php
$qtys = $_REQUEST['qty'];
foreach ($qtys as $id => $qty) {
    Cart::updateCart($id, $qty);
    header('location: index.php?opt=cart');
}

<?php
$id = $_REQUEST['deletecart'];
Cart::deleteCart($id);
header('location: index.php?opt=cart');
echo $id;

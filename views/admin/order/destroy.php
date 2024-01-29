<?php

use App\Models\Order;

$id = $_REQUEST["id"];
$order = Order::find($id);
if ($order == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=order&cat=trash");
}

$order->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=order&cat=trash");

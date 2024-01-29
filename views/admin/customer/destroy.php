<?php

use App\Models\User;

$id = $_REQUEST["id"];
$customer = User::find($id);
if ($customer == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=customer&cat=trash");
}

$customer->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=customer&cat=trash");

<?php

use App\Models\User;

$id = $_REQUEST["id"];
$customer = User::where('id', '=', $id)->first();
if ($customer == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=customer");
}

$customer->status = 0;
$customer->updated_at = date('Y-m-d H:i:s');
$customer->updated_by = $_SESSION["user_id"] ?? 1;
if (file_exists("../public/images/user/" . $customer->image)) {
    unlink("../public/images/user/" . $customer->image);
}

$customer->save();
set_flash("message", ["type" => "success", "msg" => "Xóa vào thùng rác thành công"]);
header("location:index.php?opt=customer");

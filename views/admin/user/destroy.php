<?php

use App\Models\User;

$id = $_REQUEST["id"];
$user = User::find($id);
if ($user == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=user&cat=trash");
}

$user->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=user&cat=trash");

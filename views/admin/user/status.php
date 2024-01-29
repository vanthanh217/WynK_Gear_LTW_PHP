<?php

use App\Models\User;

$id = $_REQUEST["id"];
$user = User::where('id', '=', $id)->first();
if ($user == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=user");
}

$user->status = $user->status == 1 ? 2 : 1;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = $_SESSION["user_id"] ?? 1;
$user->save();
set_flash("message", ["type" => "success", "msg" => "Thay đổi trạng thái thành công"]);
header("location:index.php?opt=user");

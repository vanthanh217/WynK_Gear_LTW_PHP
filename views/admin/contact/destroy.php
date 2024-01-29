<?php

use App\Models\Contact;

$id = $_REQUEST["id"];
$contact = Contact::find($id);
if ($contact == null) {
    set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
    header("location:index.php?opt=contact&cat=trash");
}

$contact->delete();
set_flash("message", ["type" => "success", "msg" => "Xóa thành công"]);
header("location:index.php?opt=contact&cat=trash");

<?php

use App\Models\Contact;

// Cập nhật
if (isset($_REQUEST['CAPNHAT'])) {
    $id = $_REQUEST["id"];
    $contact = Contact::find($id);
    $contact->name = $_REQUEST["name"];
    $contact->email = $_REQUEST["email"];
    $contact->phone = $_REQUEST["phone"];
    $contact->title = $_REQUEST["title"];
    $contact->content = $_REQUEST["content"];

    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = $_SESSION["user_id"] ?? 1;
    $contact->status = 2;

    $contact->save();
    set_flash("message", ["type" => "success", "msg" => "Cập nhật thành công"]);
    header("location:index.php?opt=contact");
}

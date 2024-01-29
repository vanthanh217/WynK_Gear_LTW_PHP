<?php

use App\Models\Contact;

$id = $_REQUEST['id'];
$contact = Contact::find($id);
if ($contact == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=contact");
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <form action="index.php?opt=contact&cat=process" method="post" enctype="multipart/form-data">
      <section class="content-header my-2">
         <h1 class="d-inline">Trả lời liên hệ</h1>
         <div class="text-end">
            <a href="index.php?opt=contact" class="btn btn-sm btn-success">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
               <i class="fa fa-save" aria-hidden="true"></i> Trả lời liên hệ
            </button>
         </div>
      </section>
      <input type="hidden" name="id" value="<?= $contact->id ?>">
      <section class="content-body my-2">
         <div class="row">
            <div class="col-4">
               <div class="mb-3">
                  <label for="name" class="text-main">Họ tên</label>
                  <input type="text" name="name" value="<?= $contact->name ?>" id="name" class="form-control" placeholder="Nhập họ tên" readonly>
               </div>
            </div>
            <div class="col-4">
               <div class="mb-3">
                  <label for="phone" class="text-main">Điện thoại</label>
                  <input type="text" name="phone" value="<?= $contact->phone ?>" id="phone" class="form-control" placeholder="Nhập điện thoại" readonly>
               </div>
            </div>
            <div class="col-4">
               <div class="mb-3">
                  <label for="email" class="text-main">Email</label>
                  <input type="text" name="email" value="<?= $contact->email ?>" id="email" class="form-control" placeholder="Nhập email" readonly>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="mb-3">
                  <label for="title" class="text-main">Tiêu đề</label>
                  <input type="text" name="title" value="<?= $contact->title ?>" id="title" class="form-control" placeholder="Nhập tiêu đề" readonly>
               </div>
               <div class="mb-3">
                  <label for="content_old" class="text-main">Nội dung</label>
                  <textarea name="content_old" id="content_old" class="form-control" placeholder="Nhập nội dung liên hệ" readonly>
                  <?= $contact->content ?>
                  </textarea>
               </div>
               <div class="mb-3">
                  <label for="content" class="text-main">Nội dung trả lời</label>
                  <textarea name="content" id="content" class="form-control" placeholder="Nhập nội dung liên hệ" rows="5"></textarea>
               </div>
            </div>
         </div>
      </section>
   </form>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
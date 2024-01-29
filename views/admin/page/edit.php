<?php

use App\Models\Post;

$id = $_REQUEST["id"];
$page = Post::where('id', '=', $id)->first();
if ($page == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=page");
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật trang đơn</h1>
      <div class="text-end">
         <a href="index.php?opt=page" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">
      <form action="index.php?opt=page&cat=process" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-9">
               <input name="id" value="<?= $page->id; ?>" type="hidden">
               <div class="mb-3">
                  <label><strong>Tiêu đề bài viết (*)</strong></label>
                  <input type="text" name="title" value="<?= $page->title; ?>" class="form-control" placeholder="Nhập tiêu đề" />
               </div>
               <div class="mb-3">
                  <label><strong>Slug (*)</strong></label>
                  <input type="text" name="slug" value="<?= $page->slug; ?>" class="form-control" placeholder="Slug" />
               </div>
               <div class="mb-3">
                  <label><strong>Chi tiết (*)</strong></label>
                  <textarea name="detail" rows="7" class="form-control" placeholder="Nhập chi tiết">
                  <?= $page->detail; ?>
                  </textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="4" class="form-control" placeholder="Mô tả">
                  <?= $page->description; ?>
                  </textarea>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Cập nhật</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <p>Chọn trạng thái cập nhật</p>
                     <select name="status" class="form-select">
                        <option value="1" <?= $page->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                        <option value="2" <?= $page->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-body mt-2 bg-white">
                     <div class="box-header py-1 px-2 border-bottom">
                        <strong>Loại (*)</strong>
                     </div>
                     <div class="box-body p-2 border-bottom">
                        <select name="type" class="form-select">
                           <option value="">None</option>
                           <option value="page" <?= $page->type == 'page' ? 'selected' : '' ?>>Page</option>
                        </select>
                     </div>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Cập nhật
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Hình đại diện</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <input type="file" name="image" class="form-control" />
                  </div>
               </div>
            </div>
         </div>
      </form>
   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
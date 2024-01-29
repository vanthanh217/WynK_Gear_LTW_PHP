<?php

use App\Models\Post;
use App\Models\Topic;

$id = $_REQUEST["id"];
$post = Post::where('id', '=', $id)->first();
if ($post == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=post");
}
$topics = Topic::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();
$str_topic_value = '';
foreach ($topics as $item) {
   if ($post->topic_id == $item->id) {
      $str_topic_value .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
   } else {
      $str_topic_value .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
   }
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Cập nhật bài viết</h1>
      <div class="text-end">
         <a href="index.php?opt=post" class="btn btn-sm btn-success">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">

      <form action="index.php?opt=post&cat=process" method="post" enctype="multipart/form-data">
         <div class="row">
            <div class="col-md-9">
               <input name="id" value="<?= $post->id; ?>" type="hidden">
               <div class="mb-3">
                  <label><strong>Tiêu đề bài viết (*)</strong></label>
                  <input type="text" name="title" value="<?= $post->title; ?>" class="form-control" placeholder="Nhập tiêu đề" />
               </div>
               <div class="mb-3">
                  <label><strong>Slug (*)</strong></label>
                  <input type="text" name="slug" value="<?= $post->slug; ?>" class="form-control" placeholder="Slug" />
               </div>
               <div class="mb-3">
                  <label><strong>Chi tiết (*)</strong></label>
                  <textarea name="detail" rows="7" class="form-control" placeholder="Nhập chi tiết">
                  <?= $post->detail; ?>
                  </textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Mô tả (*)</strong></label>
                  <textarea name="description" rows="4" class="form-control" placeholder="Mô tả">
                  <?= $post->description; ?>
                  </textarea>
               </div>
            </div>
            <div class="col-md-3">
               <div class="box-container mt-4 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Đăng</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <p>Chọn trạng thái đăng</p>
                     <select name="status" class="form-select">
                        <option value="1" <?= $post->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                        <option value="2" <?= $post->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                     </select>
                  </div>
                  <div class="box-footer text-end px-2 py-3">
                     <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i> Đăng
                     </button>
                  </div>
               </div>
               <div class="box-container mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Chủ đề (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="topic_id" class="form-select">
                        <option value="">None</option>
                        <?= $str_topic_value ?>
                     </select>
                  </div>
               </div>
               <div class="box-body mt-2 bg-white">
                  <div class="box-header py-1 px-2 border-bottom">
                     <strong>Loại (*)</strong>
                  </div>
                  <div class="box-body p-2 border-bottom">
                     <select name="type" class="form-select">
                        <option value="">None</option>
                        <option value="post" <?= $post->type == 'post' ? 'selected' : '' ?>>Post</option>
                     </select>
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
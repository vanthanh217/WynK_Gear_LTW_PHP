<?php

use App\Models\User;

$id = $_REQUEST["id"];
$user = User::where('id', '=', $id)->first();
if ($user == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=user");
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<form action="index.php?opt=user&cat=process" method="post" enctype="multipart/form-data">
   <div class="content">
      <section class="content-header my-2">
         <h1 class="d-inline">Cập nhật thành viên</h1>
         <div class="row mt-2 align-items-center">
            <div class="col-md-12 text-end">
               <button class="btn btn-success btn-sm" name="CAPNHAT">
                  <i class="fa fa-save"></i> Lưu [Cập nhật]
               </button>
               <a href="index.php?opt=user" class="btn btn-primary btn-sm">
                  <i class="fa fa-arrow-left"></i> Về danh sách
               </a>
            </div>
         </div>
      </section>
      <section class="content-body my-2">

         <div class="row">
            <div class="col-md-6">
               <input value="<?= $user->id ?>" name="id" type="hidden">
               <div class="mb-3">
                  <label><strong>Tên đăng nhập(*)</strong></label>
                  <input type="text" name="username" value="<?= $user->username ?>" class="form-control" placeholder="Tên đăng nhập" />
               </div>
               <div class="mb-3">
                  <label><strong>Mật khẩu(*)</strong></label>
                  <input type="password" name="password" value="<?= $user->password ?>" class="form-control" placeholder="Mật khẩu" />
               </div>
               <div class="mb-3">
                  <label><strong>Xác nhận mật khẩu(*)</strong></label>
                  <input type="password" name="re_password" value="<?= $user->password ?>" class="form-control" placeholder="Xác nhận mật khẩu" />
               </div>
               <div class="mb-3">
                  <label><strong>Email(*)</strong></label>
                  <input type="text" name="email" value="<?= $user->email ?>" class="form-control" placeholder="Email" />
               </div>
               <div class="mb-3">
                  <label><strong>Xác nhận email(*)</strong></label>
                  <input type="text" name="re_email" value="<?= $user->email ?>" class="form-control" placeholder="Xác nhận email" />
               </div>
               <div class="mb-3">
                  <label><strong>Điện thoại(*)</strong></label>
                  <input type="text" name="phone" value="<?= $user->phone ?>" class="form-control" placeholder="Điện thoại" />
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label><strong>Họ tên (*)</strong></label>
                  <input type="text" name="name" value="<?= $user->name ?>" class="form-control" placeholder="Họ tên" />
               </div>
               <div class="mb-3">
                  <label><strong>Địa chỉ</strong></label>
                  <input type="text" name="address" value="<?= $user->address ?>" class="form-control" placeholder="Địa chỉ" />
               </div>
               <div class="mb-3">
                  <label><strong>Vai trò</strong></label>
                  <select name="roles" class="form-select">
                     <option value="0" <?= $user->roles == 0 ? 'selected' : '' ?>>Admin</option>
                     <option value="1" <?= $user->roles == 1 ? 'selected' : '' ?>>Customer</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label><strong>Hình đại diện</strong></label>
                  <input type="file" name="image" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Trạng thái</strong></label>
                  <select name="status" class="form-select">
                     <option value="1" <?= $user->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                     <option value="2" <?= $user->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                  </select>
               </div>
            </div>
         </div>

      </section>
   </div>
</form>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
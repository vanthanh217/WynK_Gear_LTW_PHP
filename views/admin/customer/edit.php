<?php

use App\Models\User;

$id = $_REQUEST["id"];
$customer = User::find($id);
if ($customer == null) {
   set_flash("message", ["type" => "danger", "msg" => "Mẫu tin không tồn tại"]);
   header("location:index.php?opt=customer");
}
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<form action="index.php?opt=customer&cat=process" method="post" enctype="multipart/form-data">
   <div class="content">
      <section class="content-header my-2">
         <h1 class="d-inline">Sửa thông tin thành viên</h1>
         <div class="row mt-2 align-items-center">
            <div class="col-md-12 text-end">
               <button class="btn btn-success btn-sm" name="CAPNHAT">
                  <i class="fa fa-save"></i> Lưu [Thêm]
               </button>
               <a href="index.php?opt=customer" class="btn btn-primary btn-sm">
                  <i class="fa fa-arrow-left"></i> Về danh sách
               </a>
            </div>
         </div>
      </section>
      <section class="content-body my-2">
         <div class="row">
            <input name="id" value="<?= $customer->id ?>" type="hidden" class="mx-auto w-75">
            <div class="col-md-6">
               <div class="mb-3">
                  <label><strong>Tên đăng nhập(*)</strong></label>
                  <input type="text" name="username" value="<?= $customer->username ?>" class="form-control" placeholder="Tên đăng nhập" />
               </div>
               <div class="mb-3">
                  <label><strong>Mật khẩu(*)</strong></label>
                  <input type="password" name="password" value="<?= $customer->password ?>" class="form-control" placeholder="Mật khẩu" />
               </div>
               <div class="mb-3">
                  <label><strong>Xác nhận mật khẩu(*)</strong></label>
                  <input type="password" name="re_password" value="<?= $customer->password ?>" class="form-control" placeholder="Xác nhận mật khẩu" />
               </div>
               <div class="mb-3">
                  <label><strong>Email(*)</strong></label>
                  <input type="text" name="email" value="<?= $customer->email ?>" class="form-control" placeholder="Email" />
               </div>
               <div class="mb-3">
                  <label><strong>Xác nhận email(*)</strong></label>
                  <input type="text" name="re_email" value="<?= $customer->email ?>" class="form-control" placeholder="Xác nhận email" />
               </div>
               <div class="mb-3">
                  <label><strong>Điện thoại(*)</strong></label>
                  <input type="text" name="phone" value="<?= $customer->phone ?>" class="form-control" placeholder="Điện thoại" />
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label><strong>Họ tên (*)</strong></label>
                  <input type="text" name="name" value="<?= $customer->name ?>" class="form-control" placeholder="Họ tên" />
               </div>
               <div class="mb-3">
                  <label><strong>Địa chỉ</strong></label>
                  <input type="text" name="address" value="<?= $customer->address ?>" class="form-control" placeholder="Địa chỉ" />
               </div>
               <div class="mb-3">
                  <label><strong>Hình đại diện</strong></label>
                  <input type="file" name="image" class="form-control" />
               </div>
               <div class="mb-3">
                  <label><strong>Trạng thái</strong></label>
                  <select name="status" class="form-select">
                     <option value="1" <?= $customer->status == 1 ? 'selected' : '' ?>>Xuất bản</option>
                     <option value="2" <?= $customer->status == 2 ? 'selected' : '' ?>>Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label><strong>Vai trò</strong></label>
                  <select name="roles" class="form-select">
                     <option value="0" <?= $customer->roles == 0 ? 'selected' : '' ?>>Admin</option>
                     <option value="1" <?= $customer->roles == 1 ? 'selected' : '' ?>>Customer</option>
                  </select>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
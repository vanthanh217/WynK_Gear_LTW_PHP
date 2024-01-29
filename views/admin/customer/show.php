<?php

use App\Models\User;

$id = $_REQUEST['id'];
$customer = User::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=customer" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=customer&cat=edit&id=<?= $customer->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=customer&cat=delete&id=<?= $customer->id ?>" class="btn btn-danger btn-sm">
               <i class="fa fa-trash"></i> Xóa
            </a>
         </div>
      </div>
   </section>
   <section class="content-body my-2">

      <table class="table table-bordered">
         <thead>
            <tr>
               <th style="width:180px">Tên trường</th>
               <th>Giá trị</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th>Id</th>
               <td><?= $customer->id ?></td>
            </tr>
            <tr>
               <th>Họ và Tên</th>
               <td><?= $customer->name ?></td>
            </tr>
            <tr>
               <th>Username</th>
               <td><?= $customer->username ?></td>
            </tr>
            <tr>
               <th>Password</th>
               <td><?= $customer->password ?></td>
            </tr>
            <tr>
               <th>Email</th>
               <td><?= $customer->email ?></td>
            </tr>
            <tr>
               <th>Số điện thoại</th>
               <td><?= $customer->phone ?></td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <?php if ($customer->image) : ?>
                     <img class="img-fluid" src="../public/images/user/<?= $customer->image; ?>" alt="<?= $customer->image; ?>" style="width: 70px; height: 70px; object-fit: cover;" />
                  <?php else : ?>
                     <?= 'No Image' ?>
                  <?php endif; ?>
               </td>
            </tr>
            <tr>
               <th>Địa chỉ</th>
               <td><?= $customer->address ?></td>
            </tr>
            <tr>
               <th>Ngày tạo</th>
               <td><?= date_format($customer->created_at, "H:i:s d/m/Y ") ?></td>
            </tr>
            <tr>
               <th>Người tạo</th>
               <td><?= $customer->created_by ?></td>
            </tr>
            <tr>
               <th>Ngày sửa</th>
               <td><?= date_format($customer->updated_at, "H:i:s d/m/Y ") ?></td>
            </tr>
            <tr>
               <th>Người sửa</th>
               <td><?= $customer->updated_by ?></td>
            </tr>
            <tr>
               <th>Trạng thái</th>
               <td><?= $customer->status ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
<?php

use App\Models\User;

$id = $_REQUEST['id'];
$user = User::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=user" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=user&cat=edit&id=<?= $user->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=user&cat=delete&id=<?= $user->id ?>" class="btn btn-danger btn-sm">
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
               <th>id</th>
               <td><?= $user->id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $user->name ?></td>
            </tr>
            <tr>
               <th>email</th>
               <td><?= $user->email ?></td>
            </tr>
            <tr>
               <th>phone</th>
               <td><?= $user->phone ?></td>
            </tr>
            <tr>
               <th>username</th>
               <td><?= $user->username ?></td>
            </tr>
            <tr>
               <th>password</th>
               <td><?= $user->password ?></td>
            </tr>
            <tr>
               <th>address</th>
               <td><?= $user->address ?></td>
            </tr>
            <tr>
               <th>Ảnh</th>
               <td>
                  <?php if ($user->image) : ?>
                     <img class="img-fluid" src="../public/images/user/<?= $user->image; ?>" alt="<?= $user->image; ?>" style="width: 70px; height: 70px; object-fit: cover;" />
                  <?php else : ?>
                     <?= 'No Image' ?>
                  <?php endif; ?>
               </td>
            </tr>
            <tr>
               <th>roles</th>
               <td><?= $user->roles == 0 ? 'admin' : 'customer' ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $user->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $user->created_by ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $user->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
<?php

use App\Models\User;

$users = User::where('status', '!=', 0)
   ->orderBy('roles', 'ASC')->get();
$garbage = User::where('status', '=', 0)->count();
$public = User::where('status', '!=', 0)->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Thành viên</h1>
      <a href="index.php?opt=user&cat=create" class="btn-add">Thêm mới</a>
      <div class="row mt-3 align-items-center">
         <div class="col-6">
            <ul class="manager">
               <li>
                  <a href="#">
                     Tất cả ( <?= ($all > 0) ? $all : '0' ?> )
                  </a>
               </li>
               <li>
                  <a href="#">
                     Xuất bản ( <?= ($public > 0) ? $public : '0' ?> )
                  </a>
               </li>
               <li>
                  <a href="index.php?opt=user&cat=trash">
                     Rác ( <?= ($garbage > 0) ? $garbage : '0' ?> )
                  </a>
               </li>
            </ul>
         </div>
         <div class="col-6 text-end">
            <input type="text" class="search d-inline" />
            <button class="d-inline btnsearch">Tìm kiếm</button>
         </div>
      </div>
      <div class="row mt-1 align-items-center">
         <div class="col-md-8">
            <select name="" class="d-inline me-1">
               <option value="">Hành động</option>
               <option value="">Bỏ vào thùng rác</option>
            </select>
            <button class="btnapply">Áp dụng</button>
         </div>
         <div class="col-md-4 text-end">
            <nav aria-label="Page navigation example">
               <ul class="pagination pagination-sm justify-content-end">
                  <li class="page-item disabled">
                     <a class="page-link">&laquo;</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                     <a class="page-link" href="#">&raquo;</a>
                  </li>
               </ul>
            </nav>
         </div>
      </div>
   </section>
   <section class="content-body my-2">
      <?php require_once '../views/admin/message.php' ?>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th class="text-center" style="width:30px;">
                  <input type="checkbox" id="checkAll" />
               </th>
               <th class="text-center" style="width:90px;">Hình ảnh</th>
               <th>Họ tên</th>
               <th>Vai trò</th>
               <th>Điện thoại</th>
               <th>Email</th>
               <th class="text-center" style="width:30px;">ID</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($users as $user) : ?>
               <tr class="datarow">
                  <td class="text-center">
                     <input type="checkbox" id="checkId" />
                  </td>
                  <td>
                     <img class="img-fluid" src="../public/images/user/<?= $user->image; ?>" alt="<?= $user->image; ?>" />
                  </td>
                  <td>
                     <div class="name">
                        <a href="index.php?opt=user&id=<?= $user->id; ?>">
                           <?= $user->name; ?>
                        </a>
                     </div>
                     <div class="function_style">
                        <?php if ($user->status == 1) : ?>
                           <a href="index.php?opt=user&cat=status&id=<?= $user->id; ?>" class="text-success mx-1">
                              <i class="fa fa-toggle-on"></i>
                           </a>
                        <?php else : ?>
                           <a href="index.php?opt=user&cat=status&id=<?= $user->id; ?>" class="text-danger mx-1">
                              <i class="fa fa-toggle-off"></i>
                           </a>
                        <?php endif; ?>
                        <a href="index.php?opt=user&cat=edit&id=<?= $user->id; ?>" class="text-primary mx-1">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="index.php?opt=user&cat=show&id=<?= $user->id; ?>" class="text-info mx-1">
                           <i class="fa fa-eye"></i>
                        </a>
                        <a href="index.php?opt=user&cat=delete&id=<?= $user->id; ?>" class="text-danger mx-1">
                           <i class="fa fa-trash"></i>
                        </a>
                     </div>
                  </td>
                  <td>
                     <?= $user->roles == 0 ? 'admin' : 'customer'; ?>
                  </td>
                  <td>
                     <?= $user->phone; ?>
                  </td>
                  <td>
                     <?= $user->email; ?>
                  </td>
                  <td class="text-center">
                     <?= $user->id; ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
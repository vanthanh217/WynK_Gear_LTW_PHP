<?php

use App\Models\Menu;

$id = $_REQUEST['id'];
$menu = Menu::find($id);
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết</h1>
      <div class="row mt-2 align-items-center">
         <div class="col-md-12 text-end">
            <a href="index.php?opt=menu" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
            <a href="index.php?opt=menu&cat=edit&id=<?= $menu->id ?>" class="btn btn-success btn-sm">
               <i class="fa fa-edit"></i> Sửa
            </a>
            <a href="index.php?opt=menu&cat=delete&id=<?= $menu->id ?>" class="btn btn-danger btn-sm">
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
               <td><?= $menu->id ?></td>
            </tr>
            <tr>
               <th>name</th>
               <td><?= $menu->name ?></td>
            </tr>
            <tr>
               <th>link</th>
               <td><?= $menu->link ?></td>
            </tr>
            <tr>
               <th>table_id</th>
               <td><?= $menu->table_id ?></td>
            </tr>
            <tr>
               <th>type</th>
               <td><?= $menu->type ?></td>
            </tr>
            <tr>
               <th>parent_id</th>
               <td><?= $menu->parent_id ?></td>
            </tr>
            <tr>
               <th>sort_order</th>
               <td><?= $menu->sort_order ?></td>
            </tr>
            <tr>
               <th>position</th>
               <td><?= $menu->position ?></td>
            </tr>
            <tr>
               <th>created_at</th>
               <td><?= $menu->created_at ?></td>
            </tr>
            <tr>
               <th>created_by</th>
               <td><?= $menu->created_by  ?></td>
            </tr>
            <tr>
               <th>status</th>
               <td><?= $menu->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></td>
            </tr>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
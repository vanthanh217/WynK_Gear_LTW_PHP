<?php

use App\Models\Post;

$pages = Post::where([['status', '!=', 0], ['type', '=', 'page']])
   ->orderBy('created_at', 'DESC')->get();

$garbage = Post::where([['status', '=', 0], ['type', '=', 'page']])->count();
$public = Post::where([['status', '!=', 0], ['type', '=', 'page']])->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Quản lý trang đơn</h1>
      <a href="index.php?opt=page&cat=create" class="btn-add">Thêm mới</a>
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
                  <a href="index.php?opt=page&cat=trash">
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
                  <input type="checkbox" id="checkboxAll" />
               </th>
               <th class="text-center" style="width:130px;">Hình ảnh</th>
               <th>Tên trang đơn</th>
               <th>slug</th>
               <th class="text-center" style="width:30px;">ID</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($pages as $page) : ?>
               <tr class="datarow">
                  <td>
                     <input type="checkbox" id="checkId" />
                  </td>
                  <td>
                     <img class="img-fluid" src="../public/images/post/<?= $page->image; ?>" alt="<?= $page->image; ?>">
                  </td>
                  <td>
                     <div class="name">
                        <a href="index.php?opt=page&id=<?= $page->id; ?>">
                           <?= $page->title; ?>
                        </a>
                     </div>
                     <div class="function_style">
                        <?php if ($page->status == 1) : ?>
                           <a href="index.php?opt=page&cat=status&id=<?= $page->id; ?>" class="text-success mx-1">
                              <i class="fa fa-toggle-on"></i>
                           </a>
                        <?php else : ?>
                           <a href="index.php?opt=page&cat=status&id=<?= $page->id; ?>" class="text-danger mx-1">
                              <i class="fa fa-toggle-off"></i>
                           </a>
                        <?php endif; ?>
                        <a href="index.php?opt=page&cat=edit&id=<?= $page->id; ?>" class="text-primary mx-1">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a href="index.php?opt=page&cat=show&id=<?= $page->id; ?>" class="text-info mx-1">
                           <i class="fa fa-eye"></i>
                        </a>
                        <a href="index.php?opt=page&cat=delete&id=<?= $page->id; ?>" class="text-danger mx-1">
                           <i class="fa fa-trash"></i>
                        </a>
                     </div>
                  </td>
                  <td>
                     <?= $page->slug; ?>
                  </td>
                  <td class="text-center">
                     <?= $page->id; ?>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
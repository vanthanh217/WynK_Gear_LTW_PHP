<?php

use App\Models\Topic;

$topics = Topic::where('status', '!=', 0)
   ->orderBy('created_at', 'DESC')->get();
$str_sort_order = "";
foreach ($topics as $item) {
   $str_sort_order .= "<option value='" . $item->sort_order + 1 . "'>" . $item->name . "</option>";
}
$garbage = Topic::where('status', '=', 0)->count();
$public = Topic::where('status', '!=', 0)->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chủ đề bài viết</h1>
      <hr style="border: none;" />
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-4">
            <form action="index.php?opt=topic&cat=process" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                  <label><strong>Tên chủ đề (*)</strong></label>
                  <input type="text" name="name" class="form-control" placeholder="Tên chủ để">
               </div>
               <div class="mb-3">
                  <label><strong><strong>Mô tả</strong></strong></label>
                  <textarea name="description" rows="6" class="form-control" placeholder="Mô tả"></textarea>
               </div>
               <div class="mb-3">
                  <label><strong>Sắp xếp</strong></label>
                  <select name="sort_order" class="form-select">
                     <option value="0">None</option>
                     <?= $str_sort_order ?>
                  </select>
               </div>
               <div class="mb-3">
                  <label><strong>Trạng thái</strong></label>
                  <select name="status" class="form-select">
                     <option value="1">Xuất bản</option>
                     <option value="2">Chưa xuất bản</option>
                  </select>
               </div>
               <div class="mb-3 text-end">
                  <button class="btn btn-sm btn-success" type="submit" name="THEM">
                     <i class="fa fa-save"></i> Lưu[Cập nhật]
                  </button>
               </div>
            </form>
         </div>
         <div class="col-md-8">
            <div class="row mt-3 align-items-center">
               <div class="col-12">
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
                        <a href="index.php?opt=topic&cat=trash">
                           Rác ( <?= ($garbage > 0) ? $garbage : '0' ?> )
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="row my-2 align-items-center">
               <div class="col-md-6">
                  <select name="" class="d-inline me-1">
                     <option value="">Hành động</option>
                     <option value="">Bỏ vào thùng rác</option>
                  </select>
                  <button class="btnapply">Áp dụng</button>
               </div>
               <div class="col-md-6 text-end">
                  <input type="text" class="search d-inline" />
                  <button class="d-inline">Tìm kiếm</button>
               </div>
            </div>
            <?php require_once '../views/admin/message.php' ?>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox" id="checkboxAll" />
                     </th>
                     <th>Tên chủ đề</th>
                     <th>Tên slug</th>
                     <th class="text-center" style="width:30px;">ID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($topics as $topic) : ?>
                     <tr class="datarow">
                        <td>
                           <input type="checkbox" id="checkId" />
                        </td>
                        <td>
                           <div class="name">
                              <a href="index.php?opt=topic&cat=edit&id=<?= $topic->id; ?>">
                                 <?= $topic->name; ?>
                              </a>
                           </div>
                           <div class="function_style">
                              <?php if ($topic->status == 1) : ?>
                                 <a href="index.php?opt=topic&cat=status&id=<?= $topic->id; ?>" class="text-success mx-1">
                                    <i class="fa fa-toggle-on"></i>
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?opt=topic&cat=status&id=<?= $topic->id; ?>" class="text-danger mx-1">
                                    <i class="fa fa-toggle-off"></i>
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?opt=topic&cat=edit&id=<?= $topic->id; ?>" class="text-primary mx-1">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <a href="index.php?opt=topic&cat=show&id=<?= $topic->id; ?>" class="text-info mx-1">
                                 <i class="fa fa-eye"></i>
                              </a>
                              <a href="index.php?opt=topic&cat=delete&id=<?= $topic->id; ?>" class="text-danger mx-1">
                                 <i class="fa fa-trash"></i>
                              </a>
                           </div>
                        </td>
                        <td>
                           <?= $topic->slug; ?>
                        </td>
                        <td class="text-center">
                           <?= $topic->id; ?>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
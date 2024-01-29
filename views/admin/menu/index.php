<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;

$brands = Brand::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$categories = Category::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$topics = Topic::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$pages = Post::where([['status', '!=', 0], ['type', '=', 'page']])->orderBy('created_at', 'DESC')->get();

$menus = Menu::where('status', '!=', 0)
   ->get();
$garbage = Menu::where('status', '=', 0)->count();
$public = Menu::where('status', '!=', 0)->count();
$all = $garbage + $public;
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Quản lý menu</h1>
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
                  <a href="index.php?opt=menu&cat=trash">
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
   </section>
   <section class="content-body my-2">
      <div class="row">
         <div class="col-md-3">
            <form action="index.php?opt=menu&cat=process" method="post" enctype="multipart/form-data">
               <ul class="list-group">
                  <li class="list-group-item mb-2">
                     <select name="position" class="form-select">
                        <option value="mainmenu">Main Menu</option>
                        <option value="sidebar-menu">Sidebar Menu</option>
                        <option value="footermenu">Footer Menu</option>
                     </select>
                  </li>
                  <li class="list-group-item mb-2 border">
                     <a class="d-block" href="#multiCollapseCategory" data-bs-toggle="collapse">
                        Danh mục sản phẩm
                     </a>
                     <div class="collapse multi-collapse border-top mt-2" id="multiCollapseCategory">
                        <?php foreach ($categories as $category) : ?>
                           <div class="form-check">
                              <input name="categoryid[]" class="form-check-input" type="checkbox" value="<?= $category->id ?>" id="category<?= $category->id ?>" />
                              <label class="form-check-label" for="category<?= $category->id ?>">
                                 <?= $category->name ?>
                              </label>
                           </div>
                        <?php endforeach; ?>
                        <div class="my-3">
                           <button name="ADDCATEGORY" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                        </div>
                     </div>
                  </li>
                  <li class="list-group-item mb-2 border">
                     <a class="d-block" href="#multiCollapseBrand" data-bs-toggle="collapse">
                        Thương hiệu
                     </a>
                     <div class="collapse multi-collapse border-top mt-2" id="multiCollapseBrand">
                        <?php foreach ($brands as $brand) : ?>
                           <div class="form-check">
                              <input name="brandid[]" class="form-check-input" type="checkbox" value="<?= $brand->id ?>" id="brand<?= $brand->id ?>" />
                              <label class="form-check-label" for="brand<?= $brand->id ?>">
                                 <?= $brand->name ?>
                              </label>
                           </div>
                        <?php endforeach; ?>
                        <div class="my-3">
                           <button name="ADDBRAND" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                        </div>
                     </div>
                  </li>
                  <li class="list-group-item mb-2 border">
                     <a class="d-block" href="#multiCollapseTopic" data-bs-toggle="collapse">
                        Chủ đề bài viết
                     </a>
                     <div class="collapse multi-collapse border-top mt-2" id="multiCollapseTopic">
                        <?php foreach ($topics as $topic) : ?>
                           <div class="form-check">
                              <input name="topicid[]" class="form-check-input" type="checkbox" value="<?= $topic->id ?>" id="topic<?= $topic->id ?>" />
                              <label class="form-check-label" for="topic<?= $topic->id ?>">
                                 <?= $topic->name ?>
                              </label>
                           </div>
                        <?php endforeach; ?>
                        <div class="my-3">
                           <button name="ADDTOPIC" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                        </div>
                     </div>
                  </li>
                  <li class="list-group-item mb-2 border">
                     <a class="d-block" href="#multiCollapsePage" data-bs-toggle="collapse">
                        Trang đơn
                     </a>
                     <div class="collapse multi-collapse border-top mt-2" id="multiCollapsePage">
                        <?php foreach ($pages as $page) : ?>
                           <div class="form-check">
                              <input name="pageid[]" class="form-check-input" type="checkbox" value="<?= $page->id ?>" id="page<?= $page->id ?>" />
                              <label class="form-check-label" for="page<?= $page->id ?>">
                                 <?= $page->title ?>
                              </label>
                           </div>
                        <?php endforeach; ?>
                        <div class="my-3">
                           <button name="ADDPAGE" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                        </div>
                     </div>
                  </li>
                  <li class="list-group-item mb-2 border">
                     <a class="d-block" href="#multiCollapseCustom" data-bs-toggle="collapse">
                        Tùy biến liên kết
                     </a>
                     <div class="collapse multi-collapse border-top mt-2" id="multiCollapseCustom">
                        <div class="mb-3">
                           <label>Tên menu</label>
                           <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                           <label>Liên kết</label>
                           <input type="text" name="link" class="form-control" />
                        </div>
                        <div class="my-3">
                           <button name="ADDCUSTOM" type="submit" class="btn btn-sm btn-success form-control">Thêm</button>
                        </div>
                     </div>
                  </li>
               </ul>
            </form>
         </div>
         <div class="col-md-9">
            <div class="row mt-1 align-items-center">
               <div class="col-md-8">
                  <select name="" class="d-inline me-1">
                     <option value="">Hành động</option>
                     <option value="">Bỏ vào thùng rác</option>
                  </select>
                  <button class="btnapply">Áp dụng</button>
               </div>
               <div class="col-md-4 text-end">
                  <div class="pagination justify-content-end">
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
                  </div>
               </div>
            </div>
            <?php require_once '../views/admin/message.php' ?>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox" id="checkboxAll" />
                     </th>
                     <th>Tên menu</th>
                     <th>Liên kết</th>
                     <th>Loại</th>
                     <th>Vị trí</th>
                     <th class="text-center" style="width:30px;">ID</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($menus as $menu) : ?>
                     <tr class="datarow">
                        <td class="text-center">
                           <input type="checkbox" id="checkId" />
                        </td>
                        <td>
                           <div class="name">
                              <?= $menu->name; ?>
                           </div>
                           <div class="function_style">
                              <?php if ($menu->status == 1) : ?>
                                 <a href="index.php?opt=menu&cat=status&id=<?= $menu->id; ?>" class="text-success mx-1">
                                    <i class="fa fa-toggle-on"></i>
                                 </a>
                              <?php else : ?>
                                 <a href="index.php?opt=menu&cat=status&id=<?= $menu->id; ?>" class="text-danger mx-1">
                                    <i class="fa fa-toggle-off"></i>
                                 </a>
                              <?php endif; ?>
                              <a href="index.php?opt=menu&cat=edit&id=<?= $menu->id; ?>" class="text-primary mx-1">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <a href="index.php?opt=menu&cat=show&id=<?= $menu->id; ?>" class="text-info mx-1">
                                 <i class="fa fa-eye"></i>
                              </a>
                              <a href="index.php?opt=menu&cat=delete&id=<?= $menu->id; ?>" class="text-danger mx-1">
                                 <i class="fa fa-trash"></i>
                              </a>
                           </div>
                        </td>
                        <td>
                           <?= $menu->link; ?>
                        </td>
                        <td>
                           <?= $menu->type; ?>
                        </td>
                        <td>
                           <?= $menu->position; ?>
                        </td>
                        <td class="text-center">
                           <?= $menu->id; ?>
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
<?php

use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;

$id = $_REQUEST['id'];
$order = Order::find($id);
$order_detail = Orderdetail::where('order_id', '=', $order->id)->first();
$product = Product::where('id', '=', $order_detail->product_id)->first();
?>

<?php require_once "../views/admin/header.php" ?>
<!--CONTENT  -->
<div class="content">
   <section class="content-header my-2">
      <h1 class="d-inline">Chi tiết đơn hàng</h1>
      <div class="mt-1 text-end">
         <a class="btn btn-sm btn-primary" href="index.php?opt=order">
            <i class="fa fa-arrow-left"></i> Về danh sách
         </a>
      </div>
   </section>
   <section class="content-body my-2">

      <h3>Thông tin khách hàng</h3>
      <div class="row">
         <div class="col-md">
            <label><strong>Họ tên (*)</strong></label>
            <input type="text" name="name" value="<?= $order->name ?>" class="form-control" readonly />
         </div>
         <div class="col-md">
            <label><strong>Email (*)</strong></label>
            <input type="text" name="email" value="<?= $order->email ?>" class="form-control" readonly />
         </div>
         <div class="col-md">
            <label><strong>Điện thoại (*)</strong></label>
            <input type="text" name="phone" value="<?= $order->phone ?>" class="form-control" readonly />
         </div>
         <div class="col-md-5">
            <label><strong>Địa chỉ (*)</strong></label>
            <input type="text" name="address" value="<?= $order->address ?>" class="form-control" readonly />
         </div>
      </div>
      <h3>Chi tiết giỏ hàng</h3>
      <div class="row my-2">
         <div class="col-3">
            Tổng tiền: <strong><?= number_format($order_detail->amount) ?>đ</strong>
         </div>
         <div class="col-3">
            Ngày đặt: <strong><?= $order->created_at ?></strong>
         </div>
         <div class="col-3">
            Trạng thái: <strong><?= $order->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' ?></strong>
         </div>
      </div>
      <div class="row my-3">
         <div class="col-12">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th class="text-center" style="width:90px;">Hình ảnh</th>
                     <th>Tên sản phẩm</th>
                     <th style="width:160px;" class="text-center">Giá</th>
                     <th style="width:90px;" class="text-center">Số lượng</th>
                     <th style="width:160px;" class="text-center">Thành tiền</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <img class="img-fluid" src="../public/images/product/<?= $product->image ?>" alt="<?= $product->image ?>" />
                     </td>
                     <td>
                        <?= $product->name ?>
                     </td>
                     <td class="text-right">
                        <?= number_format($product->price) ?>đ
                     </td>
                     <td class="text-center">
                        <?= $order_detail->qty ?>
                     </td>
                     <td class="text-right">
                        <?= number_format($order_detail->amount) ?>đ
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>

   </section>
</div>
<!--END CONTENT-->
<?php require_once "../views/admin/footer.php" ?>
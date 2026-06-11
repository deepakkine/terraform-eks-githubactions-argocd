<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Your Cart</h3>

<form method="post" action="/cart/update">

    <?php
    $totalItems = 0;

    foreach ($cart as $item) {
        $totalItems += $item['qty'];
    }
    ?>

    <h5>Total Items: <?= $totalItems ?></h5>
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        <?php $grandTotal = 0; ?>

        <?php foreach ($cart as $item):
            $price = $item['price'];
            $discount = $item['discount'];

            $finalPrice = $price;

            if ($discount > 0) {
                $finalPrice = $price - ($price * $discount / 100);
            }

            $total = $finalPrice * $item['qty'];
            $grandTotal += $total;
        ?>

            <tr>
                <td><img src="/uploads/products/<?= $item['variant_image'] ?? 'default.png' ?>" width="60"></td>
                <td>
                    <?= $item['name'] ?><br>
                    <small><?= $item['color'] ?> / <?= $item['size'] ?></small>
                </td>
                <td>
                    <?php if ($item['discount'] > 0): ?>
                        <span style="text-decoration: line-through; color: gray;">
                            ₹<?= $item['price'] ?>
                        </span><br>
                        <strong>₹<?= $finalPrice ?></strong>
                        <small class="text-success">(<?= $item['discount'] ?>% OFF)</small>
                    <?php else: ?>
                        ₹<?= $item['price'] ?>
                    <?php endif; ?>
                </td>

                <td>
                    <input type="number" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>">
                </td>

                <td>₹<?= $total ?></td>

                <td>
                    <a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-danger btn-sm">
                        Remove
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

    <hr>
    <?php
    $couponDiscount = 0;

    if (session()->get('coupon')) {
        $couponDiscount = session()->get('coupon')['discount'];
    }

    $finalTotal = $grandTotal - $couponDiscount;
    ?>

    <h5>Subtotal: ₹<?= $grandTotal ?></h5>

    <?php if ($couponDiscount > 0): ?>
        <h5 class="text-success">Coupon Discount: -₹<?= $couponDiscount ?></h5>
    <?php endif; ?>

    <h4>Total: ₹<?= $finalTotal ?></h4>

    <a href="/checkout" class="btn btn-success">
        Proceed to Checkout
    </a>

    <button class="btn btn-primary">Update Cart</button>

</form>


<form method="post" action="/cart/apply-coupon" class="d-flex gap-2">
    <input type="text" name="coupon" class="form-control" placeholder="Enter coupon code">
    <button class="btn btn-dark">Apply</button>
</form>

<?php if (session()->get('coupon')): ?>
    <div class="alert alert-success">
        🎉 Coupon <strong><?= session()->get('coupon')['code'] ?></strong> applied!
        You saved ₹<?= session()->get('coupon')['discount'] ?>
        <a href="/cart/remove-coupon" class="ms-2 text-danger">Remove</a>
    </div>
<?php endif; ?>



<?= $this->endSection() ?>
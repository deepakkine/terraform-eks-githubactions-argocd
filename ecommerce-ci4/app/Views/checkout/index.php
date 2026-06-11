<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Checkout</h3>

<form method="post" action="/checkout/place">

    <h5>Shipping Address</h5>

    <input name="name" placeholder="Full Name" class="form-control mb-2" required>
    <input name="phone" placeholder="Phone" class="form-control mb-2" required>
    <textarea name="address" placeholder="Address" class="form-control mb-2" required></textarea>
    <input name="city" placeholder="City" class="form-control mb-2" required>
    <input name="state" placeholder="State" class="form-control mb-2" required>
    <input name="pincode" placeholder="Pincode" class="form-control mb-3" required>

    <h5>Order Summary</h5>

    <table class="table">
        <?php
        $total = 0;
        foreach ($cart as $item):

            $price = $item['price'];
            $discount = $item['discount'];

            $final = $price;

            if ($discount > 0) {
                $final = $price - ($price * $discount / 100);
            }

            $t = $final * $item['qty'];
            $total += $t;
        ?>
            <tr>
                <td><?= $item['name'] ?> (<?= $item['color'] ?>/<?= $item['size'] ?>)</td>
                <td><?= $item['qty'] ?></td>
                <td>₹<?= $t ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    $coupon = session()->get('coupon');
    $couponDiscount = $coupon['discount'] ?? 0;

    $finalTotal = $total - $couponDiscount;
    ?>

    <h4>Subtotal: ₹<?= $total ?></h4>

    <?php if ($couponDiscount > 0): ?>
        <h5 class="text-success">Coupon Discount: -₹<?= $couponDiscount ?></h5>
    <?php endif; ?>

    <h3>Total Payable: ₹<?= max(0, $finalTotal) ?></h3>
    <!-- <h4>Total: ₹<?= $total ?></h4> -->

    <button class="btn btn-success">Place Order</button>

</form>

<?= $this->endSection() ?>
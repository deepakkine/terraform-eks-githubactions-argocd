<!-- for sponosred and featured  -->
<a href="/product/<?= $p['slug'] ?>" class="ecom-card">

    <img src="/uploads/products/<?= $p['variant_image'] ?? $p['image'] ?>">

    <div class="ecom-body">

        <div class="ecom-name">
            <?= $p['name'] ?>
        </div>

        <div class="product-price">

            <span class="sale-price">
                ₹<?= number_format($p['final_price']) ?>
            </span>

            <?php if (!empty($p['discount']) && $p['discount'] > 0): ?>

                <span class="old-price">
                    ₹<?= number_format($p['mrp']) ?>
                </span>

            <?php endif; ?>

        </div>

    </div>

</a>
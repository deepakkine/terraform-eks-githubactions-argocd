<style>
    /* FIX CARD HEIGHT */
    .product-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* IMAGE FIX */
    .product-img-wrapper {
        height: 240px;
        overflow: hidden;
        background: #f6f6f6;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* TITLE FIX (same height) */
    .product-title {
        font-size: 14px;
        min-height: 38px;
    }

    /* WISHLIST BUTTON (PREMIUM) */
    .wishlist-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        border: none;
        background: #fff;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        z-index: 2;
        transition: 0.3s;
    }

    .wishlist-btn i {
        font-size: 18px;
        color: #777;
        transition: all 0.3s ease;
    }

    /* PREMIUM ACTIVE STATE */
    .wishlist-btn.active {
        background: #fff;
    }

    .wishlist-btn.active i {
        color: #ff3f6c;
        transform: scale(1.08);
    }
</style>
<div class="row g-3">

    <?php if (empty($products)): ?>
        <div class="text-center p-5">
            <h5>No products found</h5>
            <p class="text-muted">Try changing filters</p>
        </div>
    <?php endif; ?>

    <?php foreach ($products as $p): ?>

        <div class="col-6 col-md-4 col-lg-3 mb-4">

            <div class="product-card position-relative h-100">

                <!-- 🔥 WISHLIST ICON -->
                <button class="wishlist-btn"
                    data-id="<?= $p['id'] ?>"
                    onclick="toggleWishlist(<?= $p['id'] ?>, this)">

                    <i class="bi bi-heart-fill"></i>

                </button>

                <a href="/product/<?= $p['id'] ?>" class="text-decoration-none text-dark">

                    <div class="product-img-wrapper">
                        <img src="/uploads/products/<?= $p['image'] ?>">
                    </div>

                    <div class="p-3 d-flex flex-column">

                        <h6 class="mb-2 product-title">
                            <?= $p['name'] ?>
                        </h6>

                        <div class="mt-auto">

                            <span class="price">₹<?= $p['final_price'] ?></span>

                            <?php if ($p['discount'] > 0): ?>
                                <span class="old-price ms-1">₹<?= $p['mrp'] ?></span>
                                <span class="discount ms-1"><?= $p['discount'] ?>% off</span>
                            <?php endif; ?>

                        </div>

                    </div>

                </a>

            </div>

        </div>

    <?php endforeach; ?>

</div>
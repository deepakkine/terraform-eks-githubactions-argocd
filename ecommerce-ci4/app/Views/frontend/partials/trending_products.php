<style>
    /* =========================================
       TRENDING SECTION
    ========================================= */

    .trending-section {
        padding: 20px 0 60px;
    }

    .trending-header {
        margin-bottom: 28px;
    }

    .trending-header h3 {
        font-size: 32px;
        font-weight: 800;
        color: #111;
        margin-bottom: 8px;
    }

    .trending-header p {
        color: #777;
        margin: 0;
        font-size: 15px;
    }

    /* =========================================
       PRODUCT CARD
    ========================================= */

    .product-card {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        transition: all .3s ease;
        border: 1px solid #f0f0f0;

        height: 100%;

        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.10);
    }

    /* =========================================
       IMAGE
    ========================================= */

    .product-img-wrapper {
        position: relative;
        height: 300px;
        overflow: hidden;
        background: #f8f8f8;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .6s ease;
    }

    .product-card:hover img {
        transform: scale(1.06);
    }

    /* =========================================
       DISCOUNT BADGE
    ========================================= */

    .discount-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        background: #dc2626;
        color: #fff;
        padding: 6px 10px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        z-index: 5;
    }

    /* =========================================
       ACTION BUTTONS
    ========================================= */

    .wishlist-btn,
    .share-btn {
        position: absolute;
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.96);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        z-index: 5;
        transition: .3s ease;
        text-decoration: none;
    }

    .wishlist-btn:hover,
    .share-btn:hover {
        transform: scale(1.08);
    }

    .wishlist-btn {
        top: 14px;
        right: 14px;
    }

    .share-btn {
        bottom: 14px;
        right: 14px;
    }

    .wishlist-btn i,
    .share-btn i {
        color: #111;
        font-size: 16px;
    }

    /* =========================================
       BODY
    ========================================= */

    .product-body {
        padding: 18px;
        display: flex;
        flex-direction: column;
        height: calc(100% - 300px);
    }

    /* =========================================
       PRODUCT TITLE
    ========================================= */

    .product-title {
        min-height: 52px;
        margin-bottom: 10px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    .product-title a {
        text-decoration: none;
        color: #111;
        font-size: 16px;
        font-weight: 700;
        line-height: 1.5;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    .product-title a:hover {
        color: #000;
    }

    /* =========================================
       RATING
    ========================================= */

    .rating-box {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f7f7f7;
        border-radius: 30px;
        padding: 5px 10px;
        width: fit-content;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .rating-box i {
        color: #f59e0b;
    }

    /* =========================================
       DESCRIPTION
    ========================================= */

    .product-desc {
        font-size: 14px;
        color: #777;
        line-height: 1.6;
        margin-bottom: 14px;

        min-height: 46px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;

        overflow: hidden;
    }

    /* =========================================
       PRICE SECTION
    ========================================= */

    .price-section {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 12px;
    }

    .final-price {
        font-size: 24px;
        font-weight: 800;
        color: #111;
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
        font-size: 15px;
    }

    .offer-text {
        color: #16a34a;
        font-size: 14px;
        font-weight: 700;
    }

    /* =========================================
       DELIVERY
    ========================================= */

    .delivery-text {
        color: #16a34a;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .stock-text {
        color: #dc2626;
        font-size: 13px;
        margin-bottom: 16px;
    }

    /* =========================================
       BUTTON
    ========================================= */

    .cart-btn {
        width: 100%;
        border: none;
        border-radius: 50px;
        padding: 12px;
        background: #111;
        color: #fff;
        font-weight: 600;
        transition: .3s ease;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .cart-btn:hover {
        background: #000;
        transform: translateY(-2px);
        color: #fff;
    }

    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 992px) {

        .product-img-wrapper {
            height: 260px;
        }

    }

    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 768px) {

        .trending-section {
            padding: 10px 0 40px;
        }

        .trending-header {
            margin-bottom: 20px;
        }

        .trending-header h3 {
            font-size: 24px;
        }

        .trending-header p {
            font-size: 13px;
        }

        .product-img-wrapper {
            height: 220px;
        }

        .product-body {
            height: auto;
            padding: 14px;
        }

        .product-card {
            border-radius: 16px;
        }

        .row {
            --bs-gutter-x: 14px;
        }

        .product-img-wrapper {
            border-bottom: 1px solid #f3f3f3;
        }


        .product-title a {
            font-size: 14px;
        }

        .final-price {
            font-size: 20px;
        }

        .wishlist-btn,
        .share-btn {
            width: 34px;
            height: 34px;
        }

        .wishlist-btn i,
        .share-btn i {
            font-size: 14px;
        }

        .cart-btn {
            padding: 10px;
            font-size: 14px;
        }

    }
</style>

<section class="trending-section">

    <!-- HEADER -->
    <div class="trending-header">

        <h3>Trending Products</h3>

        <p>
            Discover premium products loved by customers
        </p>

    </div>

    <!-- PRODUCT GRID -->
    <div class="row">

        <?php foreach ($products as $p): ?>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 d-flex mb-4">

                <div class="card product-card w-100">

                    <!-- IMAGE -->
                    <div class="product-img-wrapper">

                        <a href="/product/<?= $p['slug'] ?>">

                            <img src="/uploads/products/<?= $p['variant_image'] ?>"
                                alt="<?= $p['name'] ?>">

                        </a>



                        <!-- WISHLIST -->
                        <button class="wishlist-btn"
                            data-id="<?= $p['id'] ?>"
                            onclick="toggleWishlist(this, <?= $p['id'] ?>)">

                            <i class="bi bi-heart"></i>

                        </button>

                        <!-- SHARE -->
                        <a href="https://wa.me/?text=<?= urlencode($p['name'] . ' - ' . base_url('/product/' . $p['slug'])) ?>"
                            target="_blank"
                            class="share-btn">

                            <i class="bi bi-share"></i>

                        </a>

                    </div>

                    <!-- BODY -->
                    <div class="product-body">

                        <!-- TITLE -->
                        <h6 class="product-title">

                            <a href="/product/<?= $p['slug'] ?>">

                                <?= $p['name'] ?>

                            </a>

                        </h6>

                        <!-- RATING -->
                        <div class="rating-box">

                            <i class="bi bi-star-fill"></i>

                            <span>4.2 Rating</span>

                        </div>

                        <!-- DESCRIPTION -->
                        <p class="product-desc">

                            <?= substr(strip_tags($p['description']), 0, 55) ?>...

                        </p>

                        <div class="mt-auto">

                            <!-- PRICE -->
                            <div class="price-section">

                                <span class="final-price">

                                    ₹<?= number_format($p['final_price']) ?>

                                </span>

                                <?php if ($p['discount'] > 0): ?>

                                    <span class="old-price">

                                        ₹<?= number_format($p['mrp']) ?>

                                    </span>

                                    <span class="offer-text">

                                        <?= $p['discount'] ?>% OFF

                                    </span>

                                <?php endif; ?>

                            </div>

                            <!-- DELIVERY -->
                            <p class="delivery-text">

                                Free Delivery

                            </p>

                            <!-- STOCK -->
                            <p class="stock-text">

                                Only few left!

                            </p>

                            <!-- BUTTON -->
                            <?php if (!empty($p['default_variant'])): ?>

                                <a href="/cart/add/<?= $p['default_variant']['id'] ?>"
                                    class="cart-btn">

                                    Add to Cart

                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</section>

<script>
    document.querySelectorAll('.product-card').forEach(card => {

        card.addEventListener('mouseenter', () => {

            card.style.transition = "0.3s ease";

        });

    });
</script>
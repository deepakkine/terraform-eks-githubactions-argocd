<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<style>
    /* GLOBAL PREMIUM */
    body {
        background: #f8f9fb;
        font-family: 'Inter', sans-serif;
    }

    /* SECTION SPACING */
    .section {
        margin-bottom: 60px;
    }

    /* ===== HERO CAROUSEL ===== */
    .carousel-image {
        height: 520px;
        border-radius: 18px;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }

    .carousel-image::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.6), transparent);
    }

    .carousel-overlay {
        position: absolute;
        top: 50%;
        left: 60px;
        transform: translateY(-50%);
        color: white;
        z-index: 2;
    }

    .carousel-overlay h2 {
        font-size: 44px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .carousel-overlay p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .carousel-overlay .btn {
        padding: 10px 22px;
        border-radius: 30px;
    }

    /* ===== CATEGORY ===== */
    .category-card {
        position: relative;
        height: 220px;
        border-radius: 16px;
        overflow: hidden;
    }

    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }

    .category-card:hover img {
        transform: scale(1.1);
    }

    .category-overlay {
        position: absolute;
        bottom: 0;
        width: 100%;
        padding: 15px;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        color: #fff;
    }

    .category-overlay h5 {
        font-weight: 600;
    }

    /* ===== PRODUCT CARD PREMIUM ===== */
    .product-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: 0.3s;
        background: #fff;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .product-img-wrapper {
        height: 260px;
        overflow: hidden;
        position: relative;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s;
    }

    .product-card:hover img {
        transform: scale(1.08);
    }

    /* wishlist + share */
    .wishlist-btn,
    .share-btn {
        position: absolute;
        background: white;
        border-radius: 50%;
        padding: 8px;
        border: none;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .wishlist-btn {
        top: 12px;
        right: 12px;
    }

    .share-btn {
        bottom: 12px;
        right: 12px;
    }

    /* TEXT */
    .product-title {
        font-size: 15px;
        font-weight: 600;
        min-height: 40px;
    }

    .product-desc {
        font-size: 13px;
        color: #777;
    }

    /* PRICE */
    .price-section {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .carousel-image {
            height: 380px;
        }

        .carousel-overlay {
            left: 20px;
        }

        .carousel-overlay h2 {
            font-size: 28px;
        }
    }
</style>





<!-- 🔥 FILTER SECTION -->
<form method="get" class="d-flex mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search products...">
    <button class="btn btn-dark">Search</button>
</form>

<div class="card mb-4 shadow-sm">
    <div class="card-body">

        <form method="get" class="row g-3">

            <!-- Category -->
            <h3 class="fw-bold mb-4">Shop by Category</h3>
            <p class="text-muted mb-4">Explore top collections curated for you</p>

            <div class="row g-4">

                <?php foreach ($categories as $c): ?>
                    <?php if ($c['parent_id'] == null): ?>

                        <div class="col-lg-3 col-md-4 col-6 mb-4">

                            <a href="/category/<?= $c['slug'] ?>" class="text-decoration-none">

                                <div class="category-card">

                                    <img src="/uploads/categories/<?= $c['image'] ?? 'default.jpg' ?>" />

                                    <div class="category-overlay">
                                        <h5><?= $c['name'] ?></h5>
                                    </div>

                                </div>

                            </a>

                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>

            </div>



        </form>

    </div>
</div>

<!-- 🔥 PRODUCT GRID -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Trending Products</h3>
    <!-- <a href="/products" class="text-dark fw-semibold">View All →</a> -->
</div>

<div class="row">

    <?php foreach ($products as $p): ?>

        <div class="col-lg-3 col-md-4 col-sm-6 d-flex">

            <div class="card product-card w-100">

                <!-- IMAGE -->
                <div class="product-img-wrapper">

                    <a href="/product/<?= $p['slug'] ?>">
                        <img src="/uploads/products/<?= $p['variant_image'] ?>">
                    </a>

                    <?php if ($p['discount'] > 0): ?>
                        <span class="badge bg-danger position-absolute m-2">
                            <?= $p['discount'] ?>% OFF
                        </span>
                    <?php endif; ?>

                    <!-- ❤️ Wishlist -->
                    <button class="wishlist-btn"
                        data-id="<?= $p['id'] ?>"
                        onclick="toggleWishlist(this, <?= $p['id'] ?>)">
                        <i class="bi bi-heart"></i>
                    </button>
                    <!-- 🔗 Share -->
                    <a href="https://wa.me/?text=<?= urlencode($p['name'] . ' - ' . base_url('/product/' . $p['id'])) ?>"
                        target="_blank"
                        class="share-btn">
                        <i class="bi bi-share"></i>
                    </a>

                </div>

                <!-- CONTENT -->
                <div class="card-body d-flex flex-column">

                    <h6 class="product-title">
                        <a href="/product/<?= $p['slug'] ?>" class="text-dark text-decoration-none">
                            <?= $p['name'] ?>
                        </a>
                    </h6>

                    <div class="text-warning small mb-1">
                        ★★★★☆ <span class="text-muted">(4.2)</span>
                    </div>

                    <p class="product-desc">
                        <?= substr($p['description'], 0, 45) ?>
                    </p>

                    <div class="mt-auto">

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <?php if (!empty($p['default_variant'])): ?>
                                <div class="price-section">

                                    <span class="fw-bold fs-5 text-dark">
                                        ₹<?= number_format($p['final_price']) ?>
                                    </span>

                                    <?php if ($p['discount'] > 0): ?>
                                        <span class="text-muted text-decoration-line-through ms-2">
                                            ₹<?= number_format($p['mrp']) ?>
                                        </span>

                                        <span class="text-success ms-2 fw-semibold">
                                            <?= $p['discount'] ?>% OFF
                                        </span>
                                    <?php endif; ?>

                                </div>
                            <?php else: ?>
                                <span class="price">₹<?= $p['price'] ?></span>
                            <?php endif; ?>
                        </div>

                        <p class="text-success small mb-1">
                            Free Delivery
                        </p>

                        <p class="text-danger small">
                            Only few left!
                        </p>

                        <?php if (!empty($p['default_variant'])): ?>
                            <a href="/cart/add/<?= $p['default_variant']['id'] ?>"
                                class="btn btn-dark w-100 rounded-pill">
                                Add to Cart
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<script>
    function updateBannerImages() {
        document.querySelectorAll('.carousel-image').forEach(el => {
            let mobile = el.getAttribute('data-mobile');

            if (window.innerWidth < 768) {
                el.style.backgroundImage = `url(${mobile})`;
            }
        });
    }

    updateBannerImages();
    window.addEventListener('resize', updateBannerImages);
</script>


<script>
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transition = "0.3s ease";
        });
    });
</script>
<?= $this->endSection() ?>
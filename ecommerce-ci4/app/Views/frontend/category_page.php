<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<style>
    /* 🔥 PREMIUM CATEGORY UI */

    body {
        background: #f8f9fb;
    }

    /* Sidebar */
    .filter-card {
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 80px;
    }

    /* Category chips */
    .category-chip {
        border-radius: 50px;
        padding: 6px 14px;
        font-size: 13px;
        border: 1px solid #ddd;
        transition: 0.3s;
    }

    .category-chip:hover {
        background: #000;
        color: #fff;
    }

    /* Product Card */
    .product-card {
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    /* Image */
    .product-img-wrapper {
        height: 240px;
        overflow: hidden;
        background: #f6f6f6;
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

    /* Price */
    .price {
        font-weight: 600;
        font-size: 16px;
    }

    .old-price {
        text-decoration: line-through;
        color: #888;
        font-size: 13px;
    }

    .discount {
        color: green;
        font-size: 13px;
        font-weight: 600;
    }

    /* Filter labels */
    .filter-label {
        font-size: 13px;
        border: 1px solid #ddd;
        padding: 5px 10px;
        border-radius: 20px;
        cursor: pointer;
    }

    .filter-label input {
        margin-right: 5px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .filter-card {
            position: static;
        }
    }

    /* 🔥 FIX EQUAL HEIGHT */
    .product-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* IMAGE FIX (uniform ratio) */
    .product-img-wrapper {
        height: 220px;
        background: #f6f6f6;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-img-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        /* 🔥 important fix */
    }

    /* TITLE FIX */
    .product-title {
        font-size: 14px;
        height: 38px;
        overflow: hidden;
    }

    /* WISHLIST BUTTON */
    .wishlist-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        border: none;
        background: white;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    .wishlist-btn.active {
        color: red;
    }

    /* ADD TO CART HOVER EFFECT */
    .add-cart-btn {
        opacity: 0;
        transform: translateY(10px);
        transition: 0.3s;
    }

    .product-card:hover .add-cart-btn {
        opacity: 1;
        transform: translateY(0);
    }

    /* MOBILE FIX */
    @media (max-width: 768px) {
        .add-cart-btn {
            opacity: 1;
            transform: none;
        }
    }
</style>

<div class="container-fluid">

    <div class="row">

        <h5 class="mb-3 fw-bold">Explore Categories</h5>

        <div class="d-flex flex-wrap gap-2 mb-4">
            <?php foreach ($subCategories as $sub): ?>
                <a href="/category/<?= $sub['slug'] ?>"
                    class="category-chip text-decoration-none">
                    <?= $sub['name'] ?>
                </a>
            <?php endforeach; ?>
        </div>

        <hr>


        <!-- 🔥 LEFT SIDEBAR -->
        <div class="col-md-3">

            <!-- Mobile Filter Button -->
            <button class="btn btn-dark w-100 d-md-none mb-3" data-bs-toggle="collapse" data-bs-target="#mobileFilter">
                Filters
            </button>

            <div class="collapse d-md-block" id="mobileFilter">

                <form method="get" id="filterForm">

                    <div class="filter-card p-3 mb-3">

                        <h5 class="fw-bold mb-3">Filters</h5>

                        <!-- PRICE -->
                        <h6 class="fw-semibold">Price</h6>
                        <div class="d-flex gap-2 mb-3">
                            <input type="number" name="min_price" class="form-control form-control-sm"
                                placeholder="Min" value="<?= $minPrice ?? '' ?>">

                            <input type="number" name="max_price" class="form-control form-control-sm"
                                placeholder="Max" value="<?= $maxPrice ?? '' ?>">
                        </div>

                        <hr>

                        <!-- COLOR -->
                        <h6 class="fw-semibold">Color</h6>
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <?php foreach ($colors as $c): ?>
                                <label class="filter-label">
                                    <input type="checkbox"
                                        name="color[]"
                                        value="<?= $c['color'] ?>"
                                        <?= in_array($c['color'], $selectedColors) ? 'checked' : '' ?>>
                                    <?= ucfirst($c['color']) ?>
                                </label>
                            <?php endforeach; ?>
                        </div>

                        <hr>

                        <!-- SIZE -->
                        <h6 class="fw-semibold">Size</h6>
                        <?php foreach ($sizes as $s): ?>
                            <label class="filter-label d-block mb-1">
                                <input type="checkbox"
                                    name="size[]"
                                    value="<?= $s['size'] ?>"
                                    <?= in_array($s['size'], $selectedSizes) ? 'checked' : '' ?>>
                                <?= $s['size'] ?>
                            </label>
                        <?php endforeach; ?>

                        <button class="btn btn-dark w-100 mt-3">Apply</button>

                        <a href="/category/<?= $category['slug'] ?>"
                            class="btn btn-outline-secondary w-100 mt-2">
                            Clear Filters
                        </a>

                    </div>

                </form>

            </div>

        </div>

        <!-- 🔥 RIGHT PRODUCTS -->
        <div class="col-md-9">

            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <h4 class="fw-bold mb-0"><?= $category['name'] ?></h4>
                    <small class="text-muted">
                        <?= count($products) ?> Products
                    </small>
                </div>
            </div>

            <p class="text-muted">
                <?= $category['description'] ?? 'Explore our latest products in this category' ?>
            </p>

            <form method="get" id="sortForm" class="mb-3">

                <?php foreach ($_GET as $key => $value): ?>
                    <?php if ($key != 'sort'): ?>
                        <?php if (is_array($value)): ?>
                            <?php foreach ($value as $v): ?>
                                <input type="hidden" name="<?= $key ?>[]" value="<?= $v ?>">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <select name="sort" class="form-select w-auto">
                    <option value="">Sort By</option>
                    <option value="price_low" <?= ($_GET['sort'] ?? '') == 'price_low' ? 'selected' : '' ?>>
                        Price Low → High
                    </option>
                    <option value="price_high" <?= ($_GET['sort'] ?? '') == 'price_high' ? 'selected' : '' ?>>
                        Price High → Low
                    </option>
                </select>

            </form>

            <div id="product-list">
                <?= view('frontend/partials/product_list', ['products' => $products]) ?>
            </div>

        </div>



    </div> <!-- row -->

</div> <!-- container-fluid -->

<?= $this->endSection() ?>

<script>
    function applyFilters() {

        let form = document.querySelector('#filterForm');
        let params = new URLSearchParams(new FormData(form));

        fetch(window.location.pathname + '?' + params.toString(), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(html => {

                document.querySelector('#product-list').innerHTML = html;

                // 🔥 VERY IMPORTANT
                loadWishlistState();

            });
    }

    // only checkbox auto apply
    document.querySelectorAll('#filterForm input[type=checkbox]').forEach(el => {
        el.addEventListener('change', applyFilters);
    });

    document.querySelectorAll('#filterForm input[type=number]').forEach(el => {
        el.addEventListener('blur', applyFilters);
    });
</script>

<script>
    document.querySelector('#sortForm select').addEventListener('change', function() {
        document.querySelector('#sortForm').submit();
    });
</script>

<script>
    // 🔥 APPLY ACTIVE WISHLIST UI
    function loadWishlistState() {

        fetch("/wishlist/getUserWishlist")
            .then(res => res.json())
            .then(items => {

                document.querySelectorAll(".wishlist-btn").forEach(btn => {

                    let id = btn.dataset.id;

                    if (items.includes(parseInt(id))) {

                        btn.classList.add("active");

                    } else {

                        btn.classList.remove("active");

                    }

                });

            });

    }

    // 🔥 TOGGLE WISHLIST
    function toggleWishlist(productId, btn) {

        fetch("/wishlist/toggle/" + productId)
            .then(res => res.json())
            .then(data => {

                if (data.status === 'added') {

                    btn.classList.add('active');

                } else if (data.status === 'removed') {

                    btn.classList.remove('active');

                } else if (data.status === 'login_required') {

                    window.location.href = "/login";
                }

            });

    }

    // 🔥 FIRST PAGE LOAD
    window.addEventListener("DOMContentLoaded", function() {

        loadWishlistState();

    });
</script>
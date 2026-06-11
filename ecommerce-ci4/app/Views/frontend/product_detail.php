<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<?php
$defaultVariant = $variants[0] ?? null;
?>
<style>
    .product-description {
        line-height: 1.8;
        color: #444;
        font-size: 15px;
    }

    .product-description ul {
        padding-left: 20px;
    }

    .product-description li {
        margin-bottom: 6px;
    }

    .product-description h4 {
        margin-top: 15px;
        font-weight: 600;
    }

    /* ===== GLOBAL ===== */
    .product-page {
        background: #f8f9fb;
        padding: 30px 0;
    }

    /* ===== IMAGE SECTION ===== */
    .product-gallery {
        position: sticky;
        top: 90px;
    }

    .main-image {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 16px;
        background: #fff;
        padding: 10px;
    }

    .thumbnail-list {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .thumb-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #ddd;
        cursor: pointer;
        transition: 0.3s;
    }

    .thumb-img:hover,
    .thumb-img.active {
        border-color: #000;
        transform: scale(1.05);
    }

    /* ===== DETAILS ===== */
    .product-title {
        font-size: 26px;
        font-weight: 600;
    }

    .price-main {
        font-size: 28px;
        font-weight: 700;
    }

    .price-old {
        text-decoration: line-through;
        color: #888;
    }

    .discount-badge {
        color: green;
        font-weight: 600;
    }

    /* ===== VARIANTS ===== */
    .variant-btn {
        border-radius: 30px;
        padding: 6px 14px;
        border: 1px solid #ddd;
        background: #fff;
        transition: 0.2s;
    }

    .variant-btn.active {
        background: #000;
        color: #fff;
        border-color: #000;
    }

    /* disabled size */
    .variant-btn.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* ===== ACTION BUTTON ===== */
    .btn-premium {
        border-radius: 30px;
        padding: 12px;
        font-weight: 600;
        font-size: 16px;
    }

    /* ===== CARD ===== */
    .info-card {
        background: #fff;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    /* ===== RELATED ===== */
    .related-card img {
        height: 180px;
        object-fit: cover;
    }

    /* ===== MOBILE ===== */
    @media (max-width: 768px) {
        .main-image {
            height: 280px;
        }

        .product-title {
            font-size: 20px;
        }
    }
</style>

<div class="product-page">

    <div class="container">

        <div class="row g-4">

            <!-- 🔥 LEFT IMAGE -->
            <div class="col-lg-6">
                <div class="product-gallery">

                    <img id="main-image" class="main-image" src="/uploads/products/<?= $product['image'] ?>">

                    <div id="thumbnail-images" class="thumbnail-list"></div>

                </div>
            </div>

            <!-- 🔥 RIGHT DETAILS -->
            <div class="col-lg-6">

                <div class="info-card">

                    <h2 class="product-title"><?= $product['name'] ?></h2>

                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-body">

                            <h5 class="fw-bold mb-3">Product Description</h5>

                            <div class="product-description">
                                <?= $product['description'] ?>
                            </div>

                        </div>
                    </div>

                    <div class="product-description">
                        <?= $product['specifications'] ?>
                    </div>

                    <!-- PRICE -->
                    <div class="mb-3">
                        <span id="product-price" class="price-main"></span>
                        <span id="product-original-price" class="price-old ms-2"></span>
                        <span id="product-discount" class="discount-badge ms-2"></span>
                    </div>

                    <!-- STOCK -->
                    <p id="product-stock" class="text-success fw-semibold"></p>

                    <hr>

                    <!-- COLOR -->
                    <h6>Select Color</h6>
                    <div id="color-options" class="mb-3">
                        <?php
                        $colors = [];
                        foreach ($variants as $v):
                            if (!in_array($v['color'], $colors)):
                                $colors[] = $v['color'];
                        ?>
                                <button class="variant-btn m-1"
                                    onclick="selectColor('<?= $v['color'] ?>', this)">
                                    <?= $v['color'] ?>
                                </button>
                        <?php endif;
                        endforeach; ?>
                    </div>

                    <!-- SIZE -->
                    <h6>Select Size</h6>
                    <div id="size-options" class="mb-3"></div>

                    <!-- ADD TO CART -->
                    <button onclick="addToCart()" class="btn btn-dark w-100 btn-premium">
                        <i class="bi bi-cart"></i> Add to Cart
                    </button>

                </div>

            </div>

        </div>

        <!-- 🔥 PRODUCT DETAILS -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <h5 class="fw-bold mb-3">Product Details</h5>

                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Brand</th>
                        <td><?= $product['brand'] ?? 'N/A' ?></td>
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td><?= $product['category_name'] ?? 'N/A' ?></td>
                    </tr>

                    <tr>
                        <th>Gender</th>
                        <td><?= ucfirst($product['gender'] ?? '-') ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <?php if (!empty($product['specifications'])): ?>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Specifications</h5>

                    <div class="product-specs">
                        <?= $product['specifications'] ?>
                    </div>

                </div>
            </div>

        <?php endif; ?>

        <!-- 🔥 RELATED -->
        <h4 class="mt-5 mb-3 fw-bold">Related Products</h4>

        <div class="row">
            <?php foreach ($related as $r): ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card related-card shadow-sm border-0">
                        <img src="/uploads/products/<?= $r['image'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h6><?= $r['name'] ?></h6>
                            <a href="/product/<?= $r['id'] ?>" class="btn btn-outline-dark w-100 btn-sm rounded-pill">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<!-- 🔥 JS LOGIC -->
<script>
    let variants = <?= json_encode($variants) ?>;
    let variantImages = <?= json_encode($variantImages) ?>;

    let selectedColor = null;
    let selectedVariant = null;

    // 🔥 ALL UNIQUE IMAGES MAP


    // 🔥 SELECT COLOR
    function selectColor(color, el = null) {

        selectedColor = color;

        // Highlight color
        document.querySelectorAll('#color-options .variant-btn')
            .forEach(btn => btn.classList.remove('active'));

        if (el) el.classList.add('active');

        let filtered = variants.filter(v => v.color === color);

        let html = '';

        filtered.forEach(v => {

            let isOut = v.stock <= 0;

            html += `
            <button class="btn btn-outline-primary m-1 size-btn ${isOut ? 'disabled' : ''}"
                ${isOut ? '' : `onclick="selectSize(${v.id}, this)"`}>
                ${v.size}
            </button>
        `;
        });

        document.getElementById('size-options').innerHTML = html;

        if (filtered.length > 0) {
            selectSize(filtered[0].id);
        }
    }

    // 🔥 SELECT SIZE (MAIN ENGINE)
    function selectSize(variantId, el = null) {

        selectedVariant = variants.find(v => v.id == variantId);

        // Highlight size
        document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
        if (el) el.classList.add('active');

        // PRICE
        let price = selectedVariant.price;
        let discount = selectedVariant.discount || 0;

        let finalPrice = price;

        if (discount > 0) {
            finalPrice = price - (price * discount / 100);

            document.getElementById('product-original-price').innerText = '₹' + price;
            document.getElementById('product-discount').innerText = discount + '% OFF';
        } else {
            document.getElementById('product-original-price').innerText = '';
            document.getElementById('product-discount').innerText = '';
        }

        document.getElementById('product-price').innerText = '₹' + finalPrice;

        // STOCK
        document.getElementById('product-stock').innerText =
            'Stock: ' + selectedVariant.stock;

        // IMAGES (main)
        // ✅ GET ONLY SELECTED VARIANT IMAGES
        let imgs = variantImages[variantId] || [];

        let unique = [...new Set(imgs)];

        // ✅ SET MAIN IMAGE DIRECTLY
        if (unique.length === 0) {

            document.getElementById('main-image').src =
                '/uploads/products/<?= $product['image'] ?>';

            document.getElementById('thumbnail-images').innerHTML = '';
            return;
        }

        // ✅ MAIN IMAGE
        let mainImg = unique[0];

        document.getElementById('main-image').src =
            '/uploads/products/' + mainImg;

        // ✅ THUMBNAILS (ONLY THIS VARIANT)
        let thumbHtml = '';

        unique.forEach(img => {
            thumbHtml += `
        <img src="/uploads/products/${img}" 
            class="thumb-img ${img === mainImg ? 'active' : ''}"
            onclick="changeMainImage('${img}', this)">
    `;
        });

        document.getElementById('thumbnail-images').innerHTML = thumbHtml;

        // 🔥 Render ALL variant images (right side)
        renderAllThumbnails(mainImg);
    }

    function changeMainImage(img, el) {

        document.getElementById('main-image').src =
            '/uploads/products/' + img;

        document.querySelectorAll('.thumb-img')
            .forEach(i => i.classList.remove('active'));

        el.classList.add('active');
    }



    // 🔥 CLICK THUMBNAIL → SWITCH VARIANT + IMAGE
    function selectImageVariant(img, el) {

        let variantId = allImagesMap[img];

        // switch variant
        selectSize(variantId);

        // change main image
        document.getElementById('main-image').src =
            '/uploads/products/' + img;

        // highlight thumbnail
        document.querySelectorAll('.thumb-img').forEach(i => i.classList.remove('active'));
        el.classList.add('active');
    }

    // 🔥 ADD TO CART
    function addToCart() {

        if (!selectedVariant) {
            alert("Please select size");
            return;
        }

        window.location.href = "/cart/add/" + selectedVariant.id;
    }

    // 🔥 AUTO LOAD DEFAULT
    window.onload = function() {

        if (variants.length > 0) {

            let firstColor = variants[0].color;

            // ✅ correct selector
            let btn = document.querySelector('#color-options .variant-btn');

            selectColor(firstColor, btn);
        }
    };
</script>

<?= $this->endSection() ?>
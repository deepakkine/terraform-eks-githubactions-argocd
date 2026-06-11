<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Dynamic page title -->
    <title><?= $meta_title ?? $title ?? 'MyShop' ?></title>

    <meta name="description" content="<?= $meta_description ?? '' ?>">
    <meta name="keywords" content="<?= $meta_keywords ?? '' ?>">

    <!-- Bootstrap CSS (global for whole project) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/home.css">

    <style>
        /* file style app/Views/order/view.php */

        .card {
            border-radius: 12px;
        }

        .badge {
            font-size: 14px;
        }

        img {
            object-fit: cover;
        }

        /* file style closed app/Views/order/view.php */


        /* views/frontend/products.php carousel   */


        /* CARD */
        .product-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            transition: 0.2s ease;
        }

        .product-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        /* IMAGE */
        .product-img-wrapper {
            position: relative;
            height: 220px;
            background: #f8f8f8;
        }

        .product-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        /* ===============================
   ICON BUTTONS (Wishlist + Share)
================================= */
        .wishlist-btn,
        .share-btn {
            position: absolute;
            top: 10px;
            background: #fff;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            transition: 0.2s ease;
        }

        /* Hover effect */
        .wishlist-btn:hover,
        .share-btn:hover {
            transform: scale(1.1);
        }

        /* Wishlist position */
        .wishlist-btn {
            right: 10px;
        }

        /* Share position */
        .share-btn {
            left: 10px;
            text-decoration: none;
            color: #333;
        }

        /* Icon size */
        .wishlist-btn i,
        .share-btn i {
            font-size: 16px;
        }

        /* 🔥 DEFAULT HEART (outline) */
        .wishlist-btn i {
            color: #555;
        }

        /* 🔥 ACTIVE HEART (FULL FILLED ❤️) */
        .wishlist-btn.active i {
            color: #e60023;
        }



        /* TEXT */
        .product-title {
            font-size: 14px;
            font-weight: 600;
            min-height: 38px;
        }

        .product-desc {
            font-size: 12px;
            color: #777;
            min-height: 40px;
        }

        /* PRICE */
        .price {
            font-size: 16px;
            font-weight: bold;
        }

        /* MOBILE */
        @media(max-width:768px) {
            .product-img-wrapper {
                height: 180px;
            }
        }



        .carousel-image {
            height: 380px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* Dark overlay for text visibility */
        .carousel-image::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2));
        }

        /* Text overlay */
        .carousel-overlay {
            position: absolute;
            top: 50%;
            left: 60px;
            transform: translateY(-50%);
            color: white;
            z-index: 2;
        }

        .carousel-overlay h2 {
            font-size: 36px;
            font-weight: bold;
        }

        .carousel-overlay p {
            font-size: 18px;
            margin-bottom: 15px;
        }

        /* Responsive */
        @media(max-width:768px) {
            .carousel-overlay {
                left: 20px;
            }

            .carousel-overlay h2 {
                font-size: 22px;
            }

            .carousel-image {
                height: 250px;
            }
        }



        /* header.php style----------------------------------------------------- */


        /* 🔥 Navbar background */
        .premium-navbar {
            background: linear-gradient(90deg, #141e30, #243b55);
            padding: 12px 0;
        }

        /* Logo */
        .navbar-brand {
            font-size: 20px;
            letter-spacing: 1px;
        }

        /* Cart button */
        .cart-btn {
            color: white;
            font-size: 20px;
            text-decoration: none;
            position: relative;
        }

        /* Cart badge */
        .cart-badge {
            position: absolute;
            top: -6px;
            right: -10px;
            background: red;
            color: white;
            font-size: 11px;
            padding: 3px 6px;
            border-radius: 50%;
        }

        /* User button */
        .user-btn {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
        }

        /* Hover effect */
        .user-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Dropdown */
        .dropdown-menu {
            border-radius: 10px;
        }

        /* Mobile spacing */
        @media(max-width:768px) {
            .premium-navbar {
                padding: 10px;
            }
        }



        /* -----------------------------------product details page style---------------------- */
        .product-detail img {
            transition: 0.3s;
        }

        .product-detail img:hover {
            transform: scale(1.05);
        }

        /* --------------------------sponsored and featured css -------------------------------*/
        .ecom-section {
            margin: 30px 0;
        }

        .ecom-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        /* WRAPPER */
        .ecom-slider {
            position: relative;
        }

        /* TRACK */
        .ecom-track {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 5px;
        }

        .ecom-track::-webkit-scrollbar {
            display: none;
        }

        /* PRODUCT CARD */
        .ecom-card {
            flex: 0 0 auto;
            width: 170px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
            text-decoration: none;
            color: #111;
            transition: 0.2s;
        }

        .ecom-card:hover {
            transform: translateY(-3px);
        }

        .ecom-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .ecom-body {
            padding: 8px;
        }

        .ecom-name {
            font-size: 13px;
            font-weight: 500;
            height: 32px;
            overflow: hidden;
        }

        .ecom-price {
            font-size: 14px;
            font-weight: 700;
            color: #1a7f37;
        }

        /* ARROWS */
        .ecom-btn {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: none;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 10;
        }

        .ecom-left {
            left: -10px;
        }

        .ecom-right {
            right: -10px;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .ecom-card {
                width: 140px;
            }

            .ecom-card img {
                height: 120px;
            }

            .ecom-btn {
                display: none;
            }
        }
    </style>

</head>

<body>

    <!-- Common Header -->
    <?= $this->include('layout/header') ?>

    <!-- Page Content -->
    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Common Footer -->
    <?= $this->include('layout/footer') ?>

    <!-- Toast Messages (Success / Error) -->
    <?= $this->include('layout/toast') ?>

    <!-- Bootstrap JS (required for modal, dropdown, etc) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // 🔥 Fix Back button cache issue (bfcache)
        window.addEventListener("pageshow", function(event) {
            if (event.persisted) {
                // Force reload if page comes from cache
                window.location.reload();
            }
        });
    </script>

    <script>
        // Run on first load
        window.addEventListener("load", function() {
            setTimeout(loadWishlist, 100); // 🔥 ensures DOM fully ready
        });

        // 🔥 FIX: Run again when page comes from cache (BACK button)
        window.addEventListener("pageshow", function() {
            loadWishlist();
        });


        // ✅ Load wishlist state
        function loadWishlist() {

            fetch('/wishlist/list')
                .then(res => res.json())
                .then(ids => {

                    ids = ids.map(id => parseInt(id));

                    document.querySelectorAll('.wishlist-btn').forEach(btn => {

                        let productId = parseInt(btn.dataset.id);

                        let icon = btn.querySelector('i');

                        if (!icon) return;

                        // 🔥 RESET FIRST (VERY IMPORTANT)
                        icon.className = 'bi';

                        if (ids.includes(productId)) {

                            btn.classList.add('active');

                            icon.classList.add('bi-heart-fill', 'text-danger');

                        } else {

                            btn.classList.remove('active');

                            icon.classList.add('bi-heart');
                        }

                    });

                });
        }

        // ✅ Toggle wishlist
        function toggleWishlist(btn, productId) {

            fetch('/wishlist/toggle/' + productId)
                .then(res => res.json())
                .then(data => {

                    if (data.status === 'login_required') {
                        window.location.href = '/login';
                        return;
                    }

                    let icon = btn.querySelector('i');

                    if (!icon) return;

                    // 🔥 RESET FIRST
                    icon.className = 'bi';

                    if (data.status === 'added') {

                        btn.classList.add('active');

                        icon.classList.add('bi-heart-fill', 'text-danger');

                    } else {

                        btn.classList.remove('active');

                        icon.classList.add('bi-heart');
                    }

                    updateWishlistCount();
                });
        }


        // 🔥 Update badge
        function updateWishlistCount() {
            fetch('/wishlist/list')
                .then(res => res.json())
                .then(ids => {
                    let el = document.getElementById('wishlist-count');
                    if (el) el.innerText = ids.length;
                });
        }
    </script>


    <!-- featured sponsored script -->

    <script>
        function scrollEcom(id, value) {
            document.getElementById(id).scrollBy({
                left: value,
                behavior: 'smooth'
            });
        }
    </script>
</body>

</html>
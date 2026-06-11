<!DOCTYPE html>
<html>

<head>
    <title>MyShop Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/admin/css/admin.css">

</head>

<body>

    <!-- =========================================
       MOBILE OVERLAY
    ========================================== -->

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- =========================================
       SIDEBAR
    ========================================== -->

    <aside class="admin-sidebar" id="adminSidebar">

        <!-- LOGO -->
        <div class="sidebar-logo">

            <div class="logo-box">
                <i class="bi bi-bag-heart-fill"></i>
            </div>

            <div>
                <h4>MyShop</h4>
                <span>Admin Panel</span>
            </div>

        </div>

        <!-- MENU -->

        <div class="sidebar-menu">

            <a href="/admin" class="active">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>

            <a href="/admin/category/list">
                <i class="bi bi-folder2-open"></i>
                <span>Categories</span>
            </a>

            <a href="/admin/product/list">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>

            <a href="/admin/product/add">
                <i class="bi bi-plus-circle"></i>
                <span>Add Product</span>
            </a>

            <a href="/admin/order/list">
                <i class="bi bi-receipt"></i>
                <span>Orders</span>
            </a>

            <a href="/admin/banner">
                <i class="bi bi-images"></i>
                <span>Home Banners</span>
            </a>

            <a href="/admin/promo-banner">
                <i class="bi bi-megaphone"></i>
                Promo Banner
            </a>

            <a href="/admin/coupons">
                <i class="bi bi-ticket-perforated"></i>
                <span>Coupons</span>
            </a>

        </div>

    </aside>

    <!-- =========================================
       MAIN AREA
    ========================================== -->

    <main class="admin-main">

        <!-- =====================================
           TOP NAVBAR
        ====================================== -->

        <header class="top-navbar">

            <!-- LEFT -->
            <div class="navbar-left">

                <button class="menu-toggle"
                    id="menuToggle">

                    <i class="bi bi-list"></i>

                </button>

                <div class="page-title">

                    <h5>
                        Admin Dashboard
                    </h5>

                    <span>
                        Manage your ecommerce platform
                    </span>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="navbar-right">

                <a href="/"
                    class="visit-site-btn">

                    <i class="bi bi-globe"></i>
                    Visit Site

                </a>

                <?php if (session()->get('user')): ?>

                    <div class="admin-user">

                        <div class="user-avatar">
                            <?= strtoupper(substr(session()->get('user')['name'], 0, 1)) ?>
                        </div>

                        <div class="user-info">

                            <strong>
                                <?= session()->get('user')['name'] ?>
                            </strong>

                            <span>
                                Administrator
                            </span>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </header>

        <!-- =====================================
           CONTENT
        ====================================== -->

        <div class="admin-content">

            <?= $this->renderSection('content') ?>

        </div>

    </main>

    <!-- Toast -->
    <?= $this->include('layout/toast') ?>

    <!-- Modal -->
    <?= $this->include('layout/modal') ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SIDEBAR JS -->

    <script>
        const sidebar = document.getElementById('adminSidebar');

        const overlay = document.getElementById('sidebarOverlay');

        const toggle = document.getElementById('menuToggle');

        toggle.addEventListener('click', () => {

            sidebar.classList.toggle('show-sidebar');

            overlay.classList.toggle('show-overlay');

        });

        overlay.addEventListener('click', () => {

            sidebar.classList.remove('show-sidebar');

            overlay.classList.remove('show-overlay');

        });
    </script>

</body>

</html>
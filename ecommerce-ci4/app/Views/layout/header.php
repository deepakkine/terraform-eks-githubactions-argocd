<style>
    /* 🔥 NAVBAR */
    .premium-navbar {
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(10px);
        padding: 12px 0;
        transition: 0.3s;
    }

    .navbar-brand {
        font-size: 22px;
        letter-spacing: 1px;
    }

    /* 🔍 SEARCH */
    .premium-search input {
        border-radius: 50px 0 0 50px;
        border: none;
        padding: 10px 15px;
    }

    .premium-search button {
        border-radius: 0 50px 50px 0;
        background: #ffc107;
        border: none;
    }

    /* 🔥 ICON BUTTONS */
    .icon-btn {
        color: #fff;
        font-size: 20px;
        position: relative;
        transition: 0.3s;
    }

    .icon-btn:hover {
        color: #ffc107;
        transform: scale(1.1);
    }

    /* 🔴 BADGE */
    .badge-circle {
        position: absolute;
        top: -6px;
        right: -10px;
        background: #ffc107;
        color: #000;
        font-size: 11px;
        padding: 3px 6px;
        border-radius: 50%;
    }

    /* 👤 USER BUTTON */
    .user-btn {
        background: transparent;
        border: none;
        color: #fff;
        font-weight: 500;
    }

    /* DROPDOWN */
    .premium-dropdown {
        border-radius: 10px;
        padding: 10px;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .premium-search {
            display: none;
        }
    }
</style>

<nav class="navbar navbar-expand-lg premium-navbar sticky-top">

    <div class="container">

        <!-- 🔥 LOGO -->
        <a class="navbar-brand text-white fw-bold" href="/">
            MyShop
        </a>

        <!-- MOBILE TOGGLE -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <!-- 🔍 SEARCH BAR -->
            <form class="mx-auto w-50 d-none d-lg-block" action="/products">
                <div class="input-group premium-search">
                    <input type="text" name="search" class="form-control" placeholder="Search for products...">
                    <button class="btn">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            <!-- RIGHT SIDE -->
            <div class="d-flex align-items-center gap-3 ms-auto">

                <?php if (session()->get('user')): ?>

                    <!-- 🛒 CART -->
                    <a href="/cart" class="icon-btn position-relative">
                        <i class="bi bi-cart3"></i>
                        <span id="cart-count" class="badge-circle">0</span>
                    </a>

                    <!-- ❤️ WISHLIST -->
                    <a href="/wishlist" class="icon-btn position-relative">
                        <i class="bi bi-heart"></i>
                        <span id="wishlist-count" class="badge-circle bg-danger">0</span>
                    </a>

                    <!-- 👤 USER -->
                    <div class="dropdown">
                        <button class="user-btn dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            <?= session()->get('user')['name'] ?>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end premium-dropdown">

                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-person me-2"></i> Profile
                                </a>
                            </li>

                            <?php if (session()->get('user')['role'] == 'customer'): ?>
                                <li>
                                    <a class="dropdown-item" href="/orders">
                                        <i class="bi bi-bag-check me-2"></i> My Orders
                                    </a>
                                </li>
                            <?php endif; ?>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-danger" href="/logout">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </li>

                        </ul>
                    </div>

                <?php else: ?>

                    <a href="/login" class="btn btn-outline-light btn-sm px-3">
                        Login
                    </a>

                    <a href="/register" class="btn btn-warning btn-sm px-3">
                        Register
                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</nav>

<script>
    function updateCartCount() {
        fetch('/cart/count')
            .then(res => res.json())
            .then(data => {
                let el = document.getElementById('cart-count');
                if (el) el.innerText = data.count ?? 0;
            })
            .catch(() => console.log("Cart count error"));
    }



    // 🔥 LOAD ON PAGE
    document.addEventListener("DOMContentLoaded", function() {
        updateCartCount();
        updateWishlistCount();
    });

    // 🔥 FIX BACK BUTTON CACHE ISSUE
    window.addEventListener("pageshow", function() {
        updateCartCount();
        updateWishlistCount();
    });
</script>
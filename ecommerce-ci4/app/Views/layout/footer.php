<style>
    /* 🔥 FOOTER */
    .premium-footer {
        background: #111;
        color: #fff;
    }

    .premium-footer h5,
    .premium-footer h6 {
        color: #fff;
    }

    /* LINKS */
    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 8px;
    }

    .footer-links a {
        color: #bbb;
        text-decoration: none;
        font-size: 14px;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: #ffc107;
        padding-left: 5px;
    }

    /* SOCIAL */
    .social-icons a {
        display: inline-block;
        margin-right: 10px;
        font-size: 18px;
        color: #bbb;
        transition: 0.3s;
    }

    .social-icons a:hover {
        color: #ffc107;
        transform: translateY(-2px);
    }

    /* BOTTOM */
    .footer-bottom {
        background: #000;
        border-top: 1px solid #222;
    }

    /* MOBILE */
    @media (max-width: 768px) {
        .premium-footer {
            text-align: center;
        }
    }
</style>

<footer class="premium-footer mt-5">

    <div class="container py-5">

        <div class="row">

            <!-- 🔥 BRAND -->
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">MyShop</h5>
                <p class="small">
                    Premium ecommerce platform offering quality products with best prices and fast delivery.
                </p>
            </div>

            <!-- 📂 QUICK LINKS -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-semibold">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/products">Shop</a></li>
                    <li><a href="/orders">My Orders</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <!-- 📜 SUPPORT -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-semibold">Support</h6>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Return Policy</a></li>
                </ul>
            </div>

            <!-- 📞 CONTACT -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-semibold">Contact</h6>

                <p class="small mb-1">
                    <i class="bi bi-geo-alt"></i> Pune, Maharashtra
                </p>

                <p class="small mb-1">
                    <i class="bi bi-envelope"></i> support@myshop.com
                </p>

                <p class="small">
                    <i class="bi bi-telephone"></i> +91 98765 43210
                </p>

                <!-- 🌐 SOCIAL -->
                <div class="social-icons mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

        </div>

    </div>

    <!-- 🔻 BOTTOM BAR -->
    <div class="footer-bottom text-center py-3">
        <p class="mb-0 small">
            © <?= date('Y') ?> MyShop. All rights reserved.
        </p>
    </div>

</footer>
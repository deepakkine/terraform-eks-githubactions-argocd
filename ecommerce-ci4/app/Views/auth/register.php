<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* 🔥 BACKGROUND LAYER */
    .register-page {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
            radial-gradient(circle at top left, #1f2937, transparent 40%),
            radial-gradient(circle at bottom right, #111827, transparent 40%),
            #f8fafc;
        padding: 20px;
    }

    /* 🔥 MAIN CONTAINER */
    .register-box {
        width: 100%;
        max-width: 1100px;
        display: flex;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.12);
        background: white;
    }

    /* 🔥 LEFT BRAND PANEL */
    .register-left {
        flex: 1;
        background: linear-gradient(135deg, #0f172a, #1e293b, #111827);
        color: white;
        padding: 60px;
        position: relative;
        overflow: hidden;
    }

    /* floating glow */
    .register-left::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(59, 130, 246, 0.3);
        filter: blur(80px);
        top: -80px;
        left: -80px;
    }

    .register-left::after {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(236, 72, 153, 0.25);
        filter: blur(90px);
        bottom: -100px;
        right: -100px;
    }

    /* content */
    .register-left-content {
        position: relative;
        z-index: 2;
    }

    .register-left h1 {
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .register-left p {
        color: #cbd5e1;
        font-size: 15px;
        line-height: 1.6;
    }

    /* benefits */
    .features {
        margin-top: 25px;
    }

    .features div {
        margin-bottom: 12px;
        font-size: 14px;
        color: #e2e8f0;
    }

    /* 🔥 RIGHT FORM PANEL */
    .register-right {
        flex: 1;
        padding: 60px;
        background: #ffffff;
    }

    /* TITLE */
    .title {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 30px;
    }

    /* INPUT STYLE */
    .form-control {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 15px;
        transition: 0.2s;
    }

    .form-control:focus {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.1);
    }

    /* BUTTON */
    .btn-register {
        width: 100%;
        background: linear-gradient(135deg, #111827, #000);
        color: white;
        padding: 12px;
        border-radius: 12px;
        font-weight: 600;
        border: none;
        transition: 0.3s;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    /* FOOTER */
    .footer-text {
        margin-top: 18px;
        font-size: 14px;
    }

    /* 🔥 MOBILE */
    @media(max-width: 768px) {
        .register-box {
            flex-direction: column;
        }

        .register-left {
            display: none;
        }

        .register-right {
            padding: 30px;
        }
    }
</style>

<div class="register-page">

    <div class="register-box">

        <!-- 🔥 LEFT PANEL -->
        <div class="register-left">

            <div class="register-left-content">

                <h1>Start Your Journey</h1>

                <p>
                    Join thousands of customers shopping premium fashion,
                    electronics & lifestyle products on MyShop.
                </p>

                <div class="features">
                    <div>✔ Fast checkout & secure payments</div>
                    <div>✔ Track orders in real time</div>
                    <div>✔ Exclusive member discounts</div>
                    <div>✔ Wishlist & personalized offers</div>
                </div>

            </div>

        </div>

        <!-- 🔥 RIGHT PANEL -->
        <div class="register-right">

            <div class="title">Create Account</div>
            <div class="subtitle">Sign up to start shopping instantly</div>

            <form method="post" action="/register">

                <input type="text" name="name" class="form-control" placeholder="Full Name" required>

                <input type="email" name="email" class="form-control" placeholder="Email Address" required>

                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button class="btn-register">
                    Create Account
                </button>

            </form>

            <div class="footer-text text-center">
                Already have an account?
                <a href="/login" class="fw-bold text-dark">Sign in</a>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
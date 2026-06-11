<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* 🔥 PAGE BACKGROUND */
    .login-wrapper {
        min-height: 90vh;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* 🔥 MAIN CARD */
    .login-container {
        width: 100%;
        max-width: 1000px;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
    }

    /* 🔥 LEFT SIDE (IMAGE + OVERLAY) */
    .login-left {
        position: relative;
        background: url('https://images.unsplash.com/photo-1607083206968-13611e3d76db?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
        min-height: 450px;
    }

    .login-left::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.2));
    }

    /* TEXT OVER IMAGE */
    .login-left-content {
        position: absolute;
        bottom: 30px;
        left: 30px;
        color: white;
        z-index: 2;
    }

    .login-left-content h2 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .login-left-content p {
        font-size: 14px;
        color: #e5e7eb;
    }

    /* 🔥 RIGHT SIDE */
    .login-right {
        padding: 45px;
    }

    /* TITLE */
    .login-title {
        font-weight: 700;
        margin-bottom: 5px;
    }

    .login-subtitle {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 25px;
    }

    /* INPUT GROUP STYLE */
    .input-group-custom {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .input-group-custom input {
        border: none;
        outline: none;
        flex: 1;
    }

    /* BUTTON */
    .btn-login {
        background: #111827;
        color: white;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #000;
        transform: translateY(-1px);
    }

    /* DIVIDER */
    .divider {
        text-align: center;
        margin: 20px 0;
        color: #9ca3af;
        font-size: 13px;
    }

    /* SOCIAL BUTTON */
    .btn-google {
        border: 1px solid #e5e7eb;
        padding: 10px;
        border-radius: 10px;
        width: 100%;
        background: #fff;
    }

    /* FOOTER */
    .login-footer {
        font-size: 14px;
        margin-top: 15px;
    }

    /* MOBILE */
    @media(max-width:768px) {
        .login-left {
            display: none;
        }

        .login-right {
            padding: 25px;
        }
    }
</style>

<div class="login-wrapper">

    <div class="login-container row g-0">

        <!-- 🔥 LEFT SIDE -->
        <div class="col-md-6 login-left">

            <div class="login-left-content">
                <h2>Shop Smarter</h2>
                <p>
                    Discover trends, track orders, and enjoy seamless shopping
                    experience with MyShop.
                </p>
            </div>

        </div>

        <!-- 🔥 RIGHT SIDE -->
        <div class="col-md-6 login-right">

            <h4 class="login-title">Sign In</h4>
            <div class="login-subtitle">
                Welcome back! Please login to your account
            </div>

            <form method="post" action="/login">

                <!-- EMAIL -->
                <div class="input-group-custom">
                    <input type="email" name="email" placeholder="Enter email" required>
                </div>

                <!-- PASSWORD -->
                <div class="input-group-custom">
                    <input type="password" name="password" placeholder="Enter password" required>
                </div>

                <!-- FORGOT -->
                <div class="text-end mb-2">
                    <a href="#" class="small text-decoration-none">
                        Forgot Password?
                    </a>
                </div>

                <!-- LOGIN -->
                <button class="btn btn-login w-100">
                    Login
                </button>

            </form>

            <!-- DIVIDER -->
            <div class="divider">or continue with</div>

            <!-- GOOGLE -->
            <button class="btn-google">
                Continue with Google
            </button>

            <!-- FOOTER -->
            <div class="login-footer text-center">
                New to MyShop?
                <a href="/register" class="fw-bold text-dark">
                    Create Account
                </a>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
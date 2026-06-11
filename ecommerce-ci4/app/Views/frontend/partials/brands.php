<style>
    /* =========================================
       BRANDS SECTION
    ========================================= */

    .brands-section {
        padding: 10px 0 70px;
        overflow: hidden;
    }

    /* =========================================
       HEADER
    ========================================= */

    .brands-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .brands-header h3 {
        font-size: 34px;
        font-weight: 800;
        color: #111;
        margin-bottom: 10px;
    }

    .brands-header p {
        font-size: 15px;
        color: #777;
        margin: 0;
    }

    /* =========================================
       MARQUEE WRAPPER
    ========================================= */

    .brands-slider-wrapper {
        overflow: hidden;
        position: relative;
    }

    /* =========================================
       SLIDER TRACK
    ========================================= */

    .brands-track {
        display: flex;
        align-items: center;
        gap: 24px;

        width: max-content;

        animation: scrollBrands 30s linear infinite;
    }

    @keyframes scrollBrands {

        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }

    }

    /* =========================================
       BRAND CARD
    ========================================= */

    .brand-card {
        width: 210px;
        height: 120px;

        background: #fff;

        border-radius: 24px;

        display: flex;
        align-items: center;
        justify-content: center;

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.05);

        border: 1px solid #f3f3f3;

        transition: all .35s ease;

        flex-shrink: 0;
    }

    .brand-card:hover {

        transform: translateY(-6px);

        box-shadow:
            0 18px 40px rgba(0, 0, 0, 0.10);

    }

    /* =========================================
       LOGO
    ========================================= */

    .brand-card img {

        max-width: 120px;
        max-height: 55px;

        object-fit: contain;

        filter: grayscale(100%);
        opacity: 0.75;

        transition: all .35s ease;

    }

    .brand-card:hover img {

        filter: grayscale(0%);
        opacity: 1;

        transform: scale(1.05);

    }

    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 992px) {

        .brand-card {
            width: 180px;
            height: 105px;
        }

    }

    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 768px) {

        .brands-section {
            padding: 0 0 45px;
        }

        .brands-header {
            margin-bottom: 24px;
        }

        .brands-header h3 {
            font-size: 24px;
        }

        .brands-header p {
            font-size: 13px;
        }

        .brands-track {
            gap: 14px;
        }

        .brand-card {

            width: 145px;
            height: 85px;

            border-radius: 18px;
        }

        .brand-card img {

            max-width: 90px;
            max-height: 40px;

        }

    }
</style>

<section class="brands-section mt-2">

    <!-- HEADER -->
    <div class="brands-header">

        <h3>
            Trusted by Top Brands
        </h3>

        <p>
            Explore collections from premium global brands
        </p>

    </div>

    <!-- SLIDER -->
    <div class="brands-slider-wrapper">

        <div class="brands-track">

            <!-- BRAND -->
            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Adidas_Logo.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Puma_AG.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Sony_logo.svg">
            </div>

            <!-- DUPLICATE FOR INFINITE LOOP -->

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/24/Samsung_Logo.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Adidas_Logo.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Puma_AG.svg">
            </div>

            <div class="brand-card">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Sony_logo.svg">
            </div>

        </div>

    </div>

</section>
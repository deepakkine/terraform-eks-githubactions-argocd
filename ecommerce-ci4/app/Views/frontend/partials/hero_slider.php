<style>
    /* =========================================
       HERO SECTION
    ========================================= */

    .hero-section {
        padding: 16px 16px 0;
    }

    .hero-carousel {
        border-radius: 28px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    /* =========================================
       HERO IMAGE
    ========================================= */

    .carousel-image {
        height: 460px;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
    }

    /* DARK PREMIUM OVERLAY */
    .carousel-image::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            linear-gradient(to right,
                rgba(0, 0, 0, 0.75) 0%,
                rgba(0, 0, 0, 0.45) 35%,
                rgba(0, 0, 0, 0.15) 60%,
                rgba(0, 0, 0, 0.05) 100%);
    }

    /* =========================================
       CONTENT
    ========================================= */

    .carousel-overlay {
        position: absolute;
        top: 50%;
        left: 70px;
        transform: translateY(-50%);
        z-index: 2;
        max-width: 460px;
        color: #fff;
    }

    .carousel-subtitle {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 40px;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(12px);
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .carousel-overlay h2 {
        font-size: 42px;
        line-height: 1.1;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .carousel-overlay p {
        font-size: 15px;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.88);
        margin-bottom: 30px;
    }

    /* =========================================
       BUTTON
    ========================================= */

    .hero-btn {
        padding: 12px 24px;
        border-radius: 40px;
        background: #fff;
        color: #111;
        font-weight: 700;
        border: none;
        transition: .3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .hero-btn:hover {
        transform: translateY(-3px);
        background: #111;
        color: #fff;
    }

    /* =========================================
       CONTROLS
    ========================================= */

    .carousel-control-prev,
    .carousel-control-next {
        width: 60px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
        background-size: 50%;
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 768px) {

        .hero-section {
            padding: 10px 10px 0;
        }

        .carousel-image {
            height: 300px;
            border-radius: 18px;
        }

        .carousel-overlay {
            left: 24px;
            right: 24px;
            max-width: 100%;
            top: auto;
            bottom: 20px;
            transform: none;
        }

        .carousel-subtitle {
            font-size: 11px;
            padding: 6px 14px;
        }

        .carousel-overlay h2 {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .carousel-overlay p {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        .hero-btn {
            padding: 12px 22px;
            font-size: 14px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }

    }
</style>
<!-- 🔥 HERO Dynamic CAROUSEL manage by admin  -->
<!-- 🔥 PREMIUM HERO CAROUSEL  -->
<?php if (!empty($banners)): ?>

    <div class="hero-section">

        <div id="mainCarousel"
            class="carousel slide hero-carousel"
            data-bs-ride="carousel">

            <div class="carousel-inner rounded shadow">

                <?php foreach ($banners as $index => $b): ?>

                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">

                        <div class="carousel-image"
                            style="background-image: url('/uploads/banners/<?= $b['desktop_image'] ?>');"
                            data-mobile="/uploads/banners/<?= $b['mobile_image'] ?>">

                            <div class="carousel-overlay">

                                <span class="carousel-subtitle">
                                    Premium Collection
                                </span>

                                <h2>
                                    <?= $b['title'] ?>
                                </h2>

                                <p>
                                    <?= $b['subtitle'] ?>
                                </p>

                                <?php if (!empty($b['button_text'])): ?>
                                    <a href="<?= $b['button_link'] ?>"
                                        class="hero-btn">
                                        <?= $b['button_text'] ?>
                                    </a>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>
<?php endif; ?>



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



    document.querySelectorAll('.carousel-item').forEach(item => {

        item.addEventListener('mouseenter', () => {

            let image = item.querySelector('.carousel-image');

            image.style.transform = "scale(1.02)";
            image.style.transition = "6s ease";

        });

    });
</script>
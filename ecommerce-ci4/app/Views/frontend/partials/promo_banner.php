<style>
    /* =========================================
       PROMO SECTION
    ========================================= */

    .promo-section {
        padding: 10px 0 70px;
    }

    /* =========================================
       MAIN GRID
    ========================================= */

    .promo-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
    }

    /* =========================================
       CARD
    ========================================= */

    .promo-card {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        min-height: 420px;
        background: #f5f5f5;
        text-decoration: none;
        display: block;

        box-shadow:
            0 12px 40px rgba(0, 0, 0, 0.06);

        transition: all .4s ease;
    }

    .promo-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 22px 50px rgba(0, 0, 0, 0.12);
    }

    /* =========================================
       IMAGE
    ========================================= */

    .promo-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .8s ease;
    }

    .promo-card:hover img {
        transform: scale(1.06);
    }

    /* =========================================
       OVERLAY
    ========================================= */

    .promo-overlay {
        position: absolute;
        inset: 0;

        background:
            linear-gradient(90deg,
                rgba(0, 0, 0, 0.72) 0%,
                rgba(0, 0, 0, 0.20) 60%,
                rgba(0, 0, 0, 0.05) 100%);

        display: flex;
        align-items: center;

        padding: 40px;
    }

    /* =========================================
       CONTENT
    ========================================= */

    .promo-content {
        max-width: 420px;
        color: #fff;
    }

    .promo-tag {
        display: inline-block;
        padding: 7px 14px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);

        font-size: 13px;
        font-weight: 600;

        margin-bottom: 18px;
    }

    .promo-content h2 {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 18px;
    }

    .promo-content p {
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.88);
        margin-bottom: 25px;
    }

    .promo-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;

        padding: 14px 24px;
        border-radius: 50px;

        background: #fff;
        color: #111;

        font-weight: 700;
        text-decoration: none;

        transition: .3s ease;
    }

    .promo-btn:hover {
        background: #111;
        color: #fff;
    }

    /* =========================================
       SIDE GRID
    ========================================= */

    .promo-side-grid {
        display: grid;
        gap: 24px;
    }

    .promo-small {
        min-height: 198px;
    }

    .promo-small .promo-content h2 {
        font-size: 26px;
    }

    .promo-small .promo-overlay {
        padding: 28px;
    }

    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 992px) {

        .promo-grid {
            grid-template-columns: 1fr;
        }

        .promo-card {
            min-height: 340px;
        }

    }

    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 768px) {

        .promo-section {
            padding: 0 0 45px;
        }

        .promo-grid {
            gap: 16px;
        }

        .promo-side-grid {
            gap: 16px;
        }

        .promo-card {
            min-height: 260px;
            border-radius: 22px;
        }

        .promo-overlay {
            padding: 22px;
        }

        .promo-content h2 {
            font-size: 26px;
            margin-bottom: 10px;
        }

        .promo-content p {
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .promo-btn {
            padding: 10px 18px;
            font-size: 14px;
        }

        .promo-small {
            min-height: 220px;
        }

        .promo-small .promo-content h2 {
            font-size: 20px;
        }

    }
</style>

<section class="promo-section">

    <?php if (!empty($promoBanners)): ?>

        <div class="promo-grid">

            <?php
            $mainBanner = $promoBanners[0] ?? null;
            $sideBanners = array_slice($promoBanners, 1, 2);
            ?>

            <!-- MAIN BANNER -->
            <?php if ($mainBanner): ?>

                <a href="<?= $mainBanner['button_link'] ?>"
                    class="promo-card">

                    <img src="/uploads/promo_banner/<?= $mainBanner['image'] ?>"
                        alt="<?= $mainBanner['title'] ?>">

                    <div class="promo-overlay">

                        <div class="promo-content">

                            <span class="promo-tag">
                                Premium Collection
                            </span>

                            <h2>
                                <?= $mainBanner['title'] ?>
                            </h2>

                            <p>
                                <?= $mainBanner['subtitle'] ?>
                            </p>

                            <span class="promo-btn">

                                <?= $mainBanner['button_text'] ?>

                                <i class="bi bi-arrow-right"></i>

                            </span>

                        </div>

                    </div>

                </a>

            <?php endif; ?>

            <!-- SIDE BANNERS -->
            <div class="promo-side-grid">

                <?php foreach ($sideBanners as $banner): ?>

                    <a href="<?= $banner['button_link'] ?>"
                        class="promo-card promo-small">

                        <img src="/uploads/promo_banner/<?= $banner['image'] ?>"
                            alt="<?= $banner['title'] ?>">

                        <div class="promo-overlay">

                            <div class="promo-content">

                                <span class="promo-tag">
                                    Featured
                                </span>

                                <h2>
                                    <?= $banner['title'] ?>
                                </h2>

                            </div>

                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    <?php endif; ?>

</section>
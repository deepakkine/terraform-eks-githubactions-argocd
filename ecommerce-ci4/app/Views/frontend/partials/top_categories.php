<style>
    /* =========================================
       CATEGORY SECTION
    ========================================= */

    .category-section {
        padding: 20px 0 55px;
    }

    .category-header {
        margin-bottom: 28px;
    }

    .category-header h3 {
        font-size: 32px;
        font-weight: 800;
        color: #111;
        margin-bottom: 8px;
    }

    .category-header p {
        color: #777;
        font-size: 15px;
        margin-bottom: 0;
    }

    /* =========================================
       DESKTOP GRID
    ========================================= */

    .category-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    /* =========================================
       CATEGORY CARD
    ========================================= */

    .category-card {
        position: relative;
        height: 320px;
        border-radius: 24px;
        overflow: hidden;
        background: #f5f5f5;
        transition: all .35s ease;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.14);
    }

    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .7s ease;
    }

    .category-card:hover img {
        transform: scale(1.08);
    }

    /* =========================================
       OVERLAY
    ========================================= */

    .category-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(to top,
                rgba(0, 0, 0, 0.82) 0%,
                rgba(0, 0, 0, 0.20) 45%,
                rgba(0, 0, 0, 0.03) 100%);
        display: flex;
        align-items: flex-end;
        padding: 22px;
    }

    .category-content h5 {
        color: #fff;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .category-content span {
        color: rgba(255, 255, 255, 0.88);
        font-size: 14px;
    }

    /* =========================================
       MOBILE SLIDER
    ========================================= */

    .category-slider {
        display: none;
    }

    .slider-indicators {
        display: none;
    }

    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 992px) {

        .category-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* =========================================
   MOBILE VIEW
========================================= */

    @media (max-width: 768px) {

        .category-section {
            padding: 10px 0 40px;
        }

        .category-header {
            padding: 0 14px;
        }

        .category-header h3 {
            font-size: 24px;
        }

        .category-header p {
            font-size: 13px;
        }

        /* HIDE DESKTOP GRID */
        .category-grid {
            display: none;
        }

        /* WRAPPER */
        .category-slider-wrapper {
            position: relative;
        }

        /* SLIDER */
        .category-slider {
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            gap: 14px;
            padding: 4px 14px 14px;

            scroll-snap-type: x proximity;

            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            scroll-behavior: smooth;

            cursor: grab;
            touch-action: pan-x;
        }

        .category-slider::-webkit-scrollbar {
            display: none;
        }

        .category-slider:active {
            cursor: grabbing;
        }

        /* CARD WIDTH */
        .category-slide {
            flex: 0 0 78%;
            max-width: 78%;
            scroll-snap-align: start;
        }

        /* CARD */
        .category-card {
            height: 240px;
            border-radius: 20px;
        }

        .category-content h5 {
            font-size: 20px;
        }

        /* =====================================
       NAVIGATION BUTTONS
    ===================================== */

        .category-nav {
            position: absolute;
            top: 45%;
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-nav i {
            font-size: 18px;
            color: #111;
        }

        .prev-btn {
            left: 6px;
        }

        .next-btn {
            right: 6px;
        }

        /* =====================================
       INDICATORS
    ===================================== */

        .slider-indicators {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .slider-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #d4d4d4;
            transition: 0.3s;
        }

        .slider-dot.active {
            width: 24px;
            border-radius: 20px;
            background: #111;
        }
    }
</style>

<section class="category-section">

    <div class="container-fluid">

        <!-- HEADER -->
        <div class="category-header">

            <h3>Shop by Category</h3>

            <p>
                Explore premium collections curated for your lifestyle
            </p>

        </div>

        <!-- =====================================
             DESKTOP GRID
        ====================================== -->

        <div class="category-grid">

            <?php foreach ($categories as $c): ?>
                <?php if ($c['parent_id'] == null): ?>

                    <a href="/category/<?= $c['slug'] ?>"
                        class="text-decoration-none">

                        <div class="category-card">

                            <img src="/uploads/categories/<?= $c['image'] ?? 'default.jpg' ?>">

                            <div class="category-overlay">

                                <div class="category-content">

                                    <h5><?= $c['name'] ?></h5>

                                    <span>
                                        Explore Collection →
                                    </span>

                                </div>

                            </div>

                        </div>

                    </a>

                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <!-- =====================================
     MOBILE SLIDER
====================================== -->

        <div class="category-slider-wrapper">

            <!-- LEFT BUTTON -->
            <button class="category-nav prev-btn" id="prevCategory">
                <i class="bi bi-chevron-left"></i>
            </button>

            <!-- SLIDER -->
            <div class="category-slider" id="categorySlider">

                <?php $dotIndex = 0; ?>

                <?php foreach ($categories as $c): ?>
                    <?php if ($c['parent_id'] == null): ?>

                        <div class="category-slide">

                            <a href="/category/<?= $c['slug'] ?>"
                                class="text-decoration-none">

                                <div class="category-card">

                                    <img src="/uploads/categories/<?= $c['image'] ?? 'default.jpg' ?>">

                                    <div class="category-overlay">

                                        <div class="category-content">

                                            <h5><?= $c['name'] ?></h5>

                                            <span>
                                                Explore Collection →
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </a>

                        </div>

                        <?php $dotIndex++; ?>

                    <?php endif; ?>
                <?php endforeach; ?>

            </div>

            <!-- RIGHT BUTTON -->
            <button class="category-nav next-btn" id="nextCategory">
                <i class="bi bi-chevron-right"></i>
            </button>

        </div>

        <!-- =====================================
     MOBILE INDICATORS
====================================== -->

        <div class="slider-indicators" id="sliderDots">

            <?php for ($i = 0; $i < $dotIndex; $i++): ?>

                <div class="slider-dot <?= $i == 0 ? 'active' : '' ?>"></div>

            <?php endfor; ?>

        </div>

</section>

<script>
    const slider = document.getElementById('categorySlider');

    const dots = document.querySelectorAll('.slider-dot');

    const prevBtn = document.getElementById('prevCategory');

    const nextBtn = document.getElementById('nextCategory');

    if (slider) {

        const getSlideWidth = () => {
            return slider.querySelector('.category-slide').offsetWidth + 14;
        };

        // NEXT
        nextBtn.addEventListener('click', () => {

            slider.scrollBy({
                left: getSlideWidth(),
                behavior: 'smooth'
            });

        });

        // PREV
        prevBtn.addEventListener('click', () => {

            slider.scrollBy({
                left: -getSlideWidth(),
                behavior: 'smooth'
            });

        });

        // DOT ACTIVE
        slider.addEventListener('scroll', () => {

            const index = Math.round(
                slider.scrollLeft / getSlideWidth()
            );

            dots.forEach(dot => dot.classList.remove('active'));

            if (dots[index]) {
                dots[index].classList.add('active');
            }

        });

    }
</script>
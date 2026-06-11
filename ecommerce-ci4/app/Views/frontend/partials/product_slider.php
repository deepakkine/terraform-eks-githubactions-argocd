<style>
    /* ================================
   PREMIUM PRODUCT SLIDER
================================ */

    .product-section {
        padding: 40px 0;
    }

    .product-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .product-title {
        font-size: 20px;
        font-weight: 700;
        color: #111;
        letter-spacing: -0.2px;
    }

    /* ================================
   SLIDER WRAPPER
================================ */

    .product-slider-wrapper {
        position: relative;
    }

    /* ================================
   TRACK
================================ */

    .product-track {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding-bottom: 10px;

        scrollbar-width: none;
    }

    .product-track::-webkit-scrollbar {
        display: none;
    }

    /* ================================
   CARD (SMALL + PREMIUM)
================================ */

    .product-card {
        flex: 0 0 auto;
        width: 220px;
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        transition: 0.25s ease;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .product-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: #f5f5f5;
    }

    /* TEXT */

    .product-info {
        padding: 10px;
    }

    .product-name {
        font-size: 14px;
        font-weight: 600;
        color: #222;
        margin-bottom: 6px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-price {
        font-size: 15px;
        font-weight: 700;
        color: #111;
    }

    /* ================================
   ARROWS (HIDDEN DEFAULT)
================================ */

    .slider-btn {
        position: absolute;
        top: 40%;
        transform: translateY(-50%);
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid #eee;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
        transition: 0.3s;
    }

    .product-slider-wrapper:hover .slider-btn {
        opacity: 1;
        pointer-events: auto;
    }

    .slider-prev {
        left: -10px;
    }

    .slider-next {
        right: -10px;
    }

    /* ================================
   MOBILE
================================ */

    @media(max-width:768px) {

        .product-card {
            width: 70%;
        }

        .slider-btn {
            display: none;
        }
    }
</style>

<section class="product-section">

    <!-- HEADER -->
    <div class="product-header">
        <div class="product-title"><?= $title ?></div>
    </div>

    <!-- SLIDER -->
    <div class="product-slider-wrapper">

        <button class="slider-btn slider-prev">‹</button>

        <div class="product-track">

            <?php foreach ($products as $p): ?>

                <a href="/product/<?= $p['slug'] ?>" class="product-card">

                    <img
                        data-src="/uploads/products/<?= $p['image'] ?>"
                        class="product-img lazy">

                    <div class="product-info">

                        <div class="product-name">
                            <?= $p['name'] ?>
                        </div>

                        <div class="product-price">
                            ₹<?= $p['price'] ?>
                        </div>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>

        <button class="slider-btn slider-next">›</button>

    </div>

</section>

<script>
    // ================================
    // SIMPLE SLIDER LOGIC
    // ================================

    document.querySelectorAll('.product-slider-wrapper').forEach(wrapper => {

        const track = wrapper.querySelector('.product-track');
        const next = wrapper.querySelector('.slider-next');
        const prev = wrapper.querySelector('.slider-prev');

        const scrollAmount = 260;

        next?.addEventListener('click', () => {
            track.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        prev?.addEventListener('click', () => {
            track.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        // SHOW ARROWS ONLY IF SCROLL EXISTS
        function checkScroll() {
            if (track.scrollWidth > track.clientWidth) {
                wrapper.classList.add('has-scroll');
            }
        }

        checkScroll();
    });

    // ================================
    // LAZY LOADING IMAGES
    // ================================

    const lazyImages = document.querySelectorAll("img.lazy");

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove("lazy");
                obs.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => observer.observe(img));
</script>
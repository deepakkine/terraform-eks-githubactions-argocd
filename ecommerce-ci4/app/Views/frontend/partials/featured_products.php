    <?php if (!empty($featuredProducts)): ?>

        <section class="ecom-section container">

            <div class="ecom-title">Featured Products</div>

            <div class="ecom-slider">

                <button class="ecom-btn ecom-left" onclick="scrollEcom('featured', -300)">‹</button>

                <div class="ecom-track" id="featured">

                    <?php foreach ($featuredProducts as $p): ?>
                        <?= view('frontend/partials/product_card', ['p' => $p]) ?>
                    <?php endforeach; ?>

                </div>

                <button class="ecom-btn ecom-right" onclick="scrollEcom('featured', 300)">›</button>

            </div>

        </section>

    <?php endif; ?>
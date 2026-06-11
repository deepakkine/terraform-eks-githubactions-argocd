<?php if (!empty($sponsoredProducts)): ?>

    <section class="ecom-section container">

        <div class="ecom-title">Sponsored Products</div>

        <div class="ecom-slider">

            <button class="ecom-btn ecom-left" onclick="scrollEcom('sponsored', -300)">‹</button>

            <div class="ecom-track" id="sponsored">

                <?php foreach ($sponsoredProducts as $p): ?>
                    <?= view('frontend/partials/product_card', ['p' => $p]) ?>
                <?php endforeach; ?>

            </div>

            <button class="ecom-btn ecom-right" onclick="scrollEcom('sponsored', 300)">›</button>

        </div>

    </section>

<?php endif; ?>
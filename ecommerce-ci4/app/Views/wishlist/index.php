<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>My Wishlist</h3>

<div class="row">

    <?php foreach ($items as $item): ?>

        <div class="col-md-3">

            <div class="card p-2 mb-3">

                <img src="/uploads/products/<?= $item['image'] ?>" height="150">

                <h6><?= $item['name'] ?></h6>
                <p>₹<?= $item['price'] ?></p>

                <a href="/cart/add/<?= $item['product_id'] ?>" class="btn btn-dark btn-sm">
                    Move to Cart
                </a>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>
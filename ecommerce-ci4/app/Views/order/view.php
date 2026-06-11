<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container">

    <!-- 🔹 Order Header -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">

            <div>
                <h5 class="mb-1">Order #<?= $order['id'] ?></h5>
                <small class="text-muted">
                    <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?>
                </small>
            </div>

            <!-- Status Badge -->
            <?php
            $statusClass = 'secondary';

            if ($order['status'] == 'placed') $statusClass = 'warning';
            elseif ($order['status'] == 'processing') $statusClass = 'info';
            elseif ($order['status'] == 'shipped') $statusClass = 'primary';
            elseif ($order['status'] == 'delivered') $statusClass = 'success';
            ?>

            <span class="badge bg-<?= $statusClass ?> p-2">
                <?= ucfirst($order['status']) ?>
            </span>

        </div>
    </div>

    <!-- 🔹 Shipping + Summary -->
    <div class="row mb-4">

        <!-- Shipping Details -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">

                    <h6 class="mb-3">📦 Shipping Details</h6>

                    <p class="mb-1"><b><?= $order['name'] ?></b></p>
                    <p class="mb-1"><?= $order['phone'] ?></p>

                    <p class="text-muted mb-0">
                        <?= $order['address'] ?><br>
                        <?= $order['city'] ?>, <?= $order['state'] ?><br>
                        <?= $order['pincode'] ?>
                    </p>

                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">

                    <h6 class="mb-3">💳 Order Summary</h6>

                    <?php
                    $totalQty = 0;
                    foreach ($items as $i) {
                        $totalQty += $i['qty'];
                    }
                    ?>

                    <p class="mb-1">Total Items: <b><?= $totalQty ?></b></p>
                    <p class="mb-1">Order Total:</p>

                    <h4 class="text-primary">₹<?= $order['total'] ?></h4>

                </div>
            </div>
        </div>

    </div>

    <!-- 🔹 Product List -->
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3">🛒 Products</h5>

            <?php foreach ($items as $i): ?>

                <div class="d-flex align-items-center border-bottom py-3">

                    <!-- Product Image -->
                    <img src="/uploads/products/<?= $i['product_image'] ?>"
                        width="80"
                        class="me-3 rounded">

                    <!-- Product Info -->
                    <div class="flex-grow-1">
                        <h6 class="mb-1"><?= $i['product_name'] ?></h6>
                        <small class="text-muted">
                            Quantity: <?= $i['qty'] ?>
                        </small>
                    </div>

                    <!-- Price -->
                    <div>
                        <b>₹<?= $i['price'] ?></b>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
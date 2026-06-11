<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">My Orders</h3>

<?php if (empty($orders)): ?>
    <div class="alert alert-info">No orders found.</div>
<?php endif; ?>

<?php foreach ($orders as $o): ?>

    <div class="card mb-3 shadow-sm">

        <div class="card-body">

            <!-- Top Row -->
            <div class="d-flex justify-content-between">

                <div>
                    <h5 class="mb-1">Order #<?= $o['id'] ?></h5>
                    <small class="text-muted">
                        <?= date('d M Y', strtotime($o['created_at'])) ?>
                    </small>
                </div>

                <div>
                    <!-- Status Badge -->
                    <?php
                    $statusClass = 'secondary';

                    if ($o['status'] == 'placed') $statusClass = 'warning';
                    elseif ($o['status'] == 'processing') $statusClass = 'info';
                    elseif ($o['status'] == 'shipped') $statusClass = 'primary';
                    elseif ($o['status'] == 'delivered') $statusClass = 'success';
                    ?>
                    <span class="badge bg-<?= $statusClass ?>">
                        <?= ucfirst($o['status']) ?>
                    </span>
                </div>

            </div>

            <hr>

            <!-- Middle Row -->
            <div class="row">

                <div class="col-md-8">
                    <p class="mb-1"><b>Shipping:</b></p>
                    <small>
                        <?= $o['address'] ?>,
                        <?= $o['city'] ?>,
                        <?= $o['state'] ?> - <?= $o['pincode'] ?>
                    </small>
                </div>

                <div class="col-md-4 text-end">
                    <h5 class="text-primary">₹<?= $o['total'] ?></h5>
                </div>

            </div>

            <hr>

            <!-- Action -->
            <div class="text-end">
                <a href="/orders/<?= $o['id'] ?>" class="btn btn-sm btn-dark">
                    View Details
                </a>
            </div>

        </div>

    </div>

<?php endforeach; ?>

<?= $this->endSection() ?>
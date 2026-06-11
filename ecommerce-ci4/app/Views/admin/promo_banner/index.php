<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">Promo Banners</h3>
        <p class="text-muted mb-0">
            Manage homepage promo banners
        </p>
    </div>

    <a href="/admin/promo-banner/create" class="btn btn-dark rounded-pill px-4">
        + Add Banner
    </a>

</div>

<div class="row">

    <?php foreach ($banners as $b): ?>

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                <img src="/uploads/promo/<?= $b['image'] ?>"
                    style="height:220px; object-fit:cover;">

                <div class="card-body">

                    <h5 class="fw-bold">
                        <?= $b['title'] ?>
                    </h5>

                    <p class="text-muted small">
                        <?= $b['subtitle'] ?>
                    </p>

                    <span class="badge <?= $b['status'] ? 'bg-success' : 'bg-secondary' ?>">
                        <?= $b['status'] ? 'Active' : 'Disabled' ?>
                    </span>

                    <div class="d-flex gap-2 mt-3">

                        <a href="/admin/promo-banner/edit/<?= $b['id'] ?>"
                            class="btn btn-outline-dark btn-sm rounded-pill">
                            Edit
                        </a>

                        <a href="/admin/promo-banner/delete/<?= $b['id'] ?>"
                            onclick="return confirm('Delete banner?')"
                            class="btn btn-outline-danger btn-sm rounded-pill">
                            Delete
                        </a>

                    </div>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>
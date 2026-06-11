<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .coupon-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 28px;
        flex-wrap: wrap;
    }

    .coupon-page-title h3 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 4px;
        color: #111827;
    }

    .coupon-page-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .add-coupon-btn {
        border: none;
        border-radius: 14px;
        padding: 12px 18px;
        background: linear-gradient(135deg, #111827, #1f2937);
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        transition: .3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .add-coupon-btn:hover {
        transform: translateY(-2px);
        color: #fff;
    }

    /* GRID */
    .coupon-grid {
        row-gap: 24px;
    }

    /* CARD */
    .coupon-card {
        position: relative;
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        height: 100%;
        transition: .3s ease;
    }

    .coupon-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.10);
    }

    .coupon-top {
        padding: 22px;
        background: linear-gradient(135deg, #111827, #374151);
        color: #fff;
        position: relative;
    }

    .coupon-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: .8;
        margin-bottom: 8px;
    }

    .coupon-code {
        font-size: 30px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .coupon-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        background: rgba(255, 255, 255, 0.14);
        backdrop-filter: blur(10px);
    }

    .coupon-body {
        padding: 22px;
    }

    .coupon-info {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid #f1f5f9;
    }

    .coupon-info:last-child {
        margin-bottom: 0;
    }

    .coupon-info label {
        display: block;
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 4px;
    }

    .coupon-info strong {
        color: #111827;
        font-size: 15px;
    }

    .coupon-expiry {
        color: #dc2626;
        font-weight: 600;
    }

    .coupon-footer {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .coupon-btn {
        flex: 1;
        border-radius: 12px;
        padding: 11px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
    }

    .btn-edit {
        background: #eff6ff;
        color: #2563eb;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .coupon-btn:hover {
        transform: translateY(-2px);
    }

    .status-active {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
    }

    .status-inactive {
        background: rgba(239, 68, 68, .15);
        color: #ef4444;
    }

    /* MOBILE */
    @media(max-width:768px) {

        .coupon-page-title h3 {
            font-size: 22px;
        }

        .coupon-code {
            font-size: 24px;
        }

        .coupon-top,
        .coupon-body {
            padding: 18px;
        }

        .coupon-footer {
            flex-direction: column;
        }

        .add-coupon-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- PAGE HEADER -->
<div class="coupon-page-header">

    <div class="coupon-page-title">
        <h3>🎟️ Coupon Management</h3>
        <p>
            Create and manage discount offers for customers
        </p>
    </div>

    <a href="/admin/coupon/create" class="add-coupon-btn">
        <i class="bi bi-plus-circle"></i>
        Add Coupon
    </a>

</div>

<!-- COUPON GRID -->
<div class="row coupon-grid">

    <?php foreach ($coupons as $c): ?>

        <div class="col-xl-4 col-lg-6 col-md-6 col-12">

            <div class="coupon-card">

                <!-- TOP -->
                <div class="coupon-top">

                    <div class="coupon-label">
                        Promo Coupon
                    </div>

                    <div class="coupon-code">
                        <?= $c['code'] ?>
                    </div>

                    <span class="coupon-badge <?= $c['status'] ? 'status-active' : 'status-inactive' ?>">

                        <?= $c['status'] ? 'Active Coupon' : 'Inactive Coupon' ?>

                    </span>

                </div>

                <!-- BODY -->
                <div class="coupon-body">

                    <div class="coupon-info">
                        <div>
                            <label>Discount Type</label>
                            <strong><?= strtoupper($c['type']) ?></strong>
                        </div>

                        <div class="text-end">
                            <label>Discount Value</label>
                            <strong>₹<?= $c['value'] ?></strong>
                        </div>
                    </div>

                    <div class="coupon-info">
                        <div>
                            <label>Minimum Order</label>
                            <strong>₹<?= $c['min_amount'] ?></strong>
                        </div>

                        <div class="text-end">
                            <label>Max Discount</label>
                            <strong>₹<?= $c['max_discount'] ?></strong>
                        </div>
                    </div>

                    <div class="coupon-info">
                        <div>
                            <label>Usage</label>
                            <strong>
                                <?= $c['used_count'] ?> / <?= $c['usage_limit'] ?>
                            </strong>
                        </div>

                        <div class="text-end">
                            <label>Expiry</label>
                            <strong class="coupon-expiry">
                                <?= date('d M Y', strtotime($c['expires_at'])) ?>
                            </strong>
                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="coupon-footer">

                        <a href="/admin/coupon/edit/<?= $c['id'] ?>"
                            class="coupon-btn btn-edit">

                            <i class="bi bi-pencil-square"></i>
                            Edit

                        </a>

                        <a href="/admin/coupon/delete/<?= $c['id'] ?>"
                            class="coupon-btn btn-delete"
                            onclick="return confirm('Delete this coupon?')">

                            <i class="bi bi-trash"></i>
                            Delete

                        </a>

                    </div>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>
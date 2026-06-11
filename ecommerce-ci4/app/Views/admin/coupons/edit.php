<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .coupon-page {
        padding: 10px;
    }

    .page-title {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
    }

    .page-subtitle {
        color: #6b7280;
        font-size: 14px;
    }

    .coupon-card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
    }

    .coupon-card-body {
        padding: 32px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control,
    .form-select {
        border-radius: 14px;
        border: 1px solid #e5e7eb;
        padding: 14px 16px;
        min-height: 52px;
        font-size: 15px;
        box-shadow: none !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #111827;
    }

    .field-info {
        font-size: 13px;
        color: #6b7280;
        margin-top: 8px;
        line-height: 1.6;
    }

    .coupon-preview {
        background: linear-gradient(135deg, #111827, #1f2937);
        color: #fff;
        border-radius: 22px;
        padding: 28px;
        height: 100%;
        position: sticky;
        top: 20px;
    }

    .preview-badge {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 8px 14px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        margin-bottom: 22px;
    }

    .coupon-code {
        font-size: 34px;
        font-weight: 900;
        letter-spacing: 2px;
        margin-bottom: 12px;
    }

    .coupon-value {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .coupon-meta {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        padding: 16px;
        margin-top: 18px;
    }

    .coupon-meta-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
        font-size: 14px;
    }

    .coupon-meta-item:last-child {
        margin-bottom: 0;
    }

    .update-btn {
        border: none;
        background: #111827;
        color: #fff;
        width: 100%;
        padding: 15px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 15px;
        transition: .3s ease;
    }

    .update-btn:hover {
        transform: translateY(-2px);
        background: #000;
    }

    .status-badge {
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
        display: inline-block;
    }

    .status-active {
        background: #dcfce7;
        color: #15803d;
    }

    .status-inactive {
        background: #fee2e2;
        color: #dc2626;
    }

    @media(max-width: 991px) {

        .coupon-preview {
            position: relative;
            margin-top: 24px;
        }

    }

    @media(max-width: 768px) {

        .coupon-card-body {
            padding: 20px;
        }

        .page-title {
            font-size: 22px;
        }

        .coupon-code {
            font-size: 26px;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            font-size: 14px;
        }

    }
</style>

<div class="coupon-page">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h2 class="page-title mb-1">
                ✏️ Edit Coupon
            </h2>

            <div class="page-subtitle">
                Update coupon details, limits, expiry and status
            </div>
        </div>

        <a href="/admin/coupons" class="btn btn-outline-dark rounded-pill px-4">
            ← Back
        </a>

    </div>

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-xl-8">

            <div class="coupon-card">

                <div class="coupon-card-body">

                    <form method="post" action="/admin/coupon/update/<?= $coupon['id'] ?>">

                        <div class="section-title">
                            Coupon Information
                        </div>

                        <div class="row">

                            <!-- CODE -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Coupon Code
                                </label>

                                <input type="text"
                                    id="couponCode"
                                    name="code"
                                    value="<?= $coupon['code'] ?>"
                                    class="form-control"
                                    required>

                                <div class="field-info">
                                    Example: SAVE100, WELCOME10
                                </div>

                            </div>

                            <!-- TYPE -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Discount Type
                                </label>

                                <select name="type"
                                    id="couponType"
                                    class="form-select">

                                    <option value="percent"
                                        <?= $coupon['type'] == 'percent' ? 'selected' : '' ?>>
                                        Percentage Discount
                                    </option>

                                    <option value="flat"
                                        <?= $coupon['type'] == 'flat' ? 'selected' : '' ?>>
                                        Flat Amount Discount
                                    </option>

                                </select>

                                <div class="field-info">
                                    Choose how discount should apply
                                </div>

                            </div>

                            <!-- VALUE -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Discount Value
                                </label>

                                <input type="number"
                                    id="couponValue"
                                    name="value"
                                    value="<?= $coupon['value'] ?>"
                                    class="form-control">

                                <div class="field-info">
                                    Example: 10 or ₹100
                                </div>

                            </div>

                            <!-- MIN -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Minimum Cart Amount
                                </label>

                                <input type="number"
                                    name="min_amount"
                                    value="<?= $coupon['min_amount'] ?>"
                                    class="form-control">

                                <div class="field-info">
                                    Coupon works only above this amount
                                </div>

                            </div>

                            <!-- MAX -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Maximum Discount
                                </label>

                                <input type="number"
                                    name="max_discount"
                                    value="<?= $coupon['max_discount'] ?>"
                                    class="form-control">

                                <div class="field-info">
                                    Only for percentage discounts
                                </div>

                            </div>

                            <!-- LIMIT -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Usage Limit
                                </label>

                                <input type="number"
                                    name="usage_limit"
                                    value="<?= $coupon['usage_limit'] ?>"
                                    class="form-control">

                                <div class="field-info">
                                    Total coupon usage limit
                                </div>

                            </div>

                            <!-- EXPIRY -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Expiry Date
                                </label>

                                <input type="datetime-local"
                                    name="expires_at"
                                    value="<?= $coupon['expires_at'] ? date('Y-m-d\TH:i', strtotime($coupon['expires_at'])) : '' ?>"
                                    class="form-control">

                            </div>

                            <!-- STATUS -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Status
                                </label>

                                <select name="status"
                                    class="form-select">

                                    <option value="1"
                                        <?= $coupon['status'] ? 'selected' : '' ?>>
                                        Active
                                    </option>

                                    <option value="0"
                                        <?= !$coupon['status'] ? 'selected' : '' ?>>
                                        Inactive
                                    </option>

                                </select>

                            </div>

                        </div>

                        <button class="update-btn">
                            Update Coupon
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-xl-4">

            <div class="coupon-preview">

                <div class="preview-badge">

                    <i class="bi bi-ticket-perforated"></i>

                    Coupon Preview

                </div>

                <div class="coupon-code" id="previewCode">
                    <?= $coupon['code'] ?>
                </div>

                <div class="coupon-value" id="previewValue">

                    <?php if ($coupon['type'] == 'percent'): ?>

                        <?= $coupon['value'] ?>% OFF

                    <?php else: ?>

                        ₹<?= $coupon['value'] ?> OFF

                    <?php endif; ?>

                </div>

                <div class="<?= $coupon['status'] ? 'status-badge status-active' : 'status-badge status-inactive' ?>">

                    <?= $coupon['status'] ? 'Active Coupon' : 'Inactive Coupon' ?>

                </div>

                <div class="coupon-meta">

                    <div class="coupon-meta-item">
                        <span>Usage</span>
                        <strong>
                            <?= $coupon['used_count'] ?> / <?= $coupon['usage_limit'] ?>
                        </strong>
                    </div>

                    <div class="coupon-meta-item">
                        <span>Min Order</span>
                        <strong>
                            ₹<?= $coupon['min_amount'] ?>
                        </strong>
                    </div>

                    <div class="coupon-meta-item">
                        <span>Max Discount</span>
                        <strong>
                            ₹<?= $coupon['max_discount'] ?>
                        </strong>
                    </div>

                    <div class="coupon-meta-item">
                        <span>Expires</span>
                        <strong>
                            <?= $coupon['expires_at'] ?>
                        </strong>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    const codeInput = document.getElementById('couponCode');
    const valueInput = document.getElementById('couponValue');
    const typeInput = document.getElementById('couponType');

    const previewCode = document.getElementById('previewCode');
    const previewValue = document.getElementById('previewValue');

    function updatePreview() {

        previewCode.innerText = codeInput.value || 'COUPON';

        if (typeInput.value === 'percent') {

            previewValue.innerText = valueInput.value + '% OFF';

        } else {

            previewValue.innerText = '₹' + valueInput.value + ' OFF';

        }

    }

    codeInput.addEventListener('input', updatePreview);
    valueInput.addEventListener('input', updatePreview);
    typeInput.addEventListener('change', updatePreview);
</script>

<?= $this->endSection() ?>
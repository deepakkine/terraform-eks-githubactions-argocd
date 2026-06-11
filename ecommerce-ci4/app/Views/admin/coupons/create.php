<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .coupon-page {
        padding: 10px 0;
    }

    .coupon-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .coupon-title h3 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 4px;
        color: #111827;
    }

    .coupon-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .coupon-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #edf0f7;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .coupon-card-header {
        padding: 22px 26px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .coupon-card-header h5 {
        margin: 0;
        font-weight: 700;
        color: #111827;
    }

    .coupon-body {
        padding: 26px;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 14px;
        min-height: 50px;
        border: 1px solid #dbe3ef;
        box-shadow: none !important;
        padding: 12px 16px;
        font-size: 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #111827;
    }

    .coupon-info {
        background: linear-gradient(135deg, #111827, #1f2937);
        border-radius: 22px;
        padding: 24px;
        color: white;
        height: 100%;
    }

    .coupon-info h5 {
        font-weight: 700;
        margin-bottom: 18px;
    }

    .coupon-info-box {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        padding: 14px 16px;
        margin-bottom: 14px;
    }

    .coupon-info-box h6 {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 6px;
    }

    .coupon-info-box p {
        margin: 0;
        font-weight: 700;
        font-size: 15px;
    }

    .save-btn {
        background: #111827;
        color: white;
        border: none;
        border-radius: 14px;
        padding: 14px 24px;
        font-weight: 700;
        transition: .3s ease;
        width: 100%;
    }

    .save-btn:hover {
        background: #000;
        transform: translateY(-2px);
    }

    .back-btn {
        border-radius: 12px;
        padding: 10px 16px;
        font-weight: 600;
    }

    @media(max-width:768px) {

        .coupon-title h3 {
            font-size: 22px;
        }

        .coupon-body {
            padding: 18px;
        }

        .coupon-card-header {
            padding: 18px;
        }

        .form-control,
        .form-select {
            min-height: 46px;
        }

    }
</style>

<div class="coupon-page">

    <!-- HEADER -->
    <div class="coupon-header">

        <div class="coupon-title">
            <h3>🎟️ Create Coupon</h3>
            <p>Create discount offers for customers</p>
        </div>

        <a href="/admin/coupons" class="btn btn-outline-dark back-btn">
            <i class="bi bi-arrow-left"></i> Back
        </a>

    </div>

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-lg-8">

            <div class="coupon-card">

                <div class="coupon-card-header">
                    <h5>Coupon Details</h5>

                    <span class="badge bg-dark px-3 py-2">
                        Admin Panel
                    </span>
                </div>

                <div class="coupon-body">

                    <form method="post" action="/admin/coupon/store">

                        <div class="row">

                            <!-- CODE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Coupon Code</label>

                                <input type="text"
                                    name="code"
                                    class="form-control"
                                    placeholder="e.g SAVE50">
                            </div>

                            <!-- TYPE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Coupon Type</label>

                                <select name="type" class="form-select">

                                    <option value="flat">
                                        Flat Discount
                                    </option>

                                    <option value="percent">
                                        Percentage Discount
                                    </option>

                                </select>
                            </div>

                            <!-- VALUE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Discount Value</label>

                                <input type="number"
                                    name="value"
                                    class="form-control"
                                    placeholder="Enter value">
                            </div>

                            <!-- MIN AMOUNT -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Minimum Cart Amount</label>

                                <input type="number"
                                    name="min_amount"
                                    class="form-control"
                                    placeholder="Minimum order amount">
                            </div>

                            <!-- MAX DISCOUNT -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Maximum Discount</label>

                                <input type="number"
                                    name="max_discount"
                                    class="form-control"
                                    placeholder="Max allowed discount">
                            </div>

                            <!-- USAGE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Usage Limit</label>

                                <input type="number"
                                    name="usage_limit"
                                    class="form-control"
                                    placeholder="How many users can use">
                            </div>

                            <!-- EXPIRY -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Expiry Date & Time</label>

                                <input type="datetime-local"
                                    name="expires_at"
                                    class="form-control">
                            </div>

                            <!-- STATUS -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Coupon Status</label>

                                <select name="status" class="form-select">

                                    <option value="1">
                                        Active
                                    </option>

                                    <option value="0">
                                        Inactive
                                    </option>

                                </select>
                            </div>

                        </div>

                        <button class="save-btn">
                            <i class="bi bi-check-circle"></i>
                            Save Coupon
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-4">

            <div class="coupon-info">

                <h5>📌 Coupon Tips</h5>

                <div class="coupon-info-box">
                    <h6>Flat Discount</h6>
                    <p>Example: ₹100 OFF</p>
                </div>

                <div class="coupon-info-box">
                    <h6>Percentage Discount</h6>
                    <p>Example: 20% OFF</p>
                </div>

                <div class="coupon-info-box">
                    <h6>Usage Limit</h6>
                    <p>Set how many users can use coupon</p>
                </div>

                <div class="coupon-info-box">
                    <h6>Expiry</h6>
                    <p>Coupon automatically expires after date</p>
                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
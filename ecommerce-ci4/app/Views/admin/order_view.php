<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       PAGE HEADER
    ========================================= */

    .order-view-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .order-view-title h3 {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
    }

    .order-view-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       PREMIUM CARD
    ========================================= */

    .premium-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #eef2f7;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.05);
        overflow: hidden;
        height: 100%;
    }

    .premium-card-body {
        padding: 24px;
    }

    /* =========================================
       SECTION TITLE
    ========================================= */

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
    }

    /* =========================================
       TABLE
    ========================================= */

    .order-table {
        margin: 0;
        min-width: 700px;
    }

    .order-table thead th {
        background: #f8fafc;
        border: none;
        padding: 16px;
        font-size: 13px;
        text-transform: uppercase;
        color: #64748b;
        letter-spacing: .3px;
    }

    .order-table tbody td {
        padding: 18px 16px;
        border-top: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .order-table tbody tr:hover {
        background: #fafcff;
    }

    /* =========================================
       PRODUCT IMAGE
    ========================================= */

    .product-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 14px;
        border: 1px solid #e5e7eb;
    }

    /* =========================================
       PRODUCT INFO
    ========================================= */

    .product-name {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .variant-text {
        font-size: 13px;
        color: #6b7280;
    }

    /* =========================================
       PRICE
    ========================================= */

    .price-text {
        font-size: 16px;
        font-weight: 800;
        color: #059669;
    }

    /* =========================================
       STATUS CARD
    ========================================= */

    .status-label {
        font-size: 13px;
        font-weight: 700;
        color: #6b7280;
        margin-bottom: 10px;
        display: block;
    }

    .status-select {
        border-radius: 14px;
        padding: 12px 14px;
        border: 1px solid #dbe3ee;
        font-size: 14px;
        box-shadow: none !important;
    }

    .status-select:focus {
        border-color: #111827;
    }

    /* =========================================
       BUTTON
    ========================================= */

    .update-btn {
        width: 100%;
        border: none;
        border-radius: 14px;
        padding: 13px;
        background: #111827;
        color: #fff;
        font-weight: 700;
        transition: .3s ease;
    }

    .update-btn:hover {
        background: #000;
        transform: translateY(-2px);
    }

    /* =========================================
       TOTAL BOX
    ========================================= */

    .total-box {
        margin-top: 24px;
        padding: 18px;
        border-radius: 18px;
        background: #f8fafc;
        border: 1px solid #eef2f7;
    }

    .total-box small {
        color: #6b7280;
        font-size: 13px;
        display: block;
        margin-bottom: 8px;
    }

    .total-box h2 {
        margin: 0;
        font-size: 32px;
        font-weight: 800;
        color: #059669;
    }

    /* =========================================
       ORDER STATUS BADGE
    ========================================= */

    .current-status {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
    }

    .placed {
        background: #e5e7eb;
        color: #374151;
    }

    .processing {
        background: #fef3c7;
        color: #92400e;
    }

    .shipped {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .delivered {
        background: #dcfce7;
        color: #166534;
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .order-view-title h3 {
            font-size: 22px;
        }

        .premium-card {
            border-radius: 18px;
        }

        .premium-card-body {
            padding: 18px;
        }

        .section-title {
            font-size: 18px;
        }

        .product-image {
            width: 58px;
            height: 58px;
        }

        .total-box h2 {
            font-size: 26px;
        }

        .order-table thead th,
        .order-table tbody td {
            padding: 14px;
        }
    }
</style>

<!-- =========================================
     PAGE HEADER
========================================= -->

<div class="order-view-header">

    <div class="order-view-title">

        <h3>
            📦 Order #<?= $order['id'] ?>
        </h3>

        <p>
            Manage order items, delivery status and customer purchase details
        </p>

    </div>

    <?php
    $statusClass = $order['status'];
    ?>

    <span class="current-status <?= $statusClass ?>">

        <?= ucfirst($order['status']) ?>

    </span>

</div>

<div class="row g-4">

    <!-- =========================================
         ORDER ITEMS
    ========================================= -->

    <div class="col-lg-8">

        <div class="premium-card">

            <div class="premium-card-body">

                <h5 class="section-title">
                    🛒 Order Items
                </h5>

                <div class="table-responsive">

                    <table class="table order-table align-middle">

                        <thead>

                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Variant</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($items as $i): ?>

                                <tr>

                                    <!-- IMAGE -->
                                    <td>

                                        <img src="/uploads/products/<?= $i['product_image'] ?>"
                                            class="product-image">

                                    </td>

                                    <!-- PRODUCT -->
                                    <td>

                                        <div class="product-name">

                                            <?= $i['product_name'] ?>

                                        </div>

                                    </td>

                                    <!-- VARIANT -->
                                    <td>

                                        <div class="variant-text">

                                            <?= $i['variant_color'] ?> /
                                            <?= $i['variant_size'] ?>

                                        </div>

                                    </td>

                                    <!-- QTY -->
                                    <td>

                                        <strong>
                                            <?= $i['qty'] ?>
                                        </strong>

                                    </td>

                                    <!-- PRICE -->
                                    <td>

                                        <div class="price-text">

                                            ₹<?= number_format($i['price']) ?>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <!-- =========================================
         STATUS PANEL
    ========================================= -->

    <div class="col-lg-4">

        <div class="premium-card">

            <div class="premium-card-body">

                <h5 class="section-title">
                    📊 Order Status
                </h5>

                <form method="post"
                    action="/admin/order/status/<?= $order['id'] ?>">

                    <label class="status-label">

                        Update Current Status

                    </label>

                    <select name="status"
                        class="form-select status-select mb-4">

                        <option value="placed"
                            <?= $order['status'] == 'placed' ? 'selected' : '' ?>>

                            Placed

                        </option>

                        <option value="processing"
                            <?= $order['status'] == 'processing' ? 'selected' : '' ?>>

                            Processing

                        </option>

                        <option value="shipped"
                            <?= $order['status'] == 'shipped' ? 'selected' : '' ?>>

                            Shipped

                        </option>

                        <option value="delivered"
                            <?= $order['status'] == 'delivered' ? 'selected' : '' ?>>

                            Delivered

                        </option>

                    </select>

                    <button class="update-btn">

                        Update Order Status

                    </button>

                </form>

                <!-- TOTAL -->

                <div class="total-box">

                    <small>
                        Total Order Amount
                    </small>

                    <h2>
                        ₹<?= number_format($order['total']) ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       PAGE HEADER
    ========================================= */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        gap: 15px;
        flex-wrap: wrap;
    }

    .page-title h3 {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
    }

    .page-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    .add-btn {
        background: #111827;
        color: #fff;
        border: none;
        padding: 12px 18px;
        border-radius: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s ease;
    }

    .add-btn:hover {
        background: #000;
        color: #fff;
        transform: translateY(-2px);
    }

    /* =========================================
       TABLE CARD
    ========================================= */

    .table-card {
        background: #fff;
        border-radius: 24px;
        padding: 22px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    /* =========================================
       TABLE
    ========================================= */

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 14px;
    }

    .custom-table thead th {
        font-size: 13px;
        text-transform: uppercase;
        color: #6b7280;
        font-weight: 700;
        border: none;
        padding-bottom: 10px;
    }

    .custom-table tbody tr {
        background: #f9fafb;
        transition: .3s ease;
    }

    .custom-table tbody tr:hover {
        background: #f3f4f6;
    }

    .custom-table td {
        padding: 18px 14px;
        vertical-align: middle;
        border: none;
    }

    .custom-table tbody tr td:first-child {
        border-top-left-radius: 18px;
        border-bottom-left-radius: 18px;
    }

    .custom-table tbody tr td:last-child {
        border-top-right-radius: 18px;
        border-bottom-right-radius: 18px;
    }

    /* =========================================
       PRODUCT INFO
    ========================================= */

    .product-info {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 220px;
    }

    .product-image {
        width: 70px;
        height: 70px;
        border-radius: 16px;
        object-fit: cover;
        background: #eee;
    }

    .product-details h6 {
        margin-bottom: 4px;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .product-details p {
        margin: 0;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.5;
    }

    /* =========================================
       PRICE
    ========================================= */

    .price-text {
        font-weight: 700;
        color: #111827;
        font-size: 15px;
    }

    /* =========================================
       STATUS
    ========================================= */

    .status-badge {
        padding: 7px 14px;
        border-radius: 40px;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .status-active {
        background: rgba(34, 197, 94, 0.12);
        color: #16a34a;
    }

    .status-disabled {
        background: rgba(239, 68, 68, 0.12);
        color: #dc2626;
    }

    /* =========================================
       ACTION BUTTONS
    ========================================= */

    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-btn {
        border: none;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s ease;
    }

    .btn-edit {
        background: rgba(59, 130, 246, 0.12);
        color: #2563eb;
    }

    .btn-enable {
        background: rgba(34, 197, 94, 0.12);
        color: #16a34a;
    }

    .btn-disable {
        background: rgba(245, 158, 11, 0.15);
        color: #d97706;
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.12);
        color: #dc2626;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    /* =========================================
       MOBILE CARDS
    ========================================= */

    .mobile-products {
        display: none;
    }

    .mobile-card {
        background: #fff;
        border-radius: 22px;
        padding: 16px;
        margin-bottom: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
    }

    .mobile-top {
        display: flex;
        gap: 14px;
        margin-bottom: 14px;
    }

    .mobile-image {
        width: 85px;
        height: 85px;
        border-radius: 16px;
        object-fit: cover;
    }

    .mobile-content h5 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 6px;
        color: #111827;
    }

    .mobile-content p {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .mobile-price {
        font-weight: 800;
        color: #111827;
        margin-bottom: 8px;
    }

    .mobile-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media(max-width: 992px) {

        .desktop-table {
            display: none;
        }

        .mobile-products {
            display: block;
        }

        .page-title h3 {
            font-size: 24px;
        }
    }
</style>

<!-- =========================================
     HEADER
========================================= -->

<div class="page-header">

    <div class="page-title">
        <h3>Product Management</h3>
        <p>Manage all products, status, pricing and inventory</p>
    </div>

    <a href="/admin/product/add" class="add-btn">
        <i class="bi bi-plus-lg"></i>
        Add Product
    </a>

</div>

<!-- =========================================
     DESKTOP TABLE
========================================= -->

<div class="table-card desktop-table">

    <table class="custom-table">

        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Status</th>
                <th width="260">Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($products as $p): ?>

                <tr>

                    <td>
                        #<?= $p['id'] ?>
                    </td>

                    <td>

                        <div class="product-info">

                            <img src="/uploads/products/<?= $p['image'] ?>"
                                class="product-image">

                            <div class="product-details">

                                <h6>
                                    <?= $p['name'] ?>
                                </h6>

                                <p>
                                    <?= substr(strip_tags($p['description']), 0, 60) ?>...
                                </p>

                            </div>

                        </div>

                    </td>

                    <td>

                        <div class="price-text">
                            ₹<?= number_format($p['price']) ?>
                        </div>

                    </td>

                    <td>

                        <?php if ($p['status']): ?>

                            <span class="status-badge status-active">
                                <i class="bi bi-check-circle-fill"></i>
                                Active
                            </span>

                        <?php else: ?>

                            <span class="status-badge status-disabled">
                                <i class="bi bi-x-circle-fill"></i>
                                Disabled
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <div class="action-buttons">

                            <a href="/admin/product/edit/<?= $p['id'] ?>"
                                class="action-btn btn-edit">

                                <i class="bi bi-pencil-square"></i>
                                Edit

                            </a>

                            <?php if ($p['status'] == 1): ?>

                                <a href="/admin/product/toggle/<?= $p['id'] ?>"
                                    class="action-btn btn-disable">

                                    Disable

                                </a>

                            <?php else: ?>

                                <a href="/admin/product/toggle/<?= $p['id'] ?>"
                                    class="action-btn btn-enable">

                                    Enable

                                </a>

                            <?php endif; ?>

                            <button onclick="confirmAction('/admin/product/delete/<?= $p['id'] ?>')"
                                class="action-btn btn-delete">

                                Delete

                            </button>

                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!-- =========================================
     MOBILE VIEW
========================================= -->

<div class="mobile-products">

    <?php foreach ($products as $p): ?>

        <div class="mobile-card">

            <div class="mobile-top">

                <img src="/uploads/products/<?= $p['image'] ?>"
                    class="mobile-image">

                <div class="mobile-content">

                    <h5>
                        <?= $p['name'] ?>
                    </h5>

                    <p>
                        <?= substr(strip_tags($p['description']), 0, 55) ?>...
                    </p>

                    <div class="mobile-price">
                        ₹<?= number_format($p['price']) ?>
                    </div>

                    <?php if ($p['status']): ?>

                        <span class="status-badge status-active">
                            Active
                        </span>

                    <?php else: ?>

                        <span class="status-badge status-disabled">
                            Disabled
                        </span>

                    <?php endif; ?>

                </div>

            </div>

            <div class="mobile-actions">

                <a href="/admin/product/edit/<?= $p['id'] ?>"
                    class="action-btn btn-edit">
                    Edit
                </a>

                <?php if ($p['status'] == 1): ?>

                    <a href="/admin/product/toggle/<?= $p['id'] ?>"
                        class="action-btn btn-disable">
                        Disable
                    </a>

                <?php else: ?>

                    <a href="/admin/product/toggle/<?= $p['id'] ?>"
                        class="action-btn btn-enable">
                        Enable
                    </a>

                <?php endif; ?>

                <button onclick="confirmAction('/admin/product/delete/<?= $p['id'] ?>')"
                    class="action-btn btn-delete">
                    Delete
                </button>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>
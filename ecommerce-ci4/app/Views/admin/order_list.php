<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       PAGE HEADER
    ========================================= */

    .order-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .order-page-title h3 {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
    }

    .order-page-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       CARD
    ========================================= */

    .orders-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #eef2f7;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(15, 23, 42, 0.05);
    }

    /* =========================================
       TABLE
    ========================================= */

    .orders-table {
        margin: 0;
        min-width: 900px;
    }

    .orders-table thead th {
        background: #f8fafc;
        border: none;
        padding: 18px 16px;
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .orders-table tbody td {
        padding: 18px 16px;
        vertical-align: middle;
        border-top: 1px solid #f1f5f9;
    }

    .orders-table tbody tr {
        transition: .3s ease;
    }

    .orders-table tbody tr:hover {
        background: #fafcff;
    }

    /* =========================================
       ORDER ID
    ========================================= */

    .order-id {
        font-weight: 800;
        color: #111827;
        font-size: 15px;
    }

    /* =========================================
       CUSTOMER
    ========================================= */

    .customer-name {
        font-weight: 600;
        color: #111827;
    }

    /* =========================================
       PRICE
    ========================================= */

    .order-price {
        font-size: 16px;
        font-weight: 800;
        color: #059669;
    }

    /* =========================================
       STATUS BADGES
    ========================================= */

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
    }

    .status-placed {
        background: #e5e7eb;
        color: #374151;
    }

    .status-processing {
        background: #fef3c7;
        color: #92400e;
    }

    .status-shipped {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .status-delivered {
        background: #dcfce7;
        color: #166534;
    }

    /* =========================================
       DATE
    ========================================= */

    .order-date {
        color: #6b7280;
        font-size: 14px;
        font-weight: 500;
    }

    /* =========================================
       BUTTON
    ========================================= */

    .view-btn {
        border: none;
        background: #111827;
        color: #fff;
        padding: 10px 16px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .view-btn:hover {
        background: #000;
        color: #fff;
        transform: translateY(-2px);
    }

    /* =========================================
       EMPTY STATE
    ========================================= */

    .empty-orders {
        padding: 80px 20px;
        text-align: center;
    }

    .empty-orders i {
        font-size: 60px;
        color: #cbd5e1;
        margin-bottom: 16px;
    }

    .empty-orders h5 {
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
    }

    .empty-orders p {
        color: #6b7280;
        margin: 0;
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .order-page-title h3 {
            font-size: 22px;
        }

        .orders-card {
            border-radius: 18px;
        }

        .orders-table thead th {
            font-size: 12px;
            padding: 14px;
        }

        .orders-table tbody td {
            padding: 14px;
        }

        .view-btn {
            padding: 9px 12px;
            font-size: 12px;
        }
    }
</style>

<!-- =========================================
     PAGE HEADER
========================================= -->

<div class="order-page-header">

    <div class="order-page-title">

        <h3>📦 Orders Management</h3>

        <p>
            Track customer orders, delivery status and payments
        </p>

    </div>

</div>

<!-- =========================================
     ORDER TABLE
========================================= -->

<div class="orders-card">

    <?php if (!empty($orders)): ?>

        <div class="table-responsive">

            <table class="table orders-table align-middle">

                <thead>

                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($orders as $o): ?>

                        <tr>

                            <!-- ORDER ID -->
                            <td>

                                <div class="order-id">
                                    #<?= $o['id'] ?>
                                </div>

                            </td>

                            <!-- CUSTOMER -->
                            <td>

                                <div class="customer-name">
                                    <?= $o['user_name'] ?? 'Guest User' ?>
                                </div>

                            </td>

                            <!-- TOTAL -->
                            <td>

                                <div class="order-price">
                                    ₹<?= number_format($o['total']) ?>
                                </div>

                            </td>

                            <!-- STATUS -->
                            <td>

                                <?php
                                $statusClass = '';

                                if ($o['status'] == 'placed') {
                                    $statusClass = 'status-placed';
                                } elseif ($o['status'] == 'processing') {
                                    $statusClass = 'status-processing';
                                } elseif ($o['status'] == 'shipped') {
                                    $statusClass = 'status-shipped';
                                } elseif ($o['status'] == 'delivered') {
                                    $statusClass = 'status-delivered';
                                }
                                ?>

                                <span class="status-badge <?= $statusClass ?>">

                                    <?= ucfirst($o['status']) ?>

                                </span>

                            </td>

                            <!-- DATE -->
                            <td>

                                <div class="order-date">

                                    <?= date('d M Y', strtotime($o['created_at'] ?? 'now')) ?>

                                </div>

                            </td>

                            <!-- ACTION -->
                            <td>

                                <a href="/admin/order/view/<?= $o['id'] ?>"
                                    class="view-btn">

                                    <i class="bi bi-eye"></i>

                                    View

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php else: ?>

        <!-- EMPTY -->

        <div class="empty-orders">

            <i class="bi bi-box-seam"></i>

            <h5>No Orders Found</h5>

            <p>
                Orders will appear here once customers start purchasing.
            </p>

        </div>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>
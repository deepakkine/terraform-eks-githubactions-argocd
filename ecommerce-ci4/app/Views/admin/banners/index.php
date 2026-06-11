<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       PAGE HEADER
    ========================================= */

    .banner-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 26px;
    }

    .banner-page-title h3 {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
    }

    .banner-page-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       ADD BUTTON
    ========================================= */

    .add-banner-btn {
        background: #111827;
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px 18px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .add-banner-btn:hover {
        background: #000;
        color: #fff;
        transform: translateY(-2px);
    }

    /* =========================================
       PREMIUM CARD
    ========================================= */

    .banner-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #eef2f7;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.05);
    }

    /* =========================================
       TABLE
    ========================================= */

    .banner-table {
        margin: 0;
        min-width: 850px;
    }

    .banner-table thead th {
        background: #f8fafc;
        border: none;
        padding: 18px;
        font-size: 13px;
        text-transform: uppercase;
        color: #64748b;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .banner-table tbody td {
        padding: 18px;
        border-top: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .banner-table tbody tr {
        transition: .3s ease;
    }

    .banner-table tbody tr:hover {
        background: #fafcff;
    }

    /* =========================================
       DRAG HANDLE
    ========================================= */

    .drag-handle {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: grab;
        font-size: 18px;
        color: #64748b;
        border: 1px solid #e5e7eb;
        transition: .3s ease;
    }

    .drag-handle:hover {
        background: #eef2ff;
        color: #111827;
    }

    /* =========================================
       BANNER IMAGE
    ========================================= */

    .banner-image {
        width: 150px;
        height: 78px;
        object-fit: cover;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
    }

    /* =========================================
       TITLE
    ========================================= */

    .banner-title {
        font-size: 16px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .banner-subtitle {
        color: #6b7280;
        font-size: 13px;
        line-height: 1.5;
    }

    /* =========================================
       STATUS
    ========================================= */

    .status-badge {
        padding: 8px 14px;
        border-radius: 40px;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    .status-inactive {
        background: #f1f5f9;
        color: #475569;
    }

    /* =========================================
       ORDER BADGE
    ========================================= */

    .sort-order-badge {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #111827;
        border: 1px solid #e5e7eb;
    }

    /* =========================================
       ACTIONS
    ========================================= */

    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .action-btn {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: .3s ease;
        border: 1px solid transparent;
    }

    .edit-btn {
        background: #eef2ff;
        color: #4338ca;
    }

    .edit-btn:hover {
        background: #4338ca;
        color: #fff;
    }

    .delete-btn {
        background: #fef2f2;
        color: #dc2626;
    }

    .delete-btn:hover {
        background: #dc2626;
        color: #fff;
    }

    /* =========================================
       EMPTY STATE
    ========================================= */

    .empty-state {
        padding: 70px 20px;
        text-align: center;
    }

    .empty-state-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto auto 20px;
        font-size: 34px;
        color: #94a3b8;
    }

    .empty-state h5 {
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #6b7280;
        margin-bottom: 24px;
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .banner-page-title h3 {
            font-size: 22px;
        }

        .banner-card {
            border-radius: 18px;
        }

        .banner-image {
            width: 120px;
            height: 65px;
        }

        .banner-table thead th,
        .banner-table tbody td {
            padding: 14px;
        }

        .action-btn {
            width: 38px;
            height: 38px;
        }

        .drag-handle {
            width: 36px;
            height: 36px;
        }
    }
</style>

<div class="container-fluid">

    <!-- =========================================
         PAGE HEADER
    ========================================= -->

    <div class="banner-page-header">

        <div class="banner-page-title">

            <h3>
                🖼️ Home Banners
            </h3>

            <p>
                Manage homepage sliders, promotional banners and sorting
            </p>

        </div>

        <a href="/admin/banner/create"
            class="add-banner-btn">

            <i class="bi bi-plus-lg"></i>

            Add Banner

        </a>

    </div>

    <!-- =========================================
         CARD
    ========================================= -->

    <div class="banner-card">

        <?php if (!empty($banners)): ?>

            <div class="table-responsive">

                <table class="table banner-table align-middle">

                    <thead>

                        <tr>

                            <th style="width:70px;">Drag</th>

                            <th>Banner</th>

                            <th>Title</th>

                            <th>Status</th>

                            <th>Order</th>

                            <th class="text-end">Actions</th>

                        </tr>

                    </thead>

                    <tbody id="sortable">

                        <?php foreach ($banners as $b): ?>

                            <tr data-id="<?= $b['id'] ?>">

                                <!-- DRAG -->
                                <td>

                                    <div class="drag-handle">
                                        ☰
                                    </div>

                                </td>

                                <!-- IMAGE -->
                                <td>

                                    <img src="/uploads/banners/<?= $b['desktop_image'] ?>"
                                        class="banner-image">

                                </td>

                                <!-- TITLE -->
                                <td>

                                    <div class="banner-title">

                                        <?= $b['title'] ?>

                                    </div>

                                    <div class="banner-subtitle">

                                        <?= $b['subtitle'] ?>

                                    </div>

                                </td>

                                <!-- STATUS -->
                                <td>

                                    <?php if ($b['status']): ?>

                                        <span class="status-badge status-active">

                                            ● Active

                                        </span>

                                    <?php else: ?>

                                        <span class="status-badge status-inactive">

                                            ● Inactive

                                        </span>

                                    <?php endif; ?>

                                </td>

                                <!-- ORDER -->
                                <td>

                                    <div class="sort-order-badge">

                                        <?= $b['sort_order'] ?>

                                    </div>

                                </td>

                                <!-- ACTION -->
                                <td>

                                    <div class="action-buttons">

                                        <!-- EDIT -->
                                        <a href="/admin/banner/edit/<?= $b['id'] ?>"
                                            class="action-btn edit-btn">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <!-- DELETE -->
                                        <a href="/admin/banner/delete/<?= $b['id'] ?>"
                                            class="action-btn delete-btn"
                                            onclick="return confirm('Delete this banner?')">

                                            <i class="bi bi-trash"></i>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <!-- EMPTY STATE -->

            <div class="empty-state">

                <div class="empty-state-icon">

                    <i class="bi bi-images"></i>

                </div>

                <h5>
                    No banners found
                </h5>

                <p>
                    Add your first homepage banner to start displaying sliders
                </p>

                <a href="/admin/banner/create"
                    class="add-banner-btn">

                    <i class="bi bi-plus-lg"></i>

                    Add Banner

                </a>

            </div>

        <?php endif; ?>

    </div>

</div>

<!-- =========================================
     SORTABLE JS
========================================= -->

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
    let el = document.getElementById('sortable');

    if (el) {

        new Sortable(el, {

            animation: 180,

            handle: '.drag-handle',

            onEnd: function() {

                let order = [];

                document.querySelectorAll('#sortable tr')
                    .forEach(row => {

                        order.push(row.dataset.id);

                    });

                fetch('/admin/banner/sort', {

                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },

                    body: 'order[]=' + order.join('&order[]=')

                });

            }

        });

    }
</script>

<?= $this->endSection() ?>
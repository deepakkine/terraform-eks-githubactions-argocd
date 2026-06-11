<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       PAGE HEADER
    ========================================= */

    .category-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .category-page-title h3 {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 5px;
    }

    .category-page-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       ADD BUTTON
    ========================================= */

    .add-category-btn {
        border: none;
        background: #111827;
        color: #fff;
        padding: 12px 20px;
        border-radius: 14px;
        text-decoration: none;
        font-weight: 600;
        transition: .3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .add-category-btn:hover {
        background: #000;
        transform: translateY(-2px);
        color: #fff;
    }

    /* =========================================
       TABLE CARD
    ========================================= */

    .category-table-card {
        background: #fff;
        border-radius: 22px;
        padding: 22px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.06);
        overflow: hidden;
    }

    /* =========================================
       TABLE
    ========================================= */

    .category-table {
        margin: 0;
        vertical-align: middle;
    }

    .category-table thead th {
        background: #f9fafb;
        color: #374151;
        font-size: 14px;
        font-weight: 700;
        border: none;
        padding: 16px;
        white-space: nowrap;
    }

    .category-table tbody td {
        padding: 18px 16px;
        border-top: 1px solid #f1f5f9;
        font-size: 14px;
        color: #374151;
    }

    .category-table tbody tr {
        transition: .3s ease;
    }

    .category-table tbody tr:hover {
        background: #f9fafb;
    }

    /* =========================================
       CATEGORY NAME
    ========================================= */

    .category-name {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 600;
        color: #111827;
    }

    .category-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #eef2ff;
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    /* =========================================
       BADGES
    ========================================= */

    .parent-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 30px;
        background: #f3f4f6;
        color: #374151;
        font-size: 13px;
        font-weight: 600;
    }

    .main-category {
        background: #dcfce7;
        color: #166534;
    }

    /* =========================================
       ACTION BUTTONS
    ========================================= */

    .action-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: .3s ease;
    }

    .edit-btn {
        background: #eff6ff;
        color: #2563eb;
    }

    .delete-btn {
        background: #fef2f2;
        color: #dc2626;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .category-page-title h3 {
            font-size: 24px;
        }

        .category-page-title p {
            font-size: 13px;
        }

        .category-table-card {
            padding: 14px;
            border-radius: 18px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .category-table thead th,
        .category-table tbody td {
            white-space: nowrap;
        }

        .add-category-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- =========================================
     PAGE HEADER
========================================= -->

<div class="category-page-header">

    <div class="category-page-title">

        <h3>
            Categories
        </h3>

        <p>
            Manage your product categories professionally
        </p>

    </div>

    <a href="/admin/category/add"
        class="add-category-btn">

        <i class="bi bi-plus-circle"></i>

        Add Category

    </a>

</div>

<!-- =========================================
     TABLE CARD
========================================= -->

<div class="category-table-card">

    <div class="table-responsive">

        <table class="table category-table align-middle">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Category</th>

                    <th>Parent Category</th>

                    <th class="text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($categories as $c): ?>

                    <tr>

                        <!-- ID -->
                        <td>
                            #<?= $c['id'] ?>
                        </td>

                        <!-- CATEGORY -->
                        <td>

                            <div class="category-name">

                                <div class="category-icon">
                                    <i class="bi bi-grid"></i>
                                </div>

                                <?= $c['name'] ?>

                            </div>

                        </td>

                        <!-- PARENT -->
                        <td>

                            <?php if (!empty($c['parent_id'])): ?>

                                <span class="parent-badge">

                                    Parent ID :
                                    <?= $c['parent_id'] ?>

                                </span>

                            <?php else: ?>

                                <span class="parent-badge main-category">

                                    Main Category

                                </span>

                            <?php endif; ?>

                        </td>

                        <!-- ACTIONS -->
                        <td class="text-center">

                            <a href="/admin/category/edit/<?= $c['id'] ?>"
                                class="action-btn edit-btn">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <a href="/admin/category/delete/<?= $c['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete this category?')"
                                class="action-btn delete-btn">

                                <i class="bi bi-trash"></i>

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>
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
        gap: 15px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .page-title h3 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 4px;
        color: #111827;
    }

    .page-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       FORM CARD
    ========================================= */

    .category-card {
        background: #fff;
        border-radius: 24px;
        padding: 30px;
        border: 1px solid #eef0f4;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
    }

    /* =========================================
       SECTION TITLE
    ========================================= */

    .form-section-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 20px;
    }

    /* =========================================
       LABELS
    ========================================= */

    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    /* =========================================
       INPUTS
    ========================================= */

    .form-control,
    .form-select {
        height: 52px;
        border-radius: 14px;
        border: 1px solid #dbe1ea;
        padding: 12px 16px;
        font-size: 14px;
        transition: .3s ease;
        box-shadow: none !important;
    }

    textarea.form-control {
        height: auto;
        min-height: 120px;
        resize: none;
        padding-top: 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #111827;
        box-shadow: 0 0 0 4px rgba(17, 24, 39, 0.06) !important;
    }

    /* =========================================
       FILE UPLOAD
    ========================================= */

    .upload-box {
        border: 2px dashed #d1d5db;
        border-radius: 18px;
        padding: 30px;
        text-align: center;
        background: #fafafa;
        transition: .3s ease;
    }

    .upload-box:hover {
        border-color: #111827;
        background: #f8fafc;
    }

    .upload-icon {
        font-size: 34px;
        color: #111827;
        margin-bottom: 12px;
    }

    .upload-text {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 0;
    }

    /* =========================================
       BUTTONS
    ========================================= */

    .save-btn {
        height: 52px;
        border-radius: 14px;
        border: none;
        background: #111827;
        color: #fff;
        font-weight: 600;
        padding: 0 30px;
        transition: .3s ease;
    }

    .save-btn:hover {
        background: #000;
        transform: translateY(-2px);
    }

    .cancel-btn {
        height: 52px;
        border-radius: 14px;
        border: 1px solid #dbe1ea;
        background: #fff;
        color: #111827;
        font-weight: 600;
        padding: 0 24px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: .3s ease;
    }

    .cancel-btn:hover {
        background: #f8fafc;
        color: #111827;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media(max-width:768px) {

        .page-title h3 {
            font-size: 22px;
        }

        .category-card {
            padding: 20px;
            border-radius: 20px;
        }

        .form-control,
        .form-select,
        .save-btn,
        .cancel-btn {
            height: 48px;
        }

        textarea.form-control {
            min-height: 110px;
        }

    }
</style>

<!-- =========================================
     PAGE HEADER
========================================= -->

<div class="page-header">

    <div class="page-title">
        <h3>➕ Add New Category</h3>

        <p>
            Create and manage product categories professionally
        </p>
    </div>

</div>

<!-- =========================================
     FORM CARD
========================================= -->

<div class="category-card">

    <form method="post"
        action="/admin/category/save"
        enctype="multipart/form-data">

        <!-- BASIC INFO -->
        <div class="form-section-title">
            Basic Information
        </div>

        <div class="row">

            <!-- CATEGORY NAME -->
            <div class="col-lg-6 mb-4">

                <label class="form-label">
                    Category Name
                </label>

                <input type="text"
                    name="name"
                    class="form-control"
                    placeholder="Enter category name"
                    required>

            </div>

            <!-- PARENT CATEGORY -->
            <div class="col-lg-6 mb-4">

                <label class="form-label">
                    Parent Category
                </label>

                <select name="parent_id" class="form-select">

                    <option value="">
                        Main Category
                    </option>

                    <?php foreach ($parents as $p): ?>

                        <option value="<?= $p['id'] ?>">
                            <?= $p['name'] ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- SLUG -->
            <div class="col-lg-12 mb-4">

                <label class="form-label">
                    Category Slug
                </label>

                <input type="text"
                    name="slug"
                    class="form-control"
                    placeholder="example: wooden-sofas">

            </div>

        </div>

        <!-- SEO SECTION -->
        <div class="form-section-title mt-2">
            SEO Settings
        </div>

        <div class="row">

            <!-- META TITLE -->
            <div class="col-lg-6 mb-4">

                <label class="form-label">
                    Meta Title
                </label>

                <input type="text"
                    name="meta_title"
                    class="form-control"
                    placeholder="SEO Meta Title">

            </div>

            <!-- META KEYWORDS -->
            <div class="col-lg-6 mb-4">

                <label class="form-label">
                    Meta Keywords
                </label>

                <input type="text"
                    name="meta_keywords"
                    class="form-control"
                    placeholder="chair, sofa, furniture">

            </div>

            <!-- META DESCRIPTION -->
            <div class="col-lg-12 mb-4">

                <label class="form-label">
                    Meta Description
                </label>

                <textarea name="meta_description"
                    class="form-control"
                    placeholder="Write category SEO description"></textarea>

            </div>

        </div>

        <!-- IMAGE & STATUS -->
        <div class="form-section-title mt-2">
            Category Settings
        </div>

        <div class="row">

            <!-- IMAGE -->
            <div class="col-lg-8 mb-4">

                <label class="form-label d-block">
                    Category Image
                </label>

                <div class="upload-box">

                    <div class="upload-icon">
                        <i class="bi bi-cloud-upload"></i>
                    </div>

                    <p class="upload-text mb-3">
                        Upload category image
                    </p>

                    <input type="file"
                        name="image"
                        class="form-control">

                </div>

            </div>

            <!-- STATUS -->
            <div class="col-lg-4 mb-4">

                <label class="form-label">
                    Status
                </label>

                <select name="status" class="form-select">

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Disabled
                    </option>

                </select>

            </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div class="d-flex gap-3 flex-wrap mt-3">

            <button class="save-btn">
                Save Category
            </button>

            <a href="/admin/category/list"
                class="cancel-btn">

                Cancel

            </a>

        </div>

    </form>

</div>

<?= $this->endSection() ?>
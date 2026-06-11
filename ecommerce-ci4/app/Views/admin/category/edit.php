<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .page-header {
        margin-bottom: 25px;
    }

    .page-header h3 {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
    }

    .category-card {
        background: #fff;
        border-radius: 24px;
        padding: 30px;
        border: 1px solid #eef0f4;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
    }

    .form-control,
    .form-select {
        height: 52px;
        border-radius: 14px;
        border: 1px solid #dbe1ea;
        padding: 12px 16px;
        box-shadow: none !important;
    }

    textarea.form-control {
        height: auto;
        min-height: 120px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #111827;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
    }

    .preview-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 16px;
        margin-bottom: 15px;
        border: 1px solid #eee;
    }

    .save-btn {
        background: #111827;
        color: #fff;
        border: none;
        height: 52px;
        padding: 0 30px;
        border-radius: 14px;
        font-weight: 600;
    }

    .save-btn:hover {
        background: #000;
    }

    @media(max-width:768px) {

        .category-card {
            padding: 20px;
        }

        .page-header h3 {
            font-size: 22px;
        }
    }
</style>

<div class="page-header">
    <h3>Edit Category</h3>
</div>

<div class="category-card">

    <form method="post"
        action="/admin/category/update/<?= $category['id'] ?>"
        enctype="multipart/form-data">

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">
                    Category Name
                </label>

                <input type="text"
                    name="name"
                    class="form-control"
                    value="<?= $category['name'] ?>"
                    required>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">
                    Parent Category
                </label>

                <select name="parent_id" class="form-select">

                    <option value="">
                        Main Category
                    </option>

                    <?php foreach ($parents as $p): ?>

                        <option value="<?= $p['id'] ?>"
                            <?= ($category['parent_id'] == $p['id']) ? 'selected' : '' ?>>

                            <?= $p['name'] ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="col-md-12 mb-4">

                <label class="form-label">
                    Slug
                </label>

                <input type="text"
                    name="slug"
                    class="form-control"
                    value="<?= $category['slug'] ?>">

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">
                    Meta Title
                </label>

                <input type="text"
                    name="meta_title"
                    class="form-control"
                    value="<?= $category['meta_title'] ?>">

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">
                    Meta Keywords
                </label>

                <input type="text"
                    name="meta_keywords"
                    class="form-control"
                    value="<?= $category['meta_keywords'] ?>">

            </div>

            <div class="col-md-12 mb-4">

                <label class="form-label">
                    Meta Description
                </label>

                <textarea name="meta_description"
                    class="form-control"><?= $category['meta_description'] ?></textarea>

            </div>

            <div class="col-md-8 mb-4">

                <label class="form-label d-block">
                    Category Image
                </label>

                <?php if ($category['image']): ?>

                    <img src="/uploads/categories/<?= $category['image'] ?>"
                        class="preview-image">

                <?php endif; ?>

                <input type="file"
                    name="image"
                    class="form-control">

            </div>

            <div class="col-md-4 mb-4">

                <label class="form-label">
                    Status
                </label>

                <select name="status" class="form-select">

                    <option value="1"
                        <?= $category['status'] == 1 ? 'selected' : '' ?>>

                        Active

                    </option>

                    <option value="0"
                        <?= $category['status'] == 0 ? 'selected' : '' ?>>

                        Disabled

                    </option>

                </select>

            </div>

        </div>

        <button class="save-btn">
            Update Category
        </button>

    </form>

</div>

<?= $this->endSection() ?>
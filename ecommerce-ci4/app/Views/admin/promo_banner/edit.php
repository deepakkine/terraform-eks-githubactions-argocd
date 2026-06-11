<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .promo-edit-card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
    }

    .promo-header {
        padding: 28px 30px;
        border-bottom: 1px solid #f1f5f9;
        background: linear-gradient(135deg, #111827, #1e293b);
        color: #fff;
    }

    .promo-header h3 {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .promo-header p {
        margin: 0;
        color: rgba(255, 255, 255, 0.75);
        font-size: 14px;
    }

    .promo-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        height: 52px;
        border-radius: 14px;
        border: 1px solid #dbe2ea;
        padding: 12px 16px;
        font-size: 15px;
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

    .preview-box {
        background: #f8fafc;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid #edf2f7;
    }

    .preview-title {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 15px;
    }

    .preview-image {
        width: 100%;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e5e7eb;
    }

    .preview-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .upload-info {
        background: #f8fafc;
        border-radius: 16px;
        padding: 16px;
        font-size: 14px;
        color: #64748b;
        border: 1px dashed #cbd5e1;
    }

    .btn-save {
        height: 54px;
        border: none;
        border-radius: 50px;
        background: #111827;
        color: #fff;
        font-weight: 700;
        padding: 0 35px;
        transition: .3s ease;
    }

    .btn-save:hover {
        background: #000;
        transform: translateY(-2px);
    }

    .btn-back {
        border-radius: 50px;
        padding: 10px 20px;
        font-weight: 600;
    }

    @media(max-width:768px) {

        .promo-header {
            padding: 22px;
        }

        .promo-header h3 {
            font-size: 22px;
        }

        .promo-body {
            padding: 20px;
        }

        .form-control,
        .form-select {
            height: 48px;
            font-size: 14px;
        }

        .btn-save {
            width: 100%;
        }
    }
</style>

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            ✏️ Edit Promo Banner
        </h2>

        <p class="text-muted mb-0">
            Update homepage promotional banner details
        </p>
    </div>

    <a href="/admin/promo-banner"
        class="btn btn-outline-dark btn-back">
        <i class="bi bi-arrow-left"></i>
        Back
    </a>

</div>

<div class="promo-edit-card">

    <!-- HEADER -->
    <div class="promo-header">

        <h3>
            Promo Banner Settings
        </h3>

        <p>
            Manage homepage promotional banner content and visibility
        </p>

    </div>

    <!-- BODY -->
    <div class="promo-body">

        <form method="post"
            action="/admin/promo-banner/update/<?= $banner['id'] ?>"
            enctype="multipart/form-data">

            <div class="row g-4">

                <!-- LEFT -->
                <div class="col-lg-8">

                    <!-- TITLE -->
                    <div class="mb-4">

                        <label class="form-label">
                            Banner Title
                        </label>

                        <input type="text"
                            name="title"
                            value="<?= $banner['title'] ?>"
                            class="form-control"
                            placeholder="Enter banner title">

                    </div>

                    <!-- SUBTITLE -->
                    <div class="mb-4">

                        <label class="form-label">
                            Banner Subtitle
                        </label>

                        <textarea name="subtitle"
                            class="form-control"
                            placeholder="Enter subtitle"><?= $banner['subtitle'] ?></textarea>

                    </div>

                    <div class="row">

                        <!-- BUTTON TEXT -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Button Text
                            </label>

                            <input type="text"
                                name="button_text"
                                value="<?= $banner['button_text'] ?>"
                                class="form-control"
                                placeholder="Shop Now">

                        </div>

                        <!-- BUTTON LINK -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label">
                                Button Link
                            </label>

                            <input type="text"
                                name="button_link"
                                value="<?= $banner['button_link'] ?>"
                                class="form-control"
                                placeholder="/products">

                        </div>

                    </div>

                    <!-- IMAGE -->
                    <div class="mb-4">

                        <label class="form-label">
                            Upload New Banner Image
                        </label>

                        <input type="file"
                            name="image"
                            class="form-control"
                            id="imageInput">

                    </div>

                    <div class="upload-info mb-4">

                        <strong>Recommended Banner Size:</strong><br>

                        • Desktop: 1600 × 600 px<br>
                        • Mobile Optimized<br>
                        • JPG / PNG Supported

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-lg-4">

                    <!-- PREVIEW -->
                    <div class="preview-box mb-4">

                        <div class="preview-title">
                            Current Banner Preview
                        </div>

                        <div class="preview-image">

                            <img src="/uploads/promo_banner/<?= $banner['image'] ?>"
                                id="previewImage">

                        </div>

                    </div>

                    <!-- ORDER -->
                    <div class="mb-4">

                        <label class="form-label">
                            Display Order
                        </label>

                        <input type="number"
                            name="sort_order"
                            value="<?= $banner['sort_order'] ?>"
                            class="form-control"
                            placeholder="1">

                    </div>

                    <!-- STATUS -->
                    <div class="mb-4">

                        <label class="form-label">
                            Banner Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="1"
                                <?= $banner['status'] ? 'selected' : '' ?>>
                                Active
                            </option>

                            <option value="0"
                                <?= !$banner['status'] ? 'selected' : '' ?>>
                                Disabled
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-2">

                <button class="btn-save">
                    <i class="bi bi-check-circle me-2"></i>
                    Update Promo Banner
                </button>

            </div>

        </form>

    </div>

</div>

<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {

        const file = e.target.files[0];

        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(event) {

            document.getElementById('previewImage').src = event.target.result;

        };

        reader.readAsDataURL(file);

    });
</script>

<?= $this->endSection() ?>
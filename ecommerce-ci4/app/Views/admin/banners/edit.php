<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       HEADER
    ========================================= */

    .edit-banner-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .edit-banner-title h3 {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
    }

    .edit-banner-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       BACK BUTTON
    ========================================= */

    .back-btn {
        padding: 11px 18px;
        border-radius: 14px;
        border: 1px solid #dbe3ee;
        background: #fff;
        color: #111827;
        font-weight: 600;
        text-decoration: none;
        transition: .3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .back-btn:hover {
        background: #111827;
        color: #fff;
        border-color: #111827;
    }

    /* =========================================
       CARD
    ========================================= */

    .premium-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #eef2f7;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .premium-card-body {
        padding: 30px;
    }

    /* =========================================
       LABELS
    ========================================= */

    .custom-label {
        font-size: 14px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 10px;
    }

    /* =========================================
       INPUTS
    ========================================= */

    .custom-input,
    .custom-select {
        height: 54px;
        border-radius: 16px;
        border: 1px solid #dbe3ee;
        padding: 12px 16px;
        font-size: 15px;
        transition: .3s ease;
        box-shadow: none !important;
    }

    .custom-input:focus,
    .custom-select:focus {
        border-color: #111827;
    }

    /* =========================================
       IMAGE BOX
    ========================================= */

    .image-upload-box {
        border: 2px dashed #dbe3ee;
        border-radius: 22px;
        padding: 22px;
        background: #fafcff;
        transition: .3s ease;
    }

    .image-upload-box:hover {
        border-color: #111827;
    }

    .image-title {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 14px;
    }

    /* =========================================
       IMAGE PREVIEW
    ========================================= */

    .banner-preview {
        width: 100%;
        max-height: 240px;
        object-fit: cover;
        border-radius: 18px;
        border: 1px solid #e5e7eb;
        margin-bottom: 16px;
    }

    /* =========================================
       SAVE BUTTON
    ========================================= */

    .update-btn {
        width: 100%;
        border: none;
        border-radius: 18px;
        background: #111827;
        color: #fff;
        padding: 15px;
        font-weight: 700;
        transition: .3s ease;
    }

    .update-btn:hover {
        background: #000;
        transform: translateY(-2px);
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .edit-banner-title h3 {
            font-size: 22px;
        }

        .premium-card {
            border-radius: 18px;
        }

        .premium-card-body {
            padding: 18px;
        }

        .custom-input,
        .custom-select {
            height: 50px;
            font-size: 14px;
        }

        .image-upload-box {
            padding: 18px;
        }

    }
</style>

<!-- =========================================
     HEADER
========================================= -->

<div class="edit-banner-header">

    <div class="edit-banner-title">

        <h3>
            ✏️ Edit Banner
        </h3>

        <p>
            Update homepage banner details and images
        </p>

    </div>

    <a href="/admin/banner"
        class="back-btn">

        <i class="bi bi-arrow-left"></i>

        Back to Banners

    </a>

</div>

<!-- =========================================
     CARD
========================================= -->

<div class="premium-card">

    <div class="premium-card-body">

        <form method="post"
            action="/admin/banner/update/<?= $banner['id'] ?>"
            enctype="multipart/form-data">

            <div class="row g-4">

                <!-- TITLE -->
                <div class="col-md-6">

                    <label class="custom-label">

                        Banner Title

                    </label>

                    <input type="text"
                        name="title"
                        value="<?= $banner['title'] ?>"
                        class="form-control custom-input">

                </div>

                <!-- SUBTITLE -->
                <div class="col-md-6">

                    <label class="custom-label">

                        Subtitle

                    </label>

                    <input type="text"
                        name="subtitle"
                        value="<?= $banner['subtitle'] ?>"
                        class="form-control custom-input">

                </div>

                <!-- BUTTON TEXT -->
                <div class="col-md-6">

                    <label class="custom-label">

                        Button Text

                    </label>

                    <input type="text"
                        name="button_text"
                        value="<?= $banner['button_text'] ?>"
                        class="form-control custom-input">

                </div>

                <!-- BUTTON LINK -->
                <div class="col-md-6">

                    <label class="custom-label">

                        Button Link

                    </label>

                    <input type="text"
                        name="button_link"
                        value="<?= $banner['button_link'] ?>"
                        class="form-control custom-input">

                </div>

                <!-- DESKTOP IMAGE -->
                <div class="col-lg-6">

                    <div class="image-upload-box">

                        <div class="image-title">

                            🖥️ Desktop Banner

                        </div>

                        <!-- CURRENT IMAGE -->
                        <img src="/uploads/banners/<?= $banner['desktop_image'] ?>"
                            class="banner-preview"
                            id="desktopPreview">

                        <!-- INPUT -->
                        <input type="file"
                            name="desktop_image"
                            class="form-control custom-input"
                            id="desktopInput">

                    </div>

                </div>

                <!-- MOBILE IMAGE -->
                <div class="col-lg-6">

                    <div class="image-upload-box">

                        <div class="image-title">

                            📱 Mobile Banner

                        </div>

                        <!-- CURRENT IMAGE -->
                        <img src="/uploads/banners/<?= $banner['mobile_image'] ?>"
                            class="banner-preview"
                            id="mobilePreview">

                        <!-- INPUT -->
                        <input type="file"
                            name="mobile_image"
                            class="form-control custom-input"
                            id="mobileInput">

                    </div>

                </div>

                <!-- SORT ORDER -->
                <div class="col-md-6">

                    <label class="custom-label">

                        Display Order

                    </label>

                    <input type="number"
                        name="sort_order"
                        value="<?= $banner['sort_order'] ?>"
                        class="form-control custom-input">

                </div>

                <!-- STATUS -->
                <div class="col-md-6">

                    <label class="custom-label">

                        Banner Status

                    </label>

                    <select name="status"
                        class="form-select custom-select">

                        <option value="1"
                            <?= $banner['status'] ? 'selected' : '' ?>>

                            Active

                        </option>

                        <option value="0"
                            <?= !$banner['status'] ? 'selected' : '' ?>>

                            Inactive

                        </option>

                    </select>

                </div>

                <!-- UPDATE BUTTON -->
                <div class="col-12">

                    <button class="update-btn">

                        Update Banner

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<!-- =========================================
     LIVE IMAGE PREVIEW
========================================= -->

<script>
    function setupPreview(inputId, previewId) {

        const input = document.getElementById(inputId);

        const preview = document.getElementById(previewId);

        input.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(event) {

                preview.src = event.target.result;

            };

            reader.readAsDataURL(file);

        });

    }

    setupPreview('desktopInput', 'desktopPreview');

    setupPreview('mobileInput', 'mobilePreview');
</script>

<?= $this->endSection() ?>
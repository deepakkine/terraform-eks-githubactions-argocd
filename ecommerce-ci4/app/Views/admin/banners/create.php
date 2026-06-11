<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* =========================================
       PAGE HEADER
    ========================================= */

    .banner-create-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .banner-create-title h3 {
        font-size: 30px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 6px;
    }

    .banner-create-title p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /* =========================================
       BACK BUTTON
    ========================================= */

    .back-btn {
        border: 1px solid #dbe3ee;
        background: #fff;
        color: #111827;
        border-radius: 14px;
        padding: 10px 16px;
        text-decoration: none;
        font-weight: 600;
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
       PREMIUM CARD
    ========================================= */

    .premium-card {
        background: #fff;
        border-radius: 24px;
        border: 1px solid #eef2f7;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .premium-card-body {
        padding: 28px;
    }

    /* =========================================
       ALERT BOX
    ========================================= */

    .guideline-box {
        background: linear-gradient(135deg, #eff6ff, #f8fafc);
        border: 1px solid #dbeafe;
        border-radius: 18px;
        padding: 20px;
        margin-bottom: 26px;
    }

    .guideline-box h6 {
        font-size: 16px;
        font-weight: 700;
        color: #1e3a8a;
        margin-bottom: 12px;
    }

    .guideline-box p {
        margin: 0;
        color: #475569;
        font-size: 14px;
        line-height: 1.9;
    }

    /* =========================================
       FORM LABEL
    ========================================= */

    .form-label-custom {
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
        box-shadow: none !important;
        transition: .3s ease;
    }

    .custom-input:focus,
    .custom-select:focus {
        border-color: #111827;
    }

    /* =========================================
       FILE UPLOAD
    ========================================= */

    .upload-box {
        border: 2px dashed #dbe3ee;
        border-radius: 20px;
        padding: 22px;
        text-align: center;
        background: #fafcff;
        transition: .3s ease;
        position: relative;
    }

    .upload-box:hover {
        border-color: #111827;
        background: #f8fafc;
    }

    .upload-box input {
        border-radius: 14px;
    }

    .upload-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto auto 14px;
        font-size: 24px;
        color: #4338ca;
    }

    .upload-title {
        font-weight: 700;
        color: #111827;
        margin-bottom: 6px;
    }

    .upload-subtitle {
        font-size: 13px;
        color: #6b7280;
        margin-bottom: 18px;
    }

    /* =========================================
       IMAGE PREVIEW
    ========================================= */

    .preview-image {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        border-radius: 16px;
        margin-top: 18px;
        border: 1px solid #e5e7eb;
        display: none;
    }

    /* =========================================
       SAVE BUTTON
    ========================================= */

    .save-btn {
        background: #111827;
        color: #fff;
        border: none;
        border-radius: 16px;
        padding: 15px;
        width: 100%;
        font-size: 15px;
        font-weight: 700;
        transition: .3s ease;
    }

    .save-btn:hover {
        background: #000;
        transform: translateY(-2px);
    }

    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .banner-create-title h3 {
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

        .upload-box {
            padding: 18px;
        }
    }
</style>

<!-- =========================================
     HEADER
========================================= -->

<div class="banner-create-header">

    <div class="banner-create-title">

        <h3>
            🖼️ Add New Banner
        </h3>

        <p>
            Create premium homepage promotional banners
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

        <!-- =========================================
             IMAGE GUIDELINES
        ========================================= -->

        <div class="guideline-box">

            <h6>
                📏 Banner Image Guidelines
            </h6>

            <p>
                • Desktop Banner: 1600 × 500 px<br>
                • Mobile Banner: 800 × 600 px<br>
                • Maximum Size: 2MB<br>
                • Supported Format: JPG / PNG
            </p>

        </div>

        <!-- =========================================
             FORM
        ========================================= -->

        <form method="post"
            action="/admin/banner/store"
            enctype="multipart/form-data">

            <div class="row g-4">

                <!-- TITLE -->
                <div class="col-md-6">

                    <label class="form-label-custom">

                        Banner Title

                    </label>

                    <input type="text"
                        name="title"
                        class="form-control custom-input"
                        placeholder="Summer Sale Collection">

                </div>

                <!-- SUBTITLE -->
                <div class="col-md-6">

                    <label class="form-label-custom">

                        Subtitle

                    </label>

                    <input type="text"
                        name="subtitle"
                        class="form-control custom-input"
                        placeholder="Premium fashion for everyone">

                </div>

                <!-- BUTTON TEXT -->
                <div class="col-md-6">

                    <label class="form-label-custom">

                        Button Text

                    </label>

                    <input type="text"
                        name="button_text"
                        class="form-control custom-input"
                        placeholder="Shop Now">

                </div>

                <!-- BUTTON LINK -->
                <div class="col-md-6">

                    <label class="form-label-custom">

                        Button Link

                    </label>

                    <input type="text"
                        name="button_link"
                        class="form-control custom-input"
                        placeholder="/products">

                </div>

                <!-- DESKTOP IMAGE -->
                <div class="col-lg-6">

                    <div class="upload-box">

                        <div class="upload-icon">

                            <i class="bi bi-display"></i>

                        </div>

                        <div class="upload-title">
                            Desktop Banner
                        </div>

                        <div class="upload-subtitle">
                            Upload desktop version banner image
                        </div>

                        <input type="file"
                            name="desktop_image"
                            class="form-control custom-input"
                            id="desktopInput"
                            required>

                        <img id="desktopPreview"
                            class="preview-image">

                    </div>

                </div>

                <!-- MOBILE IMAGE -->
                <div class="col-lg-6">

                    <div class="upload-box">

                        <div class="upload-icon">

                            <i class="bi bi-phone"></i>

                        </div>

                        <div class="upload-title">
                            Mobile Banner
                        </div>

                        <div class="upload-subtitle">
                            Upload mobile responsive banner image
                        </div>

                        <input type="file"
                            name="mobile_image"
                            class="form-control custom-input"
                            id="mobileInput"
                            required>

                        <img id="mobilePreview"
                            class="preview-image">

                    </div>

                </div>

                <!-- SORT ORDER -->
                <div class="col-md-6">

                    <label class="form-label-custom">

                        Display Order

                    </label>

                    <input type="number"
                        name="sort_order"
                        class="form-control custom-input"
                        placeholder="1">

                </div>

                <!-- STATUS -->
                <div class="col-md-6">

                    <label class="form-label-custom">

                        Banner Status

                    </label>

                    <select name="status"
                        class="form-select custom-select">

                        <option value="1">
                            Active
                        </option>

                        <option value="0">
                            Inactive
                        </option>

                    </select>

                </div>

                <!-- BUTTON -->
                <div class="col-12">

                    <button class="save-btn">

                        Save Banner

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<!-- =========================================
     IMAGE PREVIEW SCRIPT
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

                preview.style.display = 'block';

            };

            reader.readAsDataURL(file);

        });

    }

    setupPreview('desktopInput', 'desktopPreview');

    setupPreview('mobileInput', 'mobilePreview');
</script>

<?= $this->endSection() ?>
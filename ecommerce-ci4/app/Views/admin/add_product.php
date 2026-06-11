<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .admin-card {
        border: 0;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        margin-bottom: 20px;
    }

    .section-title {
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 15px;
        color: #222;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 10px 12px;
    }

    .form-label {
        font-weight: 600;
        font-size: 13px;
        margin-bottom: 6px;
    }

    .promo-box {
        background: #f8f9ff;
        border: 1px solid #e6e9ff;
        border-radius: 14px;
        padding: 15px;
    }

    .sticky-footer {
        position: sticky;
        bottom: 0;
        background: #fff;
        padding: 15px;
        border-top: 1px solid #eee;
        z-index: 10;
    }

    @media (max-width: 768px) {
        .row-desktop {
            display: block;
        }
    }
</style>

<h4 class="fw-bold mb-3">➕ Add Product</h4>

<form method="post" action="/admin/product/save" enctype="multipart/form-data">

    <div class="row row-desktop">

        <!-- LEFT SIDE -->
        <div class="col-md-8">

            <!-- BASIC INFO -->
            <div class="card admin-card p-3">
                <div class="section-title">Basic Information</div>

                <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
                <input type="text" name="brand" class="form-control mb-2" placeholder="Brand">

                <select name="gender" class="form-select mb-2">
                    <option value="">Select Target</option>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    <option value="kids">Kids</option>
                    <option value="unisex">Unisex</option>
                </select>

                <input type="text" name="slug" class="form-control mb-2" placeholder="Slug">
            </div>

            <!-- DESCRIPTION -->
            <div class="card admin-card p-3">
                <div class="section-title">Description</div>

                <textarea name="description" id="editor"></textarea>
            </div>

            <!-- SPECIFICATIONS -->
            <div class="card admin-card p-3">
                <div class="section-title">Specifications</div>

                <textarea name="specifications" id="specEditor"></textarea>
            </div>

            <!-- VARIANTS -->
            <div class="card admin-card p-3">
                <div class="section-title">Product Variants</div>

                <div id="variants-wrapper">

                    <div class="border rounded p-3 mb-3">

                        <input type="text" name="color[]" class="form-control mb-2" placeholder="Color">
                        <input type="text" name="size[]" class="form-control mb-2" placeholder="Size">
                        <input type="number" name="variant_price[]" class="form-control mb-2" placeholder="Price">
                        <input type="number" name="variant_discount[]" class="form-control mb-2" placeholder="Discount %">
                        <input type="number" name="variant_stock[]" class="form-control mb-2" placeholder="Stock">

                        <input type="file" name="variant_images_0[]" multiple class="form-control">

                    </div>

                </div>

                <button type="button" class="btn btn-dark btn-sm" onclick="addVariant()">+ Add Variant</button>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-4">

            <!-- SEO -->
            <div class="card admin-card p-3">
                <div class="section-title">SEO Settings</div>

                <input type="text" name="meta_title" class="form-control mb-2" placeholder="Meta Title">
                <textarea name="meta_description" class="form-control mb-2" placeholder="Meta Description"></textarea>

                <input type="text" name="tags" class="form-control mb-2" placeholder="Tags">

                <select name="category_id" class="form-select mb-2">
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Disabled</option>
                </select>
            </div>

            <!-- IMAGE -->
            <div class="card admin-card p-3">
                <div class="section-title">Main Image</div>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- PROMOTION -->
            <div class="card admin-card p-3 promo-box">
                <div class="section-title">Promotion Control</div>

                <div class="form-check mb-2">
                    <input type="checkbox" name="is_featured" value="1" class="form-check-input">
                    <label class="form-check-label">Featured Product</label>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" name="is_sponsored" value="1" class="form-check-input">
                    <label class="form-check-label">Sponsored Product</label>
                </div>

                <select name="allow_coupon" class="form-select mt-2">
                    <option value="1">Allow Coupon</option>
                    <option value="0">Disable Coupon</option>
                </select>
            </div>

        </div>

    </div>

    <!-- STICKY SAVE -->
    <div class="sticky-footer text-end">
        <button class="btn btn-success px-5">Save Product</button>
    </div>

</form>

<script>
    let variantIndex = 1;

    function addVariant() {
        let html = `
        <div class="border rounded p-3 mb-3">
            <input type="text" name="color[]" class="form-control mb-2" placeholder="Color">
            <input type="text" name="size[]" class="form-control mb-2" placeholder="Size">
            <input type="number" name="variant_price[]" class="form-control mb-2" placeholder="Price">
            <input type="number" name="variant_discount[]" class="form-control mb-2" placeholder="Discount %">
            <input type="number" name="variant_stock[]" class="form-control mb-2" placeholder="Stock">
            <input type="file" name="variant_images_${variantIndex}[]" multiple class="form-control">
        </div>
    `;
        document.getElementById('variants-wrapper').insertAdjacentHTML('beforeend', html);
        variantIndex++;
    }
</script>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
    CKEDITOR.replace('specEditor');
</script>

<?= $this->endSection() ?>
<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">✏️ Edit Product</h3>

<form method="post" action="/admin/product/update/<?= $product['id'] ?>" enctype="multipart/form-data">

    <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

    <!-- BASIC INFO -->
    <div class="card mb-3 p-4 shadow-sm">

        <h5 class="mb-3">📦 Basic Product Information</h5>

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" value="<?= $product['brand'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Target Audience</label>
            <select name="gender" class="form-control">
                <option value="men" <?= $product['gender'] == 'men' ? 'selected' : '' ?>>Men</option>
                <option value="women" <?= $product['gender'] == 'women' ? 'selected' : '' ?>>Women</option>
                <option value="kids" <?= $product['gender'] == 'kids' ? 'selected' : '' ?>>Kids</option>
                <option value="unisex" <?= $product['gender'] == 'unisex' ? 'selected' : '' ?>>Unisex</option>
            </select>
        </div>

        <div class="mb-3">

            <label class="form-label">
                Product Slug
            </label>

            <input type="text"
                name="slug"
                value="<?= $product['slug'] ?>"
                class="form-control">

        </div>

        <!-- DESCRIPTION -->
        <div class="mb-3">

            <label class="form-label fw-bold">
                Product Description
            </label>

            <textarea name="description" id="editor">
            <?= $product['description'] ?>
            </textarea>

        </div>

        <!-- CKEDITOR -->
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace('editor');
        </script>

        <!-- SPECIFICATIONS -->
        <div class="mb-3">

            <label class="form-label fw-bold">
                Product Specifications
            </label>

            <textarea name="specifications" id="specEditor">
                <?= $product['specifications'] ?>
            </textarea>

        </div>

        <script>
            CKEDITOR.replace('specEditor');
        </script>

        <!-- sponsored/featured -->
        <div class="form-check mb-2">
            <input type="checkbox" name="is_featured" value="1"
                <?= $product['is_featured'] ? 'checked' : '' ?>>
            Featured Product
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" name="is_sponsored" value="1"
                <?= $product['is_sponsored'] ? 'checked' : '' ?>>
            Sponsored Product
        </div>

        <hr>

        <h5 class="mb-3">
            🔍 SEO Settings
        </h5>

        <div class="mb-3">

            <label class="form-label">
                Meta Title
            </label>

            <input type="text"
                name="meta_title"
                value="<?= $product['meta_title'] ?>"
                class="form-control">

        </div>

        <div class="mb-3">

            <label class="form-label">
                Meta Description
            </label>

            <textarea name="meta_description"
                class="form-control"
                rows="4"><?= $product['meta_description'] ?></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Product Status
            </label>

            <select name="status" class="form-control">

                <option value="1"
                    <?= $product['status'] == 1 ? 'selected' : '' ?>>
                    Active
                </option>

                <option value="0"
                    <?= $product['status'] == 0 ? 'selected' : '' ?>>
                    Disabled
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Product Tags
            </label>

            <input type="text"
                name="tags"
                value="<?= $product['tags'] ?>"
                class="form-control">

        </div>

        <div class="row">

            <div class="col-md-4 mb-3">
                <label class="form-label">Base Price (₹)</label>
                <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Product Discount (%)</label>
                <input type="number" name="discount" value="<?= $product['discount'] ?>" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= $c['id'] ?>" <?= $c['id'] == $product['category_id'] ? 'selected' : '' ?>>
                            <?= $c['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>

        <div class="mb-3">
            <label class="form-label">Main Product Image</label><br>
            <img src="/uploads/products/<?= $product['image'] ?>" width="120" class="mb-2 rounded">
            <input type="file" name="image" class="form-control">
        </div>

    </div>

    <!-- VARIANTS -->
    <h5 class="mt-4">Variants</h5>

    <div id="variant-wrapper">

        <?php foreach ($variants as $i => $v): ?>

            <div class="card p-3 mb-3">

                <input type="hidden" name="variant_id[]" value="<?= $v['id'] ?>">

                <div class="row">
                    <div class="col-md-2">
                        <label>Color</label>
                        <input type="text" name="color[]" value="<?= $v['color'] ?>" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label>Size</label>
                        <input type="text" name="size[]" value="<?= $v['size'] ?>" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label>Price</label>
                        <input type="number" name="variant_price[]" value="<?= $v['price'] ?>" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label>Discount %</label>
                        <input type="number" name="variant_discount[]" value="<?= $v['discount'] ?>" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label>Stock</label>
                        <input type="number" name="variant_stock[]" value="<?= $v['stock'] ?>" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label>Status</label>
                        <select name="variant_status[]" class="form-control">
                            <option value="1" <?= $v['status'] ? 'selected' : '' ?>>Enabled</option>
                            <option value="0" <?= !$v['status'] ? 'selected' : '' ?>>Disabled</option>
                        </select>
                    </div>
                </div>

                <!-- 🔥 IMAGES -->
                <div class="mt-3">
                    <label class="fw-bold">Variant Images (Multiple Allowed)</label>
                    <small class="text-muted d-block">Upload multiple images for this color/size</small>

                    <?php foreach ($v['images'] as $img): ?>
                        <div style="display:inline-block; position:relative; margin-right:10px;">
                            <img src="/uploads/products/<?= $img['image'] ?>" width="70" class="rounded">

                            <a href="/admin/product/delete-image/<?= $img['id'] ?>"
                                onclick="return confirm('Delete image?')"
                                style="position:absolute; top:0; right:0; color:red;">
                                ✖
                            </a>
                        </div>
                    <?php endforeach; ?>

                    <input type="file" name="variant_images_<?= $i ?>[]" multiple class="form-control mt-2">
                </div>

                <!-- DELETE VARIANT -->
                <div class="mt-2 text-end">
                    <a href="/admin/product/delete-variant/<?= $v['id'] ?>"
                        onclick="return confirm('Delete variant?')"
                        class="btn btn-sm btn-danger">
                        Delete Variant
                    </a>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <button type="button" class="btn btn-dark mt-2" onclick="addVariant()">
        + Add New Variant
    </button>

    <button class="btn btn-success mt-3 w-100">
        Update Product
    </button>

</form>

<script>
    let index = <?= count($variants) ?>;

    function addVariant() {
        let html = `
    <div class="card p-3 mb-3">

        <input type="hidden" name="variant_id[]" value="new">

        <div class="row">
            <div class="col-md-2">
                <input name="color[]" placeholder="Color" class="form-control">
            </div>
            <div class="col-md-2">
                <input name="size[]" placeholder="Size" class="form-control">
            </div>
            <div class="col-md-2">
                <input name="variant_price[]" placeholder="Price" class="form-control">
            </div>
            <div class="col-md-2">
                <input name="variant_discount[]" placeholder="Discount" class="form-control">
            </div>
            <div class="col-md-2">
                <input name="variant_stock[]" placeholder="Stock" class="form-control">
            </div>
            <div class="col-md-2">
                <select name="variant_status[]" class="form-control">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>
            </div>
        </div>

        <input type="file" name="variant_images_new_${index}[]" multiple class="form-control mt-2">

    </div>
    `;

        document.getElementById('variant-wrapper').insertAdjacentHTML('beforeend', html);
        index++;
    }
</script>

<?= $this->endSection() ?>
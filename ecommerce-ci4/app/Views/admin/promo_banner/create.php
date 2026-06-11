<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3 class="fw-bold mb-4">
    Add Promo Banner
</h3>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form method="post"
            action="/admin/promo-banner/store"
            enctype="multipart/form-data">

            <input type="text"
                name="title"
                class="form-control mb-3"
                placeholder="Banner Title">

            <textarea name="subtitle"
                class="form-control mb-3"
                rows="3"
                placeholder="Subtitle"></textarea>

            <input type="text"
                name="button_text"
                class="form-control mb-3"
                placeholder="Button Text">

            <input type="text"
                name="button_link"
                class="form-control mb-3"
                placeholder="Button Link">

            <input type="file"
                name="image"
                class="form-control mb-3">

            <input type="number"
                name="sort_order"
                class="form-control mb-3"
                placeholder="Display Order">

            <select name="status" class="form-select mb-4">
                <option value="1">Active</option>
                <option value="0">Disabled</option>
            </select>

            <button class="btn btn-dark rounded-pill px-5">
                Save Banner
            </button>

        </form>

    </div>

</div>

<?= $this->endSection() ?>
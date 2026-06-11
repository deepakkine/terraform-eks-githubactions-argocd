<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<?= view('frontend/partials/hero_slider') ?>

<?= view('frontend/partials/top_categories') ?>

<?= view('frontend/partials/promo_banner') ?>


<?= view('frontend/partials/featured_products') ?>

<?= view('frontend/partials/sponsored_products') ?>


<?= view('frontend/partials/trending_products') ?>

<?= view('frontend/partials/trust_section') ?>


<?= view('frontend/partials/brands') ?>



<?= $this->endSection() ?>
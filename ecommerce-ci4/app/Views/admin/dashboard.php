<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="/assets/admin/css/dashboard.css">

<!-- =========================================
   PAGE HEADER
========================================= -->

<div class="dashboard-header">

    <div>

        <h2>
            Dashboard Analytics
        </h2>

        <p>
            Monitor sales, orders and ecommerce performance
        </p>

    </div>

</div>

<!-- =========================================
   FILTER SECTION
========================================= -->

<div class="dashboard-filter-card">

    <div class="quick-filters">

        <a href="?filter=today" class="filter-btn active-filter">
            Today
        </a>

        <a href="?filter=month" class="filter-btn">
            This Month
        </a>

        <a href="?filter=year" class="filter-btn">
            This Year
        </a>

    </div>

    <form class="custom-filter-form">

        <input type="date"
            name="date"
            class="dashboard-input">

        <input type="month"
            name="month"
            class="dashboard-input">

        <button class="apply-btn">
            Apply
        </button>

    </form>

</div>

<!-- =========================================
   STATS CARDS
========================================= -->

<div class="stats-grid">

    <!-- ORDERS -->

    <div class="stats-card">

        <div class="stats-icon blue">

            <i class="bi bi-bag-check"></i>

        </div>

        <div class="stats-info">

            <span>Total Orders</span>

            <h3><?= $orders ?></h3>

        </div>

    </div>

    <!-- REVENUE -->

    <div class="stats-card">

        <div class="stats-icon green">

            <i class="bi bi-currency-rupee"></i>

        </div>

        <div class="stats-info">

            <span>Total Revenue</span>

            <h3>₹<?= number_format($revenue) ?></h3>

        </div>

    </div>

    <!-- PRODUCTS -->

    <div class="stats-card">

        <div class="stats-icon orange">

            <i class="bi bi-box-seam"></i>

        </div>

        <div class="stats-info">

            <span>Total Products</span>

            <h3><?= $products ?></h3>

        </div>

    </div>

    <!-- USERS -->

    <div class="stats-card">

        <div class="stats-icon purple">

            <i class="bi bi-people"></i>

        </div>

        <div class="stats-info">

            <span>Total Customers</span>

            <h3><?= $users ?></h3>

        </div>

    </div>

</div>

<!-- =========================================
   CHART SECTION
========================================= -->

<div class="chart-card">

    <div class="chart-header">

        <div>

            <h4>
                Orders & Revenue Trend
            </h4>

            <p>
                Performance analytics overview
            </p>

        </div>

    </div>

    <div class="chart-wrapper">

        <canvas id="chart"></canvas>

    </div>

</div>

<!-- Chart JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const chartData = <?= json_encode($chartData) ?>;

    const labels = chartData.map(i => i.date);

    const orders = chartData.map(i => i.orders);

    const revenue = chartData.map(i => i.revenue);

    new Chart(document.getElementById('chart'), {

        type: 'line',

        data: {

            labels: labels,

            datasets: [

                {
                    label: 'Orders',

                    data: orders,

                    tension: 0.4,

                    borderWidth: 3
                },

                {
                    label: 'Revenue',

                    data: revenue,

                    tension: 0.4,

                    borderWidth: 3
                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {

                    position: 'top'

                }

            },

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }

    });
</script>

<?= $this->endSection() ?>
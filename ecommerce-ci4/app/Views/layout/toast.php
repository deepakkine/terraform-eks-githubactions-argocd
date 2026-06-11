<?php if (session()->getFlashdata('success')): ?>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastMsg" class="toast show bg-success text-white">
            <div class="toast-body">
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastMsg" class="toast show bg-danger text-white">
            <div class="toast-body">
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    setTimeout(function() {
        var toast = document.getElementById('toastMsg');
        if (toast) {
            toast.style.transition = "opacity 0.5s";
            toast.style.opacity = "0";
            setTimeout(() => toast.remove(), 500);
        }
    }, 5000);
</script>
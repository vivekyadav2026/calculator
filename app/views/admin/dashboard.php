<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<h2 class="fw-bold mb-4">Dashboard</h2>
<div class="row g-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4">
            <i class="bi bi-calculator text-primary fs-1 mb-2"></i>
            <h3 class="fw-bold">15</h3>
            <span class="text-muted">Total Calculators</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4">
            <i class="bi bi-pen text-success fs-1 mb-2"></i>
            <h3 class="fw-bold">2</h3>
            <span class="text-muted">Blog Posts</span>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4">
            <i class="bi bi-eye text-info fs-1 mb-2"></i>
            <h3 class="fw-bold">1,204</h3>
            <span class="text-muted">Page Views</span>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mt-5 rounded-4">
    <div class="card-header bg-white p-3 fw-bold border-bottom">
        Recent Activity
    </div>
    <div class="card-body">
        <p class="text-muted mb-0">System initialized successfully. No recent errors.</p>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

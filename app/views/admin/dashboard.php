<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 text-dark">Dashboard</h3>
    <a href="<?php echo URLROOT; ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-box-arrow-up-right me-1"></i> View Live Site</a>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">Calculators</span>
                <i class="bi bi-calculator text-muted"></i>
            </div>
            <h2 class="fw-bold mb-0 text-dark"><?php echo isset($data['total_calculators']) ? number_format($data['total_calculators']) : 0; ?></h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">Blog Posts</span>
                <i class="bi bi-pen text-muted"></i>
            </div>
            <h2 class="fw-bold mb-0 text-dark"><?php echo isset($data['total_posts']) ? number_format($data['total_posts']) : 0; ?></h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">Page Views</span>
                <i class="bi bi-bar-chart text-muted"></i>
            </div>
            <h2 class="fw-bold mb-0 text-dark"><?php echo isset($data['page_views']) ? number_format($data['page_views']) : 0; ?></h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted small fw-bold text-uppercase" style="letter-spacing: 0.05em;">System Status</span>
                <i class="bi bi-activity text-success"></i>
            </div>
            <h2 class="fw-bold mb-0 text-success">Healthy</h2>
        </div>
    </div>
</div>

<div class="card border-0">
    <div class="card-header bg-white">
        <h6 class="fw-bold mb-0">Recent Activity</h6>
    </div>
    <div class="card-body p-0">
        <div class="p-4 border-bottom" style="border-color: #E5E7EB;">
            <div class="d-flex align-items-center">
                <div class="bg-light rounded-circle p-2 me-3 d-flex justify-content-center align-items-center" style="width:40px; height:40px;">
                    <i class="bi bi-check2 text-dark"></i>
                </div>
                <div>
                    <p class="mb-0 fw-medium text-dark">System initialized successfully.</p>
                    <span class="text-muted small">Just now</span>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="d-flex align-items-center">
                <div class="bg-light rounded-circle p-2 me-3 d-flex justify-content-center align-items-center" style="width:40px; height:40px;">
                    <i class="bi bi-person text-dark"></i>
                </div>
                <div>
                    <p class="mb-0 fw-medium text-dark">Admin logged in.</p>
                    <span class="text-muted small">2 hours ago</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

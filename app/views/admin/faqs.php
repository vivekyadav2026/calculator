<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Manage FAQs</h2>
    <button class="btn btn-primary rounded-pill px-3"><i class="bi bi-plus-lg me-1"></i> Add FAQ</button>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 text-center text-muted">
        <i class="bi bi-chat-square-text fs-1 text-primary mb-3 d-block"></i>
        <h5>No FAQs added yet</h5>
        <p class="small text-muted">Manage questions and answers displayed on calculator pages.</p>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

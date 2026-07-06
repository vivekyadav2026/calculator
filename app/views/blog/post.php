<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Back to Blog Button -->
            <a href="<?php echo URLROOT; ?>/blog" class="btn btn-outline-secondary rounded-pill mb-4 px-3">
                <i class="bi bi-arrow-left me-1"></i> Back to Blog
            </a>

            <!-- Article Details -->
            <article class="blog-post">
                <header class="mb-4">
                    <h1 class="display-5 fw-bold text-body mb-3"><?php echo htmlspecialchars($data['post']->title); ?></h1>
                    
                    <div class="d-flex align-items-center gap-3 text-muted">
                        <span class="d-flex align-items-center gap-1 small">
                            <i class="bi bi-calendar3"></i> 
                            <?php echo date('M d, Y', strtotime($data['post']->created_at)); ?>
                        </span>
                        <span class="d-flex align-items-center gap-1 small">
                            <i class="bi bi-person"></i> By Admin
                        </span>
                    </div>
                </header>

                <!-- Post Body Content -->
                <div class="card shadow-none border rounded-4">
                    <div class="card-body p-4 p-md-5 fs-5 text-muted lh-base">
                        <?php echo nl2br($data['post']->content); ?>
                    </div>
                </div>
            </article>

            <!-- Bottom Disclaimer / Help -->
            <div class="mt-5 p-4 bg-light rounded-4 text-center">
                <h5 class="fw-bold mb-2">Want to perform your own calculations?</h5>
                <p class="text-muted small mb-3">Try out our complete collection of modern calculators today.</p>
                <a href="<?php echo URLROOT; ?>" class="btn btn-primary rounded-pill px-4">Browse Calculators</a>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>

<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold">Our Blog</h1>
            <p class="lead text-muted">Latest tips, news, and guides on finance, health, and more.</p>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach($data['posts'] as $post): ?>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    <small class="text-primary fw-bold mb-2 d-block">
                        <i class="bi bi-calendar3"></i> <?php echo date('M d, Y', strtotime($post->created_at)); ?>
                    </small>
                    <h3 class="card-title fw-bold h4 mb-3"><?php echo $post->title; ?></h3>
                    <p class="card-text text-muted">
                        <?php echo substr(strip_tags($post->content), 0, 150) . '...'; ?>
                    </p>
                    <a href="<?php echo URLROOT; ?>/blog/post/<?php echo $post->slug; ?>" class="btn btn-outline-primary rounded-pill mt-3">Read Article</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>

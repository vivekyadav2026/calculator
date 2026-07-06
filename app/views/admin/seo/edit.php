<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Edit SEO: <?php echo $data['seo']->page_title; ?></h2>
    <a href="<?php echo URLROOT; ?>/admin/seo" class="btn btn-outline-secondary rounded-pill px-3"><i class="bi bi-arrow-left me-1"></i> Back</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <form action="<?php echo URLROOT; ?>/admin/edit_seo/<?php echo $data['seo']->page_key; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="<?php echo htmlspecialchars($data['seo']->meta_title ?? ''); ?>" required>
                    <div class="form-text">Recommended length: 50-60 characters.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" required><?php echo htmlspecialchars($data['seo']->meta_description ?? ''); ?></textarea>
                    <div class="form-text">Recommended length: 150-160 characters.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($data['seo']->meta_keywords ?? ''); ?>">
                    <div class="form-text">Comma separated list of keywords (e.g. calculator, tax, math).</div>
                </div>

                <hr class="my-4">
                <h5 class="fw-bold mb-3 text-primary"><i class="bi bi-facebook me-2"></i>Open Graph (Social Sharing)</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold">OG Title</label>
                    <input type="text" name="og_title" class="form-control" value="<?php echo htmlspecialchars($data['seo']->og_title ?? ''); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">OG Description</label>
                    <textarea name="og_description" class="form-control" rows="2"><?php echo htmlspecialchars($data['seo']->og_description ?? ''); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary rounded-pill px-4 mt-3">Save SEO Config</button>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

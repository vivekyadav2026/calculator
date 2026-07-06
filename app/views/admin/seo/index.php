<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Manage SEO Settings</h2>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Page Title</th>
                        <th>Page Key</th>
                        <th>Meta Title</th>
                        <th class="pe-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($data['settings'])): ?>
                        <?php foreach($data['settings'] as $seo): ?>
                        <tr>
                            <td class="ps-4 fw-medium"><?php echo $seo->page_title; ?></td>
                            <td><code><?php echo $seo->page_key; ?></code></td>
                            <td class="text-muted small"><?php echo htmlspecialchars(substr($seo->meta_title ?? '', 0, 50)); ?><?php echo (strlen($seo->meta_title ?? '') > 50) ? '...' : ''; ?></td>
                            <td class="pe-4 text-end">
                                <a href="<?php echo URLROOT; ?>/admin/edit_seo/<?php echo $seo->page_key; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square me-1"></i> Edit SEO</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center p-4 text-muted">No SEO configurations found. Check database tables.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

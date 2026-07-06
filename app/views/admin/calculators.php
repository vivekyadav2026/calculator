<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Manage Calculators</h2>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Calculator Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th class="pe-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($data['calculators'])): ?>
                        <?php foreach($data['calculators'] as $calc): ?>
                        <tr>
                            <td class="ps-4 fw-medium"><?php echo $calc->name; ?></td>
                            <td><code><?php echo $calc->slug; ?></code></td>
                            <td>
                                <?php if($calc->status == 'active'): ?>
                                    <span class="badge bg-success-subtle text-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="pe-4 text-end">
                                <a href="<?php echo URLROOT; ?>/admin/edit_calculator/<?php echo $calc->id; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square me-1"></i> Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center p-4 text-muted">No calculators found. Check database tables.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

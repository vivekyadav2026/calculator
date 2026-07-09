<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 ">Manage Calculators</h3>
    <button class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Add New</button>
</div>

<div class="card border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
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
                            <td class="ps-4 fw-medium "><?php echo $calc->name; ?></td>
                            <td><span class="text-muted" style="font-size: 0.8rem; font-family: monospace; background: #F3F4F6; padding: 4px 8px; border-radius: 4px;"><?php echo $calc->slug; ?></span></td>
                            <td>
                                <?php if($calc->status == 'active'): ?>
                                    <span class="badge" style="background: #ECFDF5; color: #059669; font-weight: 500; padding: 6px 12px; border-radius: 9999px;">Active</span>
                                <?php else: ?>
                                    <span class="badge" style="background: #FEF2F2; color: #DC2626; font-weight: 500; padding: 6px 12px; border-radius: 9999px;">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="pe-4 text-end">
                                <a href="<?php echo URLROOT; ?>/admin/edit_calculator/<?php echo $calc->id; ?>" class="btn btn-outline-primary btn-sm px-3">Edit</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-folder2-open fs-1 mb-2 d-block text-muted" style="opacity: 0.5;"></i>
                                No calculators found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

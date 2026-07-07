<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 ">Edit Calculator: <?php echo htmlspecialchars($data['calculator']->name); ?></h3>
    <a href="<?php echo URLROOT; ?>/admin/calculators" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left me-1"></i> Back</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0">
            <div class="card-header bg-white">
                <h6 class="fw-bold mb-0">Calculator Configuration</h6>
            </div>
            <div class="card-body p-4">
                <form action="<?php echo URLROOT; ?>/admin/edit_calculator/<?php echo $data['calculator']->id; ?>" method="POST">
                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Calculator Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($data['calculator']->name ?? ''); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Description</label>
                        <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($data['calculator']->description ?? ''); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" <?php echo ($data['calculator']->status == 'active') ? 'selected' : ''; ?>>Active</option>
                            <option value="inactive" <?php echo ($data['calculator']->status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="mt-4 pt-3 border-top" style="border-color: #E5E7EB;">
                        <button type="submit" class="btn btn-primary px-4 py-2">Save Configuration</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

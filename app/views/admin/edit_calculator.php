<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Edit Calculator: <?php echo htmlspecialchars($data['calculator']->name); ?></h2>
    <a href="<?php echo URLROOT; ?>/admin/calculators" class="btn btn-outline-secondary rounded-pill px-3"><i class="bi bi-arrow-left me-1"></i> Back</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <form action="<?php echo URLROOT; ?>/admin/edit_calculator/<?php echo $data['calculator']->id; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold">Calculator Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($data['calculator']->name ?? ''); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($data['calculator']->description ?? ''); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?php echo ($data['calculator']->status == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo ($data['calculator']->status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary rounded-pill px-4 mt-3">Save Calculator Config</button>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 ">Website Settings</h3>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0">
            <div class="card-header bg-white">
                <h6 class="fw-bold mb-0">General Settings</h6>
            </div>
            <div class="card-body p-4">
                <form>
                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Site Title</label>
                        <input type="text" class="form-control" value="CalculatorTube" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">System Email</label>
                        <input type="email" class="form-control" value="admin@calculatortube.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Default Theme</label>
                        <select class="form-select">
                            <option value="light" selected>Light Mode</option>
                            <option value="dark">Dark Mode</option>
                            <option value="system">System Preference</option>
                        </select>
                    </div>
                    <div class="mt-4 pt-3 border-top" style="border-color: #E5E7EB;">
                        <button type="submit" class="btn btn-primary px-4 py-2">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0">
            <div class="card-header bg-white">
                <h6 class="fw-bold mb-0">Change Password</h6>
            </div>
            <div class="card-body p-4">
                <?php if (!empty($data['password_err'])): ?>
                    <div class="alert alert-danger p-2" style="font-size: 0.875rem;"><?php echo $data['password_err']; ?></div>
                <?php endif; ?>
                <?php if (!empty($data['password_success'])): ?>
                    <div class="alert alert-success p-2" style="font-size: 0.875rem;"><?php echo $data['password_success']; ?></div>
                <?php endif; ?>
                
                <form action="<?php echo URLROOT; ?>/admin/settings" method="POST">
                    <input type="hidden" name="change_password" value="1">
                    <div class="mb-3">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Old Password</label>
                        <input type="password" name="old_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium  mb-1" style="font-size: 0.875rem;">Confirm New Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                    <div class="mt-4 pt-3 border-top" style="border-color: #E5E7EB;">
                        <button type="submit" class="btn btn-primary px-4 py-2 w-100">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

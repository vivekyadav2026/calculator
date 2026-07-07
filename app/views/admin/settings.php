<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 text-dark">Website Settings</h3>
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
                        <label class="form-label fw-medium text-dark mb-1" style="font-size: 0.875rem;">Site Title</label>
                        <input type="text" class="form-control" value="CalculatorTube" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium text-dark mb-1" style="font-size: 0.875rem;">System Email</label>
                        <input type="email" class="form-control" value="admin@calculatortube.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium text-dark mb-1" style="font-size: 0.875rem;">Default Theme</label>
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
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<h2 class="fw-bold mb-4">Website Settings</h2>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <form>
                <div class="mb-3">
                    <label class="form-label fw-bold">Site Title</label>
                    <input type="text" class="form-control" value="Modern Calculator" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">System Email</label>
                    <input type="email" class="form-control" value="info@moderncalc.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Default Theme</label>
                    <select class="form-select">
                        <option value="light" selected>Light Mode</option>
                        <option value="dark">Dark Mode</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill px-4 mt-3">Save Settings</button>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

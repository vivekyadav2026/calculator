<?php require APPROOT . '/views/admin/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Manage Blogs</h2>
    <button class="btn btn-primary rounded-pill px-3"><i class="bi bi-plus-lg me-1"></i> Add Post</button>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Title</th>
                        <th>Created At</th>
                        <th class="pe-4 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($data['posts'])): ?>
                        <?php foreach($data['posts'] as $post): ?>
                        <tr>
                            <td class="ps-4 fw-medium"><?php echo $post->title; ?></td>
                            <td><?php echo date('M d, Y', strtotime($post->created_at)); ?></td>
                            <td class="pe-4 text-end">
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center p-4 text-muted">No blog posts found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/layouts/footer.php'; ?>

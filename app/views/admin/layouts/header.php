<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['title']) ? $data['title'] . ' - Admin' : 'Admin Panel'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .sidebar { min-height: 100vh; background: #0f172a; color: white; width: 260px; }
        .sidebar a { color: #94a3b8; text-decoration: none; padding: 12px 16px; display: block; border-radius: 8px; margin-bottom: 6px; transition: all 0.2s; }
        .sidebar a:hover, .sidebar a.active { background: #1e293b; color: white; }
        .sidebar a.active { border-left: 4px solid #3b82f6; }
        .admin-content { flex-grow: 1; background: #f8fafc; min-height: 100vh; }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3 shadow-sm">
            <h4 class="text-white fw-bold mb-4 px-2 d-flex align-items-center">
                <i class="bi bi-calculator text-primary me-2"></i> Admin Panel
            </h4>
            <a href="<?php echo URLROOT; ?>/admin" class="<?php echo ($data['active_menu'] == 'dashboard') ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="<?php echo URLROOT; ?>/admin/calculators" class="<?php echo ($data['active_menu'] == 'calculators') ? 'active' : ''; ?>">
                <i class="bi bi-calculator me-2"></i> Calculators
            </a>
            <a href="<?php echo URLROOT; ?>/admin/blogs" class="<?php echo ($data['active_menu'] == 'blogs') ? 'active' : ''; ?>">
                <i class="bi bi-pen me-2"></i> Blog Posts
            </a>
            <a href="<?php echo URLROOT; ?>/admin/faqs" class="<?php echo ($data['active_menu'] == 'faqs') ? 'active' : ''; ?>">
                <i class="bi bi-chat-square-text me-2"></i> FAQs
            </a>
            <a href="<?php echo URLROOT; ?>/admin/seo" class="<?php echo ($data['active_menu'] == 'seo') ? 'active' : ''; ?>">
                <i class="bi bi-search me-2"></i> Manage SEO
            </a>
            <a href="<?php echo URLROOT; ?>/admin/settings" class="<?php echo ($data['active_menu'] == 'settings') ? 'active' : ''; ?>">
                <i class="bi bi-gear me-2"></i> Settings
            </a>
            <a href="<?php echo URLROOT; ?>/admin/logout" class="mt-4 text-danger">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
            <a href="<?php echo URLROOT; ?>" class="mt-5 text-muted small d-block">
                <i class="bi bi-arrow-left-circle me-2"></i> Back to Site
            </a>
        </div>
        <!-- Main Admin Content Area -->
        <div class="admin-content p-4 p-md-5">

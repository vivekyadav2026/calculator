<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['title']) ? $data['title'] . ' - Admin' : 'Admin Panel'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body { font-family: 'Inter', sans-serif; background-color: #FAFAFA; color: #111827; }
        .sidebar { 
            min-height: 100vh; 
            background: #FFFFFF; 
            color: #4B5563; 
            width: 260px; 
            border-right: 1px solid #E5E7EB;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            transition: transform 0.3s ease-in-out;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .admin-content {
                margin-left: 0 !important;
                padding-top: 80px !important; /* Add space for mobile topbar */
            }
            .mobile-topbar {
                display: flex !important;
            }
        }
        @media (min-width: 769px) {
            .admin-content {
                margin-left: 260px;
            }
            .mobile-topbar {
                display: none !important;
            }
        }
        .mobile-topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 60px;
            background: #FFFFFF;
            border-bottom: 1px solid #E5E7EB;
            display: none;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            z-index: 1030;
        }
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(17, 24, 39, 0.5);
            z-index: 1035;
        }
        .sidebar-overlay.show {
            display: block;
        }
        .sidebar-brand {
            font-weight: 700;
            font-size: 1.1rem;
            color: #111827;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .sidebar a.nav-item { 
            color: #4B5563; 
            text-decoration: none; 
            padding: 10px 16px; 
            display: flex; 
            align-items: center;
            border-radius: 6px; 
            margin-bottom: 4px; 
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s; 
        }
        .sidebar a.nav-item:hover { 
            background: #F3F4F6; 
            color: #111827; 
        }
        .sidebar a.nav-item.active { 
            background: #F3F4F6; 
            color: #111827;
            font-weight: 600;
        }
        .sidebar a.nav-item i {
            font-size: 1.1rem;
            margin-right: 12px;
            color: #6B7280;
        }
        .sidebar a.nav-item:hover i, .sidebar a.nav-item.active i {
            color: #111827;
        }
        
        .admin-content { 
            flex-grow: 1; 
            background: #FAFAFA; 
            min-height: 100vh; 
        }
        .admin-header {
            background: #FFFFFF;
            border-bottom: 1px solid #E5E7EB;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        /* Premium Card Styles */
        .card {
            border: 1px solid #E5E7EB !important;
            border-radius: 12px !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
            background: #FFFFFF;
        }
        .card-header {
            background-color: #FFFFFF;
            border-bottom: 1px solid #E5E7EB;
            padding: 1rem 1.25rem;
            border-radius: 12px 12px 0 0 !important;
        }
        
        /* Table Styles */
        .table { margin-bottom: 0; }
        .table th {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6B7280;
            background-color: #F9FAFB !important;
            font-weight: 600;
            border-bottom: 1px solid #E5E7EB;
            padding: 12px 16px;
        }
        .table td {
            font-size: 0.875rem;
            color: #374151;
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #E5E7EB;
        }
        .table tbody tr:last-child td { border-bottom: none; }
        
        /* Inputs & Buttons */
        .form-control, .form-select {
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 0.875rem;
            padding: 0.5rem 0.75rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .form-control:focus, .form-select:focus {
            border-color: #6366F1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }
        .btn-primary {
            background-color: #111827;
            border-color: #111827;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #374151;
            border-color: #374151;
        }
        .btn-outline-primary {
            color: #111827;
            border-color: #D1D5DB;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 6px;
        }
        .btn-outline-primary:hover {
            background-color: #F3F4F6;
            color: #111827;
            border-color: #D1D5DB;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Mobile Topbar -->
    <div class="mobile-topbar">
        <a href="<?php echo URLROOT; ?>/admin" class="sidebar-brand">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2" style="color: #111827;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
            CalculatorTube
        </a>
        <button id="sidebarToggle" class="btn btn-light border-0 p-1"><i class="bi bi-list fs-3"></i></button>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <div class="d-flex w-100">
        <!-- Sidebar -->
        <div class="sidebar p-3" id="adminSidebar">
            <div class="mb-4 px-3 pt-2 d-flex justify-content-between align-items-center">
                <a href="<?php echo URLROOT; ?>/admin" class="sidebar-brand">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2" style="color: #111827;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
                    CalculatorTube
                </a>
                <button id="sidebarClose" class="btn btn-sm btn-light d-md-none border-0 p-1"><i class="bi bi-x-lg"></i></button>
            </div>
            
            <div class="px-2">
                <p class="text-uppercase text-muted fw-bold mb-2 ms-2" style="font-size: 0.7rem; letter-spacing: 0.05em;">Overview</p>
                <a href="<?php echo URLROOT; ?>/admin" class="nav-item <?php echo ($data['active_menu'] == 'dashboard') ? 'active' : ''; ?>">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
                <a href="<?php echo URLROOT; ?>/admin/calculators" class="nav-item <?php echo ($data['active_menu'] == 'calculators') ? 'active' : ''; ?>">
                    <i class="bi bi-calculator"></i> Calculators
                </a>
                
                <p class="text-uppercase text-muted fw-bold mt-4 mb-2 ms-2" style="font-size: 0.7rem; letter-spacing: 0.05em;">Content</p>
                <a href="<?php echo URLROOT; ?>/admin/blogs" class="nav-item <?php echo ($data['active_menu'] == 'blogs') ? 'active' : ''; ?>">
                    <i class="bi bi-file-earmark-text"></i> Blog Posts
                </a>
                <a href="<?php echo URLROOT; ?>/admin/faqs" class="nav-item <?php echo ($data['active_menu'] == 'faqs') ? 'active' : ''; ?>">
                    <i class="bi bi-chat-square-text"></i> FAQs
                </a>
                
                <p class="text-uppercase text-muted fw-bold mt-4 mb-2 ms-2" style="font-size: 0.7rem; letter-spacing: 0.05em;">Settings</p>
                <a href="<?php echo URLROOT; ?>/admin/seo" class="nav-item <?php echo ($data['active_menu'] == 'seo') ? 'active' : ''; ?>">
                    <i class="bi bi-search"></i> Manage SEO
                </a>
                <a href="<?php echo URLROOT; ?>/admin/settings" class="nav-item <?php echo ($data['active_menu'] == 'settings') ? 'active' : ''; ?>">
                    <i class="bi bi-gear"></i> Settings
                </a>
                
                <a href="<?php echo URLROOT; ?>/admin/logout" class="nav-item mt-4 text-danger">
                    <i class="bi bi-box-arrow-left text-danger"></i> Logout
                </a>
                <a href="<?php echo URLROOT; ?>" class="nav-item mt-2 text-muted">
                    <i class="bi bi-arrow-left"></i> Back to Site
                </a>
            </div>
        </div>
        <!-- Main Admin Content Area -->
        <div class="admin-content p-4 p-md-5">

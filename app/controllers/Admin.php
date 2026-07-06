<?php
class Admin extends Controller {
    private $userModel;
    private $blogModel;
    private $seoModel;
    private $calculatorModel;

    public function __construct() {
        $this->userModel = $this->model('UserModel');
        $this->blogModel = $this->model('BlogModel');
        $this->seoModel = $this->model('SeoModel');
        $this->calculatorModel = $this->model('CalculatorModel');
    }

    private function checkLogin() {
        if (!$this->isLoggedIn()) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }
    }

    public function index() {
        $this->checkLogin();
        $data = [
            'title' => 'Admin Dashboard',
            'active_menu' => 'dashboard'
        ];
        $this->view('admin/dashboard', $data);
    }

    public function calculators() {
        $this->checkLogin();
        
        $calculators = $this->calculatorModel->getCalculators();
        
        // Dummy fallback list if database is empty/not imported
        if (empty($calculators)) {
            $calculators = [
                (object)['id' => 1, 'name' => 'Age Calculator', 'slug' => 'age', 'description' => 'Calculate age', 'status' => 'active'],
                (object)['id' => 2, 'name' => 'EMI Calculator', 'slug' => 'emi', 'description' => 'Calculate loan emi', 'status' => 'active'],
                (object)['id' => 3, 'name' => 'BMI Calculator', 'slug' => 'bmi', 'description' => 'Calculate body mass index', 'status' => 'active']
            ];
        }

        $data = [
            'title' => 'Manage Calculators',
            'active_menu' => 'calculators',
            'calculators' => $calculators
        ];
        $this->view('admin/calculators', $data);
    }

    public function edit_calculator($id = null) {
        $this->checkLogin();
        
        if (is_null($id)) {
            header('Location: ' . URLROOT . '/admin/calculators');
            exit;
        }

        $calculator = $this->calculatorModel->getCalculatorById($id);
        if (!$calculator) {
            header('Location: ' . URLROOT . '/admin/calculators');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $updateData = [
                'id' => $id,
                'name' => trim($_POST['name'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'status' => $_POST['status'] ?? 'active'
            ];

            if ($this->calculatorModel->updateCalculator($updateData)) {
                header('Location: ' . URLROOT . '/admin/calculators');
                exit;
            } else {
                die('Something went wrong saving calculator configuration.');
            }
        } else {
            $data = [
                'title' => 'Edit Calculator: ' . $calculator->name,
                'active_menu' => 'calculators',
                'calculator' => $calculator
            ];
            $this->view('admin/edit_calculator', $data);
        }
    }

    public function blogs() {
        $this->checkLogin();
        $posts = $this->blogModel->getPosts();
        
        if(empty($posts)) {
            $posts = [
                (object)[
                    'title' => 'How to Save Money using Compound Interest',
                    'slug' => '#',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                (object)[
                    'title' => 'Top 5 Financial Calculators You Must Use',
                    'slug' => '#',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
                ]
            ];
        }

        $data = [
            'title' => 'Manage Blog Posts',
            'active_menu' => 'blogs',
            'posts' => $posts
        ];
        $this->view('admin/blogs', $data);
    }

    public function faqs() {
        $this->checkLogin();
        $data = [
            'title' => 'Manage FAQs',
            'active_menu' => 'faqs'
        ];
        $this->view('admin/faqs', $data);
    }

    public function settings() {
        $this->checkLogin();
        $data = [
            'title' => 'Website Settings',
            'active_menu' => 'settings'
        ];
        $this->view('admin/settings', $data);
    }

    // --- SEO Management Methods ---
    public function seo() {
        $this->checkLogin();
        $seoSettings = $this->seoModel->getAllSeoSettings();
        $data = [
            'title' => 'Manage SEO Settings',
            'active_menu' => 'seo',
            'settings' => $seoSettings
        ];
        $this->view('admin/seo/index', $data);
    }

    public function edit_seo($page_key = null) {
        $this->checkLogin();
        
        if (is_null($page_key)) {
            header('Location: ' . URLROOT . '/admin/seo');
            exit;
        }

        $seo = $this->seoModel->getSeoByPageKey($page_key);
        if (!$seo) {
            header('Location: ' . URLROOT . '/admin/seo');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $updateData = [
                'page_key' => $page_key,
                'meta_title' => trim($_POST['meta_title'] ?? ''),
                'meta_description' => trim($_POST['meta_description'] ?? ''),
                'meta_keywords' => trim($_POST['meta_keywords'] ?? ''),
                'og_title' => trim($_POST['og_title'] ?? ''),
                'og_description' => trim($_POST['og_description'] ?? '')
            ];

            if ($this->seoModel->updateSeoSettings($updateData)) {
                header('Location: ' . URLROOT . '/admin/seo');
                exit;
            } else {
                die('Something went wrong saving SEO settings.');
            }
        } else {
            $data = [
                'title' => 'Edit SEO for ' . $seo->page_title,
                'active_menu' => 'seo',
                'seo' => $seo
            ];
            $this->view('admin/seo/edit', $data);
        }
    }

    public function login() {
        if ($this->isLoggedIn()) {
            header('Location: ' . URLROOT . '/admin');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
                'username_err' => '',
                'password_err' => ''
            ];

            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                $user = $this->userModel->findUserByUsername($data['username']);
                if ($user) {
                    if (password_verify($data['password'], $user->password_hash)) {
                        $this->createUserSession($user);
                        header('Location: ' . URLROOT . '/admin');
                        exit;
                    } else {
                        $data['password_err'] = 'Password incorrect';
                    }
                } else {
                    $data['username_err'] = 'No user found';
                }
            }

            $this->view('admin/login', $data);
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => ''
            ];
            $this->view('admin/login', $data);
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['user_role']);
        session_destroy();
        header('Location: ' . URLROOT . '/admin/login');
        exit;
    }

    private function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['user_role'] = $user->role;
    }

    private function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}

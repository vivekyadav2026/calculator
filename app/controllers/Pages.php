<?php
class Pages extends Controller {
    private $seoModel;

    public function __construct() {
        $this->seoModel = $this->model('SeoModel');
    }

    public function index() {
        $seo = $this->seoModel ? $this->seoModel->getSeoByPageKey('home') : null;
        $data = [
            'title' => 'Home',
            'description' => 'Welcome to the Modern Calculator Website.',
            'seo' => $seo
        ];
        $this->view('pages/index', $data);
    }

    public function about() {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

    public function terms() {
        $data = ['title' => 'Terms of Use'];
        $this->view('pages/terms', $data);
    }

    public function privacy() {
        $data = ['title' => 'Privacy Policy'];
        $this->view('pages/privacy', $data);
    }
}

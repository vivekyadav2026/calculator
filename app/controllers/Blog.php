<?php
class Blog extends Controller {
    private $blogModel;
    private $seoModel;

    public function __construct() {
        $this->blogModel = $this->model('BlogModel');
        $this->seoModel = $this->model('SeoModel');
    }

    public function index() {
        $posts = $this->blogModel->getPosts();
        if (empty($posts)) {
            $posts = [
                (object)[
                    'id' => 1,
                    'title' => 'How to Save Money using Compound Interest',
                    'slug' => 'how-to-save-money-using-compound-interest',
                    'content' => 'Compound interest is the eighth wonder of the world. He who understands it, earns it; he who doesn\'t, pays it. Starting small investments early via Systematic Investment Plans (SIP) allows your interest to accumulate and compound over time, forming a massive financial security net.',
                    'created_at' => date('Y-m-d H:i:s')
                ],
                (object)[
                    'id' => 2,
                    'title' => 'Top 5 Financial Calculators You Must Use',
                    'slug' => 'top-5-financial-calculators-you-must-use',
                    'content' => 'Financial planning is crucial to meeting personal milestones like home purchases, vehicle acquisitions, or retirement readiness. By utilizing our EMI, SIP, FD, and Simple Interest calculators, you can build clear amortization schedules and optimize budgets.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
                ]
            ];
        }

        $seo = $this->seoModel ? $this->seoModel->getSeoByPageKey('blog') : null;

        $data = [
            'title' => 'Blog - Financial & Health Tips',
            'posts' => $posts,
            'seo' => $seo
        ];
        $this->view('blog/index', $data);
    }

    public function post($slug = null) {
        if (is_null($slug)) {
            header('Location: ' . URLROOT . '/blog');
            exit;
        }

        $post = $this->blogModel->getPostBySlug($slug);
        
        // Fallback dummy posts if database isn't fully imported or empty
        if (!$post) {
            if ($slug === 'how-to-save-money-using-compound-interest') {
                $post = (object)[
                    'title' => 'How to Save Money using Compound Interest',
                    'content' => 'Compound interest is the eighth wonder of the world. He who understands it, earns it; he who doesn\'t, pays it. Starting small investments early via Systematic Investment Plans (SIP) allows your interest to accumulate and compound over time, forming a massive financial security net. By setting aside even a small amount like $100 per month, the compounding interest can turn a minor contribution into a massive nest egg over a 20 or 30-year horizon. Understanding how compounding intervals and compounding frequencies work is the first step toward true financial independence.',
                    'created_at' => date('Y-m-d H:i:s')
                ];
            } else if ($slug === 'top-5-financial-calculators-you-must-use') {
                $post = (object)[
                    'title' => 'Top 5 Financial Calculators You Must Use',
                    'content' => 'Financial planning is crucial to meeting personal milestones like home purchases, vehicle acquisitions, or retirement readiness. By utilizing our EMI, SIP, FD, and Simple Interest calculators, you can build clear amortization schedules and optimize budgets. Making visual projections using our modern charts ensures that you understand exactly how much goes toward principal vs interest payments.',
                    'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
                ];
            }
        }

        if (!$post) {
            header('Location: ' . URLROOT . '/blog');
            exit;
        }

        // Set dynamic SEO data based on post content
        $data = [
            'title' => $post->title,
            'description' => substr(strip_tags($post->content), 0, 155),
            'post' => $post
        ];
        $this->view('blog/post', $data);
    }
}

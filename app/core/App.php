<?php
class App {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        $slugMap = [
            'emi-calculator' => 'emi',
            'home-loan-calculator' => 'home_loan',
            'car-loan-calculator' => 'car_loan',
            'personal-loan-calculator' => 'personal_loan',
            'sip-calculator' => 'sip',
            'compound-interest-calculator' => 'compound_interest',
            'simple-interest-calculator' => 'simple_interest',
            'income-tax-calculator' => 'income_tax',
            'fd-calculator' => 'fd',
            'gst-calculator' => 'gst',
            'bmi-calculator' => 'bmi',
            'calorie-calculator' => 'calorie',
            'percentage-calculator' => 'percentage',
            'age-calculator' => 'age',
            'love-calculator' => 'love',
            'date-calculator' => 'date',
        ];

        if (isset($url[0]) && $url[0] === 'sitemap.xml') {
            require_once APPROOT . '/controllers/Sitemap.php';
            $sitemap = new Sitemap();
            $sitemap->index($slugMap);
            return;
        }

        if (isset($url[0]) && isset($slugMap[$url[0]])) {
            $this->currentController = 'Calculators';
            $this->currentMethod = $slugMap[$url[0]];
            unset($url[0]);
            
            require_once APPROOT . '/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;
            
            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            return;
        }

        if (isset($url[0]) && file_exists(APPROOT . '/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        require_once APPROOT . '/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            $methodName = str_replace('-', '_', $url[1]);
            if (method_exists($this->currentController, $methodName)) {
                $this->currentMethod = $methodName;
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}

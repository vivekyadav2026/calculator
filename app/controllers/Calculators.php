<?php
class Calculators extends Controller {
    private $seoModel;

    public function __construct() {
        $this->seoModel = $this->model('SeoModel');
    }

    public function index() {
        $this->loadCalculatorPage('all-calculators', 'All Calculators', 'index', 'Browse our complete list of free online calculators for finance, health, and math.');
    }

    private function loadCalculatorPage($key, $title, $viewName, $desc = '') {
        $seo = $this->seoModel ? $this->seoModel->getSeoByPageKey($key) : null;
        $data = [
            'title' => $title,
            'description' => $desc,
            'seo' => $seo
        ];
        $this->view('calculators/' . $viewName, $data);
    }

    public function age() {
        $this->loadCalculatorPage('age', 'Age Calculator', 'age', 'Calculate your exact age in years, months, and days.');
    }

    public function emi() {
        $this->loadCalculatorPage('emi', 'EMI Calculator', 'emi', 'Calculate your Equated Monthly Installment (EMI) for home, car, or personal loans.');
    }

    public function bmi() {
        $this->loadCalculatorPage('bmi', 'BMI Calculator', 'bmi', 'Calculate your Body Mass Index (BMI) and check your health status.');
    }

    public function percentage() {
        $this->loadCalculatorPage('percentage', 'Percentage Calculator', 'percentage');
    }

    public function gst() {
        $this->loadCalculatorPage('gst', 'GST Calculator', 'gst');
    }

    public function sip() {
        $this->loadCalculatorPage('sip', 'SIP Calculator', 'sip');
    }

    public function simple_interest() {
        $this->loadCalculatorPage('simple-interest', 'Simple Interest Calculator', 'simple_interest');
    }

    public function compound_interest() {
        $this->loadCalculatorPage('compound-interest', 'Compound Interest Calculator', 'compound_interest');
    }

    public function fd() {
        $this->loadCalculatorPage('fd', 'FD Calculator', 'fd');
    }

    public function home_loan() {
        $this->loadCalculatorPage('home-loan', 'Home Loan EMI Calculator', 'home_loan');
    }

    public function car_loan() {
        $this->loadCalculatorPage('car-loan', 'Car Loan EMI Calculator', 'car_loan');
    }

    public function personal_loan() {
        $this->loadCalculatorPage('personal-loan', 'Personal Loan EMI Calculator', 'personal_loan');
    }

    public function income_tax() {
        $this->loadCalculatorPage('income-tax', 'Income Tax Calculator', 'income_tax');
    }

    public function love() {
        $this->loadCalculatorPage('love', 'Love Calculator', 'love');
    }

    public function calorie() {
        $this->loadCalculatorPage('calorie', 'Calorie Calculator', 'calorie');
    }
}

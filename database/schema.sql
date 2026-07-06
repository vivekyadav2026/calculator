CREATE DATABASE IF NOT EXISTS calculator_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE calculator_db;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','editor') DEFAULT 'admin',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

CREATE TABLE `calculators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `description` text,
  `meta_title` varchar(255),
  `meta_desc` text,
  `status` enum('active','inactive') DEFAULT 'active',
  `views` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- Seed all 15 calculators
INSERT INTO `calculators` (`name`, `slug`, `description`, `status`) VALUES
('Age Calculator', 'age', 'Calculate your exact age in years, months, and days.', 'active'),
('EMI Calculator', 'emi', 'Calculate your Equated Monthly Installment for home, car, or personal loans.', 'active'),
('BMI Calculator', 'bmi', 'Check your Body Mass Index and health status.', 'active'),
('Percentage Calculator', 'percentage', 'Calculate percentages quickly and accurately.', 'active'),
('GST Calculator', 'gst', 'Calculate Goods and Services Tax inclusive or exclusive prices.', 'active'),
('SIP Calculator', 'sip', 'Calculate the future value of your Systematic Investment Plan.', 'active'),
('Home Loan Calculator', 'home-loan', 'Calculate monthly EMIs for home loans.', 'active'),
('Car Loan Calculator', 'car-loan', 'Plan your vehicle purchase EMI and budgets.', 'active'),
('Personal Loan Calculator', 'personal-loan', 'Calculate monthly EMIs for unsecured personal loans.', 'active'),
('Compound Interest Calculator', 'compound-interest', 'Calculate compound interest with different compounding frequencies.', 'active'),
('Simple Interest Calculator', 'simple-interest', 'Calculate simple interest easily.', 'active'),
('Income Tax Calculator', 'income-tax', 'Estimate your income tax liability under the New Regime.', 'active'),
('Fixed Deposit Calculator', 'fd', 'Calculate maturity amount and interest earned on your Fixed Deposits.', 'active'),
('Love Calculator', 'love', 'Find out the compatibility between you and your partner!', 'active'),
('Calorie Calculator', 'calorie', 'Estimate the number of calories you need each day.', 'active');

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `calculator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`calculator_id`) REFERENCES `calculators`(`id`) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

-- Seed mock blog posts
INSERT INTO `blogs` (`title`, `slug`, `content`) VALUES 
('How to Save Money using Compound Interest', 'how-to-save-money-using-compound-interest', 'Compound interest is the eighth wonder of the world. He who understands it, earns it; he who doesn\'t, pays it. Starting small investments early via Systematic Investment Plans (SIP) allows your interest to accumulate and compound over time, forming a massive financial security net.'),
('Top 5 Financial Calculators You Must Use', 'top-5-financial-calculators-you-must-use', 'Financial planning is crucial to meeting personal milestones like home purchases, vehicle acquisitions, or retirement readiness. By utilizing our EMI, SIP, FD, and Simple Interest calculators, you can build clear amortization schedules and optimize budgets.');

-- Default admin user (Password: admin123)
INSERT INTO `users` (`username`, `password_hash`, `role`) VALUES ('admin', '$2y$10$3VdMBOnO/LZfXgVn/dSxquWgFOk915EKzB4qf8BdVH31pMzjOZDsm', 'admin');

CREATE TABLE IF NOT EXISTS `seo_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_key` varchar(255) NOT NULL UNIQUE,
  `page_title` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- Insert default SEO settings for all pages
INSERT INTO `seo_settings` (`page_key`, `page_title`, `meta_title`, `meta_description`, `meta_keywords`, `og_title`, `og_description`) VALUES
('home', 'Homepage', 'Calculate Anything, Instantly - ModernCalc', 'Fast, accurate, and beautifully designed calculators for everyday needs.', 'calculator, emi calculator, bmi, sip, age calculator', 'ModernCalc - Online Calculators', 'Calculate anything instantly.'),
('blog', 'Blog Page', 'Financial & Health Tips Blog - ModernCalc', 'Latest tips, news, and guides on finance, health, and more.', 'financial blog, health tips, compound interest guide', 'ModernCalc Blog', 'Read latest guides on finance and health.'),
('age', 'Age Calculator', 'Age Calculator - Find Your Exact Age', 'Calculate your exact age in years, months, weeks, days, and hours.', 'age calculator, calculate age, how old am i', 'Age Calculator', 'Calculate your exact age.'),
('emi', 'EMI Calculator', 'EMI Calculator - Plan Your Loans', 'Calculate monthly EMIs for Home Loans, Car Loans, and Personal Loans.', 'emi calculator, loan emi, calculate emi', 'EMI Calculator', 'Plan your loan installments.'),
('bmi', 'BMI Calculator', 'BMI Calculator - Check Health Status', 'Calculate your Body Mass Index (BMI) and understand your weight range.', 'bmi calculator, body mass index, health test', 'BMI Calculator', 'Check your BMI.'),
('percentage', 'Percentage Calculator', 'Percentage Calculator - Quick Ratio Math', 'Calculate percentages, percentage increase or decrease instantly.', 'percentage calculator, calculate percentage, percentage formula', 'Percentage Calculator', 'Calculate percentages instantly.'),
('gst', 'GST Calculator', 'GST Calculator - Add/Remove Tax', 'Calculate Goods and Services Tax (GST) inclusive or exclusive prices.', 'gst calculator, tax calculator, calculate gst', 'GST Calculator', 'Calculate GST tax instantly.'),
('sip', 'SIP Calculator', 'SIP Calculator - Mutual Fund Returns', 'Calculate systematic investment plan returns and future values.', 'sip calculator, mutual funds, future value', 'SIP Calculator', 'Calculate mutual fund returns.'),
('home-loan', 'Home Loan Calculator', 'Home Loan EMI Calculator - Housing Finance', 'Calculate monthly EMIs for home loans with interest rate amortization.', 'home loan calculator, housing loan emi, calculate home loan', 'Home Loan Calculator', 'Calculate home loan payments.'),
('car-loan', 'Car Loan Calculator', 'Car Loan EMI Calculator - Auto Finance', 'Calculate monthly EMIs for new or used car auto loans.', 'car loan calculator, auto loan emi, calculate car loan', 'Car Loan Calculator', 'Calculate auto loan payments.'),
('personal-loan', 'Personal Loan Calculator', 'Personal Loan EMI Calculator - Unsecured Loan', 'Calculate monthly EMIs for unsecured personal loans.', 'personal loan calculator, calculate personal loan, emi', 'Personal Loan Calculator', 'Calculate personal loan payments.'),
('compound-interest', 'Compound Interest Calculator', 'Compound Interest Calculator - Compounding Growth', 'Calculate compound interest earnings with monthly or quarterly frequencies.', 'compound interest calculator, compound interest formula, compound rate', 'Compound Interest Calculator', 'Calculate compound interest growth.'),
('simple-interest', 'Simple Interest Calculator', 'Simple Interest Calculator - Flat Rate Interest', 'Calculate simple interest earnings on deposits or loans.', 'simple interest calculator, simple interest formula', 'Simple Interest Calculator', 'Calculate flat rate simple interest.'),
('fd', 'Fixed Deposit Calculator', 'FD Calculator - Fixed Deposit Returns', 'Calculate maturity amount and interest earned on your Fixed Deposits.', 'fd calculator, fixed deposit, fd maturity', 'FD Calculator', 'Calculate Fixed Deposit maturity returns.'),
('love', 'Love Calculator', 'Love Calculator - Fun Compatibility matching', 'Calculate compatibility between two names just for fun.', 'love calculator, relationship compatibility, names matching', 'Love Calculator', 'Test compatibility for fun.'),
('calorie', 'Calorie Calculator', 'Calorie Calculator - Maintenance Calories', 'Calculate daily maintenance calories based on Mifflin-St Jeor formula.', 'calorie calculator, calculate calories, daily intake', 'Calorie Calculator', 'Determine daily calories needed.'),
('income-tax', 'Income Tax Calculator', 'Income Tax Calculator - Indian Slabs', 'Estimate income tax liability under the New regime default.', 'income tax calculator, india tax slabs, tax calculation', 'Income Tax Calculator', 'Calculate Indian Income Tax.');

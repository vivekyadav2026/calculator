<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Indian Income Tax Calculator</li>
        </ol>
    </nav>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-6">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Income Tax Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style=" border-radius: 0 0 4px 4px;">
                    <form id="india-tax-form">
                        <!-- Age Category & Financial Year -->
                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Age Category</label>
                                <select class="form-select form-select-sm border-secondary-subtle fw-medium" id="tax-age-category">
                                    <option value="individual" selected>Individual (&lt; 60 Years)</option>
                                    <option value="senior">Senior Citizen (60–80 Years)</option>
                                    <option value="super-senior">Super Senior Citizen (&gt; 80 Years)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Financial Year</label>
                                <select class="form-select form-select-sm border-secondary-subtle fw-medium" id="tax-year">
                                    <option value="2023" selected>FY 2023-24 (AY 2024-25)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Income Details Section -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-cash-stack text-success fs-6"></i>
                                <span class="fw-bold " style="font-size: 0.9rem;">Income Details</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Gross Salary / Wages</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-salary" value="1200000" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Income from House Property</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-house-rent" value="0" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Interest Income (FD/Savings)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-interest" value="15000" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Capital Gains</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-capgains" value="0" min="0">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Other Income (Business, Freelance)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-other" value="0" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Deductions & Exemptions (Mainly Old Regime) -->
                        <div class="mb-3">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-shield-check text-primary fs-6"></i>
                                <span class="fw-bold " style="font-size: 0.9rem;">Deductions (Old Regime)</span>
                            </div>
                            
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Section 80C Investments</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-80c" value="150000" placeholder="Max ₹1,50,000" min="0" max="150000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Section 80D (Health)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-80d" value="25000" placeholder="e.g. ₹25,000" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">HRA Exemption Claimed</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-hra" value="120000" placeholder="Rent Exemption" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Home Loan Interest (24b)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-interest-24b" value="0" placeholder="Max ₹2,00,000" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Education Loan (80E)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-80e" value="0" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mb-1" style="font-size: 0.8rem; font-weight: 600;">Other Deductions (80G, NPS)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-body-tertiary border-secondary-subtle">₹</span>
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="tax-other-deductions" value="0" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-sm btn-primary text-white fw-bold px-3 shadow-sm" style="background-color: #005A9E; border-color: #005A9E;">Calculate</button>
                            <button type="reset" class="btn btn-sm btn-outline-secondary px-3" id="btn-reset-tax">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results -->
        <div class="col-lg-6">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Tax Comparison Result</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style=" border-radius: 0 0 4px 4px;">
                    
                    <div>
                        <!-- Side by Side Regimes -->
                        <div class="row g-2 mb-3">
                            <div class="col-md-6">
                                <label class="form-label text-info-emphasis mb-1" style="font-size: 0.8rem; font-weight: 700;">NEW REGIME TAX (Default)</label>
                                <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                    <div class="literal-display-main text-info fs-5 text-end" id="res-tax-new">₹0</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-warning-emphasis mb-1" style="font-size: 0.8rem; font-weight: 700;">OLD REGIME TAX</label>
                                <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                    <div class="literal-display-main text-warning-emphasis fs-5 text-end" id="res-tax-old">₹0</div>
                                </div>
                            </div>
                        </div>

                        <!-- Savings Recommendation Box -->
                        <div class="alert alert-success border-0 rounded shadow-sm p-2 d-none align-items-center gap-2 mb-3 bg-white" id="tax-recommendation-box" style="border-left: 3px solid #198754 !important;">
                            <div class="icon-circle bg-success text-white small shadow-sm d-flex align-items-center justify-content-center" style="width: 24px; height: 24px; flex-shrink: 0; border-radius: 50%;">
                                <i class="bi bi-patch-check-fill" style="font-size: 0.8rem;"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-success-emphasis d-block" id="tax-rec-title" style="font-size: 0.85rem;">Regime Recommendation</span>
                                <span class="text-secondary" style="font-size: 0.75rem;" id="tax-rec-desc">Calculating...</span>
                            </div>
                        </div>

                        <!-- Key Figures Table -->
                        <div class="list-group list-group-flush mb-3 bg-white border rounded shadow-sm p-2" style="font-size: 0.85rem;">
                            <div class="list-group-item d-flex justify-content-between align-items-center py-1 border-0">
                                <span class=" fw-bold">Total Gross Income</span>
                                <span class="fw-semibold text-primary" id="res-gross-income">₹0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-1 border-bottom border-light">
                                <span class="text-secondary">Standard Deduction</span>
                                <span class="fw-semibold text-danger">₹50,000</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-1 border-bottom border-light">
                                <span class="text-secondary">Old Deductions Claimed</span>
                                <span class="fw-semibold text-danger" id="res-old-deductions">₹0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-1 border-bottom border-light">
                                <span class=" fw-bold">Taxable Income (New)</span>
                                <span class="fw-bold text-info" id="res-taxable-new">₹0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-1 border-0">
                                <span class=" fw-bold">Taxable Income (Old)</span>
                                <span class="fw-bold text-warning-emphasis" id="res-taxable-old">₹0</span>
                            </div>
                        </div>
                    </div>        
                        <!-- Bracket Breakdown Table for New Regime -->
                        <h6 class="fw-bold mb-2 ">New Regime – Slab Calculations</h6>
                        <div class="table-responsive rounded border bg-white shadow-sm">
                            <table class="table table-hover align-middle mb-0 small text-secondary">
                                <thead class="table-light text-body border-bottom">
                                    <tr>
                                        <th>Tax Slab</th>
                                        <th>Rate</th>
                                        <th class="text-end">Tax Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="tax-slab-breakdown-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                                <tfoot class="bg-body-tertiary fw-bold  border-top">
                                    <tr>
                                        <td colspan="2">Sub-total Tax (New Regime)</td>
                                        <td class="text-end" id="tax-subtotal-new">₹0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Health &amp; Education Cess (4%)</td>
                                        <td class="text-end text-danger" id="tax-cess-new">₹0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-primary border-bottom-0 pb-3">Net Tax Payable (New Regime)</td>
                                        <td class="text-end text-primary fs-6 border-bottom-0 pb-3" id="tax-net-new">₹0</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== EDUCATIONAL CONTENT ===================== -->
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card shadow-none border rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Income Tax?</h2>
                    <p class="text-secondary">Income tax is a direct tax levied by the government on the income earned by individuals, Hindu Undivided Families (HUFs), companies, firms, and other entities within a financial year. In India, income tax is administered by the Central Board of Direct Taxes (CBDT) under the authority of the Income Tax Act, 1961. It is one of the largest sources of revenue for the Indian government, alongside Goods and Services Tax (GST). The tax collected is used to fund public infrastructure, national defense, social welfare schemes, healthcare, and education.</p>
                    <p class="text-secondary">Income for the purposes of taxation is classified under five distinct heads under the Income Tax Act: (1) Salary Income — remuneration received from an employer, including allowances, perquisites, and benefits; (2) Income from House Property — rent received from owned properties, reduced by the municipal taxes paid and a standard deduction of 30%; (3) Profits and Gains from Business or Profession — net profits earned from any trade, commerce, or professional service; (4) Capital Gains — profits realized from the transfer or sale of capital assets like stocks, mutual funds, real estate, or gold; and (5) Income from Other Sources — interest income, dividend income, lottery winnings, and other residual income that doesn't fall under any previous category.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">New Tax Regime vs. Old Tax Regime</h2>
                    <p class="text-secondary">Since Budget 2020, the Indian government introduced a new optional tax regime offering lower slab rates but eliminating most deductions and exemptions. From FY 2023-24 (Assessment Year 2024-25), as announced in Budget 2023, the New Tax Regime has been made the <strong>default regime</strong>. Taxpayers must now explicitly opt out and file a declaration to choose the Old Regime. The following detailed comparison clarifies the key differences:</p>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered text-secondary">
                            <thead class="table-light text-body">
                                <tr>
                                    <th>Feature</th>
                                    <th>New Tax Regime (Default)</th>
                                    <th>Old Tax Regime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tax Slab Rates</td>
                                    <td>Lower (5%, 10%, 15%, 20%, 30%)</td>
                                    <td>Higher (5%, 20%, 30%)</td>
                                </tr>
                                <tr>
                                    <td>Standard Deduction</td>
                                    <td>₹50,000 (from FY 2023-24)</td>
                                    <td>₹50,000</td>
                                </tr>
                                <tr>
                                    <td>Section 80C Deductions</td>
                                    <td class="text-danger">Not Allowed</td>
                                    <td class="text-success">Allowed (up to ₹1.5 Lakh)</td>
                                </tr>
                                <tr>
                                    <td>HRA Exemption</td>
                                    <td class="text-danger">Not Allowed</td>
                                    <td class="text-success">Allowed</td>
                                </tr>
                                <tr>
                                    <td>Section 80D – Health Insurance</td>
                                    <td class="text-danger">Not Allowed</td>
                                    <td class="text-success">Allowed (up to ₹25,000–₹50,000)</td>
                                </tr>
                                <tr>
                                    <td>Home Loan Interest (Sec 24b)</td>
                                    <td class="text-danger">Not Allowed (self-occupied)</td>
                                    <td class="text-success">Allowed (up to ₹2 Lakh)</td>
                                </tr>
                                <tr>
                                    <td>Section 87A Tax Rebate</td>
                                    <td>Up to ₹7,0,000 (Zero Tax)</td>
                                    <td>Up to ₹5,0,000 (Zero Tax)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">New Tax Regime – Slab Rates (FY 2023-24)</h2>
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered text-secondary">
                            <thead class="table-light text-body">
                                <tr>
                                    <th>Annual Income Slab</th>
                                    <th>Tax Rate</th>
                                    <th>Tax on Full Slab Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Up to ₹3,00,000</td><td>0%</td><td>Nil</td></tr>
                                <tr><td>₹3,00,001 – ₹6,00,000</td><td>5%</td><td>₹15,000</td></tr>
                                <tr><td>₹6,00,001 – ₹9,00,000</td><td>10%</td><td>₹30,000</td></tr>
                                <tr><td>₹9,00,001 – ₹12,00,000</td><td>15%</td><td>₹45,000</td></tr>
                                <tr><td>₹12,00,001 – ₹15,00,000</td><td>20%</td><td>₹60,000</td></tr>
                                <tr><td>Above ₹15,00,000</td><td>30%</td><td>30% on amount above ₹15 Lakh</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const taxForm = document.getElementById('india-tax-form');
    const resetBtn = document.getElementById('btn-reset-tax');

    function calculateIndiaTax(e) {
        if(e) e.preventDefault();

        // Inputs
        const ageCategory = document.getElementById('tax-age-category').value;
        const salary = parseFloat(document.getElementById('tax-salary').value) || 0;
        const houseRent = parseFloat(document.getElementById('tax-house-rent').value) || 0;
        const interest = parseFloat(document.getElementById('tax-interest').value) || 0;
        const capGains = parseFloat(document.getElementById('tax-capgains').value) || 0;
        const otherIncome = parseFloat(document.getElementById('tax-other').value) || 0;

        // Deductions (Old Regime)
        const ded80c = Math.min(parseFloat(document.getElementById('tax-80c').value) || 0, 150000);
        const ded80d = parseFloat(document.getElementById('tax-80d').value) || 0;
        const hra = parseFloat(document.getElementById('tax-hra').value) || 0;
        const interest24b = parseFloat(document.getElementById('tax-interest-24b').value) || 0;
        const ded80e = parseFloat(document.getElementById('tax-80e').value) || 0;
        const otherDeds = parseFloat(document.getElementById('tax-other-deductions').value) || 0;

        // 1. Gross Income
        const grossIncome = salary + houseRent + interest + capGains + otherIncome;

        // 2. New Regime Calculation
        const newStdDed = salary > 0 ? 50000 : 0; // standard deduction of 50k for salaried
        const newTaxable = Math.max(0, grossIncome - newStdDed);

        const newSlabs = [
            { from: 0, to: 300000, rate: 0, label: 'Up to ₹3,00,000' },
            { from: 300000, to: 600000, rate: 0.05, label: '₹3,00,001 – ₹6,00,000' },
            { from: 600000, to: 900000, rate: 0.10, label: '₹6,00,001 – ₹9,00,000' },
            { from: 900000, to: 1200000, rate: 0.15, label: '₹9,00,001 – ₹12,00,000' },
            { from: 1200000, to: 1500000, rate: 0.20, label: '₹12,00,001 – ₹15,00,000' },
            { from: 1500000, to: Infinity, rate: 0.30, label: 'Above ₹15,00,000' }
        ];

        let newTaxSubtotal = 0;
        let breakdownHTML = '';

        newSlabs.forEach(slab => {
            if (newTaxable > slab.from) {
                const taxableInSlab = Math.min(newTaxable, slab.to) - slab.from;
                const taxInSlab = taxableInSlab * slab.rate;
                newTaxSubtotal += taxInSlab;
                breakdownHTML += `
                    <tr>
                        <td>${slab.label}</td>
                        <td>${(slab.rate * 100).toFixed(0)}%</td>
                        <td class="text-end">${formatter.format(taxInSlab)}</td>
                    </tr>
                `;
            } else {
                breakdownHTML += `
                    <tr>
                        <td>${slab.label}</td>
                        <td>${(slab.rate * 100).toFixed(0)}%</td>
                        <td class="text-end">₹0</td>
                    </tr>
                `;
            }
        });

        // 87A rebate for New Regime: Income up to ₹7 Lakh (after standard deduction) has zero tax
        if (newTaxable <= 700000) {
            newTaxSubtotal = 0;
        }

        const newCess = newTaxSubtotal * 0.04;
        const newTotalTax = newTaxSubtotal + newCess;

        // 3. Old Regime Calculation
        const oldStdDed = salary > 0 ? 50000 : 0;
        const totalOldDeductions = oldStdDed + ded80c + ded80d + hra + interest24b + ded80e + otherDeds;
        const oldTaxable = Math.max(0, grossIncome - totalOldDeductions);

        // Brackets depend on age
        let oldSlabs = [];
        if (ageCategory === 'super-senior') {
            oldSlabs = [
                { from: 0, to: 500000, rate: 0 },
                { from: 500000, to: 1000000, rate: 0.20 },
                { from: 1000000, to: Infinity, rate: 0.30 }
            ];
        } else if (ageCategory === 'senior') {
            oldSlabs = [
                { from: 0, to: 300000, rate: 0 },
                { from: 300000, to: 500000, rate: 0.05 },
                { from: 500000, to: 1000000, rate: 0.20 },
                { from: 1000000, to: Infinity, rate: 0.30 }
            ];
        } else {
            oldSlabs = [
                { from: 0, to: 250000, rate: 0 },
                { from: 250000, to: 500000, rate: 0.05 },
                { from: 500000, to: 1000000, rate: 0.20 },
                { from: 1000000, to: Infinity, rate: 0.30 }
            ];
        }

        let oldTaxSubtotal = 0;
        oldSlabs.forEach(slab => {
            if (oldTaxable > slab.from) {
                const taxableInSlab = Math.min(oldTaxable, slab.to) - slab.from;
                oldTaxSubtotal += taxableInSlab * slab.rate;
            }
        });

        // 87A rebate for Old Regime: Income up to ₹5 Lakh has zero tax
        if (oldTaxable <= 500000) {
            oldTaxSubtotal = 0;
        }

        const oldCess = oldTaxSubtotal * 0.04;
        const oldTotalTax = oldTaxSubtotal + oldCess;

        // ---- UPDATE UI ----
        document.getElementById('res-tax-new').textContent = formatter.format(newTotalTax);
        document.getElementById('res-tax-old').textContent = formatter.format(oldTotalTax);
        
        document.getElementById('res-gross-income').textContent = formatter.format(grossIncome);
        document.getElementById('res-old-deductions').textContent = formatter.format(totalOldDeductions);
        document.getElementById('res-taxable-new').textContent = formatter.format(newTaxable);
        document.getElementById('res-taxable-old').textContent = formatter.format(oldTaxable);

        document.getElementById('tax-slab-breakdown-body').innerHTML = breakdownHTML;
        document.getElementById('tax-subtotal-new').textContent = formatter.format(newTaxSubtotal);
        document.getElementById('tax-cess-new').textContent = formatter.format(newCess);
        document.getElementById('tax-net-new').textContent = formatter.format(newTotalTax);

        // Recommendations
        const recBox = document.getElementById('tax-recommendation-box');
        const recTitle = document.getElementById('tax-rec-title');
        const recDesc = document.getElementById('tax-rec-desc');

        recBox.classList.remove('d-none');
        recBox.classList.remove('alert-success', 'alert-warning', 'alert-info');

        if (newTotalTax < oldTotalTax) {
            recBox.classList.add('alert-success');
            recTitle.textContent = "New Tax Regime Recommended!";
            recDesc.textContent = `You save ${formatter.format(oldTotalTax - newTotalTax)} by filing under the New Regime.`;
        } else if (oldTotalTax < newTotalTax) {
            recBox.classList.add('alert-success');
            recTitle.textContent = "Old Tax Regime Recommended!";
            recDesc.textContent = `You save ${formatter.format(newTotalTax - oldTotalTax)} by claiming deductions under the Old Regime.`;
        } else {
            recBox.classList.add('alert-info');
            recTitle.textContent = "Both Regimes yield the same tax!";
            recDesc.textContent = "The net tax payable under both schemes is exactly equal.";
        }
    }

    taxForm.addEventListener('submit', calculateIndiaTax);
    
    // Live update calculations as inputs change
    document.querySelectorAll('#india-tax-form input, #india-tax-form select').forEach(input => {
        input.addEventListener('input', () => calculateIndiaTax());
    });

    resetBtn.addEventListener('click', () => {
        document.getElementById('tax-recommendation-box').classList.add('d-none');
        setTimeout(() => calculateIndiaTax(), 50);
    });

    // Run first calculation
    calculateIndiaTax();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>

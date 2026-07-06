<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Percentage Calculator</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Calculator Inputs (Tabbed Sub-Calculators) -->
        <div class="col-lg-6">
            <div class="card calc-card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-circle bg-info-subtle text-info">
                            <i class="bi bi-percent fs-3"></i>
                        </div>
                        <div>
                            <h1 class="fw-bold h3 mb-1">Percentage Calculator</h1>
                            <p class="text-muted small mb-0">Solve portions, ratios, and growth rates</p>
                        </div>
                    </div>

                    <!-- Navigation Pills for the 3 sub-calculators -->
                    <ul class="nav nav-pills mb-4 nav-justified" id="perc-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active small py-2" id="perc-portion-tab" data-bs-toggle="pill" data-bs-target="#perc-portion" type="button" role="tab">Portion</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link small py-2" id="perc-ratio-tab" data-bs-toggle="pill" data-bs-target="#perc-ratio" type="button" role="tab">Ratio</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link small py-2" id="perc-growth-tab" data-bs-toggle="pill" data-bs-target="#perc-growth" type="button" role="tab">Growth</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="perc-tabContent">
                        <!-- Sub-Calc 1: What is X% of Y? -->
                        <div class="tab-pane fade show active" id="perc-portion" role="tabpanel">
                            <h5 class="fw-bold h6 mb-3 text-body">Calculate a Portion (What is X% of Y?)</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Percentage (X)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="portion-x" value="20" step="any">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Total Amount (Y)</label>
                                <input type="number" class="form-control" id="portion-y" value="250" step="any">
                            </div>
                        </div>

                        <!-- Sub-Calc 2: X is what % of Y? -->
                        <div class="tab-pane fade" id="perc-ratio" role="tabpanel">
                            <h5 class="fw-bold h6 mb-3 text-body">Calculate a Ratio (X is what % of Y?)</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Value (X)</label>
                                <input type="number" class="form-control" id="ratio-x" value="50" step="any">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Total Amount (Y)</label>
                                <input type="number" class="form-control" id="ratio-y" value="200" step="any">
                            </div>
                        </div>

                        <!-- Sub-Calc 3: Percentage Increase/Decrease -->
                        <div class="tab-pane fade" id="perc-growth" role="tabpanel">
                            <h5 class="fw-bold h6 mb-3 text-body">Calculate Growth Rate (From X to Y)</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Initial Value (X)</label>
                                <input type="number" class="form-control" id="growth-x" value="100" step="any">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">New Value (Y)</label>
                                <input type="number" class="form-control" id="growth-y" value="125" step="any">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calculator Results & Step-by-Step Explanation -->
        <div class="col-lg-6">
            <div class="card calc-card shadow-sm border-0 h-100">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div class="w-100">
                        <h4 class="fw-bold mb-4 text-body border-bottom pb-2">Calculation Result</h4>

                        <div class="p-4 rounded-4 bg-light text-center mb-4 border">
                            <span class="text-muted d-block small mb-1" id="res-perc-label">Result Value</span>
                            <h2 class="fw-bold text-success mb-1" id="res-perc-val">50</h2>
                            <span class="text-muted extra-small" id="res-perc-helper">Explanation will appear here.</span>
                        </div>

                        <!-- Step-by-Step Formulation -->
                        <h6 class="fw-bold mb-2">Step-by-Step Calculation Formula</h6>
                        <div class="p-3 bg-light rounded-3 text-muted small mb-4">
                            <pre class="mb-0 text-body" id="res-perc-steps">Formula details...</pre>
                        </div>

                        <!-- Visual Proportional Progress Bar -->
                        <h6 class="fw-bold mb-2" id="res-visual-title">Visual Ratio Split</h6>
                        <div class="progress" style="height: 12px; border-radius: 8px;">
                            <div class="progress-bar bg-primary" id="res-visual-bar1" role="progressbar" style="width: 20%;"></div>
                            <div class="progress-bar bg-secondary-subtle" id="res-visual-bar2" role="progressbar" style="width: 80%;"></div>
                        </div>
                        <div class="d-flex justify-content-between text-muted extra-small mt-2">
                            <span id="res-visual-lbl1">Part (20%)</span>
                            <span id="res-visual-lbl2">Remaining (80%)</span>
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is a Percentage?</h2>
                    <p class="text-muted">A percentage is a dimensionless ratio or number expressed as a fraction of 100, represented by the symbol "%". The term originates from the Latin phrase <i>per centum</i>, meaning "by the hundred."</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Core Percentage Formulas</h2>
                    <h4 class="fw-bold h5 text-body mt-4 mb-2">1. Calculating X% of Y (Finding a Portion)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">Value = (X / 100) * Y</code>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">2. Calculating What Percentage X is of Y (Finding a Ratio)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">Percentage (%) = (X / Y) * 100</code>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">3. Percentage Increase or Decrease (Finding Growth/Decline)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">Percentage Change (%) = ((Y - X) / X) * 100</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Portions input
    const pxInput = document.getElementById('portion-x');
    const pyInput = document.getElementById('portion-y');

    // Ratios inputs
    const rxInput = document.getElementById('ratio-x');
    const ryInput = document.getElementById('ratio-y');

    // Growth inputs
    const gxInput = document.getElementById('growth-x');
    const gyInput = document.getElementById('growth-y');

    // Tabs
    const portionTabBtn = document.getElementById('perc-portion-tab');
    const ratioTabBtn = document.getElementById('perc-ratio-tab');
    const growthTabBtn = document.getElementById('perc-growth-tab');

    // Display targets
    const resLabel = document.getElementById('res-perc-label');
    const resVal = document.getElementById('res-perc-val');
    const resHelper = document.getElementById('res-perc-helper');
    const resSteps = document.getElementById('res-perc-steps');

    const resVisualTitle = document.getElementById('res-visual-title');
    const resVisualBar1 = document.getElementById('res-visual-bar1');
    const resVisualBar2 = document.getElementById('res-visual-bar2');
    const resVisualLbl1 = document.getElementById('res-visual-lbl1');
    const resVisualLbl2 = document.getElementById('res-visual-lbl2');

    let activeTab = 'portion';

    portionTabBtn.addEventListener('click', () => { activeTab = 'portion'; calculatePercentage(); });
    ratioTabBtn.addEventListener('click', () => { activeTab = 'ratio'; calculatePercentage(); });
    growthTabBtn.addEventListener('click', () => { activeTab = 'growth'; calculatePercentage(); });

    function calculatePercentage() {
        if (activeTab === 'portion') {
            const x = parseFloat(pxInput.value) || 0;
            const y = parseFloat(pyInput.value) || 0;

            const result = (x / 100) * y;
            resLabel.textContent = `What is ${x}% of ${y}?`;
            resVal.textContent = result.toFixed(2).replace(/\.00$/, '');
            resHelper.textContent = `${x}% of ${y} is ${resVal.textContent}.`;
            resSteps.textContent = `Formula: (X / 100) * Y\n= (${x} / 100) * ${y}\n= ${x / 100} * ${y}\n= ${resVal.textContent}`;

            resVisualTitle.textContent = "Percentage Split";
            let p1 = Math.max(0, Math.min(100, x));
            resVisualBar1.style.width = `${p1}%`;
            resVisualBar2.style.width = `${100 - p1}%`;
            resVisualLbl1.textContent = `${p1.toFixed(1).replace(/\.0$/, '')}% Port`;
            resVisualLbl2.textContent = `${(100 - p1).toFixed(1).replace(/\.0$/, '')}% Rem`;
            
        } else if (activeTab === 'ratio') {
            const x = parseFloat(rxInput.value) || 0;
            const y = parseFloat(ryInput.value) || 0;

            if (y === 0) {
                resVal.textContent = "Error";
                resHelper.textContent = "Denominator (Y) cannot be 0.";
                resSteps.textContent = "Cannot divide by 0.";
                return;
            }

            const result = (x / y) * 100;
            resLabel.textContent = `${x} is what % of ${y}?`;
            resVal.textContent = `${result.toFixed(2).replace(/\.00$/, '')}%`;
            resHelper.textContent = `${x} represents ${resVal.textContent} of ${y}.`;
            resSteps.textContent = `Formula: (X / Y) * 100\n= (${x} / ${y}) * 100\n= ${x / y} * 100\n= ${resVal.textContent}`;

            resVisualTitle.textContent = "Proportion Analysis";
            let p1 = Math.max(0, Math.min(100, result));
            resVisualBar1.style.width = `${p1}%`;
            resVisualBar2.style.width = `${100 - p1}%`;
            resVisualLbl1.textContent = `Part (${p1.toFixed(1).replace(/\.0$/, '')}%)`;
            resVisualLbl2.textContent = `Rem (${(100 - p1).toFixed(1).replace(/\.0$/, '')}%)`;

        } else if (activeTab === 'growth') {
            const x = parseFloat(gxInput.value) || 0;
            const y = parseFloat(gyInput.value) || 0;

            if (x === 0) {
                resVal.textContent = "Error";
                resHelper.textContent = "Initial Value (X) cannot be 0.";
                resSteps.textContent = "Cannot calculate growth from a base of 0.";
                return;
            }

            const change = y - x;
            const result = (change / x) * 100;
            resLabel.textContent = `Growth Rate from ${x} to ${y}`;

            const dir = result >= 0 ? "Increase" : "Decrease";
            resVal.textContent = `${Math.abs(result).toFixed(2).replace(/\.00$/, '')}% ${dir}`;
            resHelper.textContent = `The value has ${result >= 0 ? 'increased' : 'decreased'} by ${Math.abs(result).toFixed(2).replace(/\.00$/, '')}%.`;
            resSteps.textContent = `Formula: ((Y - X) / X) * 100\n= ((${y} - ${x}) / ${x}) * 100\n= (${change} / ${x}) * 100\n= ${resVal.textContent}`;

            resVisualTitle.textContent = "Value Comparison";
            let total = x + y;
            let p1 = total > 0 ? (x / total) * 100 : 50;
            resVisualBar1.style.width = `${p1}%`;
            resVisualBar2.style.width = `${100 - p1}%`;
            resVisualLbl1.textContent = `Initial (${x})`;
            resVisualLbl2.textContent = `New (${y})`;
        }
    }

    // Connect inputs
    [pxInput, pyInput, rxInput, ryInput, gxInput, gyInput].forEach(input => {
        input.addEventListener('input', calculatePercentage);
    });

    // Run first calculation
    calculatePercentage();
});
</script>
<?php require APPROOT . '/views/layouts/header.php'; ?>

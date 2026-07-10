<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">BMI Calculator</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">BMI Calculator</h1>
            
        </div>
    </div>

    <!-- ===================== UNIT CONVERTER WIDGET ===================== -->
    <div class="literal-calc-wrapper mx-0 mb-4 d-flex flex-column" style="max-width: 100%;">
        <div class="literal-calc-header">
            <button class="btn btn-link text-decoration-none text-white fw-bold d-flex align-items-center gap-2 p-0 w-100 justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#unitConverterCollapse">
                <span class="d-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Unit Converter (Convert Height/Weight Units)</span>
                </span>
                <i class="bi bi-chevron-down small"></i>
            </button>
            <div class="literal-calc-controls d-none d-md-flex">
                <span class="literal-calc-icon">_</span>
                <span class="literal-calc-icon">Ã—</span>
            </div>
        </div>
        <div class="collapse" id="unitConverterCollapse">
            <div class="literal-calc-body p-4" style="border-radius: 0 0 4px 4px;">
                <p class="text-muted small">Use this converter to convert to the units accepted by the calculator.</p>
                
                <!-- Converter Tabs -->
                <ul class="nav nav-tabs mb-3 border-bottom-0" id="converterTabs" role="tablist">
                    <li class="nav-item"><button class="nav-link active py-2  border-0 fw-bold rounded-top bg-white" id="conv-length-tab" data-bs-toggle="tab" data-bs-target="#conv-length" type="button" role="tab" style="margin-right: 4px;">Length</button></li>
                    <li class="nav-item"><button class="nav-link py-2  border-0 fw-bold rounded-top bg-light" id="conv-weight-tab" data-bs-toggle="tab" data-bs-target="#conv-weight" type="button" role="tab" style="margin-right: 4px;">Weight</button></li>
                    <li class="nav-item"><button class="nav-link py-2  border-0 fw-bold rounded-top bg-light" id="conv-temp-tab" data-bs-toggle="tab" data-bs-target="#conv-temp" type="button" role="tab" style="margin-right: 4px;">Temperature</button></li>
                    <li class="nav-item"><button class="nav-link py-2  border-0 fw-bold rounded-top bg-light" id="conv-area-tab" data-bs-toggle="tab" data-bs-target="#conv-area" type="button" role="tab" style="margin-right: 4px;">Area</button></li>
                    <li class="nav-item"><button class="nav-link py-2  border-0 fw-bold rounded-top bg-light" id="conv-volume-tab" data-bs-toggle="tab" data-bs-target="#conv-volume" type="button" role="tab">Volume</button></li>
                </ul>

                <div class="row g-3 align-items-end bg-white p-3 border rounded shadow-sm">
                    <div class="col-md-3">
                        <label class="form-label fw-bold small ">From Value</label>
                        <input type="number" class="form-control" id="conv-from-val" value="180">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold small ">From Unit</label>
                        <select class="form-select" id="conv-from-unit"></select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold small ">To Unit</label>
                        <select class="form-select" id="conv-to-unit"></select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold small ">To Converted Value</label>
                        <div class="input-group">
                            <input type="text" class="form-control bg-light" id="conv-to-val" readonly>
                            <button class="btn text-white fw-bold" style="background-color: #005A9E;" id="btn-apply-conv" type="button" title="Apply to BMI Calculator">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== BMI CALCULATOR GRID ===================== -->
    <div class="row g-4 mb-4">
        <!-- Input Form Card -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">BMI Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">Ã—</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <!-- Tabs: US Units / Metric Units / Other Units -->
                    <ul class="nav nav-pills mb-3 nav-justified bg-white p-1 rounded shadow-sm border" id="bmiSystemTab" role="tablist">
                        <li class="nav-item"><button class="nav-link active small py-2 fw-bold " id="tab-us" data-bs-toggle="pill" data-bs-target="#pane-us" type="button" role="tab">US Units</button></li>
                        <li class="nav-item"><button class="nav-link small py-2 fw-bold " id="tab-metric" data-bs-toggle="pill" data-bs-target="#pane-metric" type="button" role="tab">Metric Units</button></li>
                        <li class="nav-item"><button class="nav-link small py-2 fw-bold " id="tab-other" data-bs-toggle="pill" data-bs-target="#pane-other" type="button" role="tab">Other Units</button></li>
                    </ul>

                    <form id="bmi-calc-form">
                        <div class="tab-content mb-3" id="bmiTabContent">
                            <!-- US Units Pane -->
                            <div class="tab-pane fade show active" id="pane-us" role="tabpanel">
                                <div class="row g-2 mb-2">
                                    <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Height</label>
                                    <div class="col-6">
                                        <div class="input-group input-group-sm">
                                            <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-us-ft" value="5" min="1">
                                            <span class="input-group-text bg-light border-secondary-subtle">ft</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group input-group-sm">
                                            <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-us-in" value="10" min="0" max="11">
                                            <span class="input-group-text bg-light border-secondary-subtle">in</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-us-lbs" value="160" min="1">
                                        <span class="input-group-text bg-light border-secondary-subtle">lbs</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Metric Units Pane -->
                            <div class="tab-pane fade" id="pane-metric" role="tabpanel">
                                <div class="mb-2">
                                    <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Height</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-metric-cm" value="180" min="50">
                                        <span class="input-group-text bg-light border-secondary-subtle">cm</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-metric-kg" value="65" min="1">
                                        <span class="input-group-text bg-light border-secondary-subtle">kg</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Other Units Pane -->
                            <div class="tab-pane fade" id="pane-other" role="tabpanel">
                                <div class="mb-2">
                                    <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Height</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-other-m" value="1.8" step="0.01" min="0.5">
                                        <span class="input-group-text bg-light border-secondary-subtle">m</span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control border-secondary-subtle fw-medium" id="bmi-other-g" value="65000" min="1000">
                                        <span class="input-group-text bg-light border-secondary-subtle">g</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shared Context Fields -->
                        <div class="row g-2 mb-0">
                            <div class="col-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Age</label>
                                <input type="number" class="form-control form-control-sm border-secondary-subtle fw-medium" id="bmi-shared-age" value="25" min="2" max="120">
                            </div>
                            <div class="col-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Gender</label>
                                <div class="d-flex gap-2 align-items-center mt-1">
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="bmi-gender" id="gender-male" value="male" checked>
                                        <label class="form-check-label " style="font-size: 0.85rem;" for="gender-male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="bmi-gender" id="gender-female" value="female">
                                        <label class="form-check-label " style="font-size: 0.85rem;" for="gender-female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Visual Gauge & Summary Card -->
        <div class="col-lg-7">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Results Summary</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">Ã—</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <div class="w-100 text-center p-3 border-secondary-subtle rounded d-flex flex-column justify-content-center" style="border: 1px solid #ccc; background: #fdfdfd; height: 100%;">

                        <!-- Interactive SVG Gauge Chart -->
                        <div class="d-flex justify-content-center mb-2">
                            <svg style="width: 100%; max-width: 320px; height: auto;" viewBox="0 0 240 130">
                                <!-- Colors arcs for BMI Zones -->
                                <!-- Underweight (15 to 18.5) -->
                                <path d="M 20 120 A 100 100 0 0 1 29.5 77.4" fill="none" stroke="#f59e0b" stroke-width="20" />
                                <!-- Normal (18.5 to 25) -->
                                <path d="M 29.5 77.4 A 100 100 0 0 1 89.1 24.9" fill="none" stroke="#10b981" stroke-width="20" />
                                <!-- Overweight (25 to 30) -->
                                <path d="M 89.1 24.9 A 100 100 0 0 1 150.9 24.9" fill="none" stroke="#f59e0b" stroke-width="20" />
                                <!-- Obese (30 to 40) -->
                                <path d="M 150.9 24.9 A 100 100 0 0 1 220 120" fill="none" stroke="#ef4444" stroke-width="20" />
                                
                                <!-- Label Texts on Gauge -->
                                <text x="14" y="115" font-size="7" font-weight="bold" fill="#64748b" text-anchor="middle">15</text>
                                <text x="22" y="70" font-size="7" font-weight="bold" fill="#64748b" text-anchor="middle">18.5</text>
                                <text x="86" y="17" font-size="7" font-weight="bold" fill="#64748b" text-anchor="middle">25</text>
                                <text x="156" y="17" font-size="7" font-weight="bold" fill="#64748b" text-anchor="middle">30</text>
                                <text x="226" y="115" font-size="7" font-weight="bold" fill="#64748b" text-anchor="middle">40</text>

                                <text x="50" y="90" font-size="8" font-weight="bold" fill="#fff" text-anchor="middle">Normal</text>
                                <text x="180" y="90" font-size="8" font-weight="bold" fill="#fff" text-anchor="middle">Obese</text>

                                <!-- Needle -->
                                <g id="bmi-gauge-needle" style="transform: rotate(-90deg); transform-origin: 120px 120px; transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);">
                                    <polygon points="118,120 120,30 122,120" fill="#1e293b" />
                                    <circle cx="120" cy="120" r="7" fill="#0f172a" />
                                </g>

                                <!-- Display Score inside -->
                                <text x="120" y="115" text-anchor="middle" font-weight="bold" font-size="12" fill="#0f172a" id="res-score-text">BMI = 20.1</text>
                            </svg>
                        </div>

                        <!-- Bullet Point Details -->
                        <div class="text-start bg-light p-4 rounded border">
                            <h5 class="fw-bold mb-3 " id="res-header-msg">BMI = 20.1 kg/mÂ² (<span class="text-success">Normal</span>)</h5>
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small text-muted">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong class="">Healthy BMI range:</strong> 18.5 kg/mÂ² - 25 kg/mÂ²</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong class="">Healthy weight for the height:</strong> <span id="bullet-healthy-weight">59.9 kg - 81 kg</span></li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong class="">BMI Prime:</strong> <span id="bullet-bmi-prime">0.8</span></li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong class="">Ponderal Index:</strong> <span id="bullet-ponderal-index">11.1 kg/mÂ³</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Weight classification grid -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3 text-body">WHO Weight Classifications Table</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 text-muted">
                            <thead class="table-light text-body">
                                <tr>
                                    <th>BMI Range (kg/mÂ²)</th>
                                    <th>Classification</th>
                                    <th>Obesity Sub-Class</th>
                                    <th>Health Risk Profile</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Below 18.5</td>
                                    <td class="text-info fw-bold">Underweight</td>
                                    <td>N/A</td>
                                    <td>Nutritional deficiencies, compromised immunity.</td>
                                </tr>
                                <tr>
                                    <td>18.5 â€“ 24.9</td>
                                    <td class="text-success fw-bold">Normal Weight</td>
                                    <td>N/A</td>
                                    <td>Lowest overall health risk for metabolic conditions.</td>
                                </tr>
                                <tr>
                                    <td>25.0 â€“ 29.9</td>
                                    <td class="text-warning fw-bold">Overweight</td>
                                    <td>Pre-obese</td>
                                    <td>Moderate risk of insulin resistance.</td>
                                </tr>
                                <tr>
                                    <td>30.0 and Above</td>
                                    <td class="text-danger fw-bold">Obese</td>
                                    <td>Class I, II, III</td>
                                    <td>High risk of Type 2 diabetes, coronary issues.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== EDUCATIONAL CONTENT ===================== -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="card shadow-none border rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Body Mass Index (BMI)?</h2>
                    <p class="text-muted">Body Mass Index (BMI) is a heuristic proxy for human body fatness based on an individual's weight and height. It is defined as the body mass divided by the square of the body height, and is universally expressed in units of kg/mÂ².</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // -------------------------------------------------------------
    // UNIT CONVERTER CONFIG
    // -------------------------------------------------------------
    const convFromVal = document.getElementById('conv-from-val');
    const convFromUnit = document.getElementById('conv-from-unit');
    const convToUnit = document.getElementById('conv-to-unit');
    const convToVal = document.getElementById('conv-to-val');
    const applyConvBtn = document.getElementById('btn-apply-conv');

    const conversionData = {
        length: {
            units: ['Meter (m)', 'Kilometer (km)', 'Centimeter (cm)', 'Millimeter (mm)', 'Mile (mi)', 'Yard (yd)', 'Foot (ft)', 'Inch (in)'],
            factors: {
                'Meter (m)': 1,
                'Kilometer (km)': 1000,
                'Centimeter (cm)': 0.01,
                'Millimeter (mm)': 0.001,
                'Mile (mi)': 1609.344,
                'Yard (yd)': 0.9144,
                'Foot (ft)': 0.3048,
                'Inch (in)': 0.0254
            }
        },
        weight: {
            units: ['Kilogram (kg)', 'Gram (g)', 'Pound (lb)', 'Ounce (oz)', 'Stone (st)'],
            factors: {
                'Kilogram (kg)': 1,
                'Gram (g)': 0.001,
                'Pound (lb)': 0.45359237,
                'Ounce (oz)': 0.028349523,
                'Stone (st)': 6.35029318
            }
        },
        temp: {
            units: ['Celsius (Â°C)', 'Fahrenheit (Â°F)', 'Kelvin (K)']
        },
        area: {
            units: ['Square Meter (mÂ²)', 'Square Kilometer (kmÂ²)', 'Square Mile (miÂ²)', 'Acre', 'Hectare'],
            factors: {
                'Square Meter (mÂ²)': 1,
                'Square Kilometer (kmÂ²)': 1000000,
                'Square Mile (miÂ²)': 2589988.11,
                'Acre': 4046.85642,
                'Hectare': 10000
            }
        },
        volume: {
            units: ['Liter (L)', 'Milliliter (mL)', 'Gallon (gal)', 'Quart (qt)', 'Cup'],
            factors: {
                'Liter (L)': 1,
                'Milliliter (mL)': 0.001,
                'Gallon (gal)': 3.78541,
                'Quart (qt)': 0.946353,
                'Cup': 0.236588
            }
        }
    };

    let activeConvTab = 'length';

    function initConverterOptions(tab) {
        activeConvTab = tab;
        const list = conversionData[tab].units;
        convFromUnit.innerHTML = '';
        convToUnit.innerHTML = '';
        list.forEach((unit, idx) => {
            const opt1 = document.createElement('option');
            opt1.value = unit;
            opt1.textContent = unit;
            const opt2 = document.createElement('option');
            opt2.value = unit;
            opt2.textContent = unit;
            if (idx === 1) opt2.selected = true; // default second unit selected
            convFromUnit.appendChild(opt1);
            convToUnit.appendChild(opt2);
        });
        runConversion();
    }

    function runConversion() {
        const val = parseFloat(convFromVal.value) || 0;
        const fromU = convFromUnit.value;
        const toU = convToUnit.value;

        if (activeConvTab === 'temp') {
            let celsiusVal = 0;
            if (fromU.includes('Celsius')) celsiusVal = val;
            else if (fromU.includes('Fahrenheit')) celsiusVal = (val - 32) * 5/9;
            else celsiusVal = val - 273.15;

            let result = 0;
            if (toU.includes('Celsius')) result = celsiusVal;
            else if (toU.includes('Fahrenheit')) result = (celsiusVal * 9/5) + 32;
            else result = celsiusVal + 273.15;

            convToVal.value = result.toFixed(2).replace(/\.00$/, '');
        } else {
            const data = conversionData[activeConvTab];
            if (!data.factors[fromU] || !data.factors[toU]) return;
            const baseVal = val * data.factors[fromU]; // convert to standard base
            const result = baseVal / data.factors[toU];
            convToVal.value = result.toFixed(4).replace(/\.?0+$/, '');
        }
    }

    // Bind tabs click to init converter options
    document.getElementById('conv-length-tab').addEventListener('click', () => initConverterOptions('length'));
    document.getElementById('conv-weight-tab').addEventListener('click', () => initConverterOptions('weight'));
    document.getElementById('conv-temp-tab').addEventListener('click', () => initConverterOptions('temp'));
    document.getElementById('conv-area-tab').addEventListener('click', () => initConverterOptions('area'));
    document.getElementById('conv-volume-tab').addEventListener('click', () => initConverterOptions('volume'));

    convFromVal.addEventListener('input', runConversion);
    convFromUnit.addEventListener('change', runConversion);
    convToUnit.addEventListener('change', runConversion);

    // Run length by default
    initConverterOptions('length');

    // Apply converter value directly to inputs
    applyConvBtn.addEventListener('click', () => {
        const converted = parseFloat(convToVal.value);
        if (isNaN(converted)) return;
        
        if (activeConvTab === 'length') {
            // Apply to active height input
            if (currentSystem === 'metric') {
                document.getElementById('bmi-metric-cm').value = Math.round(converted * (convToUnit.value.includes('Centimeter') ? 1 : 100));
            } else if (currentSystem === 'us') {
                let totalInches = converted;
                if (convToUnit.value.includes('Meter')) totalInches = converted * 39.3701;
                else if (convToUnit.value.includes('Centimeter')) totalInches = converted * 0.393701;
                else if (convToUnit.value.includes('Foot')) totalInches = converted * 12;
                
                document.getElementById('bmi-us-ft').value = Math.floor(totalInches / 12);
                document.getElementById('bmi-us-in').value = Math.round(totalInches % 12);
            } else {
                document.getElementById('bmi-other-m').value = (converted / (convToUnit.value.includes('Centimeter') ? 100 : 1)).toFixed(2);
            }
        } else if (activeConvTab === 'weight') {
            // Apply to active weight input
            if (currentSystem === 'metric') {
                document.getElementById('bmi-metric-kg').value = Math.round(converted * (convToUnit.value.includes('Gram') ? 0.001 : 1));
            } else if (currentSystem === 'us') {
                document.getElementById('bmi-us-lbs').value = Math.round(converted * (convToUnit.value.includes('Kilogram') ? 2.20462 : 1));
            } else {
                document.getElementById('bmi-other-g').value = Math.round(converted * (convToUnit.value.includes('Kilogram') ? 1000 : 1));
            }
        }
        calculateBMI();
    });

    // -------------------------------------------------------------
    // BMI CALCULATION ENGINE
    // -------------------------------------------------------------
    const ftInput = document.getElementById('bmi-us-ft');
    const inInput = document.getElementById('bmi-us-in');
    const lbsInput = document.getElementById('bmi-us-lbs');

    const cmInput = document.getElementById('bmi-metric-cm');
    const kgInput = document.getElementById('bmi-metric-kg');

    const mInput = document.getElementById('bmi-other-m');
    const gInput = document.getElementById('bmi-other-g');

    const ageInput = document.getElementById('bmi-shared-age');
    const genderRadios = document.getElementsByName('bmi-gender');

    const needle = document.getElementById('bmi-gauge-needle');
    const scoreText = document.getElementById('res-score-text');
    const headerMsg = document.getElementById('res-header-msg');
    
    const bulletHealthyWeight = document.getElementById('bullet-healthy-weight');
    const bulletBmiPrime = document.getElementById('bullet-bmi-prime');
    const bulletPonderalIndex = document.getElementById('bullet-ponderal-index');

    let currentSystem = 'us';

    document.getElementById('tab-us').addEventListener('click', () => { currentSystem = 'us'; calculateBMI(); });
    document.getElementById('tab-metric').addEventListener('click', () => { currentSystem = 'metric'; calculateBMI(); });
    document.getElementById('tab-other').addEventListener('click', () => { currentSystem = 'other'; calculateBMI(); });

    function calculateBMI() {
        let weightKg = 0;
        let heightM = 0;

        if (currentSystem === 'us') {
            const ft = parseFloat(ftInput.value) || 0;
            const inches = parseFloat(inInput.value) || 0;
            const lbs = parseFloat(lbsInput.value) || 0;
            const totalInches = (ft * 12) + inches;
            
            if (totalInches > 0 && lbs > 0) {
                heightM = totalInches * 0.0254;
                weightKg = lbs * 0.45359237;
            }
        } else if (currentSystem === 'metric') {
            const cm = parseFloat(cmInput.value) || 0;
            const kg = parseFloat(kgInput.value) || 0;
            if (cm > 0 && kg > 0) {
                heightM = cm / 100;
                weightKg = kg;
            }
        } else {
            const m = parseFloat(mInput.value) || 0;
            const g = parseFloat(gInput.value) || 0;
            if (m > 0 && g > 0) {
                heightM = m;
                weightKg = g / 1000;
            }
        }

        if (heightM > 0 && weightKg > 0) {
            const bmi = weightKg / (heightM * heightM);
            const bmiPrime = bmi / 25;
            const ponderalIndex = weightKg / (heightM * heightM * heightM);

            // Healthy limits
            const minHealthyKg = 18.5 * (heightM * heightM);
            const maxHealthyKg = 25 * (heightM * heightM);

            let minHealthyStr = `${minHealthyKg.toFixed(1)} kg`;
            let maxHealthyStr = `${maxHealthyKg.toFixed(1)} kg`;
            
            if (currentSystem === 'us') {
                minHealthyStr = `${(minHealthyKg * 2.20462).toFixed(1)} lbs`;
                maxHealthyStr = `${(maxHealthyKg * 2.20462).toFixed(1)} lbs`;
            }

            // Update result cards
            scoreText.textContent = `BMI = ${bmi.toFixed(1)}`;
            
            let status = 'Normal';
            let colorClass = 'text-success';
            if (bmi < 18.5) {
                status = 'Underweight';
                colorClass = 'text-info';
            } else if (bmi < 25) {
                status = 'Normal';
                colorClass = 'text-success';
            } else if (bmi < 30) {
                status = 'Overweight';
                colorClass = 'text-warning';
            } else {
                status = 'Obese';
                colorClass = 'text-danger';
            }

            headerMsg.innerHTML = `BMI = ${bmi.toFixed(1)} kg/mÂ² (<span class="${colorClass}">${status}</span>)`;

            bulletHealthyWeight.textContent = `${minHealthyStr} - ${maxHealthyStr}`;
            bulletBmiPrime.textContent = bmiPrime.toFixed(2);
            bulletPonderalIndex.textContent = `${ponderalIndex.toFixed(1)} kg/mÂ³`;

            // Needle angle (-90 deg to +90 deg based on BMI 15 to 40)
            let angle = -90 + ((bmi - 15) / (40 - 15)) * 180;
            angle = Math.max(-90, Math.min(90, angle)); // clamp
            needle.style.transform = `rotate(${angle}deg)`;
        }
    }

    // Connect listeners
    [ftInput, inInput, lbsInput, cmInput, kgInput, mInput, gInput, ageInput].forEach(inp => {
        inp.addEventListener('input', calculateBMI);
    });
    document.getElementsByName('bmi-gender').forEach(r => r.addEventListener('change', calculateBMI));

    // Initial calculation
    calculateBMI();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>

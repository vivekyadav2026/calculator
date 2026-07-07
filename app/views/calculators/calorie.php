<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Calorie Calculator</li>
        </ol>
    </nav>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Calorie Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="calorie-calculator-form">
                        <div class="row g-2">
                            <!-- Age -->
                            <div class="col-md-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Age (years)</label>
                                <input type="number" class="form-control form-control-sm border-secondary-subtle fw-medium" id="cal-age-custom" value="25" min="1" max="120" required>
                            </div>
                            <!-- Gender -->
                            <div class="col-md-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Gender</label>
                                <select class="form-select form-select-sm border-secondary-subtle fw-medium" id="cal-gender-custom">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <!-- Height -->
                            <div class="col-md-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Height (cm)</label>
                                <input type="number" class="form-control form-control-sm border-secondary-subtle fw-medium" id="cal-height-custom" value="175" min="50" max="250" required>
                            </div>
                            <!-- Weight -->
                            <div class="col-md-6">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight (kg)</label>
                                <input type="number" class="form-control form-control-sm border-secondary-subtle fw-medium" id="cal-weight-custom" value="70" min="10" max="300" required>
                            </div>
                            <!-- Activity Level -->
                            <div class="col-12">
                                <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Activity Level</label>
                                <select class="form-select form-select-sm border-secondary-subtle fw-medium" id="cal-activity-custom">
                                    <option value="1.2" selected>Sedentary: little or no exercise</option>
                                    <option value="1.375">Light: exercise 1-3 times/week</option>
                                    <option value="1.55">Moderate: exercise 4-5 times/week</option>
                                    <option value="1.725">Active: intense exercise 3-4 times/week</option>
                                    <option value="1.9">Very Active: daily heavy job/sports</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results & Graphs -->
        <div class="col-lg-7">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Daily Calorie Recommendations</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight Maintenance</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-cal-maintain">0 kcal</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight Loss (0.5 kg/wk)</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-warning-emphasis fs-5 text-end" id="res-cal-loss">0 kcal</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Extreme Loss (1 kg/wk)</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-danger fs-5 text-end" id="res-cal-extreme">0 kcal</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Weight Gain (0.5 kg/wk)</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-primary fs-5 text-end" id="res-cal-gain">0 kcal</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Macro Split Chart -->
                    <div class="row g-2 mt-2">
                        <div class="col-md-6 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd; border-right: none;">
                            <h6 class="fw-bold mb-2 " style="font-size: 0.8rem;">Macro Split (Maintenance)</h6>
                            <div class="list-group list-group-flush border rounded" style="font-size: 0.8rem;">
                                <div class="list-group-item d-flex justify-content-between border-0 border-bottom border-light py-1">
                                    <span class="text-muted">Carbs (40%)</span>
                                    <span class="fw-semibold " id="res-macro-carbs">0g</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between border-0 border-bottom border-light py-1">
                                    <span class="text-muted">Proteins (30%)</span>
                                    <span class="fw-semibold " id="res-macro-protein">0g</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between border-0 py-1">
                                    <span class="text-muted">Fats (30%)</span>
                                    <span class="fw-semibold " id="res-macro-fats">0g</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd;">
                            <div style="height: 120px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="caloriePieChartCustom"></canvas>
                            </div>
                        </div>
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">Understanding Calories and Energy Expenditure</h2>
                    <p class="text-muted">Your daily calorie requirement is the amount of energy your body needs to maintain basic metabolic functions (like breathing, blood circulation, and cell regeneration) plus the energy required for physical activities. This total is known as Total Daily Energy Expenditure (TDEE).</p>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">Mifflin-St Jeor Equation</h3>
                    <p class="text-muted">This calculator utilizes the widely accepted Mifflin-St Jeor formula to determine your Basal Metabolic Rate (BMR):</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">Male: BMR = (10 x weight in kg) + (6.25 x height in cm) - (5 x age in years) + 5</code><br>
                        <code class="fw-bold text-primary mt-2 d-inline-block">Female: BMR = (10 x weight in kg) + (6.25 x height in cm) - (5 x age in years) - 161</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const ageInput = document.getElementById('cal-age-custom');
    const genderSelect = document.getElementById('cal-gender-custom');
    const heightInput = document.getElementById('cal-height-custom');
    const weightInput = document.getElementById('cal-weight-custom');
    const activitySelect = document.getElementById('cal-activity-custom');

    let pieChart = null;

    function calculateCalories() {
        const age = parseFloat(ageInput.value) || 0;
        const gender = genderSelect.value;
        const height = parseFloat(heightInput.value) || 0;
        const weight = parseFloat(weightInput.value) || 0;
        const activity = parseFloat(activitySelect.value) || 1.2;

        if (age <= 0 || height <= 0 || weight <= 0) return;

        // BMR Mifflin-St Jeor
        let bmr = (10 * weight) + (6.25 * height) - (5 * age);
        if (gender === 'male') {
            bmr += 5;
        } else {
            bmr -= 161;
        }

        const maintenance = bmr * activity;
        const loss = maintenance - 500;
        const extremeLoss = maintenance - 1000;
        const gain = maintenance + 500;

        // Update UI
        document.getElementById('res-cal-maintain').textContent = `${Math.round(maintenance)} kcal`;
        document.getElementById('res-cal-loss').textContent = `${Math.round(Math.max(1200, loss))} kcal`;
        document.getElementById('res-cal-extreme').textContent = `${Math.round(Math.max(1000, extremeLoss))} kcal`;
        document.getElementById('res-cal-gain').textContent = `${Math.round(gain)} kcal`;

        // Macros (40/30/30 split)
        const carbCals = maintenance * 0.40;
        const proteinCals = maintenance * 0.30;
        const fatCals = maintenance * 0.30;

        const carbGrams = carbCals / 4;
        const proteinGrams = proteinCals / 4;
        const fatGrams = fatCals / 9;

        document.getElementById('res-macro-carbs').textContent = `${Math.round(carbGrams)}g`;
        document.getElementById('res-macro-protein').textContent = `${Math.round(proteinGrams)}g`;
        document.getElementById('res-macro-fats').textContent = `${Math.round(fatGrams)}g`;

        updateChart(carbGrams, proteinGrams, fatGrams);
    }

    function updateChart(carbs, protein, fats) {
        const pieCtx = document.getElementById('caloriePieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Carbs', 'Proteins', 'Fats'],
                datasets: [{
                    data: [carbs, protein, fats],
                    backgroundColor: ['#f59e0b', '#3b82f6', '#ef4444'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11 } }
                    }
                }
            }
        });
    }

    // Connect listeners
    ageInput.addEventListener('input', calculateCalories);
    genderSelect.addEventListener('change', calculateCalories);
    heightInput.addEventListener('input', calculateCalories);
    weightInput.addEventListener('input', calculateCalories);
    activitySelect.addEventListener('change', calculateCalories);

    // Initial run
    calculateCalories();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>

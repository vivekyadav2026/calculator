<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Love Calculator</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">Love Calculator</h1>
        </div>
    </div>
    <div class="row g-4 justify-content-center mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Love Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">&times;</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <div class="text-center mb-3">
                        <p class="text-muted mb-0" style="font-size: 0.85rem;">Enter names to calculate relationship compatibility</p>
                    </div>

                    <form id="love-calculator-form">
                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Your Name</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light border-secondary-subtle"><i class="bi bi-person-fill text-muted"></i></span>
                                <input type="text" class="form-control border-secondary-subtle fw-medium" id="love-name1-custom" placeholder="Your Name" value="Jack" required>
                            </div>
                        </div>

                        <div class="text-danger my-2 text-center"><i class="bi bi-heartbreak-fill fs-5"></i></div>

                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Partner's Name</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light border-secondary-subtle"><i class="bi bi-people-fill text-muted"></i></span>
                                <input type="text" class="form-control border-secondary-subtle fw-medium" id="love-name2-custom" placeholder="Partner's Name" value="Rose" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger btn-sm w-100 fw-bold py-2 mt-2">
                            <i class="bi bi-suit-heart-fill me-1"></i> Match Compatibility
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results -->
        <div class="col-lg-6">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Match Analysis</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">&times;</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <div class="w-100 text-center p-3 border-secondary-subtle rounded d-flex flex-column justify-content-center" style="border: 1px solid #ccc; background: #fdfdfd; height: 100%;">

                        <!-- Pulsing heart score -->
                        <div class="p-3 rounded border mb-3 position-relative overflow-hidden" style="background-color: #ffe5e5; border-color: #dc3545 !important;">
                            <span class="text-danger d-block small mb-1 fw-bold text-uppercase" style="font-size: 0.75rem;">COMPATIBILITY SCORE</span>
                            <h2 class="fw-bold text-danger mb-1" id="res-love-score">0%</h2>
                            <p class="fw-bold  mb-0" style="font-size: 0.85rem;" id="res-love-msg">Enter names to begin</p>
                        </div>

                        <!-- Mini Stats Grid -->
                        <h6 class="fw-bold text-start mb-2 " style="font-size: 0.8rem;">Relationship Dimensions</h6>
                        <div class="row g-2 text-start small text-muted">
                            <div class="col-6">
                                <div class="p-2 border rounded bg-light d-flex justify-content-between align-items-center">
                                    <span class="fw-bold" style="font-size: 0.75rem;">Passion:</span>
                                    <strong class="text-danger" id="stat-passion">0%</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 border rounded bg-light d-flex justify-content-between">
                                    <span class="fw-bold">Trust:</span>
                                    <strong class="text-primary" id="stat-trust">0%</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 border rounded bg-light d-flex justify-content-between">
                                    <span class="fw-bold">Intimacy:</span>
                                    <strong class="text-success" id="stat-intimacy">0%</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2 border rounded bg-light d-flex justify-content-between">
                                    <span class="fw-bold">Future:</span>
                                    <strong class="text-warning-emphasis" id="stat-future">0%</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== DISCLAIMER ===================== -->
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card shadow-none border rounded-4 text-center p-4">
                <h5 class="fw-bold text-body mb-2">How Relationship Compatibility is Calculated</h5>
                <p class="text-muted small mb-0">Our fun love compatibility tool evaluates name matching patterns, character matches, and deterministic algorithms to return a percentage score. Note: This tool is purely for entertainment purposes and does not represent real-life guidance. Enjoy with friends and partner! &hearts;</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('love-calculator-form');
    const name1Input = document.getElementById('love-name1-custom');
    const name2Input = document.getElementById('love-name2-custom');

    const resScore = document.getElementById('res-love-score');
    const resMsg = document.getElementById('res-love-msg');

    const statPassion = document.getElementById('stat-passion');
    const statTrust = document.getElementById('stat-trust');
    const statIntimacy = document.getElementById('stat-intimacy');
    const statFuture = document.getElementById('stat-future');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const n1 = name1Input.value.trim().toLowerCase();
        const n2 = name2Input.value.trim().toLowerCase();
        if (!n1 || !n2) return;

        // Generate deterministic compatibility score
        let sum = 0;
        for (let i = 0; i < n1.length; i++) sum += n1.charCodeAt(i);
        for (let i = 0; i < n2.length; i++) sum += n2.charCodeAt(i);

        const score = (sum % 51) + 50; // Returns between 50% and 100%

        // Deterministic sub-stats
        const passion = (sum % 41) + 60;
        const trust = ((sum * 3) % 46) + 55;
        const intimacy = ((sum * 7) % 36) + 65;
        const future = ((sum * 9) % 51) + 50;

        resScore.textContent = `${score}%`;

        // Update messages
        if (score > 90) {
            resMsg.textContent = "Soulmates! Made for each other. &hearts;";
        } else if (score > 80) {
            resMsg.textContent = "Amazing compatibility! Strong chemistry. &hearts;";
        } else if (score > 70) {
            resMsg.textContent = "Good match! Mutual respect and warmth. &hearts;";
        } else {
            resMsg.textContent = "Workable match! Keep communicating. &hearts;";
        }

        // Sub stats
        statPassion.textContent = `${passion}%`;
        statTrust.textContent = `${trust}%`;
        statIntimacy.textContent = `${intimacy}%`;
        statFuture.textContent = `${future}%`;
    });
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>

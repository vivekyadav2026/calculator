const calculatorsList = [
    { name: 'Age Calculator', url: '/calculators/age' },
    { name: 'EMI Calculator', url: '/calculators/emi' },
    { name: 'BMI Calculator', url: '/calculators/bmi' },
    { name: 'Percentage Calculator', url: '/calculators/percentage' },
    { name: 'GST Calculator', url: '/calculators/gst' },
    { name: 'SIP Calculator', url: '/calculators/sip' },
    { name: 'Home Loan Calculator', url: '/calculators/home_loan' },
    { name: 'Car Loan Calculator', url: '/calculators/car_loan' },
    { name: 'Personal Loan Calculator', url: '/calculators/personal_loan' },
    { name: 'Compound Interest Calculator', url: '/calculators/compound_interest' },
    { name: 'Simple Interest Calculator', url: '/calculators/simple_interest' },
    { name: 'Income Tax Calculator', url: '/calculators/income_tax' },
    { name: 'Fixed Deposit Calculator', url: '/calculators/fd' },
    { name: 'Love Calculator', url: '/calculators/love' },
    { name: 'Calorie Calculator', url: '/calculators/calorie' }
];

// -----------------------------------------------------------------
// GLOBAL UTILITY FUNCTIONS FOR PREMIUM UI
// -----------------------------------------------------------------

/**
 * Animate numeric counter value dynamically
 * @param {HTMLElement} element - Target element to animate
 * @param {number} start - Starting numeric value
 * @param {number} end - Target value
 * @param {number} duration - Animation duration in milliseconds
 * @param {function} formatFn - Optional formatter function (e.g. currency formatting)
 */
function animateNumber(element, start, end, duration = 800, formatFn = null) {
    if (!element) return;
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const currentVal = start + progress * (end - start);
        
        element.textContent = formatFn ? formatFn(currentVal) : Math.round(currentVal).toLocaleString('en-IN');
        
        if (progress < 1) {
            window.requestAnimationFrame(step);
        } else {
            element.textContent = formatFn ? formatFn(end) : Math.round(end).toLocaleString('en-IN');
        }
    };
    window.requestAnimationFrame(step);
}

/**
 * Export table data to CSV file
 * @param {string} tableId - ID of target HTML table
 * @param {string} filename - Output file name
 */
function exportTableToCSV(tableId, filename = 'export.csv') {
    const table = document.getElementById(tableId);
    if (!table) return;

    let csvContent = "data:text/csv;charset=utf-8,";
    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        cols.forEach(col => {
            let text = col.innerText.replace(/₹/g, '').replace(/,/g, '').trim();
            rowData.push('"' + text + '"');
        });
        csvContent += rowData.join(",") + "\r\n";
    });

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

/**
 * Trigger browser print optimized for PDF export
 */
function exportTableToPDF() {
    window.print();
}

// -----------------------------------------------------------------
// INITIALIZATION
// -----------------------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    // Theme Toggle
    const themeToggleBtns = document.querySelectorAll('#theme-toggle, #theme-toggle-mobile');
    if (themeToggleBtns.length > 0) {
        const htmlElement = document.documentElement;

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            htmlElement.setAttribute('data-bs-theme', savedTheme);
            updateIcons(savedTheme);
        }

        themeToggleBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const currentTheme = htmlElement.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                
                htmlElement.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcons(newTheme);
            });
        });

        function updateIcons(theme) {
            themeToggleBtns.forEach(btn => {
                const icon = btn.querySelector('i');
                if (!icon) return;
                if (theme === 'dark') {
                    icon.className = 'bi bi-sun';
                } else {
                    icon.className = 'bi bi-moon-stars';
                }
            });
        }
    }

    // Live Search (supports multiple search inputs)
    const searchInputs = document.querySelectorAll('.saas-search-input, #calc-search');
    const brandEl = document.querySelector('.saas-brand, .navbar-brand');
    const baseUrl = brandEl ? brandEl.getAttribute('href') : '/';

    searchInputs.forEach(input => {
        let resultsContainer = input.nextElementSibling;
        
        // Handle legacy index.php search where results container might have ID search-results
        if (!resultsContainer || !resultsContainer.classList.contains('saas-search-results')) {
            resultsContainer = document.getElementById('search-results');
            if (!resultsContainer) return;
        }

        input.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            resultsContainer.innerHTML = '';
            
            if (query.length > 0) {
                const matches = calculatorsList.filter(c => c.name.toLowerCase().includes(query));
                if (matches.length > 0) {
                    matches.forEach(m => {
                        const a = document.createElement('a');
                        const base = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;
                        a.href = base + m.url;
                        a.className = 'd-block p-3 text-decoration-none text-dark border-bottom';
                        a.innerHTML = `<i class="bi bi-calculator me-2" style="color: #4F46E5;"></i> <span style="font-weight: 500;">${m.name}</span>`;
                        resultsContainer.appendChild(a);
                    });
                    resultsContainer.classList.remove('d-none');
                } else {
                    resultsContainer.innerHTML = '<div class="p-3" style="color: #6B7280; font-size: 0.875rem;">No calculators found</div>';
                    resultsContainer.classList.remove('d-none');
                }
            } else {
                resultsContainer.classList.add('d-none');
            }
        });

        // Hide on outside click
        document.addEventListener('click', (e) => {
            if (!input.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.classList.add('d-none');
            }
        });
        
        // Show again when clicking input if there's text
        input.addEventListener('focus', () => {
            if (input.value.length > 0) resultsContainer.classList.remove('d-none');
        });
    });

    // Setup input slider interactions dynamically
    const sliders = document.querySelectorAll('.form-range');
    sliders.forEach(slider => {
        const valueId = slider.getAttribute('data-value-id');
        const valIndicator = document.getElementById(valueId);
        
        const updateSliderVal = () => {
            if (valIndicator) {
                // If it is percentage
                if (slider.id.includes('rate') || slider.id.includes('interest')) {
                    valIndicator.textContent = slider.value + '%';
                } else if (slider.id.includes('tenure') || slider.id.includes('time') || slider.id.includes('year')) {
                    valIndicator.textContent = slider.value + ' Yr';
                } else {
                    valIndicator.textContent = '₹ ' + parseInt(slider.value).toLocaleString('en-IN');
                }
            }
        };

        slider.addEventListener('input', updateSliderVal);
        updateSliderVal();
    });

    // Custom Mobile Slide Panel Logic
    const mobileMenuTrigger = document.getElementById('mobile-menu-trigger');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuTrigger && mobileMenuClose && mobileMenu) {
        mobileMenuTrigger.addEventListener('click', () => {
            mobileMenu.classList.add('is-open');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        });

        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.remove('is-open');
            document.body.style.overflow = '';
        });
    }
});

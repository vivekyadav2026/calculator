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
                    icon.classList.remove('bi-moon-stars');
                    icon.classList.add('bi-sun');
                } else {
                    icon.classList.remove('bi-sun');
                    icon.classList.add('bi-moon-stars');
                }
            });
        }
    }

    // Live Search
    const searchInput = document.getElementById('calc-search');
    const searchResults = document.getElementById('search-results');
    const brandEl = document.querySelector('.navbar-brand');
    const baseUrl = brandEl ? brandEl.getAttribute('href') : '/';

    if (searchInput && searchResults) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            searchResults.innerHTML = '';
            
            if (query.length > 0) {
                const matches = calculatorsList.filter(c => c.name.toLowerCase().includes(query));
                if (matches.length > 0) {
                    matches.forEach(m => {
                        const a = document.createElement('a');
                        const base = baseUrl.endsWith('/') ? baseUrl.slice(0, -1) : baseUrl;
                        a.href = base + m.url;
                        a.className = 'd-block p-3 text-decoration-none search-item';
                        a.innerHTML = `<i class="bi bi-calculator me-2 text-primary"></i> <span class="fw-medium">${m.name}</span>`;
                        searchResults.appendChild(a);
                    });
                    searchResults.classList.remove('d-none');
                } else {
                    searchResults.innerHTML = '<div class="p-3 text-muted search-item">No calculators found</div>';
                    searchResults.classList.remove('d-none');
                }
            } else {
                searchResults.classList.add('d-none');
            }
        });

        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.classList.add('d-none');
            }
        });
    }
});

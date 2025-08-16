// Toggle sidebar on mobile
const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');

menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', (event) => {
    if (window.innerWidth < 1024 &&
        !sidebar.contains(event.target) &&
        !menuToggle.contains(event.target) &&
        sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});

// Pages dropdown toggle
const toggleBtn = document.getElementById('pages-toggle');
const dropdown = document.getElementById('pages-dropdown');
const arrowIcon = document.getElementById('arrow-icon');

toggleBtn.addEventListener('click', () => {
    dropdown.classList.toggle('hidden');
    arrowIcon.classList.toggle('rotate-180');
});

// Generic dropdown toggle function
function toggleDropdown(dropdownId, arrowId) {
    const dropdown = document.getElementById(dropdownId);
    const arrow = document.getElementById(arrowId);
    dropdown.classList.toggle("hidden");
    arrow.classList.toggle("rotate-180");
}

// Set progress ring to 72%
document.addEventListener('DOMContentLoaded', function () {
    const circle = document.querySelector('.progress-ring__circle');
    if (circle) {
        const radius = circle.r.baseVal.value;
        const circumference = radius * 2 * Math.PI;

        circle.style.strokeDasharray = `${circumference} ${circumference}`;
        circle.style.strokeDashoffset = circumference;

        const offset = circumference - 72 / 100 * circumference;
        circle.style.strokeDashoffset = offset;
    }
});
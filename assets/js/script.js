document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('nav a');

    function changeNavLinkState() {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (pageYOffset >= (sectionTop - sectionHeight / 3) && pageYOffset < (sectionTop + sectionHeight)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('text-pink-800', 'text-gray-200', 'active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('text-pink-800', 'active');
            }
        });
    }

    window.addEventListener('scroll', changeNavLinkState);
    changeNavLinkState();
    // Theme Toggle Script
    const themeToggle = document.getElementById('theme-toggle');
    const lightIcon = document.getElementById('light-icon');
    const darkIcon = document.getElementById('dark-icon');

    // Check for saved theme in localStorage
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
        darkIcon.classList.add('hidden');
        lightIcon.classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        lightIcon.classList.add('hidden');
        darkIcon.classList.remove('hidden');
    }

    themeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        }
    });
});

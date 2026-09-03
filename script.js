document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -40px 0px'
    });

    document.querySelectorAll('.animate-in').forEach(el => observer.observe(el));

    // Set minimum check-in date to today
    const today = new Date().toISOString().split('T')[0];
    const checkinInput = document.getElementById('checkin');
    const checkoutInput = document.getElementById('checkout');

    if (checkinInput) checkinInput.setAttribute('min', today);

    checkinInput?.addEventListener('change', () => {
        checkoutInput.setAttribute('min', checkinInput.value);
        if (checkoutInput.value && checkoutInput.value < checkinInput.value) {
            checkoutInput.value = checkinInput.value;
        }
    });

    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.querySelector('.navbar-links');

    menuToggle?.addEventListener('click', () => {
        navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        navLinks.style.flexDirection = 'column';
        navLinks.style.position = 'absolute';
        navLinks.style.top = '128px';
        navLinks.style.left = '0';
        navLinks.style.right = '0';
        navLinks.style.background = 'var(--color-forest)';
        navLinks.style.padding = '16px 24px';
        navLinks.style.gap = '16px';
        navLinks.style.boxShadow = '0 8px 16px rgba(0,0,0,0.2)';
    });

    // Smooth scroll for nav links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Dining Carousel
    const carousel = document.getElementById('diningCarousel');
    const prevBtn = document.getElementById('diningPrev');
    const nextBtn = document.getElementById('diningNext');

    if (carousel && prevBtn && nextBtn) {
        let currentIndex = 0;

        function getDiningCardWidth() {
            const card = carousel.querySelector('.dining-card');
            if (!card) return 0;
            const style = window.getComputedStyle(carousel);
            const gap = parseFloat(style.gap) || 28;
            return card.offsetWidth + gap;
        }

        function getVisibleCount() {
            const w = window.innerWidth;
            if (w <= 768) return 1;
            if (w <= 992) return 2;
            return 3;
        }

        function getTotalCards() {
            return carousel.querySelectorAll('.dining-card').length;
        }

        function scrollCarousel(index) {
            const cardW = getDiningCardWidth();
            carousel.scrollTo({ left: index * cardW, behavior: 'smooth' });
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                scrollCarousel(currentIndex);
            }
        });

        nextBtn.addEventListener('click', () => {
            const maxIndex = getTotalCards() - getVisibleCount();
            if (currentIndex < maxIndex) {
                currentIndex++;
                scrollCarousel(currentIndex);
            }
        });
    }
});

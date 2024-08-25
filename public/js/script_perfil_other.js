const myObserverHidden = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show')
        } else {
            entry.target.classList.remove('show')
        }
    })
});

const hiddenElements = document.querySelectorAll('.hidd');
hiddenElements.forEach((el) => myObserverHidden.observe(el));

document.addEventListener('DOMContentLoaded', () => {
    function getRandomNeutralColor() {
        const r = Math.floor(Math.random() * 128) + 127;
        const g = Math.floor(Math.random() * 128) + 127;
        const b = Math.floor(Math.random() * 128) + 127;
        return `rgb(${r}, ${g}, ${b})`;
    }

    const randomColor = getRandomNeutralColor();
    const elements = document.querySelectorAll('.random-color');
    elements.forEach(element => {
        element.style.backgroundColor = randomColor;
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    function toggleScrollToTopButton() {
        if (window.scrollY > window.innerHeight) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    }

    window.addEventListener('scroll', toggleScrollToTopButton);

    scrollToTopBtn.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    scrollToTopBtn.classList.add('hidden');
});
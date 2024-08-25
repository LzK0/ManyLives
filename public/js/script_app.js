var sidebar = document.getElementById("sidebar");
var name_show = document.getElementById("user-name");
var btn_toggle = document.getElementById("sidebar-toggle").addEventListener("click", function () {
    sidebar.classList.toggle('sidebar-move');
    this.classList.toggle('toggle-move');
    name_show.classList.toggle('show-name');
});

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

window.addEventListener('scroll', () => {
    localStorage.setItem('scrollPosition', window.scrollY);
});

window.addEventListener('load', () => {
    const scrollPosition = localStorage.getItem('scrollPosition');
    if (scrollPosition) {
        window.scrollTo(0, parseInt(scrollPosition));
        localStorage.removeItem('scrollPosition');
    }
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

const myObserverContent = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('content')
        } else {
            entry.target.classList.remove('content-off')
        }
    })
});
const contentElements = document.querySelectorAll('.content-off');
contentElements.forEach((el) => myObserverContent.observe(el));
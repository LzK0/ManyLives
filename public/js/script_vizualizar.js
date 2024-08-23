
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
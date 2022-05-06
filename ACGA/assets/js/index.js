const scrollBtn = document.getElementById('toTopBtn');
const scrollBtnDisplay = function() {
    window.scrollY > window.innerHeight ?
        scrollBtn.classList.add("show") :
        scrollBtn.classList.remove("show");
};
window.addEventListener("scroll", scrollBtnDisplay);

const scrollWindow = function() {
    if (window.scrollY != 0) {
        setTimeout(function() {
            window.scrollTo(0, window.scrollY - 500);
            scrollWindow();
        }, 10);
    }
};
scrollBtn.addEventListener("click", scrollWindow);
//Nav link template for current active link
let activeLink = window.location.pathname;
let navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
    if(link.href.includes(`${activeLink}`)){
        link.classList.add('active');
        link.setAttribute('aria-current', 'page');
    }
    else{
        link.classList.remove('active');
        link.setAttribute('aria-current', '');
    }
});

//Nav link template for current active link
let activeLink = window.location.pathname;
let navLinks = document.querySelectorAll('nav a');
let linkSvg = document.querySelector('nav a svg');
let adminName = document.getElementById("admin-name");
console.log(activeLink);

navLinks.forEach(link => {
    if(link.href.includes(`${activeLink}`)){
        link.classList.add('active');
        link.setAttribute('aria-current', 'page');

        // If profile page, we want to exclusively style the svg element
        if (activeLink == '/views/profile_page.php') {
            linkSvg.classList.remove('text-light');
            adminName.classList.remove('text-light');
            linkSvg.classList.add('text-warning');
            adminName.classList.add('text-warning');
        }

    }
    else{
        link.classList.remove('active');
        link.setAttribute('aria-current', '');
    }
});

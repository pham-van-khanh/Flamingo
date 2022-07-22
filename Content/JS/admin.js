document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show_nav')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE 
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.toggle('active'))
            // this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))=====*/

    // Your code to run since DOM is loaded and ready
});
const author = document.querySelector('.author');
const btn = document.querySelectorAll('.btn-edit');
const fa_circle = document.querySelectorAll('.fa-times-circle');
btn.forEach(e => {
    e.addEventListener('click', function () {
        author.classList.add('active');

    })
});
fa_circle.forEach(e => {
    e.addEventListener('click', function () {
        author.classList.remove('active');
    })
});
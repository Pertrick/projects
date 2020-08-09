$(function() {
    $('.hamburger-menu').on('click', function(){
        $('.toggle').toggleClass('open');
    });
});

$(function() {
    $('.hamburger-menu').on('click', function(){
        $('.nav-list').toggleClass('open');
    });

    AOS.init({
        easing:'ease',
        duration: 1000,

    });
});


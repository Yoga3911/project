$(document).ready(function () {
    $('body').css('opacity', 1)
    $('.sign-up').hide();
    $('#btn_2').click(function () {
        $('.sign-up').hide();
        $('.sign-in').show();
        $('.side-content2').css('opacity', 0)
        $('.side-content').css('opacity', 1)
    })
    $('#btn').click(function () {
        $('.sign-in').hide();
        $('.sign-up').show();
        $('.side-content2').css('opacity', 1)
        $('.side-content').css('opacity', 0)
    })
})
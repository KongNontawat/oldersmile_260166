$(function() {
    $('.btn-close-toast').click(function() {
        $('.toast').removeClass('show')
    })
    setTimeout(() => {
        $('.toast').removeClass('show')
    }, 4000);
})
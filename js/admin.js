$(function() {
    $('.btn-close-toast').click(function() {
        $('.toast').removeClass('show')
    })
    setTimeout(() => {
        $('.toast').removeClass('show')
    }, 4000);

    $('.btn-toggle').click(function(){
        $('.sidebar').toggleClass('active');
    })

})
$(document).ready(function() {
    setTimeout(function() {
        $('#loading').addClass('hide');
    }, 3000);
    
    $('.nav-link').click(function() {
        var id = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(id).offset().top
        }, 2000);
        
    });
    
    $('.skill-bar').each(function() {
        var width = $(this).attr('data-width');
        $(this).css('width', width + '%');
    });
    
    $('#submit').on('click', function() {
        $('#form').addClass('form-submit');
        setTimeout(function(){
            $('#form').removeClass('form-submit');
            $('#form').hide();
            $('#form-msg').show();
        },1000);
        return false;
    });
});
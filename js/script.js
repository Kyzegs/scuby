$(document).ready(() => {
    function enableOverlay() {
        $('body').css('overflow', 'hidden');
        $('#mobile-button').css('position', 'fixed');
        $('#mobile-button img').css('transform', 'rotate(135deg)');
    }

    function disableOverlay() {
        $('body').css('overflow', 'scroll');
        $('#mobile-button').css('position', '');
        $('#mobile-button img').css('transform', 'rotate(0deg)');
    }

    $('#mobile-button img, #nav-overlay').click(() => {
        $('#nav-overlay').toggle();

        if($('#nav-overlay').css('display') == 'none') {
            disableOverlay();
        } else {
            enableOverlay();
        }
    });
    
    $(window).resize(() => {
        if (window.matchMedia('(min-width: 768px)').matches) {
            $('#nav-overlay').css('display', 'none')
            disableOverlay();
        }
    });
});
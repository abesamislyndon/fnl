$(document).ready(function() { 
$('.templatemo-sidebar-menu').on('click', 'li', function(){
    $('.templatemo-sidebar-menuli').removeClass('active');
    $(this).addClass('active');
});

});
$(document).ready(function() {
    $('#dataTable').DataTable();


    $(".banner-area-start").ripples({
        resolution: 512,
        perturbance: 0.04,
        dropRadius: 20
    });

    $(".drop-btn").click(function() {
        $(".dropdown-menu-1").toggleClass("show");
    });

    $('.show-btn').click(function() {
        if ($(this).hasClass('fa-eye-slash')) {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('#password').attr('type', 'text');
        } else {
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('#password').attr('type', 'password');
        }
    });
});
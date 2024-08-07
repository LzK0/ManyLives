$(document).ready(function () {
    $('#live-search').on('keyup', function () {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: 'search',
            data: {
                'search': $value
            },
            success: function (data) {
                $('#show').html(data);
            }
        });
    });
    $('.effect-likes').on('click', function () {
        var id = $('.val-likes').val();
        alert(id)
        $.ajax({

        });
    });
    window.addEventListener('load', function () {
        $.ajax({
            type: 'get',
            url: 'all_posts',
            success: function (data) {
                $('#show').html(data);
            }
        });
    });
});
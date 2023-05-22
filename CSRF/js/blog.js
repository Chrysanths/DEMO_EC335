$(document).ready(function(){
    $('#btn-logout').click(function(){
        $.ajax({
            cache: false,
            url: 'logout.php',
            success: function () {
                window.location.href = 'login.php'
            },
            error: function () {
                alert(error)
            }
        })
    })
})
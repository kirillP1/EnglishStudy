$(document).ready(function() {
    $('.test-sub').on('click', function () {
        Swal.fire({
            title: 'Вы уверены?',
            text: "Вы хотите завершить тест?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да!',
            cancelButtonText: 'Не особо!',
        }).then((result) => {
            if (result.isConfirmed) {
                $('.test').submit();
            }
        });
    });
    $('.btn-danger').on('click', function () {
        Swal.fire({
            title: 'Вы уверены?',
            text: "Вы хотите завершить тест?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да!',
            cancelButtonText: 'Не особо!',
        }).then((result) => {
            if (result.isConfirmed) {
                $link = $(this).attr('link');
                location.href = $link;

                return true;
            }
        });
    });
});
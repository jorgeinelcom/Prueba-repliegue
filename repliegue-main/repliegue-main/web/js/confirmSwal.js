yii.confirm = function (message, okCallback, cancelCallback) {
    Swal.fire({
        title: '¿Estas Segur@?',
        html: message,
        icon: 'warning',
        showCancelButton: true,
        closeOnConfirm: true,
        allowOutsideClick: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.isConfirmed) {
            
            okCallback();
        }
    });
};
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        let successAlert = document.querySelector('.alert-success');
        let errorAlert = document.querySelector('.alert-danger');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 3000);
});
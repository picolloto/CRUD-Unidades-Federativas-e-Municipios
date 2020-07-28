$(document).ready(function() {
    $("input").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
});

$('#sigla').on('keypress', function(event) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});


(function() {
    'use strict';
    window.addEventListener('load', function() {

        var forms = document.getElementsByClassName('form-validation');

        var validationKeyup = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('keyup', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        var validationSubmit = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

    }, false);
})();
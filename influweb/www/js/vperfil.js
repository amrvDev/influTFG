document.addEventListener('DOMContentLoaded', function () {
    var nameInput = document.getElementById('name');
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var form = document.querySelector('form');
    var submitButton = document.querySelector('button[type="submit"]');

    // Function to check if any field is valid
    function validateForm() {
        var isNameValid = /^[a-zA-Z\s]{1,40}$/.test(nameInput.value.trim()); // Check for letters, spaces, upper and lower case with a maximum of 40 characters
        var isEmailValid = emailInput.checkValidity();
        var isPasswordValid = passwordInput.checkValidity();

        return (
            isNameValid ||
            isEmailValid ||
            isPasswordValid
        );
    }

    function updateSubmitButtonState() {
        // Verificar si al menos un campo es válido
        if (validateForm()) {
            // Habilitar el botón de envío
            submitButton.disabled = false;
        } else {
            // Deshabilitar el botón de envío
            submitButton.disabled = true;
        }
    }

    nameInput.addEventListener('input', function () {
        var name = nameInput.value.trim();

        // Validation for name: only letters, spaces, upper and lower case with a maximum of 40 characters
        if (/^[a-zA-Z\s]{1,40}$/.test(name)) {
            // Name is valid
            nameInput.classList.remove('is-invalid');
            nameInput.classList.add('is-valid');
        } else {
            // Name is invalid
            nameInput.classList.remove('is-valid');
            nameInput.classList.add('is-invalid');
        }

        if (name === '') {
            // Empty name field
            nameInput.classList.remove('is-valid');
            nameInput.classList.remove('is-invalid');
        }

        updateSubmitButtonState();
    });

    emailInput.addEventListener('input', function () {
        var email = emailInput.value.trim();

        // Validación de formato de correo electrónico
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            // Email inválido
            emailInput.classList.add('is-invalid');
            emailInput.classList.remove('is-valid');
        } else {
            // Email válido
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
        }

        if (email === '') {
            // Campo de correo electrónico vacío
            emailInput.classList.remove('is-valid');
            emailInput.classList.remove('is-invalid');
        }

        updateSubmitButtonState();
    });

    passwordInput.addEventListener('input', function () {
        var password = passwordInput.value;

        // Validación de longitud mínima de la contraseña
        if (password.length < 6) {
            // Contraseña inválida
            passwordInput.classList.add('is-invalid');
            passwordInput.classList.remove('is-valid');
        } else {
            // Contraseña válida
            passwordInput.classList.remove('is-invalid');
            passwordInput.classList.add('is-valid');
        }

        if (password === '') {
            // Campo de contraseña vacío
            passwordInput.classList.remove('is-valid');
            passwordInput.classList.remove('is-invalid');
        }

        updateSubmitButtonState();
    });
});

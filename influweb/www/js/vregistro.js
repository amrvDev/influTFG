document.addEventListener('DOMContentLoaded', function () {
    var usernameInput = document.getElementById('username');
    var nameInput = document.getElementById('name');
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('confirm-password');
    var form = document.getElementById('registrationForm');
    var submitButton = document.getElementById('submitButton');

    // Function to check if all fields are valid
    function validateForm() {
        var isUsernameValid = usernameInput.checkValidity();
        var isNameValid = /^[a-zA-Z\s]{1,40}$/.test(nameInput.value.trim()); // Check for letters, spaces, upper and lower case with a maximum of 40 characters
        var isEmailValid = emailInput.checkValidity();
        var isPasswordValid = passwordInput.checkValidity();
        var isConfirmPasswordValid = confirmPasswordInput.checkValidity();
        var isPasswordMatch = passwordInput.value === confirmPasswordInput.value;

        return (
            isUsernameValid &&
            isNameValid &&
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid &&
            isPasswordMatch &&
            usernameInput.value.trim() !== '' &&
            nameInput.value.trim() !== '' &&
            emailInput.value.trim() !== '' &&
            passwordInput.value !== '' &&
            confirmPasswordInput.value !== ''
        );
    }

    usernameInput.addEventListener('input', function () {
        var username = usernameInput.value.trim();

        // Validación de longitud máxima para nombre de usuario
        if (username.length > 20) {
            // Nombre de usuario demasiado largo
            usernameInput.classList.remove('is-valid');
            usernameInput.classList.add('is-invalid');
        } else {
            // Nombre de usuario válido
            usernameInput.classList.remove('is-invalid');
            usernameInput.classList.add('is-valid');
        }

        if (username === '') {
            // Campo de nombre de usuario vacío
            usernameInput.classList.remove('is-valid');
            usernameInput.classList.remove('is-invalid');
        }
    });

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
    });

    emailInput.addEventListener('input', function () {
        var email = emailInput.value.trim();

        // Validación de formato de correo electrónico
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            // Email inválido
            emailInput.classList.remove('is-valid');
            emailInput.classList.add('is-invalid');
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
    });

    passwordInput.addEventListener('input', function () {
        var password = passwordInput.value;

        // Validación de longitud mínima de la contraseña
        if (password.length < 6) {
            // Contraseña inválida
            passwordInput.classList.remove('is-valid');
            passwordInput.classList.add('is-invalid');
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
    });

    confirmPasswordInput.addEventListener('input', function () {
        var confirmPassword = confirmPasswordInput.value;
        var password = passwordInput.value;

        // Validación de longitud mínima para confirmar contraseña
        if (confirmPassword.length < 6) {
            // Confirmar contraseña inválida
            confirmPasswordInput.classList.remove('is-valid');
            confirmPasswordInput.classList.add('is-invalid');
        } else if (confirmPassword !== password) {
            // Confirmar contraseña no coincide con la contraseña
            confirmPasswordInput.classList.remove('is-valid');
            confirmPasswordInput.classList.add('is-invalid');
        } else {
            // Confirmar contraseña válida
            confirmPasswordInput.classList.remove('is-invalid');
            confirmPasswordInput.classList.add('is-valid');
        }

        if (confirmPassword === '') {
            // Campo de confirmar contraseña vacío
            confirmPasswordInput.classList.remove('is-valid');
            confirmPasswordInput.classList.remove('is-invalid');
        }

        if (password === '') {
            // Campo de contraseña vacío
            passwordInput.classList.remove('is-valid');
            passwordInput.classList.remove('is-invalid');
        }
    });

    // Event listener for form input
    form.addEventListener('input', function () {
        // Verificar si el formulario es válido
        if (validateForm()) {
            // Habilitar el botón de registro
            submitButton.disabled = false;
        } else {
            // Deshabilitar el botón de registro
            submitButton.disabled = true;
        }
    });
});


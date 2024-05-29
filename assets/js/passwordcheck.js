document.addEventListener('DOMContentLoaded', function() {
    var loginForm = document.getElementById('loginForm');
    var loginButton = document.getElementById('loginButton');
    var passwordField = document.getElementById('passwordField');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();

        var email = document.getElementById('login-email').value;
        var password = document.getElementById('login-password').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', BASE_URL + 'Loginsignup/checkPasswordStatus', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.password_empty) {
                    // Send email to newPassword page
                    var newPasswordForm = document.createElement('form');
                    newPasswordForm.method = 'POST';
                    newPasswordForm.action = BASE_URL + 'Loginsignup/newPassword';
                    var emailInput = document.createElement('input');
                    emailInput.type = 'hidden';
                    emailInput.name = 'email';
                    emailInput.value = email;
                    newPasswordForm.appendChild(emailInput);
                    document.body.appendChild(newPasswordForm);
                    newPasswordForm.submit();
                } else {
                    if (!passwordField.querySelector('input').value) {
                        passwordField.style.display = 'block';
                    } else {
                        // Send email and password to apiAuth page
                        var authForm = document.createElement('form');
                        authForm.method = 'POST';
                        authForm.action = BASE_URL + 'Loginsignup/apiAuth';
                        var emailInput = document.createElement('input');
                        emailInput.type = 'hidden';
                        emailInput.name = 'email';
                        emailInput.value = email;
                        authForm.appendChild(emailInput);
                        var passwordInput = document.createElement('input');
                        passwordInput.type = 'hidden';
                        passwordInput.name = 'password';
                        passwordInput.value = password;
                        authForm.appendChild(passwordInput);
                        document.body.appendChild(authForm);
                        authForm.submit();
                    }
                }
            }
        };
        xhr.send('email=' + encodeURIComponent(email));
    });
});

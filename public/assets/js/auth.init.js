/*
Template Name: Dason - Admin & Dashboard Template
Author: Themesdesign
Version: 1.0.0
Website: https://themesdesign.in/
Contact: themesdesign.in@gmail.com
File: Auth init js
*/

document.addEventListener('DOMContentLoaded', function() {
    // Password show & hide
    const passwordInputs = document.querySelectorAll('.password-input');
    const toggleButtons = document.querySelectorAll('.password-addon');

    if (toggleButtons) {
        toggleButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                const input = passwordInputs[index];
                if (input.type === 'password') {
                    input.type = 'text';
                    button.innerHTML = '<i class="mdi mdi-eye-off-outline"></i>';
                } else {
                    input.type = 'password';
                    button.innerHTML = '<i class="mdi mdi-eye-outline"></i>';
                }
            });
        });
    }
});
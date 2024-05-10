function showpass(){
    let passwordField = document.getElementById('password');
    let togglePassword = document.getElementById('nosee');
    let eyeIcon = togglePassword.getElementsByTagName('i')[0];

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    }
        
}
function showRepass(){
    let passwordField = document.getElementById('re_enter_password');
    let togglePassword = document.getElementById('noseeRe');
    let eyeIcon = togglePassword.getElementsByTagName('i')[0];

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    }
        
}
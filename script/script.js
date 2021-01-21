function loginSubmit() {

}

function registerSubmit() {
    event.preventDefault();
    errors = document.getElementsByClassName('error');
    inputs = document.getElementsByClassName('input-control');
    for(let element of inputs) {
        element.style.border = "none";
    }
    for(let element of errors) {
        element.innerText = "";
    }
    fullname = document.getElementById('fullname');
    username = document.getElementById('username');
    email = document.getElementById('email');
    password = document.getElementById('password');
    confirmpass = document.getElementById('confirm');
    errorHappened = false;
    if (fullname.value.length == 0) {
        error = "Fullname is required.";
        fullname.style.border = "1px solid red";
        fullname.parentElement.querySelector('.error').innerText = error;
        errorHappened = true;
    }
    if (username.value.length < 6) {
        error = "Username must be atleast 6 characters.";
        username.style.border = "1px solid red";
        username.parentElement.querySelector('.error').innerText = error;
        errorHappened = true;
    }
    if (email.value.length == 0) {
        error = "Email is required.";
        email.style.border = "1px solid red";
        email.parentElement.querySelector('.error').innerText = error;
        errorHappened = true;
    }
    if (!isValidEmail(email.value)) {
        error = "Email is not valid.";
        email.style.border = "1px solid red";
        email.parentElement.querySelector('.error').innerText = error;
        errorHappened = true;
    }
    if (password.value.length < 8) {
        error = "Password must be atleast 8 characters.";
        password.style.border = "1px solid red";
        password.parentElement.querySelector('.error').innerText = error;
        errorHappened = true;
    }
    if (password.value != confirmpass.value) {
        error = "Passwords do not match.";
        confirmpass.style.border = "1px solid red";
        confirmpass.parentElement.querySelector('.error').innerText = error;
        errorHappened = true;
    }
    if(!errorHappened == true) {
        data = new FormData();
        data.append('fullname', fullname.value);
        data.append('username', username.value);
        data.append('email', email.value);
        data.append('password', password.value);
        http = new XMLHttpRequest();
        http.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200) {
                alert('Success');
            }
        }
        http.open('POST', 'registerUser.php', true);
        http.send(data);
    }
}

function isValidEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
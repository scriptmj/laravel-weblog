function verifyPassword(){
    let password = document.getElementById('password').value;
    let username = document.getElementById('username').value;
    let usernameFeedback = document.getElementById('password-username');
    let lengthFeedback = document.getElementById('password-length');
    let validityFeedback = document.getElementById('password-validity');
    if(password.length < 5){
        lengthFeedback.innerText = "Password too short";
    } else {
        lengthFeedback.innerText = "";
    }
    if(password === username){
        usernameFeedback.innerText = "Password cannot be too similar to the username";
    } else {
        usernameFeedback.innerText = "";
    }
    let pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{5,}$/g;
    if(password.match(pattern)){
        validityFeedback.innerText = "";
    } else {
        validityFeedback.innerText = "Password must contain at least 1 uppercase, 1 lowercase and 1 number.";
    }

}

function matchPassword(){
    let password1 = document.getElementById('password').value;
    let password2 = document.getElementById('password-repeat').value;
    let feedback = document.getElementById('repeat-password-feedback');
    if(password1 !== password2){
        feedback.innerText = "Passwords don't match";
    } else {
        feedback.innerText = "";
    }
}

$(document).ready(function (){
    $('#password-repeat, #password').keyup(matchPassword);
})

$(document).ready(function (){
    $('#password').keyup(verifyPassword);
})
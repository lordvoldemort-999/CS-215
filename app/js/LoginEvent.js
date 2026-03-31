// Registering the events for all fields in the Sign-up page

let email = document.getElementById("mymail");
email.addEventListener("blur", emailHandler);

let password = document.getElementById("password");
password.addEventListener("blur", passwordHandler);
password.addEventListener("change", validatePassword);



//Validating the entire login form 
let logIn = document.getElementById("login-form");
logIn.addEventListener("submit", validateLogin);



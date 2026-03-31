// Registering the events for all fields in the Sign-up page

let email = document.getElementById("mymail");
email.addEventListener("blur", emailHandler);

let password = document.getElementById("password");
password.addEventListener("blur", passwordHandler);
password.addEventListener("change", validatePassword);

let nicname = document.getElementById("nickname");
nicname.addEventListener("blur", nickNameHandler);

let confirm_pwd = document.getElementById("cpassword")
confirm_pwd.addEventListener("blur",confirmPwdHandler);
confirm_pwd.addEventListener("keyup",validateConfirmPassword);



//Validating the entire signup form 
let signUp = document.getElementById("signUpform");
signUp.addEventListener("submit", validateSignUp);
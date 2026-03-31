// Registering the events for all fields in the UserInfo page

let fname = document.getElementById("fullname");
fname.addEventListener("blur", fullNameHandler);

let nicname = document.getElementById("nickname");
nicname.addEventListener("blur", nickNameHandler);

let password = document.getElementById("password");
password.addEventListener("blur", passwordHandler);
password.addEventListener("change", validatePassword);

let dateBirth = document.getElementById("dob");
dateBirth.addEventListener("blur", dobHandler);

let avaTar = document.getElementById("avatar");
avaTar.addEventListener("blur", avatarHandler);





//Validating the entire UserInfo form 
let UserInfo = document.getElementById("User-info");
UserInfo.addEventListener("submit",validateUserInfo );

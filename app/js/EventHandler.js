//Validation  Functions

function validateEmail(email)
{   
    if (email.length == 0)
    {
        return "Email is empty";
    }

    let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    if (!emailRegex.test(email))
    {
        return "Email is invalid ";
    }
    
    return true;
}


function validateNickName(name)
{    
    if (name.length == 0)
    {
        return "Nickname is empty";
    }


    let nameRegex = /^[A-Za-z0-9_]+$/;

    if( !nameRegex.test(name))
    {
        return "Nickname should only contain letter,digits,and underscores; \'no spaces or punction\'";
    }

    return true;
}


function validatePassword(pwd)
{
   if (pwd.length == 0)
   {
    return "Password is empty";
   }

   let pwdRegEx = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{6,}$/;
    
   if (!pwdRegEx.test(pwd))
   {
     return "Password must contain at least 6 characters,one digit and symbol";
   }
   
   return true;
   
     
}
function validateConfirmPassword(cpwd)
{
    var pwd = document.getElementById("password");
    var confirmpwd = document.getElementById("cpassword");
   
    if (cpwd.length == 0)
    {
        return "Confirm password is empty";
    }
    
    if (pwd.value !== confirmpwd.value)
    {
        return "Passwords do not match";
    }
    
    return true;

    
}

function validateFullName(name)
{    
    if (name.length == 0)
    {
        return "Fullname is empty";
    }


    let nameRegex = /^[A-Za-z ]+$/;

    if( !nameRegex.test(name))
    {
        return "Fullname should only contain letters";
    }

    return true;
}


function validateDateofBirth(dob)
{
   let dobRegEx = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;

   if (dob.length == 0)
    {
        return "Date of Birth is empty";
    }

    if (!dobRegEx.test(dob)) 
    {
          return "Date of Birth is not valid";
    }
        

    const inputDate = new Date(dob);
    const today = new Date();

    if (isNaN(inputDate.getTime()))
    {
           return "Date of Birth is not valid";
    } 
       

    if (inputDate > today)
    {
        return "Date of Birth is not valid";
    }

    return true;
}


function validateAvatar(photo)
{
    let avatarRegEx = /^(?!\s*$)([a-zA-Z0-9_\-./\\]+)\.(png|jpg|jpeg|gif)$/;
    if  (!avatarRegEx.test(photo))
    {
        return "No avatar selected";
    }

    return true;

}





// Handler Functions for Validation
function emailHandler(event)
{
    let mymail  = event.target.value;
    let err_mail = document.getElementById("error-text-email");
    let valResult = validateEmail(mymail);

    if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_mail.classList.add("hidden");
        err_mail.innerHTML = "";
        
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_mail.classList.remove("hidden");
        err_mail.innerHTML = valResult;
    }
}


function nickNameHandler(event)
{
    let nick_name  = event.target.value;
    let err_name = document.getElementById("error-text-name");
    let valResult = validateNickName(nick_name);

    if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_name.classList.add("hidden");
        err_name.innerHTML = "";
        
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_name.classList.remove("hidden");
        err_name.innerHTML = valResult;
    }
}

function passwordHandler(event)
{
    let password  = event.target.value;
    let err_pwd = document.getElementById("error-password");
    let valResult = validatePassword(password);

    if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_pwd.classList.add("hidden");
        err_name.innerHTML = "";
        
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_pwd.classList.remove("hidden");
        err_pwd.innerHTML = valResult;
    
    }
}

function confirmPwdHandler(event)
{
  let confirm_pass  = event.target.value;
    let err_cpwd = document.getElementById("error-cpassword");
    let valResult = validateConfirmPassword(confirm_pass);

    if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_cpwd.classList.remove("hidden");
        err_cpwd.textContent = "Passwords do match";
        err_cpwd.style.cssText = "color: green; font-size: 14px";
    
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_cpwd.classList.remove("hidden");
        err_cpwd.innerHTML = valResult;
         err_cpwd.style.cssText = "color: rgb(187, 18, 18); font-size: 14px";
    
    } 
}

function fullNameHandler(event)
{
    let f_name  = event.target.value;
    let err_fname = document.getElementById("error-text-fname");
    let valResult = validateFullName(f_name);

    if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_fname.classList.add("hidden");
        err_fname.innerHTML = "";
        
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_fname.classList.remove("hidden");
        err_fname.innerHTML = valResult;
    }
}


function dobHandler(event)
{
   let dBirth = event.target.value;
   let err_dob = document.getElementById("error-text-dob");
   let valResult = validateDateofBirth(dBirth);

   if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_dob.classList.add("hidden");
        err_dob.innerHTML = "";
        
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_dob.classList.remove("hidden");
        err_dob.innerHTML = valResult;
    }


}

function avatarHandler(event)
{
   let avatar = event.target.value;
   let err_avatar = document.getElementById("error-avatar");
   let valResult = validateAvatar(avatar);

   if(valResult === true)
    {
        event.target.classList.remove("invalid-box");
        err_avatar.classList.add("hidden");
        err_avatar.innerHTML = "";
        
    }
    else
    {
        event.target.classList.add("invalid-box");
        err_avatar.classList.remove("hidden");
        err_avatar.innerHTML = valResult;
    } 
}







// Function for validating entire LogIn form
function validateLogin(event)
{
    let email = document.getElementById("mymail");
    let pwd = document.getElementById("password");
    
    let formValid = true;

    //Displaying errors when user clicks submit
    emailHandler({ target: email });
    passwordHandler({ target: pwd });

    if (validateEmail(email.value) !== true) 
    {
        console.log("'" + email.value + "' is not a valid email");
		formValid = false;
	}
    
    if (validatePassword(pwd.value)!== true)
    {
        console.log("'" + pwd.value + "' is not a valid password");
		formValid = false;
	}

    if (!formValid) 
    {
	  event.preventDefault();
	}
	else 
    {
		console.log("Validation successful, sending data to the server");
	}

}


// Function for validating entire SignUp form
function validateSignUp(event) {

	let email = document.getElementById("mymail");
    let pwd = document.getElementById("password");
	let nic_name = document.getElementById("nickname");
    let cpwd = document.getElementById("cpassword");


	let formValid = true;

    //Displaying errors when user clicks submit
    emailHandler({ target: email });
    nickNameHandler({ target: nic_name });
    passwordHandler({ target: pwd });
    confirmPwdHandler({ target: cpwd });


	if (validateEmail(email.value) !== true) 
    {
        console.log("'" + email.value + "' is not a valid email");
		formValid = false;
	}

    if (validatePassword(pwd.value)!== true)
    {
        console.log("'" + pwd.value + "' is not a valid password");
		formValid = false;
	}

   if (validateNickName(nic_name.value)!== true)
    {
        console.log("'" + nic_name.value + "' is not a valid nickname ");
		formValid = false;
	}

    if (validateConfirmPassword(cpwd.value)!== true)
    {
        console.log("'" + cpwd.value + "' is not a valid password");
		formValid = false;
	}

	if (!formValid) 
    {
	  event.preventDefault();
	}
	else 
    {
		console.log("Validation successful, sending data to the server");
	}
}


// Function for validating entire UserInfo form
function validateUserInfo(event)
{
    let fname = document.getElementById("fullname");
    let pwd = document.getElementById("password");
    let dBirth = document.getElementById("dob");
    let nic_name = document.getElementById("nickname");
    let photo = document.getElementById("avatar");
    
    let formValid = true;

    //Displaying errors when user clicks submit
    
    fullNameHandler({ target: fname })
    nickNameHandler({ target: nic_name });
    passwordHandler({ target: pwd });
    dobHandler({ target: dBirth });
    avatarHandler({ target: photo });



    if (validateFullName(fname.value)!== true)
    {
        console.log("'" + fname.value + "' is not a valid fullname ");
		formValid = false;
	}

    if (validateNickName(nic_name.value)!== true)
    {
        console.log("'" + nic_name.value + "' is not a valid nickname ");
		formValid = false;
	}

    
    
    if (validatePassword(pwd.value)!== true)
    {
        console.log("'" + pwd.value + "' is not a valid password");
		formValid = false;
	}

    if (validateDateofBirth(dBirth.value)!== true)
    {
        console.log("'" + dBirth.value + "' is not a valid date of birth");
		formValid = false;
	}

    if (validateAvatar(photo.value)!== true)
    {
        console.log("'" + photo.value + "' is not a valid avatar");
		formValid = false;
	}


    if (!formValid) 
    {
	  event.preventDefault();
	}
	else 
    {
		console.log("Validation successful, sending data to the server");
	}

}
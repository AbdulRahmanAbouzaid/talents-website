const name = document.querySelector("#name");
const userName = document.querySelector("#userName");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#confirmPassword");
const form = document.querySelector("#form");

document
  .getElementById("submit-btn")
  .addEventListener("click", function(event) {
    //event.preventDefault();
  });

// Name Validation
function nameV() {
  if (name.value == null || name.value == "" || name.value.length < 5) {
    document.querySelector("#nameHelp").textContent =
      "You should enter your Name";
    document.querySelector("#nameHelp").classList.add("important");
  }
}

function defultname() {
  document.querySelector("#nameHelp").textContent =
    "please enter your Correct name.";
  document.querySelector("#nameHelp").classList.remove("important");
}

// Username Validation
function userV() {
  if (userName.value == "" || userName.value == null) {
    document.querySelector("#userNameHelp").textContent =
      "please enter your User name.";
    document.querySelector("#userNameHelp").classList.add("important");
  } else if (userName.value.length < 5 || userName.value.length > 15) {
    document.querySelector("#userNameHelp").textContent =
      "User name min 5 charachter , max 15 charachter";
    document.querySelector("#userNameHelp").classList.add("important");
  }
}

function defultuser() {
  document.querySelector("#userNameHelp").textContent =
    "please enter your Uniqe User name.";
  document.querySelector("#userNameHelp").classList.remove("important");
}

//Email Validation
function validateEmail(email2) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email2);
}

function emailV() {
  var result = document.querySelector("#emailHelp");
  var email2 = email.value;

  if (validateEmail(email2)) {
    result.textContent = ` ${email2}  is valid :)`;
    result.classList.add("right");
  } else {
    result.textContent = `${email2}  is not valid :(`;
    result.classList.add("important");
  }
  return false;
}

function defultemail() {
  document.querySelector("#emailHelp").textContent =
    "We'll never share your email with anyone else.";
  document.querySelector("#emailHelp").classList.remove("important", "right");
}

//Password Validation

let password2 = password.value;
let userName2 = userName.value
let confirmPassword2 = confirmPassword.value

function passwordV() {
  let re1 = /[0-9]/;    
      re2 = /[a-z]/;
      re3 = /[A-Z]/;


  if (password.value == null || password.value =="") {
    document.querySelector("#passwordHelp").textContent =
      "Error: Password must be rigtten!";
    document.querySelector("#passwordHelp").classList.add("important");
  }
  else if (password.value.length < 6) {
    document.querySelector("#passwordHelp").textContent =
      "Error: Password must contain at least six characters!";
    document.querySelector("#passwordHelp").classList.add("important");
  }
  else if (password.value == userName2) {
    document.querySelector("#passwordHelp").textContent =
      "Error: Password must be different from Username!";
    document.querySelector("#passwordHelp").classList.add("important");
  }
  else if (!re1.test(password.value)) {
    document.querySelector("#passwordHelp").textContent =
      "Error: password must contain at least one number (0-9)!";
    document.querySelector("#passwordHelp").classList.add("important");
  }
  else if (!re2.test(password.value)) {
    document.querySelector("#passwordHelp").textContent =
      "Error: password must contain at least one lowercase letter (a-z)!";
    document.querySelector("#passwordHelp").classList.add("important");
  }
  else if (!re3.test(password.value)) {
    document.querySelector("#passwordHelp").textContent =
      "Error: password must contain at least one uppercase letter (A-Z)!";
    document.querySelector("#passwordHelp").classList.add("important");
  }
}

function defultpassword() {
  document.querySelector("#passwordHelp").textContent =
    "Enter your password";
  document.querySelector("#passwordHelp").classList.remove("important");
}


function passwordVC(){
  if (confirmPassword2 == password2 ){
    document.querySelector("#passwordConfirmHelp").textContent =
      "Thanks for confirming your password";
    document.querySelector("#passwordConfirmHelp").classList.add("right")
    } else if (!confirmPassword2 == password2 ) {
    document.querySelector("#passwordConfirmHelp").textContent =
      "Must be the same password";
    document.querySelector("#passwordConfirmHelp").classList.add("important")
  }
}

function defultpasswordC() {
  document.querySelector("#passwordConfirmHelp").textContent =
    "Confirm your password";
  document.querySelector("#passwordConfirmHelp").classList.remove("important");
}

//Talend Drop Down
function talendM() {
  let mmm = document.getElementById('careerM')
  let a = mmm.selectedIndex

  let bbb = document.getElementById('talendMenue')

  if (mmm.options[a].value==2){
    bbb.classList.remove("displayNO");
    
  }
  else if (mmm.options[a].value == 1||mmm.options[a].value == 3 || mmm.options[a].value== 4){
    bbb.classList.add("displayNO");
  }
}

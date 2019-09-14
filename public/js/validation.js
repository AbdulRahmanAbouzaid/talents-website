const name = document.querySelector("#name");
const userName = document.querySelector("#userName");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#confirmPassword");
const form = document.querySelector("#form");

document
  .getElementById("submit-btn")
  .addEventListener("click", function(event) {
    event.preventDefault();
  });

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

function userV() {
  for (var i = 0; i < userName.value.length; i++) {
    if (
      !(userName.value.charAt(i) >= "0" && userName.value.charAt(i) <= "9") ||
      (userName.value.charAt(i) >= "a" && userName.value.charAt(i) <= "z") ||
      (userName.value.charAt(i) >= "A" && userName.value.charAt(i) <= "Z")
    ) {
      document.querySelector("#userNameHelp").textContent =
        "username must be made of characters and numbers only";
      document.querySelector("#userNameHelp").classList.add("important");
    }
  }
}

function defultuser() {
  document.querySelector("#userNameHelp").textContent =
    "please enter your Uniqe User name.";
  document.querySelector("#userNameHelp").classList.remove("important");
}

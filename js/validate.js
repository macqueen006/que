
/********************************************** USER REGISTRATION VALIDATIONS **************************************************** */

// Focus Password Field
function checkp() {
  firstNote.style.display = "none";
  firstLess.style.display = "none";
  firstWarn.style.display = "none";
  document.getElementById('firstname').style = "border-bottom: 1px solid gray;";
  lastNote.style.display = "none";
  lastLess.style.display = "none";
  lastWarn.style.display = "none";
  document.getElementById('lastname').style = "border-bottom: 1px solid gray;";
  userNote.style.display = "none";
  userLess.style.display = "none";
  document.getElementById('username').style = "border-bottom: 1px solid gray;";
  telNote.style.display = "none";
  telWarn.style.display = "none";
  document.getElementById('phone').style = "border-bottom: 1px solid gray;";
  emailNote.style.display = "none";
  emailWarn.style.display = "none";
  document.getElementById('email').style = "border-bottom: 1px solid gray;";
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const password = document.getElementById('password').value;
  const passNote = document.getElementById('passNote');
  const passWarn = document.getElementById('passWarn');
  const pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,30}$/;

  if (password.match(pass)) {
    passNote.style.display = "none";
    passWarn.style.display = "none";
    document.getElementById('password').style = "border-bottom: 2px solid green;";
  }
  else {
    passWarn.style.display = "none";
    passNote.style = "display:inherit;";
    document.getElementById('password').style = "border-bottom: 2px solid gold;";
  }
}

// Focus Firstname Field
function checkf() {
  lastNote.style.display = "none";
  lastLess.style.display = "none";
  lastWarn.style.display = "none";
  document.getElementById('lastname').style = "border-bottom: 1px solid gray;";
  userNote.style.display = "none";
  userLess.style.display = "none";
  document.getElementById('username').style = "border-bottom: 1px solid gray;";
  telNote.style.display = "none";
  telWarn.style.display = "none";
  document.getElementById('phone').style = "border-bottom: 1px solid gray;";
  emailNote.style.display = "none";
  emailWarn.style.display = "none";
  document.getElementById('email').style = "border-bottom: 1px solid gray;";
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const firstname = document.getElementById('firstname').value;
  const firstNote = document.getElementById('firstNote');
  const firstLess = document.getElementById('firstLess');
  const firstWarn = document.getElementById('firstWarn');
  const fname = /^[A-Z][a-z]+$/;

  if (firstname.match(fname)) {
    firstNote.style.display = "none";
    firstLess.style.display = "none";
    firstWarn.style.display = "none";
    document.getElementById('firstname').style = "border-bottom: 2px solid green;";
  }
  else {
    firstLess.style.display = "none";
    firstWarn.style.display = "none";
    firstNote.style = "display:inherit;";
    document.getElementById('firstname').style = "border-bottom: 2px solid gold;";
  }
}

// Focus Lastname Field
function checkl() {
  firstNote.style.display = "none";
  firstLess.style.display = "none";
  firstWarn.style.display = "none";
  document.getElementById('firstname').style = "border-bottom: 1px solid gray;";
  userNote.style.display = "none";
  userLess.style.display = "none";
  document.getElementById('username').style = "border-bottom: 1px solid gray;";
  telNote.style.display = "none";
  telWarn.style.display = "none";
  document.getElementById('phone').style = "border-bottom: 1px solid gray;";
  emailNote.style.display = "none";
  emailWarn.style.display = "none";
  document.getElementById('email').style = "border-bottom: 1px solid gray;";
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const lastname = document.getElementById('lastname').value;
  const lastNote = document.getElementById('lastNote');
  const lastLess = document.getElementById('lastLess');
  const lastWarn = document.getElementById('lastWarn');
  const lname = /^[A-Z][a-z]+$/;

  if (lastname.match(lname)) {
    lastNote.style.display = "none";
    lastLess.style.display = "none";
    lastWarn.style.display = "none";
    document.getElementById('lastname').style = "border-bottom: 2px solid green;";
  }
  else {
    lastLess.style.display = "none";
    lastWarn.style.display = "none";
    lastNote.style = "display:inherit;";
    document.getElementById('lastname').style = "border-bottom: 2px solid gold;";
  }
}

// Focus Tel Field
function checkt() {
  firstNote.style.display = "none";
  firstLess.style.display = "none";
  firstWarn.style.display = "none";
  document.getElementById('firstname').style = "border-bottom: 1px solid gray;";
  lastNote.style.display = "none";
  lastLess.style.display = "none";
  lastWarn.style.display = "none";
  document.getElementById('lastname').style = "border-bottom: 1px solid gray;";
  emailNote.style.display = "none";
  emailWarn.style.display = "none";
  document.getElementById('email').style = "border-bottom: 1px solid gray;";
  userNote.style.display = "none";
  userLess.style.display = "none";
  document.getElementById('username').style = "border-bottom: 1px solid gray;";
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const tel = document.getElementById('phone').value;
  const telNote = document.getElementById('telNote');
  const phoneno = /^\d{11}$/;

  if (tel.match(phoneno)) {
    telWarn.style.display = "none";
    telNote.style.display = "none";
    document.getElementById('phone').style = "border-bottom: 2px solid green;";
  }
  else {
    telWarn.style.display = "none";
    telNote.style = "display:inherit;";
    document.getElementById('phone').style = "border-bottom: 2px solid gold;";
  }
}

// Focus Email Field
function checke() {
  firstNote.style.display = "none";
  firstLess.style.display = "none";
  firstWarn.style.display = "none";
  document.getElementById('firstname').style = "border-bottom: 1px solid gray;";
  lastNote.style.display = "none";
  lastLess.style.display = "none";
  lastWarn.style.display = "none";
  document.getElementById('lastname').style = "border-bottom: 1px solid gray;";
  telNote.style.display = "none";
  telWarn.style.display = "none";
  document.getElementById('phone').style = "border-bottom: 1px solid gray;";
  userNote.style.display = "none";
  userLess.style.display = "none";
  document.getElementById('username').style = "border-bottom: 1px solid gray;";
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const email = document.getElementById('email').value;
  const emailNote = document.getElementById('emailNote');
  const emailWarn = document.getElementById('emailWarn');
  const phoneno = /^\d{11}$/;

  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    emailWarn.style.display = "none";
    emailNote.style.display = "none";
    document.getElementById('email').style = "border-bottom: 2px solid green;";
  }
  else {
    emailWarn.style.display = "none";
    emailNote.style = "display:inherit;";
    document.getElementById('email').style = "border-bottom: 2px solid gold;";
  }
}

// Focus Username Field
function checku() {
  firstNote.style.display = "none";
  firstLess.style.display = "none";
  firstWarn.style.display = "none";
  document.getElementById('firstname').style = "border-bottom: 1px solid gray;";
  lastNote.style.display = "none";
  lastLess.style.display = "none";
  lastWarn.style.display = "none";
  document.getElementById('lastname').style = "border-bottom: 1px solid gray;";
  telNote.style.display = "none";
  telWarn.style.display = "none";
  document.getElementById('phone').style = "border-bottom: 1px solid gray;";
  emailNote.style.display = "none";
  emailWarn.style.display = "none";
  document.getElementById('email').style = "border-bottom: 1px solid gray;";
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const username = document.getElementById('username').value;
  const userNote = document.getElementById('userNote');
  const userLess = document.getElementById('userLess');
  const uname = /^[0-9a-zA-Z-_]+$/;

  if (username.match(uname)) {
    userNote.style.display = "inherit";
    userLess.style.display = "none";
    document.getElementById('username').style = "border-bottom: 2px solid green;";
  }
  else {
    userLess.style.display = "none";
    userNote.style = "display:inherit;";
    document.getElementById('username').style = "border-bottom: 2px solid gold;";
  }
}

// Focus Confirm Password Field
function checkcp() {
  firstNote.style.display = "none";
  firstLess.style.display = "none";
  firstWarn.style.display = "none";
  document.getElementById('firstname').style = "border-bottom: 1px solid gray;";
  lastNote.style.display = "none";
  lastLess.style.display = "none";
  lastWarn.style.display = "none";
  document.getElementById('lastname').style = "border-bottom: 1px solid gray;";
  userNote.style.display = "none";
  userLess.style.display = "none";
  document.getElementById('username').style = "border-bottom: 1px solid gray;";
  telNote.style.display = "none";
  telWarn.style.display = "none";
  document.getElementById('phone').style = "border-bottom: 1px solid gray;";
  emailNote.style.display = "none";
  emailWarn.style.display = "none";
  document.getElementById('email').style = "border-bottom: 1px solid gray;";
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";

  const password = document.getElementById('password').value;
  const cpassword = document.getElementById('cpassword').value;
  const passMatch = document.getElementById('passMatch');

  if (!cpassword == password) {
    passMatch.style.display = "none";
    document.getElementById('cpassword').style = "border-bottom: 2px solid gold;";
  }
  else {
    passMatch.style.display = "none";
    document.getElementById('cpassword').style = "border-bottom: 2px solid gold;";
  }
}

// Validate Firstname Field
function fname() {
  var firstname = document.getElementById('firstname').value;
  var firstNote = document.getElementById('firstNote');
  var firstLess = document.getElementById('firstLess');
  var firstWarn = document.getElementById('firstWarn');
  var fname = /^[A-Z][a-z]+$/;

  if (firstname.length < 2) {
    firstNote.style.display = "none";
    firstWarn.style.display = "none";
    firstLess.style = "display:inherit;color:red;";
    document.getElementById('firstname').style = "border-bottom: 2px solid red;";
  }
  else if (!firstname.match(fname)) {
    firstNote.style.display = "none";
    firstLess.style.display = "none";
    firstWarn.style = "display:inherit;color:red;";
    document.getElementById('firstname').style = "border-bottom: 2px solid red;";
  }
  else if (firstname.length >= 2) {
    firstNote.style.display = "none";
    firstWarn.style.display = "none";
    firstLess.style.display = "none";
    document.getElementById('firstname').style = "border-bottom: 2px solid green;";
  }
}

// Validate Lastname Field
function lname() {
  var lastname = document.getElementById('lastname').value;
  var lastNote = document.getElementById('lastNote');
  var lastLess = document.getElementById('lastLess');
  var lastWarn = document.getElementById('lastWarn');
  var lname = /^[A-Z][a-z]+$/;

  if (lastname.length < 2) {
    lastNote.style.display = "none";
    lastWarn.style.display = "none";
    lastLess.style = "display:inherit;color:red;";
    document.getElementById('lastname').style = "border-bottom: 2px solid red;";
  }
  else if (!lastname.match(lname)) {
    lastNote.style.display = "none";
    lastLess.style.display = "none";
    lastWarn.style = "display:inherit;color:red;";
    document.getElementById('lastname').style = "border-bottom: 2px solid red;";
  }
  else if (lastname.length >= 2) {
    lastNote.style.display = "none";
    lastWarn.style.display = "none";
    lastLess.style.display = "none";
    document.getElementById('lastname').style = "border-bottom: 2px solid green;";
  }
}

// Validate Email Field
function e_mail() {
  var email = document.getElementById('email').value;
  var emailWarn = document.getElementById('emailWarn');
  var emailNote = document.getElementById('emailNote');

  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    emailNote.style.display = "none";
    emailWarn.style.display = "none";
    document.getElementById('email').style = "border-bottom: 2px solid green;";
  }
  else {
    emailNote.style.display = "none";
    emailWarn.style = "display:inherit;color:red;";
    document.getElementById('email').style = "border-bottom: 2px solid red;";
  }
}

// Validate Phone Field
function p_hone() {
  var phone = document.getElementById('phone').value;
  var telWarn = document.getElementById('telWarn');
  var telNote = document.getElementById('telNote');
  var phoneno = /^\d{11}$/;

  if (!phone.match(phoneno)) {
    telNote.style.display = "none";
    telWarn.style = "display:inherit;color:red;"
    document.getElementById('phone').style = "border-bottom: 2px solid red;";
  }
  else {
    telNote.style.display = "none";
    telWarn.style.display = "none";
    document.getElementById('phone').style = "border-bottom: 2px solid green;";
  }
}

// Validate Username Field
function uname() {
  var username = document.getElementById('username').value;
  var uname = /^[0-9a-zA-Z-_]+$/;
  var userNote = document.getElementById('userNote');
  var userLess = document.getElementById('userLess');

  if (username.length < 5) {
    userNote.style.display = "none";
    userLess.style = "display:inherit;color:red;"
    document.getElementById('username').style = "border-bottom: 2px solid red;";
  }
  else if (username.length < 1) {
    userNote.style.display = "none";
    userLess.style.display = "none";
    document.getElementById('username').style = "border-bottom: 2px solid gold;";
  }
  else if (!username.match(uname)) {
    userLess.style.display = "none";
    userNote.style = "display:inherit;color:red;"
    document.getElementById('username').style = "border-bottom: 2px solid red;";
  }
  else if (username.length >= 5) {
    userNote.style.display = "none";
    userLess.style.display = "none";
    document.getElementById('username').style = "border-bottom: 2px solid green;";
  }
}

// Validate Password Field
function pass() {
  var password = document.getElementById('password').value;
  var pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,30}$/;
  var passNote = document.getElementById('passNote');
  var passWarn = document.getElementById('passWarn');

  if (!password.match(pass)) {
    passNote.style.display = "none";
    passWarn.style = "display:inherit;color:red;"
    document.getElementById('password').style = "border-bottom: 2px solid red;";
  }
  else {
    passWarn.style.display = "none";
    document.getElementById('password').style = "border-bottom: 2px solid green;";
  }
}

// Validate Confirm Password Field
function cpass() {
  var password = document.getElementById('password').value;
  var cpassword = document.getElementById('cpassword').value;
  var passMatch = document.getElementById('passMatch');

  if (cpassword === password) {
    passMatch.style.display = "none";
    document.getElementById('cpassword').style = "border-bottom: 2px solid green;";
  }
  else {
    passMatch.style = "display:inherit;color:red;"
    document.getElementById('cpassword').style = "border-bottom: 2px solid red;";
  }
}

// Displaying Register Button
function accepts() {
  if (document.getElementById('accept').checked) {
    $(document).ready(show);
    function show() {
      $('#bit').fadeIn(2000);
    }
  }
  else {
    $(document).ready(hide);
    function hide() {
      $('#bit').fadeOut(2000);
    }
  }
}

/**************************** USER REGISTRATION VALIDATION END **************************************************************** */

// Recover Email Validation
function recovE() {
  const email = document.getElementById('email').value;
  const emailNote = document.getElementById('emailNote');
  const emailWarn = document.getElementById('emailWarn');
  const phoneno = /^\d{11}$/;

  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    emailWarn.style.display = "none";
    emailNote.style.display = "none";
    document.getElementById('email').style = "border-bottom: 2px solid green;";
  }
  else {
    emailWarn.style.display = "none";
    emailNote.style = "display:inherit;";
    document.getElementById('email').style = "border-bottom: 2px solid gold;";
  }
}

// Recover New Password Validation
function recovP() {
  passMatch.style.display = "none";
  document.getElementById('cpassword').style = "border-bottom: 1px solid gray;";

  const password = document.getElementById('password').value;
  const passNote = document.getElementById('passNote');
  const passWarn = document.getElementById('passWarn');
  const pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,30}$/;

  if (password.match(pass)) {
    passNote.style.display = "none";
    passWarn.style.display = "none";
    document.getElementById('password').style = "border-bottom: 2px solid green;";
  }
  else {
    passWarn.style.display = "none";
    passNote.style = "display:inherit;";
    document.getElementById('password').style = "border-bottom: 2px solid gold;";
  }
}

// Recover Confirm New Password Validation
function recovC() {
  passNote.style.display = "none";
  passWarn.style.display = "none";
  document.getElementById('password').style = "border-bottom: 1px solid gray;";

  const password = document.getElementById('password').value;
  const cpassword = document.getElementById('cpassword').value;
  const passMatch = document.getElementById('passMatch');

  if (!cpassword == password) {
    passMatch.style.display = "none";
    document.getElementById('cpassword').style = "border-bottom: 2px solid gold;";
  }
  else {
    passMatch.style.display = "none";
    document.getElementById('cpassword').style = "border-bottom: 2px solid gold;";
  }
}

/*********************************** USER PROFILE VALIDATIONS ********************************************************* */

// function Phone Validate
function uPhone() {

}
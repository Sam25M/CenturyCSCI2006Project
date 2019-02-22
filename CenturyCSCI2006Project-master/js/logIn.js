//Modify to only check login input for proper input. Use PHP to match username and password.
window.addEventListener('submit', testLogin);

function testLogin(e){
  e.preventDefault();

  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var token = 1;

  for(var i=0; i < authUsers.length; i++) {
        if(username.toLowerCase() == authUsers[i].username && password.toLowerCase() == authUsers[i].password) {
          token = 0;
          window.localStorage.setItem("user", username);
          alert(username + " Is logged in!");
          window.location.assign("myAccount.html");
      }
    }
    if(token == 1){
      alert("You have entered an incorrect user name or password");
      document.getElementById("logInForm").reset();
    }
}

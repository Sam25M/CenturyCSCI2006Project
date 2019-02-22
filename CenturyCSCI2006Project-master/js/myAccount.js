//Modify or replace with php.
$(function(){
  var accountKey = window.localStorage.getItem("user");
  for(var i in authUsers){
    if(accountKey == authUsers[i].username){
      var tmp = "Welcome " + authUsers[i].firstName + " " + authUsers[i].lastName;
      $('#welcomeUser').text(tmp);
    }
  }
});

//Won't work anymore. Change or replace with php.
window.addEventListener("load", function(){
  document.getElementById("indexPageBtn").addEventListener("click", goToInstructorPage);
});

function goToInstructorPage(){
  var page = document.getElementById('instructorOptions').value;
  if(page != 'placeholder'){
    window.location = page;
  }
}

// slightly sloppy way of disabling/enabling textbox
function unhide(){
  document.getElementById("otherbox").disabled = false;
}

function hide(){
  document.getElementById("otherbox").disabled = true;
}

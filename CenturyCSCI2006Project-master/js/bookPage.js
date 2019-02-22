//Will probably need to be modified.
$(document).ready(function(){
  $("#newButton").on("click", addNewToCart);
  $("#usedButton").on("click", addUsedToCart);
});

function addNewToCart(){
  var key = "new";
  var cartTmp = window.localStorage.getItem("cart");
  console.log("cartTmp:"+cartTmp);
  bookStr = getBookData(key);
  console.log("bookStr:"+bookStr);
  if(cartTmp != null && cartTmp.length>0){
    cartTmp += bookStr;
    console.log("new cart:"+cartTmp);
    window.localStorage.setItem("cart", cartTmp);
  }else {
    window.localStorage.setItem("cart", bookStr);
  }
  $("#newButton").attr("disabled", "disabled");
  $("#usedButton").attr("disabled", "disabled");
}
function addUsedToCart(){
  var key = "used";
  var cartTmp = window.localStorage.getItem("cart");
  console.log("cartTmp:"+cartTmp);
  var bookStr = getBookData(key);
  console.log("bookStr:"+bookStr);
  if(cartTmp != null && cartTmp.length>0){
    cartTmp += bookStr;
    console.log("new cart:"+cartTmp);
    window.localStorage.setItem("cart", cartTmp);
  }else {
    window.localStorage.setItem("cart", bookStr);
  }
  $("#newButton").attr("disabled", "disabled");
  $("#usedButton").attr("disabled", "disabled");
}
function getBookData(key){
  var bTitle = $("#bTitle").text();
  var bAuthor = $("#bAuthor").text();
  if(key == "new"){
    var bPrice = $("#bNewPrice").text();
    bPrice = processPrice(bPrice);
    console.log("bPrice(processed):"+bPrice);
  }else {
    var bPrice = $("#bUsedPrice").text();
    bPrice = processPrice(bPrice);
    console.log("bPrice(processed):"+bPrice);
  }
  var bStr = bTitle + "," + bPrice + "/";
  console.log("bStr:"+bStr);
  return bStr;
}
function processPrice(price){
  var tmp = price.split(" ");
  console.log("tmp[0] tmp[1]:"+tmp[0]+ " " + tmp[1]);
  return tmp[1];
}

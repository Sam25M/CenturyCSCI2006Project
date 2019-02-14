$(document).ready(function(){
  var pageTitle = document.title;
  console.log(pageTitle);
  var cart = window.localStorage.getItem("cart");
  if(cart != null && cart.length>0){
    fillTable();
  }else {
    emptyTable();
  }
  if(pageTitle == "Cart"){
    $("#emptyBtn").on("click", function(){
      window.localStorage.clear();
      window.location.reload();
    });
  }
});

function fillTable(){
  var tableHead = "<thead><tr><th>Book</th><th>Price</th></tr></thead>";
  var tableBody = "<tbody>";
  tableBody += tableRow();
  tableBody += totalRow();
  tableBody += "</tbody>";
  $("#cartTable").html(tableHead + tableBody);
}
function tableRow(){
  var tRow = "";
  tRow += getBooks();
  console.log(tRow);
  return tRow;
}
function getBooks(){
  var arr = getArr();
  var tmp = "";
  console.log(arr.length);
  for(var i=0; i<arr.length; i++){
    console.log("getBooks for loop:"+arr[i]);
    tmp += "<tr>";
    tmp += getData(arr[i]);
    tmp += "</tr>";
  }
  console.log(tmp);
  return tmp;
}
function getArr(){
  var tmp = window.localStorage.getItem("cart");
  var tmpArr = tmp.split("/");
  tmpArr.pop();
  for(var i in tmpArr){
    console.log("getArr:"+tmpArr[i]);
  }
  return tmpArr;
}
function getData(k){
  var tmp = k.split(",");
  var num = parseInt(tmp[1]);
  var rStr = "<td>" + tmp[0] + "</td><td>$" + num.toFixed(2) + "</td>";
  return rStr;
}
function totalRow(){
  var totalRow = "<tr><td>Total</td><td>$";
  var total = calcTotal();
  totalRow += total;
  totalRow += "</td></tr>";
  return totalRow;
}
function calcTotal(){
  var tValue = 0;
  var tmpArr = getArr();
  for(var i=0; i<tmpArr.length; i++){
    var secArr = tmpArr[i].split(",");
    var num = parseInt(secArr[1]);
    console.log(num + ":" + i);
    tValue += num;
  }
  console.log(tValue);
  return tValue.toFixed(2);
}
function emptyTable(){
  var tableHead = "<thead><tr><th>Book</th><th>Price</th></tr></thead>";
  var tableBody = "<tbody>";
  tableBody += "<tr><td colspan=\"2\">Cart is empty</td></tr>";
  tableBody += "</tbody>";
  $("#cartTable").html(tableHead + tableBody);
}

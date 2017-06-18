$(document).ready(function(){
  $('#cButton').click(function(){
      $('#Material').val(' ');
  });


});

function postCustomer()
{
var customerName = document.getElementById("Material").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "customer_name=" + customerName;
     xhr.open("POST", "data.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
   xhr.onreadystatechange = display_data;
  function display_data() {
   if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);    
    document.getElementById("status_text").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
  }
}
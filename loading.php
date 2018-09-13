<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
 session_start();
$username=$_SESSION["useremail"];
$password=$_SESSION["password"];
 ?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" onload="updateDB();">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 </head>
 <body class="col-md-12" onload="updateDB();">

 <div id="display-resources">

 </div>

 </body>
 <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <div class="col-md-6 col-md-offset-4">
 <img src="images/for_loading.gif" style="width:  47%;padding-top:  12%;" >
 </div>

 <script>
function updateDB() {
 $(document).ready(function () {

 var displayResources = $('#display-resources');


 $.ajax({
    url: "https://pavlok-mvp.herokuapp.com/api/v1/sign_in?grant_type=password&username=<?php  echo $username;?>&password=<?php  echo $password;?>",
    type: "POST",
    crossDomain: true,
    dataType: "json",
  success: function(result)
 {

 var output="<table><thead><tr><th>Acess Token</th><th>Acess Token Type</th><th>Refresh Token</th></thead><tbody>";

 output+="<tr><td>" + result.user.id + "</td><td>" + result.access_token + "</td><td>" + result.refresh_token + "</td></tr>";

 output+="</tbody></table>";
 var newdd=result.access_token;

  window.location = 'admin/index.php?token='+newdd;
 console.log(newdd);

 $("table").addClass("table");
},
error: function(result) {
  alert("Worng Username or Password");
  window.location = 'login.php';
                successmessage = 'Error';
                $("label#successmessage").text(successmessage);
            },

 });

});
}
 </script>
</html>

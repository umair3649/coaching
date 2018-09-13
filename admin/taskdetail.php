<?php
session_start();
if(isset($_GET["token"]))
{
  $_SESSION["acess_token"]=$_GET["token"];
?>
<script>
  window.location = 'index.php';
</script>
<?php
}

if(isset($_SESSION["acess_token"]))
{
  $acess_token=$_SESSION["acess_token"];

}
$task_id= $_POST["t_id"];
$task_name= $_POST["t_name"];
$task_description= $_POST["t_description"];
$task_due_time= $_POST["t_due_time"];
$task_starred= $_POST["t_starred"];
$task_media_url= $_POST["t_media_url"];
$task_comment= $_POST["t_comment"];
$task_completed_at= $_POST["t_completed_at"];
// echo $task_id."<br>";
// echo $task_name."<br>";
// echo $task_description."<br>";
// echo $task_due_time."<br>";
// echo $task_starred."<br>";
// echo $task_media_url."<br>";
// echo $task_comment."<br>";
// echo $task_completed_at."<br>";
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$page_directory = dirname($actual_link);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Coaching App</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="css/animate.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<style>
.addBtn
{
  width: 40px;
  float: right;
  background: linear-gradient(to top right, #769BFF , #73A5EB ,#91C9E8 );
  text-align: center;
  color: white;
  height: auto;
  border-radius: 50%;
  font-size: 27px;
  margin-top: -10px;
}
.typeline
{
	    border: none;
    border-bottom-style: solid;
    border-color: #548fd6;
    border-width: 1px;
}
td
{
  text-align: center;
}
th
{
  text-align: center;
}
img
{
     margin-top: -4px;
}

span{
  font-size: 156px;
}
.checkbox
{
  margin-top: 10px;
margin-bottom: -9px;
}
.custmdiv
{
  margin-top: 0%;
      margin-bottom: 9px;
      border-width: 1px;
      -webkit-box-shadow: 1px 2px 1px 3px rgba(0, 0, 0, 0.24);
      border-radius: 5px;
      padding-top: 14px;
      background: #f8f8f8;
}
.checkbox label:after,
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
  position: relative;
  display: inline-block;
  border: 1px solid #ffffff;
  border-radius: 50%;
  width: 80px;
  height: 80px;
  text-align: center;
  vertical-align: middle;
  margin: 30% 0 0 25%;
}

.radio .cr {
    border-radius: 50%;
}
.fortextarea
{
    height: 120px;
    background: linear-gradient(to right, #7c9df7 , #73A5EB ,#8CC3E9 );
    border: none;
    color: white;
}
.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
  position: absolute;
    font-size: 75px;
    line-height: 0;
    top: 50%;
    left: 0;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-80deg);
    opacity: 0;
    transition: all .4s ease-in;
        color: #7ED321;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}
.licls
{
  font-size: 16px;
  background: linear-gradient(to top right, #1e3f98 , #326dbf ,#91C9E8 );
  border-radius: 50%;
  width: 23px;
  text-align: center !important;
  color: white;
  float: left;

}
h3{
  color: #3c57a7;
  font-size:1vw;
}
.uprbox{
  background: linear-gradient(to right, #769BFF , #73A5EB ,#91C9E8 );
padding-top: 1%;
border-radius: 11px;
    height: 200px;
}
#myInput::-webkit-input-placeholder {
  color: transparent;
  text-indent: -9999px;
  background-image: url("images/page_1.png");
  background-position: 0 50%;
  height: 115px;
  width: 100%;
  background-repeat: no-repeat;
}
#myInput::-moz-placeholder {
  /* Firefox 19+ */
  color: transparent;
  text-indent: -9999px;
  background-image: url("images/page_1.png");
  background-position: 0 50%;
  background-repeat: no-repeat;
}
#myInput:-moz-placeholder {
  /* Firefox 18- */
  color: transparent;
  text-indent: -9999px;
  background-image: url("images/page_1.png");
  background-position: 0 50%;
  background-repeat: no-repeat;
}
#myInput:-ms-input-placeholder {
  /* IE 10- */
  color: transparent;
  text-indent: -9999px;
  background-image: url("http://placehold.it/123x17&text=PlaceholderImage");
  background-position: 0 50%;
  background-repeat: no-repeat;
}
</style>
</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
       <?php
	   include("nav.php");
	   ?>

<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <!-- <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>New Tasks</h5>

                </div>
                <div class="ibox-content">
                    <!-- <div id='external-events'>
                        <p>Drag a task and drop into callendar.</p>
                        <div class='external-event navy-bg'>Go to shop and buy some products.</div>
                        <div class='external-event navy-bg'>Check the new CI from Corporation.</div>
                        <div class='external-event navy-bg'>Send documents to John.</div>
                        <div class='external-event navy-bg'>Phone to Sandra.</div>
                        <div class='external-event navy-bg'>Chat with Michael.</div>

                    </div> -->
                      <!-- <div id='external-events'>
<php   $ch = curl_init("http://pavlok-stage.herokuapp.com/api/v2/tasks/tasks?access_token=75b94d45b6c806ce37ae8de6974d50d6c73f9925f4cd80396cd0e531017fe5e3&user_date=2018-07-31"); // add your url which contains json file
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $content = curl_exec($ch);
  curl_close($ch);
  $json = json_decode($content, true);
  //print_R($json);
  $count=count($json);


  for($i=0;$i<$count;$i++)
  {
    echo"<div class='external-event navy-bg'>".$json[$i]['description']."</div>";
  }
   ?>  </div> -->
                <!-- </div>
            </div>

        </div> -->


        <div class="col-lg-10 col-md-offset-1">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $task_name; ?> </h5>
  <a onclick="fordeltask()">  <img src="images/delete.png" class="img-responsive" style="float: right;margin-top: -10px;"/></a>
                </div>
                <div class="col-md-12 m-t m-l">

                <div class="col-md-3 col-sm-6 m-t uprbox col-md-offset-1">
                  <div class="col-md-12">

                  <b class="licls">1</b>
                  <h3 class="col-md-10"> Did you complete the task?</h3>
                  </div>
                  <div class="checkbox col-md-offset-1">
                    <div class="col-md-12">
                      <div class="col-md-offset-1">
                      <label style="font-size: 1.5em">

                          <input type="checkbox" class="svcomplete" style="border-radius:  50%;">
                          <span class="cr"><i class="cr-icon fa fa-check"></i></span>

                      </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 m-t uprbox m-l">
                  <div class="col-md-12">

                  <b class="licls">2</b>
                  <h3 class="col-md-10">Add a photo? (Optional)</h3>
                  </div>

                  <div class="box">
                <input type='file' onchange="readURL(this);" class="img1 m-t m-b" style="color: transparent;display: inherit;" />
              </div>
                <div class="checkbox col-md-offset-2">

                      <label style="font-size: 1.5em">

                        <div class="box col-md-12 col-md-offset-1">
                            <div class="box">
                          <img id="blah" src="images/camera_icon_tasks.png" alt="your image" class='svphoto' style="border-radius: 50%;margin-top: 3px;width: 80px !important;height: 80px !important;" />	</div>
                            </div>
                      </label>
                  </div>

                </div>

                <div class="col-md-3 col-sm-6 m-t uprbox m-l">
                  <div class="col-md-12">

                  <b class="licls">3</b>
                  <h3 class="col-md-10">Add a comment? (Optional)</h3>
                  </div>


                      <label style="font-size: 1.5em">

                          <textarea id="myInput" placeholder="comment" class="fortextarea svtextarea col-md-12 form-group"></textarea>

                      </label>

                </div>
              </div>
              <div class="col-md-12 m-t m-l">
                <div class="col-md-1">
                  <a class="btn btn-primary submitss" href="index.php"> Go Back</a>
                </div>
                <div class="col-md-2 col-md-offset-9">
                    <button class="btn btn-primary submitss" type="button"> Submit</button>
                  </div>
              </div>


            </div>
        </div>
    </div>
</div>


        </div>
        </div>



<!-- Mainly scripts -->
<script src="js/plugins/fullcalendar/moment.min.js"></script>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI  -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>


function fordeltask(){
  var accs_token="<?php echo $acess_token ?>";
  var task_id="<?php echo $task_id ?>";

// var divs =document.getElementById('img1');
  stage = {
      baseUrl: "https://pavlok-mvp.herokuapp.com",
      token: "<?php echo $acess_token ?>"
  };
  function fordel(urll) {
      $.ajax({
                  url: urll,
                  type: "DELETE",
                  crossDomain: true,

                  success: function (response) {
                      // console.log(response.status, response);

                      // console.log(response.url);
                       console.log("done");
                      window.location ="index.php";

                  },
                  error: function (xhr) {
                      console.log("headers:", xhr.getAllResponseHeaders());
  alert("here");
                      // console.log("failed");
                      window.location ="index.php";


                  }
              });
  }



  //
  fordel(stage.baseUrl + "/api/v2/tasks/tasks/"+task_id+"?access_token="+accs_token);

   }
</script>
<script>


$('.submitss').click(function(){
  var accs_token="<?php echo $acess_token ?>";
// var divs =document.getElementById('img1');
  stage = {
      baseUrl: "https://pavlok-mvp.herokuapp.com",
      token: "<?php echo $acess_token ?>"
  };
  function geturl(urll) {
      $.ajax({
                  url: urll,
                  type: "POST",
                  crossDomain: true,

                  success: function (response) {
                      console.log(response.status, response);
                      // console.log(response.url);
                      var forurl=response.url;
                      console.log(forurl);
                      var filename = $('.img1').val();
                      if (filename.substring(3,11) == 'fakepath') {
                          filename = filename.substring(12);
                      } // Remove c:\fake at beginning from localhost chrome
                      $('.img1').html(filename);
                      console.log(filename);

                      function imgupload(urllz) {
                          $.ajax({
                                      url: urllz,
                                      type: "PUT",
                                      crossDomain: true,
                                      data: filename,
                                      success: function (response) {

                                        // var chckval= chckng();
                                        if ( $('input[type="checkbox"]').is(':checked') ) {
                                          var txtarea=$('.svtextarea').val();
                                          var foorid="<?php echo $task_id ?>";
                                            var accs_token="<?php echo $acess_token ?>";
                                            var toaddurl= urllz;

                                            dataI = new Date();

                                            function convertDate(date) {
                                              var yyyy = date.getFullYear().toString();
                                              var mm = (date.getMonth()+1).toString();
                                              var dd  = date.getDate().toString();

                                              var mmChars = mm.split('');
                                              var ddChars = dd.split('');

                                              return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
                                            }

                                            var newddt=convertDate(dataI);
                                         stage = {
                                             baseUrl: "https://pavlok-mvp.herokuapp.com",
                                             token: "<?php echo $acess_token ?>"
                                         };
                                         function post(params, url) {
                                             $.ajax({
                                                         url: url,
                                                          type: "POST",
                                                         crossDomain: true,
                                                         data: params,

                                                         success: function (response) {
                                                             console.log(response.status, response);

                                                               console.log(foorid);
                                                               console.log(txtarea);
                                                               console.log(toaddurl);
                                                               console.log("okay");


                                                         },
                                                         error: function (xhr, status) {
                                                             console.log("headers:", xhr.getAllResponseHeaders());
                                                             console.log(foorid);
                                                             console.log(txtarea);
                                                             console.log(filename)
                                                               console.log("failed");

                                                         }
                                                     });
                                         }

                                         task_params = {
                                           "task": {
                                              "completed_at": newddt+" 11:59:59 +0000",
                                              "media": toaddurl,
                                              "comment": txtarea
                                         	}
                                         };
                                         //
                                         post(task_params, stage.baseUrl + "/api/v2/tasks/tasks/"+foorid+"/complete?access_token="+accs_token);


                                        }
                                        else {
                                          alert("Please make sure you checked the task complete.");
                                        }

                                        // alert(chckval);
                                        console.log(chckbox);
                                      },
                                      error: function (xhr, status) {
                                          console.log("headers:", xhr.getAllResponseHeaders());
                                          console.log("failed");


                                      }
                                  });
                      }

                        imgupload(forurl);


                  },
                  error: function (xhr, status) {
                      console.log("headers:", xhr.getAllResponseHeaders());

                      console.log("failed");


                  }
              });
  }



  //
  geturl(stage.baseUrl + "/api/v2/uploads?access_token="+accs_token);

//
// var chckval= chckng();
// if ( $('input[type="checkbox"]').is(':checked') ) {
//   var txtarea=$('.svtextarea').val();
//   var foorid="<php echo $task_id ?>";
//     var accs_token="<php echo $acess_token ?>";
//
//     dataI = new Date();
//
//
//     function convertDate(date) {
//       var yyyy = date.getFullYear().toString();
//       var mm = (date.getMonth()+1).toString();
//       var dd  = date.getDate().toString();
//
//       var mmChars = mm.split('');
//       var ddChars = dd.split('');
//
//       return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
//     }
//
//     var newddt=convertDate(dataI);
//  stage = {
//      baseUrl: "https://pavlok-stage.herokuapp.com",
//      token: "<php echo $acess_token ?>"
//  };
//  function post(params, url) {
//      $.ajax({
//                  url: url,
//                  type: "POST",
//                  crossDomain: true,
//                  data: params,
//                  success: function (response) {
//                      console.log(response.status, response);
//                        window.location ="index.php";
//                        console.log(foorid);
//
//
//                  },
//                  error: function (xhr, status) {
//                      console.log("headers:", xhr.getAllResponseHeaders());
//
//                        window.location ="index.php";
//
//                  }
//              });
//  }
//
//  task_params = {
//    "task": {
//      "comment":txtarea,
//  			"completed_at": newddt+" 11:59:59 +0000"
//  	}
//  };
//  //
//  post(task_params, stage.baseUrl + "/api/v2/tasks/tasks/"+foorid+"/complete?access_token="+accs_token);
//
//
// }
// else {
//   alert("Please make sure you checked the task complete.");
// }
//
// alert(chckval);
// console.log(chckbox);
   });
</script>
<script>
function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#blah')
                   .attr('src', e.target.result);
           };

           reader.readAsDataURL(input.files[0]);
       }

   //     var filename = fullPath.replace(/^.*[\\\/]/, '');
   //     var fullPath = document.getElementById("photos").src;
   //  // var filename = fullPath.replace(/^.*[\\\/]/, '');
   //  // or, try this,
   //  var filename = fullPath.split("/").pop();
   //
   // document.getElementById("result").value = filename;
   }
   function getName() {
     var fullPath = document.getElementById("img1").src;
     var filename = fullPath.replace(/^.*[\\\/]/, '');
     // or, try this,
     // var filename = fullPath.split("/").pop();

    document.getElementById("result").value = filename;
    console.log(blah);
 }
</script>
</body>

</html>

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

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.js" integrity="sha256-uAmtcHxcK7o0T9gFmupKERz4zIJwFBUkWZFtzqUZ5ag=" crossorigin="anonymous"></script>
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
  font-size: 17px;
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
.btncall
{
  border:  none;
  background-color: #f8f8f8;
  padding-left: 0px;

}
</style>
</head>

<body class="top-navigation"  onload="myFunction()">

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
        <div id="modal-form2" class="modal fade" aria-hidden="true"  style="z-index: 1400;">
            <div class="modal-dialog">
                <div class="modal-content" style="color: gray;">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
      <div class="col-sm-12">
        <div class="col-sm-11">

        </div>
        <div class="col-sm-1" style="margin: -18px -26px 0px 0px;float:  right;">
         <button type="button" class="close" data-dismiss="modal" style="font-size: 50px;">×</button>
        </div>
      </div>


      <form role="form">
            <div class="form-group">
              <div class="col-md-12 col-sm-12">
                <div class="col-md-4 col-sm-4" style="margin-top: 1%;font-size: 18px;padding: 0;">
                  <h4>Did you complete the task?</h4>
                  <div class="modal-body">
                       	<button type="button" class="btn btn-info btn-lg" data-toggle="modal"      data-target="#test2">Open Modal 2</button>

                       </div>
                </div>
                <div class="col-md-2 col-sm-2">
                  <input type="checkbox" placeholder="Task Name" class="modaltask form-control typeline" style="width:  20px;">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 col-sm-12">
                <div class="col-md-4 col-sm-4" style="margin-top: 1%;font-size: 18px;padding: 0;">
                  <h4>Add a photo (Optional)</h4>
                </div>
                <div class="col-md-7 col-sm-7">
                  <input type="file" placeholder="Task Name" class="modaltask form-control typeline">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12 col-sm-12">
                <div class="col-md-4 col-sm-4" style="margin-top: 1%;font-size: 18px;padding: 0;">
                  <h4>Add a comment (Optional)</h4>
                </div>
                <div class="col-md-7 col-sm-7">
                  <div class="form-group"><textarea class="form-control typeline modaltxtarea" rows="4" cols="50" placeholder="Add Description"></textarea></div>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 m-t col-sm-12">
                <button class="btn btn-sm btn-primary pull-right m-t-n-xs " type="button"><strong>Submit</strong></button>
              </div>
            </div>
      </form>
                            </div>

                    </div>
                </div>
                </div>
            </div>
    </div>
    <div id="test2" class="modal fade" role="dialog" style="z-index: 1600;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">

        content

      </div>
    </div>
  </div>
</div>
        <div class="col-lg-10 col-md-offset-1">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Habits and Task</h5>
                    <div class="addBtn">

                    										 <div class="ibox-content" style=" background:  transparent;padding: 0;    margin-top: -1px;">
                                              <a data-toggle="modal" href="#modal-form" style=" color:  white;">  <div class="text-center">
                                                	<i class="fa fa-plus" aria-hidden="true"></i>
                                                </div></a>
                                                <div id="modal-form" class="modal fade" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="color: gray;">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                    													<div class="col-sm-12">
                    														<div class="col-sm-11">
                    															<h3 class="m-t-none m-b b-r">Create new</h3>
                    														</div>
                    														<div class="col-sm-1" style="margin: -28px -53px 0px 0px;float:  right;">
                    														 <button type="button" class="close" data-dismiss="modal" style="font-size: 50px;">×</button>
                    														</div>
                    													</div>


                                              <form role="form">
                                                    <div class="form-group"><input type="text" placeholder="Task Name" class="modaltasknew form-control typeline"></div>
                                                    <div class="form-group"><textarea class="form-control typeline modaltxtarea" rows="4" cols="50" placeholder="Add Description"></textarea></div>
                                                    <div class="form-group"><label style="float:  left;font-size:  14px;">Due Date</label><input type="date" placeholder="task Name" class="modaldate form-control typeline"></div>
                                                      <div>
                                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs createdbtn" type="button"><strong>Create</strong></button>

                                                    </div>
                                              </form>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                    										</div>
                </div>
                <div class="col-md-12" style="margin-top:1%;">
                <span id="down" class="col-md-1 col-sm-1 col-xs-2 col-md-offset-1" ><i class="glyphicon glyphicon-menu-left" style="color: #757575;font-size:  28px;"></i>
                </span>
                <span id="dateD" class="col-md-8 col-sm-10 col-xs-8 " style="text-align:  center;"></span>
                <span id="up" class="col-md-1 col-sm-1 col-xs-2"><i  class="glyphicon glyphicon-menu-right" style="color: #757575;font-size:  28px;"></i>
                </span>
                <div class="col-md-12" id="display-resources">

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

$('.createdbtn').click(function(){

  var taskname=$('.modaltasknew').val();
  var txtarea=$('.modaltxtarea').val();
   var modaldate=$('.modaldate').val();


   function getTimeZone() {
     var offset = new Date().getTimezoneOffset(), o = Math.abs(offset);
     return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + "" + ("00" + (o % 60)).slice(-2);
   }
   var timezoned=getTimeZone();
   var finaldate=modaldate+" 23:59:59 "+timezoned;
stage = {
    baseUrl: "https://pavlok-stage.herokuapp.com",
    token: "<?php echo $acess_token ?>"
};

function post(params, url) {
    $.ajax({
                url: url,
                type: "POST",
                crossDomain: true,
                data: params,
                dataType: "json",
                success: function (response) {
                    console.log(response.status, response);
                    window.location ="index.php";


                },
                error: function (xhr, status) {
                    console.log("headers:", xhr.getAllResponseHeaders());

                }
            });
}

task_params = {
  	"access_token" :"<?php echo $acess_token ?>",
  "task": {
    "name": taskname,
    "description":txtarea,
    "due_time": finaldate,
    "user_date": modaldate
  }
};

post(task_params, stage.baseUrl + "/api/v2/tasks/tasks");


});


function forstatss(countc){
  var countt=countc;
   var foorid=$('.foorid'+countc).val();



   var accs_token="<?php echo $acess_token ?>";

   console.log(foorid);

//
//
//   var taskname=$('.modaltasknew').val();
//   var txtarea=$('.modaltxtarea').val();
//    var modaldate=$('.modaldate').val();
//
//
//    function getTimeZone() {
//      var offset = new Date().getTimezoneOffset(), o = Math.abs(offset);
//      return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + "" + ("00" + (o % 60)).slice(-2);
//    }
//    var timezoned=getTimeZone();
//    var finaldate=modaldate+" 23:59:59 "+timezoned;
stage = {
    baseUrl: "https://pavlok-stage.herokuapp.com",
    token: "<?php echo $acess_token ?>"
};
function post(params, url) {
    $.ajax({

                url: url,
                type: "PATCH",
                crossDomain: true,
                data: params,
                dataType: "json",
                success: function (response) {
                    console.log(response.status, response);
                    window.location ="index.php";
                    // $(".forrred").load('index.php');
                },
                error: function (xhr, status) {
                    console.log("headers:", xhr.getAllResponseHeaders());
                    // $(".forrred").load('index.php');
                    window.location ="index.php";

                }
            });
}
//
task_params = {
  "task": {
		"starred": true
	}
};
//
post(task_params, stage.baseUrl + "/api/v2/tasks/tasks/"+foorid+"?access_token="+accs_token);


};



function forremovstatss(countc){
  var countt=countc;
   var foorid=$('.foorid'+countc).val();



   var accs_token="<?php echo $acess_token ?>";
// alert(foorid);
   console.log(foorid);

//
//
//   var taskname=$('.modaltasknew').val();
//   var txtarea=$('.modaltxtarea').val();
//    var modaldate=$('.modaldate').val();
//
//
//    function getTimeZone() {
//      var offset = new Date().getTimezoneOffset(), o = Math.abs(offset);
//      return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + "" + ("00" + (o % 60)).slice(-2);
//    }
//    var timezoned=getTimeZone();
//    var finaldate=modaldate+" 23:59:59 "+timezoned;
stage = {
    baseUrl: "https://pavlok-stage.herokuapp.com",
    token: "<?php echo $acess_token ?>"
};
function post(params, url) {
    $.ajax({

                url: url,
                type: "PATCH",
                crossDomain: true,
                data: params,
                dataType: "json",
                success: function (response) {
                    console.log(response.status, response);
                    window.location ="index.php";

                },
                error: function (xhr, status) {
                    console.log("headers:", xhr.getAllResponseHeaders());
                    window.location ="index.php";

                }
            });
}
//
task_params = {
  "task": {
		"starred": false
	}
};
//
post(task_params, stage.baseUrl + "/api/v2/tasks/tasks/"+foorid+"?access_token="+accs_token);


};



function forcomplete(countc){
  var countt=countc;
   var foorid=$('.foorid'+countc).val();

   var accs_token="<?php echo $acess_token ?>";

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
//
//
//   var taskname=$('.modaltasknew').val();
//   var txtarea=$('.modaltxtarea').val();
//    var modaldate=$('.modaldate').val();
//
//

     // var i = dataI.valueOf();
     // dataI = new Date( i);
     // document.getElementById("dateD").innerHTML =dataI.toDateString();
     //
     // function convertDate(date) {
     //   var yyyy = date.getFullYear().toString();
     //   var mm = (date.getMonth()+1).toString();
     //   var dd  = date.getDate().toString();
     //
     //   var mmChars = mm.split('');
     //   var ddChars = dd.split('');
     //
     //   return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
     // }
     // var newddts=convertDate(dataI);
     //
     // function getTimeZone() {
     //   var offset = new Date().getTimezoneOffset(), o = Math.abs(offset);
     //   return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + "" + ("00" + (o % 60)).slice(-2);
     // }
     // var timezoned=getTimeZone();
     // var finaldate=newddts+" 23:59:59 "+timezoned;
     //
     //
     // console.log(foorid);
     // console.log(newddts);
     //  console.log(finaldate);

stage = {
    baseUrl: "https://pavlok-stage.herokuapp.com",
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
                      window.location ="index.php";
                      console.log(foorid);


                },
                error: function (xhr, status) {
                    console.log("headers:", xhr.getAllResponseHeaders());

                      window.location ="index.php";

                }
            });
}

task_params = {
  "task": {
			"completed_at": newddt+" 11:59:59 +0000"
	}
};
//
post(task_params, stage.baseUrl + "/api/v2/tasks/tasks/ "+foorid+"/complete?access_token="+accs_token);


};


function myFunction() {


  var i = dataI.valueOf();
  dataI = new Date( i);

  function convertDate(date) {
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth()+1).toString();
    var dd  = date.getDate().toString();

    var mmChars = mm.split('');
    var ddChars = dd.split('');

    return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
  }
  var displayResources = $('#display-resources');
  var newddt=convertDate(dataI);
  var accs_token="<?php echo $acess_token ?>";
  var imgchecked="images/checkmark_new.png";
  var imgempty="images/checkmark_empty.png";
  var imgincomplete="images/coach_task_incomplete.png";
  var activestar="images/active_star.png";
  var inactivestar="images/inactive_star.png";
  var datatogl="modal";
  var datahrf="#modal-form2";
  var collspan="5";
  var today = new Date();
  var cobtoday=today.toISOString();
   $.ajax({
   type: "GET",
   url: "http://pavlok-stage.herokuapp.com/api/v2/tasks/tasks?access_token="+accs_token+"&user_date="+newddt+"",

    success: function(result)
   {

      var output="<div class='col-md-12 forrred'><div class='col-md-12'><h2 style='text-align:center'>Habits</h2></div>";
      for (var i = 0; i < result.length; i++)
      {
        if(result[i].sequence_number)
        {
          if(result[i].status=='complete')
          {
             output+="<tr><td><a data-toggle="+datatogl+" href="+datahrf+" ><img src="+imgchecked+"></a></td><td>" + result[i].id + "</td><td>" + result[i].name  + "</td><td>" + result[i].sequence_number  + "</td></tr>";
          }
          else {
             output+="<tr><td><a data-toggle="+datatogl+" href="+datahrf+" ><img src="+imgempty+"></a></td><td>" + result[i].id + "</td><td>" + result[i].name  + "</td><td>" + result[i].sequence_number  + "</td></tr>";
          }
        }


      }

      output+="<h5 style='text-align:  center;'>No Habit assigned</h5>";

     output+="</div><div class='col-md-12'><div class='col-md-12'><h2 style='text-align:center'>Tasks</h2></div>";
     for (var i = 0; i < result.length; i++)
     {
       if(!(result[i].sequence_number))
         {
           if(result[i].starred==true)
             {
               if(result[i].status!="complete")
                 {
                   if(result[i].due_time < cobtoday)
                     {
                       output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a href='#' ><img src="+imgincomplete+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")' ><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+activestar+" style='width: 28px;'></a></div></div>";

                     }
                     else
                     {
                       output+=" <form action='taskdetail.php' method='post'><div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><button type='submit' class='btncall'><img src="+imgempty+"></button></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><input type='hidden' name='t_id' value='"+result[i].id+"'><input type='hidden' name='t_name' value='"+result[i].name+"'><input type='hidden' name='t_description' value='"+result[i].description+"'><input type='hidden' name='t_due_time' value='"+result[i].due_time+"'><input type='hidden' name='t_starred' value='"+result[i].starred+"'><input type='hidden' name='t_media_url' value='"+result[i].media_url+"'><input type='hidden' name='t_comment' value='"+result[i].comment+"'><input type='hidden' name='t_completed_at' value='"+result[i].completed_at+"'><img src="+activestar+" style='width: 28px;'></a></div></div></form>";




                      }
                 }

             }

         }

     }
     for (var i = 0; i < result.length; i++)
     {
       if(!(result[i].sequence_number))
         {
           if(result[i].starred==true)
             {
               if(result[i].status=="complete")
                 {
                   output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgchecked+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")' ><input type='hidden' value="+result[i].id+" class='foorid"+i+"' ><img src="+activestar+" style='width: 28px;'></a></div></div>";





                   }

             }

         }

     }


     for (var i = 0; i < result.length; i++)
     {
       if(!(result[i].sequence_number))
         {
           if(result[i].starred==false)
             {
               if(result[i].status!="complete")
                 {
                   if(cobtoday > result[i].due_time)
                     {
                       output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgincomplete+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div>";

2
                     }
                     else
                     {
                       var t_id=result[i].id;
                       var t_name=result[i].name;
                       var t_description=result[i].description;
                       var t_due_time=result[i].due_time;
                       var t_media_url=result[i].media_url;
                       var t_comment=result[i].comment;
                       var t_completed_at=result[i].completed_at;


                       output+=" <form action='taskdetail.php' method='post'><div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><button type='submit' class='btncall'><img src="+imgempty+"></button></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><input type='hidden' name='t_id' value='"+result[i].id+"'><input type='hidden' name='t_name' value='"+result[i].name+"'><input type='hidden' name='t_description' value='"+result[i].description+"'><input type='hidden' name='t_due_time' value='"+result[i].due_time+"'><input type='hidden' name='t_starred' value='"+result[i].starred+"'><input type='hidden' name='t_media_url' value='"+result[i].media_url+"'><input type='hidden' name='t_comment' value='"+result[i].comment+"'><input type='hidden' name='t_completed_at' value='"+result[i].completed_at+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div></form>";

                       // output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgempty+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a><input type='hidden' value="+result[i].id+" class='fooridsim' ><img src="+inactivestar+" style='width: 28px;'></a></div></div>";
                       // output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgempty+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a><input type='hidden' value="+result[i].id+" class='foorid' ><img src="+activestar+" style='width: 28px;'></a></div></div>";



                       }
                 }
             }
         }

     }


     for (var i = 0; i < result.length; i++)
     {
       if(!(result[i].sequence_number))
         {
           if(result[i].starred==false)
             {
               if(result[i].status=="complete")
                 {
                   output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgchecked+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div>";


                    }
             }
         }

     }
     if(result.length == 0)
     {
     output+="<h5 style='text-align:  center;'>No Task currently assigned. To add a task press the '+' button at the above of screen.</h5>";
     }
      output+="</div>";
   console.log(result);


   displayResources.html(output);
   $("table").addClass("table");
  }

   });
   console.log(newddt);
  console.log(cobtoday);

}


document.getElementById("up").onclick = function(){

var i = dataI.valueOf() + 86400000 ;
dataI = new Date( i);

document.getElementById("dateD").innerHTML =dataI.toDateString();


function convertDate(date) {
  var yyyy = date.getFullYear().toString();
  var mm = (date.getMonth()+1).toString();
  var dd  = date.getDate().toString();

  var mmChars = mm.split('');
  var ddChars = dd.split('');

  return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
}
var displayResources = $('#display-resources');
var newddt=convertDate(dataI);
var accs_token="<?php echo $acess_token ?>";
var imgchecked="images/checkmark_new.png";
var imgempty="images/checkmark_empty.png";
var imgincomplete="images/coach_task_incomplete.png";
var activestar="images/active_star.png";
var inactivestar="images/inactive_star.png";
var datatogl="modal";
var datahrf="#modal-form2";
var collspan="5";
var today = new Date();
 var cobtoday=today.toISOString();
 $.ajax({
 type: "GET",
 url: "http://pavlok-stage.herokuapp.com/api/v2/tasks/tasks?access_token="+accs_token+"&user_date="+newddt+"",

  success: function(result)
  {

     var output="<div class='col-md-12'><div class='col-md-12'><h2 style='text-align:center'>Habits</h2></div>";
     for (var i = 0; i < result.length; i++)
     {
       if(result[i].sequence_number)
       {
         if(result[i].status=='complete')
         {
            output+="<tr><td><a data-toggle="+datatogl+" href="+datahrf+" ><img src="+imgchecked+"></a></td><td>" + result[i].id + "</td><td>" + result[i].name  + "</td><td>" + result[i].sequence_number  + "</td></tr>";
         }
         else {
            output+="<tr><td><a data-toggle="+datatogl+" href="+datahrf+" ><img src="+imgempty+"></a></td><td>" + result[i].id + "</td><td>" + result[i].name  + "</td><td>" + result[i].sequence_number  + "</td></tr>";
         }
       }


     }
     if(result.length == 0)
     {
     output+="<h5 style='text-align:  center;'>No Habit assigned</h5>";
     }
    output+="</div><div class='col-md-12'><div class='col-md-12'><h2 style='text-align:center'>Tasks</h2></div>";
    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==true)
            {
              if(result[i].status!="complete")
                {
                  if(result[i].due_time < cobtoday)
                    {
                      output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a href='#' ><img src="+imgincomplete+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")' ><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+activestar+" style='width: 28px;'></a></div></div>";

                    }
                    else
                    {
                      output+=" <form action='taskdetail.php' method='post'><div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><button type='submit' class='btncall'><img src="+imgempty+"></button></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><input type='hidden' name='t_id' value='"+result[i].id+"'><input type='hidden' name='t_name' value='"+result[i].name+"'><input type='hidden' name='t_description' value='"+result[i].description+"'><input type='hidden' name='t_due_time' value='"+result[i].due_time+"'><input type='hidden' name='t_starred' value='"+result[i].starred+"'><input type='hidden' name='t_media_url' value='"+result[i].media_url+"'><input type='hidden' name='t_comment' value='"+result[i].comment+"'><input type='hidden' name='t_completed_at' value='"+result[i].completed_at+"'><img src="+activestar+" style='width: 28px;'></a></div></div></form>";




                     }
                }

            }

        }

    }
    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==true)
            {
              if(result[i].status=="complete")
                {
                  output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgchecked+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")' ><input type='hidden' value="+result[i].id+" class='foorid"+i+"' ><img src="+activestar+" style='width: 28px;'></a></div></div>";





                  }

            }

        }

    }


    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==false)
            {
              if(result[i].status!="complete")
                {
                  if(cobtoday > result[i].due_time)
                    {
                      output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgincomplete+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div>";

2
                    }
                    else
                    {
                      var t_id=result[i].id;
                      var t_name=result[i].name;
                      var t_description=result[i].description;
                      var t_due_time=result[i].due_time;
                      var t_media_url=result[i].media_url;
                      var t_comment=result[i].comment;
                      var t_completed_at=result[i].completed_at;


                      output+=" <form action='taskdetail.php' method='post'><div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><button type='submit' class='btncall'><img src="+imgempty+"></button></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><input type='hidden' name='t_id' value='"+result[i].id+"'><input type='hidden' name='t_name' value='"+result[i].name+"'><input type='hidden' name='t_description' value='"+result[i].description+"'><input type='hidden' name='t_due_time' value='"+result[i].due_time+"'><input type='hidden' name='t_starred' value='"+result[i].starred+"'><input type='hidden' name='t_media_url' value='"+result[i].media_url+"'><input type='hidden' name='t_comment' value='"+result[i].comment+"'><input type='hidden' name='t_completed_at' value='"+result[i].completed_at+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div></form>";

                      // output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgempty+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a><input type='hidden' value="+result[i].id+" class='fooridsim' ><img src="+inactivestar+" style='width: 28px;'></a></div></div>";
                      // output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgempty+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a><input type='hidden' value="+result[i].id+" class='foorid' ><img src="+activestar+" style='width: 28px;'></a></div></div>";



                      }
                }
            }
        }

    }


    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==false)
            {
              if(result[i].status=="complete")
                {
                  output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgchecked+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div>";


                   }
            }
        }

    }
    if(result.length == 0)
    {
    output+="<h5 style='text-align:  center;'>No Task assigned</h5>";
    }
     output+="</div>";
  console.log(result);


  displayResources.html(output);
  $("table").addClass("table");
 }

 });
console.log(newddt);
}
document.getElementById("down").onclick = function(){
var i = dataI.valueOf() - 86400000 ;
dataI = new Date( i);
document.getElementById("dateD").innerHTML =dataI.toDateString();

function convertDate(date) {
  var yyyy = date.getFullYear().toString();
  var mm = (date.getMonth()+1).toString();
  var dd  = date.getDate().toString();

  var mmChars = mm.split('');
  var ddChars = dd.split('');

  return yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);
}
var displayResources = $('#display-resources');
var newddt=convertDate(dataI);
var accs_token="<?php echo $acess_token ?>";
var imgchecked="images/checkmark_new.png";
var imgempty="images/checkmark_empty.png";
var imgincomplete="images/coach_task_incomplete.png";
var activestar="images/active_star.png";
var inactivestar="images/inactive_star.png";
var datatogl="modal";
var datahrf="#modal-form2";
var collspan="5";
var today = new Date();
 var cobtoday=today.toISOString();
 $.ajax({
 type: "GET",
 url: "http://pavlok-stage.herokuapp.com/api/v2/tasks/tasks?access_token="+accs_token+"&user_date="+newddt+"",

  success: function(result)
  {

     var output="<div class='col-md-12'><div class='col-md-12'><h2 style='text-align:center'>Habits</h2></div>";
     for (var i = 0; i < result.length; i++)
     {
       if(result[i].sequence_number)
       {
         if(result[i].status=='complete')
         {
            output+="<tr><td><a data-toggle="+datatogl+" href="+datahrf+" ><img src="+imgchecked+"></a></td><td>" + result[i].id + "</td><td>" + result[i].name  + "</td><td>" + result[i].sequence_number  + "</td></tr>";
         }
         else {
            output+="<tr><td><a data-toggle="+datatogl+" href="+datahrf+" ><img src="+imgempty+"></a></td><td>" + result[i].id + "</td><td>" + result[i].name  + "</td><td>" + result[i].sequence_number  + "</td></tr>";
         }
       }


     }
     if(result.length == 0)
     {
     output+="<h5 style='text-align:  center;'>No Habit assigned</h5>";
     }
    output+="</div><div class='col-md-12'><div class='col-md-12'><h2 style='text-align:center'>Tasks</h2></div>";
    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==true)
            {
              if(result[i].status!="complete")
                {
                  if(result[i].due_time < cobtoday)
                    {
                      output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a href='#' ><img src="+imgincomplete+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")' ><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+activestar+" style='width: 28px;'></a></div></div>";

                    }
                    else
                    {
                      output+=" <form action='taskdetail.php' method='post'><div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><button type='submit' class='btncall'><img src="+imgempty+"></button></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><input type='hidden' name='t_id' value='"+result[i].id+"'><input type='hidden' name='t_name' value='"+result[i].name+"'><input type='hidden' name='t_description' value='"+result[i].description+"'><input type='hidden' name='t_due_time' value='"+result[i].due_time+"'><input type='hidden' name='t_starred' value='"+result[i].starred+"'><input type='hidden' name='t_media_url' value='"+result[i].media_url+"'><input type='hidden' name='t_comment' value='"+result[i].comment+"'><input type='hidden' name='t_completed_at' value='"+result[i].completed_at+"'><img src="+activestar+" style='width: 28px;'></a></div></div></form>";




                     }
                }

            }

        }

    }
    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==true)
            {
              if(result[i].status=="complete")
                {
                  output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgchecked+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forremovstatss("+i+")' ><input type='hidden' value="+result[i].id+" class='foorid"+i+"' ><img src="+activestar+" style='width: 28px;'></a></div></div>";





                  }

            }

        }

    }


    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==false)
            {
              if(result[i].status!="complete")
                {
                  if(cobtoday > result[i].due_time)
                    {
                      output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgincomplete+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div>";

2
                    }
                    else
                    {
                      var t_id=result[i].id;
                      var t_name=result[i].name;
                      var t_description=result[i].description;
                      var t_due_time=result[i].due_time;
                      var t_media_url=result[i].media_url;
                      var t_comment=result[i].comment;
                      var t_completed_at=result[i].completed_at;


                      output+=" <form action='taskdetail.php' method='post'><div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><button type='submit' class='btncall'><img src="+imgempty+"></button></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><input type='hidden' name='t_id' value='"+result[i].id+"'><input type='hidden' name='t_name' value='"+result[i].name+"'><input type='hidden' name='t_description' value='"+result[i].description+"'><input type='hidden' name='t_due_time' value='"+result[i].due_time+"'><input type='hidden' name='t_starred' value='"+result[i].starred+"'><input type='hidden' name='t_media_url' value='"+result[i].media_url+"'><input type='hidden' name='t_comment' value='"+result[i].comment+"'><input type='hidden' name='t_completed_at' value='"+result[i].completed_at+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div></form>";

                      // output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgempty+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a><input type='hidden' value="+result[i].id+" class='fooridsim' ><img src="+inactivestar+" style='width: 28px;'></a></div></div>";
                      // output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgempty+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a><input type='hidden' value="+result[i].id+" class='foorid' ><img src="+activestar+" style='width: 28px;'></a></div></div>";



                      }
                }
            }
        }

    }


    for (var i = 0; i < result.length; i++)
    {
      if(!(result[i].sequence_number))
        {
          if(result[i].starred==false)
            {
              if(result[i].status=="complete")
                {
                  output+="<div class='col-md-8 col-xs-12 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-0 custmdiv'><div class='col-md-1 col-xs-2 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forcomplete()'><img src="+imgchecked+"></a></div><div class='col-md-10 col-xs-8 col-sm-10 col-lg-10' style='margin-top: -8px;'> <p><b>" + result[i].name  + "</b><br>Task</p></div><div class='col-md-1 col-xs-1 col-sm-1 col-lg-1' style='text-align: center;'><a onclick='forstatss("+i+")'><input type='hidden' value="+result[i].id+" class='foorid"+i+"'><img src="+inactivestar+" style='width: 28px;'></a></div></div>";


                   }
            }
        }

    }
    if(result.length == 0)
    {
    output+="<h5 style='text-align:  center;'>No Task assigned</h5>";
    }
     output+="</div>";
  console.log(result);


  displayResources.html(output);
  $("table").addClass("table");
 }

 });
console.log(newddt);
}
var dataI = new Date();
document.getElementById("dateD").innerHTML =dataI.toDateString();

</script>
</body>

</html>

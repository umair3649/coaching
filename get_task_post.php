<?php

    $ch = curl_init("http://pavlok-stage.herokuapp.com/api/v2/tasks/tasks?access_token=75b94d45b6c806ce37ae8de6974d50d6c73f9925f4cd80396cd0e531017fe5e3"); // add your url which contains json file
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($content, true);
    //print_R($json);
    $count=count($json);
    echo $count;
    echo $json['user_id'];
    echo $json['description'];
    echo'<table><th>Tutorial</th><th>Link</th>';
    for($i=0;$i<$count;$i++)
    {
      echo'<tr><td>'.$json['user_id'].'</td><td>'.$json['description'].'</td></tr>';
    }
    echo'</table>';

?>

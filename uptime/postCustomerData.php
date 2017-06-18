<?php

include 'Database/config.php';

// external libraries for URL REQUESTS
include('libraries/httpful.phar');

// GET URL, AND CRON TIME SCHEDULE, FIRE IT WITH cURL
$customerURL = $_POST['customerURL'];

$cronTimer = $_POST['cronTimer'];

$APIkey = '6JTZ7VMQJS8103YRHXONPU5SV0448WEZ';



// LINK TO BE EXECUTED THROUGH CURL
$cronURL = "https://www.setcronjob.com/api/cron.add?token={$APIkey}&expression={$cronTimer}&url={$customerURL}";


$uri = $cronURL;
$response = \Httpful\Request::get($uri)->send();
 
var_dump($response); 

// GETTING CRON RESPONSE

$cgr = 'https://www.setcronjob.com/api/server.useragent?token=6JTZ7VMQJS8103YRHXONPU5SV0448WEZ';

// WE WANT TO UPDATE OUR DATABASE WITH THE STATUSCODE RESPONSE, AND REDIRECT RESPONSE


//$cronSelect = $_POST['cron_url'];
/*
//$m = $_POST['cName']; 
$sql = "INSERT INTO customers (customerName) VALUES('".$cName."')";

	if (mysqli_query($conn, $sql)) {
            echo "recorded successfully";
          } else {
          echo "Could not able to execute sql".mysqli_error($conn);
        }

*/
//$bar = isset($_POST['bar']) ? $_POST['bar'] : null;
//echo $cName;
//echo $cronSelect;
?>

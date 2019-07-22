<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopUP Script</title>


</head>
<body>

<?php
//ini_set('max_execution_time', 0); //0=NOLIMIT
//error_reporting(E_ERROR | E_PARSE); // Remove Warnings 
include 'inc/database.php';


$ProxyIP = ''; // Define ProxyIP to nothing
$WebsiteExists = '0';


$Website = '1';


$ProxyList = "SELECT * FROM sites WHERE id='$Website'";
$result = $conn->query($ProxyList);

if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $Website = $row['site']; // Get Website Name By ID
        $userid = $row['userid']; // Get UserID Name By ID
}else {
    echo 'Website Not Found !!!!';
    echo '<br>';
    echo 'Contact Me (Telegram) : @Abolix';
    exit;
}




//$userid = '4804'; // My UserID is 4804


$date = date('Y-m-d H:i:s'); // Get Time ( Now )
$STRdate = strtotime($date);


$ProxyList = "SELECT * FROM proxy";
$result = $conn->query($ProxyList);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $RowDate = strtotime($row['date']); // GET Current Time as String
        $DateDiff = $STRdate - $RowDate; // Current Time - Proxy Use time = Diffrence


        if($row['websites'] == ''){
            $WebsiteList = '["'.$Website.'"]';
        }else {
            $WebsiteList = json_decode($row['websites']);
            foreach($WebsiteList as $WebsiteName) {
                if ($Website == $WebsiteName) {
                    // Website Exists in List
                    $WebsiteExists = 1;
                }
            }

            if($WebsiteExists !== 1) {
                array_push($WebsiteList,$Website);
                $WebsiteList = json_encode($WebsiteList);
            }

        }

        if(($row['Status'] == "1" || $row['Status'] == "0" ) && $WebsiteExists !== 1) { // IF it was working yesterday 

            if($DateDiff > 86400){ // Check IF It's More / Less Than 24 Hours
                // More Than 24 Hours
                $ProxyIP = $row['Proxy'];
                break;
            }
        }

    }
} else {
    echo "No Proxy Available";
    exit;
}

if($ProxyIP == '') {
    echo 'NO PROXY SELECTED';
    exit;
}

// Use Proxy
// $ProxyIP = '62.33.207.196:3128'; For use manually
$ProxyList = array(
    'http' => array(
        'proxy' => 'tcp://' . $ProxyIP,
        'request_fulluri' => true,
    ),
);
$Proxy = stream_context_create($ProxyList);


/////////////////////////////////////////////////////////////////////////////////
// BYPASS PROCESS ///////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

// Make Random Number 
$RandomNumber = rand(1000000,9999999);
// GET FIRST LINK

$Data = 'http://counter.popupplus.ir/?website=1&wid=null&uid='. $userid .'&usermax=3&host=' . $Website . '/?' . $RandomNumber;
if ($SiteContents = file_get_contents($Data, False, $Proxy)) {
    $regex = '/var NetBanan_URL = "(.*)";\K/m';
    preg_match_all($regex, $SiteContents, $FirstLink, PREG_SET_ORDER, 0);
    //echo $FirstLink[0][1]; // GET SECOND LINK BY REGEX (Data by $SiteContents)


}else {
    echo $ProxyIP;
    echo '<br>';
    echo 'Proxy Problem V1';
    echo '<br>';

    // TODO / IF proxy not working . change status to 0 in Database
        // Proxy Exists
        // Check if Proxy is Status 1 ( Working ) or 2 ( Not Working )
        $ProxySQL = "UPDATE proxy SET Status='-1' , date='$date' , websites='$WebsiteList' WHERE Proxy='$ProxyIP'";
        mysqli_query($conn, $ProxySQL);

    exit;
}

echo '<br>';

/////////////////////////////////////////////////////////////////////////////////

$Data = $FirstLink[0][1];
$SiteContents = file_get_contents($Data, False, $Proxy); // GET HTML RESPONSE FROM $DATA
$regex = '/self.location = \'(.*)\';\K/m';
preg_match_all($regex, $SiteContents, $SecondLink, PREG_SET_ORDER, 0);
if (isset($SecondLink[0][1])) {
    //echo $SecondLink[0][1]; // GET SECOND LINK BY REGEX (Data by $SiteContents)
}else {
    echo 'Proxy Problem V2';
    $ProxySQL = "UPDATE proxy SET Status='-1' , date='$date' , websites='$WebsiteList' WHERE Proxy='$ProxyIP'";
    mysqli_query($conn, $ProxySQL);
    exit;
}
echo '<br>';
/////////////////////////////////////////////////////////////////////////////////

// BYPASS
echo '<br>';
$Data = $SecondLink[0][1];
//echo $Data;
$SiteContents = file_get_contents($Data, False, $Proxy); // GET HTML RESPONSE FROM $DATA
if ( $SiteContents === false ) {
   echo "Unexpected Error V3";
}else {
    $Second = file_get_contents($Data, False, $Proxy); // GET HTML RESPONSE FROM $DATA
    $Third = file_get_contents($Data, False, $Proxy); // GET HTML RESPONSE FROM $DATA

        // SO IF PROXY IS WORKING ADD IT TO DATABASE
        $ProxySQL = "UPDATE proxy SET Status='1' , date='$date' , websites='$WebsiteList' WHERE Proxy='$ProxyIP'";
        mysqli_query($conn, $ProxySQL);

        echo $ProxyIP;
        echo '<br>';
        echo 'Bypassed ;)';
}


/////////////////////////////////////////////////////////////////////////////////
// END BYPASS PROCESS ///////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

?>
</body>
</html>
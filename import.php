<?php
ini_set('max_execution_time', 0); //0=NOLIMIT
include 'inc/database.php';

$TXT = fopen("proxy.txt", "r+") or die("Unable to open file!");
$date = '1990-01-01 12:00:00'; // Get Time ( Now )


while(!feof($TXT)) {
    $line = fgets($TXT);
    $ProxySQL = "SELECT * FROM proxy WHERE Proxy='$line'";
    $ProxyQuery = mysqli_query($conn, $ProxySQL);
    if (mysqli_num_rows($ProxyQuery) > 0) { // Check IF PROXY EXISTS
        // Proxy Exists
        // Check if Proxy is Status 1 ( Working ) or 2 ( Not Working )

        
    }else {
        $ProxySQL = "INSERT INTO proxy (Proxy, Status, date) 
        VALUES ('$line' , '0' , '$date' )"; 
        mysqli_query($conn, $ProxySQL); // Insert Data in Database
    }

  }



fclose($TXT);

?>
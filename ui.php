<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"
        media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Materialize Page</title>

</head>

<?php
include 'inc/database.php';

$sql = "SELECT * FROM proxy WHERE Status='1'";
if ($result = mysqli_query($conn,$sql)){
   $Working = mysqli_num_rows($result);
}
$sql = "SELECT * FROM proxy WHERE Status='-1'";
if ($result = mysqli_query($conn,$sql)){
   $NotWorking = mysqli_num_rows($result);
}
$sql = "SELECT * FROM proxy WHERE Status='0'";
if ($result = mysqli_query($conn,$sql)){
   $All = mysqli_num_rows($result);
}


// GET PRICE OF WORKINGS IN TOOMAN
$WorkingPrice = $Working * 26;
?>



<body>


    <div class="container">
        <div class="row">
            <div class="col s12 l4">
                <div class="card blue-grey">
                    <div class="card-content white-text">
                        <span class="card-title">Not Tested</span>
                        <h4><?php echo $All ?></h4>
                    </div>
                </div>
            </div>

            <div class="col s12 l4">
                <div class="card green">
                    <div class="card-content white-text">
                        <span class="card-title">Working Proxies</span>
                        <div class="chip right light-green accent-4">
                        <?php echo $WorkingPrice ?> Tooman
                        </div>
                        <h4><?php echo $Working ?></h4>
                    </div>
                </div>
            </div>

            <div class="col s12 l4">
                <div class="card red">
                    <div class="card-content white-text">
                        <span class="card-title">Corrupted Proxies</span>
                        <h4><?php echo $NotWorking ?></h4>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
    </script>

    <script>
        $(".button-collapse").sideNav();
    </script>
</body>

</html>
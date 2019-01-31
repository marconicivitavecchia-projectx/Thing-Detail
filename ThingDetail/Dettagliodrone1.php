<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



				<?php
                
if (isset($_REQUEST['username'])){
	$ReqUsername = $_REQUEST['username'];
	}
	if (isset($_REQUEST['password'])){
    $ReqPass = $_REQUEST['password'];
	}

				function redirect($a){
    echo "<meta http-equiv='refresh' content='20; url=https://projectxmarconi.000webhostapp.com/Dettagliodrone1.php?username=$a'/>";
}


    $mysqli = new mysqli('localhost','id8504020_erik123420','stefi678','id8504020_projectxmarconi');

    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }


    $query = "SELECT username,battery,x,y,z FROM users Where username LIKE '{$ReqUsername}'";
if ($stmt = $mysqli->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($username,$battery,$x,$y,$z);
    while ($stmt->fetch()) {
        /*echo $username;*/
        if($ReqUsername==$username){
            echo "Username:$username<br>";
		    echo "Battery:$battery<br>";
		    echo "Coordinate:$x,$y,$z<br>";
		    echo "Modello drone:gigierdroneX501";
		    redirect($ReqUsername);
            
            
        }else{
            echo "utente non registrato nel database";
        }
	}
}
?>
<img src="droneskere.jpg" align="right" width="30%" vspace="40">    
 
</body>
</html>
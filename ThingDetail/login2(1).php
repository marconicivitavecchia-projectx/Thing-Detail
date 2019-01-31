<?php



    $mysqli = new mysqli('localhost','id8504020_erik123420','stefi678','id8504020_projectxmarconi');

    if (mysqli_connect_errno()) {
        echo "<script type='text/javascript'>
                alert('ERRORE CONNESSIONE');
            </script>";
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
	if (isset($_REQUEST['username'])){
	$ReqUsername = $_REQUEST['username'];
	}
	if (isset($_REQUEST['password'])){
    $ReqPass = $_REQUEST['password'];
	}

    $query = "SELECT password,username,banned,regkey,battery,x,y,z FROM users Where password='$ReqPass'";
if ($stmt = $mysqli->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($password,$username,$banned,$regkey,$battery,$x,$y,$z);
    while ($stmt->fetch()) {
        /*echo $username;*/
        if (strcasecmp($ReqUsername, $username)==0) {
            echo "<script type='text/javascript'>
                alert('LOGGATO CORRETTAMENTE');
            </script>";
            sleep(1);
		echo json_encode(array( 'result' => 'success','password' => $password,'username' => $username,'banned' => $banned,'regkey' => $regkey,'battery' => $battery,'x' => $x,'y' => $y,'z' => $z));
        }else {
            echo "<script type='text/javascript'>
                alert('NON LOGGATO');
            </script>";
        }
	}
	$stmt->close();
}
?>
<html>
<head>
    <title>Registration</title>
</head>
<body>  
<?php
if (isset($_POST['submit'])) {
?>  <!-- The HTML registration form -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Date: <input type="type" name="date" /><br />
		Regkey: <input type="type" name="regkey" /><br />

        <input type="submit" name="submit" value="Register" />
    </form>
<?php
} else {
## connect mysql server
    $mysqli = new mysqli('localhost', 'id8504020_erik123420', 'stefi678', 'id8504020_projectxmarconi');
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
## query database
    # prepare data for insertion
    $date = $_GET['date'];
	$regkey = $_GET['regkey'];
    # check if username and email exist else insert

        # insert data into mysql database
        $sql = "UPDATE users SET last_access='{$date}' WHERE regkey='{$regkey}'";

        if ($mysqli->query($sql)) {
            //echo "New Record has id ".$mysqli->insert_id;
            echo "<p>data inserted succesfully!</p>";
        } else {
            echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
            exit();
        }
    }
?>      
</body>
</html>
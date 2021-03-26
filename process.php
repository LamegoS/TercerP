<?php
    //Get values pass form form in login.php file
    $username = $_POST['user'];
    $password = $_POST['pass'];

    //to prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    // connect to the server and select database
    //mysqli_connect("localhost", "root", "");
    //mysqli_select_db("login");

    // Create connection
    $conn = new mysqli($username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    

    //query the database for user
    $result = mysqli_query("select * from users where usernmane = '$username' and password = '$password'")
                or die("Failed to query database ".mysqli_error());
    $row = mysqli_fetch_array($result);
    if ($row['username'] == $username && $row['password']){
        echo "Login success! Welcome ".$row['username'];
    }else{
        echo "Failed login :c";
    }
?>
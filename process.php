<?php
    //Get values pass form form in login.php file
    $username = $_POST['user'];
    $password = $_POST['pass'];

    //to prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($username);
    $password = mysqli_real_escape_string($password);

    // connect to the server and select database
    mysqli_connect("localhost", "root", "");
    mysqli_select_db("login");

    //query the database for user
    $result = mysql_query("select * from users where usernmane = '$username' and password = '$password'")
                or die("Failed to query database ".mysql_error());
    $row = mysql_fetch_array($result);
    if ($row['username'] == $username && $row['password']){
        echo "Login success! Welcome ".$row['username'];
    }else{
        echo "Failed login :c";
    }

    /*

    */
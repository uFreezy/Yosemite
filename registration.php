<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sitetest');
    define('DB_USER','root');
    define('DB_PASSWORD','root');

    $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
    $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else
    {
        echo "Successfully connected to your database…";
    }
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if(preg_match('/(\W)|(\d)/',$fullname) || $fullname == "") {
        if(preg_match('/(\W)|(\d)/',$fullname)) {
            exit("Name cant contain special charecters or digits");
        }
        else {
            exit("Name cant be empty");
        }
    }
    if(preg_match('/\W/',$username)) {
        exit("Username can't contain special charecters");
    }
    if(!preg_match('/\W/',$username)) {
        $line = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[username]'") or die(mysql_error());

        if($row = mysql_fetch_array($line))
        {
            exit("User already exists!");
        }
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
        exit("Invalid email adress.");
    }

    $query = "INSERT INTO websiteusers (fullname,userName,email,pass) VALUES ('$fullname','$username','$email','$password')";
    $data = mysql_query ($query)or die(mysql_error());
    if($data)
    {
        echo "YOUR REGISTRATION IS COMPLETED...";
    }

?>
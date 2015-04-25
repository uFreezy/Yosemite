<?php
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sitetest');
    define('DB_USER','root');
    define('DB_PASSWORD','root');

    if(isset($_POST['status']) && $_POST['status'] != NULL && !isset($_SESSION['username'])) {
        $username = $_POST["username-login"];
        $password = $_POST["password-login"];
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // I have no idea what this does

        if ($stmt = $mysqli->prepare("SELECT userID, userName, pass FROM websiteusers WHERE userName = ? LIMIT 1")) {

            $stmt->bind_param('s', $username);  // Bind "$username" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
           // session_start();

            // get variables from result.
            $stmt->bind_result($user_id, $username, $db_password);
            $stmt->fetch();

            // hash the password with the unique salt.
            //$password = hash('sha512', $password . $salt);
            if ($stmt->num_rows == 1) {
                // If the user exists we check if the account is locked
                // from too many login attempts
                if ($db_password == md5($password)) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                    echo "Yey logged in!";
                    return true;
                } else {
                    echo "Wrong password";
                }
            } else {
                echo "Wrong user";
                // No user exists.
                return false;
            }
        }
        $_POST['status'] = NULL; // Reset the value so the error message (if there is any) wont stay forever.
    }
?>
<?php

$UserName = filter_input(INPUT_POST, 'UserName');
$Email = filter_input(INPUT_POST, 'Email');
$Password = filter_input(INPUT_POST, 'Password');

if (!empty($username)){
    if (!empty($password)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "dissertation";
        // Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
        
        if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO teachers (UserName, Email, Password) values ('$username','$Email','$password')";
            if ($conn->query($sql)){
                echo "New record is inserted sucessfully";
            }
            else{
                echo "Error: ". $sql ." ". $conn->error;
            }
            $conn->close();
        }
    }
    else{
    echo "Password should not be empty";
    die();
    }
}
else{
    echo "Username should not be empty";
    die();
}
?>
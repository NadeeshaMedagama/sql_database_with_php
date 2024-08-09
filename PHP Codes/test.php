<?php

global $conn;

include_once("sqlDatabase.php");

if ($conn == false){
    die ("Error in connection to the DB");
}
echo "Connected Successfully!<br>";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "POST">

        <h2>Welcome to Login Page</h2>
        ID :<br>
        <input type = "text" name = "id"><br>
        Uername :<br>
        <input type = "text" name = "username"><br>
        Password :<br>
        <input type = "password" name = "password"><br>
        Date :<br>
        <input type = "date" name = "date"><br>
        Time :<br>
        <input type = "time" name = "time"><br><br>
        <input type ="submit" name = "submit" value = "Register"><br>

    </form>
</body>
</html>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
        $time = filter_input(INPUT_POST, "time", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty ($username)){
            echo "Please enter username!";
        }
        elseif (empty ($password)){
            echo "Please enter password!";
        }
        elseif (empty ($id)){
            echo "Please enter id!";
        }
        elseif (empty ($date)){
            echo "Please enter date!";
        }
        elseif (empty ($time)){
            echo "Please enter time!";
        }
        else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO info (id, user, password, reg_date, time)
                    VALUES ('$id', '$username', '$hash', '$date', '$time')";

            mysqli_query($conn, $sql);

            echo "You are now registered!";

        }
    }

$conn->close();
?>

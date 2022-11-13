<!-- authorization.php -->

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
require_once(__DIR__ . '/../functions/dbConfig.php');
?>

<?php

// define variables and set to empty values
$login = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    unset($_POST['email']);
    $password = $_POST["password"];
    unset($_POST['password']);
}


$connection = makeConnectionDB();

function testPassword($email, $password, $connection)
{
    $password_sql = "SELECT `password` FROM `passwords` WHERE `passwords`.`users_email` = '$email'";

    if ($connection->query($password_sql)) {
        $result = $connection->query($password_sql);
        if ($result->num_rows == 0) {
            //echo "PASSWORD_NOT_FOUND";
            return false;
        } else {
            $row = $result->fetch_assoc();
            $passwordFromDatabase = $row['password'];
            if ($password != $passwordFromDatabase) {
                return false;
            } else {
                //echo "password ok";
                return true;
            }
        }
        // die(" connection ok");
    } else {
        die(" password_sql Error: " . $password_sql . "<br>" . $connection->error);
    }
}

$password_ok = testPassword($email, $password, $connection);

closeConnectionDB($connection);
if ($password_ok == true) {
    $_SESSION['admin'] = true;
}

header("location:processObject.php");

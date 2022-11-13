<!-- dbConfig.php -->


<?php

function makeConnectionDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "data_structure";

    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
        //die("db connection ok");
    }
    return $connection;
}

function closeConnectionDB($conn)
{
    $conn->close();
    // die("connection closed");
}

?>
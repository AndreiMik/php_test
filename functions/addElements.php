<!-- addElements.php -->
<?php

$objects_insert = "INSERT INTO objects (`parent_id`,`title`, `description`)
     VALUES ('$parent_id','$title', '$description')";

if ($connection->query($objects_insert) === TRUE) {
    //die(" record to users created successfully");
} else {
    die("Error: " . $objects_insert . "<br>" . $connection->error);
}

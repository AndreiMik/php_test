<!-- updateElements.php -->
<?php

$update_element = "UPDATE `objects` SET `title` = '$title', `description` = '$description'
WHERE `id` = '$id_update'";

if ($connection->query($update_element) === TRUE) {
    //die(" update of property has been done successfully");
} else {
    die("Error1: " . $update_element . "<br>" . $connection->error);
}

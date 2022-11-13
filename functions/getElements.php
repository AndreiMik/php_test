<!-- getElements.php -->
<?php

$objects_select = "SELECT * FROM objects";
$objectsArray = [];

if ($connection->query($objects_select)) {
    $result = $connection->query($objects_select);
    if ($result->num_rows == 0) {
        // die("objects do not exist");
        $objectsArray = '';
        $_SESSION['objectsArray'] = $objectsArray;
    } else {
        //die("objects exist");

        while ($row = $result->fetch_assoc()) {
            $objectsArray[$row['id']]['id'] = $row['id'];
            $objectsArray[$row['id']]['title'] = $row['title'];
            $objectsArray[$row['id']]['description'] = $row['description'];
            $objectsArray[$row['id']]['parent_id'] = $row['parent_id'];
        }
        /* print_r($objectsArray);
        die; */
        $_SESSION['objectsArray'] = $objectsArray;
    }
} else {
    die("Error: " . $objects_insert . "<br>" . $connection->error);
}

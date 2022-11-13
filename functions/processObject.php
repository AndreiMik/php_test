<!-- processObject.php -->

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
$title = $description = $parent_id = $id = $id_del = $id_update = "";
unset($_SESSION['objectsArray']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    unset($_POST['title']);
    $description = $_POST["description"];
    unset($_POST['description']);
    $id = $_POST["id"];
    unset($_POST['id']);
    $parent_id = $_POST["parent_id"];
    unset($_POST['parent_id']);
    $id_del = $_POST["id_del"];
    unset($_POST['id_del']);
    $id_update = $_POST["id_update"];
    unset($_POST['id_update']);
}
if ($parent_id == "null") {
    $parent_id = 0;
} else {
    $parent_id = $id;
}

$connection = makeConnectionDB();

// update elements
if ($id_update) {
    // echo $id_del;
    require_once(__DIR__ . '/../functions/updateElements.php');
}

// delete elements
if ($id_del) {
    // echo $id_del;
    require_once(__DIR__ . '/../functions/deleteElements.php');
}

// add elements
if ($title && !$id_update) {
    require_once(__DIR__ . '/../functions/addElements.php');
}

// get elements
require_once(__DIR__ . '/../functions/getElements.php');
/* print_r($objectsArray);
die; */
closeConnectionDB($connection);

header("location:../");

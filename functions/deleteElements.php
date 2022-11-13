<!-- deleteElements.php -->
<?php

$objects_delete = "DELETE FROM `objects` WHERE `objects`.`id` = '$id_del'";

if ($connection->query($objects_delete) === TRUE) {
    /* echo "child deleted successfully";
    die; */
} else {
    die(" user_sql Error: " . $objects_delete . "<br>" . $connection->error);
}

// delete childs
$parent_id = $id_del;


function childs_delete($parent_id, $connection)
{
    $child_select = "SELECT `id` FROM objects WHERE `objects`.`parent_id` = '$parent_id'";
    if ($connection->query($child_select)) {
        $result = $connection->query($child_select);
        if ($result->num_rows == 0) {
            //die("objects child_select do not exist");
            return false;
        } else {
            while ($row = $result->fetch_assoc()) {
                $arr[0]["id"] = $row["id"];
                /* echo $arr[0]["id"];
                die; */
                $parent_id_next = $arr[0]["id"];
            }
            //die("object child_select exists");
            $objects_delete = "DELETE FROM `objects` WHERE `objects`.`parent_id` = '$parent_id'";

            if ($connection->query($objects_delete) === TRUE) {
                /* echo "child deleted successfully";
                die; */
                $parent_id = $parent_id_next;
                childs_delete($parent_id, $connection);
            } else {
                die(" user_sql Error: " . $objects_delete . "<br>" . $connection->error);
            }
        }
    }
}
childs_delete($parent_id, $connection);

<!-- buildTree.php -->
<?php
function buildTree($objectsArray, $parent_id, $level = 0, $prelevel = -1)
{
    foreach ($objectsArray as $id => $data) {
        if ($parent_id == $data['parent_id']) {
            if ($level > $prelevel) {
                echo "<ul>";
            }
            if ($level == $prelevel) {
                echo "</li>";
            }
            echo '<form action="functions/processObject.php" method="POST" enctype="multipart/form-data">';
            echo '<li>' . $data['title'] . " " . $data['description'];
            echo '<input type="text" name="title" placeholder="title">';
            echo '<input type="text" name="description" placeholder="description">';
            echo '<input type="hidden" name="id" value="';
            echo $data["id"];
            echo '">';
            echo '<button>Add child</button>';
            echo '<button name="id_update" value="' . $data["id"] . '">Update</button>';
            echo '<button name="id_del" value="' . $data["id"] . '">Delete</button>';
            echo '</form>';


            if ($level > $prelevel) {
                $prelevel = $level;
            }
            $level++;
            buildTree($objectsArray, $id, $level, $prelevel);
            $level--;
        }
    }
    if ($level == $prelevel) {
        echo "</li></ul>";
    }
}

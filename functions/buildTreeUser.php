<!-- buildTree.php -->
<?php
function buildTree($objectsArray, $parent_id, $level = 0, $prelevel = -1)
{
    $i = 0;
    foreach ($objectsArray as $id => $data) {
        $i++;
        if ($parent_id == $data['parent_id']) {
            if ($level > $prelevel) {
                echo "<ul>";
            }
            if ($level == $prelevel) {
                echo "</li>";
            }

            if ($parent_id == 0) {
                echo '<li id="' . $id . '" style="display: block;" onclick="func(' . $id . ')">' . $data['title'] . " " . $data['description'] . "<span>+</span>";
            }
            if ($parent_id != 0) {
                echo '<li id="' . $id . '"  onclick="func2(' . $id . ')" style="display: none;">' . $data['title'] . " " . $data['description'] . "<span>+</span>";
            }

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
